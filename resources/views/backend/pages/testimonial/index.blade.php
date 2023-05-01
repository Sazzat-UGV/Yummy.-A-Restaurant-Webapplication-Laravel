@extends('backend.layout.master')
@section('title')
Testimonial Index
@endsection

@push('admin_style')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

@endpush

@section('content')
@include('backend.layout.inc.breadcrumb',['pagename'=> 'Testimonial List Table'])

   <div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-end">
            <a href="{{ route('testimonial.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add New Testimonial</a>
        </div>
    </div>
    <div class="col-12">
        <div class="table-responsive my-2">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Client Image</th>
                        <th>Last Modified</th>
                        <th>Client Name</th>
                        <th>Client Designation</th>
                        <th>Client Message</th>
                        <th>Rating</th>
                        <th>Status</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $testimonials as $index=>$testimonial)
                    <tr>
                        <th scope="row">{{ $index+1 }}</th>
                        <td><img src="{{ asset('uploads/testimonial/') }}/{{ $testimonial->client_image }}" alt="product_image" class="img-fluid w-25 rounded"></td>
                        <td>{{ $testimonial->updated_at->format('d M Y') }}</td>
                        <td>{{ $testimonial->client_name }}</td>
                        <td>{{ $testimonial->client_designation }}</td>
                        <td><button type="button" class="btn badge bg-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $testimonial->id }}">
                            Message
                          </button>

                          <!-- Modal -->
                          <div class="modal fade" id="exampleModal{{ $testimonial->id }}" tabindex="-1" aria-labelledby="exampleModal{{ $testimonial->id }}Label" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModal{{ $testimonial->id }}Label">Client Message</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                                            {{ $testimonial->client_message }}
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
                        <td>{{ $testimonial->rating}}</td>
                        <td><span class=" badge  @if ($testimonial->is_active==1)
                            bg-success
                        @else
                        bg-danger
                        @endif">Active</span></td>
                        <td><div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Setting
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{ route('testimonial.edit',$testimonial->client_name_slug) }}"><i
                                class="fa-regular fa-pen-to-square"></i> Edit</a></li>
                              <li>
                                <form action="{{ route('testimonial.destroy',$testimonial->client_name_slug) }}" method="POST">
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
