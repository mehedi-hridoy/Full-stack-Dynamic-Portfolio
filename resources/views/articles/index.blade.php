@extends('layouts.app')

@section('title','Blog')

@section('content')
<div class="min-h-screen">
    <!-- Header Section -->
    <div class="mb-10">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-bold text-white mb-3 flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-cyan-400 rounded-xl flex items-center justify-center mr-4 shadow-lg shadow-blue-500/25">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15"/>
                        </svg>
                    </div>
                    Blog
                </h1>
                <p class="text-slate-400 text-lg">Discover insights, tutorials, and stories from the dev world</p>
            </div>
            <div class="flex items-center space-x-3">
                @if($articles->count() > 0)
                    <div class="flex items-center space-x-2 bg-slate-800/50 px-4 py-2 rounded-xl border border-slate-700/50">
                        <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                        <span class="text-sm font-mono text-slate-400">{{ $articles->total() }} articles</span>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @if($articles->count() === 0)
        <!-- Empty State -->
        <div class="flex items-center justify-center min-h-[60vh]">
            <div class="text-center max-w-md">
                <div class="w-24 h-24 bg-gradient-to-r from-slate-700 to-slate-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-2xl">
                    <svg class="w-12 h-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15"/>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-white mb-4">No Articles Yet</h2>
                <p class="text-slate-400 mb-6 leading-relaxed">
                    Your blog is waiting for its first story. Share your knowledge, experiences, and insights with the world.
                </p>
                <a href="{{ route('articles.create') }}" 
                   class="group inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-cyan-500 text-white font-medium rounded-xl shadow-lg shadow-blue-600/25 hover:shadow-blue-600/40 hover:scale-105 transition-all duration-200">
                    <svg class="w-5 h-5 mr-2 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Write Your First Article
                </a>
            </div>
        </div>
    @else
        <!-- Articles Grid -->
        <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-8 mb-12">
            @foreach($articles as $index => $a)
            <article class="group relative">
                <!-- Article Card -->
                <div class="bg-gradient-to-br from-slate-800/50 to-slate-700/50 backdrop-blur-sm border border-slate-700/50 rounded-2xl shadow-2xl hover:shadow-slate-500/10 transition-all duration-300 overflow-hidden hover:scale-105">
                    <a href="{{ route('articles.show', $a->slug) }}" class="block">
                        <!-- Featured Image -->
                        <div class="relative overflow-hidden">
                            @if($a->image_url)
                                <img src="{{ $a->image_url }}" 
                                     alt="{{ $a->title }}" 
                                     class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110">
                                <!-- Image Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            @else
                                <!-- Default Image Placeholder -->
                                <div class="w-full h-48 bg-gradient-to-br from-slate-700 to-slate-600 flex items-center justify-center">
                                    <div class="text-center">
                                        <svg class="w-12 h-12 text-slate-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                        <p class="text-xs text-slate-500 font-mono">No Image</p>
                                    </div>
                                </div>
                            @endif
                            
                            <!-- Reading Time Badge -->
                            <div class="absolute top-4 right-4 bg-slate-900/80 backdrop-blur-sm px-2 py-1 rounded-lg">
                                <span class="text-xs text-slate-300 font-mono">{{ max(1, ceil(str_word_count(strip_tags($a->body)) / 200)) }} min read</span>
                            </div>
                            
                            <!-- Featured Badge for First Article -->
                            @if($index === 0)
                                <div class="absolute top-4 left-4 bg-gradient-to-r from-cyan-500 to-blue-500 px-3 py-1 rounded-lg shadow-lg">
                                    <span class="text-xs text-white font-semibold">Featured</span>
                                </div>
                            @endif
                        </div>

                        <!-- Article Content -->
                        <div class="p-6">
                            <!-- Title -->
                            <h2 class="font-bold text-xl text-white mb-3 line-clamp-2 leading-tight group-hover:text-cyan-300 transition-colors duration-200">
                                {{ $a->title }}
                            </h2>
                            
                            <!-- Excerpt -->
                            @if($a->body)
                                <p class="text-slate-400 text-sm mb-4 line-clamp-3 leading-relaxed">
                                    {{ Str::limit(strip_tags($a->body), 120) }}
                                </p>
                            @endif
                            
                            <!-- Article Meta -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <!-- Date -->
                                    <div class="flex items-center text-slate-500 text-sm">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        <span class="font-mono">{{ optional($a->published_at)->format('M d, Y') }}</span>
                                    </div>
                                </div>
                                
                                <!-- Read More Arrow -->
                                <div class="flex items-center text-cyan-400 opacity-0 group-hover:opacity-100 transition-all duration-200 transform translate-x-2 group-hover:translate-x-0">
                                    <span class="text-sm font-medium mr-1">Read more</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Article Number (Design Element) -->
                <div class="absolute -top-4 -left-4 w-8 h-8 bg-gradient-to-br from-slate-600 to-slate-500 rounded-lg border-2 border-slate-800 flex items-center justify-center shadow-lg">
                    <span class="text-xs font-bold text-white font-mono">{{ str_pad($articles->firstItem() + $index, 2, '0', STR_PAD_LEFT) }}</span>
                </div>
            </article>
            @endforeach
        </div>

        <!-- Pagination -->
        @if($articles->hasPages())
            <div class="flex justify-center">
                <div class="bg-gradient-to-r from-slate-800/50 to-slate-700/50 backdrop-blur-sm border border-slate-700/50 rounded-2xl p-6 shadow-2xl">
                    <div class="flex items-center justify-center">
                        {{ $articles->links() }}
                    </div>
                </div>
            </div>
        @endif

        <!-- Call to Action -->
        <div class="mt-16 text-center">
            <div class="bg-gradient-to-r from-slate-800/30 to-slate-700/30 backdrop-blur-sm border border-slate-700/50 rounded-2xl p-8 shadow-2xl">
                <div class="max-w-2xl mx-auto">
                    <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-emerald-400 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg shadow-green-500/25">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">Have Something to Share?</h3>
                    <p class="text-slate-400 mb-6 leading-relaxed">
                        Join the conversation and share your knowledge with the community. Your insights could inspire and help others on their journey.
                    </p>
                    <a href="{{ route('articles.create') }}" 
                       class="group inline-flex items-center px-8 py-4 bg-gradient-to-r from-green-600 to-emerald-500 text-white font-medium rounded-xl shadow-lg shadow-green-600/25 hover:shadow-green-600/40 hover:scale-105 transition-all duration-200">
                        <svg class="w-5 h-5 mr-2 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                        </svg>
                        Write an Article
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>

<!-- Custom Styles for Enhanced Pagination -->
<style>
.pagination {
    @apply flex items-center space-x-2;
}

.pagination .page-link {
    @apply px-4 py-2 text-sm font-medium text-slate-300 bg-slate-700/50 border border-slate-600 rounded-xl hover:bg-slate-600/50 hover:text-white hover:scale-105 transition-all duration-200;
}

.pagination .page-link.active,
.pagination .page-item.active .page-link {
    @apply bg-gradient-to-r from-cyan-500 to-blue-500 text-white border-cyan-500 shadow-lg shadow-cyan-500/25 scale-105;
}

.pagination .page-link:hover {
    @apply shadow-lg;
}

/* Disabled state */
.pagination .page-item.disabled .page-link {
    @apply opacity-50 cursor-not-allowed hover:scale-100 hover:bg-slate-700/50;
}

/* Previous/Next buttons */
.pagination .page-link[rel="prev"]::before {
    content: '←';
    @apply mr-1;
}

.pagination .page-link[rel="next"]::after {
    content: '→';
    @apply ml-1;
}

/* Card hover effects */
@media (hover: hover) {
    .group:hover .group-hover\:scale-110 {
        transform: scale(1.1);
    }
}

/* Text clamping utilities */
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>

<!-- JavaScript for enhanced interactions -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add stagger animation to article cards
    const articles = document.querySelectorAll('article');
    articles.forEach((article, index) => {
        article.style.animationDelay = `${index * 100}ms`;
        article.classList.add('animate-fade-in-up');
    });

    // Intersection Observer for scroll animations
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });

    articles.forEach(article => {
        article.style.opacity = '0';
        article.style.transform = 'translateY(20px)';
        article.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(article);
    });

    // Smooth scroll for pagination
    const paginationLinks = document.querySelectorAll('.pagination a');
    paginationLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            // Add loading state
            this.style.opacity = '0.7';
            this.innerHTML = '<svg class="w-4 h-4 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>';
        });
    });

    // Enhanced article card interactions
    articles.forEach(article => {
        const card = article.querySelector('.group > div');
        
        article.addEventListener('mouseenter', function() {
            // Add subtle glow effect
            card.style.boxShadow = '0 25px 50px -12px rgba(59, 130, 246, 0.15)';
        });
        
        article.addEventListener('mouseleave', function() {
            // Remove glow effect
            card.style.boxShadow = '';
        });
    });
});
</script>
@endsection