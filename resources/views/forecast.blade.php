@extends('layout')
@section('MainSection')
    <div class="container d-flex justify-content-center align-items-center">
        <div class="col-md-6">
            @foreach($forecasts as $forecast)
                <h5>Trenutno je {{ $forecast->temperature }} stepena u gradu {{ $forecast->city->name }}</h5>
            @endforeach
        </div>
    </div>

@endsection

