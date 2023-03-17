<!DOCTYPE html>
<html>
<head>
    <style>
        .operation:focus{
            outline: none;
        }
        .operation:hover{
            cursor: pointer;
            background-color: lightgray;
        }
        .operation:active{
            background-color: #dcdcdc;
        }
        .category-form{

            padding: 15px 5px;
            box-shadow: 0px 0px 10px #dcdcdc;
            margin-right: 20px;
            border-radius: 5px;
        }
        .submit-btn {
            margin-top: 30px;

        }

        .submit-btn input {
            background-color: #0678F1;
            border: 0px;
            color: white;
            padding: 7px;
            border-radius: 3px;
            cursor: pointer;
            margin-right: 10px;
        }
        .btn-style{
            background-color: #0678F1;
            border: 0px;
            color: white;
            padding: 7px;
            border-radius: 3px;
            cursor: pointer;
            margin-right: 10px;
            margin-left: 50px;
            float: left;
        }
        .btn-style:hover{
            background-color: #025fbf;
        }
        .btn-style:active{
            background-color: #0678F1;
        }
        .submit-btn input:hover{
            background-color: #025fbf;
        }
        .submit-btn input:active{
            background-color: #0678F1;
        }
    </style>
    

    <link rel='stylesheet' href='https://unpkg.com/react-quill@1.0.0/dist/quill.core.css'>
    <link rel='stylesheet' href='https://unpkg.com/react-quill@1.0.0/dist/quill.snow.css'>
    <link rel='stylesheet' href='https://unpkg.com/react-quill@1.0.0/dist/quill.bubble.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/draft-js/0.10.0/Draft.min.css'>
    <link rel="stylesheet" href="/admin/dist/style.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>پنل مدیریت | داشبورد اول</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/admin/plugins/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/admin/https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/admin/dist/css/adminlte.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/admin/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="/admin/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="/admin/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/admin/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- bootstrap rtl -->
    <link rel="stylesheet" href="/admin/dist/css/bootstrap-rtl.min.css">
    <!-- template rtl version -->
    <link rel="stylesheet" href="/admin/dist/css/custom-style.css">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">


    @include('layouts.admin.header')
    @include('layouts.admin.sidebar')
    @yield('content')
    @include('layouts.admin.footer')


</div>


<!-- jQuery -->
<script src="/admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="/admin/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="/admin/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="/admin/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="/admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/admin/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/admin/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/admin/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/admin/dist/js/demo.js"></script>





<script src='https://cdnjs.cloudflare.com/ajax/libs/react/15.3.1/react.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/react/15.3.1/react-dom.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/immutable/3.8.1/immutable.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.34/browser.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/es6-shim/0.35.3/es6-shim.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/draft-js/0.10.0/Draft.js'></script>
<script  src="/admin/dist/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
