@extends('layouts.admin')


@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Contacts</h3>
                        @can('user.add')
                            <p class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#create-contact">
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
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Profile Image</th>
                                    <th>Buyer Department</th>
                                    <th>Department</th>
                                    <th>Designation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <td class="text-center">
                                            @can('user.delete')
                                                <div class="btn-group">
                                                    @can('user.edit')
                                                        <p class="btn btn-info btn-sm" data-toggle="modal"
                                                            data-target="{{ '#edit-contact-' . $contact->id }}">
                                                            @lang('global.edit')</p>
                                                    @endcan
                                                    <form action="{{ route('delete-buyer_contact', ['id' => $contact->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <p class="btn btn-danger btn-sm"
                                                            onclick="if (confirm('Are you sure you want to delete this?')) { this.parentElement.submit() }">
                                                            @lang('global.delete')
                                                        </p>
                                                    </form>
                                                </div>
                                            @endcan
                                        </td>
                                        <td>{{ $contact->id }}</td>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->phone }}</td>
                                        <td><img src="{{ asset($contact->profile_image) }}"></td>
                                        <td>{{ App\Models\Department::where('id', $contact->buyer_department_id)->first()->name }}
                                        </td>
                                        <td>{{ $contact->department }}</td>
                                        <td>{{ $contact->designation }}</td>

                                    </tr>
                                    @include('pages.buyer.modals.contact_edit')
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

    @include('pages.buyer.modals.contact_create')
@endsection

@section('scripts')
    <script>
        // Add an event listener to the "buyer" dropdown
        $('#buyer').on('change', function() {
            // Get the selected buyer ID
            var buyerId = $(this).val();

            // Make an AJAX request to fetch the manufacturers for the selected buyer
            $.ajax({
                url: '/get-departments/' + buyerId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Get the "Manufacturer" dropdown element
                    var manufacturerDropdown = $('#buyer-department');

                    // Clear existing options
                    manufacturerDropdown.empty();

                    // Populate the "Manufacturer" dropdown with the fetched data
                    $.each(data, function(index, manufacturer) {
                        manufacturerDropdown.append('<option value="' + manufacturer.id + '">' +
                            manufacturer.name + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching departments:', error);
                }
            });
        });
    </script>
@endsection
