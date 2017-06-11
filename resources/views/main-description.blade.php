<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $generalData->name }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css" />
        <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="//cdn.materialdesignicons.com/1.9.32/css/materialdesignicons.min.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,500i,700" rel="stylesheet">
    </head>
    <body>
        @include('layout.topnav')

        <div class="content-with-nav">
            @include('layout.leftnav')
            @include('templates.gallery-main')
            @include('layout.footer')
        </div>
    </body>
</html>
