<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    public function index()
    {   
        return view('admin.admin-rekod');
    }

    public function tempahanPelajarList(Request $request)
    {
        $search = $request->search['value'];

        $data = Reservation::query()
        ->where(function ($q) use ($search) {
            if ($search) {
                $q->where('namaPengguna', 'ILIKE', $search . '%');
            }
        })
        ->join('program', 'tempahan.idProgram', '=', 'program.idProgram')
        ->where('noMatriks','!=', 'Staff')
        ->orderBy('id', 'desc')
        ->get();
        
        return Datatables::of($data)
        ->editColumn('id', function ($row) {
            return $row->id;
        })
        ->editColumn('namaPengguna', function ($row) {
            return $row->namaPengguna;
        })
        ->editColumn('tarikh', function ($row) {
            return $row->date;
        })
        ->editColumn('program', function ($row) {
            return $row->program?->namaProgram;
        })
        ->editColumn('noMatrik', function ($row) {
            return $row->noMatriks;
        })
        ->editColumn('noBilik', function ($row) {
            info($row);
            return $row->room?->roomName;
        })
        ->editColumn('checkin', function ($row) {
            return $row->checkin;
        })
        ->editColumn('checkout', function ($row) {
            return $row->checkout;
        })
        ->make(true);
    }

    public function tempahanPensyarahList(Request $request){

        $search = $request->search['value'];
        
        $data = Reservation::query()
        ->where(function ($q) use ($search) {
            if ($search) {
                $q->where('namaPengguna', 'ILIKE', $search . '%');    
            }
        })
        ->join('jabatan', 'tempahan.idJabatan', '=', 'jabatan.idJabatan')
        ->whereNull('noMatriks')
        ->orderBy('id', 'desc')
        ->get();

        return Datatables::of($data)
        ->editColumn('id', function ($row) {
            return $row->id;
        })
        ->editColumn('namaPengguna', function ($row) {
            return $row->namaPengguna;
        })
        ->editColumn('date', function ($row) {
            return $row->date;
        })
        ->addColumn('jabatan', function ($row) {
            return $row->namaJabatan;
        })
        ->addColumn('noBilik', function ($row) {
            info($row);
            return $row->room?->roomName;
        })
        ->editColumn('checkin', function ($row) {
            return $row->checkin;
        })
        ->editColumn('checkout', function ($row) {
            return $row->checkout;
        })
        ->make(true);
    }

    public function tempahanRecentList(Request $request) {
        $data = Reservation::whereNull('status')
                ->orderBy('id', 'desc')
                ->with(['room']);

        return Datatables::of($data)
        ->addIndexColumn()
        ->editColumn('namaPengguna', function ($row) {
            return $row->namaPengguna;
        })
        ->addColumn('noBilik', function ($row) {
            info($row);
            return $row->room?->roomName;
        })
        ->editColumn('tarikh', function ($row) {
            return $row->date;
        })
        ->editColumn('checkin', function ($row) {
            return $row->checkin;
        })
        ->editColumn('checkout', function ($row) {
            return $row->checkout;
        })
        ->make(true);
    }

    // Redirect to monthly report dashboard.
    public function laporanBulanan()
    {   
        $month = Reservation::select('monthID')
                ->distinct()
                ->orderBy('monthID', 'desc')
                ->get();
                
        return view('admin.admin-report', compact('month'));
    }

    public function bulanDashboard(Request $request) { // Dashboard spesifik untuk data bulanan

        $month = $request->month;

        // Query to calculate the frequency of bookings for each time slot on each date
        $bookingsData = Reservation::
                        select(DB::raw('date as booking_date'),
                                DB::raw('extract(hour from checkin) as hour_of_day'),
                                DB::raw('count(*) as booking_count'))
                                ->where('tempahan.monthID', $month)
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
                ->where('tempahan.monthID', $month)
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
                ->where('tempahan.monthID', $month)
                ->groupBy('jabatan.idJabatan', 'jabatan.namaJabatan')
                ->get();

        $jabatan = [
            'jabatan' => [],
            'data' => []
        ];
        
        foreach ($jabatanData as $data) {
            $jabatan['data'][] = $data->total_count;
            $jabatan['jabatan'][] = $data->namaJabatan;
        }
        // End Of Jabatan Query
        
        // Count Reserved by day
        $day = Reservation::select('date', DB::raw('count(id) as total_day'))
        ->where('monthID', $month)
        ->groupBy('monthID', 'date')
        ->get();
        
        $dayData = [
            'date' => [],
            'total' => [],
        ];

        foreach ($day as $data) {
            $dayData['date'][] = $data->date;
            $dayData['total'][] = $data->total_day;
        }
        
        // Get total and completed reservation
        $reserveStatus = [
            'completed' => Reservation::where('tempahan.monthID', $month)->where('status', 'Completed')->count(),
            'total' => Reservation::where('tempahan.monthID', $month)->count(),
        ];

        // Set Month Name
        switch ($month) {
            case 1:
                $month = "Januari";
                break;
            case 2:
                $month = "Februari";
                break;
            case 3:
                $month = "Mac";
                break;
            case 4:
                $month = "April";
                break;
            case 5:
                $month = "Mei";
                break;
            case 6:
                $month = "Jun";
                break;
            case 7:
                $month = "Julai";
                break;
            case 8:
                $month = "Ogos";
                break;
            case 9:
                $month = "September";
                break;
            case 10:
                $month = "Oktober";
                break;
            case 11:
                $month = "November";
                break;
            case 12:
                $month = "Disember";
                break;
            default:
                $month = "...";
                break;
        }
        
        return view('admin.admin-month-dashboard', compact('chartData', 'program', 'jabatan', 'reserveStatus', 'month', 'dayData'));
    }

    public function bulananPelajarList(Request $request)
    {
        
        $search = $request->search['value'];

        $data = Reservation::query()
        ->where(function ($q) use ($search) {
            if ($search) {
                $q->where('namaPengguna', 'ILIKE', $search . '%');
            }
        })
        ->join('program', 'tempahan.idProgram', '=', 'program.idProgram')
        ->where('noMatriks','!=', 'Staff')
        ->orderBy('id', 'desc')
        ->get();
        
        return Datatables::of($data)
        ->editColumn('id', function ($row) {
            return $row->id;
        })
        ->editColumn('namaPengguna', function ($row) {
            return $row->namaPengguna;
        })
        ->editColumn('tarikh', function ($row) {
            return $row->date;
        })
        ->editColumn('program', function ($row) {
            return $row->program?->namaProgram;
        })
        ->editColumn('noMatrik', function ($row) {
            return $row->noMatriks;
        })
        ->editColumn('noBilik', function ($row) {
            info($row);
            return $row->room?->roomName;
        })
        ->editColumn('checkin', function ($row) {
            return $row->checkin;
        })
        ->editColumn('checkout', function ($row) {
            return $row->checkout;
        })
        ->make(true);
    }
}
