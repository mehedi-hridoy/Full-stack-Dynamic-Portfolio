@extends('layouts.app')

@section('title', $article->title)

@section('content')
<div class="min-h-screen">
    <!-- Back Navigation -->
    <div class="mb-8">
        <a href="{{ route('articles.index') }}" 
           class="group inline-flex items-center text-slate-400 hover:text-white transition-colors duration-200">
            <svg class="w-4 h-4 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            <span class="text-sm font-medium">Back to Blog</span>
        </a>
    </div>

    <!-- Article Container -->
    <article class="bg-gradient-to-br from-slate-800/50 to-slate-700/50 backdrop-blur-sm border border-slate-700/50 rounded-2xl shadow-2xl overflow-hidden">
        
        <!-- Hero Image Section -->
        @if($article->image_url)
            <div class="relative overflow-hidden">
                <img src="{{ $article->image_url }}" 
                     class="w-full max-h-[500px] object-cover" 
                     alt="{{ $article->title }}">
                <!-- Image Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-transparent to-transparent"></div>
                
                <!-- Reading Stats Overlay -->
                <div class="absolute bottom-6 left-6 flex items-center space-x-4">
                    <div class="bg-slate-900/80 backdrop-blur-sm px-3 py-2 rounded-lg border border-slate-700/50">
                        <div class="flex items-center text-slate-300 text-sm">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="font-mono">{{ max(1, ceil(str_word_count(strip_tags($article->body)) / 200)) }} min read</span>
                        </div>
                    </div>
                    <div class="bg-slate-900/80 backdrop-blur-sm px-3 py-2 rounded-lg border border-slate-700/50">
                        <div class="flex items-center text-slate-300 text-sm">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <span class="font-mono">{{ str_word_count(strip_tags($article->body)) }} words</span>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Article Header -->
        <div class="px-8 py-8 {{ $article->image_url ? 'border-b border-slate-700/50' : '' }}">
            <div class="max-w-4xl mx-auto">
                <!-- Article Meta -->
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center space-x-4">
                        <!-- Author Info -->
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-xl flex items-center justify-center shadow-lg">
                                <span class="text-white font-bold text-sm">MH</span>
                            </div>
                            <div>
                                <p class="text-white font-semibold">Mehedi Hasan Hridoy</p>
                                <p class="text-slate-400 text-sm">Full Stack Developer</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Article Status -->
                    <div class="flex items-center space-x-3">
                        <div class="flex items-center space-x-2 bg-slate-800/50 px-3 py-1 rounded-lg border border-slate-700/50">
                            <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                            <span class="text-xs font-mono text-slate-400">PUBLISHED</span>
                        </div>
                    </div>
                </div>

                <!-- Article Title -->
                <h1 class="text-4xl md:text-5xl font-bold text-white leading-tight mb-4">
                    {{ $article->title }}
                </h1>

                <!-- Publication Date -->
                <div class="flex items-center text-slate-400 mb-6">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span class="font-mono text-sm">
                        Published {{ optional($article->published_at)->format('M d, Y \a\t H:i') }}
                    </span>
                </div>

                @if(!$article->image_url)
                    <!-- Reading Stats (when no image) -->
                    <div class="flex items-center space-x-4 mb-6">
                        <div class="bg-slate-700/50 px-4 py-2 rounded-lg border border-slate-600/50">
                            <div class="flex items-center text-slate-300 text-sm">
                                <svg class="w-4 h-4 mr-2 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="font-mono">{{ max(1, ceil(str_word_count(strip_tags($article->body)) / 200)) }} min read</span>
                            </div>
                        </div>
                        <div class="bg-slate-700/50 px-4 py-2 rounded-lg border border-slate-600/50">
                            <div class="flex items-center text-slate-300 text-sm">
                                <svg class="w-4 h-4 mr-2 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <span class="font-mono">{{ str_word_count(strip_tags($article->body)) }} words</span>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Article Content -->
        <div class="px-8 py-10">
            <div class="max-w-4xl mx-auto">
                <!-- Content with enhanced typography -->
                <div class="prose prose-lg prose-invert max-w-none 
                           prose-headings:text-white prose-headings:font-bold 
                           prose-p:text-slate-300 prose-p:leading-relaxed prose-p:mb-6
                           prose-strong:text-white prose-em:text-slate-200
                           prose-code:text-cyan-300 prose-code:bg-slate-800/50 prose-code:px-2 prose-code:py-1 prose-code:rounded
                           prose-pre:bg-slate-900 prose-pre:border prose-pre:border-slate-700
                           prose-blockquote:border-l-4 prose-blockquote:border-cyan-500 prose-blockquote:bg-slate-800/30 prose-blockquote:p-4 prose-blockquote:rounded-r
                           prose-ul:text-slate-300 prose-ol:text-slate-300
                           prose-li:text-slate-300 prose-li:mb-2
                           prose-a:text-cyan-400 prose-a:no-underline hover:prose-a:text-cyan-300
                           text-lg">
                    
                    <!-- Article Body -->
                    <div class="article-content">
                        {!! nl2br(e($article->body)) !!}
                    </div>
                </div>
            </div>
        </div>

        <!-- Article Footer -->
        <div class="px-8 py-6 bg-slate-800/50 border-t border-slate-700">
            <div class="max-w-4xl mx-auto">
                <div class="flex items-center justify-between">
                    <!-- Tags/Categories (if you add them later) -->
                    <div class="flex items-center space-x-2">
                        <span class="text-slate-400 text-sm">Topics:</span>
                        <div class="flex space-x-2">
                            <span class="px-3 py-1 bg-slate-700/50 text-slate-300 text-sm rounded-lg border border-slate-600/50 font-mono">
                                Article
                            </span>
                            <span class="px-3 py-1 bg-slate-700/50 text-slate-300 text-sm rounded-lg border border-slate-600/50 font-mono">
                                Blog
                            </span>
                        </div>
                    </div>

                    <!-- Share Actions -->
                    <div class="flex items-center space-x-3">
                        <span class="text-slate-400 text-sm mr-2">Share:</span>
                        <button onclick="copyToClipboard()" class="group p-2 bg-slate-700/50 hover:bg-blue-500/20 text-slate-400 hover:text-blue-400 rounded-lg border border-slate-600/50 hover:border-blue-500/50 transition-all duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                            </svg>
                        </button>
                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($article->title) }}&url={{ urlencode(request()->fullUrl()) }}" 
                           target="_blank"
                           class="group p-2 bg-slate-700/50 hover:bg-blue-500/20 text-slate-400 hover:text-blue-400 rounded-lg border border-slate-600/50 hover:border-blue-500/50 transition-all duration-200">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </article>

    <!-- Navigation to Other Articles -->
    <div class="mt-12">
        <div class="bg-gradient-to-r from-slate-800/30 to-slate-700/30 backdrop-blur-sm border border-slate-700/50 rounded-2xl p-8">
            <h3 class="text-xl font-semibold text-white mb-6 flex items-center">
                <svg class="w-5 h-5 mr-2 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15"/>
                </svg>
                Continue Reading
            </h3>
            <div class="flex items-center justify-between">
                <a href="{{ route('articles.index') }}" 
                   class="group inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-cyan-500 text-white font-medium rounded-xl shadow-lg shadow-blue-600/25 hover:shadow-blue-600/40 hover:scale-105 transition-all duration-200">
                    <svg class="w-4 h-4 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15"/>
                    </svg>
                    View All Articles
                </a>
                <a href="{{ route('articles.create') }}" 
                   class="group inline-flex items-center px-6 py-3 bg-slate-700/50 text-slate-300 font-medium rounded-xl border border-slate-600/50 hover:bg-slate-700/70 hover:scale-105 transition-all duration-200">
                    <svg class="w-4 h-4 mr-2 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Write Your Own
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Custom Styles -->
<style>
/* Enhanced article content styling */
.article-content {
    line-height: 1.8;
}

