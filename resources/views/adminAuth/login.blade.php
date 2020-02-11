<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>KOKOMO ADMIN</title>
    <link rel="shortcut icon" type="image/png" href="{{asset('public/admin-assets/images/fevicon.png')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin-assets/vendors/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin-assets/css/themes/vertical-modern-menu-template/materialize.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin-assets/css/themes/vertical-modern-menu-template/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin-assets/css/pages/login.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin-assets/css/custom/custom.css')}}">
    <style type="text/css">
        .help-block{
            color:red;
        }
    </style>
  </head>
  <body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu preload-transitions 1-column login-bg   blank-page blank-page" data-open="click" data-menu="vertical-modern-menu" data-col="1-column">
    <div class="row">
      <div class="col s12">
        <div class="container"><div id="login-page" class="row">
            <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">
                <form class="login-form " method="POST" action="{{ route('admin_login') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="input-field col s12">
                    <h5 class="ml-4">Sign in</h5>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12 {{ $errors->has('email') ? ' has-error' : '' }}">
                    <i class="material-icons prefix pt-2">person_outline</i>
                    <input id="username" type="text" name="email" value="{{old('email')}}">
                    <label for="username" class="center-align">Username</label>                    
                     @if ($errors->has('email'))
                     <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                     </span>
                     @endif
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12 {{ $errors->has('password') ? ' has-error' : '' }}">
                    <i class="material-icons prefix pt-2">lock_outline</i>
                    <input id="password" type="password" name="password" value="{{ old('password')}}">
                    <label for="password">Password</label>
                    
                     @if ($errors->has('password'))
                     <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                     </span>
                     @endif
                     </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12 ml-2 mt-1">
                    <p>
                        <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span>Remember Me</span>
                        </label>
                    </p>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button type="submit" class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">Login</button>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 m6 l6">
                    <!-- <p class="margin medium-small"><a href="user-register.html">Register Now!</a></p> -->
                    </div>
                    <div class="input-field col s6 m6 l6">
                    <p class="margin right-align medium-small"><a href="user-forgot-password.php">Forgot password ?</a></p>
                    </div>
                </div>
                </form>
            </div>
            </div>
        </div>
        <div class="content-overlay"></div>
      </div>
    </div>

    <script src="{{asset('public/admin-assets/js/vendors.min.js')}}"></script>
    <script src="{{asset('public/admin-assets/js/plugins.min.js')}}"></script>
    <script src="{{asset('public/admin-assets/js/search.min.js')}}"></script>
    <script src="{{asset('public/admin-assets/js/custom/custom-script.min.js')}}"></script>
  </body>
</html>