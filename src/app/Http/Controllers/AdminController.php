<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Category;
use App\Http\Models\Controller;

class AdminController extends Controller
{
    public function admin()
    {
      return view('auth.admin');
    }
}
