@extends('backend.layout.master')
@section('title')
Chef Edit
@endsection
@push('admin_style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


@endpush

@section('content')
@include('backend.layout.inc.breadcrumb',['pagename'=>'Chef Edit Form'])

<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-start">
            <a href="{{ route('chef.index') }}" class="btn btn-primary"> <i class="fa-solid fa-backward"></i> Back to Chefs</a>
        </div>
    </div>
</div>
<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body mt-2">
            <form action="{{ route('chef.update',$chefs->slug) }}"
           enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3 col-12">
                <label for="chef_name" class="form-label">Chef Name  <span class="text-danger">*</span></label>
                <input type="text" name="name" value="{{ $chefs->name }}" placeholder="enter chef name" class="form-control
                @error('name')
                is-invalid
                @enderror">
                @error('name')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="mb-3 col-12">
                <label for="chef_position" class="form-label">Position <span class="text-danger">*</span></label>
                <input type="text" name="position" value="{{ $chefs->position }}" placeholder="enter chef position" class="form-control
                @error('position')
                is-invalid
                @enderror">
                @error('position')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="mb-3 col-12">
                <label for="description" class="form-label">Chef Description  </label>
                <textarea name="description" id="" placeholder="chef description" cols="30" rows="5" class="form-control
                @error('description')
                is-invalid
                @enderror">{{ $chefs->description }}</textarea>
                @error('description')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="col-12 mb-3">
                <label for="chef_image" class="form-label">
                    Chef Image <span class="text-danger">*</span>
                </label>
                <input type="file" data-default-file="{{ asset('uploads/chef') }}/{{ $chefs->chef_image }}" name="chef_image" class=" dropify form-control @error('chef_image')
                is-invalid
                @enderror">
                @error('chef_image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class=" mb-3 form-check form-switch">
                <input class="form-check-input" type="checkbox" name="is_active" role="switch" id="activeStatus" @if ($chefs->is_active==1)
                checked
                @endif>
                <label class="form-check-label" for="activeStatus">Active or Inactive</label>
              </div>
              <div class="mt-5">
                <button type="submit" class="btn btn-warning">Update</button>
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
