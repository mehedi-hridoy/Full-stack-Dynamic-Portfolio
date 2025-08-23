@extends('layouts.app')

@section('title','Write Article')

@section('content')
<div class="min-h-screen">
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-white mb-2 flex items-center">
                    <div class="w-8 h-8 bg-green-500/20 rounded-lg flex items-center justify-center mr-3">
                        <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                    </div>
                    Write an Article
                </h1>
                <p class="text-slate-400">Create compelling content for your audience</p>
            </div>
            <div class="flex items-center space-x-3">
                <div class="flex items-center space-x-2 bg-slate-800/50 px-3 py-1 rounded-lg border border-slate-700/50">
                    <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                    <span class="text-xs font-mono text-slate-400">DRAFT MODE</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Creation Form -->
    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data" 
          class="bg-gradient-to-r from-slate-800/50 to-slate-700/50 backdrop-blur-sm border border-slate-700/50 rounded-2xl shadow-2xl overflow-hidden">
        @csrf
        
        <!-- Form Header -->
        <div class="px-8 py-6 bg-slate-800/70 border-b border-slate-700">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold text-white flex items-center">
                    <span class="w-2 h-2 bg-cyan-400 rounded-full mr-3"></span>
                    New Article
                </h2>
                <div class="text-xs font-mono text-slate-400 bg-slate-700/50 px-3 py-1 rounded-full">
                    <span id="saveStatus">UNSAVED</span>
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
                       value="{{ old('title') }}" 
                       class="w-full bg-slate-700/50 border border-slate-600 rounded-xl px-4 py-3 text-white placeholder-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all duration-200" 
                       placeholder="What's your story about?"
                       required>
                @error('title') 
                    <div class="flex items-center mt-2 text-red-300 text-sm">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ $message }}
                    </div>
                @enderror

                <!-- Auto-generated slug preview -->
                <div id="slugPreview" class="hidden">
                    <div class="flex items-center text-xs text-slate-500 bg-slate-800/50 px-3 py-2 rounded-lg border border-slate-700/50">
                        <svg class="w-3 h-3 mr-1 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                        </svg>
                        URL Preview: <span class="font-mono text-slate-400 ml-1" id="slugText"></span>
                    </div>
                </div>
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
                
                <!-- File Drop Zone -->
                <div class="relative">
                    <div id="dropZone" class="w-full bg-slate-700/30 border-2 border-dashed border-slate-600 rounded-xl px-6 py-8 text-center hover:border-purple-500/50 hover:bg-slate-700/50 transition-all duration-200 cursor-pointer">
                        <div class="flex flex-col items-center">
                            <div class="w-12 h-12 bg-purple-500/20 rounded-xl flex items-center justify-center mb-4">
                                <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                </svg>
                            </div>
                            <p class="text-slate-300 font-medium mb-1">Drop your image here</p>
                            <p class="text-sm text-slate-500 mb-3">or click to browse files</p>
                            <div class="text-xs text-slate-600 bg-slate-800/50 px-3 py-1 rounded-full">
                                JPG, PNG, GIF up to 5MB
                            </div>
                        </div>
                    </div>
                    <input type="file" 
                           name="image" 
                           accept="image/*" 
                           class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                           id="imageInput">
                </div>

                <!-- Image Preview -->
                <div id="imagePreview" class="hidden mt-4 p-4 bg-slate-700/30 rounded-xl border border-slate-600/50">
                    <div class="flex items-center justify-between mb-3">
                        <p class="text-sm text-slate-400 flex items-center">
                            <svg class="w-4 h-4 mr-1 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Image Selected:
                        </p>
                        <button type="button" id="removeImage" class="text-red-400 hover:text-red-300 text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                    <img id="previewImg" class="w-full max-w-md h-48 object-cover rounded-lg border border-slate-600 shadow-lg">
                    <p id="fileName" class="text-xs text-slate-500 mt-2 font-mono"></p>
                </div>

                @error('image') 
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
                
                <!-- Writing Tools Bar -->
                <div class="flex items-center space-x-2 mb-3 p-2 bg-slate-800/50 rounded-lg border border-slate-700/50">
                    <div class="text-xs text-slate-400 flex items-center space-x-4">
                        <span class="flex items-center">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Markdown supported
                        </span>
                        <span class="text-slate-600">|</span>
                        <span>**bold** *italic* [link](url)</span>
                    </div>
                </div>
                
                <div class="relative">
                    <textarea name="body" 
                              rows="14" 
                              class="w-full bg-slate-700/50 border border-slate-600 rounded-xl px-4 py-3 text-white placeholder-slate-400 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20 transition-all duration-200 resize-none font-mono text-sm leading-relaxed" 
                              placeholder="Tell your story... 

