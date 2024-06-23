<?php

namespace App\Http\Controllers;

use App\Models\Kepegawaian;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $kepegawaian = Kepegawaian::all();
        return view('dashboard', compact('kepegawaian'));
    }
}
