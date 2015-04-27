<!DOCTYPE >
	<!--<link rel="stylesheet"type="text/css"href="{{ URL::asset('css/style.css') }}"><!-- absolute path only works in blade -->

<link rel='stylesheet' href='//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css'>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    {{ HTML::style( asset('css/style.css') ) }}
	


    
@yield('body-class')

@yield('title')

@yield('content')

@yield('menu')

@yield('footer')

