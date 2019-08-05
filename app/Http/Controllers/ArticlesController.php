<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{
    /**
     * ArticlesController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::paginate(10);

        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.articles.store', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        $path = Storage::disk('public')->putFile('articles/images', $request->file('image'));

        Article::create($request->only(['title', 'content', 'category_id']) + ['image' => $path]);

        return redirect()->back()->with(['status' => 'success', 'message' => 'Article added successfully.']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = Category::all();

        return view('admin.articles.update', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $request_data = $request->only(['title', 'content', 'category_id']);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($article->image);
            $path = Storage::disk('public')->putFile('articles/images', $request->file('image'));
            $request_data['image'] = $path;
        }

        $article->update($request_data);

        return redirect()->back()->with(['status' => 'success', 'message' => 'Article added successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Article $article)
    {
        $article->delete();

        Storage::disk('public')->delete($article->image);

        return redirect()->back()->with(['status' => 'success', 'message' => 'Article deleted successfully.']);
    }
}
