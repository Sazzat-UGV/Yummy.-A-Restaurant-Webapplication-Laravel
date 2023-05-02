@extends('backend.layout.master')
@section('title')
Event Edit
@endsection
@push('admin_style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


@endpush

@section('content')
@include('backend.layout.inc.breadcrumb',['pagename'=>'Event Edit Form'])

<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-start">
            <a href="{{ route('event.index') }}" class="btn btn-primary"> <i class="fa-solid fa-backward"></i> Back to Events</a>
        </div>
    </div>
</div>
<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body mt-2">
            <form action="{{ route('event.update',$events->slug) }}"
           enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3 col-12">
                <label for="event_name" class="form-label">Event Name  <span class="text-danger">*</span></label>
                <input type="text" name="event_name" value="{{ $events->event_name }}" placeholder="enter event name" class="form-control
                @error('event_name')
                is-invalid
                @enderror">
                @error('event_name')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="mb-3 col-12">
                <label for="description" class="form-label">Event Description  <span class="text-danger">*</span></label>
                <textarea name="description" id=""  placeholder="event description" cols="30" rows="5" class="form-control
                @error('description')
                is-invalid
                @enderror">{{ $events->event_name}}</textarea>
                @error('description')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="mb-3 col-12">
                <label for="price" class="form-label">Price  <span class="text-danger">*</span></label>
                <input type="number" value="{{ $events->price }}" min="0"  name="price" class="form-control
                @error('price')
                is-invalid
                @enderror">
                @error('price')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="col-12 mb-3">
                <label for="event_image" class="form-label">
                    Event Image <span class="text-danger">*</span>
                </label>
                <input type="file" name="event_image" data-default-file="{{ asset('uploads/event_photo') }}/{{ $events->event_image }}" class=" dropify form-control @error('event_image')
                is-invalid
                @enderror">
                @error('event_image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class=" mb-3 form-check form-switch">
                <input class="form-check-input" type="checkbox" name="is_active" role="switch" id="activeStatus" @if ($events->is_active)
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
