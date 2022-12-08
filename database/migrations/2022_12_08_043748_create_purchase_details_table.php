<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseDetailsTable extends Migration
{

    public function up()
    {
        Schema::create('purchase_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shopping_id');
            $table->foreign('shopping_id')->references('id')->on('purchases');
            $table->unsignedBigInteger('products_id');
            $table->foreign('products_id')->references('id')->on('products');
            $table->integer('quantity');
            $table->decimal('price');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('purchase_details');
    }
}
