<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function store(Request $request){
        $fields = $request->validate([
            'name'=>'string|required',
            'y_address'=>'string|required',
            'x_address'=>'string|required'
        ]);
        $address = new Address();
        $address->name = $fields['name'];
        $address->y_address = $fields['y_address'];
        $address->x_address = $fields['x_address'];
        $address->save();
        return response()->json(["result"=>"created"],201);

    }
    public function show($name){
        $address = Address::where('name',$name)->first();
        return response($address);
    }
}
