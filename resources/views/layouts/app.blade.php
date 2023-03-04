<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- css  -->
    @include('layouts.css')

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <section>
        <div class="bg-gray-100">

            <div x-data="{ open: false }" @keydown.window.escape="open = false">

                <!-- start side-nav -->
                @role('Admin')
                    @include('layouts.side-nav.admin-nav')
                    @elserole('Teacher')
                    @include('layouts.side-nav.teacher-nav')
                    @elserole('Student')
                    @include('layouts.side-nav.student-nav')
                @endrole
                <!-- end side-nav -->

                <div class="md:pl-64 flex flex-col flex-1">

                    <!-- start nav-bar -->
                    @include('layouts.top-nav')
                    <!-- end nav-bar -->

                    <!-- page heading -->
                    @if (isset($header))
                        <header class="dark:bg-gray-800 pt-8">
                            <div class="max-w-7xl mx-auto pt-6 pb-3 px-4 sm:px-6 lg:px-8">
                                {{ $header }}
                            </div>
                        </header>
                    @endif
                    <!-- end page heading -->

                    <!-- main content start -->
                    <main class="max-md:px-6">
                        {{ $slot }}

                        <!-- start footer -->
                        @include('layouts.footer')
                        <!-- end footer -->
                    </main>
                    <!-- min content end -->

                </div>
            </div>
        </div>
    </section>

    <!-- js -->
    @include('layouts.js')

</body>

</html>
