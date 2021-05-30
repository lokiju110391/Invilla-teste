<?php

namespace App\Http\Controllers;

use DateTime;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NavegationController extends Controller
{
    
    public function index_page(Request $request) {
        return view('index');
    }

    public function people_page(Request $request) {
        return view('people');
    }

    public function shiporders_page(Request $request) {
        return view('shiporders');
    }

    public function users_page(Request $request) {
        return view('users');
    }

}
