<head>
    @section('title', 'All Cities')
</head>
<body>
@extends('layout')

@section('MainSection')
    <div class="container">
        <div class="row justify-content-center">
            @foreach($cities as $city)
                <div class="col-md-4">
                    <div class="card mt-4">
                        <div class="card-body text-center">
                            <h4>{{ $city->name }}</h4>
                            @foreach($forecasts as $forecast)
                                @if($forecast->city_id == $city->id)
                                    <h4>{{ $forecast->date }}: {{ $forecast->temperature }}°C</h4>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
</body>
