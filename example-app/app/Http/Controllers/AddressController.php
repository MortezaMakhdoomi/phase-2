<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        return Address::all();
    }



    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        return Address::create($request->all());
    }



    public function update(Request $request, $id)
    {
        $address = Address::find($id);
        $address->update($request->all());
        return [
            'message' => 'current address updated successfully'
        ];
    }

}
