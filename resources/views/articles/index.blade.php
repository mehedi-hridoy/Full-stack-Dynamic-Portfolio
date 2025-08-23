@extends('layouts.app')

@section('title','Blog')

@section('content')
<h1 class="text-2xl font-bold mb-6">Blog</h1>

@if($articles->count() === 0)
    <p>No articles yet. <a class="text-blue-600 underline" href="{{ route('articles.create') }}">Write one</a>.</p>
@else
<div class="grid md:grid-cols-3 gap-6">
    @foreach($articles as $a)
    <article class="bg-white rounded-xl shadow p-4">
        <a href="{{ route('articles.show', $a->slug) }}">
            <img src="{{ $a->image_url }}" alt="" class="w-full h-40 object-cover rounded-lg mb-3">
            <h2 class="font-semibold text-lg mb-2 line-clamp-2">{{ $a->title }}</h2>
        </a>
        <p class="text-sm text-slate-600">{{ optional($a->published_at)->format('M d, Y') }}</p>
    </article>
    @endforeach
</div>

<div class="mt-6">{{ $articles->links() }}</div>
@endif
@endsection
