<!DOCTYPE html>
<html>
    <head>
        <!-- Bootstrap CSS & JS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        {{ HTML::style( asset('css/admin.css') ) }}
        @yield('stylesheets')
        <meta charset="UTF-8">

    </head>
 
    @yield('body')
       
        <div class="container">
            
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand my-account" href="#">Juliet Corley - My User Account</a>
                  </div>
                  <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                      <li><a href="/">Home</a></li>
                      <li><a href="myaccount">Purchases</a></li>
                      <li><a href="change">Details</a></li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Fish <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="/admin/fish">Fish Table</a></li>
                          <li><a href="/admin/fish/add">Add Fish</a></li>
                          <li class="divider"></li>
                          <li class="dropdown-header">Pricing</li>
                          <li><a href="/admin/prices">Icon Prices</a></li>
                        </ul>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Users <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="../../user">User List</a></li>
                          <li><a href="../../purchases">User Purchases</a></li>
                          <li><a href="#">Something else here</a></li>
                          <li class="divider"></li>
                          <li class="dropdown-header">Nav header</li>
                          <li><a href="#">Separated link</a></li>
                          <li><a href="#">One more separated link</a></li>
                        </ul>
                      </li>
                      {{--<li {{ Request::is('admin/fish*') ? ' class="active"' : '' }}><a href="/admin/fish">Fish</a></li>--}}
                      {{--<li {{ Request::is('admin/art*') ? ' class="active"' : '' }}><a href="/admin/art">Art</a></li>--}}
                    </ul>                    
                    <ul class="nav navbar-nav navbar-right">
                      <li> <a href="/download">Public Pages</a></li>
                      <? if (Auth::check()){?>
                      <li><a href="{{ URL::to('logout') }}">Logout</a></li>{{--admin/logout--}}
                      <?}
                      else{?>
                      <li><a href="{{ URL::to('login') }}">Login</a></li>{{--admin/logout--}}
                      <?}?>
                    </ul>
                  </div><!--/.nav-collapse -->
                </div><!--/.container-fluid -->
              </nav>
          
            @yield('title')
            
            @yield('content')
            
            @yield('footer')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        </div>
    </body>
</html>