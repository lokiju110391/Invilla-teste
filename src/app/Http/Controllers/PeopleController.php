<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\People;

class PeopleController extends Controller
{

    public function index()
    {
        return People::all();
    }
 
    public function show($id)
    {
        return People::find($id);
    }

}
