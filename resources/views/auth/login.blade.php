@extends('layouts.app')


@section('title','login')

@push('css')
 <style>
   .wrapper {
    position: relative;
    top: 0;
    height: 0px;
  }
 </style>
@endpush


@section('content')

  
<div class="content">

    @include('layouts.partial.msg')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Login</h4>
           
          </div>
          <div class="card-body">
            <div class="table-responsive">

              <form method="POST" action="{{route('login')}}">
                @csrf
                
                 <div class="col-md-8 offset-md-2">
                  <div class="form-group" >
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{old('email')}}" required>
                  </div>
                </div>

                <div class="col-md-8 offset-md-2">
                  <div class="form-group" >
                    <label for="password">Passward</label>
                    <input type="password" id="passward" name="password" class="form-control"  required>
                  </div>
                </div>


                <a href="{{route('welcome')}}" class="btn btn-danger">Back</a>
                    <button type="submit" class="btn btn-primary">login</button>
                
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