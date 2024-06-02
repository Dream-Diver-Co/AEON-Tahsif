<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchageOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchage_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('buyer_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('vendor_id')->nullable();
            $table->string('po_department')->nullable();
            $table->string('buyer_price')->nullable();
            $table->string('access_price')->nullable();
            $table->string('style_note')->nullable();
            $table->string('vendor_price')->nullable();
            $table->string('earliest_buyer_date')->nullable();
            $table->string('approved_date')->nullable();
            $table->string('buyer_date')->nullable();
            $table->string('ex_factory_date')->nullable();
            $table->string('po_no')->nullable();

            $table->string('plm')->nullable();
            $table->string('description')->nullable();
            $table->string('fabric_quality')->nullable();
            $table->string('fabric_content')->nullable();
            $table->string('fabric_type')->nullable();
            $table->string('supplier_no')->nullable();
            $table->string('supplier_name')->nullable();
            $table->string('currency')->nullable();
            $table->string('payment_terms')->nullable();
            $table->string('ship_mode')->nullable();

            $table->string('care_lavel_date')->nullable();
            $table->string('stlye_no')->nullable();


            $table->string('size')->nullable();
            $table->string('qty_ordered')->nullable();
            $table->string('inner_qty')->nullable();
            $table->string('outer_case_qty')->nullable();
            $table->string('value')->nullable();

            $table->string('selling_price')->nullable();
            $table->string('upload_picture_germent')->nullable();
            $table->string('upload_artwork')->nullable();
            $table->longText('note')->nullable();
            $table->string('item_no')->nullable();
            $table->string('colour')->nullable();
            $table->timestamps();

            $table->foreign('buyer_id')->references('id')->on('buyers')->onDelete('CASCADE');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('CASCADE');
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchage_orders');
    }
}
