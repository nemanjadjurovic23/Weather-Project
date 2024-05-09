<head>
    @section('title', 'Add City')
</head>
<body>
@extends('layout')
@section('MainSection')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-4 mb-4">
                    <div class="card-body">
                        <h4>Add City</h4>
                        <form method="POST" action="{{ route('saveCity') }}">
                            @csrf
                            @if($errors->all->any())
                                @foreach($errors as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            @endif
                            <div class="form-group mt-2">
                                <input type="text" class="form-control" name="city" placeholder="Enter city" required>
                            </div>
                            <div class="form-group mt-2">
                                <input type="number" class="form-control" name="temperature"
                                       placeholder="Enter temperature" required>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
</body>
