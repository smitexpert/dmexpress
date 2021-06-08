<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcels', function (Blueprint $table) {
            $table->id();
            $table->string('tracking')->unique();
            $table->unsignedBigInteger('marchent_id');
            $table->unsignedBigInteger('pickup_id');
            $table->unsignedBigInteger('area_type_id');
            $table->unsignedBigInteger('area_id');
            $table->string('marchent_invoice_no')->nullable();
            $table->float('collection');
            $table->float('product_price');
            $table->integer('weight');
            $table->float('cod')->default(0);
            $table->float('charge');
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('address');
            $table->unsignedBigInteger('status_id');
            $table->timestamp('delivery_at');
            $table->integer('attempt')->default(0);
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
        Schema::dropIfExists('parcels');
    }
}
