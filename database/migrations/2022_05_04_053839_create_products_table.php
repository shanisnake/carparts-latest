<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        // Schema::create('carparts_products', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });

/////////////////////////////////////
// $table_carparts_products = 'CREATE TABLE IF NOT EXISTS demo2_carparts_products (
//     id SERIAL PRIMARY KEY,
//     url VARCHAR(255) NULL,
//     ref VARCHAR(255)  NULL,
//     sku VARCHAR(255)  NULL,
//     img VARCHAR(255)  NULL,
//     name VARCHAR(255)  NULL,
//     subtitle VARCHAR(255)  NULL,
//     price VARCHAR(255)  NULL
// )';

/////////////////////////////////////



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
