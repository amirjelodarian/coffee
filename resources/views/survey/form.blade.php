<form id="contact" action="{{ route('survey-store') }}" method="post">
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
          <textarea name="message" rows="6" class="form-control" id="message" placeholder="انتقاد یا پیشنهاد خود را بنویسید..." required=""></textarea>
        </fieldset>
      </div>
      <div class="col-md-12">
        <fieldset>
          <button type="button" id="form-submit" class="button">تایید</button>
        </fieldset>
    </div>
</form>

@section('end-footer')
    <script>
        $(document).ready(function() {
            $('#form-submit').click(function(){
                $.ajax({
                    method: "POST",
                    url: "{{ route('survey-store') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        name: $('#name').val(),
                        message:  $('#message').val()
                    },
                    success: function (data){
                        window.alert('با موفقیت ارسال شد ;)');
                    },
                });
            });
        });
    </script>
@endsection
