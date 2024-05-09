<head>
    @section('title', 'All Cities')
</head>
<body>
@extends('layout')
@section('MainSection')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                @foreach($allCities as $city)
                    <div class="card mt-4">
                        <div class="card-body text-center">
                            <h4>{{ $city->city->name }}</h4>
                            <h5>{{ $city->temperature }} °C</h5>
                            <a class="btn btn-danger" href="{{ route('deleteCity', $city->id) }}">Delete</a>
                            <a class="btn btn-success" href="{{ route('editCity', $city->id) }}">Edit</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

</body>
