@extends('layout.index')

@section('css')
<link rel="stylesheet" href="frontend/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="frontend/css/login.css">
@endsection

@section('content')

<section class="inner-pages">
    <div class="custom-form">
        <div class="close"><a href="{{asset('')}}">x</a></div>
        <div class="img"> <img src="data/logongang.png"> </div>
        <form id="validateForm" action="profile/login" method="post" name="registerform">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <div class="form-group">
                <label>Địa chỉ email <span class="colored">*</span></label>
                <input name="email" type="text" placeholder="Nhập địa chỉ email">
            </div>
            <div class="form-group">
                <label>Mật khẩu <span class="colored">*</span></label>
                <input name="password" type="password" placeholder="Nhập mật khẩu">
            </div>
            <div class="lost_password tabs-menu">
                <a href="profile/resetpassword">Lấy lại mật khẩu?</a>
            </div>
            <div id="alert"></div>
            @if(session('Alerts')) <div id="hidden" class="colored"> {{session('Alerts')}} ! </div> @endif
            @if(count($errors) > 0)
                @foreach($errors->all() as $err)
                <div class="colored">{{$err}}</div>
                @endforeach
            @endif
            <div class="submit"><button type="submit" class="log-submit-btn"><span>Đăng nhập</span></button></div>
        </form>
        <div class="clearfix"></div>
        <div class="mt-4">
            Bạn chưa có tài khoản? <a href="profile/signup">Đăng ký ngay</a>
        </div>
    </div>
</section>

@endsection

@section('js')
<script src="frontend/js/jquery-3.5.1.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
<script src="admin_asset/js/validate.js"></script>
@endsection