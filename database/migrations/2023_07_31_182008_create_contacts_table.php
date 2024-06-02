<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('buyer_department_id')->nullable();
            $table->unsignedBigInteger('vendor_manufacturer_id')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('department')->nullable();
            $table->string('designation')->nullable();
            $table->timestamps();

            $table->foreign('buyer_department_id')->references('id')->on('departments')->onDelete('CASCADE');
            $table->foreign('vendor_manufacturer_id')->references('id')->on('manufacturers')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
