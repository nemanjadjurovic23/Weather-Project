@php use App\Http\ForecastHelper; @endphp
<head>
    @section('title', 'Home')
</head>
<body>
@extends('layout')
@section('MainSection')


    <div class="container mt-5 mb-4">
        @if(\Illuminate\Support\Facades\Session::has('error'))
            <p class="text-danger">{{ \Illuminate\Support\Facades\Session::get('error') }}</p>
        @endif
        <div class="d-flex align-items-center justify-content-center">
            <h5 class="m-1">Find your city</h5>
            <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('forecast.search') }}">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="city">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
            @foreach($userFavouriteCities as $userFavourite)
                @php
                    $boja = ForecastHelper::getColorByTemperature($userFavourite->city->todaysForecast->temperature);
                    $ikonica = ForecastHelper::getIconByWeatherType($userFavourite->city->todaysForecast->weather_type);
                @endphp

                <p class="btn btn-primary mt-4">
                    {{ $userFavourite->city->name }} - ( {{$userFavourite->city->todaysForecast->temperature }}°C ) <i class="fa-solid {{ $ikonica }}"></i>
                </p>
            @endforeach
    </div>
@endsection

</body>
