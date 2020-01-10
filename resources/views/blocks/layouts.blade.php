<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/scool/css/style.css">
    <link rel="stylesheet" href="/scool/css/styles/adaptive/adaptive.css">
    <link rel="stylesheet" href="/scool/css/fontawesome/all.css">
</head>

<body>

@yield('header')
<div class="wrapper">
    @yield('content')
    @yield('sidebar')
</div>

@yield('footer')
</body>
@push('scripts')
    <script src="/scool/js/events.js"></script>
@endpush

@stack('scripts')
</html>