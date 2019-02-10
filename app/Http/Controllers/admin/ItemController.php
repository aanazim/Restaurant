<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Item;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use File;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
    return view('admin.item.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
         $categories = Category::all();
    return view('admin.item.create',compact('categories'));
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
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
            'image'=>'required'
            
                    ],
        [
         'name.required'=>'Please Provide a Name',
         'description.required'=>'Please Provide Description',
         'price.required'=>'Please Provide a Price',
         'image.required'=>'Please Provide a Image',
         
        ]
);
          //Data insert
        $items = new Item ();
        $items->name = $request->name;
        $items->description = $request->description;
        $items->category_id = $request->category_id;
        $items->price = $request->price;


        //image insert
       
        if($request->file('image')){
            $image = $request->file('image');
            $img = time().'.'.$image->getClientOriginalExtension();
            $location = public_path ('item/'.$img);
            Image::make($image)->save($location);
            $items->image = $img;

        }

        $items->save();
       return redirect()->route('item.index')->with('success','Item has added Successfully !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = Item::find($id);

        if(File::exists('item/'.$items->image)){
        File::delete('item/'.$items->image);
       }

        $items->delete();

        return redirect()->route('item.index')->with('success','Deleted Successfully !!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $items = Item::find($id);
       $categories= Category::all();
       return view('admin.item.edit',compact('items','categories'));
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
         $items = Item::find($id);
         $this->validate($request,[
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
            'image'=>'required'
            
                    ],
        [
         'name.required'=>'Please Provide a Name',
         'description.required'=>'Please Provide Description',
         'price.required'=>'Please Provide a Price',
         'image.required'=>'Please Provide a Image',
         
        ]
);
          //Data Edit
        
        $items->name = $request->name;
        $items->description = $request->description;
        $items->category_id = $request->category_id;
        $items->price = $request->price;


        //image Edit
       
        if($request->file('image')){
            $image = $request->file('image');
            $img = time().'.'.$image->getClientOriginalExtension();
            $location = public_path ('item/'.$img);
            
       
             if(!$img){
              Image::make($image)->save($location);  
                   }
                 else{
               File::delete('item/'.$items->image);
               Image::make($image)->save($location);
                       }

             $items->image = $img;

        }

        $items->save();
       return redirect()->route('item.index')->with('success','Item has Edited Successfully !!');
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
