@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Details</h1>
    <table class="table car">
        <thead>
            <th>Brand</th>
            <th>Model</th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
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
        </tbody>
    </table><br>
    <div class="revbox">
        <h3>Reviews</h3>
        <div class="revs">
            @forelse ($car->reviews as $review)
            <div class="card rev">
                   <div class="card-body">
                    <p  class="card-text">{{$review->description}}</p>
                    <div class="bottomcard">
                        @if (Auth::user()->id==$review->user_id)
                        <div class="btns">
                            <form action="{{route('cars.edit', $review->id)}}">
                                <button type="submit" class="btn btn-success">Edit</button>
                            </form>
                            <form action="{{route('reviews.destroy', $review->id)}}" method="POST">
                                @method('DELETE') 
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                        @endif
                        <div>
                            <label>- {{$review->user->name}}</label>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <p  class="card-text">Ancora nessun commento presente</p>
            @endforelse
            <div class="card putrev">
                <form class="sec" action="{{route('reviews.store', $car->id)}}" method="POST">
                    @csrf
                    <div class="secv">   
                        <span class="lbl-txt-rev">Description: </span>
                        <button style="margin-left:20px" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <div>
                        <textarea name="description" id="description" class="form-control mb-2" placeholder="Write here a review" rows="6" cols="30"></textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection