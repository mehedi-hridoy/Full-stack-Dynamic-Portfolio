@extends('layouts.app')

@section('title','Admin')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-gray-900 to-slate-800">
    <div class="container mx-auto px-6 py-8">
        <!-- Header -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-white mb-2">Admin Dashboard</h1>
                <p class="text-slate-400">Manage your content with precision</p>
            </div>
            <div class="flex items-center space-x-3">
                <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                <span class="text-sm text-slate-400 font-mono">System Online</span>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid md:grid-cols-3 gap-6 mb-8">
            <div class="bg-gradient-to-r from-slate-800/50 to-slate-700/50 backdrop-blur-sm border border-slate-700/50 rounded-2xl p-6 shadow-2xl hover:shadow-slate-500/10 transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-2 bg-blue-500/20 rounded-lg">
                        <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <span class="text-xs font-mono text-slate-500 bg-slate-800/50 px-2 py-1 rounded">TOTAL</span>
                </div>
                <p class="text-slate-400 text-sm mb-2">Total Articles</p>
                <p class="text-4xl font-bold text-white font-mono">{{ $stats['total'] }}</p>
                <div class="mt-3 h-1 bg-slate-700 rounded-full overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-blue-500 to-cyan-400 rounded-full w-3/4"></div>
                </div>
            </div>
            
            <div class="bg-gradient-to-r from-slate-800/50 to-slate-700/50 backdrop-blur-sm border border-slate-700/50 rounded-2xl p-6 shadow-2xl hover:shadow-slate-500/10 transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-2 bg-green-500/20 rounded-lg">
                        <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <span class="text-xs font-mono text-slate-500 bg-slate-800/50 px-2 py-1 rounded">LIVE</span>
                </div>
                <p class="text-slate-400 text-sm mb-2">Published</p>
                <p class="text-4xl font-bold text-white font-mono">{{ $stats['published'] }}</p>
                <div class="mt-3 h-1 bg-slate-700 rounded-full overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-green-500 to-emerald-400 rounded-full w-5/6"></div>
                </div>
            </div>
            
            <div class="bg-gradient-to-r from-slate-800/50 to-slate-700/50 backdrop-blur-sm border border-slate-700/50 rounded-2xl p-6 shadow-2xl hover:shadow-slate-500/10 transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-2 bg-purple-500/20 rounded-lg">
                        <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <span class="text-xs font-mono text-slate-500 bg-slate-800/50 px-2 py-1 rounded">RECENT</span>
                </div>
                <p class="text-slate-400 text-sm mb-2">Latest Article</p>
                <p class="text-lg font-semibold text-white line-clamp-2 leading-tight">
                    {{ optional($stats['latest'])->title ?? 'No articles yet' }}
                </p>
            </div>
        </div>

        <!-- Articles Table -->
        <div class="bg-gradient-to-r from-slate-800/50 to-slate-700/50 backdrop-blur-sm border border-slate-700/50 rounded-2xl shadow-2xl overflow-hidden">
            <!-- Table Header -->
            <div class="px-6 py-4 bg-slate-800/70 border-b border-slate-700">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-semibold text-white flex items-center">
                        <span class="w-2 h-2 bg-cyan-400 rounded-full mr-3"></span>
                        Articles Management
                    </h2>
                    <span class="text-xs font-mono text-slate-400 bg-slate-700/50 px-3 py-1 rounded-full">{{ $articles->count() }} items</span>
                </div>
            </div>

            <!-- Table Content -->
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="bg-slate-800/50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-slate-400 uppercase tracking-wider font-mono">
                                <span class="flex items-center">
                                    #
                                    <svg class="w-3 h-3 ml-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3z"/>
                                    </svg>
                                </span>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-slate-400 uppercase tracking-wider font-mono">Title</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-slate-400 uppercase tracking-wider font-mono">Slug</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-slate-400 uppercase tracking-wider font-mono">Status</th>
                            <th class="px-6 py-4 text-right text-xs font-medium text-slate-400 uppercase tracking-wider font-mono">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-700/50">
                    @foreach($articles as $a)
                        <tr class="hover:bg-slate-700/30 transition-colors duration-200 group">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm font-mono text-slate-300 bg-slate-700/50 px-2 py-1 rounded group-hover:bg-slate-600/50 transition-colors">
                                    {{ str_pad($a->id, 3, '0', STR_PAD_LEFT) }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-white group-hover:text-cyan-300 transition-colors">
                                    {{ Str::limit($a->title, 50) }}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <code class="text-sm text-slate-400 bg-slate-800/50 px-2 py-1 rounded font-mono">
                                    {{ Str::limit($a->slug, 30) }}
                                </code>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($a->published_at)
                                    <div class="flex items-center">
                                        <div class="w-2 h-2 bg-green-400 rounded-full mr-2"></div>
                                        <span class="text-sm text-green-300 font-medium">Published</span>
                                        <span class="text-xs text-slate-500 ml-2 font-mono">
                                            {{ $a->published_at->format('M d, Y') }}
                                        </span>
                                    </div>
                                @else
                                    <div class="flex items-center">
                                        <div class="w-2 h-2 bg-amber-400 rounded-full mr-2"></div>
                                        <span class="text-sm text-amber-300 font-medium">Draft</span>
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="{{ route('articles.show', $a->slug) }}" 
                                       class="inline-flex items-center px-3 py-1 text-xs font-medium bg-blue-500/20 text-blue-300 rounded-lg hover:bg-blue-500/30 border border-blue-500/30 transition-all duration-200 hover:scale-105">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                        View
                                    </a>
                                    <a href="{{ route('admin.articles.edit', $a) }}" 
                                       class="inline-flex items-center px-3 py-1 text-xs font-medium bg-amber-500/20 text-amber-300 rounded-lg hover:bg-amber-500/30 border border-amber-500/30 transition-all duration-200 hover:scale-105">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.articles.destroy', $a) }}" method="POST" class="inline" onsubmit="return confirm('⚠️ Delete this article permanently?\n\nThis action cannot be undone.')">
                                        @csrf @method('DELETE')
                                        <button class="inline-flex items-center px-3 py-1 text-xs font-medium bg-red-500/20 text-red-300 rounded-lg hover:bg-red-500/30 border border-red-500/30 transition-all duration-200 hover:scale-105">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-6 flex justify-center">
            <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700/50 rounded-xl p-4">
                {{ $articles->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Custom Styles for Pagination -->
<style>
.pagination {
    @apply flex space-x-1;
}

.pagination .page-link {
    @apply px-3 py-2 text-sm font-medium text-slate-300 bg-slate-700/50 border border-slate-600 rounded-lg hover:bg-slate-600/50 hover:text-white transition-all duration-200;
}

.pagination .page-link.active,
.pagination .page-item.active .page-link {
    @apply bg-cyan-500 text-white border-cyan-500 shadow-lg shadow-cyan-500/25;
}

.pagination .page-link:hover {
    @apply scale-105;
}

/* Custom scrollbar */
::-webkit-scrollbar {
    height: 8px;
    width: 8px;
}

::-webkit-scrollbar-track {
    @apply bg-slate-800 rounded;
}

::-webkit-scrollbar-thumb {
    @apply bg-slate-600 rounded;
}

::-webkit-scrollbar-thumb:hover {
    @apply bg-slate-500;
}
</style>
@endsection