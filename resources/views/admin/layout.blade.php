<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>dashboard</title>

    <link rel="stylesheet" href="{{ asset('admin/fonts/iransans/font-face.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

    {{-- custom css --}}
    @vite('resources/scss/admin.scss')
</head>

<body>

    @include('admin.layouts.navbar')

    <div class="container-fluid">
        <div class="row">

            @include('admin.layouts.sidebar')

            <main id="main" class="col-md-12 mr-sm-auto col-lg-10 px-md-4 pt-5 text-right"><br>

                @yield('content')

            </main>
        </div>
    </div>


    <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>

    {{-- custom js --}}
    @vite('resources/js/admin.js')

</body>

</html>
