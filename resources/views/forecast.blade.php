@extends('layout')
@section('MainSection')
    <div class="container d-flex justify-content-center align-items-center">
        <div class="col-md-6">
            @foreach($city->forecasts as $forecast)
                <p>Sunrise {{ $sunrise }}</p>
                <p>Sunset {{ $sunset }}</p>
                <h5>Date: {{ $forecast->date }} - Temperature: {{ $forecast->temperature }}</h5>
            @endforeach
        </div>
    </div>

@endsection

