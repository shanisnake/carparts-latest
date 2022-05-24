<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Providers\AppServiceProvider;
use Illuminate\Pagination\Paginator;

class Product extends Model
{
    use HasFactory;

    // gat data with parameters table name and whare variable
    public function Get_Specific_Data($table_name,$where_key,$where_value = '',$limit = ''){

        if(!empty($where_key) && !empty($where_value)){
            $data = DB::table($table_name)->where($where_key, $where_value)->limit(2)->get();
        }else{
            $data = DB::table($table_name)->limit(2)->get();
        }
        return $data;
    }   

    //  insert data  with parameter table name and data 
    public function insert_data($table_name,$data){
        $id = DB::table($table_name)->insertGetId( $data );
        return $id;
    }   


    // list of all products
    public function get_list_of_products(){

        // pagination bootstrap ;
        Paginator::useBootstrap();

        // data with pagination
        // $data =  DB::table('carparts_products')->orderBy('id', 'desc')->paginate(27) ;
        $data =  DB::table('carparts_products')->orderBy('id', 'asc')->paginate(99) ;

        return $data;        
    }

    // get  Details of specific id
    public function get_Details($id){

     
        $product_details = DB::table('carparts_products')->find($id);
        $carparts_specification = DB::table('carparts_specification')->where('product_id', $id)->limit(1)->get();
        $carparts_dimensions = DB::table('carparts_dimensions')->where('product_id', $id)->limit(1)->get();
        $carparts_compatibility = DB::table('carparts_compatibility')->where('product_id', $id)->limit(1)->get();
        $carparts_oe = DB::table('carparts_oe')->where('product_id', $id)->limit(1)->get();

        $data =  array(
          'details'         => $product_details,
          'specifications'  => $carparts_specification,
          'dimensions'      => $carparts_dimensions,
          'compatibility'   => $carparts_compatibility,
          'oe'              => $carparts_oe,
          );

        return $data;        
    }
}
