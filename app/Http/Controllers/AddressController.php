<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function store(Request $request){
        $address = new Address();
        $address->name = $request->name;
        $address->y_address = $request->y_address;
        $address->x_address = $request->x_address;
        $address->save();
        return response()->json(["result"=>"created"],201);

    }
    public function show($name){
        $address = Address::where('name','=',$name)->first();
        return View("address",["address"=>$address]);
    }
}
