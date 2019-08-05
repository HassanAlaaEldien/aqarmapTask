@extends('admin.layouts.master')

@section('breadcrumbs')
    <div class="breadcrumbs-area clearfix">
        <h4 class="page-title pull-left">Categories</h4>
        <ul class="breadcrumbs pull-left">
            <li><a href="{{ route('adminHome') }}">Home</a></li>
            <li><span>Categories</span></li>
        </ul>
    </div>
@endsection

@section('content')
    <div class="row">
        <!-- Progress Table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">All categories</h4>
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table table-hover progress-table text-center">
                                <thead class="text-uppercase">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr id="row-{{ $category->id }}">
                                        <th scope="row">{{ $category->id }}</th>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <ul class="d-flex justify-content-center">
                                                <li class="mr-3">
                                                    <a href="{{ route('categories.edit',['category' => $category->id]) }}"
                                                       class="text-secondary">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!"
                                                       data-id="{{ $category->id }}"
                                                       data-destroy-url="{{ route('categories.destroy',['category' => $category->id]) }}"
                                                       class="text-danger" id="delete-category">
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
                        {!! $categories->links() !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- Progress Table end -->
    </div>
@endsection

@section('scripts')
    <script>
        $(document).on('click', '#delete-category', function () {
            let confirmation_message = confirm('Are you sure that you want to delete this category ?');

            if (confirmation_message) {
                let category_id = $(this).data('id');

                $.ajax({
                    url: $(this).data('destroy-url'),
                    type: 'post',
                    data: {_method: 'delete'},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr("content")
                    },
                    success: function (result) {
                        $('#row-' + category_id).remove();
                    }
                });
            }
        });
    </script>
@endsection
