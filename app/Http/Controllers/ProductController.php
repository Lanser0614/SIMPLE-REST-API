<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();

        return response()->json(['product'=>$product], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
             'name' => 'required',
             'price' => 'required',
        ]);

       
        Product::create($request->all());


        return response()->json(['message'=>'Maxsulot qo\'shildi'], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        if($product){
            return response()->json(['product'=>$product], 200);
        }else{
            return response()->json(['message'=>'Maxsulot topilmadi'], 404);
        }
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
       ]);
       $product = Product::find($id);
       $product->update($request->all());

       if($product){
        return response()->json(['message'=>'Maxsulot o\'zgartirildi'], 200);
       }else{
        return response()->json(['message'=>'Maxsulot topilmadi'], 404);
    }
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $product = Product::find($id);
     if($product){
         $product->delete();
         return response()->json(['message'=>'Maxsulot o\'chirildi'], 404);
     }else{
        return response()->json(['message'=>'Maxsulot topilmadi'], 404);
    }
    }
}
