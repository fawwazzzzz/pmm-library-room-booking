<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
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
}

    public function checkBetween(Request $request) {

        $request->validate([
            'checkin' => 'required|date',
            'checkout' => 'required|date|after:start_time',
        ]);

        // Find available rooms for the requested time slot
        $availableRooms = Reservation::whereDoesntHave('reservations', function ($query) use ($request) {
            $query->where('checkin', '<', $request->input('checkout'))
                ->where('checkout', '>', $request->input('checkin'));
        })->get();

        if ($availableRooms->isEmpty()) {
            return response()->json(['message' => 'No rooms available for the requested time slot.'], 422);
        }

        // If rooms are available, return them along with a success message
        return response()->json(['available_rooms' => $availableRooms, 'message' => 'Rooms available.'], 200);
    }
}
