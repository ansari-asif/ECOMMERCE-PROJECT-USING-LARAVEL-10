<?php

namespace App\Http\Controllers;

use App\Models\Product_category;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        //
        $data=[];
        $productCategory=Product_category::all();
        $category_id=$req->get('category');
        if(!$category_id){
            $category_id=$productCategory[0]->id;
        }
        $products=Products::where('category_id',$category_id)->get();
        $data['productCategory']=$productCategory;
        $data['products']=$products;
        $data['category_id']=$category_id;
        // dd($products);
        return view('products/index',$data);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $req,$id)
    {
        $data=[];
        $product=Products::with('category')->find($id);
        $data['product']=$product;
        $related_products=[];
        if($product){
            $related_products=Products::where('category_id',$product->category_id)
                                        ->where('id','<>',$product->id)
                                        ->get();
        }
        $data['related_products']=$related_products;
        return view('products.productDetails',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $products)
    {
        //
    }
}
