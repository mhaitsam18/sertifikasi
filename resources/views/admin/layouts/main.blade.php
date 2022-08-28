<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Aplikasi Dashboard">
        <meta name="author" content="Nadila Rayhan Iffah">
        <meta name="generator" content="Hugo 0.88.1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $title }}</title>
        <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">
        <link href="/fontawesome-free-6.1.1-web/css/all.css" rel="stylesheet" type="text/css" />

        <!-- Bootstrap core CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }
            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
            /* trix-toolbar [data-trix-button-group="file-tools"]{
                display: none;
            } */
        </style>
        <!-- Custom styles for this template -->
        <link href="/css/dashboard.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/css/trix.css">
        <script type="text/javascript" src="/js/trix.js"></script>
    </head>
    <body>
        @include('admin.layouts.header')
        <div class="container-fluid">
            <div class="row">
                @include('admin.layouts.sidebar')
                
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    @yield('container')
                </main>
            </div>
        </div>
        
        @include('admin.layouts.script')
	    @yield('script')
    </body>
</html>
