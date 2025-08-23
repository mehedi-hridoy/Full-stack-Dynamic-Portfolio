@extends('layouts.app')

@section('title','Admin')

@section('content')
<h1 class="text-2xl font-bold mb-6">Admin Dashboard</h1>

<div class="grid md:grid-cols-3 gap-4 mb-6">
    <div class="bg-white rounded-xl shadow p-4">
        <p class="text-slate-500 text-sm">Total Articles</p>
        <p class="text-3xl font-bold">{{ $stats['total'] }}</p>
    </div>
    <div class="bg-white rounded-xl shadow p-4">
        <p class="text-slate-500 text-sm">Published</p>
        <p class="text-3xl font-bold">{{ $stats['published'] }}</p>
    </div>
    <div class="bg-white rounded-xl shadow p-4">
        <p class="text-slate-500 text-sm">Latest</p>
        <p class="font-semibold line-clamp-1">
            {{ optional($stats['latest'])->title ?? '—' }}
        </p>
    </div>
</div>

<div class="bg-white rounded-xl shadow overflow-x-auto">
    <table class="min-w-full text-sm">
        <thead class="bg-slate-100 text-left">
            <tr>
                <th class="p-3">#</th>
                <th class="p-3">Title</th>
                <th class="p-3">Slug</th>
                <th class="p-3">Published</th>
                <th class="p-3">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($articles as $a)
            <tr class="border-t">
                <td class="p-3">{{ $a->id }}</td>
                <td class="p-3">{{ $a->title }}</td>
                <td class="p-3 text-slate-500">{{ $a->slug }}</td>
                <td class="p-3">{{ optional($a->published_at)->format('M d, Y') }}</td>
                <td class="p-3">
                    <a href="{{ route('articles.show', $a->slug) }}" class="text-blue-600 hover:underline">View</a>
                    <a href="{{ route('admin.articles.edit', $a) }}" class="ml-3 text-amber-600 hover:underline">Edit</a>
                    <form action="{{ route('admin.articles.destroy', $a) }}" method="POST" class="inline" onsubmit="return confirm('Delete this article?')">
                        @csrf @method('DELETE')
                        <button class="ml-3 text-red-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $articles->links() }}
</div>
@endsection
