<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $entries = DB::table('entries')->get(); // or use Entry::all() if you have a model
        return view('dashboard', compact('entries'));
    }
}
