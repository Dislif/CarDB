<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\User;
use App\Models\Review;



class ReviewController extends Controller
{

    public function store(Request $request, $car_id){
        $request->validate([
            'description' => 'required'
        ]);
        $rev = new Review();
        $rev->description = $request->description;
        $rev->car_id = $car_id;
        $rev->user_id = Auth::user()->id;
        $rev->save();
        return redirect()->route('cars.show', $car_id);
    }

    public function destroy($review_id){
        $review = Review::find($review_id);
        $review->delete();
        return redirect()->route('cars.show', $review->car_id);
    }

    public function __construct(){
        $this->middleware('auth'); 
    }
}
