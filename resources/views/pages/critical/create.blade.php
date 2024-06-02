@extends('layouts.admin')

@section('content')
<style>
    .toplabel{
        margin-top: 12px;
    }
</style>
<div class="container">
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    General information
                </button>
            </h2>
            <div id="flush-collapseOne" class=" row accordion-collapse collapse toplabel" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" id="brand" placeholder="brand" class="form-control" />
                        <label for="brand">Brand</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" id="department" placeholder="Department" class="form-control" />
                        <label for="department">Department</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" id="season" placeholder="Season" class="form-control" />
                        <label for="season">Season</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <input type="file" />
                    <label for="Image">Image</label>
                </div>
            </div>

            <div id="flush-collapseOne" class=" row accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" id="fabricType" placeholder="Fabric Type" class="form-control" />
                        <label for="fabricType">Fabric Type</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" id="block" placeholder="BLOCK" class="form-control" />
                        <label for="block">BLOCK</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" id="vendor" placeholder="Vendor" class="form-control" />
                        <label for="vendor">Vendor</label>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" id="vendor" placeholder="Manufacturing Unit" class="form-control" />
                        <label for="vendor">Manufacturing Unit</label>
                    </div>
                </div>
            </div>
            <br />
            <div id="flush-collapseOne" class=" row accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" id="plmNumber" placeholder="PLM Number" class="form-control" />
                        <label for="plmNumber">PLM Number</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" id="purchaseOrderNumber" placeholder="Purchase Order Number" class="form-control" />
                        <label for="purchaseOrderNumber">Purchase Order Number</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" id="styleNumber" placeholder="Style Number" class="form-control" />
                        <label for="styleNumber">Style Number</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" id="orderQuantity" placeholder="Order Quantity" class="form-control" />
                        <label for="orderQuantity">Order Quantity</label>
                    </div>
                </div>
            </div>
            <br />
            <div id="flush-collapseOne" class=" row accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" id="supplierPrice" placeholder="Supplier Price/Product Cost" class="form-control" />
                        <label for="supplierPrice">Supplier Price/Product Cost</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" id="totalValue" placeholder="Total Value" class="form-control" />
                        <label for="totalValue">Total Value</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" id="styleDescription" placeholder="Style Description" class="form-control" />
                        <label for="styleDescription">Style Description</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" id="colour" placeholder="Colour" class="form-control" />
                        <label for="colour">Colour</label>
                    </div>
                </div>
            </div>
            <br />
            <div id="flush-collapseOne" class=" row accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" id="careLabelDate" placeholder="Care Label Date" class="form-control" />
                        <label for="careLabelDate">Care Label Date</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" id="fabricReference" placeholder="Fabric Reference" class="form-control" />
                        <label for="fabricReference">Fabric Reference</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-floating">
                        <input type="text" id="fabricContent" placeholder="Fabrication/ Fabric Content" class="form-control" />
                        <label for="fabricContent"> Fabric Content</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-floating">
                        <input type="text" id="fabricWeight" placeholder="Fabric Weight" class="form-control" />
                        <label for="fabricWeight">Fabric Weight</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-floating">
                        <input type="text" id="fabricMill" placeholder="Fabric Mill" class="form-control" />
                        <label for="fabricMill">Fabric Mill</label>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    Purchase Order information
                </button>
            </h2>

            <div id="flush-collapseTwo" class="row accordion-collapse collapse toplabel" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">

                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" id="leadTimes" placeholder="Lead Times" class="form-control" />
                        <label for="leadTimes">Lead Times</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" id="priorityOrder" placeholder="Treated as a priority order" class="form-control" />
                        <label for="priorityOrder">Treated as a priority order</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" id="planPO" placeholder="Official PO sent (Plan)" class="form-control" />
                        <label for="planPO">Official PO sent (Plan)</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" id="actualPO" placeholder="Official PO sent (Actual)" class="form-control" />
                        <label for="actualPO">Official PO sent (Actual)</label>
                    </div>
                </div>

            </div>
        </div>
        <br />
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    Lab dips and Embellishment Information
                </button>
            </h2>
            <div id="flush-collapseThree" class="row accordion-collapse collapse toplabel" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">

                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" id="colourArtworkPlan" placeholder="Colour std/print artwork sent to supplier (plan)" class="form-control" />
                        <label for="colourArtworkPlan">Colour std sent supplier (Plan)</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" id="colourArtworkActual" placeholder="Colour std/print artwork sent to supplier (Actual)" class="form-control" />
                        <label for="colourArtworkActual">Colour std sent supplier (Actual)</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" id="labDipApprovalPlan" placeholder="Lab dip Approval (Plan)" class="form-control" />
                        <label for="labDipApprovalPlan">Lab dip Approval (Plan)</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" id="labDipApprovalActual" placeholder="Lab dip Approval (Actual)" class="form-control" />
                        <label for="labDipApprovalActual">Lab dip Approval (Actual)</label>
                    </div>
                </div>

            </div>

            <br />
            <div id="flush-collapseThree" class="row accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" id="labDipDispatch" placeholder="Lab Dip Dispatch Details" class="form-control" />
                        <label for="labDipDispatch">Lab Dip Dispatch Details</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <input type="file" />
                    <label for="">Lab Dip Image</label>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" id="embellishmentApprovalPlan" placeholder="Embellishment - S/O Approval (Plan)" class="form-control" />
                        <label for="embellishmentApprovalPlan">Embellishment - S/O Approval (Plan)</label>
                    </div>
                </div>
            </div>
            <div id="flush-collapseThree" class="row accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">

                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" id="embellishmentApprovalActual" placeholder="Embellishment - S/O Approval (Actual)" class="form-control" />
                        <label for="embellishmentApprovalActual">Embellishment - S/O Approval (Actual)</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" id="embellishmentDispatch" placeholder="Embellishment - S/O Dispatch Details" class="form-control" />
                        <label for="embellishmentDispatch">Embellishment - S/O Dispatch Details</label>
                    </div>
                </div>

                <div class="col-md-4">
                    <input type="file" />
                    <label for="">Embellishment - S/O Image</label>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                    Bulk Fabric Information
                </button>
            </h2>
            <div id="flush-collapseFour" class="row accordion-collapse collapse toplabel" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">

                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" id="fabricOrderedPlan" placeholder="Fabric Ordered (plan)" class="form-control" />
                        <label for="fabricOrderedPlan">Fabric Ordered (plan)</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" id="fabricOrderedActual" placeholder="Fabric Ordered (actual)" class="form-control" />
                        <label for="fabricOrderedActual">Fabric Ordered (actual)</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" id="bulkFabricApprovalPlan" placeholder="Bulk Fabric/ Knit Down Approval (Plan)" class="form-control" />
                        <label for="bulkFabricApprovalPlan">Bulk Fabric/ Knit Down Approval (Plan)</label>
                    </div>
                </div>



            </div>
            <div id="flush-collapseFour" class="row accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" id="bulkFabricApprovalActual" placeholder="Bulk Fabric/ Knit Down Approval (Actual)" class="form-control" />
                        <label for="bulkFabricApprovalActual">Bulk Fabric/ Knit Down Approval (Actual)</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" id="bulkFabricDispatch" placeholder="Bulk Fabric/ Knit Down Dispatch Details" class="form-control" />
                        <label for="bulkFabricDispatch">Bulk Fabric/ Knit Down Dispatch Details</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <input type="file" />
                    <label for="">Bulk fabric/ Knit down Image</label>
                </div>
            </div>
            <div id="flush-collapseFour" class="row accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" id="bulkYarnInhousePlan" placeholder="Bulk Yarn / Fabric Inhouse (Plan)" class="form-control" />
                        <label for="bulkYarnInhousePlan">Bulk Yarn / Fabric Inhouse (Plan)</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" id="bulkYarnInhouseActual" placeholder="Bulk Yarn / Fabric Inhouse (Actual)" class="form-control" />
                        <label for="bulkYarnInhouseActual">Bulk Yarn / Fabric Inhouse (Actual)</label>
                    </div>
                </div>


            </div>
        </div>
        <br />
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                    Sample Approval Information
                </button>
            </h2>
            <div id="flush-collapseFive" class="row accordion-collapse collapse toplabel" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">

                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" id="devSamplePlan" placeholder="Development sample (Plan)" class="form-control" />
                        <label for="devSamplePlan">Development sample (Plan)</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" id="devSampleActual" placeholder="Development sample (Actual)" class="form-control" />
                        <label for="devSampleActual">Development sample (Actual)</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" id="devSampleDispatch" placeholder="Development dispatch details" class="form-control" />
                        <label for="devSampleDispatch">Development dispatch details</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <input type="file" />
                    <label for="">Development image</label>
                </div>


            </div>
            <div id="flush-collapseFive" class="row accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="Fit - Approval (Plan)" class="form-control" />
                        <label for="fitApprovalPlan">Fit - Approval (Plan)</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="Fit - Approval (Actual)" class="form-control" />
                        <label for="fitApprovalActual">Fit - Approval (Actual)</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="Fit Sample dispatch details" class="form-control" />
                        <label for="fitSampleDispatch">Fit Sample dispatch details</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <input type="file" />
                    <label for="">Fit sample Image</label>
                </div>

            </div>
            <br />
            <div id="flush-collapseFive" class="row accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="Size set Approval (Plan)" class="form-control" />
                        <label for="sizeSetApprovalPlan">Size set Approval (Plan)</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="Size set Approval (Actual)" class="form-control" />
                        <label for="sizeSetApprovalActual">Size set Approval (Actual)</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="Size Set Sample dispatch details" class="form-control" />
                        <label for="sizeSetSampleDispatch">Size Set Sample dispatch details</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <input type="file" />
                    <label for="">Size Set sample image </label>
                </div>
            </div>
            <div id="flush-collapseFive" class="row accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="PP Approval (Plan)" class="form-control" />
                        <label for="ppApprovalPlan">PP Approval (Plan)</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="PP approval (Actual)" class="form-control" />
                        <label for="ppApprovalActual">PP approval (Actual)</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="PP Sample dispatch details" class="form-control" />
                        <label for="ppSampleDispatch">PP Sample dispatch details</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <input type="file" />
                    <label for="">PP sample image</label>
                </div>

            </div>
        </div>
        <br />
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingSix">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                    PP Meeting Details
                </button>
            </h2>
            <div id="flush-collapseSix" class="row accordion-collapse collapse toplabel" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="Care Approval Plan" class="form-control" />
                        <label for="careApprovalPlan">Care Approval Plan</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="Care Approval Actual" class="form-control" />
                        <label for="careApprovalActual">Care Approval Actual</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="Material Inhouse date (Plan)" class="form-control" />
                        <label for="materialInhouseDatePlan">Material Inhouse date (Plan)</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="Material Inhouse date (Actual)" class="form-control" />
                        <label for="materialInhouseDateActual">Material Inhouse date (Actual)</label>
                    </div>
                </div>
            </div>
            <br />
            <div id="flush-collapseSix" class="row accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="PP Meeting Date (Plan)" class="form-control" />
                        <label for="ppMeetingDatePlan">PP Meeting Date (Plan)</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="PP Meeting Date (Actual)" class="form-control" />
                        <label for="ppMeetingDateActual">PP Meeting Date (Actual)</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="Create PP Meeting Schedule" class="form-control" />
                        <label for="createPPMeetingSchedule">Create PP Meeting Schedule</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <input type="file" />
                    <label for="">PP Meeting Report Upload</label>
                </div>

            </div>
        </div>
        <br />
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingSeven">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven">
                    Production Information
                </button>
            </h2>
            <div id="flush-collapseSeven" class="row accordion-collapse collapse toplabel" aria-labelledby="flush-headingSeven" data-bs-parent="#accordionFlushExample">

                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="Cutting date (Plan)" class="form-control" />
                        <label for="cuttingDatePlan">Cutting date (Plan)</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="Cutting date (Actual)" class="form-control" />
                        <label for="cuttingDateActual">Cutting date (Actual)</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="Embellishment (Plan)" class="form-control" />
                        <label for="embellishmentPlan">Embellishment (Plan)</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="Embellishment (Actual)" class="form-control" />
                        <label for="embellishmentActual">Embellishment (Actual)</label>
                    </div>
                </div>
            </div>

            <br />
            <div id="flush-collapseSeven" class="row accordion-collapse collapse" aria-labelledby="flush-headingSeven" data-bs-parent="#accordionFlushExample">
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" placeholder="Sewing Start date (Plan)" class="form-control" />
                        <label for="sewingStartDatePlan">Sewing Start date (Plan)</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" placeholder="Sewing Start date (Actual)" class="form-control" />
                        <label for="sewingStartDateActual">Sewing Start date (Actual)</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" placeholder="Washing complete date (Plan)" class="form-control" />
                        <label for="washingCompleteDatePlan">Washing complete date (Plan)</label>
                    </div>
                </div>


            </div>
            <br />
            <div id="flush-collapseSeven" class="row accordion-collapse collapse" aria-labelledby="flush-headingSeven" data-bs-parent="#accordionFlushExample">
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" placeholder="Washing complete date (Actual)" class="form-control" />
                        <label for="washingCompleteDateActual">Washing complete date (Actual)</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" placeholder="Finishing complete date (Plan)" class="form-control" />
                        <label for="finishingCompleteDatePlan">Finishing complete date (Plan)</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" placeholder="Finishing complete date (Actual)" class="form-control" />
                        <label for="finishingCompleteDateActual">Finishing complete date (Actual)</label>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingEight">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseEight" aria-expanded="false" aria-controls="flush-collapseEight">
                    Inspection Information
                </button>
            </h2>
            <div id="flush-collapseEight" class="row accordion-collapse collapse toplabel" aria-labelledby="flush-headingEight" data-bs-parent="#accordionFlushExample">
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" placeholder="Sewing Inspection date (Plan)" class="form-control" />
                        <label for="sewingInspectionDatePlan">Sewing Inspection date (Plan)</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" placeholder="Sewing Inline Inspection date (Actual)" class="form-control" />
                        <label for="sewingInlineInspectionDateActual">Sewing Inline Inspection date (Actual)</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" placeholder="Create Inline Inspection Schedule" class="form-control" />
                        <label for="createInlineInspectionSchedule">Create Inline Inspection Schedule</label>
                    </div>
                </div>


            </div>
            <br />
            <div id="flush-collapseEight" class="row accordion-collapse collapse" aria-labelledby="flush-headingEight" data-bs-parent="#accordionFlushExample">
                <div class="col-md-4">
                    <input type="file" />
                    <label for="">Sewing Inline Inspection Report </label>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" placeholder="Finishing Inline Inspection date (Plan)" class="form-control" />
                        <label for="finishingInlineInspectionDatePlan">Finishing Inline Inspection date (Plan)</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" placeholder="Finishing Inline Inspection date (Actual)" class="form-control" />
                        <label for="finishingInlineInspectionDateActual">Finishing Inline Inspection date (Actual)</label>
                    </div>
                </div>
            </div>
            <br />
            <div id="flush-collapseEight" class="row accordion-collapse collapse" aria-labelledby="flush-headingEight" data-bs-parent="#accordionFlushExample">
                <div class="col-md-3">
                    <input type="file" />
                    <label for="">Finishing Inline Inspection Report </label>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="Pre Final Date (Plan)" class="form-control" />
                        <label for="preFinalDatePlan">Pre Final Date (Plan)</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="Pre Final Date (Actual)" class="form-control" />
                        <label for="preFinalDateActual">Pre Final Date (Actual)</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="Create AQL Schedule" class="form-control" />
                        <label for="createAQLSchedule">Create AQL Schedule</label>
                    </div>
                </div>

            </div>
            <br />
            <div id="flush-collapseEight" class="row accordion-collapse collapse" aria-labelledby="flush-headingEight" data-bs-parent="#accordionFlushExample">
                <div class="col-md-3">
                    <input type="file" />
                    <label for="">Pre Final Date AQL Report </label>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="Final AQL date (Plan)" class="form-control" />
                        <label for="finalAQLDatePlan">Final AQL date (Plan)</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="Final AQL date (Actual)" class="form-control" />
                        <label for="finalAQLDateActual">Final AQL date (Actual)</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="Create AQL Schedule" class="form-control" />
                        <label for="createAQLSchedule">Create AQL Schedule</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <input type="file" />
                    <label for="">Final AQL Report Upload </label>
                </div>

            </div>
        </div>
        <br />
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingNine">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseNine" aria-expanded="false" aria-controls="flush-collapseNine">
                    Production Sample & Shipping Approval Information
                </button>
            </h2>
            <div id="flush-collapseNine" class="row accordion-collapse collapse toplabel" aria-labelledby="flush-headingNine" data-bs-parent="#accordionFlushExample">
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" placeholder="Production Sample Approval (Plan)" class="form-control" />
                        <label for="productionSampleApprovalPlan">Production Sample Approval (Plan)</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" placeholder="Production Sample Approval (Actual)" class="form-control" />
                        <label for="productionSampleApprovalActual">Production Sample Approval (Actual)</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" placeholder="Production Sample Dispatch Details" class="form-control" />
                        <label for="productionSampleDispatchDetails">Production Sample Dispatch Details</label>
                    </div>
                </div>
            </div>
            <br />
            <div id="flush-collapseNine" class="row accordion-collapse collapse" aria-labelledby="flush-headingNine" data-bs-parent="#accordionFlushExample">
                <div class="col-md-3">
                    <input type="file" />
                    <label for="">Production Sample Image </label>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" placeholder="Shipment Booking with ACS (Plan)" class="form-control" />
                        <label for="shipmentBookingACSPlan">Shipment Booking with ACS (Plan)</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" placeholder="Shipment Booking with ACS (Actual)" class="form-control" />
                        <label for="shipmentBookingACSActual">Shipment Booking with ACS (Actual)</label>
                    </div>
                </div>

            </div>
            <br />
            <div id="flush-collapseNine" class="row accordion-collapse collapse" aria-labelledby="flush-headingNine" data-bs-parent="#accordionFlushExample">
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="SA approval (Plan)" class="form-control" />
                        <label for="saApprovalPlan">SA approval (Plan)</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="SA approval (Actual)" class="form-control" />
                        <label for="saApprovalActual">SA approval (Actual)</label>
                    </div>
                </div>

            </div>
        </div>
        <br />
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTen">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTen" aria-expanded="false" aria-controls="flush-collapseTen">
                    Ex-Factory, ETA & Vessel Information
                </button>
            </h2>
            <div id="flush-collapseTen" class="row accordion-collapse collapse toplabel" aria-labelledby="flush-headingTen" data-bs-parent="#accordionFlushExample">
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="Ex-factory Date PO" class="form-control" />
                        <label for="exFactoryDatePO">Ex-factory Date PO</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="Revised Ex-factory Date" class="form-control" />
                        <label for="revisedExFactoryDate">Revised Ex-factory Date</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="Actual Ex-factory Date" class="form-control" />
                        <label for="actualExFactoryDate">Actual Ex-factory Date</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="Shipped Units" class="form-control" />
                        <label for="shippedUnits">Shipped Units</label>
                    </div>
                </div>

            </div>
            <br />
            <div id="flush-collapseTen" class="row accordion-collapse collapse" aria-labelledby="flush-headingTen" data-bs-parent="#accordionFlushExample">
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="Original ETA SA date" class="form-control" />
                        <label for="originalETASADate">Original ETA SA date</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="Revised ETA SA date" class="form-control" />
                        <label for="revisedETASADate">Revised ETA SA date</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="Ship mode" class="form-control" />
                        <label for="shipMode">Ship mode</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="Forwarder ref/ Vessel name or AWB" class="form-control" />
                        <label for="forwarderRef">Forwarder ref/ Vessel name</label>
                    </div>
                </div>

            </div>
        </div>
        <br />
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-heading11">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse11" aria-expanded="false" aria-controls="flush-collapse11">
                    Payment Information
                </button>
            </h2>
            <div id="flush-collapse11" class="row accordion-collapse collapse toplabel" aria-labelledby="flush-heading11" data-bs-parent="#accordionFlushExample">
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="Late Delivery Discounts - CRP" class="form-control" />
                        <label for="lateDeliveryDiscounts">Late Delivery Discounts - CRP</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="Invoice Number" class="form-control" />
                        <label for="invoiceNumber">Invoice Number</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="Invoice Date" class="form-control" />
                        <label for="invoiceDate">Invoice Date</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="Payment Receive Date" class="form-control" />
                        <label for="paymentReceiveDate">Payment Receive Date</label>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-heading12">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse12" aria-expanded="false" aria-controls="flush-collapse12">
                    Comments, Critical Analyse Information
                </button>
            </h2>
            <div id="flush-collapse12" class="row accordion-collapse collapse toplabel" aria-labelledby="flush-heading12" data-bs-parent="#accordionFlushExample">
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" placeholder="Reason for major change likely to affect shipment" class="form-control" />
                        <label for="majorChangeReason">Reason for major change </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" placeholder="AEON Comments - Date 12 Dec 22" class="form-control" />
                        <label for="aeonComments">AEON Comments - Date 12 Dec 22</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" placeholder="Vendor Comments - Date 14 Dec 22" class="form-control" />
                        <label for="vendorComments">Vendor Comments - Date 14 Dec 22</label>
                    </div>
                </div>

            </div>
            <div id="flush-collapse12" class="row accordion-collapse collapse" aria-labelledby="flush-heading12" data-bs-parent="#accordionFlushExample">
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="SA ETA +5 Days?" class="form-control" />
                        <label for="saEtaPlusFiveDays">SA ETA +5 Days?</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" placeholder="NOTE" class="form-control" />
                        <label for="saEtaPlusFiveDays">NOTE</label>
                    </div>
                </div>
            </div>
        </div>
        <br />
    </div>
</div>



@endsection