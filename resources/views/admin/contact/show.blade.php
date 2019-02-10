@extends('layouts.app')


@section('title','Slider')
@push('css')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endpush


@section('content')

  
<div class="content">

  @include('layouts.partial.msg')

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">

          <div class="card-header card-header-primary">
            <h4 class="card-title ">Contacts</h4>
           
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <strong>Name: {{$contacts->Name}}</strong><br>
                <b>Email:{{$contacts->email}}</b><br>
                <strong>Message:</strong><hr>
                <p>{{$contacts->message}}</p><br>
              </div>

              <a href="{{route('contact.index')}}" class="btn btn-danger">Back</a>
            </div>


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection





@push('scripts')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script>
  $(document).ready(function() {
    $('#Table').DataTable();
} );
</script>


@endpush