<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
        Blogs
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link href="https://fonts.bunny.net/css?family=Miriam+Libre:400,700|Merriweather" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-neutral">
    <header class="py-5 mb-10 mx-auto w-4/5">
        @include('layouts.nav')
    </header>

    <div class="mx-auto w-4/5">
        @yield('content')
    </div>

    <footer>
        {{-- footer --}}
    </footer>
</body>

</html>
