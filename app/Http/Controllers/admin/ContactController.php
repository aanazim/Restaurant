<?php

namespace App\Http\Controllers\admin;

use App\Contact;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ContactController extends Controller
{
   public function index(){
   
   $contacts = Contact::all();
   	return view ('admin.contact.index',compact('contacts'));
   }

   public function show ($id){
   	$contacts = Contact::find($id);
   	return view ('admin.contact.show',compact('contacts'));
   }

   public function delete ($id){
     Contact::find($id)->delete();
     Toastr::success('Delete successfully','success');
     return redirect()->route('contact.index');
   }
}
