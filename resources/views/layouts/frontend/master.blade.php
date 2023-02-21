<!doctype html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Easy Shop</title>
      <link href="/frontend/style/font-awesome.css" rel="stylesheet" type="text/css">
      <link href="/frontend/style/bootstrap.css" rel="stylesheet" type="text/css">
      <link href="/frontend/style/owl.carousel.css" rel="stylesheet" type="text/css">
      <link href="/frontend/style/owl.theme.default.css" rel="stylesheet" type="text/css">
      <link href="/frontend/style/style.css" rel="stylesheet" type="text/css">
   </head>
   <body>

      @include('layouts.frontend.header')

      @yield('content')

      @include('layouts.frontend.footer')

      <script src="/frontend/js/jquery-3.3.1.js" type="text/javascript"></script>
      <script src="/frontend/jquery.simple.timer.js" type="text/javascript"></script>
      <script src="/frontend/js/bootstrap.js" type="text/javascript"></script>
      <script src="/frontend/js/owl.carousel.min.js" type="text/javascript"></script>
      <script src="/frontend/js/js.js" type="text/javascript"></script>
   </body>
</html>
