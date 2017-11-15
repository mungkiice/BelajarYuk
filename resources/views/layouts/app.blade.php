<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name') }}</title>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script type="text/javascript">
    window.App = {!! json_encode([
      'csrf_token' => csrf_token(),
      'user' => Auth::user(),
      'signedIn' => Auth::check(),
      ])!!}
  </script>
  <style type="text/css">
    body{padding-bottom: 100px;}
    .level{display: flex; align-items: center;}
    .flex{flex: 1;}
    .mr-1{margin-right: 1em;}
    [v-cloak]{display: none;}
  </style>
</head>
<body >
  <div id="app">
    @include('layouts.nav')

    @yield('content')
    {{-- vue element, see more on app.js and flash.vue --}}
    {{-- pass a property called message --}}
    <flash message="{{session('flash')}}"></flash>
  </div>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
