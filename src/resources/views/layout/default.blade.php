<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Advert Task</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div id="app">
    <nav>
        <div class="nav-wrapper container">
            <a href="#" class="brand-logo">AdvertTask</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="#">Test 1</a></li>
                <li><a href="#">Test 2</a></li>
                <li><a href="#">Test 3</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
    @yield('content')
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
