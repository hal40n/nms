<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->defaultUserId = 1;
    }

    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(30);
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $article = new Article([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'category_id' => $request->input('category_id'),
        ]);

        $article->save();

        return redirect()->route('articles.index')->with('success', 'Article created successfully!');

    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {

        $categories = Category::all();
        return view('articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        //
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }

}
