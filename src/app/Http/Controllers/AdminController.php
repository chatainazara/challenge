<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    // 検索とリセット
    public function search(Request $request)
    {
      // $s=$request->all();
      // dd($s);
      if($request->has('reset')){
        return redirect('/admin');
      }else{
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

    // モーダルウィンドウから行う削除機能
    public function remove(Request $request)
    {
      $a=$request->all();
      Contact::find($request->id)->delete();
      return redirect('/admin');
    }
}
