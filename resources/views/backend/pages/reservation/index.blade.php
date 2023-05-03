@extends('backend.layout.master')
@section('title')
Reservation Index
@endsection

@push('admin_style')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

@endpush

@section('content')
@include('backend.layout.inc.breadcrumb',['pagename'=> 'Reservation List Table'])

   <div class="row">
    <div class="col-12">
        <div class="table-responsive my-2">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Create Time</th>
                        <th>Client Name</th>
                        <th>Reservation For</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>View Details</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($reservations as $index=>$reservation)
                    <tr>
                        <th scope="row">{{ $index+1 }}</th>
                        <td>{{ $reservation->created_at->format('d M Y h:i') }}</td>
                        <td>{{ $reservation->name }}</td>
                        <td>{{ $reservation->date }}</td>
                        <td>{{ $reservation->time }}</td>
                        <td>
                            @if ($reservation->status==0)
                            <span class="badge bg-warning">Pending</span>
                            @elseif ($reservation->status==1)
                            <span class="badge bg-success">Confirmd</span>
                            @elseif ($reservation->status==2)
                            <span class="badge bg-danger">Rejected</span>
                        @endif</td>
                        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $reservation->id }}">
                            Details <i class="fa-regular fa-greater-than"></i>
                          </button>
                          <div class="modal fade" id="exampleModal{{ $reservation->id }}" tabindex="-1" aria-labelledby="exampleModal{{ $reservation->id }}Label" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModal{{ $reservation->id }}Label">Reservation Details</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                                            <p>Name: {{ $reservation->name }}</p>
                                            <p>Phone: {{ $reservation->phone }}</p>
                                            <p>Email: {{ $reservation->email  }}</p>
                                            <p>No. of People: {{ $reservation->no_of_people  }}</p>
                                            <p>Message: {{ $reservation->message  }}</p>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div></td>

                        <td><div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Activity
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{ route('user.reservatdionStatus',[$reservation->id,1]) }}"><i class="fa-solid fa-check"></i> Confirm</a></li>
                              <li><a class="dropdown-item" href="{{ route('user.reservatdionStatus',[$reservation->id,2]) }}"><i class="fa-solid fa-xmark"></i> Rejected</a></li>
                              <li>
                                <form action="{{ route('user.reservatdionDelete',$reservation->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item show_confirm" data-toggle="tooltip"><i
                                        class="fa-solid fa-trash"></i> Delete</button>
                                </form></li>
                            </ul>
                          </div>
                            </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="50">
                            <p class="text-center">No Reservation Found !!!</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        </div>
    </div>


@endsection

@push('admin_script')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function () {
    $('#example').DataTable({
        pagingType: 'first_last_numbers',
   });
    $('.show_confirm').click(function(event){
        let form = $(this).closest('form');
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            }
            })
    })
});
</script>

@endpush