# Your Article Title

Start writing your content here. You can use **Markdown** formatting:

- Use **bold** and *italic* text
- Create [links](https://example.com)
- Add `code snippets`
- Make lists and more!

Share your thoughts and ideas with the world."
                              required>{{ old('body') }}</textarea>
                    
                    <!-- Writing Stats -->
                    <div class="absolute bottom-3 right-3 flex items-center space-x-3 text-xs">
                        <div class="bg-slate-800/70 px-2 py-1 rounded text-slate-400">
                            <span id="wordCount">0</span> words
                        </div>
                        <div class="bg-slate-800/70 px-2 py-1 rounded text-slate-400">
                            <span id="charCount">0</span> chars
                        </div>
                        <div class="bg-slate-800/70 px-2 py-1 rounded text-slate-400">
                            <span id="readTime">0</span> min read
                        </div>
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
                            class="group inline-flex items-center px-8 py-3 bg-gradient-to-r from-green-600 to-green-500 text-white font-medium rounded-xl shadow-lg shadow-green-600/25 hover:shadow-green-600/40 hover:scale-105 transition-all duration-200">
                        <svg class="w-5 h-5 mr-2 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                        </svg>
                        Publish Article
                    </button>
                    
                    <button type="button" 
                            class="group inline-flex items-center px-6 py-3 bg-slate-600/50 text-slate-300 font-medium rounded-xl border border-slate-500/50 hover:bg-slate-600/70 transition-all duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3-3m0 0l-3 3m3-3v12"/>
                        </svg>
                        Save Draft
                    </button>
                </div>

                <!-- Writing Progress -->
                <div class="flex items-center space-x-3">
                    <div class="flex items-center space-x-2">
                        <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                        <span class="text-xs font-mono text-slate-400">READY TO PUBLISH</span>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Writing Tips Section -->
    <div class="mt-8 grid md:grid-cols-3 gap-4">
        <div class="bg-gradient-to-r from-blue-500/10 to-cyan-500/10 backdrop-blur-sm border border-blue-500/20 rounded-xl p-4">
            <div class="flex items-center mb-3">
                <div class="w-8 h-8 bg-blue-500/20 rounded-lg flex items-center justify-center mr-3">
                    <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                    </svg>
                </div>
                <h3 class="text-sm font-semibold text-blue-300">Writing Tips</h3>
            </div>
            <ul class="text-xs text-slate-400 space-y-1">
                <li>• Start with a compelling hook</li>
                <li>• Use clear, concise paragraphs</li>
                <li>• Include relevant examples</li>
            </ul>
        </div>

        <div class="bg-gradient-to-r from-green-500/10 to-emerald-500/10 backdrop-blur-sm border border-green-500/20 rounded-xl p-4">
            <div class="flex items-center mb-3">
                <div class="w-8 h-8 bg-green-500/20 rounded-lg flex items-center justify-center mr-3">
                    <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="text-sm font-semibold text-green-300">Markdown Guide</h3>
            </div>
            <ul class="text-xs text-slate-400 space-y-1 font-mono">
                <li>• **Bold** or *Italic*</li>
                <li>• # Heading 1</li>
                <li>• [Link](url)</li>
            </ul>
        </div>

        <div class="bg-gradient-to-r from-purple-500/10 to-pink-500/10 backdrop-blur-sm border border-purple-500/20 rounded-xl p-4">
            <div class="flex items-center mb-3">
                <div class="w-8 h-8 bg-purple-500/20 rounded-lg flex items-center justify-center mr-3">
                    <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h3 class="text-sm font-semibold text-purple-300">SEO Tips</h3>
            </div>
            <ul class="text-xs text-slate-400 space-y-1">
                <li>• Use descriptive titles</li>
                <li>• Include relevant keywords</li>
                <li>• Add quality images</li>
            </ul>
        </div>
    </div>
</div>

<!-- JavaScript for enhanced functionality -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Elements
    const titleInput = document.querySelector('input[name="title"]');
    const textarea = document.querySelector('textarea[name="body"]');
    const imageInput = document.getElementById('imageInput');
    const dropZone = document.getElementById('dropZone');
    const imagePreview = document.getElementById('imagePreview');
    const previewImg = document.getElementById('previewImg');
    const fileName = document.getElementById('fileName');
    const removeImage = document.getElementById('removeImage');
    const slugPreview = document.getElementById('slugPreview');
    const slugText = document.getElementById('slugText');
    const wordCount = document.getElementById('wordCount');
    const charCount = document.getElementById('charCount');
    const readTime = document.getElementById('readTime');
    const saveStatus = document.getElementById('saveStatus');

    // Auto-generate slug preview from title
    if (titleInput && slugPreview && slugText) {
        titleInput.addEventListener('input', function() {
            if (this.value.trim()) {
                const slug = this.value
                    .toLowerCase()
                    .replace(/[^a-z0-9 -]/g, '')
                    .replace(/\s+/g, '-')
                    .replace(/-+/g, '-')
                    .trim('-');
                slugText.textContent = slug;
                slugPreview.classList.remove('hidden');
            } else {
                slugPreview.classList.add('hidden');
            }
            updateSaveStatus();
        });
    }

    // Writing stats
    function updateStats() {
        if (textarea && wordCount && charCount && readTime) {
            const text = textarea.value;
            const chars = text.length;
            const words = text.trim() ? text.trim().split(/\s+/).length : 0;
            const minutes = Math.max(1, Math.ceil(words / 200));

            wordCount.textContent = words;
            charCount.textContent = chars;
            readTime.textContent = minutes;
        }
    }

    if (textarea) {
        textarea.addEventListener('input', function() {
            updateStats();
            updateSaveStatus();
        });
        updateStats(); // Initial call
    }

    // Image upload handling
    function handleImageUpload(file) {
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                fileName.textContent = file.name + ' (' + (file.size / 1024 / 1024).toFixed(2) + ' MB)';
                imagePreview.classList.remove('hidden');
                dropZone.classList.add('border-green-500/50', 'bg-green-500/5');
            };
            reader.readAsDataURL(file);
        }
    }

    // Drag and drop
    if (dropZone && imageInput) {
        dropZone.addEventListener('click', () => imageInput.click());
        
        dropZone.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.classList.add('border-purple-500', 'bg-purple-500/5');
        });

        dropZone.addEventListener('dragleave', function(e) {
            e.preventDefault();
            this.classList.remove('border-purple-500', 'bg-purple-500/5');
        });

        dropZone.addEventListener('drop', function(e) {
            e.preventDefault();
            this.classList.remove('border-purple-500', 'bg-purple-500/5');
            
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                imageInput.files = files;
                handleImageUpload(files[0]);
            }
        });

        imageInput.addEventListener('change', function(e) {
            if (this.files.length > 0) {
                handleImageUpload(this.files[0]);
            }
        });
    }

    // Remove image
    if (removeImage) {
        removeImage.addEventListener('click', function() {
            imageInput.value = '';
            imagePreview.classList.add('hidden');
            dropZone.classList.remove('border-green-500/50', 'bg-green-500/5');
        });
    }

    // Save status indicator
    function updateSaveStatus() {
        if (saveStatus) {
            saveStatus.textContent = 'CHANGES DETECTED';
            saveStatus.className = 'text-amber-400';
        }
    }

    // Form validation
    const form = document.querySelector('form');
    if (form) {
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
                const firstError = form.querySelector('.border-red-500');
                if (firstError) {
                    firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    firstError.focus();
                }
            } else {
                // Show publishing state
                const submitBtn = form.querySelector('button[type="submit"]');
                if (submitBtn) {
                    submitBtn.innerHTML = `
                        <svg class="w-5 h-5 mr-2 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                        </svg>
                        Publishing...
                    `;
                    submitBtn.disabled = true;
                }
                
                if (saveStatus) {
                    saveStatus.textContent = 'PUBLISHING...';
                    saveStatus.className = 'text-green-400';
                }
            }
        });
    }
});
</script>
@endsection