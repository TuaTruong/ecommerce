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
        Schema::create('fee_ships', function (Blueprint $table) {
            $table->id();
            $table->foreignId("matp");
            $table->foreignId("maqh");
            $table->foreignId("xaid");
            $table->integer("feeship");
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
        Schema::dropIfExists('fee_ships');
    }
};
