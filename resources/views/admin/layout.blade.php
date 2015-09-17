<html lang="pt">
    <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
            <meta name="viewport" content="with-device-width, initial-scale=1">

            <title>{{ config('blog.title') }} Admin </title>

            <link href="{{elixir('css/admin.css')}}" rel="stylesheet">

            @yield('styles')
    </head>

    <body>
        {{-- Navigation Bar --}}
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-menu">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">{{ config('blog.title') }} Admin</a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-menu">
                    @include('admin.partials.navbar')
                </div>
            </div>
        </nav>

        @yield('content')

        <script src="{{elixir('js/admin.js')}}"></script>

        @yield('scripts')
    </body>
</html>