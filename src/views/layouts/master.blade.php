<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="{{ $meta_description }}">
  <meta name="author" content="{{ config('site.author') }}">

  <title>{{ $title or config('site.title') }}</title>

  {{-- Styles --}}
  <!--[if lte IE 8]>
      <link href="{{ elixir('css/ie.css') }}" rel="stylesheet">
  <![endif]-->
  <!--[if gt IE 8]><!-->
    @if (App::environment('local'))
      <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    @else
      <link href="{{ elixir('assets/css/app.css') }}" rel="stylesheet">
    @endif
  <!--<![endif]-->
  @yield('styles')

  {{-- HTML5 Shim and Respond.js for IE8 support --}}
  <!--[if lt IE 9]>
  <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="{{ asset('svg/grunticon.loader.js') }}"></script>
  <script>
    grunticon(["{{ asset('svg/icons.data.svg.css') }}", "{{ asset('svg/icons.data.png.css') }}", "{{ asset('svg/icons.fallback.css') }}"], grunticon.svgLoadedCallback );
  </script>
</head>
<body>

<?php $isAdmin = Auth::check() ? 1 : 0; ?>

@if ($isAdmin)
  <div class="admin">
    <div class="admin__bar">

    </div>
    <div class="admin__site">
@endif

@include('build::includes.partials.page-nav')

<main>
  @yield('content')
</main>

@include('build::includes.partials.page-footer')

@if ($isAdmin)
  <!-- Close admin -->
    </div>
  </div>
@endif

{{-- Scripts --}}
<script src="{{ elixir('js/vendor/modernizr-custom.js') }}"></script>
@if (env('GOOGLE_ANALYTICS'))
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', <?php echo "'" . env('GOOGLE_ANALYTICS') . "'" ?>, 'auto');
    ga('send', 'pageview');

  </script>
@endif

</body>
</html>