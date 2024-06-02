<!-- Modal -->
<div class="modal fade" id="{{ 'edit-vendor-' . $vendor->id }}" tabindex="-1" role="dialog" aria-labelledby="edit-vendor"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Edit Vendor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('update-vendor', ['id' => $vendor->id]) }}" method="POST"
                    id="vendor-create-form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Vendor Name</label>
                        <input type="text" class="form-control form-control-sm" id="name" name="name"
                            placeholder="Enter Name" value="{{ $vendor->name }}">
                    </div>

                    <div class="form-group">
                        <label for="name">Vendor Email</label>
                        <input type="text" class="form-control form-control-sm" id="email" name="email"
                            placeholder="Enter Email" value="{{ $vendor->email }}">
                    </div>
                    {{-- <div class="form-group">
                        <label for="logo">Logo</label>
                        <input type="file" class="file-input" id="edit-logo" name="logo"
                            onchange="previewLogo(event, 'edit-logo', 'logo-preview')">
                        <img src="{{ asset($buyer->logo) }}" alt="Buyer Logo" style="width: 100px; border-radius: 5px"
                            id="logo-preview">
                    </div> --}}
                    <div class="form-group">
                        <label for="edit-logo">Logo</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="edit-logo" name="logo"
                                onchange="previewLogo(event, 'edit-logo', 'logo-preview')">
                            <label class="custom-file-label" for="edit-logo" id="edit-logo-label">Select a file</label>
                        </div>
                        <img src="{{ asset($vendor->logo) }}" alt="Buyer Logo" class="mt-3"
                            style="width: 100px; border-radius: 5px;" id="logo-preview">
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
