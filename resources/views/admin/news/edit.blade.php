@extends('admin.layouts.main')
@section('breadcrumb')
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col ml-4 mr-4">
                <div class="card card-secondary pb-3">
                    <div class="card-header">
                        <h3 class="card-title">Edit news</h3>
                    </div>
                    <form method="post" action="{{ route('admin.news.update',[$new->slug]) }}">
                        {{ csrf_field() }}{{ method_field('PUT') }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputTitle">Title</label>
                                <input type="text" id="inputTitle" name="title" class="form-control @error('title') is-invalid @enderror"
                                       autofocus value="{{ $errors->any() ? old('title') : $new->title }}">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputSlug">Slug</label>
                                <input type="text" id="inputSlug" name="slug" class="form-control" readonly tabindex="-1"
                                       value="{{ $errors->any() ? old('slug') : $new->slug }}">
                            </div>
                            <div class="form-group">
                                <label for="inputSlug">Short content</label>
                                <input type="text" id="inputShortContent" name="short_content" class="form-control @error('short_content') is-invalid @enderror"
                                       maxlength="255" value="{{ $errors->any() ? old('short_content') : $new->short_content }}">
                                @error('short_content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputContent">Content</label>
                                <textarea class="textarea" id="inputContent" name="content" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                >{{ $errors->any() ? old('content') : $new->content }}</textarea>
                                @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
        $('#inputTitle').keyup(function () {
            $title =  $('#inputTitle').val().toLowerCase().split(' ').join('_');
            $('#inputSlug').val($title);
        });
    </script>
@endsection

