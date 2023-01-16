@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{route('gadgets.store')}}" method="post">
        @csrf
        <div class="createform">
            <div class="sec">
                <input type="text" name="nome" placeholder="Nome">
            </div>
            <div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection