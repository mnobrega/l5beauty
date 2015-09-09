<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-COMPATIBLE" content="IE-edge">
        <meta name="viewport" content="width=device-width, intial-scale=1">
        <meta name="description" content="{{$meta_description}}">
        <meta name="author" content="{{config('blog.author')}}">

        <title>{{$title or config('blog.title')}}</title>

        {{-- Styles --}}
        <link href="/css/blog.css" rel="stylesheet">
        @yield('styles')
    </head>
    <body>
        @include('blog.partials.page-nav')

        @yield('page-header')
        @yield('content')

        @include ('blog.partials.page-footer')

        {{-- Scripts --}}
        <script src="/js/blog.js"></script>
        @yield('scripts')
    </body>
</html>