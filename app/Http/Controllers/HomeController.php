<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Memanggil Tampilan Index
    public function index(): View
    {
        return view('index');
    }
}
