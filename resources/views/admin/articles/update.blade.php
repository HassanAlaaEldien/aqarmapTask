@extends('admin.layouts.master')

@section('breadcrumbs')
    <div class="breadcrumbs-area clearfix">
        <h4 class="page-title pull-left">Articles</h4>
        <ul class="breadcrumbs pull-left">
            <li><a href="{{ route('adminHome') }}">Home</a></li>
            <li><a href="{{ route('articles.index') }}">Articles</a></li>
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
                            <h4 class="header-title">Update article</h4>
                            <form class="needs-validation" novalidate=""
                                  action="{{ route('articles.update',['article' => $article->id]) }}"
                                  method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">Title</label>
                                        <input type="text" name="title" class="form-control" id="validationCustom01"
                                               placeholder="Title" required=""
                                               value="{{ old('title') ? old('title') : $article->title }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom02">Category</label>
                                        <select name="category_id" class="form-control" id="validationCustom02">
                                            <option value="">Select category</option>
                                            @foreach($categories as $category)
                                                <option
                                                    value="{{ $category->id }}" {{ $article->category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom03">Content</label>
                                        <textarea type="text" name="content" class="form-control"
                                                  id="validationCustom03"
                                                  placeholder="Content"
                                                  required="">{{ old('content') ? old('content') : $article->content }}</textarea>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input"
                                                   id="inputGroupFile01">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
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
