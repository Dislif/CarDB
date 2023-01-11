@extends('layouts.app')
@include('alerts')
@section('content')
<div class="container">
    <div class="createbtn">
        <h1>List of available cars</h1> 
        <form action="{{route('cars.create')}}">
            <button type="submit" class="btn btn-success">Create</button>
        </form>
    </div>
    <table class="table car">
        <thead>
            <th>Brand</th>
            <th>Model</th>
            <th></th>
            <th></th>
        </thead>
        <tbody> @foreach ($cars as $car)
            <tr>
                <td>
                    {{ $car->brand }}
                </td>
                <td>
                    {{ $car->model }}
                </td>
                <td>
                    <img src="{{ asset('images/cars/' . $car->image) }}" alt="{{$car->image}}">
                </td>
                <td>
                    <div class="btns">
                        <form action="{{route('cars.show', $car)}}">
                            <button type="submit" class="btn btn-primary">View</button>
                        </form>
                    
                        <form action="{{route('cars.edit', $car)}}">
                            <button type="submit" class="btn btn-success">Edit</button>
                        </form>

                        <form action="{{route('cars.destroy', $car)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>   
            @endforeach 
        </tbody>  
    </table>
</div>
@endsection
