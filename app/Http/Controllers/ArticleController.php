<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()?->role !== 'admin') {
            $articles = Article::withTrashed()->orderByDesc('created_at')->get();
        } else {
            $articles = Article::orderByDesc('created_at')->get();
        }

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $article =   Article::create($request->input());

        return redirect()->route('articles.edit', [$article->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $article->update($request->input());

        return redirect()->route('articles.edit', [$article->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }

    public function audit(String $article)
    {

        $article = Article::withTrashed()->find($article);

        if ($article) {
            return view('articles.audit', compact('article'));
        } else {
            return redirect()->route('articles.index')->with('error', 'El artículo no existe.');
        }
        return view('articles.audit', compact('article'));
    }
}
