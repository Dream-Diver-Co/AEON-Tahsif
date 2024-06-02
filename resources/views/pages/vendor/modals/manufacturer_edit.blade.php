<!-- Modal -->
<div class="modal fade" id="{{ 'edit-manufacturer-' . $manufacturer->id }}" tabindex="-1" role="dialog"
    aria-labelledby="ceate-manufacturer" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Create Manufacturer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('update-manufacturer', ['id' => $manufacturer->id]) }}" method="POST"
                    id="manufacturer-edit-form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Manufacturer Name</label>
                        <input type="text" class="form-control form-control-sm" id="name" name="name"
                            placeholder="Enter Name" value="{{ $manufacturer->name }}">
                    </div>
                    {{-- <div class="form-group">
                        <label for="logo">Logo</label>
                        <input type="file" class="file-input" id="logo" name="logo">
                    </div> --}}
                    <div class="form-group">
                        <label for="vendor">Vendor</label>
                        <select name="vendor" id="Buyer" class="form-control form-control-sm">
                            <option value="">Select Vendor</option>
                            @foreach ($vendors as $vendor)
                                <option value="{{ $vendor->id }}"
                                    {{ $manufacturer->vendor_id == $vendor->id ? 'selected' : '' }}>{{ $vendor->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
