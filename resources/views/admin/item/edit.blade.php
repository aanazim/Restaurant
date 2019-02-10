@extends('layouts.app')


@section('title','Slider')

@push('css')
 
@endpush


@section('content')

  
<div class="content">

    @include('layouts.partial.msg')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Edit  Item</h4>
           
          </div>
          <div class="card-body">
            <div class="table-responsive">

              <form method="POST" action="{{ route('item.update', $items->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-12">
                  <div class="form-group" >
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $items->name }}">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group" >
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="20" rows="8" class="form-control" value="{{ $items->description }}"></textarea>
                  </div>
                </div>

                 <div class="col-md-12">
                  <div class="form-group" >

                    <label class="control-label">Category Name</label>
                    <select class="form-control" name="category_id" > 
                      @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                    </select>

                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group" >
                    <label for="price">Price</label>
                    <input type="integer" id="price" name="price" class="form-control" value="{{ $items->price }}">
                  </div>
                </div>

                <div class="col-md-12">
                  <div style="margin-bottom: 20px;" >
                    <label for="image" style="margin-bottom: 15px;">Image</label>
                    <br>
                    <input type="file" id="image" name="image" value="{{ $items->image }}">
                  </div>
                </div>


                <a href="{{route('item.index')}}" class="btn btn-danger">Back</a>
                    <button type="submit" class="btn btn-info">Save</button>
                
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection





@push('scripts')

@endpush