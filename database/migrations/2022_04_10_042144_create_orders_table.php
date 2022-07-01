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
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->integer('promo_id')->unsigned()->nullable();
            $table->float('shippingfee')->default(0);
            $table->integer('delivery_time')->default(0);
            $table->float('total')->default(0);
            $table->string('status')->default('Đang chờ xác nhận');
            $table->timestamps();
            $table->foreign('customer_id')
            ->references('id')
            ->on('customers')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('promo_id')
            ->references('id')
            ->on('promotions')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
};
