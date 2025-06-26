@extends('index')
@push('style')
   <title>About - Portfolio</title>
@endpush
@section('main-content')

<body class="bg-gray-900 text-white font-sans">

  <!-- Container -->
  <div class="max-w-screen-xl mx-auto px-4">
    <!-- Navbar -->
    <header class="flex justify-between items-center py-6 bg-gray-800 rounded-xl">
      <h1 class="text-lg font-bold">Mehedi Hasan Hridoy</h1>
      <nav class="space-x-6">
        <a href="#" class="hover:text-red-400">Home</a>
        <a href="#" class="hover:text-red-400">About</a>
        <a href="#" class="hover:text-red-400">Projects</a>
        <a href="#" class="hover:text-red-400">Contacts</a>
      </nav>
    </header>
  </div>

@endsection