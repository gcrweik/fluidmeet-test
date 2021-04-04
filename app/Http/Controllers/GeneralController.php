<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pharmacy;
use App\User;
use Illuminate\Support\Facades\Hash;

class GeneralController extends Controller
{
    public function index() {
        $data = [];
        $data['pharmacies'] = Pharmacy::get();
        return \View::make("home")->with('data', $data);
    }
}
