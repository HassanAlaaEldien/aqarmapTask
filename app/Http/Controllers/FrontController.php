<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FrontController extends Controller
{
    /**
     * Handle the request for viewing home page.
     *
     * @return Factory|View
     */
    public function index()
    {
        $articles = Article::orderByDesc('id')->paginate(10);

        $categories = Category::all();

        if (request()->filter) {
            $articles = Article::where('category_id', request()->filter)->paginate(10);
        }

        return view('front.index', compact('articles', 'categories'));
    }

    /**
     * Handle the request for viewing single post page.
     *
     * @param Article $article
     * @return Factory|View
     */
    public function post(Article $article)
    {
        $comments = $article->comments()->orderByDesc('id')->paginate(10);

        return view('front.post', compact('article', 'comments'));
    }
}

