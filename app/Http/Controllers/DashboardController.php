<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Retro;

class DashboardController extends Controller
{
    public function index()
    {
        $retros = Retro::orderBy('id', 'desc')->get();
        $total = Retro::count();
        return view('dashboard', compact(['retros', 'total']));
    }
}
