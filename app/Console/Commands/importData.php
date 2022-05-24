<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Providers\AppServiceProvider;

ini_set('memory_limit', '-1');
ini_set ( 'max_execution_time' , '0' );

class importData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:importdata';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import data from file (file of objects of data) file location "crap/importdatafile/"';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        /// import process start from here
              // load model 
              $Product_model = new Product();
 
            // INCLUDE  data file of orders 
              $filename_incorrect = base_path('importdatafile/spareto.data.json');
             
              // read file of json recode.
              $fp = fopen($filename_incorrect, 'r');
                $data_output = '';      
                  $sto = 0;
                  while ($data = fgets($fp)) {
                    $sto++;
                        //   if ($sto < 841060)  // when you want to skip importing products from file (you have to uncomment thiese two line first is if condition and continue in next line) 
                        //   continue; 
                          $this->info('am on this '. $sto);
                        #import carparts script start from here
          
                        // encode for correct json format data
                        $allData = json_decode($data, true);

                                          if ($allData) {      
                                              //start to check if data is exsit
                                              $check_data_is_exist = true;
                                              if ($allData['sku']) {
                                                  $sku_check = $allData['sku'];
                                                  // check if already data is existed or not 
                                                  $product_details =  $Product_model->Get_Specific_Data("carparsts_data_log","sku",$sku_check,2);
      
                                                  if (count($product_details) > 0 ) {
                                                      $check_data_is_exist = false;   
                                                  }else{
                                                      $data = [
                                                          'sku'              => $allData['sku'],
                                                          'file_name'        => "spareto.data.json",
                                                          'status'          => 'inserted'
                                                      ];
      
                                                      $Product_model->insert_data('carparsts_data_log',$data);
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
                                                      
                                                          $productId =  $Product_model->insert_data('carparts_products',$data);
                                                          $data_output .= ' - '.$productId;
                                                          // end to insert main demo_carparts_products data 
                                  
                                                  //2 insert data in the carparts_dimension table
                                                      if ($allData['dimension']) {
                                                          foreach($allData['dimension'] as $dimension) {
                                                  
                                                                  $data = [ 
                                                                  'product_id' => $productId,
                                                                  'key'        => $dimension['key'],
                                                                  'value'      => $dimension['value']
                                                                  ];
                                                                  
                                                                  $Product_model->insert_data('carparts_dimensions',$data);
                                                                  
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
                                                              $Product_model->insert_data('carparts_specification',$data);
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
                                                              $Product_model->insert_data('carparts_compatibility',$data);
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
                                                                  $Product_model->insert_data('carparts_oe',$data);
                                                                  unset($data);
                                                              }                        
                                                          }    
                                                  }  
                                          }              
                  }
        /// import process end from here 

        $this->info(' total records is = '. $sto .' .... all imported products id ------------'.$data_output.'file of products'.$filename_incorrect);
        return "Done";
    }
}
