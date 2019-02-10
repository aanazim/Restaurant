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
            <h4 class="card-title ">Add New Category</h4>
           
          </div>
          <div class="card-body">
            <div class="table-responsive">

              <form method="POST"action="{{route('category.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                  <div class="form-group" >
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control">
                  </div>
                </div>

                <a href="{{route('category.index')}}" class="btn btn-danger">Back</a>
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