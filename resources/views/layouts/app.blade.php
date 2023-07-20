<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@isset($header) {{ $header }} @endisset  {{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{asset('css/glyphicon.css')}}">
    <!-- Styles -->

    @isset($css)
    {{ $css }}
    @endisset
    @livewireStyles

    <!-- Scripts -->
    

</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @isset($header)           
     
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }} 
                <hr>
                <a href="{{ url()->previous() }}"><button class="btn btn-dark btn-sm"><i class="fas fa-arrow-left"></i> Geri</button></a>
            </div>
        </header>
        @endisset

        <!-- Page Content -->

        <div class="py-6">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </div>
                @endif

                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    @isset($slot)
                    {{ $slot }}
                    @endisset
                </div>
            </div>

            @isset($home)
            {{ $home }}
            @endisset

            @isset($home2)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-2">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    {{ $home2 }}
                </div>
            </div>
            @endisset

            @isset($link)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-2">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    {{ $link }}
                </div>
            </div>
            @endisset

        </div>
    </div>

    @stack('modals')

    @livewireScripts
    <script src="{{ mix('js/app.js') }}"></script>
    @isset($js)
    {{ $js }}
    @endisset
</body>

</html>