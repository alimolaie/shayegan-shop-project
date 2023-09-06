<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_id')->unsigned()->index()->nullable();
            $table->foreign('product_id')->references('id')->on('gwc_products')->onDelete('cascade');
            $table->bigInteger('member_id')->unsigned()->index()->nullable();
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
            $table->smallInteger('qty')->unsigned()->nullable();
            $table->bigInteger('price')->unsigned()->nullable();
            $table->string('image')->nullable();
            $table->string('product_name')->nullable();
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
        Schema::dropIfExists('carts');
    }
}
