@extends('layouts.app')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    @foreach ($surveys as $survey)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <h5>{{ $survey->name }}</h5>
                            <p>{{ $survey->message }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
