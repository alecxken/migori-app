<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_batches', function (Blueprint $table) {
            $table->id();
            $table->string('token')->nullable();
            $table->string('date')->nullable();
            $table->string('supplier')->nullable();
            $table->string('ordered_by')->nullable();
            $table->string('approved_by')->nullable();
            $table->string('status')->nullable()->default('open');
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
        Schema::dropIfExists('order_batches');
    }
}
