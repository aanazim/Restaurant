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
            <h4 class="card-title ">Edit  About</h4>
           
          </div>
          <div class="card-body">
            <div class="table-responsive">

              <form method="POST" action="{{ route('about.update', $abouts->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-12">
                  <div class="form-group" >
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ $abouts->title }}">
                  </div>

                  <div class="form-group" class="form-control">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" class="form-control">{{ $abouts->description }}</textarea>
                  </div>

                  <div style="margin-bottom: 20px;">
                    <label for="image" style="margin-bottom: 10px;">Image</label>
                    <br>
                    <input type="file" id="image" name="image">
                  </div>
                </div>

                <a href="{{route('about.index')}}" class="btn btn-danger">Back</a>
                    <button type="submit" class="btn btn-info">Edit</button>
                
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