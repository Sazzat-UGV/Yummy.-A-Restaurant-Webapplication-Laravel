@extends('backend.layout.master')
@section('title')
Image Create
@endsection
@push('admin_style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


@endpush

@section('content')
@include('backend.layout.inc.breadcrumb',['pagename'=>'Image Add Form'])

<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-start">
            <a href="{{ route('gallery.index') }}" class="btn btn-primary"> <i class="fa-solid fa-backward"></i> Back to Images</a>
        </div>
    </div>
</div>
<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body mt-2">
            <form action="{{ route('gallery.store') }}"
           enctype="multipart/form-data" method="POST">
            @csrf

            <div class="col-12 mb-3">
                <label for="image" class="form-label">
                    Image <span class="text-danger">*</span>
                </label>
                <input type="file" name="image" class=" dropify form-control @error('image')
                is-invalid
                @enderror">
                @error('image')
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
