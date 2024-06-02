@extends('layouts.admin')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Vendor</h3>
                        @can('user.add')
                            <p class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#create-vendor">
                                <span class="fas fa-plus-circle"></span>
                                @lang('global.add')
                            </p>
                        @endcan
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- Data table -->
                        <table id="dataTable"
                            class="table table-bordered table-striped dataTable dtr-inline table-responsive-lg"
                            user="grid" aria-describedby="dataTable_info">
                            <thead>
                                <tr>
                                    <th class="w-25">@lang('global.actions')</th>
                                    <th>@lang('cruds.user.fields.id')</th>
                                    <th>Logo</th>
                                    <th>@lang('cruds.user.fields.name')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vendors as $key => $vendor)
                                    <tr>
                                        <td class="text-center">
                                            @can('user.delete')
                                                <div class="btn-group">
                                                    @can('user.edit')
                                                        <p class="btn btn-info btn-sm" data-id="{{ $vendor->id }}"
                                                            data-toggle="modal" data-target="{{ '#edit-vendor-' . $vendor->id }}">
                                                            @lang('global.edit')</p>
                                                    @endcan
                                                    <form action="{{ route('delete-vendor', ['id' => $vendor->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <p class="btn btn-danger btn-sm"
                                                            onclick="if (confirm('Are you sure you want to delete this vendor?')) { this.parentElement.submit() }">
                                                            @lang('global.delete')
                                                        </p>
                                                    </form>
                                                </div>
                                            @endcan
                                        </td>
                                        <td>{{ $key + 1 }}</td>
                                        <td><img src="{{ asset($vendor->logo) }}" alt="Vendor Logo" style="width: 80px;"></td>
                                        <td>{{ $vendor->name }}</td>
                                    </tr>

                                    @include('pages.vendor.modals.vendor_edit')
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    @include('pages.vendor.modals.vendor_create')
@endsection

@section('scripts')
    <script>
        function previewLogo(event, inputId, previewId) {
            const input = document.getElementById(inputId);
            const label = document.getElementById(inputId + '-label'); // Get the custom label element
            const preview = document.getElementById(previewId); // Get the preview image element

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }

                reader.readAsDataURL(input.files[0]);

                // Set the file name as the custom label text
                label.textContent = input.files[0].name;
            } else {
                // If no file selected, reset the custom label text to 'Select a file'
                label.textContent = 'Select a file';
                preview.style.display = 'none';
            }
        }

        // Function to trigger the file input when the custom label is clicked
        // document.getElementById('edit-logo-label').addEventListener('click', function() {
        //     document.getElementById('edit-logo').click();
        // });
    </script>
@endsection
