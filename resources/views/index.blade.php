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
                <div class="flex flex-col lg:flex-row gap-5">
                    <div>
                        <!-- hero title -->
                        <h2
                            class="font-black text-center md:text-left leading-tight mb-6 text-3xl text-brand-primary-400 md:text-4xl lg:mb-8 lg:text-4xl">
                            Don't build a whole backend just for one stupid form.
                        </h2>
                        <!-- hero text -->
                        <p
                            class="font-normal text-center md:text-left items-start mb-6 text-brand-primary-300 text-xl sm:mb-12 md:mb-20">
                            PestForm provides form endpoints as a service,
                            <br class="hidden sm:block" />so your simple sites can stay
                            simple.
                        </p>
                    </div>

                    <!-- hero img -->
                    <div class="relative z-0">
                        <div class="font-mono flex">
                            <div
                                class="bg-brand-blue-100 flex-col hidden leading-loose pl-6 pr-4 py-6 rounded-l-md text-white text-xs sm:flex">
                                <span class="mb-3">1</span>
                                <span class="mb-3">2</span>
                                <span class="mb-3">3</span>
                                <span class="mb-3">4</span>
                                <span>5</span>
                            </div>
                            <div
                                class="bg-brand-blue-200 flex flex-col px-10 py-6 rounded-lg text-white text-xs w-full sm:px-6 md:text-xxs sm:rounded-l-none md:rounded-l-md lg:px-10 lg:rounded-l-none lg:text-sm">
                                <span class="mb-5 md:mb-4">
                                    <span class="px-1 py-1 rounded-sm">
                                        &lt;<span class="text-pink-600">form</span>
                                        <span class="text-green-600">action</span>=
                                        <span class="text-yellow-400">"http://localhost:5500/public/index.html"</span>
                                        <span class="text-green-600">method</span>=<span
                                            class="text-yellow-400">"POST"</span>&gt;</span>
                                </span>
                                <span class="mb-5 pl-8 md:mb-4">
                                    &lt;<span class="text-pink-600">input</span>
                                    <span class="text-green-600">type</span>=<span class="text-yellow-400">"text"</span>
                                    <span class="text-green-600">name</span>=<span
                                        class="text-yellow-400">"first_name"</span>&gt;
                                </span>
                                <span class="mb-5 pl-8 md:mb-4">
                                    &lt;<span class="text-pink-600">input</span>
                                    <span class="text-green-600">type</span>=<span class="text-yellow-400">"text"</span>
                                    <span class="text-green-600">name</span>=<span
                                        class="text-yellow-400">"last_name"</span>&gt;
                                </span>
                                <span class="mb-5 pl-8 md:mb-4">
                                    &lt;<span class="text-pink-600">button</span>
                                    <span class="text-green-600">type</span>=<span
                                        class="text-yellow-400">"submit"</span>&gt;Submit&lt;/<span
                                        class="text-pink-600">button</span>&gt;
                                </span>
                                <span> &lt;/<span class="text-pink-600">form</span>&gt; </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Hero sectoin end -->

        <!-- capturing section start -->
        <section class="max-w-5xl mx-auto px-4 lg:px-0">
            <h1 class="font-bold mb-10 text-center text-brand-primary-400 text-2xl sm:text-4xl">
                Capturing form submissions <br class="hidden sm:block" />
                has never been this hassle-free.
            </h1>
            <div class="w-40 h-2 bg-brand-primary-200 mx-auto mb-10 sm:mb-16"></div>
            <!-- cards -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
                <div class="mb-8">
                    <!-- card head -->
                    <div class="flex font-bold items-center mb-3 text-brand-primary-400">
                        <svg class="fill-current mr-2" width="44px" height="37px" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44 37">
                            <defs>
                                <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="step-gradient-1">
                                    <stop stop-color="#424D91" offset="0%"></stop>
                                    <stop stop-color="#707DC8" offset="100%"></stop>
                                </linearGradient>
                                <polygon id="step-path-2" points="580 1018.5 587 1026.5 606.5 1006 587 1024.5">
                                </polygon>
                                <filter x="-58.5%" y="-51.2%" width="224.5%" height="261.0%"
                                    filterUnits="objectBoundingBox" id="step-filter-3">
                                    <feMorphology radius="1.5" operator="dilate" in="SourceAlpha"
                                        result="shadowSpreadOuter1"></feMorphology>
                                    <feOffset dx="0" dy="2" in="shadowSpreadOuter1" result="shadowOffsetOuter1">
                                    </feOffset>
                                    <feMorphology radius="1.5" operator="erode" in="SourceAlpha" result="shadowInner">
                                    </feMorphology>
                                    <feOffset dx="0" dy="2" in="shadowInner" result="shadowInner"></feOffset>
                                    <feComposite in="shadowOffsetOuter1" in2="shadowInner" operator="out"
                                        result="shadowOffsetOuter1"></feComposite>
                                    <feGaussianBlur stdDeviation="2" in="shadowOffsetOuter1" result="shadowBlurOuter1">
                                    </feGaussianBlur>
                                    <feColorMatrix values="0 0 0 0 0   0 0 0 0 0   0 0 0 0 0  0 0 0 0.12 0"
                                        type="matrix" in="shadowBlurOuter1" result="shadowMatrixOuter1"></feColorMatrix>
                                    <feMorphology radius="1.5" operator="dilate" in="SourceAlpha"
                                        result="shadowSpreadOuter2"></feMorphology>
                                    <feOffset dx="1" dy="4" in="shadowSpreadOuter2" result="shadowOffsetOuter2">
                                    </feOffset>
                                    <feMorphology radius="1.5" operator="erode" in="SourceAlpha" result="shadowInner">
                                    </feMorphology>
                                    <feOffset dx="1" dy="4" in="shadowInner" result="shadowInner"></feOffset>
                                    <feComposite in="shadowOffsetOuter2" in2="shadowInner" operator="out"
                                        result="shadowOffsetOuter2"></feComposite>
                                    <feGaussianBlur stdDeviation="3" in="shadowOffsetOuter2" result="shadowBlurOuter2">
                                    </feGaussianBlur>
                                    <feColorMatrix
                                        values="0 0 0 0 0.0625081101   0 0 0 0 0.1454024   0 0 0 0 0.269743835  0 0 0 0.221212636 0"
                                        type="matrix" in="shadowBlurOuter2" result="shadowMatrixOuter2"></feColorMatrix>
                                    <feMerge>
                                        <feMergeNode in="shadowMatrixOuter1"></feMergeNode>
                                        <feMergeNode in="shadowMatrixOuter2"></feMergeNode>
                                    </feMerge>
                                </filter>
                            </defs>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Desktop-HD-Copy-23" transform="translate(-571.000000, -1001.000000)">
                                    <circle id="Oval-10-Copy" fill="url(#step-gradient-1)" cx="589" cy="1019" r="18">
                                    </circle>
                                    <g id="Path-5-Copy" stroke-linecap="round" stroke-linejoin="round">
                                        <use fill="black" fill-opacity="1" filter="url(#step-filter-3)"
                                            xlink:href="#step-path-2"></use>
                                        <use stroke="#FFFFFF" stroke-width="3" xlink:href="#step-path-2"></use>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <span> Build your form your way </span>
                    </div>
                    <!-- card body -->
                    <p class="text-brand-primary-300">
                        You already know HTML and CSS, so build your form exactly the way
                        you want to. We don't get in your way with JavaScript widgets,
                        WYSIWYG editors, or janky iframes.
                    </p>
                </div>
                <div class="mb-8">
                    <!-- card head -->
                    <div class="flex font-bold items-center mb-3 text-brand-primary-400">
                        <svg class="fill-current mr-2" width="44px" height="37px" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44 37">
                            <defs>
                                <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="step-gradient-1">
                                    <stop stop-color="#424D91" offset="0%"></stop>
                                    <stop stop-color="#707DC8" offset="100%"></stop>
                                </linearGradient>
                                <polygon id="step-path-2" points="580 1018.5 587 1026.5 606.5 1006 587 1024.5">
                                </polygon>
                                <filter x="-58.5%" y="-51.2%" width="224.5%" height="261.0%"
                                    filterUnits="objectBoundingBox" id="step-filter-3">
                                    <feMorphology radius="1.5" operator="dilate" in="SourceAlpha"
                                        result="shadowSpreadOuter1"></feMorphology>
                                    <feOffset dx="0" dy="2" in="shadowSpreadOuter1" result="shadowOffsetOuter1">
                                    </feOffset>
                                    <feMorphology radius="1.5" operator="erode" in="SourceAlpha" result="shadowInner">
                                    </feMorphology>
                                    <feOffset dx="0" dy="2" in="shadowInner" result="shadowInner"></feOffset>
                                    <feComposite in="shadowOffsetOuter1" in2="shadowInner" operator="out"
                                        result="shadowOffsetOuter1"></feComposite>
                                    <feGaussianBlur stdDeviation="2" in="shadowOffsetOuter1" result="shadowBlurOuter1">
                                    </feGaussianBlur>
                                    <feColorMatrix values="0 0 0 0 0   0 0 0 0 0   0 0 0 0 0  0 0 0 0.12 0"
                                        type="matrix" in="shadowBlurOuter1" result="shadowMatrixOuter1"></feColorMatrix>
                                    <feMorphology radius="1.5" operator="dilate" in="SourceAlpha"
                                        result="shadowSpreadOuter2"></feMorphology>
                                    <feOffset dx="1" dy="4" in="shadowSpreadOuter2" result="shadowOffsetOuter2">
                                    </feOffset>
                                    <feMorphology radius="1.5" operator="erode" in="SourceAlpha" result="shadowInner">
                                    </feMorphology>
                                    <feOffset dx="1" dy="4" in="shadowInner" result="shadowInner"></feOffset>
                                    <feComposite in="shadowOffsetOuter2" in2="shadowInner" operator="out"
                                        result="shadowOffsetOuter2"></feComposite>
                                    <feGaussianBlur stdDeviation="3" in="shadowOffsetOuter2" result="shadowBlurOuter2">
                                    </feGaussianBlur>
                                    <feColorMatrix
                                        values="0 0 0 0 0.0625081101   0 0 0 0 0.1454024   0 0 0 0 0.269743835  0 0 0 0.221212636 0"
                                        type="matrix" in="shadowBlurOuter2" result="shadowMatrixOuter2"></feColorMatrix>
                                    <feMerge>
                                        <feMergeNode in="shadowMatrixOuter1"></feMergeNode>
                                        <feMergeNode in="shadowMatrixOuter2"></feMergeNode>
                                    </feMerge>
                                </filter>
                            </defs>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Desktop-HD-Copy-23" transform="translate(-571.000000, -1001.000000)">
                                    <circle id="Oval-10-Copy" fill="url(#step-gradient-1)" cx="589" cy="1019" r="18">
                                    </circle>
                                    <g id="Path-5-Copy" stroke-linecap="round" stroke-linejoin="round">
                                        <use fill="black" fill-opacity="1" filter="url(#step-filter-3)"
                                            xlink:href="#step-path-2"></use>
                                        <use stroke="#FFFFFF" stroke-width="3" xlink:href="#step-path-2"></use>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <span> Point your form at PestForm </span>
                    </div>
                    <!-- card body -->
                    <p class="text-brand-primary-300">
                        Create a new PestForm endpoint and we'll give you a unique URL to
                        point your form at. Add it as your form's action attribute and
                        you're all set.
                    </p>
                </div>
                <div class="mb-8">
                    <!-- card head -->
                    <div class="flex font-bold items-center mb-3 text-brand-primary-400">
                        <svg class="fill-current mr-2" width="44px" height="37px" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44 37">
                            <defs>
                                <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="step-gradient-1">
                                    <stop stop-color="#424D91" offset="0%"></stop>
                                    <stop stop-color="#707DC8" offset="100%"></stop>
                                </linearGradient>
                                <polygon id="step-path-2" points="580 1018.5 587 1026.5 606.5 1006 587 1024.5">
                                </polygon>
                                <filter x="-58.5%" y="-51.2%" width="224.5%" height="261.0%"
                                    filterUnits="objectBoundingBox" id="step-filter-3">
                                    <feMorphology radius="1.5" operator="dilate" in="SourceAlpha"
                                        result="shadowSpreadOuter1"></feMorphology>
                                    <feOffset dx="0" dy="2" in="shadowSpreadOuter1" result="shadowOffsetOuter1">
                                    </feOffset>
                                    <feMorphology radius="1.5" operator="erode" in="SourceAlpha" result="shadowInner">
                                    </feMorphology>
                                    <feOffset dx="0" dy="2" in="shadowInner" result="shadowInner"></feOffset>
                                    <feComposite in="shadowOffsetOuter1" in2="shadowInner" operator="out"
                                        result="shadowOffsetOuter1"></feComposite>
                                    <feGaussianBlur stdDeviation="2" in="shadowOffsetOuter1" result="shadowBlurOuter1">
                                    </feGaussianBlur>
                                    <feColorMatrix values="0 0 0 0 0   0 0 0 0 0   0 0 0 0 0  0 0 0 0.12 0"
                                        type="matrix" in="shadowBlurOuter1" result="shadowMatrixOuter1"></feColorMatrix>
                                    <feMorphology radius="1.5" operator="dilate" in="SourceAlpha"
                                        result="shadowSpreadOuter2"></feMorphology>
                                    <feOffset dx="1" dy="4" in="shadowSpreadOuter2" result="shadowOffsetOuter2">
                                    </feOffset>
                                    <feMorphology radius="1.5" operator="erode" in="SourceAlpha" result="shadowInner">
                                    </feMorphology>
                                    <feOffset dx="1" dy="4" in="shadowInner" result="shadowInner"></feOffset>
                                    <feComposite in="shadowOffsetOuter2" in2="shadowInner" operator="out"
                                        result="shadowOffsetOuter2"></feComposite>
                                    <feGaussianBlur stdDeviation="3" in="shadowOffsetOuter2" result="shadowBlurOuter2">
                                    </feGaussianBlur>
                                    <feColorMatrix
                                        values="0 0 0 0 0.0625081101   0 0 0 0 0.1454024   0 0 0 0 0.269743835  0 0 0 0.221212636 0"
                                        type="matrix" in="shadowBlurOuter2" result="shadowMatrixOuter2"></feColorMatrix>
                                    <feMerge>
                                        <feMergeNode in="shadowMatrixOuter1"></feMergeNode>
                                        <feMergeNode in="shadowMatrixOuter2"></feMergeNode>
                                    </feMerge>
                                </filter>
                            </defs>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Desktop-HD-Copy-23" transform="translate(-571.000000, -1001.000000)">
                                    <circle id="Oval-10-Copy" fill="url(#step-gradient-1)" cx="589" cy="1019" r="18">
                                    </circle>
                                    <g id="Path-5-Copy" stroke-linecap="round" stroke-linejoin="round">
                                        <use fill="black" fill-opacity="1" filter="url(#step-filter-3)"
                                            xlink:href="#step-path-2"></use>
                                        <use stroke="#FFFFFF" stroke-width="3" xlink:href="#step-path-2"></use>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <span> Delivered to where you desire </span>
                    </div>
                    <!-- card body -->
                    <p class="text-brand-primary-300">
                        With Zapier integration, you can get your submissions delivered to
                        wherever you desire. Learn more about using Zapier to integrate apps
                        with PestForm.
                    </p>
                </div>
            </div>

            <!-- quite card -->
            <div class="bg-white w-3/4 mx-auto relative z-20 rounded-md shadow-md -mb-12 p-8">
                <div class="font-bold mb-8 relative text-center">
                    <p class="text-lg sm:text-xl md:text-2xl text-brand-primary-300">
                        <span class="align-text-bottom hidden mr-2 opacity-30 text-5xl leading-6 md:inline">“</span>
                        FieldGoal saved me hours of boilerplate
                        <br class="hidden md:block" />form creation. I love it!
                        <span class="align-text-bottom hidden ml-2 opacity-30 text-5xl leading-6 md:inline">”</span>
                    </p>
                </div>
                <div class="mb-6 text-center text-brand-primary-200">
                    Taylor Otwell, Creator of Laravel
                </div>
                <div
                    class="-mb-6 absolute bottom-0 h-16 w-16 rounded-full overflow-hidden left-1/2 -translate-x-1/2 shadow-md">
                    <img src="./images/taylor-otwell.png" alt="taylor" />
                </div>
            </div>
        </section>
        <!-- capturing section end -->

        <!-- pricing section start -->
        <section class="relative bg-brand-primary-500/80 h-[686px] pt-14 mb-10 z-0">
            <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 ">
                <h2 class="text-white font-bold mb-3 text-center text-2xl sm:text-4xl">
                    Simple Pricing
                </h2>
                <p class="text-brand-primary-200 font-medium text-center text-lg mb-4">
                    Always know what you’ll pay.
                </p>
                <div class="w-40 h-2 bg-brand-primary-200 mx-auto mb-10 sm:mb-16"></div>
            </div>
            <!-- === -->
            <div
                class="max-w-5xl w-full mx-auto px-4 lg:px-0 flex flex-col lg:flex-row items-center absolute left-1/2 -translate-x-1/2 top-full -translate-y-1/3 lg:-translate-y-1/2">
                <div class="rounded-t-md md:rounded-lg md:shadow-lg w-full lg:w-3/5 md:z-10">
                    <div
                        class="bg-brand-blue-50 font-bold px-10 py-6 rounded-t-md text-lg text-brand-primary-400 uppercase">
                        Pricing Plans
                    </div>
                    <div class="bg-white p-6 text-sm md:pb-10 md:pt-8 md:px-10 md:rounded-b-md md:text-sm lg:text-lg">
                        <p class="mb-4 text-brand-primary-300">
                            Fieldgoal offers plans if you need a single form for your personal
                            website or need forms to support all of your clients.
                        </p>
                        <span class="block mb-8 text-brand-primary-300">All of our plans include:</span>
                        <ol class="text-brand-primary-400">
                            <li class="flex items-center mb-6">
                                <svg class="fill-current leading-none mr-4" width="18px" height="20px" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 20">
                                    <g transform="translate(-299.000000, -1688.000000)">
                                        <g transform="translate(250.000000, 1468.000000)">
                                            <path
                                                d="M57,232.585786 L57,221 C57,220.447715 57.4477153,220 58,220 C58.5522847,220 59,220.447715 59,221 L59,232.585786 L62.2928932,229.292893 C62.6834175,228.902369 63.3165825,228.902369 63.7071068,229.292893 C64.0976311,229.683418 64.0976311,230.316582 63.7071068,230.707107 L58.7071068,235.707107 C58.3165825,236.097631 57.6834175,236.097631 57.2928932,235.707107 L52.2928932,230.707107 C51.9023689,230.316582 51.9023689,229.683418 52.2928932,229.292893 C52.6834175,228.902369 53.3165825,228.902369 53.7071068,229.292893 L57,232.585786 Z M49,235 C49,234.447715 49.4477153,234 50,234 C50.5522847,234 51,234.447715 51,235 L51,238 L65,238 L65,235 C65,234.447715 65.4477153,234 66,234 C66.5522847,234 67,234.447715 67,235 L67,238 C67,239.104569 66.1045695,240 65,240 L51,240 C49.8954305,240 49,239.104569 49,238 L49,235 Z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                                <span class="font-bold">Store unlimited submissions</span>
                            </li>
                            <li class="flex items-center mb-6">
                                <svg class="fill-current leading-none mr-4" width="20px" height="16px" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 16">
                                    <g transform="translate(-298.000000, -1732.000000)" fill-rule="nonzero">
                                        <g transform="translate(250.000000, 1468.000000)">
                                            <path
                                                d="M50,264 L66,264 C67.1045695,264 68,264.895431 68,266 L68,278 C68,279.104569 67.1045695,280 66,280 L50,280 C48.8954305,280 48,279.104569 48,278 L48,266 C48,264.895431 48.8954305,264 50,264 Z M66,267.283886 L66,266 L50,266 L50,267.283886 L58,271 L66,267.283886 Z M66,270 L58.4472136,273.604303 C58.1656861,273.738652 57.8343139,273.738652 57.5527864,273.604303 L50,270 L50,278 L66,278 L66,270 Z"
                                                id="Combined-Shape"></path>
                                        </g>
                                    </g>
                                </svg>
                                <span class="font-bold">Email Forwarding</span>
                            </li>
                            <li class="flex items-center mb-6">
                                <svg class="fill-current leading-none mr-4" width="20px" height="20px" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <g transform="translate(-298.000000, -1772.000000)">
                                        <g transform="translate(250.000000, 1468.000000)">
                                            <path
                                                d="M58,304 C63.5228475,304 68,308.477153 68,314 C68,319.522847 63.5228475,324 58,324 C52.4771525,324 48,319.522847 48,314 C48,308.477153 52.4771525,304 58,304 Z M58,306 C53.581722,306 50,309.581722 50,314 C50,318.418278 53.581722,322 58,322 C62.418278,322 66,318.418278 66,314 C66,309.581722 62.418278,306 58,306 Z M58,315 C57.4477153,315 57,314.552285 57,314 L57,310 C57,309.447715 57.4477153,309 58,309 C58.5522847,309 59,309.447715 59,310 L59,314 C59,314.552285 58.5522847,315 58,315 Z M58,319 C57.4477153,319 57,318.552285 57,318 C57,317.447715 57.4477153,317 58,317 C58.5522847,317 59,317.447715 59,318 C59,318.552285 58.5522847,319 58,319 Z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                                <span class="font-bold">Spam blocking</span>
                            </li>
                            <li class="flex items-center mb-6">
                                <svg class="fill-current leading-none mr-4" width="18px" height="20px" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 400">
                                    <path
                                        d="M250 200.087c-.01 14.862-2.727 29.09-7.68 42.224-13.132 4.955-27.366 7.68-42.234 7.69h-.172c-14.86-.01-29.09-2.727-42.222-7.68-4.954-13.132-7.682-27.366-7.692-42.232v-.173c.01-14.862 2.732-29.09 7.678-42.223 13.138-4.954 27.37-7.68 42.236-7.69h.172c14.868.01 29.102 2.736 42.233 7.69 4.952 13.134 7.67 27.362 7.68 42.224v.173zm147.22-33.42H280.474l82.55-82.55a200.92 200.92 0 0 0-21.612-25.548l-.004-.006a201.057 201.057 0 0 0-25.524-21.59l-82.55 82.55V2.782A201.232 201.232 0 0 0 200.104 0h-.212a201.23 201.23 0 0 0-33.226 2.78v116.747l-82.55-82.55a200.942 200.942 0 0 0-25.535 21.6l-.03.027a201.01 201.01 0 0 0-21.574 25.512l82.55 82.55H2.78S.004 188.596 0 199.926v.145a201.324 201.324 0 0 0 2.78 33.264h116.746l-82.55 82.55a201.137 201.137 0 0 0 47.14 47.14l82.55-82.548V397.22A201.347 201.347 0 0 0 199.86 400h.286a201.44 201.44 0 0 0 33.19-2.78V280.473l82.55 82.55a201.038 201.038 0 0 0 25.528-21.592l.02-.017a201.182 201.182 0 0 0 21.59-25.527l-82.55-82.552H397.22a201.347 201.347 0 0 0 2.78-33.19v-.287a201.44 201.44 0 0 0-2.78-33.19z"
                                        fill-rule="evenodd"></path>
                                </svg>
                                <span class="font-bold">Zapier integration</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="fill-current leading-none mr-4" width="20px" height="20px" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z">
                                    </path>
                                </svg>
                                <span class="font-bold">File uploads to S3</span>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="w-full flex-1 lg:-ml-4">
                    <div class="bg-white pb-6 sm:px-10 sm:py-6 lg:rounded-t-md">
                        <table class="w-full text-brand-primary-300 text-sm sm:text-xs md:text-sm">
                            <tbody>
                                <tr class="border-t border-brand-gray sm:border-0">
                                    <td class="pl-6 py-3 sm:pl-0">Single</td>
                                    <td class="py-3"><span class="font-bold text-brand-primary-500">1</span> form</td>
                                    <td class="pr-6 py-3 text-right sm:pr-0">
                                        <span class="bg-brand-primary-300/20 font-bold px-2 py-1 rounded-sm">$5 /
                                            mo</span>
                                    </td>
                                </tr>
                                <tr class="border-t border-brand-gray">
                                    <td class="pl-6 py-3 sm:pl-0">Freelancer</td>
                                    <td class="py-3"><span class="font-bold text-brand-primary-500">5</span> forms</td>
                                    <td class="pr-6 py-3 text-right sm:pr-0">
                                        <span class="bg-brand-primary-300/20 font-bold px-2 py-1 rounded-sm">$15 /
                                            mo</span>
                                    </td>
                                </tr>
                                <tr class="border-t border-brand-gray">
                                    <td class="pl-6 py-3 sm:pl-0">Studio</td>
                                    <td class="py-3"><span class="font-bold text-brand-primary-500">15</span> forms</td>
                                    <td class="pr-6 py-3 text-right sm:pr-0">
                                        <span class="bg-brand-primary-300/20 font-bold px-2 py-1 rounded-sm">$39 /
                                            mo</span>
                                    </td>
                                </tr>
                                <tr class="border-t border-brand-gray">
                                    <td class="pl-6 py-3 sm:pl-0">Agency</td>
                                    <td class="py-3"><span class="font-bold text-brand-primary-500">50</span> forms</td>
                                    <td class="pr-6 py-3 text-right sm:pr-0">
                                        <span class="bg-brand-primary-300/20 font-bold px-2 py-1 rounded-sm">$79 /
                                            mo</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <a href="{{route('register')}}"
                        class="bg-brand-primary-500 cursor-pointer text-white font-bold py-6 rounded-b-md tracking-wider uppercase hover:bg-brand-primary-400 flex items-center justify-center">Start Free Trial
                        <svg class="fill-current inline-block ml-1 text-white" width="18px" height="14px" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 14">
                            <g transform="translate(-1030.000000, -1764.000000)">
                                <g transform="translate(250.000000, 1468.000000)">
                                    <path
                                        d="M794.585786,304 L781,304 C780.447715,304 780,303.552285 780,303 C780,302.447715 780.447715,302 781,302 L794.585786,302 L790.292893,297.707107 C789.902369,297.316582 789.902369,296.683418 790.292893,296.292893 C790.683418,295.902369 791.316582,295.902369 791.707107,296.292893 L797.707107,302.292893 C798.097631,302.683418 798.097631,303.316582 797.707107,303.707107 L791.707107,309.707107 C791.316582,310.097631 790.683418,310.097631 790.292893,309.707107 C789.902369,309.316582 789.902369,308.683418 790.292893,308.292893 L794.585786,304 Z">
                                    </path>
                                </g>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
        </section>
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
    @vite('resources/js/app.js')

</body>

</html>
