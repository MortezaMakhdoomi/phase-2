<?php

namespace App\Http\Controllers;


use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class ProductController extends Controller
{

    public function index()
    {
        return Product::all();
    }





    public function create()
    {
        $roles = Role::all();
       
        return view('products.add', ['roles' => $roles]);
    }





    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'price' => 'required'
        ]);

        return Product::create($request->all());
    }





    public function show($id)
    {
        return Product::find($id);
    }






    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        return $product;
    }







    public function destroy($id)
    {

        return Product::destroy($id);
    }



    public function search($name)
    {
        return Product::where('name', 'like', '%'.$name.'%')->get();
    }
}
