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
                    <li>{{ $forecast->date }} - {{ $forecast->temperature }}</li>
                @endforeach
            </ul>
        @endforeach


    </div>

@endsection
