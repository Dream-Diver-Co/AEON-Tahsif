@extends('layouts.admin')

@section('content')
    <div class="px-5">
        {{-- <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#upload-tab">Upload PDF</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#data-tab">Populated Data</a>
            </li>
            <!-- Add more tabs as needed -->
        </ul> --}}
        <!-- Tab panes -->
        <div class="tab-content">
            <div id="upload-tab" class="tab-pane mt-5 active">
                <div class="row justify-content-center">
                    <div class="col-md-4 justify-content-between align-items-center p-3 border shadow mb-5">
                        <form method="POST" action="{{ route('upload-pdf') }}" id="upload-pdf-form" class=""
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="select_buyer" class="text-left">Select Buyer<span
                                        style="color:red">*</span>:</label>
                                <div class="">
                                    <select class="form-control form-control-sm" id="select_buyer_upload"
                                        name="select_buyer_upload" required>
                                        <option value="">Select Buyer</option>
                                        @foreach ($buyers as $buyer)
                                            <option value="{{ $buyer->id }}">{{ $buyer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- tahsif -->
                            <div class="form-group">
                                <label for="select_vendor" class="text-left">Select Vendor<span
                                        style="color:red">*</span>:</label>
                                <div class="">
                                    <select class="form-control form-control-sm" id="select_vendor_upload"
                                        name="select_vendor_upload" required>
                                        <option value="">Select Vendor</option>
                                        @foreach ($vendors as $vendor)
                                            <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- tahsif........ -->
                            {{-- <div class="form-group">
                                <label for="plm" class="text-left" id="plm-label">PLM:</label>
                                <div class=""><input type="hidden" class="form-control form-control-sm"
                                        id="plm_upload" name="plm_upload"></div>
                            </div> --}}
                            {{-- <div class="form-group">
                                <label for="access_price_upload" class="text-right">Accessories Price:</label>
                                <div class=""><input type="text" class="form-control form-control-sm"
                                        id="access_price_upload" name="access_price_upload" required></div>
                            </div> --}}
                            <div class="form-group row">
                                {{-- <label for="pdf_file" class="col-md-4">Upload PDF:</label> --}}
                                <div class="col-md-9 mt-3">
                                    <input type="file" class="form-control-file" id="pdf_file" name="pdf_file"
                                        accept=".pdf" required>
                                </div>
                                <button type="submit" class="btn btn-success btn-sm mt-3" id="extract-text-btn">Upload
                                    PO</button>
                            </div>
                        </form>
                    </div>
                    {{-- <div class="col-5 justify-content-end"></div> --}}
                </div>
            </div>
            <div id="data-tab" class="tab-pane mt-5">
                <form method="POST" action="{{ route('po-store') }}" id="create-patient-form" class="mb-5"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-between">
                        <div class="col-md-6 justify-content-end">
                            <div class="form-group row">
                                <label for="select_buyer" class="col-5 text-right">Select Buyer<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7">
                                    <select class="form-control form-control-sm" id="select_buyer" name="select_buyer"
                                        required>
                                        {{-- <option value="">Select Buyer</option>
                                        @foreach ($buyers as $buyer)
                                            <option value="{{ $buyer->id }}">{{ $buyer->name }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="form-group row">
                                <label for="department" class="col-5 text-right">Department<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7">
                                    <select name="department" id="department" class="form-control form-control-sm" required>
                                        <option value="">Select Department</option>
                                    </select>
                                </div>
                            </div> -->
                           <!-- Other HTML and Blade template code -->
 
                            <!-- tahsif dropdown start -->
                            <div class="form-group row">
                                <label for="select_dept" class="col-5 text-right">Department<span style="color:red">*</span>:</label>
                                <div class="position-relative col-7">
                                    <!-- Input Box Trigger -->
                                    <input type="text" class="form-control form-control-sm" placeholder="Select department" id="departmentInput" readonly data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                    <!-- Dropdown Menu -->
                                    <div class="dropdown-menu w-100" aria-labelledby="departmentInput">
                                        @foreach ($departments as $dept)
                                            <div class="dropdown-item d-flex justify-content-between align-items-center px-3 py-2" data-dept="{{ $dept->name }}">
                                                <span>{{ $dept->name }}</span>
                                                @can('user.delete')
                                                    <form action="{{ route('delete-department', ['id' => $dept->id]) }}" method="POST" class="ml-2">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this department?')">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                @endcan
                                            </div>
                                            <div class="dropdown-divider"></div>
                                        @endforeach
                                        @can('user.add')
                                            <div class="px-3 py-2">
                                                <button class="btn btn-success btn-sm btn-block" data-toggle="modal" data-target="#create-department">
                                                    <i class="fas fa-plus-circle"></i> Add Department
                                                </button>
                                            </div>
                                        @endcan
                                    </div>
                                </div>
                            </div>


                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    // Get the input field and dropdown items
                                    const departmentInput = document.getElementById('departmentInput');
                                    const dropdownItems = document.querySelectorAll('.dropdown-item');

                                    // Add event listener to each dropdown item
                                    dropdownItems.forEach(function(item) {
                                        item.addEventListener('click', function() {
                                            // Set the input value to the selected department's name
                                            departmentInput.value = this.getAttribute('data-dept');
                                        });
                                    });
                                });
                            </script>
                            <!-- tahsif dropdown end -->

                            <div class="form-group row">
                                <label for="buyer_price" class="col-5 text-right">Buyer Price<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7"><input type="text" class="form-control form-control-sm"
                                        id="buyer_price" name="buyer_price" required></div>
                            </div>
                            <div class="form-group row">
                                <label for="vendor_price" class="col-5 text-right">FACTORY FOB<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7"><input type="text" class="form-control form-control-sm"
                                        id="vendor_price" name="vendor_price" required></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-5"></div>
                                <div class="col-7" id="vendor_price_difference"></div>
                            </div>

                            <div class="form-group row">
                                <label for="early-buyer-date" class="col-5 text-right">Earliest Shipment Date<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7"><input type="date" class="form-control form-control-sm datepicker"
                                        id="early-buyer-date" name="early-buyer-date" required></div>
                            </div>


                            <div class="form-group row">
                                <label for="care_label_date" class="col-5 text-right">Care Label Date<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7"><input type="date" class="form-control form-control-sm datepicker"
                                        id="care_label_date" name="care_label_date" required></div>
                            </div>
                            <div class="form-group row">
                                <label for="approval_date" class="col-5 text-right">Approval Date<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7"><input type="date" class="form-control form-control-sm datepicker"
                                        id="approval_date" name="approval_date" required></div>
                            </div>
                            <div class="form-group row">
                                <label for="ww_po_no" class="col-5 text-right">PO Number.<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7"><input type="text" class="form-control form-control-sm"
                                        id="ww_po_no" name="ww_po_no" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="plm" class="col-5 text-right" id="plm-label-form">PLM<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7"><input type="text" class="form-control form-control-sm"
                                        id="plm" name="plm" required></div>
                            </div>

                            <!-- <div class="form-group row">
                                <label for="fabric_quality" class="col-5 text-right">Fabric Quality<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7"><input type="text" class="form-control form-control-sm"
                                        id="fabric_quality" name="fabric_quality" requred></div>
                            </div> -->
                            <!-- Fabric quality tahsif start-->
                            <div class="form-group row">
                                <label for="select_quality" class="col-5 text-right">Fabric Quality<span style="color:red">*</span>:</label>
                                <div class="position-relative col-7">
                                    <!-- Input Box Trigger -->
                                    <input type="text" class="form-control form-control-sm" placeholder="Select fabric quality" id="qualityInput" readonly data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                    <!-- Dropdown Menu -->
                                    <div class="dropdown-menu w-100" aria-labelledby="qualityInput">
                                        @foreach ($fabric_qualitys as $fquality)
                                            <div class="dropdown-item d-flex justify-content-between align-items-center px-3 py-2" data-quality="{{ $fquality->name }}">
                                                <span>{{ $fquality->name }}</span>
                                                @can('user.delete')
                                                    <form action="{{ route('delete-fabric-quality', ['id' => $fquality->id]) }}" method="POST" class="ml-2">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this fabric quality?')">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                @endcan
                                            </div>
                                            <div class="dropdown-divider"></div>
                                        @endforeach
                                        @can('user.add')
                                            <div class="px-3 py-2">
                                                <button class="btn btn-success btn-sm btn-block" data-toggle="modal" data-target="#create-fabric-quality">
                                                    <i class="fas fa-plus-circle"></i> Add Fabric Quality
                                                </button>
                                            </div>
                                        @endcan
                                    </div>
                                </div>
                            </div>

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    // Get the input field and dropdown items
                                    const qualityInput = document.getElementById('qualityInput');
                                    const dropdownItems = document.querySelectorAll('.dropdown-item');

                                    // Add event listener to each dropdown item
                                    dropdownItems.forEach(function(item) {
                                        item.addEventListener('click', function() {
                                            // Set the input value to the selected fabric quality's name
                                            qualityInput.value = this.getAttribute('data-quality');
                                        });
                                    });
                                });
                            </script>
                            <!-- Fabric quality tahsif end -->

                            <!-- <div class="form-group row">
                                <label for="fabric_content" class="col-5 text-right">Fabric Content<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7"><input type="text" class="form-control form-control-sm"
                                        id="fabric_content" name="fabric_content" required></div>
                            </div> -->

                               <!-- Fabrci content tahsif start-->
                               <div class="form-group row">
                                <label for="select_dept" class="col-5 text-right">Fabric Content<span style="color:red">*</span>:</label>
                                <div class="position-relative col-7">
                                    <!-- Input Box Trigger -->
                                    <input type="text" class="form-control form-control-sm" placeholder="Select fabric content" id="contentInput" readonly data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                    <!-- Dropdown Menu -->
                                    <div class="dropdown-menu w-100" aria-labelledby="contentInput">
                                        @foreach ($fabric_contents as $fcont)
                                            <div class="dropdown-item d-flex justify-content-between align-items-center px-3 py-2" data-fcont="{{ $fcont->name }}">
                                                <span>{{ $fcont->name }}</span>
                                                @can('user.delete')
                                                    <form action="{{ route('delete-fabric-content', ['id' => $fcont->id]) }}" method="POST" class="ml-2">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this fabric content?')">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                @endcan
                                            </div>
                                            <div class="dropdown-divider"></div>
                                        @endforeach
                                        @can('user.add')
                                            <div class="px-3 py-2">
                                                <button class="btn btn-success btn-sm btn-block" data-toggle="modal" data-target="#create-fabric-content">
                                                    <i class="fas fa-plus-circle"></i> Add Fabric Content
                                                </button>
                                            </div>
                                        @endcan
                                    </div>
                                </div>
                                </div>

                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        // Get the input field and dropdown items
                                        const contentInput = document.getElementById('contentInput');
                                        const dropdownItems = document.querySelectorAll('.dropdown-item');

                                        // Add event listener to each dropdown item
                                        dropdownItems.forEach(function(item) {
                                            item.addEventListener('click', function() {
                                                // Set the input value to the selected fabric content's name
                                                contentInput.value = this.getAttribute('data-fcont');
                                            });
                                        });
                                    });
                                </script>
                            <!-- Fabric content tahsif end -->
                            <div class="form-group row">
                                <label for="fabric_type" class="col-5 text-right">Fabric Type<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7"><select class="form-control form-control-sm" id="fabric_type"
                                        name="fabric_type" required>
                                        <option value="">Select Fabric Type</option>
                                        <option value="1">Local Fabric</option>
                                        <option value="2">Special Yarn/ AOP Fabric</option>
                                        <option value="3">Imported Fabric</option>
                                        <option value="4">Solid</option>
                                    </select></div>
                            </div>
                            <div class="form-group row">
                                <label for="supplier_no" class="col-5 text-right">Supplier Number<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7"><input type="text" class="form-control form-control-sm"
                                        id="supplier_no" name="supplier_no" required></div>
                            </div>
                            <div class="form-group row">
                                <label for="supplier_name" class="col-5 text-right">Supplier Name<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7"><input type="text" class="form-control form-control-sm"
                                        id="supplier_name" name="supplier_name" required></div>
                            </div>




                        </div>
                        <div class="col-md-6 justify-content-start">
                            <div class="form-group row">
                                <label for="select_vendor" class="col-5 text-right">Select Vendor<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7">
                                    <select class="form-control form-control-sm" id="select_vendor" name="select_vendor"
                                        required>
                                        {{-- <option value="">Select Vendor</option> --}}
                                        {{-- @foreach ($vendors as $vendor)
                                            <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="ex_factory_date" class="col-5 text-right">Factory Ex-Factory Date<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7"><input type="date" class="form-control form-control-sm datepicker"
                                        id="ex_factory_date" name="ex_factory_date" required></div>
                            </div>

                            <div class="form-group row">
                                <div class="col-5"></div>
                                <div class="col-7" id="ex_factory_date_difference"></div>
                            </div>

                            <div class="form-group row">
                                <label for="access_price" class="col-5 text-right">Accessories Price<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7"><input type="text" class="form-control form-control-sm"
                                        id="access_price" name="access_price"></div>
                            </div>


                            <div class="form-group row">
                                <label for="style_note" class="col-5 text-right">FOB INV<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7"><input type="text" class="form-control form-control-sm"
                                        id="style_note" name="style_note" required></div>
                            </div>


                            <div class="form-group row">
                                <label for="upload_picture_germent" class="col-5 text-right">Upload Picture
                                    germent<span style="color:red">*</span>:</label>
                                <div class="col-7"><input type="file" class="" id="upload_picture_germent"
                                        name="upload_picture_germent" required></div>
                            </div>
                            <div class="form-group row">
                                <label for="upload_artwork" class="col-5 text-right">Upload Artwork<span
                                        style="color:red"></span>:</label>
                                <div class="col-7"><input type="file" class="" id="upload_artwork"
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
                                        id="currency" name="currency" required></div>
                            </div>
                            <div class="form-group row">
                                <label for="payment_terms" class="col-5 text-right">Payment Terms<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7"><input type="text" class="form-control form-control-sm"
                                        id="payment_terms" name="payment_terms" required></div>
                            </div>
                            <div class="form-group row">
                                <label for="ship_mode" class="col-5 text-right">Ship Method<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7"><input type="text" class="form-control form-control-sm"
                                        id="ship_mode" name="ship_mode" required></div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-5 text-right">Description<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7"><input type="text" class="form-control form-control-sm"
                                        id="description" name="description" required></div>
                            </div>
                            <div class="form-group row">
                                <label for="note" class="col-5 text-right">Special Note<span
                                        style="color:red">*</span>:</label>
                                <div class="col-7">
                                    <textarea class="form-control form-control-sm" id="note" name="note" required></textarea>
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
                                <tr>
                                    <td>1</td>
                                    <td><input type="text" name="items[0][plm]"></td>
                                    <td><input type="text" name="items[0][style_no]"></td>
                                    <td><input type="text" name="items[0][colour]"></td>

                                    <td><input type="text" name="items[0][item_no]"></td>
                                    <td><input type="text" name="items[0][size]"></td>
                                    <td><input type="text" name="items[0][qty_ordered]"></td>
                                    <td><input type="text" name="items[0][inner_qty]"></td>

                                    <td><input type="text" name="items[0][supplier_price]"></td>
                                    <td><input type="text" name="items[0][outer_case_qty]"></td>
                                    <td><input type="text" name="items[0][value]"></td>
                                    <td><input type="text" name="items[0][selling_price]"></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <input type="hidden" id="download_pdf" name="download_pdf" value="no" required>
                    <input type="hidden" id="send_pdf" name="send_pdf" value="no" required>
                    <button type="submit" class="btn btn-primary btn-sm" id="save-po">Save PO</button>
                    <button type="submit" class="btn btn-info btn-sm" id="save_and_download">Save and download
                        PO</button>
                    <button type="submit" class="btn btn-info btn-sm" id="save_and_send">Save and send
                        PO</button>
                    {{-- <a href="{{ route('pdf-view') }}" class="btn btn-info btn-sm">Download PO</a> --}}
                </form>
            </div>
        </div>
        <!-- Add more tab panes as needed -->
    </div>




    </div>
    @include('pages.buyer.modals.department_create')
    @include('pages.buyer.modals.fabric_content_create')
    @include('pages.buyer.modals.fabric_quality_create')

@endsection

@section('scripts')

    <script>
        function updateValue(id) {
            var quantity = document.getElementById('qty_ordered' + id).value ;
            var price = document.getElementById('supplier_price' + id).value ;
            var total = quantity * price;
            document.getElementById('value' + id).value = total.toFixed(2)
        }
    </script>

    <script>
        $(document).ready(function() {
            const selectBuyerUpload = document.getElementById("select_buyer_upload");
            const selectVendorUpload = document.getElementById("select_vendor_upload");
            // const plmUpload = document.getElementById("plm_upload");
            const accessPriceUpload = document.getElementById("access_price_upload");
            const selectBuyer = document.getElementById("select_buyer");
            const selectVendor = document.getElementById("select_vendor");
            const accessPrice = document.getElementById("access_price");
            const savePO = document.getElementById('save-po');

            // const plmLabel = document.getElementById("plm-label");

            // plmLabel.style.display = "none";

            $('#select_buyer_upload').change(function() {
                var selectedBuyerValue = $(this).val();
                // var plmField = $('#plm_upload');


            });

            // plmUpload.addEventListener("change", function() {
            //     plm.value = plmUpload.value;
            // })
            // accessPriceUpload.addEventListener("change", function() {
            //     accessPrice.value = accessPriceUpload.value;
            // })

            // Add event listeners to the upload form dropdowns
            selectBuyerUpload.addEventListener("change", function() {
                // Clear existing options in selectBuyer and add the selected option
                selectBuyer.innerHTML = ""; // Remove existing options

                // Add a default option
                // const defaultOption = document.createElement("option");
                // defaultOption.value = "";
                // defaultOption.textContent = "Select Buyer";
                // selectBuyer.appendChild(defaultOption);

                // Add the selected option
                const selectedBuyerOption = document.createElement("option");
                selectedBuyerOption.value = selectBuyerUpload.value;
                selectedBuyerOption.textContent = selectBuyerUpload.selectedOptions[0].textContent;
                selectBuyer.appendChild(selectedBuyerOption);
            });

            selectVendorUpload.addEventListener("change", function() {
                // Clear existing options in selectVendor and add the selected option
                selectVendor.innerHTML = ""; // Remove existing options

                // Add a default option
                // const defaultOption = document.createElement("option");
                // defaultOption.value = "";
                // defaultOption.textContent = "Select Vendor";
                // selectVendor.appendChild(defaultOption);

                // Add the selected option
                const selectedVendorOption = document.createElement("option");
                selectedVendorOption.value = selectVendorUpload.value;
                selectedVendorOption.textContent = selectVendorUpload.selectedOptions[0].textContent;
                selectVendor.appendChild(selectedVendorOption);
            });
            let slNo = 1;


            // #("#save-po").on('click', function(){
            //     this.preventDefault();


            // })

            // save and download
            $('#save_and_download').on('click', function() {
                $('#download_pdf').val('yes')
            })

            $('#save_and_send').on('click', function() {
                $('#send_pdf').val('yes')
            })

            // Function to add a new row when the "Add row" button is clicked

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

            // getting departments
            $('#select_buyer_upload').on('change', function() {
                // Get the selected buyer ID
                var buyerId = $(this).val();

                // Make an AJAX request to fetch the manufacturers for the selected buyer
                $.ajax({
                    url: '/get-departments/' + buyerId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Get the "Manufacturer" dropdown element
                        var departmentDropdown = $('#department');

                        // Clear existing options
                        departmentDropdown.empty();

                        // Populate the "Manufacturer" dropdown with the fetched data
                        $.each(data, function(index, department) {
                            departmentDropdown.append('<option value="' + department
                                .id + '">' +
                                department.name + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching departments:', error);
                    }
                });
            });

            // function checkUploadPdfButton() {
            //     const buyerSelected = $('#select_buyer').val();
            //     const vendorSelected = $('#select_vendor').val();
            //     const plmInput = $('#plm').val();

            //     const isDisabled = !(buyerSelected && vendorSelected && plmInput);
            //     $('#extract-text-btn').prop('disabled', isDisabled);
            // }

            // // Add event listeners to the required fields to check the "Upload PDF" button status
            // $('#select_buyer, #select_vendor, #plm').on('change input', function() {
            //     checkUploadPdfButton();
            // });

            // // Initially check the "Upload PDF" button status
            // checkUploadPdfButton();

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

            // Add event listener to the "Ex Factory Date" input to update the difference note
            $('#ex_factory_date').on('change', updateDifferenceNote);

            // Add event listener to the "Buyer Date" input to update the "Ex Factory Date" and difference note
            $('#early-buyer-date').on('change', function() {
                console.log("Hello");
                const buyerDate = new Date($(this).val());
                const exFactoryDate = new Date(buyerDate);
                exFactoryDate.setDate(exFactoryDate.getDate() - 14); // Subtract 14 days

                const exFactoryDateFormatted = exFactoryDate.toISOString().split('T')[
                    0]; // Convert date to YYYY-MM-DD format
                $('#ex_factory_date').val(exFactoryDateFormatted);
                updateDifferenceNote();
            });


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

            // Add event listener to the "Vendor Price" input to update the Vendor Price and Vendor Price Difference note
            // $('#vendor_price').on('input', function() {
            //     updateVendorPriceAndDifference();
            // });


            $('.nav-tabs a').click(function(e) {
                e.preventDefault();
                $(this).tab('show');
            });

            // Other form logic and event handlers

            // Hide the populated data tab initially
            $('#data-tab').hide();

            // Handle form submission via AJAX
            $('#upload-pdf-form').on('submit', function(event) {
                event.preventDefault();
                const formData = new FormData(this);

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {


                        if ($('#select_buyer_upload').val() === '1') {
                            console.log(response);

                            // disable fields
                            $('#select_buyer, #select_vendor').addClass(
                                'select-readonly');


                            const data = JSON.parse(response);


                            // Use moment to parse the input date
                            const dateObject = moment(data.keys['Earliest Ship Date'],
                                "DD-MMM-YYYY");

                            const approvedDateObject = moment(data.keys['PO Approval Date'],
                                "DD-MMM-YYYY");

                            // Use moment to format the date in "MM/DD/YYYY" format
                            const formattedDate = dateObject.format("yyyy-MM-DD");

                            const formattedApprovedDate = approvedDateObject.format(
                                "yyyy-MM-DD");

                            const poNo = data.keys['WW PO No'];
                            const price = data.data[0]["Supplier Foreign \nCost Price"];
                            const supplierNo = data.keys['Supplier No'];
                            const supplierName = data.keys['Supplier Name'];

                            const currency = data.keys['Currency'];
                            const terms = data.keys['Payment Method'].match(/\b(\w)/g).join(
                                "") + " " + '@' + " " + /@ (\S+)/.exec(data
                                .keys[
                                    'Terms'])[1];
                            const poDepartment = data.keys['Department'];
                            const shipMode = data.keys['Ship Method'];

                            const targetText = data.keys['Department'];;

                            // Find the option with the specified text
                            const optionToSelect = $('#department option').filter(function() {
                                return $(this).text().trim() === targetText;
                            });

                            // Check if the option was found
                            if (optionToSelect.length > 0) {
                                // Set the "selected" attribute to true for the found option
                                optionToSelect.prop('selected', true);
                            } else {
                                console.log('Option not found.');
                            }



                            // Update the form fields with the extracted data
                            $('#ww_po_no').val(poNo);
                            $('#buyer_price').val(price);
                            $('#supplier_no').val(supplierNo);
                            $('#supplier_name').val(supplierName);
                            $('#currency').val(currency);
                            $('#early-buyer-date').val(formattedDate);
                            $('#payment_terms').val(terms);
                            $('#ship_mode').val(shipMode);
                            if (data.keys['hanger'] === 'Not Found') {
                                accessPrice.value = 0;

                            } else {
                                accessPrice.value = data.keys['hanger'];
                            }

                            $('#approval_date').val(formattedApprovedDate)
                            $('#plm').val(data.data[0][
                                'Vendor \nProduct No. / \nRef. Item No.'
                            ])

                            //$('#description').val(data.data[0]['Item Description'])

                            // var initialValue = data.data[0]['Item Description'];
                            // var modifiedValue = initialValue.replace(/: INDIGO : 2$/, '');
                            // $('#description').val(modifiedValue);

                            // Assuming the initial value is "KNIT DENIM SHORT: INDIGO : 2"

                            var initialValue = data.data[0]['Item Description'];
                            var modifiedValue = initialValue.split(':')[0].trim();
                            $('#description').val(modifiedValue);



                            let accessPriceValue = parseFloat($('#access_price')
                                .val());



                            // ex factory date
                            const buyerDate = new Date($('#early-buyer-date').val());
                            const exFactoryDate = new Date(buyerDate);
                            exFactoryDate.setDate(exFactoryDate.getDate() -
                                14); // Subtract 14 days

                            const exFactoryDateFormatted = exFactoryDate.toISOString().split(
                                'T')[
                                0]; // Convert date to YYYY-MM-DD format
                            $('#ex_factory_date').val(exFactoryDateFormatted);
                            updateVendorPriceAndDifference();

                            updateDifferenceNote();

                            const vendorPriceInput = $('#vendor_price').val().trim();

                            if (!isNaN(vendorPriceInput)) {
                                const vendorPrice = parseFloat(vendorPriceInput);
                                const calculatedPrice = (vendorPrice + accessPriceValue)
                                    .toFixed(2);
                                const styleNote =
                                    `Price: ${vendorPrice} + ${accessPriceValue} = ${calculatedPrice}`;
                                $('#style_note').val(styleNote);
                            } else {
                                // Handle the case where vendorPriceInput is not a valid number
                                alert(
                                    'Please enter a valid numerical value in the FOB INV field.'
                                );
                            }

                            // table work
                            $('#item-table-body').empty()

                            const tbody = $('#item-table-body');

                            // Iterate through the data and create rows
                            console.log(accessPriceValue);
                            data.data.forEach((item, index) => {
                                const newRow = `
                                    <tr>
                                        <td>${index+1}</td>

                                        <td><input type="text" name="items[${index}][plm]" value="${$('#plm').val()}"></td>
                                        <td><input type="text" name="items[${index}][style_no]" value="${item["TLevel1 Item"]}"></td>
                                        <td><input type="text" name="items[${index}][colour]" value="${item["Diff 1 Name"]}"></td>
                                        <td><input type="text" name="items[${index}][item_no]" value="${item["Item No."]}"></td>
                                        <td><input type="text" name="items[${index}][size]" value="${item["Item Description"].match(/\d+/)}"></td>
                                        <td><input oninput="updateValue(${index})" id="qty_ordered${index}" type="text" name="items[${index}][qty_ordered]" value="${item["Qty Ordered"]}"></td>
                                        <td><input type="text" name="items[${index}][inner_qty]" value="${item["Inner \nQty"]}"></td>
                                        <td><input type="text" name="items[${index}][outer_case_qty]" value="${item["Outer Case \nQty"]}"></td>
                                        <td><input oninput="updateValue(${index})" id="supplier_price${index}"  type="text" class="supplier_price" name="items[${index}][supplier_price]" value="${((parseFloat($('#vendor_price').val())+accessPriceValue).toFixed(2)).toString()}"></td>

                                        <td><input id="value${index}" type="text" class="total_price" name="items[${index}][value]" value="${((parseFloat($('#vendor_price').val())+accessPriceValue) * parseFloat(item["Qty Ordered"])).toFixed(2)}"></td>
                                        <td><input type="text" name="items[${index}][selling_price]" value="${item["Selling Price"]}"></td>
                                    </tr>
                                `;
                                tbody.append(newRow);
                            });




                            const valueInputs = document.querySelectorAll(
                                '.supplier_price');

                            const totalInputs = document.querySelectorAll(
                                '.total_price');

                            console.log(valueInputs);


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

                            document.getElementById('vendor_price').addEventListener("change",
                                function() {

                                    updateVendorPriceAndDifference()
                                    // Get the new value entered in the changed input field



                                    let newAccessPrice = parseFloat($('#access_price')
                                        .val());

                                    let newVendorPrice = parseFloat($('#vendor_price')
                                        .val()).toFixed(2);



                                    const newStyleNote = 'Price: ' + (parseFloat($(
                                                '#vendor_price')
                                            .val())) +
                                        " " + "+" + " " + newAccessPrice + ' ' + '=' +
                                        " " + (parseFloat(parseFloat($('#vendor_price')
                                                .val()) +
                                            newAccessPrice).toFixed(2))

                                    $('#style_note').val(newStyleNote);

                                    Array.prototype.forEach.call(valueInputs, function(
                                        input, index) {
                                        let newFinalPrice = parseFloat(parseFloat($(
                                                '#vendor_price').val()) +
                                            newAccessPrice).toFixed(2)

                                        input.value = newFinalPrice
                                    });

                                    data.data.forEach((item, index) => {
                                        const totalPrice = totalInputs[index];

                                        let newFinalPrice = parseFloat(parseFloat($(
                                                '#vendor_price').val()) +
                                            newAccessPrice).toFixed(2)
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

                        }

                        if ($('#select_buyer_upload').val() === '2') {

                            console.log(response);

                            $('#plm_line').text("Cat.")
                            $('#style_number_line').text('Swing Tag')
                            $('#inner_qty').text('FOB INV')
                            $('#outer_qty').text('Accessories Price')

                            // disable fields
                            $('#select_buyer, #select_vendor').addClass(
                                'select-readonly');


                            const data = JSON.parse(response);

                            // Use moment to parse the input date
                            const dateObject = moment(data.keys['Ship From Date'],
                                "DD-MM-YYYY");

                            const approvedDateObject = moment(data.keys[
                                'Originally Approved Date'], "DD-MM-YYYY")



                            document.getElementById('plm-label-form').style.display = "none";
                            $('#plm').prop('required', false);
                            $('#plm').prop('type', 'hidden');

                            $('#access_price').val('0')



                            // Use moment to format the date in "MM/DD/YYYY" format
                            const formattedDate = dateObject.format("yyyy-MM-DD");

                            const formattedApprovedDate = approvedDateObject.format(
                                "yyyy-MM-DD");

                            const poNo = data.keys['Order No'];
                            // const price = data.data[0]["Supplier Foreign \nCost Price"];
                            const supplierNo = data.keys['Supplier'];;
                            const supplierName = data.keys['Supplier Name'];

                            const currency = data.keys['Currency'];
                            const terms = data.keys['Payment Terms'].match(
                                /^(\w)\w+\s+(\w)\w+\s+at\s+(\w)/i)[1] + data.keys[
                                'Payment Terms'].match(/^(\w)\w+\s+(\w)\w+\s+at\s+(\w)/i)[
                                2] + '@' + data.keys['Payment Terms'].match(/at\s+(\w+)/i)[
                                1];

                            // const shipMode = data.keys['Ship Method'];


                            // Update the form fields with the extracted data
                            $('#ww_po_no').val(poNo);
                            // $('#buyer_price').val(price);
                            $('#supplier_no').val(supplierNo);
                            $('#supplier_name').val(supplierName.replace('MRP', ''));
                            $('#currency').val(currency.match(/^(\w+)\s+(\w+)/i)[1] + " " +
                                currency.match(/^(\w+)\s+(\w+)/i)[2]);
                            $('#early-buyer-date').val(formattedDate);
                            $('#payment_terms').val(terms);
                            $('#ship_mode').val('Sea');
                            $('#buyer_price').val(data.inner_table[0]['Cost (Incl VAT)']);
                            $('#approval_date').val(formattedApprovedDate)
                            $('#description').val(data.outer_table['Description'])

                            // ex factory date
                            const buyerDate = new Date($('#early-buyer-date').val());
                            const exFactoryDate = new Date(buyerDate);
                            exFactoryDate.setDate(exFactoryDate.getDate() -
                                14); // Subtract 14 days

                            const exFactoryDateFormatted = exFactoryDate.toISOString().split(
                                'T')[
                                0]; // Convert date to YYYY-MM-DD format
                            $('#ex_factory_date').val(exFactoryDateFormatted);

                            updateVendorPriceAndDifferenceMRP();

                            updateDifferenceNote();

                            let accessPriceValue = parseFloat($('#access_price')
                                .val());

                            const styleNote = 'Price: ' + (parseFloat($('#vendor_price')
                                    .val())) +
                                " " + "+" + " " + accessPriceValue + ' ' + '=' +
                                " " + ((parseFloat($('#vendor_price')
                                    .val()) + accessPriceValue).toFixed(2)).toString()

                            $('#style_note').val(parseFloat($('#vendor_price')
                                .val()) + accessPriceValue);

                            document.getElementById('style_note').addEventListener('change',
                                function() {
                                    let newAccessPrice = parseFloat(parseFloat($(
                                            '#style_note')
                                        .val()) - parseFloat($('#vendor_price')
                                        .val())).toFixed(2);

                                    $('#access_price').val(newAccessPrice)
                                    // const newStyleNote = 'Price: ' + (parseFloat($(
                                    //             '#vendor_price')
                                    //         .val())).toString() +
                                    //     " " + "+" + " " + newAccessPrice.toString() + ' ' +
                                    //     '=' +
                                    //     " " + ((parseFloat($('#vendor_price').val()) +
                                    //         newAccessPrice).toFixed(2)).toString()

                                    // $('#style_note').val((parseFloat($(
                                    //         '#vendor_price')
                                    //     .val()) + newAccessPrice).toFixed(2));

                                    Array.prototype.forEach.call(vendorPriceInputs,
                                        function(input, index) {
                                            input.value = $('#vendor_price').val()
                                        })

                                    Array.prototype.forEach.call(accessoriesInputs,
                                        function(input, index) {
                                            input.value = newAccessPrice
                                        })

                                    Array.prototype.forEach.call(valueInputs, function(
                                        input, index) {
                                        let newFinalPrice = (parseFloat($(
                                                '#vendor_price').val()) +
                                            parseFloat(newAccessPrice))

                                        input.value = newFinalPrice
                                    });

                                    data.inner_table.forEach((item, index) => {
                                        const totalPrice = totalInputs[index];

                                        let newFinalPrice = (parseFloat($(
                                                '#vendor_price').val()) +
                                            parseFloat(newAccessPrice))
                                        let newFinalTotalPrice = parseFloat(
                                            newFinalPrice *
                                            parseFloat(item[
                                                "Qty"])).toFixed(2)

                                        console.log(parseFloat($(
                                            '#vendor_price').val()));

                                        console.log(newFinalPrice);

                                        console.log(parseFloat(item[
                                            "Qty"]));

                                        totalPrice.value = newFinalTotalPrice
                                    })

                                    Array.prototype.forEach.call(totalInputs, function(
                                        input, index) {

                                    });
                                })
                            // price update
                            // $('#buyer_price').on('change', function() {
                            //     updateVendorPriceAndDifference();
                            //     // const accessPriceValue = parseFloat($('#access_price')

                            //     const styleNote = 'Price: ' + (parseFloat($(
                            //                 '#vendor_price')
                            //             .val())).toString() +
                            //         " " + "+" + " " + parseFloat($('#access_price')
                            //             .val()).toString() + ' ' + '=' +
                            //         " " + (parseFloat($('#vendor_price')
                            //             .val()) + parseFloat($('#access_price')
                            //             .val())).toString()

                            //     $('#style_note').val(styleNote);
                            // })

                            $('#item-table-body').empty()

                            const tbody = $('#item-table-body');

                            console.log(accessPriceValue);

                            data.inner_table.forEach((item, index) => {
                                const newRow = `
                                    <tr>
                                        <td>${index+1}</td>
                                        <td><input type="text" name="items[${index}][plm]" value="${data.outer_table['Category']}"></td>
                                        <td><input type="text" name="items[${index}][style_no]" value="${data.outer_table['Swing Tag']}"></td>
                                        <td><input type="text" name="items[${index}][colour]" value="${data.outer_table['Colour']}"></td>
                                        <td><input type="text" name="items[${index}][item_no]" value="${data.outer_table['Item']}"></td>
                                        <td><input type="text" name="items[${index}][size]" value="${item["Size"]}"></td>
                                        <td><input  oninput="updateValue(${index})" id="qty_ordered${index}"  type="text" name="items[${index}][qty_ordered]" value="${item["Qty"]}"></td>
                                        <td><input type="text" class="vendor-price" name="items[${index}][inner_qty]" value="${$('#vendor_price').val()}"></td>
                                        <td><input type="text" class="outer_qty" name="items[${index}][outer_case_qty]" value="${accessPriceValue}"></td>
                                        <td><input  oninput="updateValue(${index})" id="supplier_price${index}"   type="text" class="supplier_price" name="items[${index}][supplier_price]" value="${((parseFloat($('#vendor_price')
                                    .val()) + accessPriceValue).toFixed(2)).toString()}"></td>

                                        <td><input  id="value${index}"  type="text" class="total_price" name="items[${index}][value]" value="${((parseFloat($('#vendor_price').val())+accessPriceValue) * parseFloat(item["Qty"])).toFixed(2)}"></td>
                                        <td><input type="text" name="items[${index}][selling_price]" value="${item["Selling Price"]}"></td>
                                    </tr>
                                `;
                                tbody.append(newRow);


                            });

                            const valueInputs = document.querySelectorAll(
                                '.supplier_price');

                            const vendorPriceInputs = document.querySelectorAll(
                                '.vendor-price');

                            const accessoriesInputs = document.querySelectorAll(
                                '.outer_qty');

                            const totalInputs = document.querySelectorAll(
                                '.total_price');

                            console.log(valueInputs);




                            accessPrice.addEventListener("change", function() {
                                // Get the new value entered in the changed input field

                                let newAccessPrice = parseFloat($('#access_price')
                                    .val());

                                const newStyleNote = 'Price: ' + (parseFloat($(
                                            '#vendor_price')
                                        .val())).toString() +
                                    " " + "+" + " " + newAccessPrice.toString() + ' ' +
                                    '=' +
                                    " " + ((parseFloat($('#vendor_price').val()) +
                                        parseFloat(newAccessPrice)).toFixed(2))
                                    .toString()

                                $('#style_note').val((parseFloat($(
                                            '#vendor_price')
                                        .val()) + parseFloat(newAccessPrice))
                                    .toFixed(2));

                                Array.prototype.forEach.call(vendorPriceInputs,
                                    function(input, index) {
                                        input.value = $('#vendor_price').val()
                                    })

                                Array.prototype.forEach.call(accessoriesInputs,
                                    function(input, index) {
                                        input.value = newAccessPrice
                                    })

                                Array.prototype.forEach.call(valueInputs, function(
                                    input, index) {
                                    let newFinalPrice = parseFloat(parseFloat($(
                                            '#vendor_price').val()) +
                                        parseFloat(newAccessPrice)).toFixed(
                                        2)

                                    input.value = newFinalPrice
                                });

                                data.inner_table.forEach((item, index) => {
                                    const totalPrice = totalInputs[index];

                                    let newFinalPrice = (parseFloat($(
                                            '#vendor_price').val()) +
                                        parseFloat(newAccessPrice))
                                    let newFinalTotalPrice = parseFloat(
                                        newFinalPrice *
                                        parseFloat(item[
                                            "Qty"])).toFixed(2)

                                    console.log(parseFloat($(
                                        '#vendor_price').val()));

                                    console.log(newFinalPrice);

                                    console.log(parseFloat(item[
                                        "Qty"]));

                                    totalPrice.value = newFinalTotalPrice
                                })

                                Array.prototype.forEach.call(totalInputs, function(
                                    input, index) {

                                });
                            });

                            document.getElementById('vendor_price').addEventListener("change",
                                function() {
                                    // Get the new value entered in the changed input field
                                    updateVendorPriceAndDifference()
                                    let newAccessPrice = parseFloat($('#access_price')
                                        .val());

                                    const newStyleNote = 'Price: ' + (parseFloat($(
                                                '#vendor_price')
                                            .val())).toString() +
                                        " " + "+" + " " + newAccessPrice.toString() + ' ' +
                                        '=' +
                                        " " + ((parseFloat($('#vendor_price').val()) +
                                            newAccessPrice).toFixed(2)).toString()

                                    $('#style_note').val((parseFloat($('#vendor_price')
                                            .val()) +
                                        parseFloat(newAccessPrice)).toFixed(2));

                                    Array.prototype.forEach.call(vendorPriceInputs,
                                        function(input, index) {
                                            input.value = $('#vendor_price').val()
                                        })

                                    Array.prototype.forEach.call(accessoriesInputs,
                                        function(input, index) {
                                            input.value = newAccessPrice
                                        })

                                    Array.prototype.forEach.call(valueInputs, function(
                                        input, index) {
                                        let newFinalPrice = ((parseFloat($(
                                                        '#vendor_price').val()) +
                                                    parseFloat(newAccessPrice))
                                                .toFixed(2))
                                            .toString()

                                        input.value = newFinalPrice
                                    });

                                    data.inner_table.forEach((item, index) => {
                                        const totalPrice = totalInputs[index];

                                        let newFinalPrice = (parseFloat($(
                                                '#vendor_price').val()) +
                                            parseFloat(newAccessPrice))
                                        let newFinalTotalPrice = parseFloat(
                                            newFinalPrice *
                                            parseFloat(item[
                                                "Qty"])).toFixed(2)

                                        console.log(parseFloat($(
                                            '#vendor_price').val()));

                                        console.log(newFinalPrice);

                                        console.log(parseFloat(item[
                                            "Qty"]));

                                        totalPrice.value = newFinalTotalPrice
                                    })

                                    Array.prototype.forEach.call(totalInputs, function(
                                        input, index) {

                                    });
                                });



                        }

                        if ($('#select_buyer_upload').val() === '3') {

                            console.log(response);
                            $('#supplier_no').val('3754')

                            $('#plm_line').text("Brand")

                            $('#style_number_line').text('Style Number')
                            $('#inner_qty').text('No Of Cartons')
                            $('#outer_qty').text('Units Per Carton')

                            // disable fields
                            $('#select_buyer, #select_vendor').addClass(
                                'select-readonly');


                            const data = JSON.parse(response);

                            // Use moment to parse the input date
                            const dateObject = moment(data.keys['Book by'].replace(/ /g, '-'),
                                "DD-MMM-YYYY");

                            const approvedDateObject = moment(data.keys[
                                'Date Ordered'].replace(/ /g, '-'), "DD-MMM-YYYY")



                            document.getElementById('plm-label-form').style.display = "none";
                            $('#plm').prop('required', false);
                            $('#plm').prop('type', 'hidden');

                            $('#access_price').val('0.15')



                            // Use moment to format the date in "MM/DD/YYYY" format
                            const formattedDate = dateObject.format("yyyy-MM-DD");

                            const formattedApprovedDate = approvedDateObject.format(
                                "yyyy-MM-DD");

                            const poNo = data.keys['Confirmation Report for'];
                            // const price = data.data[0]["Supplier Foreign \nCost Price"];
                            // const supplierNo = data.keys['Supplier'];
                            // const supplierName = data.keys['Supplier Name'];

                            const currency = 'USD';
                            // const terms = data.keys['Payment Terms'].match(
                            //     /^(\w)\w+\s+(\w)\w+\s+at\s+(\w)/i)[1] + data.keys[
                            //     'Payment Terms'].match(/^(\w)\w+\s+(\w)\w+\s+at\s+(\w)/i)[
                            //     2] + '@' + data.keys['Payment Terms'].match(/at\s+(\w+)/i)[
                            //     1];

                            // const shipMode = data.keys['Ship Method'];


                            // Update the form fields with the extracted data
                            $('#ww_po_no').val(poNo);
                            // $('#buyer_price').val(price);
                            // $('#supplier_no').val(supplierNo);
                            $('#supplier_name').val('CREATION LOYAL HONG KONG');
                            // $('#currency').val(currency.match(/^(\w+)\s+(\w+)/i)[1] + " " +
                            //     currency.match(/^(\w+)\s+(\w+)/i)[2]);
                            $('#currency').val(currency);
                            $('#early-buyer-date').val(formattedDate);
                            $('#payment_terms').val(data.keys['Incoterm']);
                            $('#ship_mode').val('Sea');
                            $('#buyer_price').val(data.tables['size_summery'][0]['Cost (USD)']);
                            $('#approval_date').val(formattedApprovedDate)
                            $('#description').val(data.keys['Style Short Desc'])

                            // ex factory date
                            const buyerDate = new Date($('#early-buyer-date').val());
                            const exFactoryDate = new Date(buyerDate);
                            exFactoryDate.setDate(exFactoryDate.getDate() -
                                14); // Subtract 14 days

                            const exFactoryDateFormatted = exFactoryDate.toISOString().split(
                                'T')[
                                0]; // Convert date to YYYY-MM-DD format
                            $('#ex_factory_date').val(exFactoryDateFormatted);

                            updateVendorPriceAndDifference();

                            updateDifferenceNote();

                            let accessPriceValue = parseFloat($('#access_price')
                                .val());

                            const styleNote = 'Price: ' + (parseFloat($('#vendor_price')
                                    .val())) +
                                " " + "+" + " " + accessPriceValue + ' ' + '=' +
                                " " + ((parseFloat($('#vendor_price')
                                    .val()) + accessPriceValue).toFixed(2)).toString()

                            $('#style_note').val(styleNote);
                            // price update
                            // $('#buyer_price').on('change', function() {
                            //     updateVendorPriceAndDifference();
                            //     // const accessPriceValue = parseFloat($('#access_price')

                            //     const styleNote = 'Price: ' + (parseFloat($(
                            //                 '#vendor_price')
                            //             .val())).toString() +
                            //         " " + "+" + " " + parseFloat($('#access_price')
                            //             .val()).toString() + ' ' + '=' +
                            //         " " + (parseFloat($('#vendor_price')
                            //             .val()) + parseFloat($('#access_price')
                            //             .val())).toString()

                            //     $('#style_note').val(styleNote);
                            // })

                            $('#item-table-body').empty()

                            const tbody = $('#item-table-body');

                            console.log(accessPriceValue);

                            data.tables['size_summery'].forEach((item, index) => {
                                const newRow = `
                                                <tr>
                                                    <td>${index+1}</td>
                                                    <td><input type="text" name="items[${index}][plm]" value=""></td>
                                                    <td><input type="text" name="items[${index}][style_no]" value=""></td>
                                                    <td><input type="text" name="items[${index}][colour]" value="${item['Colour']}"></td>
                                                    <td><input type="text" name="items[${index}][item_no]" value="${item['Sku']}"></td>
                                                    <td><input type="text" name="items[${index}][size]" value="${item["Size"]}"></td>
                                                    <td><input  oninput="updateValue(${index})" id="qty_ordered${index}"  type="text" name="items[${index}][qty_ordered]" value="${item["Quantity"]}"></td>
                                                    <td><input type="text" class="vendor-price" name="items[${index}][inner_qty]" value="${data['tables']['carton_summery'][index]['Carton']}"></td>
                                                    <td><input type="text" class="outer_qty" name="items[${index}][outer_case_qty]" value="${data['tables']['carton_summery'][index]['Cartons']}"></td>
                                                    <td><input  oninput="updateValue(${index})" id="supplier_price${index}"   type="text" class="supplier_price" name="items[${index}][supplier_price]" value="${((parseFloat($('#vendor_price')
                                                .val()) + accessPriceValue).toFixed(2)).toString()}"></td>

                                                    <td><input  id="value${index}"  type="text" class="total_price" name="items[${index}][value]" value="${((parseFloat($('#vendor_price').val())+accessPriceValue) * parseFloat(item["Quantity"])).toFixed(2)}"></td>
                                                    <td><input type="text" name="items[${index}][selling_price]" value="${item["RSP Price"]}"></td>
                                                </tr>
                                            `;
                                tbody.append(newRow);


                            });

                            const valueInputs = document.querySelectorAll(
                                '.supplier_price');

                            const vendorPriceInputs = document.querySelectorAll(
                                '.vendor-price');

                            const accessoriesInputs = document.querySelectorAll(
                                '.outer_qty');

                            const totalInputs = document.querySelectorAll(
                                '.total_price');

                            console.log(valueInputs);




                            accessPrice.addEventListener("change", function() {
                                // Get the new value entered in the changed input field

                                let newAccessPrice = parseFloat($('#access_price')
                                    .val());

                                const newStyleNote = 'Price: ' + (parseFloat($(
                                            '#vendor_price')
                                        .val())).toString() +
                                    " " + "+" + " " + newAccessPrice.toString() + ' ' +
                                    '=' +
                                    " " + ((parseFloat($('#vendor_price').val()) +
                                        newAccessPrice).toFixed(2)).toString()

                                $('#style_note').val(newStyleNote);

                                Array.prototype.forEach.call(vendorPriceInputs,
                                    function(input, index) {
                                        input.value = $('#vendor_price').val()
                                    })

                                // Array.prototype.forEach.call(accessoriesInputs,
                                //     function(input, index) {
                                //         input.value = newAccessPrice
                                //     })

                                Array.prototype.forEach.call(valueInputs, function(
                                    input, index) {
                                    let newFinalPrice = (parseFloat($(
                                            '#vendor_price').val()) +
                                        newAccessPrice).toString()

                                    input.value = newFinalPrice
                                });

                                data.tables['size_summery'].forEach((item, index) => {
                                    const totalPrice = totalInputs[index];

                                    let newFinalPrice = (parseFloat($(
                                            '#vendor_price').val()) +
                                        newAccessPrice)
                                    let newFinalTotalPrice = newFinalPrice *
                                        parseFloat(item[
                                            "Quantity"])

                                    console.log(parseFloat($(
                                        '#vendor_price').val()));

                                    console.log(newFinalPrice);

                                    console.log(parseFloat(item[
                                        "Quantity"]));

                                    totalPrice.value = newFinalTotalPrice
                                })

                                Array.prototype.forEach.call(totalInputs, function(
                                    input, index) {

                                });
                            });

                            document.getElementById('vendor_price').addEventListener("change",
                                function() {
                                    // Get the new value entered in the changed input field
                                    updateVendorPriceAndDifference()
                                    let newAccessPrice = parseFloat($('#access_price')
                                        .val());

                                    const newStyleNote = 'Price: ' + (parseFloat($(
                                                '#vendor_price')
                                            .val())).toString() +
                                        " " + "+" + " " + newAccessPrice.toString() + ' ' +
                                        '=' +
                                        " " + ((parseFloat($('#vendor_price').val()) +
                                            newAccessPrice).toFixed(2)).toString()

                                    $('#style_note').val(newStyleNote);

                                    // Array.prototype.forEach.call(vendorPriceInputs,
                                    //     function(input, index) {
                                    //         input.value = $('#vendor_price').val()
                                    //     })

                                    // Array.prototype.forEach.call(accessoriesInputs,
                                    //     function(input, index) {
                                    //         input.value = newAccessPrice
                                    //     })

                                    Array.prototype.forEach.call(valueInputs, function(
                                        input, index) {
                                        let newFinalPrice = ((parseFloat($(
                                                    '#vendor_price').val()) +
                                                newAccessPrice).toFixed(2))
                                            .toString()

                                        input.value = newFinalPrice
                                    });

                                    data.tables['size_summery'].forEach((item, index) => {
                                        const totalPrice = totalInputs[index];

                                        let newFinalPrice = (parseFloat($(
                                                '#vendor_price').val()) +
                                            newAccessPrice)
                                        let newFinalTotalPrice = newFinalPrice *
                                            parseFloat(item[
                                                "Quantity"])

                                        console.log(parseFloat($(
                                            '#vendor_price').val()));

                                        console.log(newFinalPrice);

                                        console.log(parseFloat(item[
                                            "Quantity"]));

                                        totalPrice.value = newFinalTotalPrice
                                    })

                                    Array.prototype.forEach.call(totalInputs, function(
                                        input, index) {

                                    });
                                });


                        }



                    },
                    error: function(xhr, status, error) {
                        console.error('Error uploading PDF:', error);
                    },
                    complete: function() {
                        // Re-enable the submit button when the AJAX request is completed (either success or error)
                        $('#extract-text-btn').prop('disabled', false);
                        $('.spinner-border').hide();
                        $('#upload-tab').hide();
                        $('#data-tab').show();
                    }


                });
            });





        });
        // document.addEventListener('DOMContentLoaded', function() {
        //     fetch('{{ url('/departments') }}')
        //         .then(response => response.json())
        //         .then(data => {
        //             const departmentSelect = document.getElementById('department');
        //             data.forEach(department => {
        //                 const option = document.createElement('option');
        //                 option.value = department.id; // Adjust if you use a different unique field
        //                 option.textContent = department.name; // Adjust if you use a different display field
        //                 departmentSelect.appendChild(option);
        //             });
        //         })
        //         .catch(error => console.error('Error fetching departments:', error));
        // });
    </script>
@endsection
