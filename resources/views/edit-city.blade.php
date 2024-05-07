@section('title', 'Edit City')

@extends('layout')

@section('MainSection')

    <div class="container" style="width:30rem;">
        <form method="POST" action="{{ route('updateCity', $cityTemperatures->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="city-name">City name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="city"
                       value="{{ $cityTemperatures->city }}" required>
            </div>
            <div class="form-group">
                <label for="temperature">Temperature</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="temperature"
                       value="{{ $cityTemperatures->temperature }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection

