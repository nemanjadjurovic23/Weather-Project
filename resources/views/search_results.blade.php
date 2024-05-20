@php use App\Http\ForecastHelper; @endphp
@extends('layout')

@section('MainSection')
    <div class="container mt-4">
        <div class="row">
            @foreach($cities as $city)
                @php $icon = ForecastHelper::getIconByWeatherType($city->todaysForecast->weather_type) @endphp
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $city->name }}</h5>
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

