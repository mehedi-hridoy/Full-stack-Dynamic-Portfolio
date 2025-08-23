<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title','Portfolio')</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    {{-- Tailwind via CDN for simplicity --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            @apply bg-slate-800;
        }

        ::-webkit-scrollbar-thumb {
            @apply bg-slate-600 rounded;
        }

        ::-webkit-scrollbar-thumb:hover {
            @apply bg-slate-500;
        }

        /* Smooth animations */
        * {
            scroll-behavior: smooth;
        }

        /* Glow effect for active links */
        .nav-link-active {
            position: relative;
        }

        .nav-link-active::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 6px;
            height: 6px;
            background: linear-gradient(45deg, #06b6d4, #3b82f6);
            border-radius: 50%;
            box-shadow: 0 0 10px rgba(6, 182, 212, 0.5);
        }

        /* Notification animation */
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-100%);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .notification-slide {
            animation: slideDown 0.5s ease-out;
        }

        /* Background pattern */
        .bg-pattern {
            background-image: 
                radial-gradient(circle at 1px 1px, rgba(59, 130, 246, 0.1) 1px, transparent 0);
            background-size: 20px 20px;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-900 via-gray-900 to-slate-800 text-white min-h-screen bg-pattern">
    <!-- Navigation -->
    <nav class="bg-gradient-to-r from-slate-800/50 to-slate-700/50 backdrop-blur-sm border-b border-slate-700/50 sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <a href="{{ url('/') }}" class="group flex items-center space-x-3 hover:scale-105 transition-transform duration-200">
                    <div class="relative">
                        <div class="w-10 h-10 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-xl flex items-center justify-center shadow-lg shadow-cyan-500/25 group-hover:shadow-cyan-500/40 transition-all duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                            </svg>
                        </div>
                        <div class="absolute -top-1 -right-1 w-4 h-4 bg-green-400 rounded-full border-2 border-slate-800 group-hover:scale-110 transition-transform duration-200"></div>
                    </div>
                    <div>
                        <span class="font-bold text-xl bg-gradient-to-r from-white to-slate-300 bg-clip-text text-transparent">
                            Mehedi Hasan Hridoy
                        </span>
                        <div class="text-xs text-slate-400 font-mono">/dev/portfolio</div>
                    </div>
                </a>

                <!-- Navigation Links -->
                <div class="flex items-center space-x-1">
                    <a href="{{ route('articles.index') }}" 
                       class="group flex items-center px-4 py-2 rounded-xl text-slate-300 hover:text-white hover:bg-slate-700/50 transition-all duration-200 nav-link">
                        <svg class="w-4 h-4 mr-2 group-hover:text-cyan-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15"/>
                        </svg>
                        <span class="font-medium">Blog</span>
                    </a>
                    
                    <a href="{{ route('articles.create') }}" 
                       class="group flex items-center px-4 py-2 rounded-xl text-slate-300 hover:text-white hover:bg-slate-700/50 transition-all duration-200 nav-link">
                        <svg class="w-4 h-4 mr-2 group-hover:text-green-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        <span class="font-medium">Write</span>
                    </a>
                    
                    <a href="{{ route('admin.dashboard') }}" 
                       class="group flex items-center px-4 py-2 rounded-xl text-slate-300 hover:text-white hover:bg-slate-700/50 transition-all duration-200 nav-link relative">
                        <svg class="w-4 h-4 mr-2 group-hover:text-purple-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                        <span class="font-medium">Admin</span>
                        <!-- Admin badge -->
                        <div class="absolute -top-1 -right-1 w-2 h-2 bg-red-500 rounded-full animate-pulse"></div>
                    </a>

                    <!-- Theme indicator -->
                    <div class="ml-4 flex items-center space-x-2 px-3 py-2 bg-slate-800/50 rounded-xl border border-slate-700/50">
                        <div class="w-2 h-2 bg-blue-400 rounded-full animate-pulse"></div>
                        <span class="text-xs font-mono text-slate-400">DARK MODE</span>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Success Notification -->
    @if(session('success'))
        <div class="max-w-6xl mx-auto mt-6 px-6 notification-slide">
            <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-green-500/20 to-emerald-500/20 backdrop-blur-sm border border-green-500/30 px-6 py-4 shadow-2xl shadow-green-500/10">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-green-500/30 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4 flex-1">
                        <p class="text-green-200 font-medium">
                            {{ session('success') }}
                        </p>
                    </div>
                    <div class="ml-4">
                        <span class="text-xs font-mono text-green-400 bg-green-500/20 px-2 py-1 rounded">SUCCESS</span>
                    </div>
                </div>
                
                <!-- Animated background -->
                <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-r from-transparent via-green-400/5 to-transparent transform -skew-x-12 animate-pulse"></div>
            </div>
        </div>
    @endif

    <!-- Main Content -->
    <main class="max-w-6xl mx-auto px-6 py-8">
        <!-- Content wrapper with subtle background -->
        <div class="relative">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="relative mt-auto">
        <!-- Footer background gradient -->
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent pointer-events-none"></div>
        
        <div class="relative border-t border-slate-700/50 bg-gradient-to-r from-slate-800/30 to-slate-700/30 backdrop-blur-sm">
            <div class="max-w-6xl mx-auto px-6 py-8">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0">
                    <div class="flex items-center space-x-4">
                        <div class="w-8 h-8 bg-gradient-to-r from-slate-600 to-slate-500 rounded-lg flex items-center justify-center">
                            <span class="text-xs font-bold text-white">MH</span>
                        </div>
                        <div>
                            <p class="text-slate-300 font-medium">Mehedi Hasan Hridoy</p>
                            <p class="text-xs text-slate-500 font-mono">Full Stack Developer</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-6 text-sm text-slate-400">
                        <div class="flex items-center space-x-2">
                            <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                            <span class="font-mono">© {{ date('Y') }}</span>
                        </div>
                        <span class="text-slate-600">•</span>
                        <span class="font-mono">Built with Laravel & Tailwind</span>
                        <span class="text-slate-600">•</span>
                        <div class="flex items-center space-x-1">
                            <svg class="w-4 h-4 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                            </svg>
                            <span>Made in Bangladesh</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript for enhanced interactions -->
    <script>
        // Auto-hide success notification
        document.addEventListener('DOMContentLoaded', function() {
            const notification = document.querySelector('.notification-slide');
            if (notification) {
                setTimeout(() => {
                    notification.style.transform = 'translateY(-100%)';
                    notification.style.opacity = '0';
                    setTimeout(() => notification.remove(), 500);
                }, 5000);
            }

            // Add active state to current page nav link
            const currentPath = window.location.pathname;
            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(link => {
                if (link.getAttribute('href') && currentPath.includes(link.getAttribute('href'))) {
                    link.classList.add('nav-link-active');
                    link.classList.add('bg-slate-700/50', 'text-white');
                }
            });
        });

        // Smooth scroll for internal links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>