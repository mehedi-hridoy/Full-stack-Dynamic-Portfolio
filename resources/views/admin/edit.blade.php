@extends('layouts.app')

@section('title','Edit: '.$article->title)

@section('content')
<div class="min-h-screen">
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-white mb-2 flex items-center">
                    <div class="w-8 h-8 bg-amber-500/20 rounded-lg flex items-center justify-center mr-3">
                        <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </div>
                    Edit Article
                </h1>
                <p class="text-slate-400">Modify your content with precision</p>
            </div>
            <div class="flex items-center space-x-3">
                <div class="flex items-center space-x-2 bg-slate-800/50 px-3 py-1 rounded-lg border border-slate-700/50">
                    <div class="w-2 h-2 bg-amber-400 rounded-full animate-pulse"></div>
                    <span class="text-xs font-mono text-slate-400">EDITING</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Form -->
    <form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data" 
          class="bg-gradient-to-r from-slate-800/50 to-slate-700/50 backdrop-blur-sm border border-slate-700/50 rounded-2xl shadow-2xl overflow-hidden">
        @csrf @method('PUT')
        
        <!-- Form Header -->
        <div class="px-8 py-6 bg-slate-800/70 border-b border-slate-700">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold text-white flex items-center">
                    <span class="w-2 h-2 bg-cyan-400 rounded-full mr-3"></span>
                    Article Details
                </h2>
                <div class="text-xs font-mono text-slate-400 bg-slate-700/50 px-3 py-1 rounded-full">
                    ID: {{ str_pad($article->id, 3, '0', STR_PAD_LEFT) }}
                </div>
            </div>
        </div>

        <!-- Form Content -->
        <div class="p-8 space-y-8">
            <!-- Title Field -->
            <div class="space-y-3">
                <label class="flex items-center text-sm font-medium text-slate-300 mb-2">
                    <svg class="w-4 h-4 mr-2 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                    Article Title
                    <span class="text-red-400 ml-1">*</span>
                </label>
                <input name="title" 
                       value="{{ old('title', $article->title) }}" 
                       class="w-full bg-slate-700/50 border border-slate-600 rounded-xl px-4 py-3 text-white placeholder-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all duration-200" 
                       placeholder="Enter a compelling title..."
                       required>
                @error('title') 
                    <div class="flex items-center mt-2 text-red-300 text-sm">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Slug Field -->
            <div class="space-y-3">
                <label class="flex items-center text-sm font-medium text-slate-300 mb-2">
                    <svg class="w-4 h-4 mr-2 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                    </svg>
                    URL Slug
                    <span class="text-red-400 ml-1">*</span>
                </label>
                <div class="relative">
                    <input name="slug" 
                           value="{{ old('slug', $article->slug) }}" 
                           class="w-full bg-slate-700/50 border border-slate-600 rounded-xl px-4 py-3 text-white placeholder-slate-400 focus:border-green-500 focus:ring-2 focus:ring-green-500/20 transition-all duration-200 font-mono text-sm" 
                           placeholder="article-url-slug"
                           required>
                    <div class="absolute right-3 top-3 text-slate-500 text-sm font-mono">.html</div>
                </div>
                @error('slug') 
                    <div class="flex items-center mt-2 text-red-300 text-sm">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Image Upload -->
            <div class="space-y-3">
                <label class="flex items-center text-sm font-medium text-slate-300 mb-2">
                    <svg class="w-4 h-4 mr-2 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    Featured Image
                    <span class="text-slate-500 ml-2 text-xs">(optional)</span>
                </label>
                
                <div class="relative">
                    <input type="file" 
                           name="image" 
                           accept="image/*" 
                           class="w-full bg-slate-700/50 border border-slate-600 rounded-xl px-4 py-3 text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-purple-500/20 file:text-purple-300 hover:file:bg-purple-500/30 transition-all duration-200">
                </div>

                @if($article->image_path)
                    <div class="mt-4 p-4 bg-slate-700/30 rounded-xl border border-slate-600/50">
                        <p class="text-sm text-slate-400 mb-3 flex items-center">
                            <svg class="w-4 h-4 mr-1 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Current Image:
                        </p>
                        <img src="{{ $article->image_url }}" 
                             class="w-64 h-40 object-cover rounded-lg border border-slate-600 shadow-lg hover:scale-105 transition-transform duration-200">
                    </div>
                @endif

                @error('image') 
                    <div class="flex items-center mt-2 text-red-300 text-sm">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Published At -->
            <div class="space-y-3">
                <label class="flex items-center text-sm font-medium text-slate-300 mb-2">
                    <svg class="w-4 h-4 mr-2 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Publish Date & Time
                    <span class="text-slate-500 ml-2 text-xs">(leave empty for draft)</span>
                </label>
                <input type="datetime-local" 
                       name="published_at"
                       value="{{ old('published_at', optional($article->published_at)->format('Y-m-d\TH:i')) }}"
                       class="w-full bg-slate-700/50 border border-slate-600 rounded-xl px-4 py-3 text-white focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 transition-all duration-200">
                @error('published_at') 
                    <div class="flex items-center mt-2 text-red-300 text-sm">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Article Content -->
            <div class="space-y-3">
                <label class="flex items-center text-sm font-medium text-slate-300 mb-2">
                    <svg class="w-4 h-4 mr-2 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Article Content
                    <span class="text-red-400 ml-1">*</span>
                </label>
                <div class="relative">
                    <textarea name="body" 
                              rows="16" 
                              class="w-full bg-slate-700/50 border border-slate-600 rounded-xl px-4 py-3 text-white placeholder-slate-400 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20 transition-all duration-200 resize-none font-mono text-sm leading-relaxed" 
                              placeholder="Write your article content here... Supports Markdown!"
                              required>{{ old('body', $article->body) }}</textarea>
                    
                    <!-- Character counter -->
                    <div class="absolute bottom-3 right-3 text-xs text-slate-500 bg-slate-800/50 px-2 py-1 rounded">
                        <span id="charCount">{{ strlen($article->body) }}</span> characters
                    </div>
                </div>
                @error('body') 
                    <div class="flex items-center mt-2 text-red-300 text-sm">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <!-- Form Actions -->
        <div class="px-8 py-6 bg-slate-800/50 border-t border-slate-700">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <button type="submit" 
                            class="group inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-500 text-white font-medium rounded-xl shadow-lg shadow-blue-600/25 hover:shadow-blue-600/40 hover:scale-105 transition-all duration-200">
                        <svg class="w-4 h-4 mr-2 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Update Article
                    </button>
                    
                    <a href="{{ route('admin.dashboard') }}" 
                       class="group inline-flex items-center px-6 py-3 bg-slate-600/50 text-slate-300 font-medium rounded-xl border border-slate-500/50 hover:bg-slate-600/70 hover:scale-105 transition-all duration-200">
                        <svg class="w-4 h-4 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Back to Dashboard
                    </a>
                </div>

                <!-- Save indicator -->
                <div class="flex items-center space-x-2 text-slate-400">
                    <div class="w-2 h-2 bg-slate-500 rounded-full"></div>
                    <span class="text-xs font-mono">AUTO-SAVE: OFF</span>
                </div>
            </div>
        </div>
    </form>

    <!-- Tips Section -->
    <div class="mt-8 grid md:grid-cols-3 gap-4">
        <div class="bg-gradient-to-r from-blue-500/10 to-cyan-500/10 backdrop-blur-sm border border-blue-500/20 rounded-xl p-4">
            <div class="flex items-center mb-2">
                <div class="w-6 h-6 bg-blue-500/20 rounded-lg flex items-center justify-center mr-2">
                    <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-sm font-semibold text-blue-300">Pro Tip</h3>
            </div>
            <p class="text-xs text-slate-400">Use descriptive titles and URL-friendly slugs for better SEO performance.</p>
        </div>

        <div class="bg-gradient-to-r from-green-500/10 to-emerald-500/10 backdrop-blur-sm border border-green-500/20 rounded-xl p-4">
            <div class="flex items-center mb-2">
                <div class="w-6 h-6 bg-green-500/20 rounded-lg flex items-center justify-center mr-2">
                    <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-sm font-semibold text-green-300">Markdown</h3>
            </div>
            <p class="text-xs text-slate-400">Content supports Markdown formatting for rich text styling.</p>
        </div>

        <div class="bg-gradient-to-r from-purple-500/10 to-pink-500/10 backdrop-blur-sm border border-purple-500/20 rounded-xl p-4">
            <div class="flex items-center mb-2">
                <div class="w-6 h-6 bg-purple-500/20 rounded-lg flex items-center justify-center mr-2">
                    <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-sm font-semibold text-purple-300">Scheduling</h3>
            </div>
            <p class="text-xs text-slate-400">Set future publish dates to schedule content releases.</p>
        </div>
    </div>
