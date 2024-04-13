<?php

namespace App\Http\Controllers;

use App\Models\Product_category;
use App\Models\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    function __invoke(Request $req)
    {
        $data=[];
        $productCategory=Product_category::all();
        $products=Products::with('category')->get()->groupBy('category_id');
        // echo json_encode($products);die;
        $data['productCategory']=$productCategory;
        $data['products']=$products;
        // dd($productCategory);
        return view('index',$data);      
    }
}
