<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    public function index()
    {   
        return view('admin.admin-rekod');
    }

    public function tempahanPelajarList()
    {
        $data = Reservation::where('noMatriks','!=', 'Staff')->orderBy('id', 'desc')->with(['room','program']);

        return Datatables::of($data)
        ->addIndexColumn()
        ->editColumn('namaPengguna', function ($row) {
            return $row->namaPengguna;
        })
        ->editColumn('tarikh', function ($row) {
            return $row->date;
        })
        ->editColumn('program', function ($row) {
            return $row->program->namaProgram;
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

        $data = Reservation::where('noMatriks','=', 'Staff')->orderBy('id', 'desc')->with(['room', 'jabatan']);

        return Datatables::of($data)
        ->addIndexColumn()
        ->editColumn('namaPengguna', function ($row) {
            return $row->namaPengguna;
        })
        ->editColumn('tarikh', function ($row) {
            return $row->date;
        })
        ->editColumn('jabatan', function ($row) {
            return $row->jabatan->namaJabatan;
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
}
