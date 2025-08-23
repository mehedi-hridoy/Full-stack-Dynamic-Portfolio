@extends('layouts.app')

@section('title','Edit: '.$article->title)

@section('content')
<h1 class="text-2xl font-bold mb-6">Edit Article</h1>

<form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-xl shadow p-6 space-y-4">
    @csrf @method('PUT')

    <div>
        <label class="block text-sm font-medium mb-1">Title</label>
        <input name="title" value="{{ old('title', $article->title) }}" class="w-full border rounded-lg px-3 py-2" required>
        @error('title') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Slug</label>
        <input name="slug" value="{{ old('slug', $article->slug) }}" class="w-full border rounded-lg px-3 py-2" required>
        @error('slug') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Image (optional)</label>
        <input type="file" name="image" accept="image/*">
        @if($article->image_path)
            <img src="{{ $article->image_url }}" class="mt-2 w-56 rounded-lg border">
        @endif
        @error('image') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Published At (optional)</label>
        <input type="datetime-local" name="published_at"
               value="{{ old('published_at', optional($article->published_at)->format('Y-m-d\TH:i')) }}"
               class="w-full border rounded-lg px-3 py-2">
        @error('published_at') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Article Text</label>
        <textarea name="body" rows="12" class="w-full border rounded-lg px-3 py-2" required>{{ old('body', $article->body) }}</textarea>
        @error('body') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="flex gap-3">
        <button class="px-4 py-2 rounded-lg bg-blue-600 text-white">Save</button>
        <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 rounded-lg bg-slate-200">Back</a>
    </div>
</form>
@endsection
