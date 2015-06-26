<!DOCTYPE html>
<html>
    <head>
        <!-- Bootstrap CSS & JS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
        <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        {{ HTML::style( asset('css/admin.css') ) }}
        {{ HTML::style( asset('css/grid16.css') ) }}
        <meta charset="UTF-8">

    </head>
 
    <body>
       
        <div class="container">
            
            <nav class="navbar navbar-default navbar-fixed-top container navbar-inverse" >
                <div class="container-fluid">
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Juliet Corley Website Admin</a>
                  </div>
                  <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                      <li {{ Request::path() === 'admin' ? ' class="active"' : '' }}><a href="/admin">Home</a></li>
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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Products <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="/admin/shop">Product Table</a></li>
                          <li><a href="/admin/shop/add">Add Product</a></li>
                        </ul>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Users <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="{{ URL::to('user') }}">User List</a></li>
                          <li><a href="{{ URL::to('purchases') }}">User Purchases</a></li>
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
                      <li><a href="{{ URL::to('logout') }}">Logout</a></li>{{--admin/logout--}}
                    </ul>
                  </div><!--/.nav-collapse -->
                </div><!--/.container-fluid -->
                    @yield('attached-nav')
              </nav>
          
            @yield('title')
            
            @yield('content')
            
            @yield('footer')
            
        </div>
    </body>
</html>