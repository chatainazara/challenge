<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;

class ThanksController extends Controller
{
    public function thanksOrfix(Request $request){
        // dd($request->all());
        if($request->has('fix')){
            return redirect('/')->withInput();
        }else{
            $form = $request->all();
            Contact::create($form);
            return view('contact.thanks');
        }
    }
}
