<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriticalPathsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('critical_paths', function (Blueprint $table) {
            $table->id();
            $table->integer('po_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->integer('department_id')->nullable();
            $table->string('season')->nullable();
            $table->string('image')->nullable();
            $table->string('fabric_type')->nullable();
            $table->string('block_repeat_initial')->nullable();
            $table->string('vendor')->nullable();
            $table->string('manufacture_unit')->nullable();
            $table->string('plm_number')->nullable();
            $table->string('purchase_order_number')->nullable();
            $table->string('style_no')->nullable();
            $table->string('order_qty')->nullable();
            $table->string('supplier_price_product_cost')->nullable();
            $table->string('total_value')->nullable();
            $table->string('style_description')->nullable();
            $table->string('care_label_date')->nullable();
            $table->string('colour')->nullable();
            $table->string('fabric_ref')->nullable();
            $table->string('fabric_content')->nullable();
            $table->string('fabric_weight')->nullable();
            $table->string('fabric_mill')->nullable();

            $table->string('lead_times')->nullable();
            $table->string('treated_as_priority_order')->nullable();
            $table->string('official_po_sent_plan_date')->nullable();
            $table->string('official_po_sent_actual_date')->nullable();

            $table->string('colour_std_print_artwork_sent_to_supplier_plan_date')->nullable();
            $table->string('colour_std_print_artwork_sent_to_supplier_actual_date')->nullable();
            $table->string('lab_dip_approval_plan_date')->nullable();
            $table->string('lab_dip_approval_actual_date')->nullable();
            $table->string('lab_dip_dispatch_details')->nullable();
            $table->string('lab_dip_image')->nullable();
            $table->string('embellishment_s_o_approval_plan_date')->nullable();
            $table->string('embellishment_s_o_approval_actual_date')->nullable();
            $table->string('embellishment_s_o_dispatch_details')->nullable();
            $table->string('embellishment_s_o_image')->nullable();

            $table->string('fabric_ordered_plan_date')->nullable();
            $table->string('fabric_ordered_actual_date')->nullable();
            $table->string('bulk_fabric_knit_down_approval_plan_date')->nullable();
            $table->string('bulk_fabric_knit_down_approval_actual_date')->nullable();
            $table->string('bulk_fabric_knit_down_dispatch_details')->nullable();
            $table->string('bulk_fabric_knit_down_image')->nullable();
            $table->string('bulk_yarn_fabric_plan_date')->nullable();
            $table->string('bulk_yarn_fabric_actual_date')->nullable();

            $table->string('development_photo_sample_sent_plan_date')->nullable();
            $table->string('development_photo_sample_sent_actual_date')->nullable();
            $table->string('development_photo_sample_dispatch_details')->nullable();
            $table->string('development_photo_sample_dispatch_sample_image')->nullable();
            $table->string('fit_approval_plan')->nullable();
            $table->string('fit_approval_actual')->nullable();
            $table->string('fit_dispatch')->nullable();
            $table->string('fit_sample_image')->nullable();
            $table->string('size_set_approval')->nullable();
            $table->string('size_set_actual')->nullable();
            $table->string('size_set_dispatch')->nullable();
            $table->string('size_set_image')->nullable();
            $table->string('pp_approval')->nullable();
            $table->string('pp_actual')->nullable();
            $table->string('pp_dispatch')->nullable();
            $table->string('pp_sample_image')->nullable();

            $table->string('care_label_approval')->nullable();
            $table->string('care_label_actual')->nullable();
            $table->string('material_inhouse_plan')->nullable();
            $table->string('material_inhouse_actual')->nullable();
            $table->string('pp_meeting_plan')->nullable();
            $table->string('pp_meeting_actual')->nullable();

            $table->text('create_pp_meeting_schedule')->nullable();
            $table->text('pp_meeting_report_upload')->nullable();
            $table->text('cutting_date_plan')->nullable();
            $table->text('cutting_date_actual')->nullable();
            $table->text('embellishment_plan')->nullable();
            $table->text('embellishment_actual')->nullable();
            $table->text('Sewing_plan')->nullable();
            $table->text('Sewing_actual')->nullable();
            $table->text('washing_complete_plan')->nullable();
            $table->text('washing_complete_actual')->nullable();
            $table->text('finishing_complete_plan')->nullable();
            $table->text('finishing_complete_actual')->nullable();

            $table->text('sewing_inline_inspection_date_plan')->nullable();
            $table->text('sewing_inline_inspection_date_actual')->nullable();
            $table->text('create_inline_inspection_schdule')->nullable();
            $table->text('sewing_inline_inspection_report_upload')->nullable();
            $table->text('finishing_inline_inspection_report')->nullable();
            $table->text('finishing_inline_inspection_date_plan')->nullable();
            $table->text('finishing_inline_inspection_date_actual')->nullable();
            $table->text('pre_final_date_plan')->nullable();
            $table->text('pre_final_date_actual')->nullable();
            $table->text('create_aql_schedule')->nullable();

            $table->text('pre_final_aql_report_schedule')->nullable();
            $table->text('final_aql_date_plan')->nullable();
            $table->text('final_aql_date_actual')->nullable();
            $table->text('final_aql_report_upload')->nullable();
            $table->text('production_sample_approval_plan')->nullable();
            $table->text('production_sample_approval_actual')->nullable();
            $table->text('production_sample_dispatch')->nullable();
            $table->text('production_sample_upload')->nullable();
            $table->text('shipment_booking_with_acs_plan')->nullable();
            $table->text('shipment_booking_with_acs_actual')->nullable();
            $table->text('sa_approval_plan')->nullable();
            $table->text('sa_approval_actual')->nullable();

            $table->text('ex_factory_date_po')->nullable();
            $table->text('revised_ex_factory_date')->nullable();
            $table->text('actual_ex_factory_date')->nullable();
            $table->text('shipped_units')->nullable();
            $table->text('orginal_eta_sa_date')->nullable();
            $table->text('revised_eta_sa_date')->nullable();
            $table->text('ship_mode_sea_air')->nullable();
            $table->text('forward_ref')->nullable();

            $table->text('late_delivery_discounts_crp')->nullable();
            $table->text('invoice_num')->nullable();
            $table->text('invoice_create_date')->nullable();
            $table->text('payment_receive_date')->nullable();
            $table->text('vendor_last_update_date')->nullable();
            $table->text('reason_for_change_affect_shipment')->nullable();
            $table->text('aeon_comments_date')->nullable();
            $table->text('vendor_comments_date')->nullable();
            $table->text('sa_eta_5_days')->nullable();
            $table->text('note')->nullable();

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
        Schema::dropIfExists('critical_paths');
    }
}
