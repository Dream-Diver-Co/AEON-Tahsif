<!-- Modal -->
<div class="modal fade" id="{{'edit-department-'.$department->id}}" tabindex="-1" role="dialog" aria-labelledby="ceate-department" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Create Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('update-department', ['id' => $department->id]) }}" method="POST" id="department-edit-form"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Department Name</label>
                        <input type="text" class="form-control form-control-sm" id="name" name="name"
                            placeholder="Enter Name" value="{{ $department->name }}">
                    </div>
                    {{-- <div class="form-group">
                        <label for="logo">Logo</label>
                        <input type="file" class="file-input" id="logo" name="logo">
                    </div> --}}
                    <div class="form-group">
                        <label for="buyer">Buyer</label>
                        <select name="buyer" id="Buyer" class="form-control form-control-sm">
                            <option value="">Select Buyer</option>
                            @foreach ($buyers as $buyer)
                                <option value="{{ $buyer->id }}" {{ $department->buyer_id == $buyer->id ? 'selected' : '' }}>{{ $buyer->name }}</option>
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
