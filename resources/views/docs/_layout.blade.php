<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  @vite('resources/css/style.css')
  <title>Documantation page</title>
</head>

<body class="bg-brand-gray font-sans">
  <!-- header sectin start -->
  @include('docs._header')
  <!-- header sectin end -->

  <main class="max-w-5xl m-auto px-4 md:px-0">
    <div class="w-full flex flex-col md:flex-row gap-6">
      <!-- left sidebar -->
      <div class="w-64">
        <div class="relative w-full bg-white/90 shadow-sm rounded p-2 pl-8 mb-6">
          <input type="text" name="search" class="bg-transparent w-full h-full outline-none"
            placeholder="Search here..." />
          <svg class="h-5 w-5 text-gray-400 absolute left-2 top-1/2 -translate-y-1/2" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
          </svg>
        </div>
        <!-- links -->
        @include('docs._sidebar')
      </div>

      @yield('page')
    </div>
  </main>

  <!-- footer section start -->
  <footer class="max-w-5xl mx-auto px-4 lg:px-0 my-10 text-center text-sm text-brand-primary-400/70">
    <span class="block mb-2 sm:inline sm:mb-0">Have a question or need help?
      <a class="text-brand-primary-400 font-medium" href="/">Send us an email.</a></span>
    <span>
      © 2023
      <a class="text-brand-primary-400 font-medium" href="/">Tighten</a> |
      <a class="text-brand-primary-400 font-medium" href="/">Privacy Policy</a> |
      <a class="text-brand-primary-400 font-medium" href="/">GDPR</a></span>
  </footer>
  <!-- footer section end -->

  <!-- alpine js -->
  <script src="//unpkg.com/alpinejs" defer></script>
</body>

</html>