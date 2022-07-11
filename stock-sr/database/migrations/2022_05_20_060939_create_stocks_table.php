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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');
            $table->string('harga_jual');
            $table->string('harga_beli');
            $table->string('diskon_beli');
            $table->string('status')->nullable();
            $table->string('pembeli')->nullable();
            $table->string('imei')->nullable();
            $table->foreignId('category_id')->nullable();
            $table->foreignId('user_id')->nullable();
            
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
        Schema::dropIfExists('stocks');
    }
};
