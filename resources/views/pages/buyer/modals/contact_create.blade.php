<!-- Modal -->
<div class="modal fade" id="create-contact" tabindex="-1" role="dialog" aria-labelledby="ceate-contact" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Create contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('save-buyer_contact') }}" method="POST" id="contact-create-form"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control form-control-sm" id="name" name="name"
                            placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control form-control-sm" id="email" name="email"
                            placeholder="Enter Email">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control form-control-sm" id="phone" name="phone"
                            placeholder="Enter Phone">
                    </div>
                    <div class="form-group">
                        <label for="name">Profile Image</label>
                        <input type="file" class="form-control form-control-sm" id="profile_image" name="profile_image"
                            placeholder="Upload Image">
                    </div>
                    <div class="form-group">
                        <label for="department">Department</label>
                        <input type="text" class="form-control form-control-sm" id="department" name="department"
                            placeholder="Enter Department">
                    </div>
                    <div class="form-group">
                        <label for="designation">Designation</label>
                        <input type="text" class="form-control form-control-sm" id="designation" name="designation"
                            placeholder="Enter Designation">
                    </div>
                    {{-- <div class="form-group">
                        <label for="logo">Logo</label>
                        <input type="file" class="file-input" id="logo" name="logo">
                    </div> --}}
                    <div class="form-group">
                        <label for="buyer">Buyer</label>
                        <select name="buyer" id="buyer" class="form-control form-control-sm">
                            <option value="">Select Buyer</option>
                            @foreach ($buyers as $buyer)
                                <option value="{{ $buyer->id }}">{{ $buyer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="buyer-department">Depertment</label>
                        <select name="buyer-department" id="buyer-department" class="form-control form-control-sm">
                            <option value="">Select Department</option>
                            {{-- @foreach ($maufacturers as $maufacturer)
                                <option value="{{ $maufacturer->id }}">{{ $maufacturer->name }}</option>
                            @endforeach --}}
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
