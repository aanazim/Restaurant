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
            <h4 class="card-title ">Add New Sliders</h4>
           
          </div>
          <div class="card-body">
            <div class="table-responsive">

              <form method="POST"action="{{route('slider.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                  <div class="form-group" >
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control">
                  </div>

                  <div class="form-group" class="form-control">
                    <label for="sub_title">Sub Title</label>
                    <input type="text" id="sub_title" name="sub_title" class="form-control">
                  </div>

                  <div style="margin-bottom: 20px;">
                    <label for="image" style="margin-bottom: 10px;">Image</label>
                    <br>
                    <input type="file" id="image" name="image">
                  </div>
                </div>

                <a href="{{route('slider.index')}}" class="btn btn-danger">Back</a>
                    <button type="submit" class="btn btn-primary">Save</button>
                
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