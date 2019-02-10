@extends('layouts.app')


@section('title','Slider')
@push('css')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endpush


@section('content')

<form action="{{ route('status.update',$reservations->id) }}" method="POST">
  @csrf
    <div class="form-group" action="">
    <label for="status" >Status</label>
    <input type="text" id="status" class="form-control" name="status" value="">
    <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Submit</button>
  </div>
</form>
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