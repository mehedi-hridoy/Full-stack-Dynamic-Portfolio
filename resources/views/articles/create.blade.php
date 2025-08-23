@extends('layouts.app')

@section('title','Write Article')

@section('content')
<h1 class="text-2xl font-bold mb-6">Write an Article</h1>

<form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-xl shadow p-6 space-y-4">
    @csrf

    <div>
        <label class="block text-sm font-medium mb-1">Title</label>
        <input name="title" value="{{ old('title') }}" class="w-full border rounded-lg px-3 py-2" required>
        @error('title') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Image (optional)</label>
        <input type="file" name="image" accept="image/*" class="w-full">
        @error('image') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Article Text</label>
        <textarea name="body" rows="10" class="w-full border rounded-lg px-3 py-2" required>{{ old('body') }}</textarea>
        @error('body') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <button class="px-4 py-2 rounded-lg bg-blue-600 text-white">Publish</button>
</form>
@endsection
