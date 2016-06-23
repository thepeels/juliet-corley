<?
Route::controller('user','UserController');

Route::controller('download','DownloadController');

Route::controller('art','admin\ArtController');

Route::controller('shop','ProductController');

Route::controller('test','TestController');

Route::controller('image-test','ImageTestController');

Route::controller('password','RemindersController');
    Route::get('password/reset/{token}','RemindersController@getReset');
    Route::post('password/reset/{token}',array('uses'=>
                'RemindersController@postReset','as' =>'password.reset'));

Route::controller('payment','PaymentController');

Route::resource('sessions','SessionsController');
    Route::get('logout', 'SessionsController@destroy');
    Route::get('logoutadmin', 'SessionsController@adminDestroy');
    Route::get('login', 'SessionsController@create');
    Route::post('login',array('before'=>'csrf',function()
            {Route::post('login','SessionsController@store');}));
    Route::get('loginadmin', 'SessionsController@createadmin');
    Route::post('loginadmin',array('before'=>'csrf',function()
            {Route::post('loginadmin','SessionsController@adminstore');}));

//OAUTH2 Login routes
Route::get('authorize/{provider}',array('as' => 'provider','uses'=>'OauthController@Auth'));
Route::get('oalogin/{provider}',array('as' => 'provider','uses'=>'OauthController@OaLogin'));

Route::get('demo','HomeController@demo');
Route::get('temphome','HomeController@temphome');
//Route::get('/','HomeController@temphome');
//Route::get('/','DownloadController@getIndex');
Route::get('/','HomeController@home');
Route::get('colouring','ProductController@getColouring');
Route::get('about','PagesController@about');
Route::get('terms','PagesController@terms');
Route::get('charge','PagesController@charge');
Route::get('services','PagesController@services');
Route::get('commissions','PagesController@commissions');
Route::get('info','PagesController@info');
Route::get('sitemap','PagesController@sitemap');

Route::post('validatefish','Fishcontroller@validateAddFish');

Route::group(array('before'=>'superuser'), function() {
    Route::controller('admin/fish','\Admin\FishController');
    Route::controller('admin/art','Admin\ArtController');
    Route::controller('admin/shop','Admin\ProductController');
    Route::controller('admin','Admin\IndexController');
    Route::get('user','UserController@getIndex');
    Route::get('purchases','UserController@userpurchases');
    Route::get('notes','UserController@usernotes');
    Route::get('authors','UserController@authorname');
    Route::get('authornotes','UserController@authornotes');
    Route::get('allpurchases','UserController@showallpurchases');
    Route::get('shopviews','IconController@shopviews');
    Route::get('iconviews','IconController@iconviews');
});
//Route::get('icon/addtocart',array('before'=>'auth','IconController@addtocart'));/*function()
//{Route::get('icon/addtocart','IconController@addtocart');}));*/
	
//Route::get('icon/addtocart','IconController@getAddtocart');
//Route::group(array('before'=>'auth'), function(){
       // Route::get('cardpay', function(){return View::make('pages.cartstriper');//});
        //Route::get('icon/addtocart','IconController@getAddtocart');
//});
Route::post('cardpay','PaymentController@postCart');
Route::post('shopcardpay','PaymentController@postShopcart');
//Route::get('shopcardpay',function(){return View::make('pages.cartstriper');});    
Route::controller('icon','IconController');
Route::get('back', function(){return Redirect::back();});
    /*Route::get('cardpay', array('before'=>'auth',function()
{
    return View::make('pages.cartstriper');
}));
Route::filter('auth',function(){
    if(Auth::guest()){
        return Redirect::guest('login');
    }
});*/
