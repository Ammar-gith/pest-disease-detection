@extends('admin.layouts.master')
@section('title', 'Plant-Identifications')
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
    @if (session('error'))
        <div class="position-fixed fixed-bottom p-3" style="z-index: 9999; right: 0; left: auto;">
            <div id="dangerToast" class="toast border-0 bg-danger text-white" role="alert" aria-live="assertive"
                aria-atomic="true" style="min-width: 300px;">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('error') }}
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
                    <h1 class="m-0">Plant Identifications</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Plant Identifications</li>
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
                            <h3 class="card-title">Plant Identifications</h3>
                            <div>
                                <a href="{{ route('plant_identifications.create') }}" class="btn btn-success shadow">+
                                    New</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>plant Cateory</th>
                                        <th>Image</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($plantIdentifications as $key => $plantIdentification)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $plantIdentification->plantCategory->category ?? '' }}</td>
                                            <td>
                                                <div class="text-center">
                                                    <img src="{{ asset('storage/' . $plantIdentification->image) }}"
                                                        alt="Plant Image" class="img-thumbnail rounded-circle shadow"
                                                        style="width: 50px; height: 50px; object-fit: cover;">
                                                </div>
                                            </td>
                                            <td>{{ $plantIdentification->identified_at->format('M d,Y') }}</td>
                                            <td>
                                                <a href="{{ route('plant_identifications.edit', $plantIdentification->id) }}"
                                                    class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('plant_identifications.show', $plantIdentification->id) }}"
                                                    class="btn btn-info"><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('plant_identifications.delete', $plantIdentification->id) }}"
                                                    class="btn btn-danger"><i class="fa fa-trash"></i></a>
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

        $(document).ready(function() {
            $('#dangerToast').toast({
                delay: 3000
            });
            $('#dangerToast').toast('show');
        });
    </script>
@endsection
