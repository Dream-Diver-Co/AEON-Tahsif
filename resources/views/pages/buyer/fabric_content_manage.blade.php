@extends('layouts.admin')


@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        
                        @can('user.add')
                            <p class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#create-fabric-content">
                                <span class="fas fa-plus-circle"></span>
                                @lang('global.add')
                            </p>
                        @endcan
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- Data table -->
                        <table id="dataTable" class="table table-bordered table-striped dataTable dtr-inline table-responsive-lg"
                            user="grid" aria-describedby="dataTable_info">
                            <thead>
                                <tr>
                                    <th class="w-25">@lang('global.actions')</th>
                         
                                    <th>@lang('cruds.user.fields.name')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fabric_contents as $fab)
                                    <tr>
                                        <td class="text-center">
                                            @can('user.delete')
                                                <div class="btn-group">
                                                    <form action="{{ route('delete-fabric-content', ['id' => $fab->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                                onclick="if (confirm('Are you sure you want to delete this buyer?')) { this.closest('form').submit() }">
                                                            @lang('global.delete')
                                                        </button>
                                                    </form>
                                                </div>
                                            @endcan
                                        </td>
                                        
                                        <td>{{ $fab->name }}</td>
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

    @include('pages.buyer.modals.fabric_content_create')
@endsection

