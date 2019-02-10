<?php

namespace App\Http\Controllers\admin;

use App\About;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use File;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::findOrFail(1);
        return view ('admin.about.index',compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
       
       Toastr::error('You can not Delete','error');
       return redirect()->route('about.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $abouts = About::find($id);
        return view('admin.about.edit',compact('abouts'));
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
        
        $about = About::find($id);
       $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            'image' =>'image',
            
            
                    ],
        [
         'title.required'=>'Please Provide a Title',
         'description.required'=>'Please Provide a Description',
         'image.required'=>'Please Provide a image',
        ]
);
          //Data insert
        
        $about->title = $request->title;
        $about->description = $request->description;

        //image insert
         
        if($request->file('image')){
            $image = $request->file('image');
            $img = time().'.'.$image->getClientOriginalExtension();
            $location = public_path ('about/'.$img);

            if(!$img){
               Image::make($image)->save($location);  
            }
            else{
               File::delete('about/'.$about->image);
               Image::make($image)->save($location);
            }

           
            $about->image = $img;

        }
        $about->save();
        Toastr::success('Edited Successfully','success');
        return redirect()->route('about.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
