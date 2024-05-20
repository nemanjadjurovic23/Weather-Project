<head>
    @section('title', 'Home')
</head>
<body>
@extends('layout')
@section('MainSection')


    <div class="container mt-5 mb-4">
        @if(\Illuminate\Support\Facades\Session::has('error'))
            <p class="text-danger">{{ \Illuminate\Support\Facades\Session::get('error') }}</p>
        @endif
        <div class="d-flex align-items-center justify-content-center">
            <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('forecast.search') }}">
                <h5>Find your city</h5>
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="city">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>
@endsection

</body>
