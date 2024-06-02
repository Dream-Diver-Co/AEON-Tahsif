<!-- Modal -->
<div class="modal fade" id="create-vendor" tabindex="-1" role="dialog" aria-labelledby="ceate-vendor" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Create Vendor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('save-vendor') }}" method="POST" id="vendor-create-form"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Vendor Name</label>
                        <input type="text" class="form-control form-control-sm" id="name" name="name"
                            placeholder="Enter Name">
                    </div>

                    <div class="form-group">
                        <label for="name">Vendor Email</label>
                        <input type="text" class="form-control form-control-sm" id="email" name="email"
                            placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label for="logo">Logo</label>
                        <input type="file" class="file-input" id="logo" name="logo">
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
