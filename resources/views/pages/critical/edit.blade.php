@php
    //dd($criticalPath);
@endphp


@extends('layouts.admin')

@section('content')
    <style>
        .toplabel {
            margin-top: 12px;
        }

        .rowItem {
            margin-top: 10px;
        }

        .rowBottom {
            margin-bottom: 10px;
        }

        #update {
            float: right;
        }
    </style>
    <?php
    function setBackgroundColorBasedOnDateDifference($planDateStr, $actualDateStr)
    {
        // Convert the date strings to DateTime objects
        $planDate = new DateTime($planDateStr);
        $actualDate = new DateTime($actualDateStr);

        // Calculate the difference in days
        $dateDifference = $planDate->diff($actualDate)->days;
        // Define the background color based on the date difference
        if (empty($actualDateStr) || $dateDifference < 0) {
            return 'red'; // Invalid date or empty actual date
        } elseif ($dateDifference <= 10) {
            return 'green'; // Difference is 2 days
        } elseif ($dateDifference > 10) {
            return 'red'; // Difference is 2 days
        } else {
            // return 'yellow'; // Other differences
        }
    }
    function change_date_formate($dateString){
        $originalDate = new DateTime($dateString);
        $formattedDate = $originalDate->format('m-d-Y');
        echo $formattedDate;
    }
    ?>
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session('success') }}
            </div>
        @endif
        {{-- <div class="mb-5 text-right">
            <button id="toggleAllButton" class="btn btn-info btn-sm">Toggle All</button>
        </div> --}}
        {{-- <button id="toggleAllButton" class="btn btn-info btn-sm">Toggle All</button> --}}
        <form action="{{ route('criticalUpdate', $criticalPath->po_id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            General information
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="rowItem row accordion-collapse collapse toplabel"
                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="text" name="brand" id="brand" placeholder="brand" class="form-control"
                                    value="{{ $criticalPath->name }}" readonly />
                                <label for="brand">Brand</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="text" value="{{ $criticalPath->deptName }}" name="department"
                                    id="department" placeholder="Department" class="form-control" readonly />
                                <label for="department">Department</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="text" value="{{ $criticalPath->season }}" name="season" id="season"
                                    placeholder="Season" class="form-control" />
                                <label for="season">Season</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            @php
                                $edited_file_name = substr($criticalPath->image, 14);
                            @endphp
                            <span>{{ $edited_file_name }}</span>
                            <input type="file" name="image" />
                            <label for="Image">Image</label>
                        </div>
                    </div>

                    <div id="flush-collapseOne" class="rowItem row accordion-collapse collapse"
                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="text" readonly
                                    value="{{ $criticalPath->fabric_type == 1 ? 'Local Fabric' : ($criticalPath->fabric_type == 2 ? 'Special Yarn/ AOP Fabric' : 'Imported Fabric') }}"
                                    name="fabricType" id="fabricType" placeholder="Fabric Type" class="form-control" />
                                <label for="fabricType">Fabric Type</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select name="block_repeat_initial" id="block" class="form-control">
                                    <option value="{{ $criticalPath->block_repeat_initial }}" selected disabled>
                                        {{ $criticalPath->block_repeat_initial == 1 ? 'Initial' : ($criticalPath->block_repeat_initial == 2 ? 'Repeat' : 'SELECT BLOCK') }}
                                    </option>
                                    <option value="1">Initial</option>
                                    <option value="2">Repeat</option>
                                    <!-- Add more options as needed -->
                                </select>
                                <label for="block">BLOCK</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="text" readonly value="{{ $criticalPath->vendorName }}" name="vendor"
                                    id="vendor" placeholder="Vendor" class="form-control" />
                                <label for="vendor">Vendor</label>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-floating">
                                <select name="manufacture_unit" id="block" class="form-control">
                                    <option value="{{ $criticalPath->manufacture_unit }}" selected disabled>
                                        {{ $criticalPath->manufacture_unit == 1 ? 'KSS' : ($criticalPath->manufacture_unit == 2 ? 'OTHER' : 'SELECT Manufacture Unit') }}
                                    </option>
                                    <option value="1">KSS</option>
                                    <option value="2">OTHER</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                        </div>
                    </div>

                    <div id="flush-collapseOne" class="rowItem row accordion-collapse collapse"
                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="text" readonly value="{{ $criticalPath->plm }}" name="plmNumber"
                                    id="plmNumber" placeholder="PLM Number" class="form-control" />
                                <label for="plmNumber">PLM Number</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="text" readonly value="{{ $criticalPath->po_no }}"
                                    name="purchaseOrderNumber" id="purchaseOrderNumber"
                                    placeholder="Purchase Order Number" class="form-control" />
                                <label for="purchaseOrderNumber">Purchase Order Number</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="text" value="{{ $criticalPath->aStyleNo }}" name="style_no"
                                    id="styleNumber" placeholder="Style Number" class="form-control" />
                                <label for="styleNumber">Style Number</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input readonly type="text" value="{{ $criticalPath->TotalItemsOrdered }}"
                                    name="orderQuantity" id="orderQuantity" placeholder="Order Quantity"
                                    class="form-control" />
                                <label for="orderQuantity">Order Quantity</label>
                            </div>
                        </div>
                    </div>

                    <div id="flush-collapseOne" class="rowItem row accordion-collapse collapse"
                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="text" value="{{ $criticalPath->supplier_price_product_cost }}"
                                    name="supplier_price_product_cost" id="supplierPrice"
                                    placeholder="Supplier Price/Product Cost" class="form-control" />
                                <label for="supplierPrice">Supplier Price/Product Cost</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="text" value="{{ $criticalPath->total_value }}" name="total_value"
                                    id="totalValue" placeholder="Total Value" class="form-control" />
                                <label for="totalValue">Total Value</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="text" value="{{ $criticalPath->style_description }}"
                                    name="style_description" id="styleDescription" placeholder="Style Description"
                                    class="form-control" />
                                <label for="styleDescription">Style Description</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="text" value="{{ $criticalPath->colourName }}" name="colour"
                                    id="colour" placeholder="Colour" class="form-control" />
                                <label for="colour">Colour</label>
                            </div>
                        </div>
                    </div>
                    <div id="flush-collapseOne" class="rowItem rowBottom row accordion-collapse collapse"
                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input readonly type="date" value="{{ $criticalPath->care_lavel_date }}"
                                    name="care_lavel_date" id="careLabelDate" placeholder="Care Label Date"
                                    class="form-control" />
                                <label for="careLabelDate">Care Label Date</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="text" value="{{ $criticalPath->fabric_ref }}" name="fabric_ref"
                                    id="fabricReference" placeholder="Fabric Reference" class="form-control" />
                                <label for="fabricReference">Fabric Reference</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-floating">
                                <input type="text" readonly value="{{ $criticalPath->fabric_content }}"
                                    name="fabricContent" id="fabricContent" placeholder="Fabrication/ Fabric Content"
                                    class="form-control" />
                                <label for="fabricContent"> Fabric Content</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-floating">
                                <input type="text" value="{{ $criticalPath->fabric_weight }}" name="fabric_weight"
                                    id="fabricWeight" placeholder="Fabric Weight" class="form-control" />
                                <label for="fabricWeight">Fabric Weight</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-floating">
                                <input type="text" value="{{ $criticalPath->fabric_mill }}" name="fabric_mill"
                                    id="fabricMill" placeholder="Fabric Mill" class="form-control" />
                                <label for="fabricMill">Fabric Mill</label>
                            </div>
                        </div>
                    </div>

                    <div id="flush-collapseOne" class="rowItem rowBottom row accordion-collapse collapse"
                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div>
                            <button id="update" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Purchase Order information
                        </button>
                    </h2>

                    <div id="flush-collapseTwo" class="rowBottom row accordion-collapse collapse toplabel"
                        aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">

                        <div class="col-md-3">
                            <div class="form-floating">
                                <input readonly type="text" value="{{ $criticalPath->lead_times }}" name="lead_times"
                                    id="leadTimes" placeholder="Lead Times" class="form-control" />
                                <label for="leadTimes">Lead Times</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select name="treated_as_priority_order" id="block" class="form-control">
                                    <option value="{{ $criticalPath->treated_as_priority_order }}" selected disabled>
                                        {{ $criticalPath->treated_as_priority_order == 1 ? 'Regular Lead Item' : ($criticalPath->treated_as_priority_order == 2 ? 'Short Term Item' : 'Treated Priority order') }}
                                    </option>
                                    <option value="1">Regular Lead Item</option>
                                    <option value="2">Short Term Item</option>
                                    <!-- Add more options as needed -->
                                </select>
                                <!-- <input type="text" value="" name="priorityOrder" id="priorityOrder" placeholder="Treated as a priority order" class="form-control" /> -->
                                <label for="priorityOrder">Treated as a priority order</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input readonly type="text" value="{{ $criticalPath->official_po_sent_plan_date }}"
                                    name="official_po_sent_plan_date" id="official_po_sent_plan_date"
                                    placeholder="Official PO sent (Plan)" class="form-control" />
                                <label for="planPO">Official PO sent (Plan)</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input readonly type="date" value="{{ $criticalPath->official_po_sent_actual_date }}"
                                    name="official_po_sent_actual_date" id="official_po_sent_actual_date"
                                    placeholder="Official PO sent (Actual)" class="form-control" />
                                <label for="actualPO">Official PO sent (Actual)</label>
                            </div>
                        </div>

                    </div>
                    <div id="flush-collapseTwo" class="rowBottom row accordion-collapse collapse toplabel"
                        aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <div>
                            <button id="update" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseThree" aria-expanded="false"
                            aria-controls="flush-collapseThree">
                            Lab dips and Embellishment Information
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="rowItem row accordion-collapse collapse toplabel"
                        aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">

                        <div class="col-md-3">
                            <div class="form-floating">
                                <input readonly type="date"
                                    value="{{ $criticalPath->colour_std_print_artwork_sent_to_supplier_plan_date }}"
                                    name="colour_std_print_artwork_sent_to_supplier_plan_date"
                                    id="colour_std_print_artwork_sent_to_supplier_plan_date"
                                    placeholder="Colour std/print artwork sent to supplier (plan)" class="form-control" />
                                <label for="colourArtworkPlan">Colour std sent supplier (Plan)</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input style="color: <?php echo !empty($criticalPath->colour_std_print_artwork_sent_to_supplier_actual_date) && $criticalPath->colour_std_print_artwork_sent_to_supplier_actual_date !== 'NA' ? setBackgroundColorBasedOnDateDifference($criticalPath->colour_std_print_artwork_sent_to_supplier_plan_date, $criticalPath->colour_std_print_artwork_sent_to_supplier_actual_date) : ($criticalPath->colour_std_print_artwork_sent_to_supplier_actual_date == 'NA' ? 'RED' : ''); ?>;background-color:<?php echo empty($criticalPath->colour_std_print_artwork_sent_to_supplier_actual_date) ? 'red' : ''; ?>"
                                    type="date" id="colour_std_print_artwork_sent_to_supplier_actual_date"
                                    class="colour_std_print_artwork_sent_to_supplier_actual_date form-control"
                                    name="colour_std_print_artwork_sent_to_supplier_actual_date"
                                    value="{{ $criticalPath->colour_std_print_artwork_sent_to_supplier_actual_date }}" />

                                <label for="colourArtworkActual">Colour std sent supplier (Actual)</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input readonly type="date" value="{{ $criticalPath->lab_dip_approval_plan_date }}"
                                    name="lab_dip_approval_plan_date" id="lab_dip_approval_plan_date"
                                    placeholder="Lab dip Approval (Plan)" class="form-control" />
                                <label for="labDipApprovalPlan">Lab dip Approval (Plan)</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input style="color: <?php echo !empty($criticalPath->lab_dip_approval_actual_date) && $criticalPath->lab_dip_approval_actual_date !== 'NA' ? setBackgroundColorBasedOnDateDifference($criticalPath->lab_dip_approval_plan_date, $criticalPath->lab_dip_approval_actual_date) : ($criticalPath->lab_dip_approval_actual_date == 'NA' ? 'RED' : ''); ?>;background-color:<?php echo empty($criticalPath->lab_dip_approval_actual_date) ? 'red' : ''; ?>"
                                    type="date" id="lab_dip_approval_actual_date"
                                    class="lab_dip_approval_actual_date form-control" name="lab_dip_approval_actual_date"
                                    value="{{ $criticalPath->lab_dip_approval_actual_date }}" />

                                <label for="labDipApprovalActual">Lab dip Approval (Actual)</label>
                            </div>
                        </div>

                    </div>
                    <div id="flush-collapseThree" class="rowItem row accordion-collapse collapse"
                        aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="text" value="{{ $criticalPath->lab_dip_dispatch_details }}"
                                    name="lab_dip_dispatch_details" id="labDipDispatch"
                                    placeholder="Lab Dip Dispatch Details" class="form-control" />
                                <label for="labDipDispatch">Lab Dip Dispatch Details</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            @php
                                $edited_lab_dip_image_name = substr($criticalPath->lab_dip_image, 14);
                            @endphp
                            <span>{{ $edited_lab_dip_image_name }}</span>
                            <input type="file" name="lab_dip_image" />
                            <label for="">Lab Dip Image</label>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input readonly type="date"
                                    value="{{ $criticalPath->embellishment_s_o_approval_plan_date }}"
                                    name="embellishment_s_o_approval_plan_date" id="embellishment_s_o_approval_plan_date"
                                    placeholder="Embellishment - S/O Approval (Plan)" class="form-control" />
                                <label for="embellishmentApprovalPlan">Embellishment - S/O Approval (Plan)</label>
                            </div>
                        </div>
                    </div>
                    <div id="flush-collapseThree" class="rowItem rowBottom row accordion-collapse collapse"
                        aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">

                        <div class="col-md-4">
                            <div class="form-floating">
                                <input style="color: <?php echo !empty($criticalPath->embellishment_s_o_approval_actual_date) && $criticalPath->embellishment_s_o_approval_actual_date !== 'NA' ? setBackgroundColorBasedOnDateDifference($criticalPath->colour_std_print_artwork_sent_to_supplier_plan_date, $criticalPath->embellishment_s_o_approval_actual_date) : ($criticalPath->embellishment_s_o_approval_actual_date == 'NA' ? 'RED' : ''); ?>;background-color:<?php echo empty($criticalPath->embellishment_s_o_approval_actual_date) ? 'red' : ''; ?>"
                                    type="date" id="embellishment_s_o_approval_actual_date"
                                    class="embellishment_s_o_approval_actual_date form-control"
                                    name="embellishment_s_o_approval_actual_date"
                                    value="{{ $criticalPath->embellishment_s_o_approval_actual_date }}" />
                                <label for="embellishmentApprovalActual">Embellishment - S/O Approval (Actual)</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" value="{{ $criticalPath->embellishment_s_o_dispatch_details }}"
                                    name="embellishment_s_o_dispatch_details" id="embellishmentDispatch"
                                    placeholder="Embellishment - S/O Dispatch Details" class="form-control" />
                                <label for="embellishmentDispatch">Embellishment - S/O Dispatch Details</label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            @php
                                $edited_emb_so_img_file_name = substr($criticalPath->embellishment_s_o_image, 14);
                            @endphp
                            <span>{{ $edited_emb_so_img_file_name }}</span>

                            <input type="file" name="emb_so_img" />
                            <label for="">Embellishment - S/O Image</label>
                        </div>
                    </div>
                    <div id="flush-collapseThree" class="rowItem rowBottom row accordion-collapse collapse"
                        aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div>
                            <button id="update" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseFour" aria-expanded="false"
                            aria-controls="flush-collapseFour">
                            Bulk Fabric Information
                        </button>
                    </h2>
                    <div id="flush-collapseFour" class="rowItem row accordion-collapse collapse toplabel"
                        aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">

                        <div class="col-md-4">
                            <div class="form-floating">

                                <input readonly type="date" value="{{ $criticalPath->fabric_ordered_plan_date }}"
                                    name="fabric_ordered_plan_date" id="fabric_ordered_plan_date"
                                    placeholder="Fabric Ordered (plan)" class="form-control" />
                                <label for="fabricOrderedPlan">Fabric Ordered (plan)</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input style="color: <?php echo !empty($criticalPath->fabric_ordered_actual_date) && $criticalPath->fabric_ordered_actual_date !== 'NA' ? setBackgroundColorBasedOnDateDifference($criticalPath->fabric_ordered_plan_date, $criticalPath->fabric_ordered_actual_date) : ($criticalPath->fabric_ordered_actual_date == 'NA' ? 'RED' : ''); ?>;background-color:<?php echo empty($criticalPath->fabric_ordered_actual_date) ? 'red' : ''; ?>"
                                    type="date" id="fabric_ordered_actual_date"
                                    class="fabric_ordered_actual_date form-control" name="fabric_ordered_actual_date"
                                    value="{{ $criticalPath->fabric_ordered_actual_date }}" />

                                <label for="fabricOrderedActual">Fabric Ordered (actual)</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input readonly type="date"
                                    value="{{ $criticalPath->bulk_fabric_knit_down_approval_plan_date }}"
                                    name="bulk_fabric_knit_down_approval_plan_date"
                                    id="bulk_fabric_knit_down_approval_plan_date"
                                    placeholder="Bulk Fabric/ Knit Down Approval (Plan)" class="form-control" />
                                <label for="bulkFabricApprovalPlan">Bulk Fabric/ Knit Down Approval (Plan)</label>
                            </div>
                        </div>



                    </div>
                    <div id="flush-collapseFour" class="rowItem row accordion-collapse collapse"
                        aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input style="color: <?php echo !empty($criticalPath->bulk_fabric_knit_down_approval_actual_date) && $criticalPath->bulk_fabric_knit_down_approval_actual_date !== 'NA' ? setBackgroundColorBasedOnDateDifference($criticalPath->bulk_fabric_knit_down_approval_plan_date, $criticalPath->bulk_fabric_knit_down_approval_actual_date) : ($criticalPath->bulk_fabric_knit_down_approval_actual_date == 'NA' ? 'RED' : ''); ?>;background-color:<?php echo empty($criticalPath->bulk_fabric_knit_down_approval_actual_date) ? 'red' : ''; ?>"
                                    type="date" id="bulk_fabric_knit_down_approval_actual_date"
                                    class="bulk_fabric_knit_down_approval_actual_date form-control"
                                    name="bulk_fabric_knit_down_approval_actual_date"
                                    value="{{ $criticalPath->bulk_fabric_knit_down_approval_actual_date }}" />

                                <label for="bulkFabricApprovalActual">Bulk Fabric/ Knit Down Approval (Actual)</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" value="{{ $criticalPath->bulk_fabric_knit_down_dispatch_details }}"
                                    name="bulk_fabric_knit_down_dispatch_details" id="bulkFabricDispatch"
                                    placeholder="Bulk Fabric/ Knit Down Dispatch Details" class="form-control" />
                                <label for="bulkFabricDispatch">Bulk Fabric/ Knit Down Dispatch Details</label>
                            </div>
                        </div>


                        <div class="col-md-3">
                            @php
                                $bulk_fabric_knit_down_image = substr($criticalPath->bulk_fabric_knit_down_image, 14);
                            @endphp
                            <span>{{ $bulk_fabric_knit_down_image }}</span>

                            <input type="file" name="bulk_fabric_knit_down_image" />
                            <label for="">Bulk fabric/ Knit down Image</label>
                        </div>


                    </div>
                    <div id="flush-collapseFour" class="rowItem rowBottom row accordion-collapse collapse"
                        aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input readonly type="date" value="{{ $criticalPath->bulk_yarn_fabric_plan_date }}"
                                    name="bulk_yarn_fabric_plan_date" id="bulk_yarn_fabric_plan_date"
                                    placeholder="Bulk Yarn / Fabric Inhouse (Plan)" class="form-control" />
                                <label for="bulkYarnInhousePlan">Bulk Yarn / Fabric Inhouse (Plan)</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input style="color: <?php echo !empty($criticalPath->bulk_yarn_fabric_actual_date) && $criticalPath->bulk_yarn_fabric_actual_date !== 'NA' ? setBackgroundColorBasedOnDateDifference($criticalPath->bulk_yarn_fabric_plan_date, $criticalPath->bulk_yarn_fabric_actual_date) : ($criticalPath->bulk_yarn_fabric_actual_date == 'NA' ? 'RED' : ''); ?>;background-color:<?php echo empty($criticalPath->bulk_yarn_fabric_actual_date) ? 'red' : ''; ?>"
                                    type="date" id="bulk_yarn_fabric_actual_date"
                                    class="bulk_yarn_fabric_actual_date form-control" name="bulk_yarn_fabric_actual_date"
                                    value="{{ $criticalPath->bulk_yarn_fabric_actual_date }}" />

                                <label for="bulkYarnInhouseActual">Bulk Yarn / Fabric Inhouse (Actual)</label>
                            </div>
                        </div>



                    </div>
                    <div id="flush-collapseFour" class="rowItem rowBottom row accordion-collapse collapse"
                        aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                        <div>
                            <button id="update" class="btn btn-success">Update</button>
                        </div>
                        <div id="flush-collapseSix" class="rowItem rowBottom row accordion-collapse collapse"
                            aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
                            <div>
                                <button id="update" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </div>


                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseFive" aria-expanded="false"
                                aria-controls="flush-collapseFive">
                                Sample Approval Information
                            </button>
                        </h2>
                        <div id="flush-collapseFive" class="rowItem row accordion-collapse collapse toplabel"
                            aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">

                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input readonly type="date"
                                        value="{{ $criticalPath->development_photo_sample_sent_plan_date }}"
                                        name="development_photo_sample_sent_plan_date"
                                        id="development_photo_sample_sent_plan_date"
                                        placeholder="Development sample (Plan)" class="form-control" />
                                    <label for="devSamplePlan">Development sample (Plan)</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input style="color: <?php echo !empty($criticalPath->development_photo_sample_sent_actual_date) && $criticalPath->development_photo_sample_sent_actual_date !== 'NA' ? setBackgroundColorBasedOnDateDifference($criticalPath->development_photo_sample_sent_plan_date, $criticalPath->development_photo_sample_sent_actual_date) : ($criticalPath->development_photo_sample_sent_actual_date == 'NA' ? 'RED' : ''); ?>;background-color:<?php echo empty($criticalPath->development_photo_sample_sent_actual_date) ? 'red' : ''; ?>"
                                        type="date" id="development_photo_sample_sent_actual_date"
                                        class="development_photo_sample_sent_actual_date form-control"
                                        name="development_photo_sample_sent_actual_date"
                                        value="{{ $criticalPath->development_photo_sample_sent_actual_date }}" />

                                    <label for="devSampleActual">Development sample (Actual)</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="text"
                                        value="{{ $criticalPath->development_photo_sample_dispatch_details }}"
                                        name="development_photo_sample_dispatch_details" id="devSampleDispatch"
                                        placeholder="Development dispatch details" class="form-control" />
                                    <label for="devSampleDispatch">Development dispatch details</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                @php
                                    $dev_photo_file_name = substr($criticalPath->development_photo_sample_dispatch_sample_image, 14);
                                @endphp
                                <span>{{ $dev_photo_file_name }}</span>
                                <input type="file" name="dev_img" />
                                <label for="">Development image</label>
                            </div>
                        </div>
                        <div id="flush-collapseFive" class="rowItem row accordion-collapse collapse"
                            aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input readonly type="date" value="{{ $criticalPath->fit_approval_plan }}"
                                        name="fit_approval_plan" placeholder="Fit - Approval (Plan)" class="form-control"
                                        id="fit_approval_plan" />
                                    <label for="fitApprovalPlan">Fit - Approval (Plan)</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input style="color: <?php echo !empty($criticalPath->fit_approval_actual) && $criticalPath->fit_approval_actual !== 'NA' ? setBackgroundColorBasedOnDateDifference($criticalPath->fit_approval_plan, $criticalPath->fit_approval_actual) : ($criticalPath->fit_approval_actual == 'NA' ? 'RED' : ''); ?>;background-color:<?php echo empty($criticalPath->fit_approval_actual) ? 'red' : ''; ?>"
                                        type="date" id="fit_approval_actual" class="fit_approval_actual form-control"
                                        name="fit_approval_actual" value="{{ $criticalPath->fit_approval_actual }}" />

                                    <label for="fitApprovalActual">Fit - Approval (Actual)</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="text" value="{{ $criticalPath->fit_dispatch }}" name="fit_dispatch"
                                        placeholder="Fit Sample dispatch details" class="form-control" />
                                    <label for="fitSampleDispatch">Fit Sample dispatch details</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                @php
                                    $fit_sample_image_name = substr($criticalPath->fit_sample_image, 14);
                                @endphp
                                <span>{{ $fit_sample_image_name }}</span>

                                <input type="file" name="fit_img" />
                                <label for="">Fit sample Image</label>
                            </div>

                        </div>
                        <div id="flush-collapseFive" class="rowItem row accordion-collapse collapse"
                            aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input readonly type="date" value="{{ $criticalPath->size_set_approval }}"
                                        name="size_set_approval" id="size_set_approval"
                                        placeholder="Size set Approval (Plan)" class="form-control" />
                                    <label for="sizeSetApprovalPlan">Size set Approval (Plan)</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input style="color: <?php echo !empty($criticalPath->size_set_actual) && $criticalPath->size_set_actual !== 'NA' ? setBackgroundColorBasedOnDateDifference($criticalPath->size_set_approval, $criticalPath->size_set_actual) : ($criticalPath->size_set_actual == 'NA' ? 'RED' : ''); ?>;background-color:<?php echo empty($criticalPath->size_set_actual) ? 'red' : ''; ?>"
                                        type="date" id="size_set_actual" class="size_set_actual form-control"
                                        name="size_set_actual" value="{{ $criticalPath->size_set_actual }}" />
                                    <label for="sizeSetApprovalPlan">Size set Approval (Actual)</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="text" value="{{ $criticalPath->size_set_dispatch }}"
                                        name="size_set_dispatch" placeholder="Size Set Sample dispatch details"
                                        class="form-control" />
                                    <label for="sizeSetSampleDispatch">Size Set Sample dispatch details</label>
                                </div>
                            </div>


                            <div class="col-md-3">
                                @php
                                    $size_set_name = substr($criticalPath->size_set_image, 14);
                                @endphp
                                <span>{{ $size_set_name }}</span>

                                <input type="file" name="size_img" />
                                <label for="">Size Set sample image </label>
                            </div>
                        </div>
                        <div id="flush-collapseFive" class="rowItem rowBottom row accordion-collapse collapse"
                            aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input readonly type="date" value="{{ $criticalPath->pp_approval }}"
                                        name="pp_approval" id="pp_approval" placeholder="PP Approval (Plan)"
                                        class="form-control" />
                                    <label for="ppApprovalPlan">PP Approval (Plan)</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input style="color: <?php echo !empty($criticalPath->pp_actual) && $criticalPath->pp_actual !== 'NA' ? setBackgroundColorBasedOnDateDifference($criticalPath->pp_approval, $criticalPath->pp_actual) : ($criticalPath->pp_actual == 'NA' ? 'RED' : ''); ?>;background-color:<?php echo empty($criticalPath->pp_actual) ? 'red' : ''; ?>"
                                        type="date" id="pp_actual" class="pp_actual form-control" name="pp_actual"
                                        value="{{ $criticalPath->pp_actual }}" />

                                    <label for="ppApprovalActual">PP approval (Actual)</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="text" value="{{ $criticalPath->pp_dispatch }}" name="pp_dispatch"
                                        placeholder="PP Sample dispatch details" class="form-control" />
                                    <label for="ppSampleDispatch">PP Sample dispatch details</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                @php
                                    $pp_sample_image_file_name = substr($criticalPath->pp_sample_image, 14);
                                @endphp
                                <span>{{ $pp_sample_image_file_name }}</span>


                                <input type="file" name="pp_app_img" />
                                <label for="">PP sample image</label>
                            </div>

                        </div>
                        <div id="flush-collapseFive" class="rowItem rowBottom row accordion-collapse collapse"
                            aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                            <div>
                                <button id="update" class="btn btn-success">Update</button>
                            </div>
                        </div>



                    </div>
                    <div id="flush-collapseEight" class="rowItem rowBottom row accordion-collapse collapse"
                        aria-labelledby="flush-headingEight" data-bs-parent="#accordionFlushExample">
                        <div>
                            <button id="update" class="btn btn-success">Update</button>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseSix" aria-expanded="false"
                                aria-controls="flush-collapseSix">
                                PP Meeting Details
                            </button>
                        </h2>
                        <div id="flush-collapseSix" class="rowItem row accordion-collapse collapse toplabel"
                            aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input readonly type="date" value="{{ $criticalPath->care_label_approval }}"
                                        name="care_label_approval" id="care_label_approval"
                                        placeholder="Care Approval Plan" class="form-control" />
                                    <label for="careApprovalPlan">Care Approval Plan</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="date" value="{{ $criticalPath->care_label_actual }}"
                                        name="care_label_actual" id="care_lavel_date" placeholder="Care Approval Actual"
                                        class="form-control" />
                                    <label for="careApprovalActual">Care Approval Actual</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input readonly type="date" value="{{ $criticalPath->material_inhouse_plan }}"
                                        name="material_inhouse_plan" placeholder="Material Inhouse date (Plan)"
                                        class="form-control" id="material_inhouse_plan" />
                                    <label for="materialInhouseDatePlan">Material Inhouse date (Plan)</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input style="color: <?php echo !empty($criticalPath->material_inhouse_actual) && $criticalPath->material_inhouse_actual !== 'NA' ? setBackgroundColorBasedOnDateDifference($criticalPath->material_inhouse_plan, $criticalPath->material_inhouse_actual) : ($criticalPath->material_inhouse_actual == 'NA' ? 'RED' : ''); ?>;background-color:<?php echo empty($criticalPath->material_inhouse_actual) ? 'red' : ''; ?>"
                                        type="date" id="material_inhouse_actual"
                                        class="material_inhouse_actual form-control" name="material_inhouse_actual"
                                        value="{{ $criticalPath->material_inhouse_actual }}" />

                                    <label for="materialInhouseDateActual">Material Inhouse date (Actual)</label>
                                </div>
                            </div>
                        </div>
                        <div id="flush-collapseSix" class="rowItem rowBottom row accordion-collapse collapse"
                            aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input readonly type="date" value="{{ $criticalPath->pp_meeting_plan }}"
                                        name="pp_meeting_plan" id="pp_meeting_plan" placeholder="PP Meeting Date (Plan)"
                                        class="form-control" />
                                    <label for="ppMeetingDatePlan">PP Meeting Date (Plan)</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input style="color: <?php echo !empty($criticalPath->pp_meeting_actual) && $criticalPath->pp_meeting_actual !== 'NA' ? setBackgroundColorBasedOnDateDifference($criticalPath->colour_std_print_artwork_sent_to_supplier_plan_date, $criticalPath->pp_meeting_actual) : ($criticalPath->pp_meeting_actual == 'NA' ? 'RED' : ''); ?>;background-color:<?php echo empty($criticalPath->pp_meeting_actual) ? 'red' : ''; ?>"
                                        type="date" id="pp_meeting_actual" class="pp_meeting_actual form-control"
                                        name="pp_meeting_actual" value="{{ $criticalPath->pp_meeting_actual }}" />

                                    <label for="ppMeetingDateActual">PP Meeting Date (Actual)</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="date" value="{{ $criticalPath->create_pp_meeting_schedule }}"
                                        name="create_pp_meeting_schedule" placeholder="Create PP Meeting Schedule"
                                        class="form-control" />
                                    <label for="createPPMeetingSchedule">Create PP Meeting Schedule</label>
                                </div>
                            </div>



                            <div class="col-md-3">
                                @php
                                    $pp_meet_img_file_name = substr($criticalPath->pp_meeting_report_upload, 14);
                                @endphp
                                <span>{{ $pp_meet_img_file_name }}</span>

                                <input type="file" name="pp_meet_img" />
                                <label for="">PP Meeting Report Upload</label>
                            </div>

                        </div>
                        <div id="flush-collapseSix" class="rowItem rowBottom row accordion-collapse collapse"
                            aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
                            <div>
                                <button id="update" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingSeven">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseSeven" aria-expanded="false"
                                aria-controls="flush-collapseSeven">
                                Production Information
                            </button>
                        </h2>
                        <div id="flush-collapseSeven" class="rowItem row accordion-collapse collapse toplabel"
                            aria-labelledby="flush-headingSeven" data-bs-parent="#accordionFlushExample">

                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input readonly id="cutting_date_plan" type="date"
                                        value="{{ $criticalPath->cutting_date_plan }}" name="cutting_date_plan"
                                        placeholder="Cutting date (Plan)" class="form-control" />
                                    <label for="cuttingDatePlan">Cutting date (Plan)</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input style="color: <?php echo !empty($criticalPath->cutting_date_actual) && $criticalPath->cutting_date_actual !== 'NA' ? setBackgroundColorBasedOnDateDifference($criticalPath->cutting_date_plan, $criticalPath->cutting_date_actual) : ($criticalPath->cutting_date_actual == 'NA' ? 'RED' : ''); ?>;background-color:<?php echo empty($criticalPath->cutting_date_actual) ? 'red' : ''; ?>"
                                        type="date" id="cutting_date_actual" class="cutting_date_actual form-control"
                                        name="cutting_date_actual" value="{{ $criticalPath->cutting_date_actual }}" />

                                    <label for="cuttingDateActual">Cutting date (Actual)</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input readonly id="embellishment_plan" type="date"
                                        value="{{ $criticalPath->embellishment_plan }}" name="embellishment_plan"
                                        placeholder="Embellishment (Plan)" class="form-control" />
                                    <label for="embellishmentPlan">Embellishment (Plan)</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input style="color: <?php echo !empty($criticalPath->embellishment_actual) && $criticalPath->embellishment_actual !== 'NA' ? setBackgroundColorBasedOnDateDifference($criticalPath->embellishment_plan, $criticalPath->embellishment_actual) : ($criticalPath->embellishment_actual == 'NA' ? 'RED' : ''); ?>;background-color:<?php echo empty($criticalPath->embellishment_actual) ? 'red' : ''; ?>"
                                        type="date" id="embellishment_actual"
                                        class="embellishment_actual form-control" name="embellishment_actual"
                                        value="{{ $criticalPath->embellishment_actual }}" />

                                    <label for="embellishmentActual">Embellishment (Actual)</label>
                                </div>
                            </div>
                        </div>
                        <div id="flush-collapseSeven" class="rowItem row accordion-collapse collapse"
                            aria-labelledby="flush-headingSeven" data-bs-parent="#accordionFlushExample">
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input readonly type="date" id="Sewing_plan"
                                        value="{{ $criticalPath->Sewing_plan }}" name="Sewing_plan"
                                        placeholder="Sewing Start date (Plan)" class="form-control" />
                                    <label for="sewingStartDatePlan">Sewing Start date (Plan)</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input style="color: <?php echo !empty($criticalPath->Sewing_actual) && $criticalPath->Sewing_actual !== 'NA' ? setBackgroundColorBasedOnDateDifference($criticalPath->Sewing_plan, $criticalPath->Sewing_actual) : ($criticalPath->Sewing_actual == 'NA' ? 'RED' : ''); ?>;background-color:<?php echo empty($criticalPath->Sewing_actual) ? 'red' : ''; ?>"
                                        type="date" id="Sewing_actual" class="Sewing_actual form-control"
                                        name="Sewing_actual" value="{{ $criticalPath->Sewing_actual }}" />

                                    <label for="sewingStartDateActual">Sewing Start date (Actual)</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input readonly type="date" id="washing_complete_plan"
                                        value="{{ $criticalPath->washing_complete_plan }}" name="washing_complete_plan"
                                        placeholder="Washing complete date (Plan)" class="form-control" />
                                    <label for="washingCompleteDatePlan">Washing complete date (Plan)</label>
                                </div>
                            </div>
                        </div>
                        <div id="flush-collapseSeven" class="rowItem rowBottom row accordion-collapse collapse"
                            aria-labelledby="flush-headingSeven" data-bs-parent="#accordionFlushExample">
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input style="color: <?php echo !empty($criticalPath->washing_complete_actual) && $criticalPath->washing_complete_actual !== 'NA' ? setBackgroundColorBasedOnDateDifference($criticalPath->washing_complete_plan, $criticalPath->washing_complete_actual) : ($criticalPath->washing_complete_actual == 'NA' ? 'RED' : ''); ?>;background-color:<?php echo empty($criticalPath->washing_complete_actual) ? 'red' : ''; ?>"
                                        type="date" id="washing_complete_actual"
                                        class="washing_complete_actual form-control" name="washing_complete_actual"
                                        value="{{ $criticalPath->washing_complete_actual }}" />

                                    <label for="washingCompleteDateActual">Washing complete date (Actual)</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input readonly type="date" id="finishing_complete_plan"
                                        value="{{ $criticalPath->finishing_complete_plan }}"
                                        name="finishing_complete_plan" placeholder="Finishing complete date (Plan)"
                                        class="form-control" />
                                    <label for="finishingCompleteDatePlan">Finishing complete date (Plan)</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input style="color: <?php echo !empty($criticalPath->finishing_complete_actual) && $criticalPath->finishing_complete_actual !== 'NA' ? setBackgroundColorBasedOnDateDifference($criticalPath->finishing_complete_plan, $criticalPath->finishing_complete_actual) : ($criticalPath->finishing_complete_actual == 'NA' ? 'RED' : ''); ?>;background-color:<?php echo empty($criticalPath->finishing_complete_actual) ? 'red' : ''; ?>"
                                        type="date" id="finishing_complete_actual"
                                        class="finishing_complete_actual form-control" name="finishing_complete_actual"
                                        value="{{ $criticalPath->finishing_complete_actual }}" />

                                    <label for="finishingCompleteDateActual">Finishing complete date (Actual)</label>
                                </div>
                            </div>
                        </div>
                        <div id="flush-collapseSeven" class="rowItem rowBottom row accordion-collapse collapse"
                            aria-labelledby="flush-headingSeven" data-bs-parent="#accordionFlushExample">
                            <div>
                                <button id="update" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingEight">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseEight" aria-expanded="false"
                                aria-controls="flush-collapseEight">
                                Inspection Information
                            </button>
                        </h2>
                        <div id="flush-collapseEight" class="rowItem row accordion-collapse collapse toplabel"
                            aria-labelledby="flush-headingEight" data-bs-parent="#accordionFlushExample">
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input readonly type="date"
                                        value="{{ $criticalPath->sewing_inline_inspection_date_plan }}"
                                        name="sew_ins_date_plan" placeholder="Sewing Inspection date (Plan)"
                                        class="form-control" />
                                    <label for="sewingInspectionDatePlan">Sewing Inspection date (Plan)</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input style="color: <?php echo !empty($criticalPath->sewing_inline_inspection_date_actual) && $criticalPath->sewing_inline_inspection_date_actual !== 'NA' ? setBackgroundColorBasedOnDateDifference($criticalPath->sewing_inline_inspection_date_plan, $criticalPath->sewing_inline_inspection_date_actual) : ($criticalPath->sewing_inline_inspection_date_actual == 'NA' ? 'RED' : ''); ?>;background-color:<?php echo empty($criticalPath->sewing_inline_inspection_date_actual) ? 'red' : ''; ?>"
                                        type="date" id="sewing_inline_inspection_date_actual"
                                        class="sewing_inline_inspection_date_actual form-control"
                                        name="sewing_inline_inspection_date_actual"
                                        value="{{ $criticalPath->sewing_inline_inspection_date_actual }}" />

                                    <label for="sewingInlineInspectionDateActual">Sewing Inline Inspection date
                                        (Actual)</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" value="" name="inline_inspect_sche"
                                        placeholder="Create Inline Inspection Schedule" class="form-control" />
                                    <label for="createInlineInspectionSchedule">Create Inline Inspection Schedule</label>
                                </div>
                            </div>
                        </div>
                        <div id="flush-collapseEight" class="rowItem row accordion-collapse collapse"
                            aria-labelledby="flush-headingEight" data-bs-parent="#accordionFlushExample">
                            <div class="col-md-4">
                                @php
                                    $report_file_name = substr($criticalPath->sewing_inline_inspection_report_upload, 14);
                                @endphp
                                <span>{{ $report_file_name }}</span>
                                <input type="file" name="sew_file" />
                                <label for="">Sewing Inline Inspection Report </label>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input readonly type="date"
                                        value="{{ $criticalPath->finishing_inline_inspection_date_plan }}"
                                        name="finishing_inline_inspection_date_plan"
                                        placeholder="Finishing Inline Inspection date (Plan)" class="form-control" />
                                    <label for="finishingInlineInspectionDatePlan">Finishing Inline Inspection date
                                        (Plan)</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input style="color: <?php echo !empty($criticalPath->finishing_inline_inspection_date_actual) && $criticalPath->finishing_inline_inspection_date_actual !== 'NA' ? setBackgroundColorBasedOnDateDifference($criticalPath->finishing_inline_inspection_date_plan, $criticalPath->finishing_inline_inspection_date_actual) : ($criticalPath->finishing_inline_inspection_date_actual == 'NA' ? 'RED' : ''); ?>;background-color:<?php echo empty($criticalPath->finishing_inline_inspection_date_actual) ? 'red' : ''; ?>"
                                        type="date" id="finishing_inline_inspection_date_actual"
                                        class="finishing_inline_inspection_date_actual form-control"
                                        name="finishing_inline_inspection_date_actual"
                                        value="{{ $criticalPath->finishing_inline_inspection_date_actual }}" />

                                    <label for="finishingInlineInspectionDateActual">Finishing Inline Inspection date
                                        (Actual)</label>
                                </div>
                            </div>
                        </div>
                        <div id="flush-collapseEight" class="rowItem row accordion-collapse collapse"
                            aria-labelledby="flush-headingEight" data-bs-parent="#accordionFlushExample">
                            <div class="col-md-3">

                                @php
                                    $finish_inline_file_edited_file_name = substr($criticalPath->finishing_inline_inspection_report, 14);
                                @endphp
                                <span>{{ $finish_inline_file_edited_file_name }}</span>

                                <input type="file" name="finish_inline_file" />
                                <label for="">Finishing Inline Inspection Report </label>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input readonly type="date" value="{{ $criticalPath->pre_final_date_plan }}"
                                        name="pre_final_date_plan" placeholder="Pre Final Date (Plan)"
                                        class="form-control" />
                                    <label for="preFinalDatePlan">Pre Final Date (Plan)</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input style="color: <?php echo !empty($criticalPath->pre_final_date_actual) && $criticalPath->pre_final_date_actual !== 'NA' ? setBackgroundColorBasedOnDateDifference($criticalPath->pre_final_date_plan, $criticalPath->pre_final_date_actual) : ($criticalPath->pre_final_date_actual == 'NA' ? 'RED' : ''); ?>;background-color:<?php echo empty($criticalPath->pre_final_date_actual) ? 'red' : ''; ?>"
                                        type="date" id="pre_final_date_actual"
                                        class="pre_final_date_actual form-control" name="pre_final_date_actual"
                                        value="{{ $criticalPath->pre_final_date_actual }}" />

                                    <label for="preFinalDateActual">Pre Final Date (Actual)</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="date" value="{{ $criticalPath->create_aql_schedule }}"
                                        name="create_aql_schedule" placeholder="Create AQL Schedule"
                                        class="form-control" />
                                    <label for="createAQLSchedule">Create AQL Schedule(Actual)</label>
                                </div>
                            </div>
                        </div>
                        <div id="flush-collapseEight" class="rowItem rowBottom row accordion-collapse collapse"
                            aria-labelledby="flush-headingEight" data-bs-parent="#accordionFlushExample">
                            <div class="col-md-3">

                                @php
                                    $pre_final_aql_report_edited_file_name = substr($criticalPath->pre_final_aql_report_schedule, 14);
                                @endphp
                                <span>{{ $pre_final_aql_report_edited_file_name }}</span>
                                <input type="file" name="pre_final_aql_report" />
                                <label for="">Pre Final Date AQL Report </label>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input readonly type="date" value="{{ $criticalPath->final_aql_date_plan }}"
                                        name="final_aql_date_plan" placeholder="Final AQL date (Plan)"
                                        class="form-control" />
                                    <label for="finalAQLDatePlan">Final AQL date (Plan)</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input style="color: <?php echo !empty($criticalPath->final_aql_date_actual) && $criticalPath->final_aql_date_actual !== 'NA' ? setBackgroundColorBasedOnDateDifference($criticalPath->final_aql_date_plan, $criticalPath->final_aql_date_actual) : ($criticalPath->final_aql_date_actual == 'NA' ? 'RED' : ''); ?>;background-color:<?php echo empty($criticalPath->final_aql_date_actual) ? 'red' : ''; ?>"
                                        type="date" id="final_aql_date_actual"
                                        class="final_aql_date_actual form-control" name="final_aql_date_actual"
                                        value="{{ $criticalPath->final_aql_date_actual }}" />

                                    <label for="finalAQLDateActual">Final AQL date (Actual)</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input readonly type="text" value="" name="create_aql_sch"
                                        placeholder="Create AQL Schedule" class="form-control" />
                                    <label for="createAQLSchedule">Create AQL Schedule</label>
                                </div>
                            </div>
                            <div class="col-md-3">

                                @php
                                    $final_aql_file_name = substr($criticalPath->final_aql_report_upload, 14);
                                @endphp
                                <span>{{ $final_aql_file_name }}</span>

                                <input type="file" name="final_aql_file" />
                                <label for="">Final AQL Report Upload </label>
                            </div>

                        </div>
                        <div id="flush-collapseEight" class="rowItem rowBottom row accordion-collapse collapse"
                            aria-labelledby="flush-headingEight" data-bs-parent="#accordionFlushExample">
                            <div>
                                <button id="update" class="btn btn-success">Update</button>
                            </div>
                        </div>




                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingNine">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseNine" aria-expanded="false"
                                aria-controls="flush-collapseNine">
                                Production Sample & Shipping Approval Information
                            </button>
                        </h2>
                        <div id="flush-collapseNine" class="rowItem row accordion-collapse collapse toplabel"
                            aria-labelledby="flush-headingNine" data-bs-parent="#accordionFlushExample">
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input readonly type="date"
                                        value="{{ $criticalPath->production_sample_approval_plan }}"
                                        name="production_sample_approval_plan"
                                        placeholder="Production Sample Approval (Plan)" class="form-control" />
                                    <label for="productionSampleApprovalPlan">Production Sample Approval (Plan)</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input style="color: <?php echo !empty($criticalPath->production_sample_approval_actual) && $criticalPath->production_sample_approval_actual !== 'NA' ? setBackgroundColorBasedOnDateDifference($criticalPath->production_sample_approval_plan, $criticalPath->production_sample_approval_actual) : ($criticalPath->production_sample_approval_actual == 'NA' ? 'RED' : ''); ?>;background-color:<?php echo empty($criticalPath->production_sample_approval_actual) ? 'red' : ''; ?>"
                                        type="date" id="production_sample_approval_actual"
                                        class="production_sample_approval_actual form-control"
                                        name="production_sample_approval_actual"
                                        value="{{ $criticalPath->production_sample_approval_actual }}" />

                                    <label for="productionSampleApprovalActual">Production Sample Approval
                                        (Actual)</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" value="{{ $criticalPath->production_sample_dispatch }}"
                                        name="production_sample_dispatch"
                                        placeholder="Production Sample Dispatch Details" class="form-control" />
                                    <label for="productionSampleDispatchDetails">Production Sample Dispatch
                                        Details</label>
                                </div>
                            </div>
                        </div>
                        <div id="flush-collapseNine" class="rowItem row accordion-collapse collapse"
                            aria-labelledby="flush-headingNine" data-bs-parent="#accordionFlushExample">
                            <div class="col-md-3">

                                @php
                                    $pp_sam_img_edited_file_name = substr($criticalPath->production_sample_upload, 14);
                                @endphp
                                <span>{{ $pp_sam_img_edited_file_name }}</span>
                                <input type="file" name="pp_sam_img" />
                                <label for="">Production Sample Image </label>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input readonly type="date"
                                        value="{{ $criticalPath->shipment_booking_with_acs_plan }}"
                                        name="shipment_booking_with_acs_plan"
                                        placeholder="Shipment Booking with ACS (Plan)" class="form-control" />
                                    <label for="shipmentBookingACSPlan">Shipment Booking with ACS (Plan)</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input style="color: <?php echo !empty($criticalPath->shipment_booking_with_acs_actual) && $criticalPath->shipment_booking_with_acs_actual !== 'NA' ? setBackgroundColorBasedOnDateDifference($criticalPath->shipment_booking_with_acs_plan, $criticalPath->shipment_booking_with_acs_actual) : ($criticalPath->shipment_booking_with_acs_actual == 'NA' ? 'RED' : ''); ?>;background-color:<?php echo empty($criticalPath->shipment_booking_with_acs_actual) ? 'red' : ''; ?>"
                                        type="date" id="shipment_booking_with_acs_actual"
                                        class="shipment_booking_with_acs_actual form-control"
                                        name="shipment_booking_with_acs_actual"
                                        value="{{ $criticalPath->shipment_booking_with_acs_actual }}" />

                                    <label for="shipmentBookingACSActual">Shipment Booking with ACS (Actual)</label>
                                </div>
                            </div>

                        </div>
                        <div id="flush-collapseNine" class="rowItem rowBottom row accordion-collapse collapse"
                            aria-labelledby="flush-headingNine" data-bs-parent="#accordionFlushExample">
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input readonly type="date" value="{{ $criticalPath->sa_approval_plan }}"
                                        name="sa_approval_plan" placeholder="SA approval (Plan)"
                                        class="form-control" />
                                    <label for="saApprovalPlan">SA approval (Plan)</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input style="color: <?php echo !empty($criticalPath->sa_approval_actual) && $criticalPath->sa_approval_actual !== 'NA' ? setBackgroundColorBasedOnDateDifference($criticalPath->sa_approval_plan, $criticalPath->sa_approval_actual) : ($criticalPath->sa_approval_actual == 'NA' ? 'RED' : ''); ?>;background-color:<?php echo empty($criticalPath->sa_approval_actual) ? 'red' : ''; ?>"
                                        type="date" id="sa_approval_actual" class="sa_approval_actual form-control"
                                        name="sa_approval_actual" value="{{ $criticalPath->sa_approval_actual }}" />

                                    <label for="saApprovalActual">SA approval (Actual)</label>
                                </div>
                            </div>

                        </div>
                        <div id="flush-collapseNine" class="rowItem rowBottom row accordion-collapse collapse"
                            aria-labelledby="flush-headingNine" data-bs-parent="#accordionFlushExample">
                            <div>
                                <button id="update" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTen">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseTen" aria-expanded="false"
                                aria-controls="flush-collapseTen">
                                Ex-Factory, ETA & Vessel Information
                            </button>
                        </h2>
                        <div id="flush-collapseTen" class="rowItem row accordion-collapse collapse toplabel"
                            aria-labelledby="flush-headingTen" data-bs-parent="#accordionFlushExample">
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="date" value="{{ $criticalPath->ex_factory_date }}"
                                        name="ex_factory_date" placeholder="Ex-factory Date PO"
                                        class="form-control" />
                                    <label for="exFactoryDatePO">Ex-factory Date PO</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="date" value="{{ $criticalPath->revised_ex_factory_date }}"
                                        name="re_ex_fac_date_po" placeholder="Revised Ex-factory Date"
                                        class="form-control" />
                                    <label for="revisedExFactoryDate">Revised Ex-factory Date</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="date" value="{{ $criticalPath->actual_ex_factory_date }}"
                                        name="actual_ex_factory_date" placeholder="Actual Ex-factory Date"
                                        id="actual_ex_factory_date" class="actual_ex_factory_date form-control" />
                                    <label for="actualExFactoryDate">Actual Ex-factory Date</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input readonly type="text" value="{{ $criticalPath->TotalItemsOrdered }}"
                                        name="shipped_units" placeholder="Shipped Units"
                                        class="shipped_units form-control" />
                                    <label for="shippedUnits">Shipped Units</label>
                                </div>
                            </div>

                        </div>
                        <div id="flush-collapseTen" class="rowItem rowBottom row accordion-collapse collapse"
                            aria-labelledby="flush-headingTen" data-bs-parent="#accordionFlushExample">
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="date" value="{{ $criticalPath->orginal_eta_sa_date }}"
                                        name="orginal_eta_sa_date" placeholder="Original ETA SA date"
                                        id="orginal_eta_sa_date" class="orginal_eta_sa_date form-control" />
                                    <label for="originalETASADate">Original ETA SA date</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="date" value="{{ $criticalPath->revised_eta_sa_date }}"
                                        name="revised_eta_sa_date" placeholder="Revised ETA SA date"
                                        class="revised_eta_sa_date form-control" />
                                    <label for="revisedETASADate">Revised ETA SA date</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input readonly type="text" value="{{ $po_find->ship_mode }}"
                                        name="{{ $po_find->ship_mode }}" placeholder="Ship mode"
                                        class="form-control" />
                                    <label for="shipMode">Ship mode</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="text" value="{{ $criticalPath->forward_ref }}"
                                        name="forward_ref" placeholder="Forwarder ref/ Vessel name or AWB"
                                        class="form-control" />
                                    <label for="forwarderRef">Forwarder ref/ Vessel name</label>
                                </div>
                            </div>

                        </div>
                        <div id="flush-collapseTen" class="rowItem rowBottom row accordion-collapse collapse"
                            aria-labelledby="flush-headingTen" data-bs-parent="#accordionFlushExample">
                            <div>
                                <button id="update" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading11">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse11" aria-expanded="false"
                                aria-controls="flush-collapse11">
                                Payment Information
                            </button>
                        </h2>
                        <div id="flush-collapse11" class="rowItem rowBottom row accordion-collapse collapse toplabel"
                            aria-labelledby="flush-heading11" data-bs-parent="#accordionFlushExample">
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="text" value="{{ $criticalPath->late_delivery_discounts_crp }}"
                                        name="late_delivery_discounts_crp" placeholder="Late Delivery Discounts - CRP"
                                        class="late_delivery_discounts_crp form-control" />
                                    <label for="lateDeliveryDiscounts">Late Delivery Discounts - CRP</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="text" value="{{ $criticalPath->invoice_num }}"
                                        name="invoice_num" placeholder="Invoice Number" class="form-control" />
                                    <label for="invoiceNumber">Invoice Number</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="date" value="{{ $criticalPath->invoice_create_date }}"
                                        name="invoice_create_date" placeholder="Invoice Date"
                                        class=" invoice_create_date form-control" />
                                    <label for="invoiceDate">Invoice Date</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="date" value="{{ $criticalPath->payment_receive_date }}"
                                        name="payment_receive_date" placeholder="Payment Receive Date"
                                        class="payment_receive_date form-control" />
                                    <label for="paymentReceiveDate">Payment Receive Date</label>
                                </div>
                            </div>
                        </div>
                        <div id="flush-collapse11" class="rowItem rowBottom row accordion-collapse collapse toplabel"
                            aria-labelledby="flush-heading11" data-bs-parent="#accordionFlushExample">
                            <div>
                                <button id="update" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading12">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse12" aria-expanded="false"
                                aria-controls="flush-collapse12">
                                Comments, Critical Analyse Information
                            </button>
                        </h2>
                        <div id="flush-collapse12" class=" rowItem row accordion-collapse collapse toplabel"
                            aria-labelledby="flush-heading12" data-bs-parent="#accordionFlushExample">
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text"
                                        value="{{ $criticalPath->reason_for_change_affect_shipment }}"
                                        name="reason_for_change_affect_shipment"
                                        placeholder="Reason for major change likely to affect shipment"
                                        class="reason_for_change_affect_shipment form-control" />
                                    <label for="majorChangeReason">Reason for major change </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="date" value="{{ $criticalPath->aeon_comments_date }}"
                                        name="aeon_comments_date" placeholder="AEON Comments - Date 12 Dec 22"
                                        class="aeon_comments_date form-control" />
                                    <label for="aeonComments">AEON Comments - Date 12 Dec 22</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="date" value="{{ $criticalPath->vendor_comments_date }}"
                                        name="vendor_comments_date" placeholder="Vendor Comments - Date 14 Dec 22"
                                        class="vendor_comments_date form-control" />
                                    <label for="vendorComments">Vendor Comments - Date 14 Dec 22</label>
                                </div>
                            </div>

                        </div>
                        <div id="flush-collapse12" class="rowItem rowBottom row accordion-collapse collapse"
                            aria-labelledby="flush-heading12" data-bs-parent="#accordionFlushExample">
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="text" value="{{ $criticalPath->sa_eta_5_days }}"
                                        name="sa_eta_5_days" placeholder="SA ETA +5 Days?"
                                        class="sa_eta_5_days form-control" />
                                    <label for="saEtaPlusFiveDays">SA ETA +5 Days?</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="text" value="{{ $criticalPath->note }}" name="note"
                                        placeholder="NOTE" class="form-control" />
                                    <label for="saEtaPlusFiveDays">NOTE</label>
                                </div>
                            </div>
                        </div>
                        <div id="flush-collapse12" class="rowItem rowBottom row accordion-collapse collapse"
                            aria-labelledby="flush-heading12" data-bs-parent="#accordionFlushExample">
                            <div>
                                <button id="update" class="btn btn-success btn-sm">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // const accordionButtons = document.querySelectorAll(".accordion-button");
        // const toggleAllButton = document.getElementById("toggleAllButton");

        // accordionButtons.forEach(button => {
        //     button.addEventListener("click", function() {
        //         const content = this.nextElementSibling;
        //         if (content.style.display === "block") {
        //             content.style.display = "none";
        //         } else {
        //             content.style.display = "block";
        //         }
        //     });
        // });

        // // Function to toggle all accordion sections
        // function toggleAllAccordions() {
        //     accordionButtons.forEach(button => {
        //         const content = button.nextElementSibling;
        //         if (content.style.display === "block") {
        //             content.style.display = "none";
        //         } else {
        //             content.style.display = "block";
        //         }
        //     });
        // }

        // // Add an event listener to the "Toggle All" button
        // toggleAllButton.addEventListener("click", function() {
        //     toggleAllAccordions();
        // });

        function subtractDaysFromDate(inputDate, daysToSubtract) {
            // Parse the inputDate to create a new Date object
            var actualDate = new Date(inputDate);

            // Subtract the specified number of days
            actualDate.setDate(actualDate.getDate() - daysToSubtract);

            // Convert the result to the "yyyy-mm-dd" format
            var newDateString = actualDate.toISOString().split('T')[0];

            return newDateString;
        }

        function dateFormat(inputDate) {
            var actualDate = new Date(inputDate);
            var newDateString = actualDate.toISOString().split('T')[0];

            return newDateString;
        }
        /*
         */
        // const datePairs = [
        //     ['official_po_sent_actual_date', 'official_po_sent_plan_date'],
        //     ['colour_std_print_artwork_sent_to_supplier_actual_date', 'colour_std_print_artwork_sent_to_supplier_plan_date'],
        //     ['lab_dip_approval_actual_date', 'lab_dip_approval_plan_date'],
        //     ['embellishment_s_o_approval_actual_date', 'embellishment_s_o_approval_plan_date'],
        //     ['fabric_ordered_actual_date', 'fabric_ordered_plan_date'],
        //     ['bulk_fabric_knit_down_approval_actual_date', 'bulk_fabric_knit_down_approval_plan_date'],
        //     ['bulk_yarn_fabric_actual_date', 'bulk_yarn_fabric_plan_date'],
        //     ['development_photo_sample_sent_actual_date', 'development_photo_sample_sent_plan_date'],
        //     ['fit_approval_actual', 'fit_approval_plan'],
        //     ['size_set_actual', 'size_set_approval'],
        //     ['pp_actual', 'pp_approval'],
        //     ['care_lavel_date', 'care_label_approval'],
        //     ['material_inhouse_actual', 'material_inhouse_plan'],
        //     ['pp_meeting_actual', 'pp_meeting_plan'],
        //     ['cutting_date_actual', 'cutting_date_plan'],
        //     ['embellishment_actual', 'embellishment_plan'],
        //     ['Sewing_actual', 'Sewing_plan'],
        //     ['washing_complete_actual', 'washing_complete_plan'],
        //     ['finishing_complete_actual', 'finishing_complete_plan']
        // ];

        // // Loop through datePairs and set plan dates from actual dates
        // for (const [actualDateId, planDateId] of datePairs) {
        //     const actualDate = $('#' + actualDateId).val();

        //     if (actualDate) { // Check if actualDate is not null or undefined
        //         const planDate = subtractDaysFromDate(actualDate, 4);
        //         $('#' + planDateId).val(planDate);
        //     } else {
        //         // Handle the case where actualDate is null or undefined
        //         console.warn("Actual date is missing for element with ID: " + actualDateId);
        //     }
        // }
        // $('#official_po_sent_actual_date').on('change', function() {
        //     $('#official_po_sent_plan_date').val(subtractDaysFromDate($('#official_po_sent_actual_date').val(), 4));
        // });
        // $('#colour_std_print_artwork_sent_to_supplier_actual_date').on('change', function() {
        //     $('#colour_std_print_artwork_sent_to_supplier_plan_date').val(subtractDaysFromDate($('#colour_std_print_artwork_sent_to_supplier_actual_date').val(), 4));
        // });
        // $('#lab_dip_approval_actual_date').on('change', function() {
        //     $('#lab_dip_approval_plan_date').val(subtractDaysFromDate($('#lab_dip_approval_actual_date').val(), 4));
        // });
        // $('#embellishment_s_o_approval_actual_date').on('change', function() {
        //     $('#embellishment_s_o_approval_plan_date').val(subtractDaysFromDate($('#embellishment_s_o_approval_actual_date').val(), 4));
        // });
        // $('#fabric_ordered_actual_date').on('change', function() {
        //     $('#fabric_ordered_plan_date').val(subtractDaysFromDate($('#fabric_ordered_actual_date').val(), 4));
        // });
        // $('#bulk_fabric_knit_down_approval_actual_date').on('change', function() {
        //     $('#bulk_fabric_knit_down_approval_plan_date').val(subtractDaysFromDate($('#bulk_fabric_knit_down_approval_actual_date').val(), 4));
        // });
        // $('#bulk_yarn_fabric_actual_date').on('change', function() {
        //     $('#bulk_yarn_fabric_plan_date').val(subtractDaysFromDate($('#bulk_yarn_fabric_actual_date').val(), 4));
        // });
        // $('#development_photo_sample_sent_actual_date').on('change', function() {
        //     $('#development_photo_sample_sent_plan_date').val(subtractDaysFromDate($('#development_photo_sample_sent_actual_date').val(), 4));
        // });
        // $('#fit_approval_actual').on('change', function() {
        //     $('#fit_approval_plan').val(subtractDaysFromDate($('#fit_approval_actual').val(), 4));
        // });
        // $('#size_set_actual').on('change', function() {
        //     $('#size_set_approval').val(subtractDaysFromDate($('#size_set_actual').val(), 4));
        // });
        // $('#pp_actual').on('change', function() {
        //     $('#pp_approval').val(subtractDaysFromDate($('#pp_actual').val(), 4));
        // });
        // $('#material_inhouse_actual').on('change', function() {
        //     $('#material_inhouse_plan').val(subtractDaysFromDate($('#material_inhouse_actual').val(), 4));
        // });
        // $('#pp_meeting_actual').on('change', function() {
        //     $('#pp_meeting_plan').val(subtractDaysFromDate($('#pp_meeting_actual').val(), 4));
        // });
        // //
        // $('#cutting_date_actual').on('change', function() {
        //     $('#cutting_date_plan').val(subtractDaysFromDate($('#cutting_date_actual').val(), 4));
        // });
        // $('#embellishment_actual').on('change', function() {
        //     $('#embellishment_plan').val(subtractDaysFromDate($('#embellishment_actual').val(), 4));
        // });
        // $('#Sewing_actual').on('change', function() {
        //     $('#Sewing_plan').val(subtractDaysFromDate($('#Sewing_actual').val(), 4));
        // });
        // $('#washing_complete_actual').on('change', function() {
        //     $('#washing_complete_plan').val(subtractDaysFromDate($('#washing_complete_actual').val(), 4));
        // });
        // $('#finishing_complete_actual').on('change', function() {
        //     $('#finishing_complete_plan').val(subtractDaysFromDate($('#finishing_complete_actual').val(), 4));
        // });

        // Initially set the "Another Date" value when the page loads
        // updateAnotherDate();
        $(".colour_std_print_artwork_sent_to_supplier_actual_date").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'colour_std_print_artwork_sent_to_supplier_actual_date'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".lab_dip_approval_actual_date").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint

                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'lab_dip_approval_actual_date'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".lab_dip_dispatch_details").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint

                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,

                        type: 'lab_dip_approval_actual_date'

                        type: 'lab_dip_dispatch_details'

                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });

        $(".embellishment_s_o_approval_actual_date").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'embellishment_s_o_approval_actual_date'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });

        $(".fabric_ordered_actual_date").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'fabric_ordered_actual_date'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".bulk_fabric_knit_down_approval_actual_date").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'bulk_fabric_knit_down_approval_actual_date'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });


        $(".bulk_yarn_fabric_actual_date").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'bulk_yarn_fabric_actual_date'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".development_photo_sample_sent_actual_date").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'development_photo_sample_sent_actual_date'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".fit_approval_actual").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'fit_approval_actual'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".size_set_actual").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'size_set_actual'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".pp_actual").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'pp_actual'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".care_lavel_date").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'care_lavel_date'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".material_inhouse_actual").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'material_inhouse_actual'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".pp_meeting_actual").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'pp_meeting_actual'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".cutting_date_actual").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'cutting_date_actual'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".embellishment_actual").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint


                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'embellishment_actual'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".embellishment_s_o_dispatch_details").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint

                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,

                        type: 'embellishment_actual'

                        type: 'embellishment_s_o_dispatch_details'

                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".Sewing_actual").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'Sewing_actual'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".washing_complete_actual").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'washing_complete_actual'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".finishing_complete_actual").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'finishing_complete_actual'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".sewing_inline_inspection_date_actual").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'sewing_inline_inspection_date_actual'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".finishing_inline_inspection_date_actual").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'finishing_inline_inspection_date_actual'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".pre_final_date_actual").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'pre_final_date_actual'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".final_aql_date_actual").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'final_aql_date_actual'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".production_sample_approval_actual").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'production_sample_approval_actual'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".shipment_booking_with_acs_actual").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'shipment_booking_with_acs_actual'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".sa_approval_actual").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint


                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'sa_approval_actual'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".vendor_comments_date").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'vendor_comments_date'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".aeon_comments_date").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'aeon_comments_date'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".reason_for_change_affect_shipment").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'reason_for_change_affect_shipment'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".payment_receive_date").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'payment_receive_date'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".bulk_fabric_knit_down_dispatch_details").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'bulk_fabric_knit_down_dispatch_details'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".development_photo_sample_dispatch_details").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'development_photo_sample_dispatch_details'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".fit_dispatch").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'fit_dispatch'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".size_set_dispatch").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'size_set_dispatch'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".pp_dispatch").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'pp_dispatch'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".revised_ex_factory_date").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'revised_ex_factory_date'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".actual_ex_factory_date").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'actual_ex_factory_date'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".shipped_units").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'shipped_units'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".create_pp_meeting_schedule").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'create_pp_meeting_schedule'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".create_inline_inspection_schdule").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'create_inline_inspection_schdule'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".pre_final_aql_report_schedule").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'pre_final_aql_report_schedule'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".create_aql_schedule").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'create_aql_schedule'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".pre_final_aql_report_schedule").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'pre_final_aql_report_schedule'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".final_aql_report_upload").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'final_aql_report_upload'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".forward_ref").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'forward_ref'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".late_delivery_discounts_crp").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'late_delivery_discounts_crp'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".invoice_num").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'invoice_num'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".invoice_create_date").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'invoice_create_date'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".sa_eta_5_days").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint
                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,
                        type: 'sa_eta_5_days'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $(".production_sample_dispatch").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(".po_id").val();
                // Get the entered date
                var enteredDate = $(this).val();
                // Perform the AJAX call here
                $.ajax({
                    url: "{{ route('process.date') }}", // Replace with your server-side endpoint

                    method: 'POST', // You can use GET or POST depending on your server-side handling
                    data: {
                        _token: '{{ csrf_token() }}',
                        enteredDate: enteredDate,
                        po_id: po_id,

                        type: 'sa_approval_actual'

                        type: 'production_sample_dispatch'

                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
</script>
