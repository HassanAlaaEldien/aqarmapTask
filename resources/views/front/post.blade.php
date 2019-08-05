@extends('front.layouts.master')

@section('styles')
    <link href="{{ asset('front-assets/css/custom.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('{{ Storage::url($article->image) }}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>{{ $article->title }}</h1>
                        <span class="meta">Posted by
                          <a href="#">Start Bootstrap</a>
                          on {{ $article->created_at->format('M d,Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    {!! $article->content !!}
                </div>
            </div>
        </div>
    </article>

    <hr>

    <div class="commentbox-app">
        <div class="container">
            <h1 class="heading">Comments</h1>
            <div class="clearfix">
                <form id="comment-form">
                    <input type="text" id="comment-input" class="comment-input" placeholder="Leave a comment">
                    <input type="button" value="Post" class="comment-btn"
                           data-comment-url="{{ route('articles.comments.store',['article' => $article->id]) }}">
                </form>
            </div>

            <ul id="comment-stream" class="comment-stream">
                <div class="infinite-scroll">
                    @foreach($comments as $comment)
                        <li>{{ $comment->comment }}</li>
                    @endforeach
                    {{ $comments->links() }}
                </div>
            </ul>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.comment-btn').on('click', function () {
            let comment = $('#comment-input').val();
            let url = $(this).data('comment-url');
            let csrf_token = $('meta[name=csrf-token]').attr("content");

            if (comment) {
                $.post(url, {'comment': comment, '_token': csrf_token}).done(function (data) {
                    $('.jscroll-inner').prepend('<li>' + comment + '</li>');
                    $('#comment-input').val('');
                });
            }
        });
    </script>
@endsection
