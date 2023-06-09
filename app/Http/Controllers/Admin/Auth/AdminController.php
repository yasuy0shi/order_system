<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
}
