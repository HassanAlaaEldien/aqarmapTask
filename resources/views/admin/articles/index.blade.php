@extends('admin.layouts.master')

@section('breadcrumbs')
    <div class="breadcrumbs-area clearfix">
        <h4 class="page-title pull-left">Articles</h4>
        <ul class="breadcrumbs pull-left">
            <li><a href="{{ route('adminHome') }}">Home</a></li>
            <li><span>Articles</span></li>
        </ul>
    </div>
@endsection

@section('content')
    <div class="row">
        <!-- Progress Table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">All articles</h4>
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table table-hover progress-table text-center">
                                <thead class="text-uppercase">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Content</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($articles as $article)
                                    <tr id="row-{{ $article->id }}">
                                        <th scope="row">{{ $article->id }}</th>
                                        <td>{{ str_limit($article->title,50,'...') }}</td>
                                        <td>{{ str_limit($article->content,50,'...') }}</td>
                                        <td>{{ $article->category->name }}</td>
                                        <td>
                                            <img src="{{ Storage::url($article->image) }}"
                                                 style="width: 100px;height: 100px;">
                                        </td>
                                        <td>
                                            <ul class="d-flex justify-content-center">
                                                <li class="mr-3">
                                                    <a href="{{ route('articles.edit',['article' => $article->id]) }}"
                                                       class="text-secondary">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a herf="#!"
                                                       data-id="{{ $article->id }}"
                                                       data-destroy-url="{{ route('articles.destroy',['article' => $article->id]) }}"
                                                       class="text-danger" id="delete-article">
                                                        <i class="ti-trash"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {!! $articles->links() !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- Progress Table end -->
    </div>
@endsection

@section('scripts')
    <script>
        $(document).on('click', '#delete-article', function () {
            let confirmation_message = confirm('Are you sure that you want to delete this article ?');

            if (confirmation_message) {
                let article_id = $(this).data('id');

                $.ajax({
                    url: $(this).data('destroy-url'),
                    type: 'post',
                    data: {_method: 'delete'},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr("content")
                    },
                    success: function (result) {
                        $('#row-' + article_id).remove();
                    }
                });
            }
        });
    </script>
@endsection
