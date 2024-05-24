@php use App\Http\ForecastHelper; @endphp
@extends('layout')

@section('MainSection')
    <div class="container mt-4">

        @if(\Illuminate\Support\Facades\Session::has('error'))
            <p class="text-danger fw-bold col-12">{{ \Illuminate\Support\Facades\Session::get('error') }}</p>
            <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
        @endif

        <div class="row">
            @foreach($cities as $city)
                @php $icon = ForecastHelper::getIconByWeatherType($city->todaysForecast->weather_type) @endphp
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $city->name }}</h5>

                            @if(in_array($city->id, $userFavourites))
                                <a class="btn btn-primary" href="{{ route('user-cities.unfavourite', ['city' => $city->id]) }}">
                                    <i class="fa-solid fa-heart"></i>
                                </a>
                            @else
                                <a class="btn btn-primary" href="{{ route('user-cities.favourite', ['city' => $city->id]) }}">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                            @endif

                            <a href="{{ route('forecast', $city->name) }}" class="btn btn-primary">
                                <i class="fa solid {{ $icon }}"></i> View Forecast
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

