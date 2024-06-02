@extends('layouts.admin')

@section('content')
    <div class="px-5">

        <div class="tab-content2">
            @php
                //dd($PurchageOrder);
                //dd($orderItem);
            @endphp

            <div  class="tab-pane2 mt-5">
                <form method="POST" action="{{ route('po-update', $PurchageOrder->id) }}" id="create-patient-form" class="mb-5"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-between">
                        <div class="col-md-6 justify-content-end">
                            <div class="form-group row">
                                <label for="select_buyer" class="col-5 text-right">Select Buyer<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7">
                                    <select class="form-control form-control-sm" id="select_buyer" name="select_buyer" required>
                                        <option value="{{ $PurchageOrder->buyer_id }}" selected>{{ $buyer->name }}</option>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="department" class="col-5 text-right">Department<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7">
                                    <select name="department" id="department" class="form-control form-control-sm" required>
                                        <option value="{{ $PurchageOrder->department_id }}" selected>{{ $department->name }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="buyer_price" class="col-5 text-right">Buyer Price<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7"><input type="text" class="form-control form-control-sm"
                                    value="{{ $PurchageOrder->buyer_price }}"    id="buyer_price" name="buyer_price" required></div>
                            </div>
                            <div class="form-group row">
                                <label for="vendor_price" class="col-5 text-right">FOB INV<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7"><input type="text" class="form-control form-control-sm"
                                    value="{{ $PurchageOrder->vendor_price }}" id="vendor_price" name="vendor_price" required></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-5"></div>
                                <div class="col-7" id="vendor_price_difference"></div>
                            </div>

                            <div class="form-group row">
                                <label for="early-buyer-date" class="col-5 text-right">Earliest Shipment Date<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7 early-buyer-date-edit"><input type="date" class="form-control form-control-sm datepicker"
                                    value="{{ $PurchageOrder->earliest_buyer_date }}"  id="early-buyer-date" name="early-buyer-date" required></div>
                            </div>


                            <div class="form-group row">
                                <label for="care_label_date" class="col-5 text-right">Care Label Date<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7"><input type="date" class="form-control form-control-sm datepicker"
                                    value="{{ $PurchageOrder->care_lavel_date }}" id="care_label_date" name="care_label_date" required></div>
                            </div>
                            <div class="form-group row">
                                <label for="approval_date" class="col-5 text-right">Approval Date<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7"><input type="date" class="form-control form-control-sm datepicker"
                                    value="{{ $PurchageOrder->approved_date }}" id="approval_date" name="approval_date" required></div>
                            </div>
                            <div class="form-group row">
                                <label for="ww_po_no" class="col-5 text-right">PO Number.<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7"><input type="text" class="form-control form-control-sm"
                                    value="{{ $PurchageOrder->po_no }}" id="ww_po_no" name="ww_po_no" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="plm" class="col-5 text-right" id="plm-label-form">PLM<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7"><input type="text" class="form-control form-control-sm"
                                    value="{{ $PurchageOrder->plm }}" id="plm" name="plm" required></div>
                            </div>

                            <div class="form-group row">
                                <label for="fabric_quality" class="col-5 text-right">Fabric Quality<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7"><input type="text" class="form-control form-control-sm"
                                    value="{{ $PurchageOrder->fabric_quality }}" id="fabric_quality" name="fabric_quality" requred></div>
                            </div>
                            <div class="form-group row">
                                <label for="fabric_content" class="col-5 text-right">Fabric Content<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7"><input type="text" class="form-control form-control-sm"
                                    value="{{ $PurchageOrder->fabric_content }}" id="fabric_content" name="fabric_content" required></div>
                            </div>
                            <div class="form-group row">
                                <label for="fabric_type" class="col-5 text-right">Fabric Type<span
                                        style="color:red">*</span>:</label>
                                {{-- <div class="col-7">
                                    <select class="form-control form-control-sm" id="fabric_type"
                                        name="fabric_type" required>
                                        <option value="">Select Fabric Type</option>
                                        <option value="1">Local Fabric</option>
                                        <option value="2">Special Yarn/ AOP Fabric</option>
                                        <option value="3">Imported Fabric</option>
                                        <option value="4">Solid</option>
                                    </select>
                                </div> --}}
                                <div class="col-7">
                                    @php
                                        //dd($PurchageOrder->fabric_type);
                                    @endphp
                                    <select class="form-control form-control-sm" id="fabric_type" name="fabric_type" required>
                                        <option value="1" {{ $PurchageOrder->fabric_type == 1 ? 'selected' : '' }}>Local Fabric</option>
                                        <option value="2" {{ $PurchageOrder->fabric_type == 2 ? 'selected' : '' }}>Special Yarn/ AOP Fabric</option>
                                        <option value="3" {{ $PurchageOrder->fabric_type == 3 ? 'selected' : '' }}>Imported Fabric</option>
                                        <option value="4" {{ $PurchageOrder->fabric_type == 4 ? 'selected' : '' }}>Solid</option>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="supplier_no" class="col-5 text-right">Supplier Number<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7"><input type="text" class="form-control form-control-sm"
                                    value="{{ $PurchageOrder->supplier_no }}" id="supplier_no" name="supplier_no" required></div>
                            </div>
                            <div class="form-group row">
                                <label for="supplier_name" class="col-5 text-right">Supplier Name<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7"><input type="text" class="form-control form-control-sm"
                                    value="{{ $PurchageOrder->supplier_name }}" id="supplier_name" name="supplier_name" required></div>
                            </div>




                        </div>
                        <div class="col-md-6 justify-content-start">
                            <div class="form-group row">
                                <label for="select_vendor" class="col-5 text-right">Select Vendor<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7">
                                    <select class="form-control form-control-sm" id="select_vendor" name="select_vendor"required>
                                        <option value="{{ $PurchageOrder->vendor_id }}" selected>{{ $vendor->name }}</option>
                                    </select>
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="ex_factory_date" class="col-5 text-right">Factory Ex-Factory Date<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7"><input type="date" class="form-control form-control-sm datepicker"
                                    value="{{ $PurchageOrder->ex_factory_date }}" id="ex_factory_date" name="ex_factory_date" required></div>
                            </div>

                            <div class="form-group row">
                                <div class="col-5"></div>
                                <div class="col-7" id="ex_factory_date_difference"></div>
                            </div>

                            <div class="form-group row">
                                <label for="access_price" class="col-5 text-right">Accessories Price<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7"><input type="text" class="form-control form-control-sm"
                                    value="{{ $PurchageOrder->access_price }}" id="access_price" name="access_price"></div>
                            </div>


                            <div class="form-group row">
                                <label for="style_note" class="col-5 text-right">FACTORY FOB<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7"><input type="text" class="form-control form-control-sm"
                                          value="Price : {{ $PurchageOrder->vendor_price }} + {{ $PurchageOrder->access_price }} = {{ $PurchageOrder->vendor_price + $PurchageOrder->access_price }} "
                                          id="style_note" name="style_note" required></div>
                            </div>


                            <div class="form-group row">
                                <label for="upload_picture_germent" class="col-5 text-right">Upload Picture
                                    germent<span style="color:red">*</span>:</label>
                                <div class="col-7">
                                    @php
                                        $image_name = substr($PurchageOrder->upload_picture_germent, 17);
                                    @endphp
                                    <span>{{ $image_name }}</span>

                                <input type="file" class="" id="upload_picture_germent"
                                        name="upload_picture_germent" ></div>
                            </div>
                            <div class="form-group row">
                                <label for="upload_artwork" class="col-5 text-right">Upload Artwork<span
                                        style="color:red"></span>:</label>
                                <div class="col-7">
                                    @php
                                        $art_work_image_name = substr($PurchageOrder->upload_artwork, 17);
                                    @endphp
                                    <span>{{ $art_work_image_name }}</span>

                                    <input type="file" class="" id="upload_artwork"
                                        name="upload_artwork"></div>
                            </div>

                            {{-- <div class="form-group row">
                                <label for="note" class="col-5 text-right">Special Note:</label>
                                <div class="col-7"><input type="text" class="form-control form-control-sm"
                                        id="note" name="note"></div>
                            </div> --}}
                            <div class="form-group row">
                                <label for="currency" class="col-5 text-right">Currency<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7"><input type="text" class="form-control form-control-sm"
                                          value="{{ $PurchageOrder->currency }}" id="currency" name="currency" required></div>
                            </div>
                            <div class="form-group row">
                                <label for="payment_terms" class="col-5 text-right">Payment Terms<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7"><input type="text" class="form-control form-control-sm"
                                          value="{{ $PurchageOrder->payment_terms }}" id="payment_terms" name="payment_terms" required></div>
                            </div>
                            <div class="form-group row">
                                <label for="ship_mode" class="col-5 text-right">Ship Method<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7"><input type="text" class="form-control form-control-sm"
                                          value="{{ $PurchageOrder->ship_mode }}" id="ship_mode" name="ship_mode" required></div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-5 text-right">Description<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7"><input type="text" class="form-control form-control-sm"
                                          value="{{ $PurchageOrder->description }}" id="description" name="description" required></div>
                            </div>
                            <div class="form-group row">
                                <label for="note" class="col-5 text-right">Special Note<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7">
                                    <textarea class="form-control form-control-sm" id="note" name="note" required>{{ $PurchageOrder->note }}</textarea>
                                </div>
                            </div>



                        </div>




                    </div>

                    <br>
                    <hr>


                    {{-- <button type="submit" class="btn btn-primary">Save</button> --}}
                    {{-- items --}}
                    <div>
                        <h5>PO ITEMS</h5>
                        <p class="btn btn-sm btn-success" id="add-row">Add row</p>
                        <table class="table table-responsive table-bordered mt-4">
                            <thead>
                                <tr>
                                    <th scope="col">Sl</th>
                                    <th style="display: none;" scope="col">ID</th>
                                    <th scope="col" id="plm_line">PLM</th>
                                    <th scope="col" id="style_number_line">Style Number</th>
                                    <th scope="col">Colour</th>
                                    <th scope="col">Item Number</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">QTY Ordered</th>
                                    <th scope="col" id="inner_qty">Inner QTY</th>
                                    <th scope="col" id="outer_qty">Outer Case QTY</th>
                                    <th scope="col">FACTORY FOB INV </th>

                                    <th scope="col">Value</th>
                                    <th scope="col">Selling Price
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="item-table-body">

                                @php
                                    $sl = 1;
                                @endphp

                                @foreach ( $orderItems as $orderItem )
                                <tr>
                                    <td>{{ $sl++; }}</td>
                                    <td style="display: none;" ><input type="text" name="items[{{$loop->index}}][id]" value="{{ $orderItem->id }}"></td>
                                    <td><input type="text" name="items[{{$loop->index}}][plm]" value="{{ $orderItem->plm; }}"></td>
                                    <td><input type="text" name="items[{{$loop->index}}][style_no]" value="{{ $orderItem->style_no; }}"></td>
                                    <td><input type="text" name="items[{{$loop->index}}][colour]" value="{{ $orderItem->colour; }}"></td>

                                    <td><input type="text" name="items[{{$loop->index}}][item_no]" value="{{ $orderItem->item_no; }}"></td>
                                    <td><input type="text" name="items[{{$loop->index}}][size]" value="{{ $orderItem->size; }}"></td>
                                    {{-- <td><input id="qty_ordered{{ $orderItem->id }}" type="text" name="items[{{$loop->index}}][qty_ordered]"  value="{{ $orderItem->qty_ordered; }}"></td> --}}
                                    <td>
                                        <input oninput="updateValue({{ $orderItem->id }})" id="qty_ordered{{ $orderItem->id }}" type="text" name="items[{{$loop->index}}][qty_ordered]" value="{{ $orderItem->qty_ordered }}" >
                                    </td>

                                    <td><input type="text" name="items[{{$loop->index}}][inner_qty]" value="{{ $orderItem->inner_qty; }}"></td>

                                    <td><input oninput="updateValue({{ $orderItem->id }})" id="supplier_price{{ $orderItem->id }}" type="text" name="items[{{$loop->index}}][supplier_price]" value="{{ $orderItem->supplier_price; }}"></td>
                                    {{-- <td><input id="outer_case_qty{{ $orderItem->id }}" type="text" name="items[{{$loop->index}}][outer_case_qty]" value="{{ $orderItem->outer_case_qty; }}"></td> --}}
                                    {{-- <td><input id="value{{ $orderItem->id }}" type="text" name="items[{{$loop->index}}][value]" value="{{ $orderItem->value; }}"></td> --}}

                                    <td>
                                        <input type="text" name="items[{{$loop->index}}][outer_case_qty]" value="{{ $orderItem->outer_case_qty }}" >
                                    </td>

                                    <td>
                                        <input id="value{{ $orderItem->id }}" type="text" name="items[{{$loop->index}}][value]" id="value{{ $orderItem->id }}" value="{{ $orderItem->value }}" readonly>
                                    </td>


                                    <td><input type="text" name="items[{{$loop->index}}][selling_price]" value="{{ $orderItem->selling_price; }}"></td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <input type="hidden" id="download_pdf" name="download_pdf" value="no" required>
                    <input type="hidden" id="send_pdf" name="send_pdf" value="no" required>



                    <button type="submit" class="btn btn-primary btn-sm" id="save-po">Update PO</button>
                    <button type="submit" class="btn btn-info btn-sm" id="save_and_download">Update and download
                        PO</button>
                    <button type="submit" class="btn btn-info btn-sm" id="save_and_send">Update and send
                        PO</button>
                    {{-- <a href="{{ route('pdf-view') }}" class="btn btn-info btn-sm">Download PO</a> --}}
                </form>
            </div>
        </div>
    </div>




    </div>
@endsection



@section('scripts')

<script>
    function updateValue(id) {
        console.log("check click");

        var quantity = document.getElementById('qty_ordered' + id).value ;
        var price = document.getElementById('supplier_price' + id).value ;
        var total = quantity * price;

        document.getElementById('value' + id).value = total.toFixed(2)

        console.log(quantity,price,total);

    }

</script>

    <script>
        $(document).ready(function() {

            // cnange in po items table

            console.log("Hello , page loaded");


            updateVendorPriceAndDifference();
            updateDifferenceNote();



             // Function to update the difference note
            function updateDifferenceNote() {
                const buyerDate = new Date($('#early-buyer-date').val());
                const exFactoryDate = new Date($('#ex_factory_date').val());
                const differenceInDays = Math.floor((exFactoryDate - buyerDate) / (1000 * 60 * 60 * 24));

                // Get the element
                const differenceElement = $('#ex_factory_date_difference');

                // Update the text content of the element with the difference note
                differenceElement.text(`* ${differenceInDays} days earlier than Buyer Date`);

                // Add the "text-danger" class to make the text red
                if (differenceInDays < 0) {
                    differenceElement.addClass('text-danger');
                } else {
                    differenceElement.removeClass('text-danger');
                }
            }



            $('#early-buyer-date').on('change', function() {
                console.log("Date changed");
                const buyerDate = new Date($(this).val());
                const exFactoryDate = new Date(buyerDate);
                exFactoryDate.setDate(exFactoryDate.getDate() - 14); // Subtract 14 days

                const exFactoryDateFormatted = exFactoryDate.toISOString().split('T')[
                    0]; // Convert date to YYYY-MM-DD format
                $('#ex_factory_date').val(exFactoryDateFormatted);

                updateDifferenceNote();

            });





            // for price








            // Function to update the Vendor Price and Vendor Price Difference note
            function updateVendorPriceAndDifference() {
                const buyerPrice = parseFloat($('#buyer_price').val()).toFixed(2);
                let vendorPrice = parseFloat($('#vendor_price').val()).toFixed(2);

                // If Vendor Price is not provided, calculate it as 8% less than the Buyer Price
                if (isNaN(vendorPrice)) {
                    vendorPrice = buyerPrice * 0.92; // 8% less than the Buyer Price
                }

                // Calculate the percentage difference between Buyer Price and Vendor Price
                const percentageDifference = ((buyerPrice - vendorPrice) / buyerPrice) * 100;

                // Round the percentageDifference to 2 decimal places
                const roundedPercentageDifference = parseFloat(percentageDifference.toFixed(2));

                // Get the elements
                const vendorPriceElement = $('#vendor_price');
                const vendorPriceDifferenceElement = $('#vendor_price_difference');

                // Update the value of the Vendor Price field
                vendorPriceElement.val(parseFloat(vendorPrice).toFixed(2));

                // Update the text content of the Vendor Price Difference note
                vendorPriceDifferenceElement.text(
                    `*FOB INV is ${roundedPercentageDifference}% less than Buyer Price.`);


                vendorPriceDifferenceElement.addClass('text-danger');

            }

            function updateVendorPriceAndDifferenceMRP() {
                const buyerPrice = parseFloat($('#buyer_price').val()).toFixed(2);
                let vendorPrice = parseFloat($('#vendor_price').val()).toFixed(2);

                // If Vendor Price is not provided, calculate it as 8% less than the Buyer Price
                if (isNaN(vendorPrice)) {
                    vendorPrice = buyerPrice / 1.12; // 8% less than the Buyer Price
                }

                // Calculate the percentage difference between Buyer Price and Vendor Price
                const percentageDifference = ((buyerPrice - vendorPrice) / buyerPrice) * 100;

                // Round the percentageDifference to 2 decimal places
                const roundedPercentageDifference = parseFloat(percentageDifference.toFixed(2));

                // Get the elements
                const vendorPriceElement = $('#vendor_price');
                const vendorPriceDifferenceElement = $('#vendor_price_difference');

                // Update the value of the Vendor Price field
                vendorPriceElement.val(parseFloat(vendorPrice).toFixed(2));

                // Update the text content of the Vendor Price Difference note
                vendorPriceDifferenceElement.text(
                    `*FOB INV is ${roundedPercentageDifference}% less than Buyer Price.`);


                vendorPriceDifferenceElement.addClass('text-danger');

            }

            // Add event listener to the "Buyer Price" input to update the Vendor Price and Vendor Price Difference note
            $('#buyer_price').on('input', function() {
                if ($('#select_buyer').val() == '2') {
                    updateVendorPriceAndDifferenceMRP()
                } else {
                    updateVendorPriceAndDifference();
                }

            });




            // access price on change
            const accessPrice = document.getElementById("access_price");
            let accessPriceValue = parseFloat($('#access_price').val());

            accessPrice.addEventListener("change", function() {
                // Get the new value entered in the changed input field

                let newAccessPrice = parseFloat($('#access_price')
                    .val());

                const newStyleNote = 'Price: ' + (parseFloat($(
                            '#vendor_price')
                        .val())) +
                    " " + "+" + " " + newAccessPrice + ' ' + '=' +
                    " " + parseFloat(parseFloat($('#vendor_price')
                            .val()) +
                        newAccessPrice).toFixed(2)

                $('#style_note').val(newStyleNote);

                Array.prototype.forEach.call(valueInputs, function(
                    input, index) {
                    let newFinalPrice = (parseFloat($(
                            '#vendor_price').val()) +
                        newAccessPrice).toString()

                    input.value = parseFloat(newFinalPrice)
                        .toFixed(2)
                });

                data.data.forEach((item, index) => {
                    const totalPrice = totalInputs[index];

                    let newFinalPrice = (parseFloat($(
                            '#vendor_price').val()) +
                        newAccessPrice)
                    let newFinalTotalPrice = parseFloat(
                        newFinalPrice *
                        parseFloat(item[
                            "Qty Ordered"])).toFixed(2)

                    console.log(parseFloat($(
                        '#vendor_price').val()));

                    console.log(newFinalPrice);

                    console.log(parseFloat(item[
                        "Qty Ordered"]));

                    totalPrice.value = newFinalTotalPrice
                })

                Array.prototype.forEach.call(totalInputs, function(
                    input, index) {

                });
            });

            // save and download

            $('#save_and_download').on('click', function() {
                $('#download_pdf').val('yes')
            })

            $('#save_and_send').on('click', function() {
                $('#send_pdf').val('yes')
            })







            // row code start

            let slNo = 1;

            function addNewRow() {
                slNo++;
                const newRow = `
                <tr>
                    <td>${slNo}</td>
                    <td><input type="text" name="items[${slNo}][plm]" ></td>
                    <td><input type="text" name="items[${slNo}][style_no]" ></td>
                    <td><input type="text" name="items[${slNo}][colour]" ></td>
                    <td><input type="text" name="items[${slNo}][item_no]" ></td>
                    <td><input type="text" name="items[${slNo}][size]" ></td>
                    <td><input type="text" name="items[${slNo}][qty_ordered]" ></td>
                    <td><input type="text" name="items[${slNo}][inner_qty]" ></td>

                    <td><input type="text" name="items[${slNo}][supplier_price]" ></td>
                    <td><input type="text" name="items[${slNo}][outer_case_qty]" ></td>
                    <td><input type="text" name="items[${slNo}][value]" ></td>
                    <td><input type="text" name="items[${slNo}][selling_price]" ></td>
                </tr>
            `;
                $('table tbody').append(newRow);
            }

            // Add event listener to the "Add row" button
            $('#add-row').on('click', addNewRow);



        }); // document ready end
    </script>
@endsection


