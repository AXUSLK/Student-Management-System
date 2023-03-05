<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- css  -->
    @include('layouts.css')

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style type="text/css">
        td {
            border: 1px solid #726E6D;
            padding: 15px;
            text-align: center;
        }

        thead {
            font-weight: bold;
            text-align: center;
            background: #625D5D;
            color: white;
        }

        table {
            border-collapse: collapse;
            min-width: 500px;
        }

        .footer {
            text-align: right;
            font-weight: bold;
        }

        tbody>tr:nth-child(odd) {
            background: #D1D0CE;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- Main Content Section -->
    <section class="content">
        <div class="py-6">

            <div class="min-h-full pt-16 pb-12 flex flex-col">
                <main class="flex-grow flex flex-col justify-center max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex-shrink-0 flex justify-center">
                        <a href="/" class="inline-flex">
                            <span class="sr-only">Workflow</span>
                            <img class="h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-cyan-200.svg"
                                alt="">
                        </a>
                    </div>
                    <div class="py-16">
                        <div class="text-center">
                            <p class="text-sm font-semibold text-indigo-600 uppercase tracking-wide">403 error</p>
                            <h1 class="mt-2 text-4xl font-extrabold text-gray-900 tracking-tight sm:text-5xl">Forbidden.
                            </h1>
                            <p class="mt-2 text-base text-gray-500">Sorry, you don't have permission to access this
                                resource.
                            </p>
                            <div class="mt-6">
                                <a href="/" class="text-base font-medium text-indigo-600 hover:text-indigo-500">Go
                                    back home<span aria-hidden="true"> &rarr;</span></a>
                            </div>
                        </div>
                    </div>
                </main>
            </div>


        </div>
    </section>
    <!-- Main Content Section -->
</body>

</html>
