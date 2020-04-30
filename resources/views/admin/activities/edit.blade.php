@extends('admin.layouts.main')
@section('breadcrumb')
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col ml-4 mr-4">
                <div class="card card-secondary pb-3">
                    <div class="card-header">
                        <h3 class="card-title">Edit Activity</h3>
                    </div>
                    <form method="post" action="{{ route('admin.activities.update',[$activity->slug]) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}{{ method_field('PUT') }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputTitle">Title</label>
                                <input type="text" id="inputTitle" name="title" class="form-control @error('title') is-invalid @enderror @error('slug') is-invalid @enderror"
                                       autofocus value="{{ $errors->any() ? old('title') : $activity->title }}">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @error('slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputShortContent">Short content</label>
                                <input type="text" id="inputShortContent" name="short_content" class="form-control @error('short_content') is-invalid @enderror"
                                       maxlength="255" value="{{ $errors->any() ? old('short_content') : $activity->short_content }}">
                                @error('short_content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputContent">Content</label>
                                <textarea class="textarea" id="inputContent" name="content" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                >{{ $errors->any() ? old('content') : $activity->content }}</textarea>
                                @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputCoverImage">Cover image</label>
                                <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                                    <input id="inputCoverImage" name="cover_image" type="file" onchange="readURL(this);" accept="image/jpeg,png,jpg"
                                           value="{{ old('cover_image') }}" class="form-control border-0 @error('cover_image') is-invalid @enderror">
                                    <label id="inputCoverImage-label" for="inputCoverImage" class="font-weight-light text-muted">Choose file</label>
                                    <div class="input-group-append">
                                        <label for="inputCoverImage" class="btn btn-light m-0 rounded-pill px-4"> <i class="fas fa-cloud-upload-alt mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                                    </div>
                                    @error('cover_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Uploaded image area-->
                                <div class="image-area mt-4"><img id="imageResult" src="{{ asset($activity->cover_image) }}" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                            </div>
                        </div>
                    <div class="col-12">
                        <input type="submit" value="Edit" class="btn btn-success float-right">
                    </div>
                    </form>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
@endsection
@section('after-script')
    <script>
        $(document).ready(function(){
            @if(session()->has('success'))
            toastr.success('{{ session()->get('success') }}');
            @elseif(session()->has('error'))
            toastr.error('{{ session()->get('error') }}');
            @endif

        });

        $('#inputCoverImage').on('change', function () {
            var input = event.srcElement;
            var fileName = input.files[0].name;
            $('#inputCoverImage-label').text('File name: ' + fileName);

            readURL(input);
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imageResult').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
@section('after-style')
    <style>
        #inputCoverImage {
            opacity: 0;
        }

        #inputCoverImage-label {
            position: absolute;
            top: 50%;
            left: 1rem;
            transform: translateY(-50%);
        }

        .image-area {
            border: 2px dashed rgba(120, 120, 120, 0.7);
            padding: 1rem;
            position: relative;
        }

        .image-area::before {
            content: 'Uploaded image result';
            color: #999;
            font-weight: bold;
            text-transform: uppercase;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 0.8rem;
            z-index: 1;
        }

        .image-area img {
            z-index: 2;
            position: relative;
            max-height: 513px;
            width: auto;
        }
    </style>
@endsection
