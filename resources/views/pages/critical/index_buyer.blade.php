@extends('layouts.admin')
@section('content')
    <style>
        table {
            table-layout: auto !important;
            width: 100% !important;
        }

        th,
        td {
            /* border: 1px solid #dee2e6 !important; */
            /* Add a 1px black border to table cells (headers and data cells) */
            padding: 10px !important;
            text-align: center !important;
            vertical-align: middle !important;
            white-space: nowrap !important;
        }

        .dataTables_scrollHead th,
        table {
            border-top: 0px !important;

        }

        .dataTables_scrollHead th {
            border-top: 1px solid #dee2e6 !important;
            white-space: nowrap !important;
        }



        .content {
            padding: 0px !important;
        }

        .content-wrapper-container {
            padding: 0 !important;
        }

        .content-wrapper .dataTables_scrollBody thead,
        .dataTables_scrollBody tfoot {
            visibility: collapse;
        }


        /* Optional: Reset padding and margin to ensure proper alignment */
        tfoot th {
            padding: 0px !important;
            margin: 0 !important;
            box-sizing: border-box !important;
        }

        input {
            width: inherit !important;
            border-width: 0px !important;
            margin: 0px !important;
        }

        div.dataTables_wrapper div.dataTables_filter input {
            margin-left: 0.5em !important;
            display: inline-block;
            width: auto !important;
            border: 1px solid #ededed !important;
            outline: aliceblue;
        }

        div.dataTables_wrapper div.dataTables_filter {
            text-align: right;
            margin-right: 10px;
        }

        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_processing,
        .dataTables_wrapper .dataTables_paginate {
            color: inherit;
            margin-left: 10px;
        }

        .dataTables_wrapper {
            position: relative;
            clear: both;
            margin-top: 10px;
        }

        .dt-button-collection .dropdown {
            max-height: 400px;
            overflow: scroll;
        }

        .dataTables_length {
            height: 41px;
            background-color: #14679E;
            padding: 5px;
            color: #fff;
        }

        .dataTables_length label {
            color: #fff
        }

        .dataTables_length label select {
            height: 31px
        }

        .dataTables_length label select option {
            color: #000
        }

        .dataTables_length,
        .dt-button.button {
            background-color: #073D1C !important;
        }

        .dataTables_scrollBody {
            max-height: 400px !important;
        }

        .buttons-copy {
            margin-left: 1px !important;
        }
    </style>
    <!-- <div class="container"> -->
    <?php
    use App\Models\OrderItem;
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

    <?php //dd(setBackgroundColorBasedOnDateDifference(2023-03-13,2023-03-23));
    $aStyleNo = $orderItem = '';
    ?>
    <section class="content">
        <div style="" class="table-container">
            <table id="table_id" class="table-bordered beautify table-hover table-striped">
                <thead>
                    {{-- <tr>
                        <th style=" background-color: rgba(0, 0, 0, 0.05);"></th>
                        <th style=" background-color: rgba(0, 0, 0, 0.05);">Total / Sub- Total</th>
                        <th style=" background-color: rgba(0, 0, 0, 0.05);"></th>
                        <th style=" background-color: rgba(0, 0, 0, 0.05);"></th>
                        <th style=" background-color: rgba(0, 0, 0, 0.05);"></th>
                        <th style=" background-color: rgba(0, 0, 0, 0.05);"></th>
                        <th style=" background-color: rgba(0, 0, 0, 0.05);"></th>
                        <th style=" background-color: rgba(0, 0, 0, 0.05);"></th>
                        <th style=" background-color: rgba(0, 0, 0, 0.05);"></th>
                        <th style=" background-color: rgba(0, 0, 0, 0.05);"></th>
                        <th style=" background-color: rgba(0, 0, 0, 0.05);"></th>
                        <th style=" background-color: rgba(0, 0, 0, 0.05);"></th>
                        <th style=" background-color: rgba(0, 0, 0, 0.05);">1000</th>
                    </tr> --}}
                    <tr>
                        <th style=" background-color: rgba(0, 0, 0, 0.05); font-style:italic;" colspan="21">
                            General Information</th>
                        <th style="font-style:italic; " colspan="4">Purchase Order
                            information</th>
                        <th style=" background-color: rgba(0, 0, 0, 0.05);font-style:italic;" colspan="10">
                            Lab dips and Embellishment Information</th>
                        <th style=" font-style:italic;" colspan="8">Bulk Fabric Information
                        </th>
                        <th style=" background-color: rgba(0, 0, 0, 0.05); font-style:italic;" colspan="16">
                            Sample Approval Information </th>
                        <th style="font-style:italic;" colspan="8">PP Meeting Details</th>
                        <th style=" background-color: rgba(0, 0, 0, 0.05); font-style:italic;" colspan="10">
                            Production Information</th>
                        <th style=" font-style:italic;" colspan="16">Inspection Information
                        </th>
                        <th style=" background-color: rgba(0, 0, 0, 0.05); font-style:italic;" colspan="8">
                            Production Sample & Shipping Approval Information</th>
                        <th style=" font-style:italic;" colspan="8">Ex-Factory, ETA & Vessel
                            Information</th>
                        <th style=" background-color: rgba(0, 0, 0, 0.05); font-style:italic;" colspan="5">
                            Payment Information</th>
                    </tr>
                    <tr>
                        {{-- general information --}}
                        <th>PurchageOrder
                        </th>
                        <th>Brand Name</th>
                        <th>Department Name</th>
                        <th>Season
                        </th>
                        </th>
                        <th>Image</th>
                        <th>Fabric
                        </th>
                        <th>BLOCK
                        </th>
                        </th>
                        <th>Vendor
                        </th>
                        <th>Mfacture</th>
                        <th>PLM</th>
                        <th>Style </th>
                        <th>Order </th>
                        <th>Sup/pro cost</th>
                        <th>Total Value</th>
                        <th>Style Defs</th>
                        <th>Colour</th>
                        <th>Care Date </th>
                        <th>Fab Ref</th>
                        <th>Fab Con</th>
                        <th>Fab Wei</th>
                        <th>Fab Mill</th>












                        {{-- purchase order info --}}

                        <th>Lead Times</th>
                        <th>prio order</th>
                        <th>Off PO sent (Plan)</th>
                        <th>Off PO sent (Actual)</th>










                        <th>Col std sent to sup (plan)</th>
                        <th>Col std sent to sup (actual)</th>
                        <th>Lab dip /App (Plan)</th>
                        <th>Lab dip /App (Actual)</th>
                        <th>Lab dip /Details</th>
                        <th>Lab dip /Image</th>
                        <th>Embe S/O / App (Plan)</th>
                        <th>Embe S/O / App (Actual)</th>
                        <th>Embe S/O / App Dis </th>
                        <th>Embe S/O / App Dis Img</th>





                        <th>Fab / Order (actual)</th>
                        <th>Fab / Order (Plan)</th>
                        <th>Bulk FabKnit(Plan)</th>
                        <th>Bulk FabKnit(actual)</th>
                        <th>Bulk FabKnit Dis</th>
                        <th>Bulk Fab Img</th>
                        <th>Bulk Yarn (Plan)</th>
                        <th>Bulk Yarn (actual)</th>




                        <th>Dev / Pho sent (plan)</th>
                        <th>Dev / Pho sent (actual)</th>
                        <th>Dev / Pho Dis</th>
                        <th>Dev / Pho Img</th>
                        <th>Fit App(Plan)</th>
                        <th>Fit App(actual)</th>
                        <th>Fit AppDis </th>
                        <th>Fit AppImage</th>
                        <th>Size set App(Plan)</th>
                        <th>Size set App(actual)</th>
                        <th>Size set AppDis</th>
                        <th>Size set AppImage</th>
                        <th>PP App(Plan)</th>
                        <th>PP Apl(actual)</th>
                        <th>PP App Dis</th>
                        <th>PP App Image</th>



                        {{-- pp meeting --}}

                        <th>Care App(Plan)</th>
                        <th>Care App(actual)</th>
                        <th>Material(Plan)</th>
                        <th>Material(actual)</th>
                        <th>PP Meet(Plan)</th>
                        <th>PP Meet(actual)</th>
                        <th>Create PP Meet Schedule</th>
                        <th>PP Meet Upload</th>






                        <th>Cutting date (Plan)</th>
                        <th>Cutting date (actual)</th>
                        <th>Embellishment (Plan)</th>
                        <th>Embellishment (actual)</th>
                        <th>Sewing Start date (Plan)</th>
                        <th>Sewing Start date (actual)</th>
                        <th>Washing complete date (Plan)</th>
                        <th>Washing complete date (actual)</th>
                        <th>Finishing complete date (Plan)</th>
                        <th>Finishing complete date (actual)</th>



                        {{-- inspection information --}}

                        <th>Sewing Inline Inspection date (Plan)</th>
                        <th>Sewing Inline Inspection date (actual)</th>
                        <th>Create Inline Inspection Schedule</th>
                        <th>Create Inline Inspection Upload</th>
                        <th>Finish Inl Insp date (Plan)</th>
                        <th>Finish Inl Insp date (act)</th>
                        <th>Create Inl Insp date Sch</th>
                        <th>Finish Inl Insp Report Uplod</th>
                        <th>Pre final (Plan)</th>
                        <th>Pre final (act)</th>
                        <th>New AQL Sch</th>
                        <th>Pre Fin AQL Rep </th>
                        <th>Fin AQL(Plan)</th>
                        <th>Fin AQL(act)</th>
                        <th>New AQL Sch</th>
                        <th>Fin AQL Rep </th>





                        <th>Prod Sple (Plan)</th>
                        <th>Prod Sple (act)</th>
                        <th>Prod Sple Dis</th>
                        <th>Prod Sple Dis</th>
                        <th>Ship Book ACS (Plan)</th>
                        <th>Ship Book ACS (act)</th>
                        <th>SA app(Plan) </th>
                        <th>SA app (actual) </th>




                        <th>Ex-factory Date PO </th>
                        <th>Revi Ex-fac Date </th>
                        <th>Act Ex-fac </th>
                        <th>Ship Units</th>
                        <th>Orig SA date</th>
                        <th>ReviSA date</th>
                        <th>Ship Sea/Air</th>
                        <th>ForVes name</th>




                        <th>Late DelDisCRP</th>
                        <th>Inv No</th>
                        <th>Inv NoCreate </th>
                        <th>Payment</th>
                        <th>Reason For Change</th>
                        <th>Aeon Commnets Date</th>
                        <th>Vendor Comments Date</th>
                        <th>S/A ETA 5</th>
                        <th>Note</th>

                        <!-- Add more headers here -->
                    </tr>
                </thead>
                <tbody id="">
                    {{-- @php
    dd($criticalPath);
@endphp --}}
                    @foreach ($criticalPath as $data)
                        <tr>

                            <th>{{ $data->po_no }}</th>
                            <th>{{ $data->buyerName }}</th>
                            <th>{{ $data->deptName }}</th>
                            <!-- <th>{{ $data->season }}</th> -->
                            <th>

                                <select class="seasonDropdown" id="seasonDropdown">
                                    <option value="1">WW22</option>
                                    <option value="2">OTHER</option>
                                </select>
                            </th>

                            @php
                                $edit_file_name = substr($data->image, 14);
                            @endphp

                            <th><a href="{{ asset($data->image) }}" target="_blank">{{ $edit_file_name }}</a>
                            </th>
                            <th>
                                {{ $data->fabric_type == 1 ? 'Local Fabric' : ($data->fabric_type == 2 ? 'Special Yarn/ AOP Fabric' : 'Imported Fabric') }}
                            </th>
                            <th>
                                <select class="block" id="block">
                                    <option value="1">Initial</option>
                                    <option value="2">Repeat</option>
                                </select>
                            </th>
                            <th>{{ $data->vendorName }}</th>
                            <th>{{ $data->manufatureName }} </th>
                            <?php
                            $orderItem = OrderItem::where('po_id', $data->po_id)
                                ->orderBy('id', 'asc')
                                ->first();
                            $sumValue = OrderItem::where('po_id', $data->po_id)->sum('value');
                            // dd($sumValue);
                            // dd($orderItem->id);
                            if ($orderItem) {
                                // Access the columns of the retrieved record
                                $aStyleNo = $orderItem->style_no;
                                // Output the value in your Blade template
                                // echo "<th>$aStyleNo</th>";
                            } else {
                                // Handle the case when no record is found
                                // echo "<th>No record found</th>";
                            }
                            ?>

                            <th>{{ $data->plm }}</th>
                            <th>{{ isset($aStyleNo) ? $aStyleNo : null }}</th>
                            <th>{{ $data->TotalItemsOrdered }}</th>
                            <th>{{ $data->style_note }}</th>
                            <th>{{ intval($sumValue) }}</th>
                            <th>{{ $data->description }}</th>
                            <th>{{ $orderItem ? $orderItem->colour : null }}</th>
                            <th>{{ change_date_formate($data->careDate )}}</th>

                            <th><input class="fabric_ref" id="fabric_ref" type="text" value="{{ $data->fabric_ref }}"
                                    name="fabric_ref" data-c-id={{ $data->c_id }} /></th>

                            <th>{{ $data->aFabriccontent }} </th>

                            <th><input class="fabric_weight" id="fabric_weight" type="text"
                                    value="{{ $data->fabric_weight }}" name="fabric_weight"
                                    data-c-id={{ $data->c_id }} /></th>

                            <th><input class="fabric_mill" id="fabric_mill" type="text" value="{{ $data->fabric_mill }}"
                                    name="fabric_mill" data-c-id={{ $data->c_id }} /></th>

                            {{-- <th><input type="text" id="payment_receive_date" class="payment_receive_date"
                                        name="payment_receive_date" value="{{ $data->payment_receive_date }}" /></th> --}}










                            <th>{{ $data->lead_times }}</th>
                            <!-- <th>{{ $data->treated_as_priority_order == 1 ? 'Regular Lead Item' : ($data->treated_as_priority_order == 2 ? 'Short Term Item' : '') }} -->
                            <th>{{ $data->treated_as_priority_order }}
                            </th>
                            <th>{{ change_date_formate($data->official_po_sent_plan_date )}}</th>
                            <th>{{ change_date_formate($data->official_po_sent_actual_date )}}</th>




                            {{-- lab --}}


                            <th>{{ change_date_formate($data->colour_std_print_artwork_sent_to_supplier_plan_date )}}</th>
                            <th>{{ change_date_formate($data->colour_std_print_artwork_sent_to_supplier_actual_date )}}</th>
                            <th>{{ change_date_formate($data->lab_dip_approval_plan_date )}}</th>


                            <th style="background-color: <?php echo empty($data->lab_dip_approval_actual_date) ? 'red' : ''; ?>"><input style="color: <?php echo !empty($data->lab_dip_approval_actual_date) && $data->lab_dip_approval_actual_date !== 'NA' ? setBackgroundColorBasedOnDateDifference($data->lab_dip_approval_plan_date, $data->lab_dip_approval_actual_date) : ($data->lab_dip_approval_actual_date == 'NA' ? 'RED' : ''); ?>"
                                    type="date" id="lab_dip_approval_actual_date" class="lab_dip_approval_actual_date"
                                    name="lab_dip_approval_actual_date" data-c-id={{ $data->c_id }}
                                    value="{{ $data->lab_dip_approval_actual_date }}" /></th>


                            <th style="background-color: <?php echo empty($data->lab_dip_dispatch_details) ? 'red' : ''; ?>"><input style="color: <?php echo !empty($data->lab_dip_dispatch_details) && $data->lab_dip_dispatch_details !== 'NA' ? setBackgroundColorBasedOnDateDifference($data->lab_dip_approval_plan_date, $data->lab_dip_approval_actual_date) : ($data->lab_dip_dispatch_details == 'NA' ? 'RED' : ''); ?>"
                                    type="text" id="lab_dip_dispatch_details" class="lab_dip_dispatch_details"
                                    name="lab_dip_dispatch_details" data-c-id={{ $data->c_id }}
                                    value="{{ $data->lab_dip_dispatch_details }}" /></th>

                            </th>

                            @php
                                $edit_lab_dip_file_name = substr($data->lab_dip_image, 14);
                            @endphp

                            <th style="background-color: <?php echo empty($data->lab_dip_image) ? 'red' : 'transparent'; ?>">

                                <a href="{{ asset($data->lab_dip_image) }}"
                                    target="_blank">{{ $edit_lab_dip_file_name }}</a>

                            </th>

                            <th>{{ change_date_formate($data->embellishment_s_o_approval_plan_date )}}</th>

                            <th style="background-color: <?php echo empty($data->embellishment_s_o_approval_actual_date) ? 'red' : ''; ?>"><input style="color: <?php echo !empty($data->embellishment_s_o_approval_actual_date) && $data->embellishment_s_o_approval_actual_date !== 'NA' ? setBackgroundColorBasedOnDateDifference($data->embellishment_s_o_approval_plan_date, $data->embellishment_s_o_approval_actual_date) : ($data->embellishment_s_o_approval_actual_date == 'NA' ? 'RED' : ''); ?>"
                                    type="date" id="embellishment_s_o_approval_actual_date"
                                    class="embellishment_s_o_approval_actual_date"
                                    name="embellishment_s_o_approval_actual_date" data-c-id={{ $data->c_id }}
                                    value="{{ $data->embellishment_s_o_approval_actual_date }}" /></th>

                            <th style="background-color: <?php echo empty($data->embellishment_s_o_dispatch_details) ? 'red' : 'transparent'; ?>">
                                <input type="text" value=" {{ $data->embellishment_s_o_dispatch_details }} "
                                    name="embellishment_s_o_dispatch_details" data-c-id={{ $data->c_id }}
                                    class="embellishment_s_o_dispatch_details" id="embellishment_s_o_dispatch_details" />
                            </th>

                            <th style="background-color: <?php echo empty($data->embellishment_s_o_image) ? 'red' : 'transparent'; ?>">

                                @php
                                    $embellishment_s_o_image_name = substr($data->embellishment_s_o_image, 14);
                                @endphp

                                <a href="{{ asset($data->embellishment_s_o_image) }}"
                                    target="_blank">{{ $embellishment_s_o_image_name }}</a>


                            </th>









                            <th style="background-color: <?php echo empty($data->fabric_ordered_actual_date) ? 'red' : ''; ?>"><input style="color: <?php echo !empty($data->fabric_ordered_actual_date) && $data->fabric_ordered_actual_date !== 'NA' ? setBackgroundColorBasedOnDateDifference($data->fabric_ordered_plan_date, $data->fabric_ordered_actual_date) : ($data->fabric_ordered_actual_date == 'NA' ? 'RED' : ''); ?>"
                                    type="date" id="fabric_ordered_actual_date" class="fabric_ordered_actual_date"
                                    name="fabric_ordered_actual_date" data-c-id={{ $data->c_id }}
                                    value="{{ $data->fabric_ordered_actual_date }}" />
                            </th>
                            <th>{{ change_date_formate($data->fabric_ordered_plan_date )}}</th>
                            <th>{{ change_date_formate($data->bulk_fabric_knit_down_approval_plan_date )}}</th>
                            <th style="background-color: <?php echo empty($data->bulk_fabric_knit_down_approval_actual_date) ? 'red' : ''; ?>">
                                <input style="color: <?php echo !empty($data->bulk_fabric_knit_down_approval_actual_date) && $data->bulk_fabric_knit_down_approval_actual_date !== 'NA' ? setBackgroundColorBasedOnDateDifference($data->bulk_fabric_knit_down_approval_plan_date, $data->bulk_fabric_knit_down_approval_actual_date) : ($data->bulk_fabric_knit_down_approval_actual_date == 'NA' ? 'RED' : ''); ?>" type="date"
                                    id="bulk_fabric_knit_down_approval_actual_date"
                                    class="bulk_fabric_knit_down_approval_actual_date"
                                    name="bulk_fabric_knit_down_approval_actual_date" data-c-id={{ $data->c_id }}
                                    value="{{ $data->bulk_fabric_knit_down_approval_actual_date }}" />
                            </th>

                            <th style="background-color: <?php echo empty($data->bulk_fabric_knit_down_dispatch_details) ? 'red' : 'transparent'; ?>">
                                <input type="text" value=" {{ $data->bulk_fabric_knit_down_dispatch_details }} "
                                    name="bulk_fabric_knit_down_dispatch_details" data-c-id={{ $data->c_id }}
                                    class="bulk_fabric_knit_down_dispatch_details"
                                    id="bulk_fabric_knit_down_dispatch_details" />
                            </th>


                            <th style="background-color: <?php echo empty($data->fabric_ordered_actual_date) ? 'red' : 'transparent'; ?>">

                                @php
                                    $bulk_fabric_knit_down_image_name = substr($data->bulk_fabric_knit_down_image, 14);
                                @endphp

                                <a href="{{ asset($data->bulk_fabric_knit_down_image) }}"
                                    target="_blank">{{ $bulk_fabric_knit_down_image_name }}</a>

                            </th>


                            <th>{{ change_date_formate($data->bulk_yarn_fabric_plan_date )}}</th>
                            <th style="background-color: <?php echo empty($data->bulk_yarn_fabric_actual_date) ? 'red' : ''; ?>"><input style="color: <?php echo !empty($data->bulk_yarn_fabric_actual_date) && $data->bulk_yarn_fabric_actual_date !== 'NA' ? setBackgroundColorBasedOnDateDifference($data->bulk_yarn_fabric_plan_date, $data->bulk_yarn_fabric_actual_date) : ($data->bulk_yarn_fabric_actual_date == 'NA' ? 'RED' : ''); ?>"
                                    type="date" id="bulk_yarn_fabric_actual_date" class="bulk_yarn_fabric_actual_date"
                                    name="bulk_yarn_fabric_actual_date" data-c-id={{ $data->c_id }}
                                    value="{{ $data->bulk_yarn_fabric_actual_date }}" /></th>








                            <th>{{ change_date_formate($data->development_photo_sample_sent_plan_date )}}</th>
                            <th style="background-color: <?php echo empty($data->development_photo_sample_sent_actual_date) ? 'red' : ''; ?>"><input style="color: <?php echo !empty($data->development_photo_sample_sent_actual_date) && $data->development_photo_sample_sent_actual_date !== 'NA' ? setBackgroundColorBasedOnDateDifference($data->development_photo_sample_sent_plan_date, $data->development_photo_sample_sent_actual_date) : ($data->development_photo_sample_sent_actual_date == 'NA' ? 'RED' : ''); ?>"
                                    type="date" id="development_photo_sample_sent_actual_date"
                                    class="development_photo_sample_sent_actual_date"
                                    name="development_photo_sample_sent_actual_date" data-c-id={{ $data->c_id }}
                                    value="{{ $data->development_photo_sample_sent_actual_date }}" /></th>

                            <th style="background-color: <?php echo empty($data->development_photo_sample_dispatch_details) ? 'red' : 'transparent'; ?>">
                                <input type="text" value=" {{ $data->development_photo_sample_dispatch_details }} "
                                    name="development_photo_sample_dispatch_details" data-c-id={{ $data->c_id }}
                                    class="development_photo_sample_dispatch_details" data-c-id={{ $data->c_id }}
                                    id="development_photo_sample_dispatch_details" />
                            </th>

                            @php
                                $edit_dev_photo = substr($data->development_photo_sample_dispatch_sample_image, 14);
                            @endphp

                            <th style="background-color: <?php echo empty($data->development_photo_sample_dispatch_sample_image) ? 'red' : 'transparent'; ?>">
                                <a href="{{ asset($data->development_photo_sample_dispatch_sample_image) }}"
                                    target="_blank">{{ $edit_dev_photo }}</a>

                            </th>
                            <th>{{ change_date_formate($data->fit_approval_plan )}}</th>
                            <th style="background-color: <?php echo empty($data->fit_approval_actual) ? 'red' : ''; ?>"><input style="color: <?php echo !empty($data->fit_approval_actual) && $data->fit_approval_actual !== 'NA' ? setBackgroundColorBasedOnDateDifference($data->fit_approval_plan, $data->fit_approval_actual) : ($data->fit_approval_actual == 'NA' ? 'RED' : ''); ?>"
                                    type="date" id="fit_approval_actual" class="fit_approval_actual"
                                    name="fit_approval_actual" data-c-id={{ $data->c_id }}
                                    value="{{ $data->fit_approval_actual }}" /></th>

                            <th><input type="text" value=" {{ $data->fit_dispatch }} " name="fit_dispatch"
                                    data-c-id={{ $data->c_id }} class="fit_dispatch" id="fit_dispatch" /></th>

                            @php
                                $fit_sample_name = substr($data->fit_sample_image, 14);
                            @endphp
                            <th style="background-color: <?php echo empty($data->fit_sample_image) ? 'red' : 'transparent'; ?>">
                                <a href="{{ asset($data->fit_sample_image) }}"
                                    target="_blank">{{ $fit_sample_name }}</a>

                            </th>


                            <th>{{ change_date_formate($data->size_set_approval )}}</th>
                            <th style="background-color: <?php echo empty($data->size_set_actual) ? 'red' : ''; ?>"><input style="color: <?php echo !empty($data->size_set_actual) && $data->size_set_actual !== 'NA' ? setBackgroundColorBasedOnDateDifference($data->size_set_approval, $data->size_set_actual) : ($data->size_set_actual == 'NA' ? 'RED' : ''); ?>"
                                    type="date" id="size_set_actual" class="size_set_actual" name="size_set_actual"
                                    data-c-id={{ $data->c_id }} value="{{ $data->size_set_actual }}" /></th>

                            <th><input type="text" value=" {{ $data->size_set_dispatch }} " name="size_set_dispatch"
                                    data-c-id={{ $data->c_id }} class="size_set_dispatch" id="size_set_dispatch" />
                            </th>

                            @php
                                $size_set_image_file_name = substr($data->size_set_image, 14);
                            @endphp
                            <th style="background-color: <?php echo empty($data->size_set_image) ? 'red' : 'transparent'; ?>">

                                <a href="{{ asset($data->size_set_image) }}"
                                    target="_blank">{{ $size_set_image_file_name }}</a>

                            </th>


                            <th>{{ change_date_formate($data->pp_approval )}}</th>
                            <th style="background-color: <?php echo empty($data->pp_actual) ? 'red' : ''; ?>"><input style="color: <?php echo !empty($data->pp_actual) && $data->pp_actual !== 'NA' ? setBackgroundColorBasedOnDateDifference($data->pp_approval, $data->pp_actual) : ($data->pp_actual == 'NA' ? 'RED' : ''); ?>"
                                    type="date" id="pp_actual" class="pp_actual" name="pp_actual"
                                    value="{{ $data->pp_actual }}" data-c-id={{ $data->c_id }} /></th>

                            <th style="background-color: <?php echo empty($data->pp_dispatch) ? 'red' : ''; ?>"><input type="text"
                                    value=" {{ $data->pp_dispatch }} " name="pp_dispatch" class="pp_dispatch"
                                    id="pp_dispatch" data-c-id={{ $data->c_id }} /></th>

                            @php
                                $pp_sample_image_file_name = substr($data->pp_sample_image, 14);
                            @endphp
                            <th style="background-color: <?php echo empty($data->pp_sample_image) ? 'red' : 'transparent'; ?>">

                                <a href="{{ asset($data->pp_sample_image) }}"
                                    target="_blank">{{ $pp_sample_image_file_name }}</a>

                            </th>









                            <th>{{ change_date_formate($data->care_label_approval )}}</th>

                            <th style="background-color: <?php echo empty($data->care_label_actual) ? 'red' : ''; ?>">

                                <input style="color: <?php echo !empty($data->care_label_actual) && $data->care_label_actual !== 'NA' ? setBackgroundColorBasedOnDateDifference($data->care_label_approval, $data->care_label_actual) : ($data->care_label_actual == 'NA' ? 'RED' : ''); ?>" type="date" id="care_label_actual"
                                    class="care_label_actual" name="care_label_actual" data-c-id={{ $data->c_id }}
                                    value="{{ $data->care_label_actual }}" />
                            </th>

                            <th>{{ change_date_formate($data->material_inhouse_plan )}}</th>
                            <th style="background-color: <?php echo empty($data->material_inhouse_actual) ? 'red' : ''; ?>"><input style="color: <?php echo !empty($data->material_inhouse_actual) && $data->material_inhouse_actual !== 'NA' ? setBackgroundColorBasedOnDateDifference($data->material_inhouse_plan, $data->material_inhouse_actual) : ($data->material_inhouse_actual == 'NA' ? 'RED' : ''); ?>"
                                    type="date" id="material_inhouse_actual" class="material_inhouse_actual"
                                    name="material_inhouse_actual" data-c-id={{ $data->c_id }}
                                    value="{{ $data->material_inhouse_actual }}" /></th>

                            <th>{{ change_date_formate($data->pp_meeting_plan )}}</th>
                            <th style="background-color: <?php echo empty($data->pp_meeting_actual) ? 'red' : ''; ?>"><input style="color: <?php echo !empty($data->pp_meeting_actual) && $data->pp_meeting_actual !== 'NA' ? setBackgroundColorBasedOnDateDifference($data->pp_meeting_plan, $data->pp_meeting_actual) : ($data->pp_meeting_actual == 'NA' ? 'RED' : ''); ?>"
                                    type="date" id="pp_meeting_actual" class="pp_meeting_actual"
                                    name="pp_meeting_actual" data-c-id={{ $data->c_id }}
                                    value="{{ $data->pp_meeting_actual }}" /></th>

                            <th style="background-color: <?php echo empty($data->create_pp_meeting_schedule) ? 'red' : 'transparent'; ?>">{{ $data->create_pp_meeting_schedule }}
                            </th>


                            @php
                                $pp_meet_img_file_name = substr($data->pp_meeting_report_upload, 14);
                            @endphp
                            <th style="background-color: <?php echo empty($data->pp_meeting_report_upload) ? 'red' : 'transparent'; ?>">

                                <a href="{{ asset($data->pp_meeting_report_upload) }}"
                                    target="_blank">{{ $pp_meet_img_file_name }}</a>

                            </th>








                            <th>{{ change_date_formate($data->cutting_date_plan )}}</th>
                            <th style="background-color: <?php echo empty($data->cutting_date_actual) ? 'red' : ''; ?>"><input style="color: <?php echo !empty($data->cutting_date_actual) && $data->cutting_date_actual !== 'NA' ? setBackgroundColorBasedOnDateDifference($data->cutting_date_plan, $data->cutting_date_actual) : ($data->cutting_date_actual == 'NA' ? 'RED' : ''); ?>"
                                    type="date" id="cutting_date_actual" class="cutting_date_actual"
                                    name="cutting_date_actual" value="{{ $data->cutting_date_actual }}"
                                    data-c-id={{ $data->c_id }} /></th>

                            <th>{{ change_date_formate($data->embellishment_plan )}}</th>
                            <th style="background-color: <?php echo empty($data->embellishment_actual) ? 'red' : ''; ?>"><input style="color: <?php echo !empty($data->embellishment_actual) && $data->embellishment_actual !== 'NA' ? setBackgroundColorBasedOnDateDifference($data->embellishment_plan, $data->embellishment_actual) : ($data->embellishment_actual == 'NA' ? 'RED' : ''); ?>"
                                    type="date" id="embellishment_actual" class="embellishment_actual"
                                    name="embellishment_actual" data-c-id={{ $data->c_id }}
                                    value="{{ $data->embellishment_actual }}" /></th>

                            <th>{{ change_date_formate($data->Sewing_plan )}}</th>
                            <th style="background-color: <?php echo empty($data->Sewing_actual) ? 'red' : ''; ?>"><input style="color: <?php echo !empty($data->Sewing_actual) && $data->Sewing_actual !== 'NA' ? setBackgroundColorBasedOnDateDifference($data->Sewing_plan, $data->Sewing_actual) : ($data->Sewing_actual == 'NA' ? 'RED' : ''); ?>"
                                    type="date" id="Sewing_actual" class="Sewing_actual" name="Sewing_actual"
                                    data-c-id={{ $data->c_id }} value="{{ $data->Sewing_actual }}" />
                            </th>

                            <th>{{ change_date_formate($data->washing_complete_plan )}}</th>
                            <th style="background-color: <?php echo empty($data->washing_complete_actual) ? 'red' : ''; ?>"><input style="color: <?php echo !empty($data->washing_complete_actual) && $data->washing_complete_actual !== 'NA' ? setBackgroundColorBasedOnDateDifference($data->washing_complete_plan, $data->washing_complete_actual) : ($data->washing_complete_actual == 'NA' ? 'RED' : ''); ?>"
                                    type="date" id="washing_complete_actual" class="washing_complete_actual"
                                    name="washing_complete_actual" data-c-id={{ $data->c_id }}
                                    value="{{ $data->washing_complete_actual }}" /></th>

                            <th>{{ change_date_formate($data->finishing_complete_plan )}}</th>
                            <th style="background-color: <?php echo empty($data->finishing_complete_actual) ? 'red' : ''; ?>"><input style="color: <?php echo !empty($data->finishing_complete_actual) && $data->finishing_complete_actual !== 'NA' ? setBackgroundColorBasedOnDateDifference($data->finishing_complete_plan, $data->finishing_complete_actual) : ($data->finishing_complete_actual == 'NA' ? 'RED' : ''); ?>"
                                    type="date" id="finishing_complete_actual" class="finishing_complete_actual"
                                    name="finishing_complete_actual" data-c-id={{ $data->c_id }}
                                    value="{{ $data->finishing_complete_actual }}" />
                            </th>






                            {{-- inspection section --}}



                            <th>{{ change_date_formate($data->sewing_inline_inspection_date_plan )}}</th>
                            <th style="background-color: <?php echo empty($data->sewing_inline_inspection_date_actual) ? 'red' : ''; ?>"><input style="color: <?php echo !empty($data->sewing_inline_inspection_date_actual) && $data->sewing_inline_inspection_date_actual !== 'NA' ? setBackgroundColorBasedOnDateDifference($data->sewing_inline_inspection_date_plan, $data->sewing_inline_inspection_date_actual) : ($data->sewing_inline_inspection_date_actual == 'NA' ? 'RED' : ''); ?>"
                                    type="date" id="sewing_inline_inspection_date_actual"
                                    class="sewing_inline_inspection_date_actual"
                                    name="sewing_inline_inspection_date_actual" data-c-id={{ $data->c_id }}
                                    value="{{ $data->sewing_inline_inspection_date_actual }}" /></th>
                            <th></th>
                            <th>
                                @php
                                    $sew_file_edit_file_name = substr($data->sewing_inline_inspection_report_upload, 14);
                                @endphp

                                <a href="{{ asset($data->sewing_inline_inspection_report_upload) }}"
                                    target="_blank">{{ $sew_file_edit_file_name }}</a>
                            </th>

                            <th>{{ change_date_formate($data->finishing_inline_inspection_date_plan )}}</th>
                            <th style="background-color: <?php echo empty($data->finishing_inline_inspection_date_actual) ? 'red' : ''; ?>"><input style="color: <?php echo !empty($data->finishing_inline_inspection_date_actual) && $data->finishing_inline_inspection_date_actual !== 'NA' ? setBackgroundColorBasedOnDateDifference($data->finishing_inline_inspection_date_plan, $data->finishing_inline_inspection_date_actual) : ($data->finishing_inline_inspection_date_actual == 'NA' ? 'RED' : ''); ?>"
                                    type="date" id="finishing_inline_inspection_date_actual"
                                    class="finishing_inline_inspection_date_actual"
                                    name="finishing_inline_inspection_date_actual" data-c-id={{ $data->c_id }}
                                    value="{{ $data->finishing_inline_inspection_date_actual }}" /></th>

                            <th></th>
                            @php
                                $finish_inline_file_edit_file_name = substr($data->finishing_inline_inspection_report, 14);
                            @endphp

                            <th>
                                <a href="{{ asset($data->finishing_inline_inspection_report) }}"
                                    target="_blank">{{ $finish_inline_file_edit_file_name }}</a>
                            </th>


                            <th>{{ change_date_formate($data->pre_final_date_plan )}}</th>
                            <th style="background-color: <?php echo empty($data->pre_final_date_actual) ? 'red' : ''; ?>"><input style="color: <?php echo !empty($data->pre_final_date_actual) && $data->pre_final_date_actual !== 'NA' ? setBackgroundColorBasedOnDateDifference($data->pre_final_date_plan, $data->pre_final_date_actual) : ($data->pre_final_date_actual == 'NA' ? 'RED' : ''); ?>"
                                    type="date" id="pre_final_date_actual" class="pre_final_date_actual"
                                    data-c-id={{ $data->c_id }} name="pre_final_date_actual"
                                    value="{{ $data->pre_final_date_actual }}" /></th>

                            <th></th>
                            @php
                                $pre_final_aql_report_edit_file_name = substr($data->pre_final_aql_report_schedule, 14);
                            @endphp

                            <th>
                                <a href="{{ asset($data->pre_final_aql_report_schedule) }}"
                                    target="_blank">{{ $pre_final_aql_report_edit_file_name }}</a>
                            </th>
                            <th>{{ change_date_formate($data->final_aql_date_plan )}}</th>
                            <th style="background-color: <?php echo empty($data->final_aql_date_actual) ? 'red' : ''; ?>"><input style="color: <?php echo !empty($data->final_aql_date_actual) && $data->final_aql_date_actual !== 'NA' ? setBackgroundColorBasedOnDateDifference($data->final_aql_date_plan, $data->final_aql_date_actual) : ($data->final_aql_date_actual == 'NA' ? 'RED' : ''); ?>"
                                    type="date" id="final_aql_date_actual" class="final_aql_date_actual"
                                    name="final_aql_date_actual" data-c-id={{ $data->c_id }}
                                    value="{{ $data->final_aql_date_actual }}" /></th>
                            <th></th>
                            @php
                                $final_aql_file_edit_file_name = substr($data->final_aql_report_upload, 14);
                            @endphp

                            <th>
                                <a href="{{ asset($data->final_aql_report_upload) }}"
                                    target="_blank">{{ $final_aql_file_edit_file_name }}</a>
                            </th>










                            <th>{{ change_date_formate($data->production_sample_approval_plan )}}</th>
                            <th style="background-color: <?php echo empty($data->production_sample_approval_actual) ? 'red' : ''; ?>"><input style="color: <?php echo !empty($data->production_sample_approval_actual) && $data->production_sample_approval_actual !== 'NA' ? setBackgroundColorBasedOnDateDifference($data->production_sample_approval_plan, $data->production_sample_approval_actual) : ($data->production_sample_approval_actual == 'NA' ? 'RED' : ''); ?>"
                                    type="date" id="production_sample_approval_actual"
                                    class="production_sample_approval_actual" name="production_sample_approval_actual"
                                    data-c-id={{ $data->c_id }}
                                    value="{{ $data->production_sample_approval_actual }}" /></th>
                            <th>{{ change_date_formate($data->sa_approval_plan )}}</th>


                            {{-- <th style="background-color: <?php// echo empty($data->sa_approval_actual) ? 'red' : ''; ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?>"><input style="color: <?php// echo !empty($data->sa_approval_actual) && $data->sa_approval_actual !== 'NA' ? setBackgroundColorBasedOnDateDifference($data->sa_approval_plan, $data->sa_approval_actual) : ($data->sa_approval_actual == 'NA' ? 'RED' : ''); ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?>"
                                    type="text" id="sa_approval_actual" class="sa_approval_actual"
                                    name="sa_approval_actual" value="{{ $data->sa_approval_actual }}" /></th> --}}

                            @php
                                $pp_sam_img_edit_file_name = substr($data->production_sample_upload, 14);
                            @endphp

                            <th>
                                <a href="{{ asset($data->production_sample_upload) }}"
                                    target="_blank">{{ $pp_sam_img_edit_file_name }}</a>
                            </th>



                            <th>{{ change_date_formate($data->shipment_booking_with_acs_plan )}}</th>

                            <th style="background-color: <?php echo empty($data->shipment_booking_with_acs_actual) ? 'red' : ''; ?>"><input style="color: <?php echo !empty($data->shipment_booking_with_acs_actual) && $data->shipment_booking_with_acs_actual !== 'NA' ? setBackgroundColorBasedOnDateDifference($data->shipment_booking_with_acs_plan, $data->shipment_booking_with_acs_actual) : ($data->shipment_booking_with_acs_actual == 'NA' ? 'RED' : ''); ?>"
                                    type="date" id="shipment_booking_with_acs_actual"
                                    class="shipment_booking_with_acs_actual" name="shipment_booking_with_acs_actual"
                                    data-c-id={{ $data->c_id }}
                                    value="{{ $data->shipment_booking_with_acs_actual }}" /></th>
                            <th>{{ change_date_formate($data->sa_approval_plan )}}</th>
                            <th style="background-color: <?php echo empty($data->sa_approval_actual) ? 'red' : ''; ?>"><input style="color: <?php echo !empty($data->sa_approval_actual) && $data->sa_approval_actual !== 'NA' ? setBackgroundColorBasedOnDateDifference($data->sa_approval_plan, $data->sa_approval_actual) : ($data->sa_approval_actual == 'NA' ? 'RED' : ''); ?>"
                                    type="date" id="sa_approval_actual" class="sa_approval_actual"
                                    name="sa_approval_actual" data-c-id={{ $data->c_id }}
                                    value="{{ $data->sa_approval_actual }}" /></th>











                            <th>{{ change_date_formate($data->ex_factory_date_po )}}</th>
                            <th>{{ change_date_formate($data->revised_ex_factory_date )}}</th>
                            <th>{{ change_date_formate($data->actual_ex_factory_date )}}</th>
                            <th>{{ $data->TotalItemsOrdered }}</th>
                            <th>{{ change_date_formate($data->orginal_eta_sa_date )}}</th>
                            <th>{{ change_date_formate($data->revised_eta_sa_date )}}</th>
                            <th>{{ $data->ship_mode }}</th>
                            <th>{{ $data->forward_ref }}</th>








                            {{-- payment info --}}
                            <th></th>
                            <th></th>
                            <th></th>
                            <th><input type="date" id="payment_receive_date" class="payment_receive_date"
                                    name="payment_receive_date" data-c-id={{ $data->c_id }}
                                    value="{{ $data->payment_receive_date }}" /></th>

                            <th><input type="text" id="reason_for_change_affect_shipment"
                                    class="reason_for_change_affect_shipment" name="reason_for_change_affect_shipment"
                                    data-c-id={{ $data->c_id }}
                                    value="{{ $data->reason_for_change_affect_shipment }}" /></th>





                            {{-- last four --}}


                            <th><input type="date" id="aeon_comments_date" class="aeon_comments_date"
                                    name="aeon_comments_date" data-c-id={{ $data->c_id }}
                                    value="{{ $data->aeon_comments_date }}" /></th>
                            <th><input type="date" id="vendor_comments_date" class="vendor_comments_date"
                                    name="vendor_comments_date" data-c-id={{ $data->c_id }}
                                    value="{{ $data->vendor_comments_date }}" /></th>
                            <th>{{ $data->sa_eta_5_days }}</th>
                            <th>{{ $data->note }}</th>
                            <!-- Add more headers here -->
                        </tr>
                    @endforeach
                    <!-- Populate table rows with data -->
                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        {{-- <th></th> --}}
                        <!-- Add more headers here -->
                    </tr>
                </tfoot>
            </table>
        </div>

    </section>
    <!-- </div> -->

    <!-- <div class="container"> -->
    <?php

    ?>
    <!-- </div> -->
