@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('cruds.role.title')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('global.home')</a></li>
                        <li class="breadcrumb-item active">@lang('cruds.role.title')</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Roles</h3>
                        @can('roles.add')
                            <a href="{{ route('roleAdd') }}" class="btn btn-success btn-sm float-right">
                                <span class="fas fa-plus-circle"></span>
                                @lang('global.add')
                            </a>
                        @endcan
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- Data table -->
                        <table id="dataTable"
                            class="table table-bordered table-striped dataTable dtr-inline table-responsive-lg"
                            role="grid" aria-describedby="dataTable_info">
                            <thead>
                                <tr>
                                    <th>@lang('cruds.role.fields.id')</th>
                                    <th>@lang('cruds.role.fields.name')</th>
                                    <th class="w-25">@lang('global.actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        {{-- <td>
                                            @foreach ($role->permissions as $permission)
                                                <span class="badge badge-primary">{{ $permission->name }} </span>
                                            @endforeach
                                        </td> --}}
                                        <td class="text-center">

                                                <form action="{{ route('roleDestroy', $role->id) }}" method="post">
                                                    @csrf
                                                    <div class="btn-group">
                                                        @can('roles.edit')
                                                            <a href="{{ route('roleEdit', $role->id) }}" type="button"
                                                                class="btn btn-info btn-sm"> @lang('global.edit')</a>
                                                        @endcan

                                                        @can('roles.delete')
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            onclick="if (confirm('Are you sure?')) { this.form.submit() } ">
                                                            @lang('global.delete')</button>
                                                        @endcan
                                                    </div>
                                                </form>

                                        </td>
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
@endsection
