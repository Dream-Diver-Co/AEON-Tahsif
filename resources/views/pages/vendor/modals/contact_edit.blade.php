<!-- Modal -->
<div class="modal fade" id="{{ 'edit-contact-' . $contact->id }}" tabindex="-1" role="dialog"
    aria-labelledby="ceate-contact" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('update-vendor_contact', ['id' => $contact->id]) }}" method="POST"
                    id="contact-create-form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control form-control-sm" id="name" name="name"
                            placeholder="Enter Name" value="{{ $contact->name }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control form-control-sm" id="email" name="email"
                            placeholder="Enter Email" value="{{ $contact->email }}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control form-control-sm" id="phone" name="phone"
                            placeholder="Enter Phone" value="{{ $contact->phone }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Profile Image</label>
                        @if($contact->profile_image)
                            <img src="{{ asset($contact->profile_image) }}" alt="Profile Image" width="50" height="50">
                        @else
                            <p>No image uploaded</p>
                        @endif
                        <input type="file" class="form-control form-control-sm" id="profile_image" name="profile_image" accept="image/*">
                    </div>

                    <div class="form-group">
                        <label for="department">Department</label>
                        <input type="text" class="form-control form-control-sm" id="department" name="department"
                            placeholder="Enter Department" value="{{ $contact->department }}">
                    </div>
                    <div class="form-group">
                        <label for="designation">Designation</label>
                        <input type="text" class="form-control form-control-sm" id="designation" name="designation"
                            placeholder="Enter Designation" value="{{ $contact->designation }}">
                    </div>
                    {{-- <div class="form-group">
                        <label for="logo">Logo</label>
                        <input type="file" class="file-input" id="logo" name="logo">
                    </div> --}}
                    {{-- <div class="form-group">
                        <label for="vendor">Vendor</label>
                        <select name="vendor" id="vendor-edit" class="form-control form-control-sm">
                            <option value="">Select vendor</option>
                            <option
                                value="{{ App\Models\Manufacturer::where('id', $contact->vendor_manufacturer_id)->first()->vendor_id }}"
                                {{ $contact->vendor_manufacturer_id == App\Models\Manufacturer::where('id', $contact->vendor_manufacturer_id)->first()->id ? 'selected' : '' }}>
                                {{ App\Models\Vendor::where('id', App\Models\Manufacturer::where('id', $contact->vendor_manufacturer_id)->first()->vendor_id)->first()->name }}
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="maufacturer">Manufacturer</label>
                        <select name="maufacturer" id="maufacturer-edit" class="form-control form-control-sm">
                            <option value="">Select Maufacturer</option>
                            {{-- @foreach ($maufacturers as $maufacturer)
                                <option value="{{ $maufacturer->id }}">{{ $maufacturer->name }}</option>
                            @endforeach --}}
                    {{-- </select> --}}
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
