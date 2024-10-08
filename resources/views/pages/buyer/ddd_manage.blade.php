@extends('layouts.admin')


@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Department</h3>
                        @can('user.add')
                            <p class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#create-department">
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
                                  
                                    <th>@lang('cruds.user.fields.name')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($department_dd as $department)
                                <tr>
                                    <td class="text-center">
                                        @can('user.delete')
                                            <div class="btn-group">
                                              <form action="{{ route('delete-department', ['id' => $department->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <p class="btn btn-danger btn-sm"
                                                        onclick="if (confirm('Are you sure you want to delete this buyer?')) { this.parentElement.submit() }">
                                                        @lang('global.delete')
                                                    </p>
                                                </form>
                                            </div>
                                        @endcan
                                    </td>
                                    
                                    <td>{{ $department->name }}</td>


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
    <!-- /.content -->

    @include('pages.buyer.modals.ddd_create')
@endsection

