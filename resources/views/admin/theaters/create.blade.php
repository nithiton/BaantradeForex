@extends('admin.layouts.main')
@section('breadcrumb')
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col ml-4 mr-4">
                <div class="card card-secondary pb-3">
                    <div class="card-header">
                        <h3 class="card-title">Create theater</h3>
                    </div>
                    <form method="post" action="{{ route('admin.theaters.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputTitle">Title</label>
                                <input type="text" id="inputTitle" name="title" class="form-control @error('title') is-invalid @enderror @error('slug') is-invalid @enderror"
                                       autofocus value="{{ old('title') }}">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @error('slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputUrl">URL</label>
                                <input type="text" id="inputUrl" name="url" class="form-control @error('url') is-invalid @enderror"
                                       maxlength="255" value="{{ old('url') }}">
                                @error('url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputShortContent">Short content</label>
                                <input type="text" id="inputShortContent" name="short_content" class="form-control @error('short_content') is-invalid @enderror"
                                       maxlength="255" value="{{ old('short_content') }}">
                                @error('short_content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <input type="submit" value="Create" class="btn btn-success float-right">
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

    </script>
@endsection
@section('after-style')
@endsection