</div>

<!-- JavaScript for enhanced functionality -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Character counter for textarea
    const textarea = document.querySelector('textarea[name="body"]');
    const charCount = document.getElementById('charCount');
    
    if (textarea && charCount) {
        textarea.addEventListener('input', function() {
            charCount.textContent = this.value.length;
        });
    }

    // Auto-generate slug from title
    const titleInput = document.querySelector('input[name="title"]');
    const slugInput = document.querySelector('input[name="slug"]');
    
    if (titleInput && slugInput) {
        titleInput.addEventListener('input', function() {
            if (slugInput.value === '' || slugInput.dataset.auto !== 'false') {
                const slug = this.value
                    .toLowerCase()
                    .replace(/[^a-z0-9 -]/g, '')
                    .replace(/\s+/g, '-')
                    .replace(/-+/g, '-')
                    .trim('-');
                slugInput.value = slug;
            }
        });
        
        slugInput.addEventListener('input', function() {
            this.dataset.auto = 'false';
        });
    }

    // Form validation enhancement
    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
        const requiredFields = form.querySelectorAll('[required]');
        let hasError = false;
        
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                field.classList.add('border-red-500', 'ring-2', 'ring-red-500/20');
                hasError = true;
            } else {
                field.classList.remove('border-red-500', 'ring-2', 'ring-red-500/20');
            }
        });
        
        if (hasError) {
            e.preventDefault();
            // Scroll to first error
            const firstError = form.querySelector('.border-red-500');
            if (firstError) {
                firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                firstError.focus();
            }
        }
    });
});
</script>
@endsection