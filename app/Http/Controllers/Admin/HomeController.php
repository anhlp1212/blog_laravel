<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    const INDEX_NAV = 0;
    public function index()
    {
        return view('admin.dashboard', ['title' => 'Dashboard', 'index_nav' => Self::INDEX_NAV]);
    }
}
