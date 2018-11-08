<?php

namespace ChuliosApp\Http\Controllers;

use Illuminate\Http\Request;

class ChulioController extends Controller
{
    public function index(){
        return view('Chulio\chulio');
    }
}
