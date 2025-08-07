@extends('admin.layouts.master')
@section('title', 'Plant-Types')
@section('content')
    @if (session('success'))
        <div class="position-fixed fixed-bottom p-3" style="z-index: 9999; right: 0; left: auto;">
            <div id="successToast" class="toast border-0 bg-success text-white" role="alert" aria-live="assertive"
                aria-atomic="true" style="min-width: 300px;">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('success') }}
                    </div>
                    <button type="button" class="close text-white me-2 m-auto" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    @endif

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Plant Types</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Plant Types</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Plant Types</h3>
                            <div>
                                <a href="{{ route('plant_types.create') }}" class="btn btn-success shadow">+ New</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($plantTypes as $key => $plantType)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $plantType->type }}
                                            </td>
                                            <td>
                                                <a href="{{ route('plant_types.edit', $plantType->id) }}"
                                                    class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                                                @can('delete_plant_types')
                                                    <a href="{{ route('plant_types.delete', $plantType->id) }}"
                                                        class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                @endcan

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
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.login-box -->
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#successToast').toast({
                delay: 3000
            });
            $('#successToast').toast('show');
        });
    </script>
@endsection
