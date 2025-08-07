@extends('admin.layouts.master')
@section('title', 'Plant-Categories')
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
                    <h1 class="m-0">Plant Categories</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Plant Categories</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Plant Categories</h3>
                            <div>
                                <a href="{{ route('plant_categories.create') }}" class="btn btn-success shadow">+ New</a>
                            </div>
                        </div>
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
                                    @foreach ($plantCategories as $key => $plantCategory)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $plantCategory->category }}</td>
                                            <td>
                                                <a href="{{ route('plant_categories.edit', $plantCategory->id) }}"
                                                    class="btn btn-secondary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{ route('plant_categories.delete', $plantCategory->id) }}"
                                                    class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
