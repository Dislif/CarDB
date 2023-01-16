<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Gadget;

class GadgetController extends Controller
{
    public function create(Request $request){
        return view('gadgets.create');
    }

    public function store(Request $request){
        $gadget = new Gadget();
        $request->validate([
            'nome'=>'required'
        ]);
        $gadget->nome = $request->nome;
        $gadget->save();
        return redirect()->route('gadgets.create');
    }

    public function link(Request $request, $car_id){
        $request->validate([
            'gadget_id' => 'required'
        ]);
        $gadget = Gadget::find($request->gadget_id);
        $car = Car::find($car_id);
        if(!$car->gadgets->contains($gadget)){
            $car->gadgets()->attach($gadget);
        }
        return redirect()->route('cars.show', $car_id);
    }

    public function unlink($gadget_id, $car_id){
        $car = Car::find($car_id);
        $car->gadgets()->detach($gadget_id);
        return redirect()->route('cars.show', $car_id);
    }
}
