<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->default(0);
            $table->integer('manufacture_id')->default(0);
            $table->longText('product_short_desc');
            $table->longText('product_long_desc')->nullable();
            $table->float('product_price')->default(0);
            $table->String('product_image')->nullable();
            $table->String('product_name');
            $table->String('product_size')->nullable();
            $table->String('product_color')->nullable();
            $table->integer('publication_status')->default(0);
            $table->String('created_by')->nullable();
            $table->String('updated_by')->nullable();
            $table->timestamps();
        });
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
}
