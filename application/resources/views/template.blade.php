<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>BAMRI</title>


    {{-- Bootstrap --}}

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    {{-- Axios --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"
        integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    {{-- Script --}}

    <script type="module" src="{{ asset('./js/script.js') }}" defer></script>

</head>

<body>
    <nav id="myNav" class="navbar navbar-expand navbar-light bg-light">
        <a class="navbar-brand" href="/">BAMRI</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/bus">Bus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/driver">Driver</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/order">Order</a>
                </li>
                <li class="nav-item">
                    <button id="logout-btn" class="btn btn-primary ml-2">Logout</button>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>

</html>
