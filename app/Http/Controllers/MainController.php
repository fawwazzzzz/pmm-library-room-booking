<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function available() {
        return view('forms.form-available');
    }

    public function details() {
        return view('forms.form-details');
    }
}
