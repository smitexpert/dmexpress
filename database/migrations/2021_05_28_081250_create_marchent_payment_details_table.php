<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarchentPaymentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marchent_payment_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('marchent_id');
            $table->string('type');
            $table->string('name');
            $table->string('account_number');
            $table->string('bank_name')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_type')->nullable();
            $table->tinyInteger('active')->default(0);
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
        Schema::dropIfExists('marchent_payment_details');
    }
}
