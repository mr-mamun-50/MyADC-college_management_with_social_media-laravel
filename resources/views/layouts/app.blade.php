@include('layouts.includes.head')

<body>

    <!-- Navbar-->
    @include('layouts.includes.navbar')

    <div class="container-fluid mt-5">


        @yield('content')

        {{-- <div class="row">

            <div class="d-none d-lg-block col-lg-3 py-md-4 scroll">
                @yield('left_content')
            </div>

            <div class="col-lg-6 col-md-8 py-md-4 pt-4 scroll">
                @yield('center_content')
            </div>

            <div class="col-lg-3 col-md-4 py-md-4 pt-4 scroll">
                @yield('right_content')
            </div>

        </div> --}}
    </div>

    <a href="{{ route('messenger') }}" class="fixedbutton btn btn-primary btn-rounded square px-0"
        data-mdb-toggle="tooltip" data-mdb-placement="left" title="Messenger"><i
            class="bi bi-chat-square-fill fa-lg"></i></a>


    @include('layouts.includes.scripts')
</body>

</html>


{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html> --}}
