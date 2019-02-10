<?php

namespace App\Http\Controllers;

use App\Contact;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function update (Request $request){

    	$this->validate($request,[

    		'name'=>'required',
    		'email'=>'required|email',
    		'subject'=>'required',
    		'message'=>'required',
    	]);



   $contacts = new Contact();
   $contacts->name = $request->name;
   $contacts->email = $request->email;
   $contacts->subject = $request->subject;
   $contacts->message = $request->message;
   $contacts->save();

   toastr::success('Data inserted Successfully','success');
   return redirect()->back();
    }
}
