@extends('backend.layout.master')
@section('title')
Event Index
@endsection

@push('admin_style')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

@endpush

@section('content')
@include('backend.layout.inc.breadcrumb',['pagename'=> 'Event List Table'])

   <div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-end">
            <a href="{{ route('event.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add New Event</a>
        </div>
    </div>
    <div class="col-12">
        <div class="table-responsive my-2">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Last Modified</th>
                        <th>Event Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $events as $index=>$event)
                    <tr>
                        <th scope="row">{{ $index+1 }}</th>
                        <td>{{ $event->updated_at->format('d M Y') }}</td>
                        <td>{{ $event->event_name }}</td>
                        <td>{{ $event->price }}</td>
                        <td><button type="button" class="btn badge bg-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $event->id }}">
                            Description
                          </button>

                          <!-- Modal -->
                          <div class="modal fade" id="exampleModal{{ $event->id }}" tabindex="-1" aria-labelledby="exampleModal{{ $event->id }}Label" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModal{{ $event->id }}Label">Event Description</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="{{ asset('uploads/event_photo') }}/{{ $event->event_image }}" class="img-fluid w-100" alt="Event Image">
                                        </div>
                                        <h5 class="mt-2 text-bold">Description</h5>
                                        <div class="col-12">
                                            {{ $event->description }}
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

                        <td><span class=" badge  @if ($event->is_active==1)
                            bg-success
                        @else
                        bg-danger
                        @endif">Active</span></td>
                        <td><div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Setting
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{ route('event.edit',$event->slug) }}"><i
                                class="fa-regular fa-pen-to-square"></i> Edit</a></li>
                              <li>
                                <form action="{{ route('event.destroy',$event->slug) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item"><i
                                        class="fa-solid fa-trash"></i> Delete</button>
                                </form></li>
                            </ul>
                          </div></td>
                    </tr>
                    @endforeach
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

<script>
    $(document).ready(function () {
    $('#example').DataTable({
        pagingType: 'first_last_numbers',
    });
});
</script>

@endpush
