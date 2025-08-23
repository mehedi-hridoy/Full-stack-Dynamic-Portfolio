<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    // FRONTEND: list
    public function index()
    {
        $articles = Article::latest('published_at')
            ->latest()
            ->paginate(9);

        return view('articles.index', compact('articles'));
    }

    // FRONTEND: show single
    public function show(string $slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        return view('articles.show', compact('article'));
    }

    // FRONTEND: create form
    public function create()
    {
        return view('articles.create');
    }

    // FRONTEND: store
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required','max:160'],
            'body'  => ['required','min:10'],
            'image' => ['nullable','image','max:2048'],
        ]);

        $slug = Str::slug($data['title']);
        // ensure unique slug
        $base = $slug;
        $i = 1;
        while (Article::where('slug', $slug)->exists()) {
            $slug = $base.'-'.$i++;
        }

        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('articles', 'public');
        }

        $article = Article::create([
            'title'        => $data['title'],
            'slug'         => $slug,
            'body'         => $data['body'],
            'image_path'   => $path,
            'published_at' => now(),
        ]);

        return redirect()->route('articles.show', $article->slug)
            ->with('success', 'Article created!');
    }

    // ADMIN: dashboard list
    public function admin()
    {
        $articles = Article::latest()->paginate(15);
        $stats = [
            'total' => Article::count(),
            'published' => Article::whereNotNull('published_at')->count(),
            'latest' => Article::latest()->first(),
        ];
        return view('admin.dashboard', compact('articles','stats'));
    }

    // ADMIN: edit
    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    // ADMIN: update
    public function update(Request $request, Article $article)
    {
        $data = $request->validate([
            'title' => ['required','max:160'],
            'slug'  => ['required','max:180', Rule::unique('articles','slug')->ignore($article->id)],
            'body'  => ['required','min:10'],
            'image' => ['nullable','image','max:2048'],
            'published_at' => ['nullable','date'],
        ]);

        if ($request->hasFile('image')) {
            if ($article->image_path) {
                Storage::disk('public')->delete($article->image_path);
            }
            $data['image_path'] = $request->file('image')->store('articles', 'public');
        }

        $article->update($data);

        return redirect()->route('admin.dashboard')->with('success','Updated.');
    }

    // ADMIN: delete
    public function destroy(Article $article)
    {
        if ($article->image_path) {
            Storage::disk('public')->delete($article->image_path);
        }
        $article->delete();

        return back()->with('success','Deleted.');
    }
}
