<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function available() {
        return view('forms.form-available');
    }

    public function details() {
        return view('forms.form-details');
    }
  
    public function admin() {
        return view('admin.admin');
    }

    public function checkBetween(Request $request) {

        // Access specific data from the request
        $date = $request->input('date');
        $hourStart = $request->input('checkin');
        $hourEnd = $request->input('checkout');
            
        $users = Reservation::select('roomID')
                ->whereDate('date', '=', $date)
                ->whereTime('checkout', '>', $hourStart)
                ->get();

        // Return a JSON response with the processed data
        return response()->json(['test' => $users]);
    }

    public function insertTime(Request $request) {

        $date = $request->date;
        $hourStart = $request->sHour;
        $hourEnd = $request->eHour;
        
        $room = $request->room;

        // Set into 24 hours format.

        // Start
        if($request->startAMPM == "PM") {

            $hourStart += 12;

            if ($hourStart == 24 ) {
                
                $hourStart = 12;
            }
        }
        elseif($request->startAMPM == "AM" && $hourStart == 12) {

            $hourStart -= 12;
            $hourStart = $hourStart + "0";
        }

        // End
        if($request->endAMPM == "PM") {

            $hourEnd += 12;

            if ($hourEnd == 24 ) {
                
                $hourEnd = 12;
            }
        }
        elseif($request->endAMPM == "AM" && $hourEnd == 12) {

            $hourEnd -= 12;
            $hourEnd = $hourEnd + "0";
        }


        $timeStart = $hourStart . ':' . $request->sMinute . ':00';
        $timeEnd = $hourEnd . ':' . $request->eMinute . ':00';

        // dd([$date, $timeStart, $timeEnd]);

        $time = Reservation::create([
            'date' => $date,
            'checkin' => $timeStart,
            'checkout' => $timeEnd,
            'roomID' => $room
        ]);

        $data = Reservation::select('id')
                ->whereDate('date', '=', $date)
                ->whereTime('checkin', '=', $timeStart)
                ->whereTime('checkout', '=', $timeEnd)
                ->first();

        return view('forms.form-details', compact(['data']));

    }
}
