 <!-- Modal for adding fabric content -->
 <div class="modal fade" id="create-fabric-content" tabindex="-1" role="dialog" aria-labelledby="create-fabric-content" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Fabric Content</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="fabric-content-create-form" action="{{ route('save-fabric-content') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Fabric Content Name</label>
                        <input type="text" class="form-control form-control-sm" id="name" name="name" placeholder="Enter Name">
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