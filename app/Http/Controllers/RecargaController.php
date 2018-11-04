<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 25/10/2018
 * Time: 8:13
 */

namespace ChuliosApp\Http\Controllers;

use Illuminate\Http\Request;

class RecargaController extends Controller
{
    public function index(){
        return view('recarga');
    }
}