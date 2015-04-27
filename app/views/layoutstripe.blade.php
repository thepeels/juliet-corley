<html>
	<!--<link rel="stylesheet"type="text/css"href="{{ URL::asset('css/style.css') }}"><!-- absolute path only works in blade -->
    {{ HTML::style( asset('css/style.css') ) }}

	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
	

<script type="text/javascript">
  // This identifies your website in the createToken call below
  Stripe.setPublishableKey('pk_test_6pRNASCoBOKtIshFeQd4XMUh');
  // ...
</script>

    
@yield('body-class')

@yield('title')

@yield('content')

@yield('footer')

</body>
</html>