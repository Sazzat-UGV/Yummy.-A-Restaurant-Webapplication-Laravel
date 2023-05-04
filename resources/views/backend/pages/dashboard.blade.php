@extends('backend.layout.master')
@section('title')
Dashboard
@endsection
@push('admin_style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')

@include('backend.layout.inc.breadcrumb',['pagename'=>'Dashboard'])

<section class="section dashboard">
    <div class="row">

          <div class="col-xxl-3 col-md-3">
            <div class="card info-card sales-card">

              <div class="card-body">
                <h5 class="card-title">Category</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-list"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $total_category }}</h6>
                    <span class="text-muted small pt-2 ps-1">Category</span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->


          <div class="col-xxl-3 col-md-3">
            <div class="card info-card revenue-card">
              <div class="card-body">
                <h5 class="card-title">Total Food Item</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-list"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $total_food_item }}</h6>
                    <span class="text-muted small pt-2 ps-1">Items</span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->


          <div class="col-xxl-3 col-md-3">
            <div class="card info-card customers-card">

              <div class="card-body">
                <h5 class="card-title">Chefs</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $total_chefs }}</h6>
                    <span class="text-muted small pt-2 ps-1">Chefs</span>

                  </div>
                </div>
              </div>

            </div>
          </div>


          <div class="col-xxl-3 col-md-3">
            <div class="card info-card customers-card">

              <div class="card-body">
                <h5 class="card-title">Reservation <span class="text-success text-bold">| Active</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-card-list"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $reservation_confirm }}</h6><span class="text-muted small pt-2 ps-1">Reservations</span>

                  </div>
                </div>
              </div>

            </div>
          </div>
    </div>

    <div class="row">
        <h4>Reservations </h4>
        <hr>
        <div class="col-12">
            <div class="div">
                <table class="table table-responsive">
                    <tr>
                        <th>#</th>
                        <th>Client Name</th>
                        <th>Phone</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                    @foreach ($reservations as $index=>$reservation)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $reservation->name }}</td>
                        <td>{{ $reservation->phone }}</td>
                        <td>{{ $reservation->date }}</td>
                        <td>
                            @if ($reservation->status==0)
                            <span class="badge bg-warning">Pending</span>
                            @elseif ($reservation->status==1)
                            <span class="badge bg-success">Confirmd</span>
                            @elseif ($reservation->status==2)
                            <span class="badge bg-danger">Rejected</span>
                        @endif</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    </div>
  </section>
@endsection

