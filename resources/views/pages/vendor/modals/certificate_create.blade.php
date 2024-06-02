
<!-- Modal -->
<div class="modal fade" id="manufacturer-certificate" tabindex="-1" role="dialog" aria-labelledby="ceate-contact" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Create Certificate</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('manufacturer-certificate-store') }}" method="POST" id="contact-create-form"
                    enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group">
                        <label for="maufacturer">Manufacturer</label>
                        <select name="maufacturer_id" id="maufacturer" class="form-control form-control-sm" required>
                            <option value="">Select Maufacturer</option>
                            @foreach ($manufacturers as $maufacturer)
                                <option value="{{ $maufacturer->id }}">{{ $maufacturer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Certicicate Name</label>
                        <input type="text" class="form-control form-control-sm" id="name" name="certicicate_name"
                            placeholder="Enter Name">
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="phone">Certificate Image</label>
                        <input type="file" class="form-control form-control-sm" id="certificate_image" name="certificate_image"
                            placeholder="Upload Image">
                    </div>
                    
                
                    
                    <div class="form-group">
                        <label for="designation">Issue Date</label>
                        <input type="date" class="form-control form-control-sm" id="designation" name="issue_date"
                            placeholder="Enter Designation">
                    </div>
                    <div class="form-group">
                        <label for="designation">Valid From</label>
                        <input type="date" class="form-control form-control-sm" id="designation" name="valid_from"
                            placeholder="Enter Designation">
                    </div>
                    <div class="form-group">
                        <label for="designation">Valid To</label>
                        <input type="date" class="form-control form-control-sm" id="designation" name="valid_to"
                            placeholder="Enter Designation">
                    </div>
                    <div class="form-group">
                        <label for="phone">PDF File</label>
                        <input type="file" class="form-control form-control-sm" id="profile_image" name="pdf_file"
                            placeholder="Upload Image">
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
