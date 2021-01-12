<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
              $table->string('token')->nullable();
            $table->string('name')->nullable();
            $table->string('location')->nullable();
            $table->string('address')->nullable();
            $table->string('capacity')->nullable();
            $table->string('desc')->nullable();
             $table->string('phone')->nullable();
              $table->string('status')->nullable();
               $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('stores');
    }
}
