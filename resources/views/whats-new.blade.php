<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/style.css')
    <title>Pest Redisign</title>
</head>

<body class="bg-brand-gray font-sans">
    <main class="">
        <!-- Hero sectoin start -->
        <section class="mb-10 sm:mb-14 md:mb-24 pt-10 lg:pt-20">
            <div class="absolute bg-brand-primary-200 h-2 left-0 top-0 w-full"></div>
            <!-- content -->
            <div class="max-w-5xl mx-auto px-4 lg:px-0">
                <!-- navbar -->
                @include('_nav-public')
                <!-- hero content -->

            </div>
        </section>
        <!-- Hero sectoin end -->
 <main class="max-w-5xl mx-auto px-4 md:px-0 pt-10">
      <!-- hero title-->
      <h1 class="font-bold text-brand-primary-400 text-2xl md:text-4xl text-center mb-10">
        Here's What's New With FieldGoal!
      </h1>
      <!-- 1-block -->
      <div>
        <h2 class="relative font-bold text-brand-primary-400 text-xl md:text-3xl mb-4">
          Redesigned Form Submission Page
        </h2>
        <!-- block content -->
        <div class="flex flex-col md:flex-row gap-2 items-start mb-3">
          <div class="w-full shadow-md p-4 rounded border-dashed border-brand-gray text-gray-700">

          </div>
          <div class="w-full flex-1">
            <img src="" alt="">
          </div>
        </div>
        <!-- line -->
        <div class="w-64 h-0.5 mx-auto mb-4"></div>
      </div>
    </main>
        <!-- pricing section end -->
    </main>

    <!-- footer section start -->
    <footer
        class="max-w-5xl mx-auto px-4 lg:px-0 my-10 pt-48 lg:pt-0 mt-96 lg:mt-80 text-center text-sm text-brand-primary-400/70">
        <span class="block mb-2 sm:inline sm:mb-0">Have a question or need help? <a
                class="text-brand-primary-400 font-medium" href="/">Send us an email.</a></span>
        <span>© 2023 <a class="text-brand-primary-400 font-medium" href="/">Tighten</a> | <a
                class="text-brand-primary-400 font-medium" href="/">Privacy Policy</a> | <a
                class="text-brand-primary-400 font-medium" href="/">GDPR</a></span>
    </footer>
    <!-- footer section end -->

    <!-- alpine js -->
    <script src="//unpkg.com/alpinejs" defer></script>
</body>

</html>