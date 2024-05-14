@extends('layout')
@section('MainSection')
    <div class="container">

        <form method="POST" action="{{ route('updateWeather')}}">
            @csrf
            <input type="text" placeholder="Insert city temperature" name="temperature" required>
            <select name="city_id">
                @foreach(\App\Models\Cities::all() as $city)
                    <option value="{{ $city->id }}">
                        {{ $city->name }}
                    </option>
                @endforeach
            </select>
            <button>Submit</button>
        </form>

        @foreach($weathers as $weather)
            <p>City: {{ $weather->city->name }} - Temperature: {{ $weather->temperature }}</p>
        @endforeach
    </div>
@endsection
