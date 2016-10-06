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
                          <li class="divider"></li>
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
                          <li><a href="/admin/shop">Edit and Delete</a></li>
                          <li class="divider"></li>
                          <li><a href="/admin/shop/add">Add Product</a></li>
                          <li><a href="/admin/shop/addpdf">Add Colouring pdf</a></li>
                          <li><a href="/admin/shop/addfreepdf">Add Free pdf</a></li>
                        </ul>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Users <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="{{ URL::to('user') }}">User List</a></li>
                          <li><a href="{{ URL::to('purchases') }}">User Purchases</a></li>
                          <li><a href="{{ URL::to('notes') }}">User Notes</a></li>
                          <li><a href="{{ URL::to('user/deleted') }}">Deleted Users</a></li>
                          <li class="divider"></li>
                          <li><a href="{{ URL::to('authors') }}">Authors with Notes</a></li>
                          <li><a href="{{ URL::to('authornotes') }}">Notes by Author</a></li>
                        </ul>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Purchases <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="{{ URL::to('recentpurchases') }}">Recent Purchases</a></li>
                          <li><a href="{{ URL::to('twelvepurchases') }}">Year Purchases</a></li>
                          <li><a href="{{ URL::to('purchasessummary') }}">Summarized Purchases</a></li>
                          <li><a href="{{ URL::to('allpurchases') }}">All Purchases</a></li>
                        </ul>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Page Views <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="{{ URL::to('shopviews') }}">Cart View Summary</a></li>
                          <!--<li><a href="{{ URL::to('iconviews') }}">Icon Cart Views</a></li>-->
                        </ul>
                      </li>
                      {{--<li {{ Request::is('admin/fish*') ? ' class="active"' : '' }}><a href="/admin/fish">Fish</a></li>--}}
                      {{--<li {{ Request::is('admin/art*') ? ' class="active"' : '' }}><a href="/admin/art">Art</a></li>--}}
                    </ul>                    
                    <ul class="nav navbar-nav navbar-right">
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Public Pages <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="../../">Public Home Page</a></li>
                          <li><a href="../../colouring">Colouring</a></li>
                          <li><a href="../../shop">Shop</a></li>
                        </ul>
                      </li>
                      <li><a href="{{ URL::to('logoutadmin') }}">Logout</a></li>{{--admin/logout--}}
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