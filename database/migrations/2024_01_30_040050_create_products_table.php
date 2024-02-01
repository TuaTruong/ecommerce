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
            $table->foreignId("category_id");
            $table->foreignId("brand_id");
            $table->text("desc");
            $table->text("content");
            $table->string("price");
            $table->string("image")->nullable();
            $table->string("name");
            $table->boolean("status");
            $table->integer("qty");
            $table->integer("sold_qty")->default(0);
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
};
