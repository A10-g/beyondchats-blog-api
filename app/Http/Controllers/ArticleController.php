<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // GET /api/articles
    public function index()
    {
        return Article::orderBy('published_at')->get();
    }

    // GET /api/articles/{id}
    public function show(Article $article)
    {
        return $article;
    }

    // POST /api/articles
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'url' => 'required|url|unique:articles',
            'published_at' => 'nullable|date'
        ]);

        return Article::create($data);
    }

    // PUT /api/articles/{id}
    public function update(Request $request, Article $article)
    {
        $article->update($request->all());
        return $article;
    }

    // DELETE /api/articles/{id}
    public function destroy(Article $article)
    {
        $article->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
