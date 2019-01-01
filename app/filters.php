<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
    if( ! Request::secure())
    {
        return Redirect::secure(Request::path());
    }//
});


App::after(function($request, $response)
{
    //
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/
/*---------------------------
 * User
 * ----------*/

Route::filter('auth', function()
{	
    if(Auth::guest())return Redirect::to('login');
    return;
    });


/*----------------------
 * Superuser
 * -------------------------------- */
 
Route::filter('superuser', function() {
    if(Auth::guest()||((Auth::user()->superuser !== 1)&&(Auth::user()->superuser !== 2)))return Redirect::to('/login');
    return;
});
Route::filter('developer', function() {
    if(Auth::guest()||(Auth::user()->superuser !== 2))return Redirect::to('/login');
    return;
});

/* --------------------
 * Basic
 * --------------------
 */ 
Route::filter('auth.basic', function()
{
    return Auth::basic();
});
/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
    if (Request::ajax())
        {
            return Response::make('Unauthorized', 401);
        }
        else{
            if (Auth::check()) return Redirect::to('/');
        }//if (Auth::check()) return Redirect::intended();
});
Route::filter('duplicate',function($user,$details){
	//dd($user);
	$userexists = User::where('email', '=' ,$details->email)->first();
			if($userexists !==NULL){Redirect::to('download');}
			return Redirect::intended();
});		
/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
    if (Session::token() != Input::get('_token'))
    {
        throw new Illuminate\Session\TokenMismatchException;
    }
});

App::error(function(Exception $exception,$code)
{
    Log::error($exception);
    if ($_ENV['DEBUG'] == true){
        //dd('hi');
        return Redirect::to('error')->with([
            'title' => 'error'
        ]);
}});
/*

Route::filter('pageload',function(){
	
		$pageload = new Pageload;
		$pageload->addtocart = 1;
		$pageload->amount_in_cart = \Cart::total();
		$pageload->client_ip = Request::getClientIp();
		$pageload->save();
		return;
});*/