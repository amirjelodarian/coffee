<form id="contact" action="{{ route('survey-create') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-md-12">
        <h2>انتقاد و پیشنهاد</h2>
      </div>
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <fieldset>
          <input name="name" type="text" class="form-control" id="name" placeholder="نام دلخواه" >
        </fieldset>
      </div>
      <div class="col-md-3"></div>
      <div class="col-md-12">
        <fieldset>
          <textarea name="message" type="text" rows="6" class="form-control" id="message" placeholder="انتقاد یا پیشنهاد خود را بنویسید..." required=""></textarea>
        </fieldset>
      </div>
      <div class="col-md-12">
        <div class="survey-error-message"></div>
        <fieldset>
          <button type="button" id="form-submit" class="button">تایید</button>
          <div id="survey-loader" class="loader"></div>
        </fieldset>
    </div>
</form>

@section('end-footer')
    <script>
        $(document).ready(function() {
            $('#form-submit').click(function(){
                $('.survey-error-message').empty();
                $.ajax({
                    method: "POST",
                    url: "{{ route('survey-create') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        name: $('#name').val(),
                        message:  $('#message').val()
                    },
                    error: function(data){
                        $('#form-submit').show();
                        $('#survey-loader').hide();
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function (key, value) {
                            // console.log(key+ " " +value);
                        $('.survey-error-message').addClass("alert alert-danger");

                            if($.isPlainObject(value)) {
                                $.each(value, function (key, value) {
                                    $('.survey-error-message').show().append(value+"<br/>");
                                });
                            }
                        });
                    },
                    beforeSend: function(){
                        $('#form-submit').hide();
                        $('#survey-loader').show();
                    },
                    success: function (data){
                        $('#form-submit').show();
                        $('#survey-loader').hide();
                        if(data == true)
                            window.alert('با موفقیت ارسال شد ;)');
                    },
                });
            });
        });
    </script>
@endsection
