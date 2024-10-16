@extends('admin.layout.index')

@section('content')
<style>
     .cke_notifications_area{
        display: none;
    }
</style>
<div class="page-inner">
    <div class="page-header">
        <ul class="breadcrumbs mb-3">
            <li class="nav-home">
                <a href="#">
                    <i class="icon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Đánh giá</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#"> Sửa đánh giá</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center" style="justify-content: center" >

                        <h4 class="card-title">Sửa đánh giá</h4>

                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <form method="POST" enctype="multipart/form-data" id="savecustomer"
                            action="{{ route('admin.reviews.update', ['id' => $reviews->id]) }}">
                            @csrf
                            <div class="row">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="form-label">Tên:</label>
                                            <input type="text" class="form-control" id="namecustomer" name="name" value="{{ $reviews->name }}" >
                                            <p class="error" id="error_namecustomer"></p>
                                        </div>


                                    </div>
                                    <div class="col-6">

                                        <div class="form-group">
                                            <label for="web" class="form-label">Địa chỉ:</label>
                                            <input type="text" class="form-control" id="addresscustomer" name="address" value="{{ $reviews->address }}">
                                            <p class="error" id="error_addresscustomer"></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="content" class="form-label">Nội Dung:</label>
                                    <textarea class="form-control" id="contentcustomer" name="content" rows="4" >{{ $reviews->content }}</textarea>
                                    <p class="error" id="error_contentcustomer"></p>
                                </div>

                                <div class="form-group">
                                    <label for="logo" class="form-label">Avatar</label>
                                    <div class="custom-file">
                                        <input id="logo"
                                            class="custom-file-input @error('logo') is-invalid @enderror" type="file"
                                            name="avatar" accept="image/*">
                                        <label class="custom-file-label" for="logo">Chọn avatar</label>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <img id="profileImagelogo" style="width:100px; height:auto"
                                    src="{{ isset($reviews->avatar) && !empty($reviews->avatar) ? asset($reviews->avatar) : asset('images/avatar2.jpg') }}"
                                        alt="image logo" class="logo">
                                </div>
                            </div>

                            <div class="modal-footer m-2">
                                <button type="submit" class="btn btn-primary w-md" >Xác nhận</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.19.1/standard-all/ckeditor.js"></script>
<script>
    document.getElementById('logo').addEventListener('change', function(event) {
               const input = event.target;
               const reader = new FileReader();

               reader.onload = function(e) {
                   document.getElementById('profileImagelogo').src = e.target.result;
               };

               if (input.files && input.files[0]) {
                   reader.readAsDataURL(input.files[0]);
               }
           });
</script>
<script>
    $(document).ready(function() {

$("#savecustomer").submit(function(event) {
    event.preventDefault();

    var namecustomer = $('#namecustomer').val();
    var address = $('#addresscustomer').val();
    console.log($('#addresscustomer'));
    var contentcustomer = $('#contentcustomer').val();
    var logo = $('#logo')[0].files;
    var valid = true;

    if (!namecustomer) {
        $("#error_namecustomer").html("Nhập tên khách hàng");
        $("#namecustomer").focus();
        valid = false;
    } else if (!address) {
            $("#error_addresscustomer").html("Nhập địa chỉ");
            $("#addresscustomer").focus();
            valid = false;
    }else if (!contentcustomer) {
            $("#error_contentcustomer").html("Nhập lội dung");
            $("#contentcustomer").focus();
            valid = false;
    }

    if (namecustomer) {
        $("#name_namecustomer").empty();
    }
    if (address) {
        $("#name_addresscustomer").empty();
    }
    if (contentcustomer) {
        $("#error_contentcustomer").empty();
    }


    if (valid) {
        $(this).unbind('submit').submit();

    }

});


})
</script>


@endsection
