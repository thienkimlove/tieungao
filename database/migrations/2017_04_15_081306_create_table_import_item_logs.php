<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableImportItemLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import_item_logs', function (Blueprint $table) {

            $table->integer('import_id')->unsigned();
            $table->foreign('import_id')->references('id')->on('imports')->onDelete('cascade');

            $table->integer('stock_product_id')->unsigned();
            $table->foreign('stock_product_id')->references('id')->on('stock_products')->onDelete('cascade');

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
        Schema::dropIfExists('import_item_logs');
    }
}
