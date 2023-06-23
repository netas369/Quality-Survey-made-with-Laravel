<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestDashboardController extends Controller
{
    public function index()
    {
        // Add your logic to fetch data or perform any operations for the test dashboard

        // Return the view for the test dashboard
        return view('test-dashboard');
    }
}
