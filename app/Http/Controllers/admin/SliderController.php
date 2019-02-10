<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Slider;
use Brian2694\Toastr\Facades\Toastr;
use File;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view ('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'sub_title'=>'required',
            'image'=>'required'
            
                    ],
        [
         'title.required'=>'Please Provide a Title',
         'sub_title.required'=>'Please Provide a Sub Title',
         
        ]
);
          //Data insert
        $sliders = new Slider();
        $sliders->title = $request->title;
        $sliders->sub_title = $request->sub_title;

        //image insert
       
        if($request->file('image')){
            $image = $request->file('image');
            $img = time().'.'.$image->getClientOriginalExtension();
            $location = public_path ('slider/'.$img);
            Image::make($image)->save($location);
            $sliders->image = $img;

        }

        $sliders->save();
        Toastr::success('Slider Created Successfully', 'Success');
       return redirect()->route('slider.index');
       /*->with('success','Slider has added successfully !!')*/

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slider = Slider::find($id);

        if(File::exists('slider/'.$slider->image)){
        File::delete('slider/'.$slider->image);
       }

        $slider->delete();

        return redirect()->route('slider.index')->with('success','Deleted Successfully !!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {    
        $slider = Slider::find($id);
        return view ('admin.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $slider = Slider::find($id);
       $this->validate($request,[
            'title'=>'required',
            'sub_title'=>'required',
            
            
                    ],
        [
         'title.required'=>'Please Provide a Title',
         'sub_title.required'=>'Please Provide a Sub Title',
         
        ]
);
          //Data insert
        
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;

        //image insert
       
        if($request->file('image')){
            $image = $request->file('image');
            $img = time().'.'.$image->getClientOriginalExtension();
            $location = public_path ('slider/'.$img);

            if(!$img){
                 Image::make($image)->save($location);
                  }
              else{
                File::delete('slider/'.$slider->image);
                Image::make($image)->save($location);
                    }
            $slider->image = $img;

        }

        //Data Delete

       

        $slider->save();
       return redirect()->route('slider.index')->with('success','Slider has Edited successfully !!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            
       
    }
}
