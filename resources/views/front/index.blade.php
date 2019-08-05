@extends('front.layouts.master')

@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('{{ asset('front-assets/img/home-bg.jpg') }}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Clean Blog</h1>
                        <span class="subheading">A Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <select id="filter-by-category">
                    <option value="">Filter By Category</option>
                    @foreach($categories as $category)
                        <option
                            value="{{ $category->id }}" {{ request()->filter == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <div class="infinite-scroll">
                    @foreach($articles as $article)
                        <div class="post-preview">
                            <a href="{{ route('post',['article' => $article->id]) }}">
                                <h2 class="post-title">
                                    {{ $article->title }}
                                </h2>
                                <h3 class="post-subtitle">
                                    {{ str_limit($article->content,150,'...') }}
                                </h3>
                            </a>
                            <p class="post-meta">Posted by
                                <a href="#">Start Bootstrap</a>
                                on {{ $article->created_at->format('M d,Y') }}</p>
                        </div>
                        <hr>
                    @endforeach
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#filter-by-category').on('change', function () {
            let site_url = $('meta[name=site-url]').attr("content");
            let category = $(this).val();
            if (category)
                location.replace('?filter=' + category);
            else
                location.replace(site_url);
        });
    </script>
@endsection
