@extends('layouts.app')
@include('errors')
@section('content')
    <div class="container">
        <form action="{{route('cars.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="createform">
                <div class="sec">
                    <input type="text" name="brand" placeholder="Brand">
                    <input type="text" name="model" placeholder="Model">
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
            </div>
        </form>
    </div>
@endsection