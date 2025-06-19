<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>My Portfolio</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <script src="https://cdn.tailwindcss.com"></script>
  <!-- IconFinder or use Heroicons/FontAwesome as fallback -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white font-sans">

  <!-- Container -->
  <div class="max-w-screen-xl mx-auto px-4">

    <!-- Navbar -->
    <header class="flex justify-between items-center py-6">
      <h1 class="text-lg font-bold">Mehedi Hasan Hridoy</h1>
      <nav class="space-x-6">
        <a href="#" class="hover:text-red-400">Home</a>
        <a href="#" class="hover:text-red-400">About</a>
        <a href="#" class="hover:text-red-400">Projects</a>
        <a href="#" class="hover:text-red-400">Contacts</a>
      </nav>
    </header>

    <!-- Hero Section -->
    <section class="flex flex-col md:flex-row items-center justify-between py-20 gap-10">

      <!-- Left Content -->
      <div class="max-w-xl text-center md:text-left">
        <h2 class="text-4xl font-semibold highlight-dot">Hello</h2>
        <p class="text-2xl mt-2">I'm Mehedi Hasan Hridoy</p>
        <h1 class="text-4xl md:text-5xl font-bold mt-2">Front-End Developer</h1>

        <div class="mt-6 flex justify-center md:justify-start space-x-4">
          <a href="#" class="bg-red-500 hover:bg-red-600 px-5 py-3 rounded-md text-white font-medium">Got a project?</a>
          <a href="#" class="border border-white px-5 py-3 rounded-md text-white font-medium">My resume</a>
        </div>
      </div>

      <!-- Right Image -->
      <div class="relative">
        <div class="absolute left-[-30px] top-1/2 transform -translate-y-1/2 text-red-400 text-3xl">
          <i class="bi bi-chevron-left"></i>
        </div>
        <img src="assets\image\mehedi.jpg" alt="Jensen" class="rounded-full border-8 border-red-500 w-72 h-72 object-cover" />
        <div class="absolute right-[-30px] top-1/2 transform -translate-y-1/2 text-red-400 text-3xl">
          <i class="bi bi-chevron-right"></i>
        </div>
      </div>
    </section>

    <!-- Skills Section -->
    <footer class="bg-gray-800 p-4 rounded-xl text-center text-sm space-x-4 mt-10">
      <span class="text-gray-300">HTML5</span>
      <span class="text-gray-300">CSS</span>
      <span class="text-gray-300">JavaScript</span>
      <span class="text-gray-300">Node.js</span>
      <span class="text-gray-300">React</span>
      <span class="text-gray-300">Git</span>
      <span class="text-gray-300">GitHub</span>
    </footer>
    
  </div>

</body>

</html>
