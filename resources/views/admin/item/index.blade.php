@extends('layouts.app')


@section('title','Item')
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

        <a href="{{route('item.create')}}" class="btn btn-info" >Add New Item</a>
        <div class="card">

          <div class="card-header card-header-primary">
            <h4 class="card-title ">All Items</h4>
           
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="Table" class="table table-striped table-bordered" style="width:100%">
                <thead class=" text-primary">
                  <th>ID</th>
                  <th> Name</th>
                  <th>description</th>
                  <th>Price</th>
                  <th>Image</th>
                  <th>Category Name</th>
                  <th>Created_at</th>
                   <th>Updated_at</th>
                   <th>Action</th>

                </thead>
                <tbody>
                  @foreach( $items as $key => $item )
                  <tr>
                    <td> {{ $key + 1 }}</td>
                    <td> {{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->price}}</td>
                    <td> <img src="{{asset('item/'.$item->image)}}" alt="#" class="img-fluid" style="height: 90px;width: 120px;"></td>
                    <td>{{$item->category->name}}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td><a href="{{route('item.edit',$item->id)}}" class="btn btn-info">Edit</a>

                        <a href="{{route('item.show',$item->id)}}" class="btn btn-danger">Delete</a>
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