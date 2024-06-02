<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriticalDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('critical_details', function (Blueprint $table) {
            $table->id();
            $table->integer('critical_id')->nullable();
            $table->string('create_pp_meeting_schedule')->nullable();
            $table->string('pp_meeting_report_upload')->nullable();
            $table->string('cutting_date_plan')->nullable();
            $table->string('cutting_date_actual')->nullable();
            $table->string('embellishment_plan')->nullable();
            $table->string('embellishment_actual')->nullable();
            $table->string('Sewing_plan')->nullable();
            $table->string('Sewing_actual')->nullable();
            $table->string('washing_complete_plan')->nullable();
            $table->string('washing_complete_actual')->nullable();
            $table->string('finishing_complete_plan')->nullable();
            $table->string('finishing_complete_actual')->nullable();
            $table->string('sewing_inline_inspection_date_plan')->nullable();
            $table->string('sewing_inline_inspection_date_actual')->nullable();
            $table->string('create_inline_inspection_schdule')->nullable();
            $table->string('sewing_inline_inspection_report_upload')->nullable(); 
            $table->string('finishing_inline_inspection_report')->nullable(); 
            $table->string('pre_final_date_plan')->nullable(); 
            $table->string('pre_final_date_actual')->nullable();
            $table->string('create_aql_schedule')->nullable();
            $table->string('pre_final_aql_report_schedule')->nullable();
            $table->string('final_aql_date_plan')->nullable();
            $table->string('final_aql_date_actual')->nullable();
            $table->string('final_aql_report_upload')->nullable();
            $table->string('production_sample_approval_plan')->nullable();
            $table->string('production_sample_approval_actual')->nullable();
            $table->string('production_sample_dispatch')->nullable();
            $table->string('production_sample_upload')->nullable();
            $table->string('shipment_booking_with_acs_plan')->nullable();
            $table->string('shipment_booking_with_acs_actual')->nullable();
            $table->string('sa_approval_plan')->nullable();
            $table->string('sa_approval_actual')->nullable();
            $table->string('ex_factory_date_po')->nullable();
            $table->string('revised_ex_factory_date')->nullable();
            $table->string('actual_ex_factory_date')->nullable();
            $table->string('shipped_units')->nullable();
            $table->string('orginal_eta_sa_date')->nullable();
            $table->string('revised_eta_sa_date')->nullable();
            $table->string('ship_mode_sea_air')->nullable();
            $table->string('forward_ref')->nullable();
            $table->string('late_delivery_discounts_crp')->nullable();
            $table->string('invoice_num')->nullable();
            $table->string('invoice_create_date')->nullable();
            $table->string('payment_receive_date')->nullable();
            $table->string('vendor_last_update_date')->nullable();
            $table->string('reason_for_change_affect_shipment')->nullable();
            $table->string('aeon_comments_date')->nullable();
            $table->string('vendor_comments_date')->nullable();
            $table->string('sa_eta_5_days')->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('critical_details');
    }
}
