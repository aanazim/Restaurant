@extends('layouts.app')

@section('title')
@endsection

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                  </div>
                  <p class="card-category">Category/Item</p>
                  <h3 class="card-title">{{$categoryCount}}/{{$itemCount}}
                    
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">Info</i>
                    <a href="#pablo">Total Categories and Items</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">slideshow</i>
                  </div>
                  <p class="card-category">Slider Count</p>
                  <h3 class="card-title">{{$sliderCount}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_image</i> <a href="{{route('slider.index')}}">More Details</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">info_outline</i>
                  </div>
                  <p class="card-category">Reservations</p>
                  <h3 class="card-title">{{$reservations->count()}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">local_offer</i> Not Confirmed Reservations
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-twitter"></i>
                  </div>
                  <p class="card-category">Contacts</p>
                  <h3 class="card-title">{{$contactCount}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i> Just Updated
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


 
<div class="content">

  @include('layouts.partial.msg')

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">

          <div class="card-header card-header-primary">
            <h4 class="card-title ">Reservation</h4>
           
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="Table" class="table table-striped table-bordered" style="width:100%">
                <thead class=" text-primary">
                  <th>ID</th>
                  <th> Name</th>
                  <th>Phone</th>
                  <th>Status</th>
                   <th>Created_at</th>
                   <th>Action</th>

                </thead>
                <tbody>
                  @foreach( $reservations as $key => $reservation )
                  <tr>
                    <td> {{$key + 1 }}</td>
                    <td> {{ $reservation->name}}</td>
                    <td>{{ $reservation->phone }}</td>
                     <td>
                     @if( $reservation->status == true)
                     <span class="btn btn-info">Confirmed</span>
                     @else
                     <span class="btn btn-danger">Not Confirmed Yet</span>
                     @endif
                     </td>
                    <td>{{ $reservation->created_at }}</td>
                    
                    <td>
                      @if($reservation->status == false)
                      <a href="{{route('status.edit',$reservation->id)}}" class="btn btn-info">Edit</a>
                       @endif
                        <a href="{{route('status.destroy',$reservation->id)}}" class="btn btn-danger">Delete</a>
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

