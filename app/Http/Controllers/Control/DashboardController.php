<?php

namespace App\Http\Controllers\Control;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     *
     * @return View
     */
    public function index()
    {
        return view('control.dashboard');
    }
}