@endsection

<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
<!-- <script type="text/javascript" charset="utf8"
    src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script> -->
<script>
    $(document).ready(function() {

        var theadTh = $('table thead th:eq(11)');

        // Select the 0 index th in the tfoot
        var tfootTh = $('table tfoot th:eq(0)');

        // Get the width of the thead th
        var theadThWidth = theadTh.width() + 20;
        var inputElements = document.querySelectorAll('input');

        var selectElements = document.querySelectorAll('select');

        const dateInputs = document.querySelectorAll('input[type="date"]');

        // dateInput.addEventListener('focus', function() {
        //     this.style.color = 'black';
        // });
        dateInputs.forEach(dateInput => {
            if (!dateInput.value) {
                dateInput.style.color = 'transparent';
                dateInput.style.border = 'none';
                dateInput.style.boxShadow = 'none';
                const parentElement = dateInput.parentElement;
                if (parentElement) {
                    dateInput.style.backgroundColor = parentElement.style.backgroundColor;
                }
            }


        });

        // Loop through input elements and set them as disabled
        inputElements.forEach(function(input) {
            input.disabled = true;
            input.style.border = 'none';
            input.style.boxShadow = 'none';
            const parentElement = input.parentElement;
            if (parentElement) {
                input.style.backgroundColor = window.getComputedStyle(parentElement).backgroundColor;
            }
        });



        // Loop through select elements and set them as disabled
        selectElements.forEach(function(select) {
            select.disabled = true;
        });

        // Set the width of the tfoot th to match the thead th
        tfootTh.css('min-width', theadThWidth);
        // tfootTh.css('padding', '10px');
        $('table tfoot th').each(function(index) {
            console.log(index);
            var theadIndex = index + 11;
            var title = $('table thead th').eq(theadIndex).text();
            $(this).html('<input type="text" placeholder="Search ' + title +
                '" class="form-control column-search-input" />');
            // $('.column-search-input').each(function() {
            //     var placeholder = $(this).attr('placeholder');
            //     var placeholderLength = placeholder.length;

            //     // Calculate the minimum width based on placeholder length
            var maxWidth = $('table thead th').eq(theadIndex).width() + 20;

            $(this).css('max-width', maxWidth);
        });

        var footerInputElements = document.querySelectorAll('tfoot input');

        footerInputElements.forEach(function(input) {
            input.disabled = false;
        });





        var table = $("#table_id").DataTable({
            initComplete: function() {
                // Apply the search
                this.api()
                    .columns()
                    .every(function() {
                        var that = this;

                        $('input', this.footer()).on('keyup change clear', function() {
                            if (that.search() !== this.value) {
                                that.search(this.value).draw();
                            }
                        });
                    });
            },
            // scrollY: "400px",
            scrollCollapse: true,
            // scrollX: true,
            scrollX: true,
            searching: true,


            "columnDefs": [
                // {
                //     "orderable": false,
                //     "targets": [0, 110, 111, 112, 113, 114, 115, 116, 117]
                // },
                {
                    "orderable": true,
                    "targets": [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18,
                        19,
                        20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36,
                        37,
                        38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54,
                        55,
                        56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72,
                        73,
                        74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90,
                        91,
                        92, 93, 94, 95, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 106,
                        107,
                        108, 109, 110, 111, 112, 113, 114, 115, 116, 117
                    ]
                } // Specify the column indices (0-based) that should be non-orderable
            ],
            dom: 'lBfrtip',
            buttons: [
                'copy', 'excel', 'pdf', 'colvis'
            ],
        });






        const scrollBody = document.querySelector('.dataTables_scrollBody');

        const tableScrollTop = localStorage.getItem('tableScrollTop');

        const table1 = document.querySelector('#table_id');

        // Add a scroll event listener to the table
        scrollBody.addEventListener('scroll', function() {
            localStorage.setItem('tableScrollLeft', scrollBody.scrollLeft);
        });

        // Retrieve the stored scroll position
        const tableScrollLeft = localStorage.getItem('tableScrollLeft');

        // Check if there's a stored scroll position and apply it after the table is drawn
        if (tableScrollLeft) {
            scrollBody.scrollLeft = tableScrollLeft; // Restore the scroll position
        }

        scrollBody.addEventListener('scroll', function() {
            localStorage.setItem('tableScrollTop', scrollBody.scrollTop);
        });

        // if (tableScrollLeft !== null) {
        //     table1.scrollLeft = tableScrollLeft;
        // }
        if (tableScrollTop !== null) {
            scrollBody.scrollTop = tableScrollTop;
        }






        // $('#care_plan_date').on('change', function() {
        //     const selectedDate = $(this).val();


        // });


        // $('#po').on('keyup', function() {
        //     table.search(this.value).draw();
        // });
        // $('#brand').on('keyup', function() {
        //     table.search(this.value).draw();
        // });
        // $('#department').on('keyup', function() {
        //     table.search(this.value).draw();
        // });

        // $('#care_plan_date').change(function() {
        //     var selectedDate = $(this).val();

        //     $.ajax({
        //         url: "{{ route('process.date') }}",
        //         type: 'POST',
        //         data: {
        //             _token: '{{ csrf_token() }}',
        //             care_plan_date: selectedDate
        //         },
        //         success: function(response) {
        //             console.log(response);
        //             // Handle the response here
        //         },
        //         error: function(error) {
        //             console.log(error);
        //         }
        //     });
        // });



        $(".colour_std_print_artwork_sent_to_supplier_actual_date").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
        // $(".care_lavel_date").on("keyup", function(e) {
        //     // Check if the Enter key (key code 13) is pressed
        //     if (e.keyCode === 13) {

        //         //var enteredDate = $(this).val();

        //         // Get the hidden po_id value
        //         var po_id = $(this).data('c-id');
        //         // Get the entered date
        //         var enteredDate = $(this).val();
        //         // Perform the AJAX call here
        //         $.ajax({
        //             url: "{{ route('process.date') }}", // Replace with your server-side endpoint
        //             method: 'POST', // You can use GET or POST depending on your server-side handling
        //             data: {
        //                 _token: '{{ csrf_token() }}',
        //                 enteredDate: enteredDate,
        //                 po_id: po_id,
        //                 type: 'care_lavel_date'
        //             },
        //             success: function(response) {
        //                 // Handle the response from the server
        //                 console.log(response);
        //                 location.reload();
        //             },
        //             error: function(xhr, status, error) {
        //                 // Handle errors here
        //                 console.error(xhr.responseText);
        //             }
        //         });
        //     }
        // });

        $(".material_inhouse_actual").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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











        // test

        $(".care_label_actual").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(this).data('c-id');
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
                        type: 'care_label_actual'
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



        $(".fabric_ref").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(this).data('c-id');
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
                        type: 'fabric_ref'
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


        $(".fabric_weight").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(this).data('c-id');
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
                        type: 'fabric_weight'
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

        $(".fabric_mill").on("keyup", function(e) {
            // Check if the Enter key (key code 13) is pressed
            if (e.keyCode === 13) {

                //var enteredDate = $(this).val();

                // Get the hidden po_id value
                var po_id = $(this).data('c-id');
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
                        type: 'fabric_mill'
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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
                var po_id = $(this).data('c-id');
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






        // function setFooterColumnWidths() {
        //     var tbodyColumns = $('.dataTables_scrollBody tbody tr:first-child th');
        //     var tfootColumns = $('.dataTables_scrollFoot tfoot th');

        //     tbodyColumns.each(function(index) {
        //         var cellText = tfootColumns.eq(index).text();

        //         // Remove all whitespace characters from the text content
        //         var cleanedText = cellText.replace(/\s+/g, "");
        //         var columnWidth = $(this).outerWidth(); // Consider padding and border
        //         console.log(columnWidth);
        //         tfootColumns.eq(index).width(columnWidth - 1);
        //         console.log(tfootColumns.eq(index).outerWidth());
        //     });
        // }

        // // Call the function when the DOM is fully loaded
        // setFooterColumnWidths();
    });
</script>