.article-content p {
    margin-bottom: 1.5rem;
    color: rgb(203 213 225);
}

.article-content h1,
.article-content h2,
.article-content h3,
.article-content h4,
.article-content h5,
.article-content h6 {
    color: white;
    font-weight: 700;
    margin: 2rem 0 1rem 0;
}

.article-content h1 { font-size: 2.25rem; }
.article-content h2 { font-size: 1.875rem; }
.article-content h3 { font-size: 1.5rem; }
.article-content h4 { font-size: 1.25rem; }

.article-content ul,
.article-content ol {
    margin: 1.5rem 0;
    padding-left: 1.5rem;
}

.article-content li {
    margin-bottom: 0.5rem;
    color: rgb(203 213 225);
}

.article-content blockquote {
    border-left: 4px solid rgb(6 182 212);
    background: rgba(15, 23, 42, 0.3);
    padding: 1rem 1.5rem;
    margin: 2rem 0;
    border-radius: 0 0.5rem 0.5rem 0;
}

.article-content code {
    background: rgba(15, 23, 42, 0.5);
    color: rgb(103 232 249);
    padding: 0.25rem 0.5rem;
    border-radius: 0.25rem;
    font-size: 0.875rem;
}

.article-content pre {
    background: rgb(15, 23, 42);
    border: 1px solid rgb(51, 65, 85);
    padding: 1rem;
    border-radius: 0.5rem;
    overflow-x: auto;
    margin: 1.5rem 0;
}

