@extends('admin.layouts.master')

@section('breadcrumbs')
    <div class="breadcrumbs-area clearfix">
        <h4 class="page-title pull-left">Categories</h4>
        <ul class="breadcrumbs pull-left">
            <li><a href="{{ route('adminHome') }}">Home</a></li>
            <li><a href="{{ route('categories.index') }}">Categories</a></li>
            <li><span>Update</span></li>
        </ul>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6 col-ml-12">
            <div class="row">
                <!-- Server side start -->
                <div class="col-12">
                    <div class="card mt-5">
                        @include('admin.includes.messages')
                        <div class="card-body">
                            <h4 class="header-title">Update category</h4>
                            <form class="needs-validation" novalidate=""
                                  action="{{ route('categories.update',['category' => $category->id]) }}"
                                  method="POST">
                                @method('PUT')
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">Name</label>
                                        <input type="text" name="name" class="form-control" id="validationCustom01"
                                               placeholder="Name" required="" value="{{ $category->name }}">
                                    </div>
                                </div>
                                @csrf
                                <button class="btn btn-primary" type="submit">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Server side end -->
            </div>
        </div>
@endsection
