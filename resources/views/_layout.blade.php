@include('_head')

<body class="bg-brand-gray font-sans">
    <!-- header sectin start -->
    @include('_header')
    <!-- header sectin end -->
    <main class="max-w-5xl mx-auto px-4 lg:px-0">
        @include('components.email-verification-status')

        @include('components.trial-period-status')

        @include('components.forms-count-status')

        <div>
            @yield('page')
        </div>
    </main>

    <!-- footer section start -->

    <!-- footer section end -->

    <!-- alpine js -->
    <script src="//unpkg.com/alpinejs" defer></script>
    @livewireScripts()
    @vite('resources/js/app.js')

</body>

</html>