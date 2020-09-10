<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') - {{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/custom.css')}}">
    @include('site.partials.styles')
</head>
<body>

@include('site.partials.header')
@yield('content')
@include('site.partials.footer')
@include('site.partials.scripts')

<script  type="text/javascript" src="{{ asset('js/main.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.js')}}"></script>
@yield('js')
</body>
</html>