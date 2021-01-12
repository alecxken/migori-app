<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSuppluysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_suppluys', function (Blueprint $table) {
            $table->id();
            $table->string('token')->nullable();
            $table->string('date')->nullable();
            $table->string('supplier')->nullable();
            $table->string('order_ref')->nullable();
            $table->string('product_id')->nullable();
            $table->string('delivered_qty')->nullable();
            $table->string('delivery_date')->nullable();
            $table->string('received_by')->nullable();
            $table->string('confirmed_by')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('product_suppluys');
    }
}