.article-content a {
    color: rgb(6 182 212);
    text-decoration: none;
    border-bottom: 1px solid transparent;
    transition: all 0.2s;
}

.article-content a:hover {
    color: rgb(103 232 249);
    border-bottom-color: rgb(103 232 249);
}

/* Copy notification */
.copy-notification {
    position: fixed;
    top: 2rem;
    right: 2rem;
    background: rgb(15, 23, 42);
    border: 1px solid rgb(6 182 212);
    color: white;
    padding: 0.75rem 1rem;
    border-radius: 0.5rem;
    transform: translateX(100%);
    opacity: 0;
    transition: all 0.3s ease;
    z-index: 1000;
}

.copy-notification.show {
    transform: translateX(0);
    opacity: 1;
}
</style>

<!-- JavaScript for enhanced functionality -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scroll for back navigation
    const backLink = document.querySelector('a[href*="articles.index"]');
    
    // Copy to clipboard functionality
    window.copyToClipboard = function() {
        const url = window.location.href;
        navigator.clipboard.writeText(url).then(function() {
            showCopyNotification();
        });
    };

    function showCopyNotification() {
        // Create notification if it doesn't exist
        let notification = document.querySelector('.copy-notification');
        if (!notification) {
            notification = document.createElement('div');
            notification.className = 'copy-notification';
            notification.innerHTML = `
                <div class="flex items-center">
                    <svg class="w-4 h-4 mr-2 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Article link copied!
                </div>
            `;
            document.body.appendChild(notification);
        }

        // Show notification
        notification.classList.add('show');
        
        // Hide notification after 3 seconds
        setTimeout(() => {
            notification.classList.remove('show');
        }, 3000);
    }

    // Reading progress indicator (optional enhancement)
    const article = document.querySelector('article');
    const progressBar = document.createElement('div');
    progressBar.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        width: 0%;
        height: 3px;
        background: linear-gradient(90deg, rgb(6 182 212), rgb(59 130 246));
        z-index: 1000;
        transition: width 0.1s ease;
    `;
    document.body.appendChild(progressBar);

    // Update progress on scroll
    window.addEventListener('scroll', () => {
        const articleTop = article.offsetTop;
        const articleHeight = article.offsetHeight;
        const windowTop = window.pageYOffset;
        const windowHeight = window.innerHeight;
        
        const progress = Math.min(
            Math.max((windowTop - articleTop + windowHeight) / articleHeight, 0),
            1
        ) * 100;
        
        progressBar.style.width = progress + '%';
    });

    // Enhanced link interactions
    const links = document.querySelectorAll('.article-content a');
    links.forEach(link => {
        // Add external link indicator
        if (link.hostname !== window.location.hostname) {
            link.innerHTML += ' <svg class="inline w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>';
            link.target = '_blank';
            link.rel = 'noopener noreferrer';
        }
    });

    // Fade in animation for content
    const contentElements = document.querySelectorAll('.prose > *');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });

    contentElements.forEach((element, index) => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(20px)';
        element.style.transition = `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`;
        observer.observe(element);
    });
});
</script>
@endsection