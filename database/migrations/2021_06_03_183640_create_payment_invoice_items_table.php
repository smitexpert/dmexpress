<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentInvoiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_invoice_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('payment_invoice_id');
            $table->unsignedBigInteger('parcel_id');
            $table->float('collection')->default(0);
            $table->float('payable')->default(0);
            $table->float('charge')->default(0);
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
        Schema::dropIfExists('payment_invoice_items');
    }
}
