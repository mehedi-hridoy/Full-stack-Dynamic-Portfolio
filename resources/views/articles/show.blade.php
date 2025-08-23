@extends('layouts.app')

@section('title', $article->title)

@section('content')
<article class="bg-white rounded-xl shadow overflow-hidden">
    <img src="{{ $article->image_url }}" class="w-full max-h-[420px] object-cover" alt="">
    <div class="p-6">
        <h1 class="text-3xl font-bold mb-2">{{ $article->title }}</h1>
        <p class="text-sm text-slate-600 mb-6">{{ optional($article->published_at)->format('M d, Y H:i') }}</p>
        <div class="prose max-w-none">
            {!! nl2br(e($article->body)) !!}
        </div>
    </div>
</article>
@endsection
