<?
Route::controller('download','DownloadController');

Route::controller('art','admin\ArtController');

Route::controller('user','UserController');

Route::controller('test','TestController');

Route::controller('image-test','ImageTestController');

Route::controller('password','RemindersController');
    Route::get('password/reset/{token}','RemindersController@getReset');
    Route::post('password/reset/{token}',array('uses'=>
                'RemindersController@postReset','as' =>'password.reset'));

Route::controller('payment','PaymentController');

Route::resource('sessions','SessionsController');
    Route::get('logout', 'SessionsController@destroy');
    Route::get('login', 'SessionsController@create');
    Route::post('login',array('before'=>'csrf',function()
            {Route::post('login','SessionsController@store');}));
    Route::get('loginadmin', 'SessionsController@createadmin');
    Route::post('loginadmin',array('before'=>'csrf',function()
            {Route::post('loginadmin','SessionsController@adminstore');}));

Route::get('demo','HomeController@demo');
Route::get('temphome','HomeController@temphome');
//Route::get('/','HomeController@temphome');
Route::get('/','DownloadController@getIndex');
Route::get('home','HomeController@showWelcome');
Route::get('jchome','HomeController@jchome');
Route::get('about','PagesController@about');
Route::get('charge','PagesController@charge');
Route::get('services','PagesController@services');
Route::get('info','PagesController@info');

Route::post('validatefish','Fishcontroller@validateAddFish');

Route::group(array('before'=>'superuser'), function() {
    Route::controller('admin/fish','\Admin\FishController');
    Route::controller('admin/art','Admin\ArtController');
    Route::controller('admin','Admin\IndexController');
    Route::get('user','UserController@getIndex');
    Route::get('purchases','UserController@getUserpurchases');
});

Route::group(array('before'=>'auth'), function(){
        Route::get('cardpay', function(){return View::make('pages.cartstriper');});
        Route::get('icon/addtocart','IconController@getAddtocart');
});
    
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
