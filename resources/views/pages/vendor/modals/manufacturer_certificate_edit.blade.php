<!-- Modal -->
<div class="modal fade" id="{{ 'edit-manufacturer-' . $certificate->id }}" tabindex="-1" role="dialog"
    aria-labelledby="ceate-manufacturer" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Certificate</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('update-manufacturer-certificate', ['id' => $certificate->id]) }}" method="POST"
                    id="manufacturer-edit-form" enctype="multipart/form-data"> 
                    @csrf
                    @method('PUT')

                    @php
                        $certificate = App\Models\Certificate::find($certificate->id);
                        $manufacturer_name = $certificate->manufacturer->name;

                    @endphp

                    <div class="form-group">
                        <label for="maufacturer">Manufacturer</label>
                        <select name="maufacturer_id" id="maufacturer" class="form-control form-control-sm">
                            <option value="{{ $certificate->manufacturer_id }}">{{ $manufacturer_name  }}</option>
                            @foreach ($manufacturers as $maufacturer)
                                <option value="{{ $maufacturer->id }}">{{ $maufacturer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Certicicate Name</label>
                        <input type="text" class="form-control form-control-sm" id="name" name="certicicate_name"
                            placeholder="Enter Name" value="{{ $certificate->name }}">
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="phone">Certificate Image</label>
                        <span><img src="{{ asset($certificate->logo) }}" width="25"> </span>
                        <input type="file" class="form-control form-control-sm" id="certificate_image" name="certificate_image"
                            placeholder="Upload Image" value="{{ $certificate->logo }}">
                    </div>
                    
                
                    
                    <div class="form-group">
                        <label for="designation">Issue Date</label>
                        <input type="date" class="form-control form-control-sm" id="designation" name="issue_date"
                            placeholder="Enter Designation" value="{{ $certificate->issue_date }}">
                    </div>
                    <div class="form-group">
                        <label for="designation">Valid From</label>
                        <input type="date" class="form-control form-control-sm" id="designation" name="valid_from"
                            placeholder="Enter Designation" value="{{ $certificate->valid_from }}">
                    </div>
                    <div class="form-group">
                        <label for="designation">Valid To</label>
                        <input type="date" class="form-control form-control-sm" id="designation" name="valid_to"
                            placeholder="Enter Designation" value="{{ $certificate->valid_to }}">
                    </div>
                    <div class="form-group">
                        <label for="phone">PDF File</label>
                        <span>{{ $certificate->pdf_file }} </span>
                        <input type="file" class="form-control form-control-sm" id="profile_image" name="pdf_file"
                            placeholder="Upload Image" value="{{ $certificate->pdf_file }}">
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
