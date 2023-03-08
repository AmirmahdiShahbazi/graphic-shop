<!doctype html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Easy Shop</title>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
{{--       <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>--}}
       <link rel="stylesheet" href="./style.css">

       <link href='http://www.fontonline.ir/css/BYekan.css' rel='stylesheet' type='text/css'>
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css" />
       <link href="/frontend/style/style.css" rel="stylesheet" type="text/css">
      <link href="/frontend/style/font-awesome.css" rel="stylesheet" type="text/css">
      <link href="/frontend/style/bootstrap.css" rel="stylesheet" type="text/css">
      <link href="/frontend/style/owl.carousel.css" rel="stylesheet" type="text/css">
      <link href="/frontend/style/owl.theme.default.css" rel="stylesheet" type="text/css">

       <style>
           .dropbtn {
               background-color: #04AA6D;
               color: white;
               padding: 16px;
               font-size: 16px;
               border: none;
           }

           .dropdown {
               position: relative;
               display: inline-block;
           }

           .dropdown-content {
               display: none;
               position: absolute;
               background-color: #f1f1f1;
               min-width: 160px;
               box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
               z-index: 1;
           }

           .dropdown-content a {
               color: black;
               padding: 12px 16px;
               text-decoration: none;
               display: block;
           }

           .dropdown-content a:hover {background-color: #ddd;}

           .dropdown:hover .dropdown-content {display: block;}

           .dropdown:hover .dropbtn {background-color: #3e8e41;}


           .category-btn{
               display: block;
               padding: 15px 10px;
               color: #616161;
               font-size: 12px;
               transition: all 0.2s;
               -webkit-transition: all 0.2s;
               -moz-transition: all 0.2s;
               -o-transition: all 0.2s;
               background-color: transparent;
               border: none;
           }
           .category-btn:hover{
               background-color: #ffffff;
           }
           .category-btn:focus{
              outline: none;
               border:none;
           }
           .selected
           {
            background-color: #fff1f1;
           }

       </style>
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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
{{--      <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>--}}
{{--      <script src='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>--}}

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <script  src="/frontend/js/script.js"></script>

      <script>
          $(document).ready(function(){
              $('.dropdown-submenu a.test').on("click", function(e){
                  $(this).next('ul').toggle();
                  e.stopPropagation();
                  e.preventDefault();
              });
          });
      </script>



   </body>
</html>
