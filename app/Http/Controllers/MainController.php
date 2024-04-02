<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Jabatan;
use App\Models\Program;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
  
    public function admin() {
        return view('admin.admin-dashboard');
    }

    public function checkBetween(Request $request) {

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

        // Set into 24 hours format.

        // Start
        // if($request->startAMPM == "PM") {

        //     $hourStart += 12;

        //     if ($hourStart == 24 ) {
                
        //         $hourStart = 12;
        //     }
        // }
        // elseif($request->startAMPM == "AM" && $hourStart == 12) {

        //     $hourStart -= 12;
        //     $hourStart = $hourStart + "0";
        // }

        // // End
        // if($request->endAMPM == "PM") {

        //     $hourEnd += 12;

        //     if ($hourEnd == 24 ) {
                
        //         $hourEnd = 12;
        //     }
        // }
        // elseif($request->endAMPM == "AM" && $hourEnd == 12) {

        //     $hourEnd -= 12;
        //     $hourEnd = $hourEnd + "0";
        // }

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

        $id = $request->id;

        $update = Reservation::where('id', $request->id)
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
                ->where('tempahan.id', $id)
                ->first();

        session(['userDetails' => $data]);

        return redirect('/form-result');
    }

    public static function result() {

        $data = session('userDetails');
        return view('forms.form-result', compact(['data']));
    }

    public function deleteTime(Request $request) {

        $delete = Reservation::where('id', $request->id)->delete();

        return redirect('/form-available');
    }
}