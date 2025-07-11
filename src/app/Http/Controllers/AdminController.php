<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function search(Request $request)
    {
      // $s=$request->all();
      // dd($s);
      $contacts_page=Contact::simplePaginate(7);
      $categories = Category::all();
      $contacts = Contact::with('category')->EmailOrNameSearch($request->search)->GenderSearch($request->gender)->CategorySearch($request->category_id)->DateSearch($request->date)->get();
      return view('auth.admin',[
        'contacts_page' => $contacts_page,
        'contacts' => $contacts,
        'categories' => $categories,
      ]);
    }
}
