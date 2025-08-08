<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('category')->get();
        $categories = Category::all();
        return view('article.index', compact('articles', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('article.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title'       => 'required|string|max:255',
            'content'     => 'required|string',
            'image'       => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('articles', 'public');
            $validated['image'] = basename($imagePath);
        }

        Article::create($validated);
        return redirect()->route('article.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('article.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title'       => 'required|string|max:255',
            'content'     => 'required|string',
            'image'       => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($article->image && Storage::disk('public')->exists('articles/' . $article->image)) {
                Storage::disk('public')->delete('articles/' . $article->image);
            }

            $imagePath = $request->file('image')->store('articles', 'public');
            $validated['image'] = basename($imagePath);
        }

        $article->update($validated);
        return redirect()->route('article.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Article $article)
    {
        if ($article->image && Storage::disk('public')->exists('articles/' . $article->image)) {
            Storage::disk('public')->delete('articles/' . $article->image);
        }

        $article->delete();
        return redirect()->route('article.index')->with('success', 'Artikel berhasil dihapus.');
    }
    public function show($id)
    {
        $article = Article::find($id);
        if (!$article) {
            abort(404); // Atau redirect dengan pesan error
        }
        return view('article.show', compact('article'));
    }
}
