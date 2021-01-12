<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_orders', function (Blueprint $table) {
            $table->id();
              $table->string('token')->nullable();
            $table->string('date')->nullable();
            $table->string('ordered_qty')->nullable();
            $table->string('approved_qty')->nullable();
            $table->string('supplier')->nullable();
            $table->string('ordered_by')->nullable();
            $table->string('approved_by')->nullable();
            $table->string('delivered_qty')->nullable();
            $table->string('delivery_date')->nullable();
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
        Schema::dropIfExists('product_orders');
    }
}
