@inject('survey', 'App\Models\Survey')
@section('head-end')
    <link rel="stylesheet" type="text/css" href="/css/datatable.css"/>
@endsection
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 class="survey-h2">انتقادات و پیشنهادات</h2>
                @if ($survey->count())
                    <table id="table_id" class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>ت/ز</th>
                                <th>نظر</th>
                                <th>نام</th>
                                <th>#</th>
                            </tr>
                        </thead>
                    </table>
                @endif

        </div>
    </div>
</div>

    @section('first-footer')

    <script type="text/javascript" src="/js/datatable.js"></script>
        @if ($survey->count())
            <script>
                $(document).ready( function () {

                    var data = [
                                @foreach ($surveys as $s)
                                    @php $message = substr($s->message,0, 15).'...'; @endphp
                                    [
                                        '{{ $s->created_at }}',
                                        '{!! $message !!}',
                                        '{{ $s->name }}',
                                        '{{ $s->id }}'
                                    ],
                                @endforeach
                            ];
                    $('#table_id').DataTable({
                        data: data,
                        "lengthMenu": [[-1, 5, 10, 15, 20, 25, 50, 75, 100, 125, 150], ["All", 5, 10, 15, 20, 25, 50, 75, 100, 125, 150]],
                        select: {
                            style: 'multi'
                        }
                    });

                    $('tbody>tr').on('click', function(){
                        var survey = this.childNodes[1];
                        var id = this.childNodes[3].innerHTML;
                        var loader = survey.appendChild(document.createElement('div'));
                        loader.className = 'loader';
                        loader.style.display = "none";
                        $.ajax({
                            method: "GET",
                            url: "{{ route('survey-single') }}",
                            data: {
                                id: id
                            },
                            beforeSend: function(){
                                loader.style.display = "block";
                            },
                            success: function (data){
                                loader.style.display = "none";
                                if(data != false)
                                    survey.innerHTML = data;
                            }
                        });

                    });
                } );

            </script>
        @endif
    @endsection

