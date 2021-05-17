<?php

namespace App\Http\Controllers\Api;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function index()
    {
        return Product::get();
    }

    public function show(Product $product)
    {
        return $product;
    }


    public function edit($product)
    {
        $edit_product = Product::where("id",$product)->first();

        return response()->json($edit_product,201);
        
    }

    public function store(Request $request){

    /*request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
       ]);

       if ($files = $request->file('image')) {
           $destinationPath = 'public/assets/image/'; // upload path
           $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $profileImage);
         
        }*/

        $create_product = Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $request->image,
        ]);

        if($create_product){
            return response()->json($create_product,201);
        }
        else{
            return response()->json('error',401);
        }
    }

    public function update(Request $request){
        
        $updateproduct = Product::where('id',$request->id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
           // 'image' => $request->image,
        ]);

        return response()->json($updateproduct,201);
    }
    public function delete($productId){
        $deleteproduct= Product::where("id",$productId)->delete();
        if($deleteproduct){
            return Product::get();
        }
    
    }
}