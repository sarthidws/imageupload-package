@extends('admin.app')
@section('title', 'Image Upload Package')
@section('content')

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="row">

                <!-- Source Visit -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="card-title mb-0">
                                <h5 class="mb-0">Dashboard</h5>
                                <small class="text-muted">Upload Image package</small>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class=" mb-4">
                                <div class="card-body">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="mt-3">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#modalToggle">
                                                Upload Images
                                            </button>

                                            <!-- Modal 1-->
                                            <div class="modal fade" id="modalToggle" aria-labelledby="modalToggleLabel"
                                                tabindex="-1" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalToggleLabel">Upload Images</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('image.postImages') }}" method="post"
                                                                class="dropzone needsclick" id="dropzone-multi"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="dz-message needsclick">
                                                                    Drop files here or click to upload
                                                                    <span class="note needsclick">(This is just a demo
                                                                        dropzone. Selected files are <strong>not</strong>
                                                                        actually uploaded.)</span>
                                                                </div>
                                                                <div class="fallback">
                                                                    <input name="file" type="file" />
                                                                </div>
                                                            </form>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="modalToggle2" aria-hidden="true"
                                                    aria-labelledby="modalToggleLabel2" tabindex="-1">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalToggleLabel2">Modal 2</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="/upload" class="dropzone needsclick"
                                                                    id="dropzone-basic">
                                                                    <div class="dz-message needsclick">
                                                                        Drop files here or click to upload
                                                                        <span class="note needsclick">(This is just a demo
                                                                            dropzone. Selected files are
                                                                            <strong>not</strong>
                                                                            actually uploaded.)</span>
                                                                    </div>
                                                                    <div class="fallback">
                                                                        <input name="file" type="file" />
                                                                    </div>

                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-primary"
                                                                    data-bs-target="#modalToggle" data-bs-toggle="modal"
                                                                    data-bs-dismiss="modal">Back to
                                                                    first</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (Session::has('error'))
                        <div class="alert alert-primary alert-dismissible" role="alert">
                            {{ Session::get('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.js"></script>

    <script>
       $(document).ready(function() {
        // Initialize Dropzone
        var myDropzone = new Dropzone("#dropzone-multi", {
            url: "{{ route('image.postImages') }}",
            autoProcessQueue: false, // Disable auto processing on drop

            init: function() {
                var submitButton = document.querySelector("#uploadImage");

                submitButton.addEventListener("click", function() {
                    // Process the queue when the submit button is clicked
                    myDropzone.processQueue();
                });

                this.on("sending", function(file, xhr, formData) {
                    // Include additional form data if needed
                    formData.append('key', 'value');
                });

                this.on("success", function(file, response) {
                    // Handle success
                    console.log(response);
                });

                this.on("error", function(file, errorMessage) {
                    // Handle error
                    console.error(errorMessage);
                });
            }
        });
    });
    </script>
@endpush
