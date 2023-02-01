<div class="col-12" id="contact">

    <span>
        <button id="sign-in-button" type="button" id="form-submit" class="button">
            ورود
        </button>
    </span>
    <span>
        <button id="sign-up-button" type="button" id="form-submit" class="button">
            ثبت نام
        </button>
    </span>
    <hr>
    <form class="sign-up-form" action="{{ route('register') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12">
                <h2>ثبت نام</h2>
            </div>
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <fieldset>
                <input name="name" id="name-register" value="{{ old('name') }}" autocomplete="name" type="text" class="form-control"  placeholder="نام" >
            </fieldset>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <fieldset>
                <input name="email" id="email-register" value="{{ old('email') }}" required autocomplete="email" type="email" class="form-control"  placeholder="ایمیل" >
            </fieldset>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <fieldset>
                <input id="password-register" type="password" name="password" required autocomplete="current-password" class="form-control" placeholder="رمز عبور" >
            </fieldset>
            <fieldset>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="current-password" class="form-control" placeholder="تکرار رمز عبور" >
            </fieldset>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-12">
            <div class="register-error-message"></div>
            <fieldset>
            <button type="button" id="form-submit" class="button submit-register">ثبت نام</button>
            <div id="register-loader" class="loader"></div>
            </fieldset>
        </div>
        </div>
    </form>
    <form class="sign-in-form" action="{{ route('login') }}" method="POST">
        @csrf
        <div class="row">
        <div class="col-12">
            <h2>ورود</h2>
        </div>
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <fieldset>
              <input name="email" value="{{ old('email') }}" required autocomplete="email" type="email" id="email-login" class="form-control"  placeholder="ایمیل" >
            </fieldset>
          </div>
          <div class="col-md-3"></div>
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <fieldset>
              <input id="password-login" type="password" name="password" required autocomplete="current-password" class="form-control" placeholder="رمز عبور" >
            </fieldset>
          </div>
          <div class="col-md-3"></div>
          <div class="col-md-12">
            <div class="login-error-message"></div>
            <fieldset>
              <button type="button" id="form-submit" class="button submit-login">ورود</button>
              <div id="login-loader" class="loader"></div>
            </fieldset>
        </div>
        </div>
    </form>
</div>
@section('first-footer')
<script type="text/javascript">
    $(document).ready(function() {
        $('.sign-in-form').hide();
        $('#sign-up-button').css({'background': '#faf5b2', 'color': '#1e1e1e'});

        $('#sign-in-button').on('click',function(){
            $('.sign-up-form').hide();
            $('.sign-in-form').show("slide", { direction: "left" }, 500);
            $('#sign-in-button').css({'background': '#faf5b2', 'color': '#1e1e1e'});
            $('#sign-up-button').css({'background': '#1e1e1e', 'color': '#faf5b2'});
        });
        $('#sign-up-button').on('click',function(){
            $('.sign-in-form').hide();
            $('.sign-up-form').show("slide", { direction: "left" }, 500);
            $('#sign-in-button').css({'background': '#1e1e1e', 'color': '#faf5b2'});
            $('#sign-up-button').css({'background': '#faf5b2', 'color': '#1e1e1e'});
        });
        $('.submit-login').click(function(){
            $('.login-error-message').empty();
                $.ajax({
                    method: "POST",
                    url: "{{ route('login') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        email: $('#email-login').val(),
                        password:  $('#password-login').val()
                    },
                    beforeSend: function(){
                        $('.submit-login').hide();
                        $('#login-loader').show();
                    },
                    error: function(data){
                        $('.submit-login').show();
                        $('#login-loader').hide();
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function (key, value) {
                            // console.log(key+ " " +value);
                        $('.login-error-message').addClass("alert alert-danger");

                            if($.isPlainObject(value)) {
                                $.each(value, function (key, value) {
                                    $('.login-error-message').show().append(value+"<br/>");
                                });
                            }
                        });
                    },
                    success: function (data){
                        $('.submit-login').show();
                        $('#login-loader').hide();
                        if(data == true)
                            window.location = "{{ route('home') }}";
                        else
                            window.alert('رمز یا ایمیل اشتباه است!');

                    },
                });
            });

            $('.submit-register').click(function(){
                $('.register-error-message').empty();
                $.ajax({
                    method: "POST",
                    url: "{{ route('register') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        name: $('#name-register').val(),
                        email: $('#email-register').val(),
                        password:  $('#password-register').val(),
                        password_confirmation:  $('#password_confirmation').val(),
                    },
                    beforeSend: function(){
                        $('.submit-register').hide();
                        $('#register-loader').show();
                    },
                    error: function(data){
                        $('.submit-register').show();
                        $('#register-loader').hide();
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function (key, value) {
                            // console.log(key+ " " +value);
                        $('.register-error-message').addClass("alert alert-danger");

                            if($.isPlainObject(value)) {
                                $.each(value, function (key, value) {
                                    $('.register-error-message').show().append(value+"<br/>");
                                });
                            }
                        });
                    },
                    success: function (data){
                        $('.submit-register').show();
                        $('#register-loader').hide();
                        if(data == true)
                            window.location = "{{ route('home') }}";
                        else
                            window.alert('مشکلی پیش آمد!!');

                    },
                });
            });
    });
</script>
@endsection
