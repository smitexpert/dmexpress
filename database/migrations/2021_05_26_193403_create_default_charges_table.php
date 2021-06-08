<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefaultChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('default_charges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('area_type_id');
            $table->integer('cod')->default(0);
            $table->float('charge');
            $table->integer('additional_charge');
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
        Schema::dropIfExists('default_charges');
    }
}
