<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Kokomo Shop|{{ isset($title) ? $title : '' }}</title>
     @include('includes.admin_css')
</head>
<body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu preload-transitions 2-columns   " data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">
    @include('includes.menu')
    <div id="main">
      @yield('content')
    </div>
    @include('includes.admin_footer')
    @include('includes.admin_script')
    
</body>
</html>