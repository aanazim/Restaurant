@extends('layouts.app')


@section('title','link')
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

          <div class="card-header card-header-primary">
            <h4 class="card-title ">Link</h4>
           
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="Table" class="table table-striped table-bordered" style="width:100%">
                <thead class=" text-primary">
                  <th>ID</th>
                  <th> Facebook</th>
                  <th>Twitter</th>
                  <th>Google</th>
                  <th>Instagram</th>
                  <th>Created_at</th>
                  <th>Updated_at</th>
                  <th>Action</th>

                </thead>
                <tbody>
                  
                  <tr>
                    <td> {{ $link->id }}</td>
                    <td> {{ $link->facebook }}</td>
                    <td> {{ $link->twitter }}</td>
                    <td> {{ $link->google }}</td>
                    <td> {{ $link->instagram }}</td>
                    <td> {{ $link->created_at }}</td>
                    <td> {{ $link->updated_at }}</td>

                    <td><a href="{{route('link.edit',$link->id)}}" class="btn btn-info">Edit</a>

                        <a href="{{route('link.show',$link->id)}}" class="btn btn-danger">Delete</a>
                    </td>

                  </tr>
                
                   
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