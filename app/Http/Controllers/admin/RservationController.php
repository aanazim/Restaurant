<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class RservationController extends Controller
{
    public function index (){

    	$reservations = Reservation::all();
    	return view ('admin.reservation.index',compact('reservations'));
    }

    public function edit ($id){
    	$reservations = Reservation::find($id);
    	 
    	/*Toastr::success('Reservation Edit successfully', 'Success');*/
    	return view ('admin.reservation.edit',compact('reservations'));
    	
    }


    public function update(Request $request,$id){
    	$reservations = Reservation::find($id);


    	$this->validate($request,
         ['status'=>'required'],
         ['status.required'=>'please Edit a status']
       );

       $reservations->status = $request ->status;
       $reservations->save();
       Toastr::success('Reservation Edit successfully', 'success');
       return redirect()->route('reservation.index');
    }

    public function delete($id){
    	Reservation::find($id)->delete();
            Toastr::success('Reservation Delete successfully', 'success');
           return redirect()->route('reservation.index');
    }
}
