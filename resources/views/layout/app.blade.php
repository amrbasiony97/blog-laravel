<!doctype html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --main: #00ADB5;
            --secondary: #08D9D6;
            --light: #E3FDFD;
            --darker: #222831;
            --dark: #52616B;
        }

        body {
            font-family: 'Roboto', sans-serif;
            color: var(--dark) !important;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: var(--main);
        }

        td {
            vertical-align: baseline;
            color: var(--dark) !important;
        }

        th {
            color: var(--main) !important;
        }

        .text-info {
            color: var(--secondary) !important;
        }
        .accordion-body {
            color: var(--dark) !important;
        }

        .form-control, .form-select {
            color: var(--darker) !important;
        }

        .nav {
            background-color: var(--darker) !important;
        }

        .accordion-button {
            background-color: var(--light) !important;
            color: var(--main) !important;
            font-weight: bold;
        }

        .page-item>a {
            color: var(--main) !important;
        }

        .page-item.active>.page-link {
            background-color: var(--main) !important;
            border-color: var(--main) !important;
        }
    </style>
</head>

<body>

    <header>
        <nav class="nav bg-dark text-light justify-content-start">
            <a class="nav-link text-light" href="{{ route('posts.index') }}">ITI Blog</a>
            <a class="nav-link text-light" href="{{ route('posts.index') }}">All Blogs</a>
        </nav>
    </header>
    <main class="container" style="margin-top: 50px;">
        @yield('content')
    </main>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <!-- Load Jquery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
