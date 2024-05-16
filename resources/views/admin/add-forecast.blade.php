@php use App\Http\ForecastHelper; @endphp
@section('title', 'Add Forecast')

@extends('layout')

@section('MainSection')
    <div class="container">

        <form method="post" action="{{ route('addForecast') }}">
            @csrf
            <select name="city_id">
                @foreach($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
            </select>
            <input type="text" name="temperature" placeholder="Insert temperature">
            <select name="weather_type">
                @foreach($forecasts as $weather_type)
                    <option value="sunny">{{ $weather_type }}</option>
                @endforeach
            </select>
            <input type="text" name="probability" placeholder="Probability">
            <input type="date" name="date">
            <button>Submit</button>
        </form>

        @foreach($cities as $city)
            <h5>{{ $city->name }}</h5>
            <ul>
                @foreach($city->forecasts as $forecast)

                    @php $boja = ForecastHelper::getColorByTemperature($forecast->temperature) @endphp

                    <li>{{ $forecast->date }} - <span style="color: {{ $boja }};">{{ $forecast->temperature }}</span>
                    </li>
                @endforeach
            </ul>
        @endforeach


    </div>

@endsection
