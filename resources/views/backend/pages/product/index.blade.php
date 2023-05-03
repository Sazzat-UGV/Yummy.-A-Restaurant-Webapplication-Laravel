@extends('backend.layout.master')
@section('title')
Food Index
@endsection

@push('admin_style')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

@endpush

@section('content')
@include('backend.layout.inc.breadcrumb',['pagename'=> 'Food List Table'])

   <div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-end">
            <a href="{{ route('product.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add New Food</a>
        </div>
    </div>
    <div class="col-12">
        <div class="table-responsive my-2">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Food Image</th>
                        <th>Last Modified</th>
                        <th>Food Name</th>
                        <th>Category Name</th>
                        <th>Menu Item</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $index=>$product)
                    <tr>
                        <th scope="row">{{ $index+1 }}</th>
                        <td><img src="{{ asset('uploads/product_photo') }}/{{ $product->product_image }}" alt="product_image" class="img-fluid w-25 "></td>
                        <td>{{ $product->updated_at->format('d M Y') }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category->title }}</td>
                        <td>{{ $product->menu_item }}</td>
                        <td>${{ $product->price }}</td>
                        <td><span class=" badge  @if ($product->is_active==1)
                            bg-success
                        @else
                        bg-danger
                        @endif">Active</span></td>
                        <td><div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Setting
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{ route('product.edit',$product->slug) }}"><i
                                class="fa-regular fa-pen-to-square"></i> Edit</a></li>
                              <li>
                                <form action="{{ route('product.destroy',$product->slug) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item show_confirm" data-toggle="tooltip"><i
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
