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


     
    public function index()
    {
        // pagination bootstrap ;
        Paginator::useBootstrap();

        // data with pagination
        $data =  DB::table('carparts_products')->orderBy('id', 'desc')->paginate(27) ;

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

        $product_details = DB::table('carparts_products')->find($id);
        // print_r($product_details);
        // $carparts_specification = DB::table('carparts_specification')->find($id);

        $carparts_specification = DB::table('carparts_specification')->where('product_id', $id)->limit(1)->get();
        $carparts_dimensions = DB::table('carparts_dimensions')->where('product_id', $id)->limit(2)->get();
        $carparts_compatibility = DB::table('carparts_compatibility')->where('product_id', $id)->limit(2)->get();
        $carparts_oe = DB::table('carparts_oe')->where('product_id', $id)->limit(2)->get();

        $data =  array(
          'details'         => $product_details,
          'specifications'  => $carparts_specification,
          'dimensions'      => $carparts_dimensions,
          'compatibility'   => $carparts_compatibility,
          'oe'              => $carparts_oe,
          );
          
        //////////////////////////////
        return view('pages.productdetail', ['data' => $data]);
    }

 
}
