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
            <div class="table-responsive">
              <table id="Table" class="table table-striped table-bordered" style="width:100%">

                <thead class=" text-primary">
                  <th>ID</th>
                  <th> Name</th>
                  <th>Subject</th>
                   <th>Sent At</th>
                   <th>Action</th>
                </thead>

                <tbody>
                     @foreach( $contacts as $key => $contact )
                  <tr>
                    <td> {{$key + 1 }}</td>
                    <td> {{ $contact->Name }}</td>
                    <td>{{ $contact->subject }} </td>
                    <td>{{ $contact->created_at }}</td>
  
                    <td>
                      <a href="{{route('contact.show',$contact->id)}}" class="btn btn-info">Details</a>
                      <a href="{{route('contact.delete',$contact->id)}}" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                    @endforeach 
                </tbody>

              </table>

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