<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Kokomo Shop|{{ isset($title) ? $title : '' }}</title>
     @include('includes.css')
</head>
<body class="home-page boxed is-dropdn-click">
    @include('includes.header')
    <div class="page-content">
      @yield('content')
    </div>
    @include('includes.footer')
    @include('includes.script')
</body>
</html>