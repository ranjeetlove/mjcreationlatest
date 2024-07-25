@extends('layouts.admin')
@section('styles')
<link href="{{asset('assets/admin/css/product.css')}}" rel="stylesheet"/>
@endsection

@section('content')
<div class="content-area">
    <div class="mr-breadcrumb">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="heading">{{ __("Bulk Gallery Image Upload") }}</h4>
                <ul class="links">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">{{ __("Dashboard") }} </a>
                    </li>
                    <li>
                        <a href="javascript:;">{{ __("Products") }} </a>
                    </li>
                    <li>
                        <a href="{{ route('admin-prod-index') }}">{{ __("All Products") }}</a>
                    </li>
                    <li>
                        <a href="{{ route('admin-prod-imgae-import') }}">{{ __("Bulk Gallery Image Upload") }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="add-product-content">
        <div class="row">
            <div class="col-lg-12 p-5">
                <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center;"></div>
                <form id="bulkImageUploadForm" action="{{route('admin-prod-gallery-image-importsubmit')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    @include('includes.admin.form-both')
                    <div class="col-lg-12 d-flex justify-content-center text-center">
                        <div class="left-area mr-4">
                            <h4 class="heading">{{ __("Upload Image") }} *</h4>
                        </div>
                        <span class="file-btn">
                            <input type="file" name="images[]" multiple>
                        </span>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 mt-4 text-center">
                            <button class="mybtn1 mr-5" type="submit">{{ __("Start Upload") }}</button>
                        </div>
                    </div>
                </form>
                <div id="successMessage" class="alert alert-success mt-4" style="display: none;"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('assets/admin/js/product.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#bulkImageUploadForm').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#successMessage').html(response.message).fadeIn();
                     setTimeout(function() {
                        $('#successMessage').fadeOut();
                    }, 5000);
                    $('#bulkImageUploadForm')[0].reset();
                },
                error: function(response) {
                    $('#successMessage').html('An error occurred while uploading the images.').fadeIn();
                }
            });
        });
    });
</script>
@endsection
