<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    public function index()
    {
        return view('tempahan.index');
    }

    public function tempahanList()
    {
        $data = Reservation::orderBy('id', 'desc');

        return Datatables::of($data)
        ->addIndexColumn()
        ->editColumn('namaPengguna', function ($row) {
            return $row->namaPengguna;
        })
        ->make(true);
    }
}
