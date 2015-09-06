<!doctype html>
<head>
<meta charset="UTF-8">
<?php if (App::environment('local')){echo("
<link href='http://fonts.googleapis.com/css?family=Trykker' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Handlee' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Overlock' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Merriweather:400,400italic' rel='stylesheet' type='text/css'>
");}
else{echo("
<link href='https://fonts.googleapis.com/css?family=Trykker' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Handlee' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Overlock' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Merriweather:400,400italic' rel='stylesheet' type='text/css'>
");}
?>
<link rel='stylesheet' href='/css/bootstrap.css' type='text/css'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="/fonts/MyFontsWebfontsKit.css" type="text/css">
<!--<link rel="shortcut icon" href="favicon.ico"/> 
<link rel="icon" href="favicon.ico"/> -->
        
@yield('stylesheets')
</head>
@yield('body-class')
@yield('title')
@yield('content')
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<?include_once('packages/prevent_right_click_script.php');
  include_once('packages/ajax-cart.php');
  include_once('packages/selected_letter.php');
  include_once('packages/ajax-email.php');
  include_once('packages/prevent_double_click_script.php');
  include_once('packages/rot13_script.php');
?>


</html>