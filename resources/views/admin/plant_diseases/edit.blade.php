@extends('admin.layouts.master')
@section('title', 'Plant-Diseases')
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
                    <h1 class="m-0">Plant Diseases</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Plant Diseases</li>
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
                            <h3 class="card-title">Edit Plant Disease</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('plant_diseases.update', $disease->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="col-form-label" for="inputSuccess">Disease Name</label>
                                            <input type="text" name="disease_name" class="form-control input-border"
                                                value="{{ $disease->disease_name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="col-form-label" for="inputSuccess">Weather</label>
                                            <input type="text" name="weather" class="form-control input-border"
                                                value="{{ $disease->weather }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Disease Description</label>
                                            <textarea class="form-control input-border" name="disease_description" rows="6"
                                                placeholder="Write description ...">{{ old('disease_description', $disease->disease_description) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Remedies</label>
                                            <textarea class="form-control input-border" name="remedies" rows="6" placeholder="Write remedies ...">{{ old('remedies', $disease->remedies) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Upload Disease Image</label>
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
@section('script')
    <script>
        Dropzone.autoDiscover = false;

        const myDropzone = new Dropzone("#my-dropzone", {
            url: "{{ route('plant_diseases.upload') }}", // Upload route
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
    <script>
        @if ($disease->image)
            var mockFile = {
                name: "Image",
                size: 12345,
                type: 'image/*'
            }; // size can be anything
            myDropzone.emit("addedfile", mockFile);
            myDropzone.emit("thumbnail", mockFile, "{{ asset('storage/' . $disease->image) }}");
            myDropzone.emit("complete", mockFile);
            document.getElementById('uploaded_image').value = "{{ $disease->image }}";
        @endif
    </script>
@endsection
