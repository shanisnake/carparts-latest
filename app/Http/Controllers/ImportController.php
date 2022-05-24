<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ImportController extends Controller
{
    public function index()
    {
        die('this functionality is only for test and now it disabled');
        // load model 
        $Product_model = new Product();

        // 11-5-2022 -- start 
        $filename_incorrect = base_path('importdatafile/test.data.json');
        // $filename_incorrect = app_path('importdatafile');
       
        // read file of json recode.
        $fp = fopen($filename_incorrect, 'r');
                
            $sto = 0;
            while ($data = fgets($fp)) {
              // print_r($data);
                //set for inset first recode only
                if ($sto > 3) {
                    break;
                    exit;
                }
                $sto++;
                // echo $sto;
    
    
            #import carparts script start from here
    
                // encode for correct json format data
                $allData = json_decode($data, true);
                    // print_r($allData);      
                

                                    if ($allData) {

                                        //start to check if data is exsit
                                        $check_data_is_exist = true;
                                        if ($allData['sku']) {
                                            $sku_check = $allData['sku'];
                                            // check if already data is existed or not 
                                            $product_details =  $Product_model->Get_Specific_Data("demo3_carparsts_data_log","sku",$sku_check,2);

                                            if (count($product_details) > 0 ) {
                                                $check_data_is_exist = false;   
                                            }else{
                                                $data = [
                                                    'sku'              => $allData['sku'],
                                                    'file_name'        => "test",
                                                ];

                                                $Product_model->insert_data('demo3_carparsts_data_log',$data);
                                            }
                                            unset($sku_check);                                           
                                        }

                                        //end to check if data is exsit

                                        if($check_data_is_exist)
                                            { // start to insert main demo_carparts_products data 
                                            
                                                    $data = [
                                                        'url'      => $allData['url'],
                                                        'ref'      => $allData['ref'],
                                                        'sku'      => $allData['sku'],
                                                        'img'      => $allData['img'],
                                                        'name'     => $allData['name'],
                                                        'subtitle' => $allData['subtitle'],
                                                        'price'    => $allData['price'],
                                                    ];
                                                
                                                    $productId =  $Product_model->insert_data('demo3_carparts_products',$data);

                                                    // end to insert main demo_carparts_products data 
                            
                                            //2 insert data in the carparts_dimension table
                                                if ($allData['dimension']) {
                                                    foreach($allData['dimension'] as $dimension) {
                                            
                                                            $data = [
                                                            'product_id' => $productId,
                                                            'key'        => $dimension['key'],
                                                            'value'      => $dimension['value']
                                                            ];
                                                            
                                                            $Product_model->insert_data('demo3_carparts_dimensions',$data);
                                                            
                                                        unset($data);                                                    
                                                    }
                                                }
                                                                                                    
                            
                            
                                            //3 insert the data in Specification table 
                                                if ($allData['specifications']) {
                                                    foreach($allData['specifications'] as $specification){ 
                                                            $data = [
                                                                'product_id' => $productId,
                                                                'key'        => $specification['key'],
                                                                'value'      => $specification['value']
                                                            ]; 
                                                        $Product_model->insert_data('demo3_carparts_specification',$data);
                                                        unset($data);
                                                    }

                                                }
                            
                            
                                            //4 insert the data in compatibility table
                                                if ($allData['compatibility']) {
                                                    foreach($allData['compatibility'] as $compatibility) {
                                                        $data = [
                                                                'product_id'   => $productId,
                                                                'body'         => $compatibility['body'],
                                                                'model'        => $compatibility['model'],
                                                                'model_link'    => $compatibility['model_link'],
                                                                'produced_from' => $compatibility['produced_from'],
                                                                'produced_to'   => $compatibility['produced_to'],
                                                                'power'        => $compatibility['power'],
                                                                'hp'           => $compatibility['hp'],
                                                                'ccm'          => $compatibility['ccm']
                                                        ];

                                                        $Product_model->insert_data('demo3_carparts_compatibility',$data);
                                                        unset($data);
                                                    }
                                                }
                            
                            
                                                //4. insert the data in oe table
                                                    if ($allData['oe']) {
                                                        foreach($allData['oe'] as $oe) {
                                                                $data = [
                                                                    'product_id'     => $productId,
                                                                    'make'           => $oe['make'],
                                                                    'oe_number'      => $oe['oenumber']
                                                                ];

                                                            $Product_model->insert_data('demo3_carparts_oe',$data);
                                                            unset($data);
                                                        }                        
                                                    }    
                                            }  
                                    }              
            }
        // 11-5-2022 -- end




        return "hello";
    }
}





// CREATE TABLE demo3_carparsts_data_log (
//     id serial PRIMARY KEY,
//     sku VARCHAR ( 50 ) NOT NULL,
//     file_name VARCHAR ( 50 ) NOT NULL ,
//     stuts VARCHAR ( 50 ) NOT NULL ) ;


//     id SERIAL PRIMARY KEY,
//     sku VARCHAR(255)  NULL,
//     file_name VARCHAR(255)  NULL,
//     stuts VARCHAR(255)  NULL