@extends('layouts.admin')


@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Manufacturers Certificate</h3>
                        @can('user.add')
                            <p class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#manufacturer-certificate">
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

                                    <th>Manufacturer Id</th>
                                    <th>Cer. Name</th>
                                    <th>Cer. Image</th>
                                    <th>Issue Date</th>
                                    <th>Valid From</th>
                                    <th>Valid To</th>
                                    <th>PDF File</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($certificates as $certificate)
                                    @php
                                        $file = $certificate->pdf_file;
                                        $file = substr($file, 14);
                                        $file = preg_replace('/_.*\.pdf$/', '.pdf', $file);

                                    @endphp

                                    <tr>
                                        <td class="text-center">
                                            @can('user.delete')
                                                <div class="btn-group">
                                                    @can('user.edit')
                                                        <p class="btn btn-info btn-sm" data-toggle="modal"
                                                            data-target="{{ '#edit-manufacturer-' . $certificate->id }}">
                                                            @lang('global.edit')</p>
                                                    @endcan
                                                    <form
                                                        action="{{ route('delete-manufacturer', ['id' => $certificate->id]) }}"
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

                                        <td>{{ $certificate->manufacturer_id }}</td>
                                        <td>{{ $certificate->name }}</td>
                                        <td><img src="{{ asset($certificate->logo) }}" width="40" height="40" style="width:50px !important;"></td>
                                        <td>{{ $certificate->issue_date }}</td>
                                        <td>{{ $certificate->valid_from }}</td>
                                        <td>{{ $certificate->valid_to }}</td>
                                        <td><a href="{{ asset($certificate->pdf_file) }}" target=”_blank”>{{ $file}}</a></td>



                                    </tr>
                                    @include('pages.vendor.modals.manufacturer_certificate_edit')
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

    @include('pages.vendor.modals.certificate_create')
@endsection
