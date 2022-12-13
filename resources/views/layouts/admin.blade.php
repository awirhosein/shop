<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('dashboard') }}</title>

    <link rel="stylesheet" href="{{ asset('admin/fonts/fontawesome/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/fonts/iransans/font-face.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">

    @vite('resources/scss/admin.scss')
</head>

<body>

    <x-admin.navbar />

    <div class="container-fluid">
        <div class="row m-0">

            <x-admin.sidebar />

            <main id="main" class="col-md-12 mr-sm-auto col-lg-10 px-md-4 pt-5 text-right"><br>

                {{ $slot }}

            </main>
        </div>
    </div>


    <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>

    {{ $script }}

    @include('sweetalert::alert')

    @vite('resources/js/admin.js')

</body>
</html>
