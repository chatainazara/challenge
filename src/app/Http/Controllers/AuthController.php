<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class AuthController extends Controller
{
    public function admin()
{
  $contacts=Contact::simplePaginate(7);
  return view('auth.admin',['contacts' => $contacts]);
}
}