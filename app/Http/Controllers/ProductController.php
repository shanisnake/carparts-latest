<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Providers\AppServiceProvider;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function list()
    {
        $Product_model = new Product();
        $data = $Product_model->get_list_of_products();
        // send deta in template and render 
        return view('pages.productlist', ['data' => $data]);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {   
        $Product_model = new Product();
        $data = $Product_model->get_Details($id);

        //////////////////////////////
        return view('pages.productdetail', ['data' => $data]);
    }

 
}
