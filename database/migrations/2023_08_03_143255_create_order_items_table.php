<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('po_id')->nullable();
            $table->string('plm')->nullable();
            $table->string('style_no')->nullable();
            $table->string('colour')->nullable();
            $table->string('item_no')->nullable();
            $table->string('size')->nullable();
            $table->string('qty_ordered')->nullable();
            $table->string('inner_qty')->nullable();
            $table->string('outer_case_qty')->nullable();
            $table->string('supplier_price')->nullable();
            $table->string('value')->nullable();
            $table->string('selling_price')->nullable();
            $table->timestamps();

            $table->foreign('po_id')->references('id')->on('purchage_orders')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
