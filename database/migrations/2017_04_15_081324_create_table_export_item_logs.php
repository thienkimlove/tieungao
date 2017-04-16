<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableExportItemLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('export_item_logs', function (Blueprint $table) {
            $table->integer('export_id')->unsigned();
            $table->foreign('export_id')->references('id')->on('exports')->onDelete('cascade');

            $table->integer('stock_product_id')->unsigned();
            $table->foreign('stock_product_id')->references('id')->on('stock_products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('export_item_logs');
    }
}
