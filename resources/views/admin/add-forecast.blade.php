@php use App\Http\ForecastHelper; @endphp

@extends('admin.layout')

@section('content')
    <div class="container">

        <h4>Create Forecast</h4>
        <form method="post" action="{{ route('addForecast') }}">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6 mt-2">
                    <select name="city_id" class="form-select">
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mt-2">
                    <input type="text" name="temperature" placeholder="Insert temperature" class="form-control">
                </div>
                <div class="col-md-6 mt-2">
                    <select name="weather_type" class="form-select">
                        @foreach($forecasts as $weather_type)
                            <option value="sunny">{{ $weather_type }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mt-2">
                    <input type="text" name="probability" placeholder="Probability" class="form-control">
                </div>
                <div class="col-md-6 mt-2">
                    <input type="date" name="date" class="form-control">
                </div>
                <div class="col-md-6 mt-2">
                    <button class="btn btn-outline-primary col-12">Submit</button>
                </div>
            </div>
        </form>

        <div class="d-flex flex-wrap">
            @foreach($cities as $city)
                <div class="col-md-3">
                    <h5 class="mb-2">{{ $city->name }}</h5>
                    <ul class="list-group mb-3">
                        @foreach($city->forecasts as $forecast)
                            @php
                                 $boja = ForecastHelper::getColorByTemperature($forecast->temperature);
                                 $icon = ForecastHelper::getIconByWeatherType($forecast->weather_type);
                            @endphp

                            <li class="list-group-item">{{ $forecast->date }} -
                                <i class="fa-solid {{ $icon }}"></i>
                                <span style="color: {{ $boja }};">{{ $forecast->temperature }}</span>
                                - {{ $forecast->probability }}%
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>

@endsection
