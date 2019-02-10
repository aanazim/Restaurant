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
            <h4 class="card-title ">Edit  Links</h4>
           
          </div>
          <div class="card-body">
            <div class="table-responsive">

              <form method="POST" action="{{ route('link.update', $link->id) }}" >
                @csrf
                @method('PUT')
                <div class="col-md-12">
                  <div class="form-group" >
                    <label for="facebook">Facebook</label>
                    <input type="text" id="facebook" name="facebook" class="form-control" value="{{ $link->facebook }}">
                  </div>

                  <div class="form-group" class="form-control">
                    <label for="twitter">Twitter</label>
                    <input id="twitter" name="twitter" class="form-control" type="text" value="{{ $link->twitter }}">
                  </div>
                  

                   <div class="col-md-12">
                  <div class="form-group" >
                    <label for="google">Google</label>
                    <input type="text" id="google" name="google" class="form-control" value="{{ $link->google }}">
                  </div>

                   <div class="col-md-12">
                  <div class="form-group" >
                    <label for="instagram">Instagram</label>
                    <input type="text" id="instagram" name="instagram" class="form-control" value="{{ $link->instagram }}">
                  </div>
                  
                </div>

                <a href="{{route('link.index')}}" class="btn btn-danger">Back</a>
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