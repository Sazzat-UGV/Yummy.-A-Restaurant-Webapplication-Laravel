@extends('backend.layout.master')
@section('title')
Contact Index
@endsection

@push('admin_style')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

@endpush

@section('content')
@include('backend.layout.inc.breadcrumb',['pagename'=> 'Message List Table'])

   <div class="row">
    <div class="col-12">
        <div class="table-responsive my-2">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Create Time</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>View Details</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $index=>$message)
                    <tr>
                        <th scope="row">{{ $index+1 }}</th>
                        <td>{{ $message->created_at->format('d M Y') }}</td>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td><button type="button" class="badge bg-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $message->id }}">
                            Details
                          </button>
                          <div class="modal fade" id="exampleModal{{ $message->id }}" tabindex="-1" aria-labelledby="exampleModal{{ $message->id }}Label" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModal{{ $message->id }}Label">Message Details</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                                            <p>Name: {{ $message->name }}</p>
                                            <p>Email: {{ $message->email  }}</p>
                                            <p>Subject: {{ $message->subject  }}</p>
                                            <p>Message: {{ $message->message  }}</p>
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
                                <form action="{{ route('user.contactDelete',$message->slug) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item"><i
                                        class="fa-solid fa-trash"></i> Delete</button>
                                </form></li>
                            </ul>
                          </div>
                            </td>
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
