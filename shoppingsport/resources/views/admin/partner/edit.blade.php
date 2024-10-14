@extends('admin.layout.index')

@section('content')
<style>
     .cke_notifications_area{
        display: none;
    }
    .error{
        color: red;
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
                <a href="#">Đối tác</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#"> Sửa Đối tác</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center" style="justify-content: center" >

                        <h4 class="card-title">Sửa Đối tác</h4>

                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            <form method="POST" id="savepartner" action="{{ route('admin.partner.editsubmit', ['id'=>$partner->id]) }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-lg-6 add_product">
                                        <div class="form-group">
                                            <label for="name" class="form-label">Tên công ty</label>
                                            <input type="text" class="form-control" name="name" id="namecompany" value="{{ $partner->name }}" >
                                            <p class="error" id="name_namecompany"></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="contact_person" class="form-label">Người đại diện</label>
                                            <input type="text" class="form-control" name="contact_person"  value="{{ $partner->contact_person }}" id="contact_person" >
                                            <div class="invalid-feedback" id="contact_person_error"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="text" class="form-control" name="phone" id="phone"   value="{{ $partner->phone }}" >
                                            <div class="invalid-feedback" id="phone_error"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 add_product">
                                        <div class="form-group">
                                            <label for="address" class="form-label">Địa chỉ</label>
                                            <input type="text" class="form-control" name="address"  value="{{ $partner->address }}" id="address" >
                                            <div class="invalid-feedback" id="address_error"></div>
                                        </div>



                                        <div class="form-group">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email"  value="{{ $partner->email }}" id="email" >
                                            <div class="invalid-feedback" id="email_error"></div>
                                        </div>

                                        <div class="form-group">
                                            <label for="logo" class="form-label">Logo</label>
                                            <div class="custom-file">
                                                <input id="logo" class="custom-file-input @error('logo') is-invalid @enderror" type="file" name="logo"
                                                    accept="image/*" >
                                                <label class="custom-file-label" for="logo">Chọn logo</label>
                                            </div>
                                            <p class="error" id="error_logo"></p>
                                        </div>

                                        <div class="form-group">
                                            <img id="profileImagelogo" style="width:70px; height:auto"
                                                src="{{ isset($partner->logo) && !empty($partner->logo) ? asset($partner->logo) : asset('images/avatar2.jpg') }}"
                                                alt="image logo" class="logo">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group" style="text-align: center">
                                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                                    </div>
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
    $(document).ready(function() {
        $('#logo').on('change', function(event) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#profileImagelogo').attr('src', e.target.result);
            };
            if (event.target.files[0]) {
                reader.readAsDataURL(event.target.files[0]);
            }
        });
    });

</script>
<script>
    $(document).ready(function() {
       $("#savepartner").submit(function(event) {
           event.preventDefault();

           var namecompany = $('#namecompany').val();
           var logo = $('#logo')[0].files;
           var valid = true;

           if (!namecompany) {
               $("#name_namecompany").html("Nhập tên đối tác");
               $("#namecompany").focus();
               valid = false;
           } else if (logo.length == 0) {
                   $("#error_logo").html("Vui lòng chọn logo");
                   $("#logo").focus();
                   valid = false;
           }

           if (namecompany) {
               $("#name_namecompany").empty();
           }


           if (logo.length !=0) {
                   $("error_logo").empty();
           }

           if (valid) {
               $(this).unbind('submit').submit();

           }

       });


   })
</script>


@endsection
