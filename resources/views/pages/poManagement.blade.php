@extends('layouts.admin')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Purchase Orders</h3>
                        @can('user.add')
                            <p class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#create-buyer">
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
                                    @can('user.edit')
                                        <th class="w-25">@lang('global.actions')</th>
                                    @endcan

                                    <th>@lang('cruds.user.fields.id')</th>
                                    <th>PO No</th>
                                    <th>Buyer</th>
                                    <th>Vendor</th>
                                    <th>Ex Factory Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pos as $key => $po)
                                    <tr>
                                        @can('user.delete')
                                            <td>

                                                <div class="btn-group">
                                                    @can('user.edit')
                                                        {{-- <p class="btn btn-info btn-sm" data-id="{{ $buyer->id }}"
                                                            data-toggle="modal" data-target="{{ '#edit-buyer-' . $buyer->id }}">
                                                            @lang('global.edit')</p> --}}

                                                            <p class="btn btn-success btn-sm"><a
                                                                href="{{ route('po-edit', ['id' => $po->id]) }}"
                                                                class="text-white" target="_blank">Edit</a>
                                                            </p>

                                                    @endcan
                                                    <p class="btn btn-info btn-sm"><a
                                                            href="{{ route('pdf-view-single', ['id' => $po->id]) }}"
                                                            class="text-white" target="_blank">Download</a>
                                                    </p>
                                                    <form action="{{ route('po-delete', ['id' => $po->id]) }}" method="POST">
                                                        @csrf
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <p class="btn btn-danger btn-sm"
                                                            onclick="if (confirm('Are you sure you want to delete this buyer?')) { this.parentElement.submit() }">
                                                            @lang('global.delete')
                                                        </p>
                                                    </form>
                                                </div>

                                            </td>
                                        @endcan
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $po->po_no }}</td>
                                        <td>{{ \App\Models\Buyer::where('id', $po->buyer_id)->first()->name }}</td>
                                        <td>{{ \App\Models\Vendor::where('id', $po->vendor_id)->first()->name }}</td>
                                        <td>{{ $po->ex_factory_date }}</td>
                                    </tr>
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
@endsection

@section('scripts')
    <script>
        // function previewLogo(event, inputId, previewId) {
        //     const input = document.getElementById(inputId);
        //     const label = document.getElementById(inputId + '-label'); // Get the custom label element
        //     const preview = document.getElementById(previewId); // Get the preview image element

        //     if (input.files && input.files[0]) {
        //         const reader = new FileReader();

        //         reader.onload = function(e) {
        //             preview.src = e.target.result;
        //             preview.style.display = 'block';
        //         }

        //         reader.readAsDataURL(input.files[0]);

        //         // Set the file name as the custom label text
        //         label.textContent = input.files[0].name;
        //     } else {
        //         // If no file selected, reset the custom label text to 'Select a file'
        //         label.textContent = 'Select a file';
        //         preview.style.display = 'none';
        //     }
        // }

        // Function to trigger the file input when the custom label is clicked
        // document.getElementById('edit-logo-label').addEventListener('click', function() {
        //     document.getElementById('edit-logo').click();
        // });
    </script>
@endsection
