<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;

class ContactformController extends Controller
{
    public function contactform(){
        $categories=Category::all();
        return view('contact.contactform',['categories'=>$categories]);
    }
}
