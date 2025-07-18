<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function inicio()
    {
        return view('admin.panel');
    }
    public function index()
    {
        return view('admin.panel');
    }
}
