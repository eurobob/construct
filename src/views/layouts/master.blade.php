<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="{{ $meta_description }}">
  <meta name="author" content="{{ config('blog.author') }}">

  <title>{{ $title or config('blog.title') }}</title>

  {{-- Styles --}}
  <!--[if lte IE 8]>
      <link href="{{ URL::asset('assets/css/ie.css') }}" rel="stylesheet">
  <![endif]-->
  <!--[if gt IE 8]><!-->
      <link href="{{ URL::asset('assets/css/app.css') }}" rel="stylesheet">
  <!--<![endif]-->
  @yield('styles')

  {{-- HTML5 Shim and Respond.js for IE8 support --}}
  <!--[if lt IE 9]>
  <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
@include('build::includes.partials.page-nav')

@yield('page-header')
@yield('content')

@include('build::includes.partials.page-footer')

{{-- Scripts --}}
<script src="{{ URL::asset('assets/js/vendor/modernizr-custom.js') }}"></script>
@yield('scripts')

</body>
</html>