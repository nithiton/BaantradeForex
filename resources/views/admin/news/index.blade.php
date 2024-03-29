@extends('admin.layouts.main')
@section('breadcrumb')
@endsection
@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">News</h3>
                <div class="card-tools">
                    <div class="row">
                        <div class="col-8">
                            <form method="get" action="{{ route('admin.news.search') }}" enctype="multipart/form-data">
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control" name="search_query" placeholder="Search..." required>
                                    <div class="input-group-append mr-3">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-4">
                            <a class="btn btn-success btn-sm" href="{{ route('admin.news.create') }}">
                                <i class="fas fa-plus"></i>
                                create
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 1%">#</th>
                        <th style="width: 30%">title</th>
                        <th>short content</th>
                        <th style="width: 8%" class="text-center">Status</th>
                        <th style="width: 20%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($news as $index => $new)
                    <tr>
                        <td>{{ (($news->currentPage()-1)*$news->perPage())+($index+1) }}</td>
                        <td>{{ $new->title }}</td>
                        <td>{{ $new->short_content }}</td>
                        <td class="project-state">
                            @if(is_null($new->deleted_at))
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Deleted</span>
                            @endif
                        </td>
                        <td class="project-actions text-right">
                            @if(is_null($new->deleted_at))
                                <a class="btn btn-info btn-sm" href="{{ route('admin.news.edit',[$new->slug]) }}">
                                    <i class="fas fa-pencil-alt"></i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm delete-record" href="#" data-toggle="modal" data-target="#confirm-modal"
                                   data-url="{!! route('admin.news.destroy',[$new->slug]) !!}">
                                    <i class="fas fa-trash"></i>
                                    Delete
                                </a>
                            @else
                                <form method="post" action="{{ route('admin.news.restore',[$new->id]) }}">
                                    {{ csrf_field() }}
                                    <button class="btn btn-dark btn-sm" type="submit">
                                        <i class="fas fa-trash-restore"></i>
                                        Restore
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" align="center">No content</td>
                    </tr>
                    @endforelse
                    </tbody>
                </table>
                <div align="right">
                    {{ $news->links() }}
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>

    <form action="" method="POST" id="remove-modal">
    <div class="modal fade" id="confirm-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title">Are you sure?</h4>
                    <button type="button" class="close dismiss-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Do you want to delete this record?</p>
                </div>
                <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger dismiss-modal" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-light">delete</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    </form>
    <!-- /.modal -->

@endsection
@section('after-script')
    <script>
        $(document).ready(function(){
            // For A Delete Record Popup
            $('.delete-record').click(function() {
                var url = $(this).attr('data-url');
                $("#remove-modal").attr("action",url);
                $("#remove-modal").append('{{ csrf_field() }}');
                $("#remove-modal").append('{{ method_field('DELETE') }}');
            });

            $('#confirm-modal').on('hidden.bs.modal', function () {
                $("#remove-modal").attr("action","");
                $("#remove-modal").find( "input" ).remove();
            });

            @if(session()->has('success'))
                toastr.success('{{ session()->get('success') }}');
            @elseif(session()->has('error'))
                toastr.error('{{ session()->get('error') }}');
            @endif
        });


    </script>
@endsection

