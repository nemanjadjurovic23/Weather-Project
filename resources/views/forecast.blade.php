@extends('layout')
@section('MainSection')
    <div class="container d-flex justify-content-center align-items-center">
        <div class="col-md-6">
            @foreach($city->forecasts as $forecast)
                <h5>Datum: {{ $forecast->date }} - Temperatura: {{ $forecast->temperature }}</h5>
            @endforeach
        </div>
    </div>

@endsection

