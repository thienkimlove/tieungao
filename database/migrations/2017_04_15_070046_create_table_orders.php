<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrders extends Migration
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

            $table->string('billing_name');
            $table->string('billing_address');
            $table->string('billing_district');
            $table->string('billing_province');
            $table->string('billing_phone')->nullable();
            $table->string('billing_email')->nullable();


            $table->string('shipping_name');
            $table->string('shipping_address');
            $table->string('shipping_district');
            $table->string('shipping_province');
            $table->string('shipping_phone')->nullable();
            $table->string('shipping_email')->nullable();

            $table->text('customer_note')->nullable();

            $table->tinyInteger('status')->unsigned()->default(0); // 0 : created, 1 : sale process, 2 : warehouse process; 3 : exported, 4 : cancel

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
