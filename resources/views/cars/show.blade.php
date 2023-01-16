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
            <th id="separator">Choose a Gadget</th>
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
                <td>
                    <div class="optionals">
                        @forelse($car->gadgets as $g)
                            <div class="sec card" style="margin:5px">
                                <label>
                                    {{$g->nome}}
                                </label>
                                <form action="{{route('gadgets.unlinker', [$g->id, $car->id])}}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">X</button>
                                </form>
                            </div>
                        @empty
                            No gadget selected
                        @endforelse
                    </div>
                    <form action="{{route('gadgets.linker', $car->id)}}" method="POST">
                        @csrf
                        <label for="gadget_id">Choose a gadget:</label>
                        <select name="gadget_id" id="gadget_id" class="form-control" >
                            @foreach (App\Models\Gadget::all() as $gadget)
                                <option value="{{$gadget->id}}">{{$gadget->nome}}</option>
                            @endforeach
                        </select>
                        <input class="
                        btn btn-dark mt-2" type="submit" value="Submit">
                    </form>
                             
                </td>
               
            </tr>
        </tbody>
    </table><br>
    <div class="revbox">
        <h3>Reviews</h3>
        <div class="revs">
            <div class="secrev">
                @forelse ($car->reviews as $review)
                <div class="card rev">
                    <div class="card-body">
                        <p  class="card-text">{{$review->description}}</p>
                        <div class="bottomcard">
                            @if (Auth::user()->id==$review->user_id)
                            <div class="btns">
                                <form action="{{route('reviews.edit', $review->id)}}">
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
                    <p  class="card-text">no reviews found</p>
                @endforelse
            </div>
            <div>
                <div class="card putrev">
                    <form class="sec" action="{{route('reviews.store', $car->id)}}" method="POST">
                        @csrf
                        <div class="secv p-3-custom">   
                            <label>Description: </label>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <div class="p-3">
                            <textarea name="description" id="description" class="form-control mb-2" placeholder="Write here a review" rows="6" cols="30"></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection