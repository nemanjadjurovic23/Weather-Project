<head>
    @section('title', 'All Cities')
</head>
<body>
@extends('layout')
@section('MainSection')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @foreach($allCities as $city)
                    <div class="card mt-4">
                        <div class="card-body">
                            <h4>{{ $city->city }}</h4>
                            <h5>{{ $city->temperature }} °C</h5>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

</body>
