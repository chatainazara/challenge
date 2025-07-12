<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;

class AdminController extends Controller
{

    // 検索とリセット
    public function search(Request $request)
    {
      if($request->has('reset')){
        return redirect('/admin');
      }else{
        $searches = Contact::with('category')->EmailOrNameSearch($request->search)->GenderSearch($request->gender)->CategorySearch($request->category_id)->DateSearch($request->date)->get();
        $searchitem = [
          'search'=>$request->search,
          'gender'=>$request->gender,
          'category_id'=>$request->category_id,
          'date'=>$request->date,
          'find'=>$request->find,
          'reset'=>$request->reset,
        ];
        $categories = Category::all();
        $contacts = $searches -> paginate(5)->appends($request->all());
        return view('auth.admin',[
          'contacts' => $contacts,
          'categories' => $categories,
          'searchitem'=>$searchitem,
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


