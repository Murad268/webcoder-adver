<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function index()
    {
        return view('front.work.index');
    }


    public function work()
    {
        return view('front.work.details');
    }
}
