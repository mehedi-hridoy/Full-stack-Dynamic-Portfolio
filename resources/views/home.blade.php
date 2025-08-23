@extends('index')
@push('style')
   <title>Home - Portfolio</title>
@endpush
@section('main-content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Home Page</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <script src="https://cdn.tailwindcss.com"></script>
  <!-- IconFinder or use Heroicons/FontAwesome as fallback -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white font-sans">

  <!-- Container -->
  <div class="max-w-screen-xl mx-auto px-4">

    <!-- Navbar -->
    <header class="flex justify-between items-center py-6 bg-gray-800 rounded-xl">
      <h1 class="text-lg font-bold">Mehedi Hasan Hridoy</h1>
      <nav class="space-x-6">
        <a href="#" class="hover:text-red-400">Home</a>
        <a href="#" class="hover:text-red-400">About</a>
        <a href="resources\views\about.blade.php" class="hover:text-red-400">Projects</a>
        <a href="#" class="hover:text-red-400">Contacts</a>
        <a href="{{ route('articles.index') }}" class="hover:text-red-400">Blog</a>
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







     <!-- About Me Section -->
     <section id="about" class="py-20 bg-gray-800 rounded-xl mb-16 px-8">
      <div class="text-center mb-12">
        <h2 class="text-4xl font-bold mb-4">About Me</h2>
        <div class="w-20 h-1 bg-red-500 mx-auto"></div>
      </div>
      <div class="grid md:grid-cols-2 gap-12 items-center">
        <div>
          <h3 class="text-2xl font-semibold mb-6 text-red-400">Get to know me!</h3>
          <p class="text-gray-300 mb-4 leading-relaxed">
            Meet myself Mehedi Hasan Hridoy. I am a passionate Front-End Developer with a strong foundation in modern web technologies. 
            I love creating user-friendly, responsive websites and applications that provide excellent user experiences.
          </p>
          <p class="text-gray-300 mb-4 leading-relaxed">
            With expertise in React, JavaScript, and various modern frameworks, I'm always eager to learn new technologies 
            and tackle challenging projects that push the boundaries of web development.
          </p>
          <p class="text-gray-300 mb-6 leading-relaxed">
            I'm open to job opportunities where I can contribute, learn and grow. If you have a good opportunity 
            that matches my skills and experience then don't hesitate to contact me.
          </p>
          <a href="#contact" class="bg-red-500 hover:bg-red-600 px-6 py-3 rounded-md text-white font-medium transition-colors">
            Contact Me
          </a>
        </div>
        <div>
          <h3 class="text-2xl font-semibold mb-6 text-red-400">My Skills</h3>
          <div class="grid grid-cols-2 gap-4">
            <div class="bg-gray-700 p-4 rounded-lg text-center hover:bg-gray-600 transition-colors">
              <i class="bi bi-code-slash text-3xl text-red-400 mb-2"></i>
              <p class="font-medium">HTML5</p>
            </div>
            <div class="bg-gray-700 p-4 rounded-lg text-center hover:bg-gray-600 transition-colors">
              <i class="bi bi-palette text-3xl text-red-400 mb-2"></i>
              <p class="font-medium">CSS3</p>
            </div>
            <div class="bg-gray-700 p-4 rounded-lg text-center hover:bg-gray-600 transition-colors">
              <i class="bi bi-braces text-3xl text-red-400 mb-2"></i>
              <p class="font-medium">JavaScript</p>
            </div>
            <div class="bg-gray-700 p-4 rounded-lg text-center hover:bg-gray-600 transition-colors">
              <i class="bi bi-diagram-3 text-3xl text-red-400 mb-2"></i>
              <p class="font-medium">React</p>
            </div>
            <div class="bg-gray-700 p-4 rounded-lg text-center hover:bg-gray-600 transition-colors">
              <i class="bi bi-server text-3xl text-red-400 mb-2"></i>
              <p class="font-medium">Node.js</p>
            </div>
            <div class="bg-gray-700 p-4 rounded-lg text-center hover:bg-gray-600 transition-colors">
              <i class="bi bi-git text-3xl text-red-400 mb-2"></i>
              <p class="font-medium">Git</p>
            </div>
          </div>
        </div>
      </div>
    </section>







    <!-- Projects Section -->
    <section id="projects" class="py-20 mb-16">
      <div class="text-center mb-12">
        <h2 class="text-4xl font-bold mb-4">Projects</h2>
        <div class="w-20 h-1 bg-red-500 mx-auto mb-4"></div>
        <p class="text-gray-300 max-w-2xl mx-auto">
          Here is some of my projects that you can find on the internet .. in my github profile 
        </p>
      </div>
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Project 1 -->
        <div class="bg-gray-800 rounded-xl overflow-hidden hover:transform hover:scale-105 transition-all duration-300">
          <div class="h-48 bg-gradient-to-br from-red-500 to-red-700 flex items-center justify-center">
            <i class="bi bi-code-square text-6xl text-white"></i>
          </div>
          <div class="p-6">
            <h3 class="text-xl font-bold mb-3">Learnly</h3>
            <p class="text-gray-300 mb-4">
             It's a flutter application that fucoses on productivity and study . 
            </p>
            <div class="flex flex-wrap gap-2 mb-4">
              <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm">React</span>
              <span class="bg-blue-500 text-white px-3 py-1 rounded-full text-sm">Node.js</span>
              <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm">MongoDB</span>
            </div>
            <div class="flex space-x-4">
            <a href="{{ url('https://github.com/mehedi-hridoy/Learnly') }}" target="_blank" class="text-red-400 hover:text-red-300 transition-colors" >
    <i class="bi bi-github"></i> Code
</a>
               
              <a href="#" class="text-red-400 hover:text-red-300 transition-colors">
                <i class="bi bi-box-arrow-up-right"></i> Live Demo
              </a>
            </div>
          </div>
        </div>





        <!-- Project 2 -->
        <div class="bg-gray-800 rounded-xl overflow-hidden hover:transform hover:scale-105 transition-all duration-300">
          <div class="h-48 bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center">
            <i class="bi bi-phone text-6xl text-white"></i>
          </div>
          <div class="p-6">
            <h3 class="text-xl font-bold mb-3">Donate BD</h3>
            <p class="text-gray-300 mb-4">
              Donate BD  a simple website with basic html , css and javascript . Which help to get grasp someone the base of Javascript. 
            </p>
            <div class="flex flex-wrap gap-2 mb-4">
              <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm">HTML</span>
              <span class="bg-purple-500 text-white px-3 py-1 rounded-full text-sm">CSS</span>
              <span class="bg-yellow-500 text-black px-3 py-1 rounded-full text-sm">JavaScript</span>
            </div>
            <div class="flex space-x-4">
              <a href="https://github.com/mehedi-hridoy/donateBD" class="text-red-400 hover:text-red-300 transition-colors">
                <i class="bi bi-github"></i> Code
              </a>
              <a href="https://mehedi-hridoy.github.io/donateBD/" class="text-red-400 hover:text-red-300 transition-colors">
                <i class="bi bi-box-arrow-up-right"></i> Live Demo
              </a>
            </div>
          </div>
        </div>


        <!-- Project 3 -->
        <div class="bg-gray-800 rounded-xl overflow-hidden hover:transform hover:scale-105 transition-all duration-300">
          <div class="h-48 bg-gradient-to-br from-green-500 to-green-700 flex items-center justify-center">
            <i class="bi bi-bar-chart text-6xl text-white"></i>
          </div>
          <div class="p-6">
            <h3 class="text-xl font-bold mb-3">City Scape</h3>
            <p class="text-gray-300 mb-4">
              It's a dynamic hotel booking website . Where people can book their hotels as their preference . 
            </p>
            <div class="flex flex-wrap gap-2 mb-4">
              <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm">React</span>
              <span class="bg-orange-500 text-white px-3 py-1 rounded-full text-sm">html</span>
              <span class="bg-indigo-500 text-white px-3 py-1 rounded-full text-sm">css3</span>
              <span class="bg-indigo-500 text-white px-3 py-1 rounded-full text-sm">tilewind</span>
            </div>
            <div class="flex space-x-4">
              <a href="https://github.com/mehedi-hridoy/CityScape" class="text-red-400 hover:text-red-300 transition-colors">
                <i class="bi bi-github"></i> Code
              </a>
              <a href="https://github.com/mehedi-hridoy/CityScape" class="text-red-400 hover:text-red-300 transition-colors">
                <i class="bi bi-box-arrow-up-right"></i> Live Demo
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>






    <!-- Education & Research Section -->
    <section id="education" class="py-20 bg-gray-800 rounded-xl mb-16 px-8">
      <div class="text-center mb-12">
        <h2 class="text-4xl font-bold mb-4">Education & Research</h2>
        <div class="w-20 h-1 bg-red-500 mx-auto"></div>
      </div>
      <div class="grid md:grid-cols-2 gap-12">
        <!-- Education Column -->
        <div>
          <h3 class="text-2xl font-semibold mb-8 text-red-400 flex items-center">
            <i class="bi bi-mortarboard mr-3"></i>Education
          </h3>
          <div class="space-y-8">
            <!--BSC -->
            <div class="relative pl-8 border-l-2 border-red-500">
              <div class="absolute -left-2 top-0 w-4 h-4 bg-red-500 rounded-full"></div>
              <div class="bg-gray-700 p-4 rounded-lg">
                <h4 class="text-lg font-bold text-green-400">BSC</h4>
                <p class="text-gray-300 font-medium">Bachelor's Degree in Computer Science</p>
                <p class="text-gray-300 font-medium">Daffodil International University</p>
                <p class="text-gray-400 text-sm">2022-2026</p>
              </div>
            </div>
            
           <!--HSC -->
           <div class="relative pl-8 border-l-2 border-red-500">
              <div class="absolute -left-2 top-0 w-4 h-4 bg-red-500 rounded-full"></div>
              <div class="bg-gray-700 p-4 rounded-lg">
                <h4 class="text-lg font-bold text-green-400">Higher Secondary School Certificate</h4>
                <p class="text-gray-300 font-medium">Govt Tolaram College</p>
                <p class="text-gray-400 text-sm">2020-2022</p>
              </div>
            </div>
            
            
            <!-- SSC -->
            <div class="relative pl-8 border-l-2 border-red-500">
              <div class="absolute -left-2 top-0 w-4 h-4 bg-red-500 rounded-full"></div>
              <div class="bg-gray-700 p-4 rounded-lg">
                <h4 class="text-lg font-bold text-green-400">Secondary School Certificate</h4>
                <p class="text-gray-300 font-medium">Fatullah Pilot High School</p>
                <p class="text-gray-400 text-sm">2018-2020</p>
              </div>
            </div>
            
            
            
          </div>
        </div>

        <!-- Research Column -->
        <div>
          <h3 class="text-2xl font-semibold mb-8 text-red-400 flex items-center">
            <i class="bi bi-search mr-3"></i>Research
          </h3>
          <div class="space-y-6">
            <!-- Research 1 -->
            <div class="bg-gray-700 p-6 rounded-lg">
              <h4 class="text-lg font-bold text-green-400 mb-3">Combating Misinformation: An NLP Based Approact to Fake News Detection</h4>
              <p class="text-gray-300 mb-3">Utilized personalized dataset and data mining models.</p>
      
            </div>
            
            <!-- Research 2 -->
            <div class="bg-gray-700 p-6 rounded-lg">
              <h4 class="text-lg font-bold text-green-400 mb-3">Review Paper on Alzimer's Disease Detection</h4>
              <p class="text-gray-300 mb-3">Meachine learning and data mining approact for finding the alzimer's disease prediction. </p>
      
            </div>
            
            <!-- Research 3 -->
            <div class="bg-gray-700 p-6 rounded-lg">
              <h4 class="text-lg font-bold text-green-400 mb-3">Realtime Insects Detection</h4>
              <p class="text-gray-300 mb-3">Working a project where realtime desease detection is possible for early detection of any kind of crops disease . Using visualization model, 
                and data mining.
              </p>
      
            </div>
            
          </div>
        </div>
      </div>
    </section>










     <!-- Skills Section (Enhanced) -->
     <section class="py-20 mb-16">
      <div class="text-center mb-12">
        <h2 class="text-4xl font-bold mb-4">My Skills</h2>
        <div class="w-20 h-1 bg-red-500 mx-auto mb-4"></div>
        <p class="text-gray-300">Here are some of the technologies and tools I work with</p>
      </div>
      <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Frontend Skills -->
        <div class="bg-gray-800 p-6 rounded-xl">
          <h3 class="text-lg font-bold mb-4 text-red-400">Front-End</h3>
          <div class="space-y-2">
            <span class="inline-block bg-gray-700 px-3 py-1 rounded-full text-sm">HTML</span>
            <span class="inline-block bg-gray-700 px-3 py-1 rounded-full text-sm">CSS</span>
            <span class="inline-block bg-gray-700 px-3 py-1 rounded-full text-sm">JavaScript</span>
            <span class="inline-block bg-gray-700 px-3 py-1 rounded-full text-sm">React</span>
            <span class="inline-block bg-gray-700 px-3 py-1 rounded-full text-sm">Angular</span>
          </div>
        </div>
        
        <!-- Backend Skills -->
        <div class="bg-gray-800 p-6 rounded-xl">
          <h3 class="text-lg font-bold mb-4 text-red-400">Back-End</h3>
          <div class="space-y-2">
            <span class="inline-block bg-gray-700 px-3 py-1 rounded-full text-sm">Node.js</span>
            <span class="inline-block bg-gray-700 px-3 py-1 rounded-full text-sm">Express</span>
            <span class="inline-block bg-gray-700 px-3 py-1 rounded-full text-sm">Python</span>
            <span class="inline-block bg-gray-700 px-3 py-1 rounded-full text-sm">Django</span>
          </div>
        </div>
        
        <!-- Database Skills -->
        <div class="bg-gray-800 p-6 rounded-xl">
          <h3 class="text-lg font-bold mb-4 text-red-400">Databases</h3>
          <div class="space-y-2">
            <span class="inline-block bg-gray-700 px-3 py-1 rounded-full text-sm">MySQL</span>
            <span class="inline-block bg-gray-700 px-3 py-1 rounded-full text-sm">PostgreSQL</span>
            <span class="inline-block bg-gray-700 px-3 py-1 rounded-full text-sm">MongoDB</span>
          </div>
        </div>
        
        <!-- Tools & Platforms -->
        <div class="bg-gray-800 p-6 rounded-xl">
          <h3 class="text-lg font-bold mb-4 text-red-400">Tools & Platforms</h3>
          <div class="space-y-2">
            <span class="inline-block bg-gray-700 px-3 py-1 rounded-full text-sm">Git</span>
            <span class="inline-block bg-gray-700 px-3 py-1 rounded-full text-sm">Docker</span>
            <span class="inline-block bg-gray-700 px-3 py-1 rounded-full text-sm">AWS</span>
            <span class="inline-block bg-gray-700 px-3 py-1 rounded-full text-sm">Heroku</span>
          </div>
        </div>
      </div>
    </section>




    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-gray-800 rounded-xl mb-16 px-8">
      <div class="text-center mb-12">
        <h2 class="text-4xl font-bold mb-4">Contact</h2>
        <div class="w-20 h-1 bg-red-500 mx-auto mb-4"></div>
        <p class="text-gray-300 max-w-2xl mx-auto">
          Feel free to contact me by submitting the form below and I will get back to you as soon as possible
        </p>
      </div>
      <div class="max-w-2xl mx-auto">
        <form class="space-y-6">
          <div>
            <label class="block text-sm font-medium mb-2">Name</label>
            <input type="text" class="w-full p-3 bg-gray-700 rounded-lg border border-gray-600 focus:border-red-500 focus:outline-none" placeholder="Enter Your Name">
          </div>
          <div>
            <label class="block text-sm font-medium mb-2">Email</label>
            <input type="email" class="w-full p-3 bg-gray-700 rounded-lg border border-gray-600 focus:border-red-500 focus:outline-none" placeholder="Enter Your Email">
          </div>
          <div>
            <label class="block text-sm font-medium mb-2">Message</label>
            <textarea rows="6" class="w-full p-3 bg-gray-700 rounded-lg border border-gray-600 focus:border-red-500 focus:outline-none" placeholder="Enter Your Message"></textarea>
          </div>
          <button type="submit" class="w-full bg-red-500 hover:bg-red-600 py-3 px-6 rounded-lg text-white font-medium transition-colors">
            Submit
          </button>
        </form>
      </div>
    </section>





    <!-- Footer -->
    <footer class="bg-gray-800 py-12 px-8 rounded-xl text-center">
      <div class="grid md:grid-cols-3 gap-8 mb-8">
        <!-- About -->
        <div>
          <h3 class="text-xl font-bold mb-4 text-red-400">Mehedi Hasan Hridoy</h3>
          <p class="text-gray-300">
            A Front-End focused Web Developer building the Frontend of Websites and Web Applications that leads to the success of the overall product
          </p>
        </div>
        
        <!-- Social Links -->
        <div>
          <h3 class="text-xl font-bold mb-4 text-red-400">Social</h3>
          <div class="flex justify-center space-x-4">
            <a href="#" class="text-gray-300 hover:text-red-400 transition-colors text-2xl">
              <i class="bi bi-linkedin"></i>
            </a>
            <a href="#" class="text-gray-300 hover:text-red-400 transition-colors text-2xl">
              <i class="bi bi-github"></i>
            </a>
            <a href="#" class="text-gray-300 hover:text-red-400 transition-colors text-2xl">
              <i class="bi bi-twitter"></i>
            </a>
            <a href="#" class="text-gray-300 hover:text-red-400 transition-colors text-2xl">
              <i class="bi bi-envelope"></i>
            </a>
          </div>
        </div>
        
        <!-- Quick Links -->
        <div>
          <h3 class="text-xl font-bold mb-4 text-red-400">Quick Links</h3>
          <div class="space-y-2">
            <a href="#home" class="block text-gray-300 hover:text-red-400 transition-colors">Home</a>
            <a href="#about" class="block text-gray-300 hover:text-red-400 transition-colors">About</a>
            <a href="#projects" class="block text-gray-300 hover:text-red-400 transition-colors">Projects</a>
            <a href="#education" class="block text-gray-300 hover:text-red-400 transition-colors">Education</a>
          </div>
        </div>
      </div>
      
      <div class="border-t border-gray-700 pt-8">
        <p class="text-gray-400 text-sm">
          © Copyright 2025. Made by <span class="text-red-400 font-medium">Mehedi Hasan Hridoy</span>
        </p>
      </div>
    </footer>








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

  
@endsection