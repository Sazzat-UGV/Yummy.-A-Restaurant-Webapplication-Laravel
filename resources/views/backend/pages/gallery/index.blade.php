@extends('backend.layout.master')
@section('title')
Gallery Index
@endsection

@push('admin_style')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

@endpush

@section('content')
@include('backend.layout.inc.breadcrumb',['pagename'=> 'Gallery Table'])

   <div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-end">
            <a href="{{ route('gallery.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add New Image</a>
        </div>
    </div>
    <div class="col-12">
        <div class="table-responsive my-2">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Create date</th>
                        <th>Last Modified</th>
                        <th>Status</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($galleries as $index=>$gallery)
                    <tr>
                        <th scope="row">{{ $index+1 }}</th>
                        <td><img src="{{ asset('uploads/gallery') }}/{{ $gallery->image }}" alt="_image"gallery class="img-fluid w-25 p-0"></td>
                        <td>{{ $gallery->created_at->format('d M Y') }}</td>
                        <td>{{ $gallery->updated_at->format('d M Y') }}</td>
                        <td><span class=" badge  @if ($gallery->is_active==1)
                            bg-success
                        @else
                        bg-danger
                        @endif">Active</span></td>
                        <td><div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Setting
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{ route('gallery.edit',$gallery->id) }}"><i
                                class="fa-regular fa-pen-to-square"></i> Edit</a></li>
                                <li>
                                    <form action="{{ route('gallery.destroy',$gallery->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item"><i
                                            class="fa-solid fa-trash"></i> Delete</button>
                                        </form></li>
                                    </ul>
                                </div></td>
                            </tr>

                            @empty
                            <tr>
                                <td colspan="50">
                                    <p class="text-center">No Image Found !!!</p>
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

<script>
    $(document).ready(function () {
    $('#example').DataTable({
        pagingType: 'first_last_numbers',
    });
});
</script>

@endpush
