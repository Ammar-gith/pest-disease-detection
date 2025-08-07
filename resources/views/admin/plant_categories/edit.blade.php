@extends('admin.layouts.master')
@section('title', 'Plant-Categories')
@section('style')
    <style>
        .input-border {
            border-color: rgb(102, 170, 102) !important;
        }
    </style>
@endsection
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Plant Categories</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Plant Categories</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-info">
                        <div class="card-header" style="background-color: rgb(102, 170, 102)">
                            <h3 class="card-title">Edit Plant Category</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('plant_categories.update', $plantCategory->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-form-label" for="inputSuccess">Edit Plant Category</label>
                                    <input type="text" name="category" class="form-control input-border"
                                        value="{{ $plantCategory->category }}">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success"
                                    style="background-color: rgb(102, 170, 102)">Update</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.login-box -->
@endsection
