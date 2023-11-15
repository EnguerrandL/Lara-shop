<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <title>@yield('title')</title>
</head>

<body class="bg-secondary">
    <nav class="navbar navbar-dark bg-dark">
        <div class=" container d-flex flex-column flex-md-row justify-content-between">
            <a class="text-white py-2" href="/">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="d-block mx-auto">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="14.31" y1="8" x2="20.05" y2="17.94"></line>
                    <line x1="9.69" y1="8" x2="21.17" y2="8"></line>
                    <line x1="7.38" y1="12" x2="13.12" y2="2.06"></line>
                    <line x1="9.69" y1="16" x2="3.95" y2="6.06"></line>
                    <line x1="14.31" y1="16" x2="2.83" y2="16"></line>
                    <line x1="16.62" y1="12" x2="10.88" y2="21.94"></line>
                </svg>
            </a>
            <a class="text-white py-2 d-none d-md-inline-block" href="{{ route('products.index') }}">Admin</a>
            <a class="text-white py-2 d-none d-md-inline-block" href="{{ route('order.index') }}">Gérer les
                commandes</a>
            <a class="text-white py-2 d-none d-md-inline-block" href="{{ route('shop.index') }}">Tous nos produits</a>

            <a class="text-white py-2 d-none d-md-inline-block" href="#">Enterprise</a>

           @php
               $user = 1
           @endphp
                <a class="btn btn-info py-2 d-none d-md-inline-block" href="{{ route('cart.show', $user) }}">Voir le
                    panier</a>
         

        </div>
    </nav <div class="container-fluid">


    <div class="container mt-5">

        @if (session('message'))
            <div class="alert alert-{{ session('class') }}">

                {{ session('message') }}

            </div>
        @endif

    </div>


    @yield('content')

    </div>

</body>

</html>
