@extends('admin.layouts.master')
@section('title', 'Plant-Identifications')
@section('style')
    <style>
        .input-border {
            border-color: rgb(102, 170, 102) !important;
        }

        /* Center the Dropzone previews horizontally */
        #my-dropzone {
            display: flex;
            justify-content: center;
            /* center horizontally */
            align-items: center;
            /* center vertically if needed */
            flex-wrap: wrap;
            /* allow multiple items to wrap nicely */
            min-height: 150px;
            /* optional: give some height */
        }

        /* Optional: style the previews */
        #my-dropzone .dz-preview {
            margin-right: 10px;
        }
    </style>
@endsection
@section('content')
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
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-info">
                        <div class="card-header" style="background-color: rgb(102, 170, 102)">
                            <h3 class="card-title">New Plant Identification</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('plant_identifications.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Select Plant Category</label>
                                            <select class="form-control input-border select2" name="plant_category_id">
                                                <option disabled selected>Select plant category</option>
                                                @foreach ($plantCategories as $plantCategory)
                                                    <option value="{{ $plantCategory->id }}">{{ $plantCategory->category }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Upload Image</label>
                                        <div id="my-dropzone"
                                            class="dz-preview dz-file-preview dropzone border border-success rounded p-3 ">
                                            <div class="dz-message">
                                                <i class="fas fa-cloud-upload-alt fa-2x text-success"></i><br>
                                                <span>Drag & drop or click to upload image</span>
                                            </div>
                                        </div>
                                        <input type="hidden" name="image" id="uploaded_image">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success"
                                    style="background-color: rgb(102, 170, 102)">Save</button>
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
@section('script')
    <script>
        $(function() {
            bsCustomFileInput.init();

            $('#reservationdate').datetimepicker({
                format: 'L' // 'L' = locale date, like 07/27/2025
            });

            // Prevent letters in date input
            $('input[name="diary_at"]').on('keypress', function(e) {
                let char = String.fromCharCode(e.which);
                if (!/[0-9\/\-]/.test(char)) {
                    e.preventDefault();
                }
            });
        });
    </script>
    <script>
        Dropzone.autoDiscover = false;

        const myDropzone = new Dropzone("#my-dropzone", {
            url: "{{ route('plant_identifications.upload') }}", // Upload route
            paramName: "file", // name sent to server
            maxFiles: 1,
            acceptedFiles: "image/*",
            addRemoveLinks: true,

            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(file, response) {
                document.getElementById('uploaded_image').value = response.file_path;
            },
            removedfile: function(file) {
                document.getElementById('uploaded_image').value = '';
                file.previewElement.remove();
            }
        });
    </script>
@endsection
