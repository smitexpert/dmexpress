<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarchentChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marchent_charges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('marchent_id');
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
        Schema::dropIfExists('marchent_charges');
    }
}
