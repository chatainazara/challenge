<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;

class ConfirmController extends Controller
{

    public function confirm(Request $request) {
        $contact=$request -> all();
        $gender = $contact['gender'];
        if($gender == 1){
            $gender_name='男性';
        }elseif($gender == 2){
            $gender_name='女性';
        }else{
            $gender_name='その他';
        }
        // dd($gender);
        // $s=$contact['category_id'];
        // dd($s);
        $category=Category::find($contact['category_id']);
        // dd($category);
        return view('contact.confirm',compact('contact','category','gender_name'));
    }
}