<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}">
    <title>Copyneitor</title>
</head>
<body>
    <header>
        <h1>Copyneitor</h1>
    </header>
    <main>
        @yield('main-content')
    </main>
    <footer>
        <a href="{{ url('index') }}">Start again</a>
    </footer>
</body>
</html>