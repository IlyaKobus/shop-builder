<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('dashboard.title') }}</title>
    <!-- <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"> -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;subset=cyrillic,cyrillic-ext"
          rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    @yield('css')

</head>

@if($user)
    @include('dashboard.layouts.user')
@else
    @yield('body')
@endif

<script src="{{asset('/js/app.js')}}"></script>

@yield('js')

</html>