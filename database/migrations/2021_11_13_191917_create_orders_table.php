<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('posted_by');
            $table->string('customer_name');
            $table->string('customer_contact');
            $table->string('booking_date');
            $table->string('delivery_date');
            $table->string('invoice_no');
            $table->string('neck');
            $table->string('shoulder');
            $table->string('arms');
            $table->string('biceps');
            $table->string('chest');
            $table->string('back');
            $table->string('belly');
            $table->string('wc_length');
            $table->string('pc_length');
            $table->string('sherwani_length');
            $table->string('kurta_length');
            $table->string('waist');
            $table->string('hips');
            $table->string('thigh');
            $table->string('knee');
            $table->string('calf');
            $table->string('botton');
            $table->string('length');
            $table->string('ref_color');
            $table->string('ref_design');
            $table->longText('ref_images');
            $table->string('order_price');
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
        Schema::dropIfExists('orders');
    }
}
