<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->integer('course_id')->nullable();
            $table->integer('participant_id')->nullable();
            $table->float('subtotal')->nullable();
            $table->float('total')->nullable();
            $table->float('discounted_amount')->nullable();
            $table->boolean('free_discount')->default(false);
            $table->string('action')->nullable();
            $table->float('amount_paid')->nullable();
            $table->integer('currency_id')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_gateway')->nullable();
            $table->float('payment_gateway_charged_percentage')->nullable();
            $table->float('payment_gateway_expected_charged_percentage')->nullable();
            $table->string('payment_reference')->nullable();
            $table->float('payment_gateway_charge')->default(0);
            $table->float('payment_gateway_remittance')->default(0);
            $table->string('payment_code')->nullable();
            $table->string('payment_message')->nullable();
            $table->string('payment_status')->default('pending');
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('payments');
    }
}
