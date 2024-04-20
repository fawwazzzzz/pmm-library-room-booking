<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\Jabatan;
use App\Models\Program;
use App\Models\Reservation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{
    public function availablePage() {
        return view('forms.form-available');
    }

    public function detailsPage() {

        // access jabatan and program data.
        $jabatan = Jabatan::select('idJabatan', 'namaJabatan')->get();
        $program = Program::select('idProgram','namaProgram')->get();

        $data = session('roomID');
        return view('forms.form-details', compact(['data', 'program', 'jabatan']));
    }
  
    // Redirect to Admin PAhe
    public function admin() {

         // Query to calculate the frequency of bookings for each time slot on each date
        $bookingsData = Reservation::
                        select(DB::raw('date as booking_date'),
                                DB::raw('extract(hour from checkin) as hour_of_day'),
                                DB::raw('count(*) as booking_count'))
                        ->groupBy('booking_date', 'hour_of_day')
                        ->orderByRaw('booking_date asc, hour_of_day asc')
                        ->get();

        // Prepare the data for the chart
        $chartData = [];
        foreach ($bookingsData as $booking) {
            $chartData[$booking->booking_date][$booking->hour_of_day] = $booking->booking_count;
        }

        // Program Query
        $programData = Reservation::join('program', 'tempahan.idProgram', '=', 'program.idProgram')
                ->select('program.idProgram', 'program.namaProgram', DB::raw('COUNT(tempahan.id) as total_count'))
                ->where('tempahan.status', 'Completed')
                ->groupBy('program.idProgram', 'program.namaProgram')
                ->get();

        $program = [
            'program' => [],
            'data' => []
        ];
        
        foreach ($programData as $data) {
            $program['data'][] = $data->total_count;
            $program['program'][] = $data->namaProgram;
        }    

        // End of Program Query

        // Jabatan Query
        $jabatanData = Reservation::join('jabatan', 'tempahan.idJabatan', '=', 'jabatan.idJabatan')
                ->select('jabatan.idJabatan', 'jabatan.namaJabatan', DB::raw('COUNT(tempahan.id) as total_count'))
                ->where('tempahan.status', 'Completed')
                ->groupBy('jabatan.idJabatan', 'jabatan.namaJabatan')
                ->get();

        $jabatan = [
            'jabatan' => [],
            'data' => []
        ];

        $reserveStatus = [
            'completed' => Reservation::where('status', 'Completed')->count(),
            'pending' => Reservation::whereNull('status')->count(),
            'total' => Reservation::count(),
        ];
        
        foreach ($jabatanData as $data) {
            $jabatan['data'][] = $data->total_count;
            $jabatan['jabatan'][] = $data->namaJabatan;
        }    

        return view('admin.admin-dashboard', compact('chartData', 'program', 'jabatan', 'reserveStatus'));
    }

    public function checkBetween(Request $request) {

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'checkin' => 'required|', // Checkin time in 24-hour format
            'checkout' => 'required|after:checkin', // Checkout time must be after checkin time
        ], [ 'after' => 'Masa keluar kena sebelum masa masuk.']);

        if ($validator->fails()) {
            // return back()->withErrors($validator->errors())->withInput();
            return response()->json($validator->errors(), 433);
        }

        // Access specific data from the request
        $date = $request->input('date');
        $hourStart = $request->input('checkin');
        $hourEnd = $request->input('checkout');
            
        $room = Reservation::select('roomID')
                ->whereDate('date', '=', $date)
                ->where(function ($query) use ($hourStart, $hourEnd) {
                    $query->where(function ($query) use ($hourStart, $hourEnd) {
                        $query->whereTime('checkin', '<', $hourStart)
                            ->whereTime('checkout', '>', $hourEnd);
                    })->orWhere(function ($query) use ($hourStart, $hourEnd) {
                        $query->whereTime('checkin', '>', $hourStart)
                            ->whereTime('checkin', '<', $hourEnd);
                    })->orWhere(function ($query) use ($hourStart, $hourEnd) {
                        $query->whereTime('checkout', '>', $hourStart)
                            ->whereTime('checkout', '<', $hourEnd);
                    });
                })
                ->get();

        // Return a JSON response with the processed data
        return response()->json(['test' => $room]);
    }

    public function insertTime(Request $request) {

        $date = $request->date;
        $hourStart = $request->sHour;
        $hourEnd = $request->eHour;
        
        $room = $request->room;

        // Adjust Time format for input purpose
        $timeStart = $hourStart . ':' . $request->sMinute . ':00';
        $timeEnd = $hourEnd . ':' . $request->eMinute . ':00';

        // dd([$date, $timeStart, $timeEnd]);

        $time = Reservation::create([
            'date' => $date,
            'checkin' => $timeStart,
            'checkout' => $timeEnd,
            'roomID' => $room
        ]);

        $data = Reservation::select(['id', 'roomID'])
                ->whereDate('date', '=', $date)
                ->whereTime('checkin', '=', $timeStart)
                ->whereTime('checkout', '=', $timeEnd)
                ->first();

        session(['roomID' => $data]);

        return redirect('/form-details');

    }

    public function insertDetails(Request $request) {

        $numGroup = $request->room == 'Anjung' ? 'min:20|max:30' : 'min:3|max:6';

        if ($request->programID == null) {
            $choice = "jabatanID";
        } 
        else if ($request->jabatanID == null) {
            $choice = "programID";
        }

        $options = $request->inlineRadioOptions == "student" ? 'id_format' : '';

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'matriks' => "required|$options",
            'email' => 'required|email',
            "$choice" => 'required',
            'purposeName' => 'required',
            'groupnum' => "required|numeric|$numGroup",
            'semesterName' => "required",
        ]);

        $customMessages = [
            'name.required' => 'Sila masukkan Nama.',
            'matriks.required' => 'Sila masukkan No Matriks',
            'email.required' => 'Sila masukkan Email.',
            "$choice.required" => 'Sila pilih satu pilihan.',
            'purposeName.required' => 'Sila masukkan tujuan penempahan.',
            'groupnum.required' => 'Sila masukkan bilangan dalam kumpulan.',
            'groupnum.numeric' => 'Masukkan nombor sahaja di dalam bilangan dalam kumpulan.',
            'semesterName.required' => '',
            'matriks.id_format' => 'Sila masukkan format No Matriks dengan betul'
        ];



        $validator->setCustomMessages($customMessages);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }

        $id = $request->id;

        $update = Reservation::where('id', $id)
                ->update([
                    'namaPengguna'=> $request->name,
                    'noMatriks' => $request->matriks,
                    'email' => $request->email,
                    'idJabatan' => $request->jabatanID,
                    'idProgram' => $request->programID,
                    'semester' => $request->semesterName,
                    'purpose' => $request->purposeName,
                    'groupNum' => $request->groupnum,
                ]);

        $data = Reservation::select('tempahan.*', 'room.roomName')
                ->join('room', 'tempahan.roomID', '=', 'room.roomID')
                ->where('id', $id)
                ->first();

        session([
            'userDetails' => $data
        ]);

        return redirect('/form-result');
    }

    public function deleteTime(Request $request) {

        Reservation::where('id', $request->id)->delete();

        return redirect('/form-available');
    }

    public static function result() {

        $data = session('userDetails');
        return view('forms.form-result', compact(['data']));
    }

    public function cancelReserve(Request $request) {

        $reserve = Reservation::find($request->id);

        $checkinTime = Carbon::parse($reserve->checkin);

        $timeDifference = Carbon::now()->diffInMinutes($checkinTime);

        if ($timeDifference >= 30) {
        // Update reservation status to Cancelled
        $reserve->delete();
            return redirect('/')->with('success', 'Reservation cancelled successfully.');
        } else {
            return back()->with('error', 'Reservation cancellation unsuccessful. Cancellation can only be made 30 minutes before checkin time.');
        }

    }
}
