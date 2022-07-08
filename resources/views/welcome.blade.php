<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
  <link href="{{asset('css/app.css') }}" rel="stylesheet">
  <link href="{{asset('css/modal.css') }}" rel="stylesheet">
  <link href="{{asset('css/select.css') }}" rel="stylesheet">
  <link href="{{asset('css/select2.css') }}" rel="stylesheet">
  <link href="{{asset('css/bootstrap-select.css') }}" rel="stylesheet">
  <link href="{{asset('css/multiple-select.css') }}" rel="stylesheet">
  <link href="{{asset('css/datatable.css')}}" rel="stylesheet" />
  <link href="{{asset('css/toastr.css')}}" rel="stylesheet" />
  <link href="{{asset('css/vue-fullscreen.css')}}" rel="stylesheet" />
  <link href="{{asset('css/ladda.css')}}" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

  @routes

  <div id="vue">
    <index></index>
  </div>


  <script src="{{asset('js/jquery.js') }}"></script>
  <script src="{{asset('js/select2.js') }}"></script>
  <script src="{{asset('js/bootstrap-select.js') }}"></script>
  <script src="{{asset('js/modal.js') }}"></script>
  <script src="{{asset('js/select.js') }}"></script>
  <script src="{{asset('js/multiple-select.js') }}"></script>
  <script src="{{asset('js/vue.min.js') }}"></script>
  <script src="{{asset('js/datatable.js') }}"></script>
  <script src="{{asset('js/toastr.js') }}"></script>
  <script src="{{asset('js/vue-fullscreen.js') }}"></script>
  <script src="{{asset('js/ladda.js') }}"></script>
  <script src="{{asset('js/ladda.min.js') }}"></script>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>
