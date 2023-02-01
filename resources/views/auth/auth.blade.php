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
                <input name="name" value="{{ old('name') }}" autocomplete="name" type="text" class="form-control"  placeholder="نام" >
            </fieldset>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <fieldset>
                <input name="email" value="{{ old('email') }}" required autocomplete="email" type="email" class="form-control"  placeholder="ایمیل" >
            </fieldset>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <fieldset>
                <input id="password" type="password" name="password" required autocomplete="current-password" class="form-control" placeholder="رمز عبور" >
            </fieldset>
            <fieldset>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="current-password" class="form-control" placeholder="تکرار رمز عبور" >
            </fieldset>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-12">
            <fieldset>
            <button type="submit" id="form-submit" class="button">ثبت نام</button>
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
              <input name="email" value="{{ old('email') }}" required autocomplete="email" type="email" class="form-control"  placeholder="ایمیل" >
            </fieldset>
          </div>
          <div class="col-md-3"></div>
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <fieldset>
              <input id="password" type="password" name="password" required autocomplete="current-password" class="form-control" placeholder="رمز عبور" >
            </fieldset>
          </div>
          <div class="col-md-3"></div>
          <div class="col-md-12">
            <fieldset>
              <button type="submit" id="form-submit" class="button">ورود</button>
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
    });
</script>
@endsection
