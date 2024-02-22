<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;

class HomeController extends Controller
{
    public function index() 
    {
        $province = Province::find(11);
        dd($province->regencies);
    }
}
