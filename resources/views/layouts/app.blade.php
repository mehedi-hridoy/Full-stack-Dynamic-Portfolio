<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title','Portfolio')</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    {{-- Tailwind via CDN for simplicity --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-900">
    <nav class="bg-white border-b">
        <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between">
            <a href="{{ url('/') }}" class="font-bold">MyPortfolio</a>
            <div class="flex gap-4">
                <a href="{{ route('articles.index') }}" class="hover:underline">Blog</a>
                <a href="{{ route('articles.create') }}" class="hover:underline">Write</a>
                <a href="{{ route('admin.dashboard') }}" class="hover:underline">Admin</a>
            </div>
        </div>
    </nav>

    @if(session('success'))
        <div class="max-w-6xl mx-auto mt-4 px-4">
            <div class="rounded-lg bg-green-100 text-green-900 px-4 py-3">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <main class="max-w-6xl mx-auto px-4 py-8">
        @yield('content')
    </main>

    <footer class="text-center text-sm text-slate-500 py-8">
        © {{ date('Y') }} Mehedi Hasan Hridoy
    </footer>
</body>
</html>
