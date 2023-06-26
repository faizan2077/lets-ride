
@include('admin.header')

<body class="crm_body_bg">
<div class="main_content_iner ">
    <div class="container-fluid p-0">
    <div class="row justify-content-center">
    <div class="col-12">
    <div class="dashboard_header mb_50">
    <div class="row">
    <div class="col-lg-6">
    {{-- <div class="dashboard_header_title">
    <h3> Login</h3>
    </div> --}}
    </div>
    <div class="col-lg-6">
    {{-- <div class="dashboard_breadcam text-end">
    <p><a href="index-2.html">Dashboard</a> <i class="fas fa-caret-right"></i> login</p>
    </div> --}}
    </div>
    </div>
    </div>
    </div>
    <div class="col-lg-12">
    <div class="white_box mb_30">
    <div class="row justify-content-center">
    <div class="col-lg-6">

    <div class="modal-content cs_modal">
    <div class="modal-header justify-content-center theme_bg_1">
    <h5 class="modal-title text_white">Lets Ride Admin Log in</h5>
    </div>
    @if(session('error'))
    <div class="alert alert-danger">{{session('error')}}</div>
@endif

    <div class="modal-body">
    <form  method="POST" action="{{ url('manage-admin/admin_login') }}" >
        @csrf
    <div class="">
    <input type="email" name="email" class="form-control" placeholder="Enter your email">
    </div>
    <div class="">
    <input type="password" name="password" class="form-control" placeholder="Password">
    </div>
    <button type="submit" class="btn_1 full_width text-center">Log in</button>
    {{-- <p>Need an account? <a data-bs-toggle="modal" data-bs-target="#sing_up" data-bs-dismiss="modal" href="#"> Sign Up</a></p>
    <div class="text-center">
    <a href="#" data-bs-toggle="modal" data-bs-target="#forgot_password" data-bs-dismiss="modal" class="pass_forget_btn">Forget Password?</a> --}}
    </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

</html>
</body>
