<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard'); 
    }

    public function superadmin()
    {
        return view('dashboard.superadmin');
    }

    public function membreAdmin()
    {
        return view('dashboard.membreadmin');
    }

    public function membre()
    {
        return view('dashboard.membre');
    }

}
