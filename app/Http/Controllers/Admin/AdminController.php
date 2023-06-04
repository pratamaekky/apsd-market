<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        echo 'Ini Halaman Admin';
    }

    public function staff()
    {
        echo 'Halaman Staff';
    }
}
