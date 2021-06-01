<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Shiporder;

class ShipOrdersController extends Controller
{


    public function index()
    {
        return Shiporder::all();
    }
 
    public function show($id)
    {
        return Shiporder::find($id);
    }


}
