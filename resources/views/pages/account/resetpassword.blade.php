@extends('layout.index')

@section('css')
<link rel="stylesheet" href="frontend/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="frontend/css/login.css">
@endsection

@section('content')

<section class="inner-pages signup resetpassword">
    <div class="custom-form">
        <div class="close"><a href="{{asset('')}}">x</a></div>
        <div class="img"> <a href="{{asset('')}}"><img src="data/logongang.png"></a> </div>
        <form id="validateForm" action="profile/resetpassword" method="post" name="registerform">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <input type="hidden" name="note" value="resetpassword" />
            <div class="form-group">
                <label>Địa chỉ email <span class="colored">*</span></label>
                <input name="email" value="{{old('email')}}" type="text" placeholder="Nhập địa chỉ email">
            </div>
            <div class="form-group">
                <label>Mật khẩu mới <span class="colored">*</span></label>
                <input name="password" value="{{old('password')}}" type="password" id="password" placeholder="Nhập mật khẩu">
            </div>
            <div class="form-group">
                <label>Nhập lại mật khẩu <span class="colored">*</span></label>
                <input name="passwordagain" value="{{old('passwordagain')}}" type="password" placeholder="Nhập lại mật khẩu">
            </div>
            <div class="capchar">
                <div class="form-group">
                    <input id="sendcapchar" value="Nhận mã xác nhận qua email" type="button">
                </div>
                <div class="form-group">
                    <input name="sku" value="{{old('sku')}}" type="text" placeholder="Nhập mã xác nhận">
                </div>
            </div>
            <div id="alert">
                @if(session('Alerts')) <div id="hidden"> {{session('Alerts')}} ! </div> @endif
                @if(count($errors) > 0)
                    @foreach($errors->all() as $err)
                    <div class="colored">{{$err}}</div>
                    @endforeach
                @endif
            </div>
            <div class="submit"><button type="submit" class="log-submit-btn"><span>Gửi đi</span></button></div>
        </form>
        <div class="clearfix"></div>
        <div class="mt-4">
            Bạn đã có tài khoản? <a href="profile/login">Đăng nhập</a>
        </div>
    </div>
</section>



@endsection

@section('js')
<script src="frontend/js/jquery-3.5.1.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
<script src="admin_asset/js/validate.js"></script>
<script type="text/javascript">

    $(document).ready(function(){
        const alert = document.getElementById('alert');

        $("input#sendcapchar").click(function(){
            alert.replaceChildren();
            alert.innerHTML += 'Hệ thống đang xử lý. Vui lòng đợi ...';
            // $( "div.hidden" ).addClass( "public" );
            var email = $(this).parents('#validateForm').find('input[name="email"]').val();
            var note = $(this).parents('#validateForm').find('input[name="note"]').val();
            // alert(note);
            $.ajax({
                url:  'profile/sendcapchar/'+email, type: 'GET', cache: false, 
                data: {
                    "email":email,
                    "note":note,
                },
                success: function(data){
                    $('#alert').html(data);
                }
            });
        });
    }); // update menu
</script>
@endsection