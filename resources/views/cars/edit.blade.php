@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{route('cars.update', $car)}}" method="post" enctype="multipart/form-data">
        @method('PUT') @csrf
        <div class="createform">
            <div class="sec">
                <input type="text" name="brand" value="{{$car->brand}}">
                <input type="text" name="model" value="{{$car->model}}">
            </div>
            <div class="sec">
            <label for="image">Image: </label>
            <div>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            </div>
            <div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
    </form>
</div>
@endsection