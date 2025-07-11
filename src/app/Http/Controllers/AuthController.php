<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class AuthController extends Controller
{
    public function admin()
{
  $contacts_page=Contact::simplePaginate(7);
  $contacts=Contact::with('category')->get();
  $categories=Category::all();
  return view('auth.admin',[
    'contacts_page' => $contacts_page,
    'contacts' => $contacts,
    'categories' => $categories,
  ]);
}
}