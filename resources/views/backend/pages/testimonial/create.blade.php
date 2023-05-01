@extends('backend.layout.master')
@section('title')
Testimonial Create
@endsection
@push('admin_style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


@endpush

@section('content')
@include('backend.layout.inc.breadcrumb',['pagename'=>'Testimonial Create Form'])

<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-start">
            <a href="{{ route('testimonial.index') }}" class="btn btn-primary"> <i class="fa-solid fa-backward"></i> Back to Testimonials</a>
        </div>
    </div>
</div>
<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body mt-2">
            <form action="{{ route('testimonial.store') }}"
           enctype="multipart/form-data" method="POST">
            @csrf

            <div class="mb-3 col-12">
                <label for="client_name" class="form-label">Client Name  <span class="text-danger">*</span></label>
                <input type="text" name="client_name" placeholder="enter client name" class="form-control
                @error('client_name')
                is-invalid
                @enderror">
                @error('client_name')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="mb-3 col-12">
                <label for="client_designation" class="form-label">Client Designation  <span class="text-danger">*</span></label>
                <input type="text" name="client_designation" placeholder="enter client designation" class="form-control
                @error('client_designation')
                is-invalid
                @enderror">
                @error('client_designation')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="mb-3 col-12">
                <label for="client_message" class="form-label">Client Message  <span class="text-danger">*</span></label>
                <textarea name="client_message" id="" cols="30" rows="5" class="form-control
                @error('client_message')
                is-invalid
                @enderror"></textarea>
                @error('client_message')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="mb-3 col-12">
                <label for="rating" class="form-label">Rating  <span class="text-danger">*</span></label>
                <input type="number" min="0" max="5" name="rating" class="form-control
                @error('rating')
                is-invalid
                @enderror">
                @error('rating')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="col-12 mb-3">
                <label for="client_image" class="form-label">
                    Client Image <span class="text-danger">*</span>
                </label>
                <input type="file" name="client_image" class=" dropify form-control @error('client_image')
                is-invalid
                @enderror">
                @error('client_image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class=" mb-3 form-check form-switch">
                <input class="form-check-input" type="checkbox" name="is_active" role="switch" id="activeStatus" checked>
                <label class="form-check-label" for="activeStatus">Active or Inactive</label>
              </div>
              <div class="mt-5">
                <button type="submit" class="btn btn-success">Store</button>
              </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('admin_script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $('.dropify').dropify();
</script>
@endpush
