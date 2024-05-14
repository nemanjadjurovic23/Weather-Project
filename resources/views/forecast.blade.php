@extends('layout')
@section('MainSection')
    <div class="container d-flex justify-content-center align-items-center">
        <div class="col-md-6">
            @foreach($forecasts as $forecast)
                <h5>Datum: {{ $forecast->created_at }} - Temperatura: {{ $forecast->temperature }}</h5>
            @endforeach
        </div>
    </div>

@endsection

