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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('image')->nullable();
            $table->text('body');
            $table->string('harga_jual');
            $table->string('quantity');
            $table->string('url_barang')->nullable();
            $table->foreignId('category_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->timestamp('published_at')->nullable();
            
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
        Schema::dropIfExists('posts');
    }
};
