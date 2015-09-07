<?php

class SessionsController extends BaseController{
    
     
    public function create()
    {
            //dd($login_source);
            if(!Session::has('login_from')){	
			Session::put('login_from',URL::previous());
			}
            if (Auth::check()) return Redirect::intended();
            return View::make('sessions.create');
        
    }    
    
    public function createadmin()
    {
            if (Auth::check()&&Auth::user()->superuser) return Redirect::to('Admin\FishController@getIndex');
            return View::make('sessions.createadmin');
        
    }
    
    public function store()
    {
    	if(isset($_COOKIE['thefragment']))Session::flash('urifragment',$_COOKIE['thefragment']);
		setcookie ("thefragment", "", time() - 3600); //to get return to same view of icon table  
        $validator = $this->getLoginValidator();
        $credentials = [
            'email'    => Input::get('email'),
            'password'  => Input::get('password')    
        ];
        $entered_email = $credentials['email'];
        
        if (Auth::attempt($credentials,true))
        {   //correct login details
            //return Redirect::to(Session::get('return_url'))->with(Auth::user()->email);
            //from download page ...{
            $uri_fragment = Session::get('urifragment');
			Session::pull('urifragment');
			
            //return Redirect::intended(Session::get('previous_url').$uri_fragment)->with(Auth::user()->email);
            //return Redirect::intended('/')->with(Auth::user()->email);
			return Redirect::to(Session::pull('login_from'))
				->with(Auth::user()->email)
				;
			//...}
        }
        else  //login failed - is entered email in db?
        {
        $email_exists = (!null ==(DB::table('users')->where('email',$entered_email)->get()));
        if ($email_exists)
        {
             
            //return Redirect::to('user/addusers');   
            return Redirect::back()
                ->withInput(['email' => $entered_email])
                ->withErrors($validator)
                ->withMessage('Incorrect password');
				//->with(['login_source' => $login_to]);
        }
        //return Redirect::intended();
        return Redirect::to('user/newuser')
			->withErrors('OR </br>  entered the wrong E-mail address?');
        #return Redirect::back()->withErrors($validator);
        }
    }
    
    public function adminstore()
    {
        if ($this->isPostRequest()) {
            $validator = $this->getLoginValidator();    
        if (Auth::attempt(Input::only('name','password')))
        {
            return Redirect::to('admin.fish')->with(Auth::user()->name);
        }
       
        //return Redirect::intended();
        //return Redirect::to('user/addusers');
        return Redirect::back()->withErrors($validator);
        return Redirect::back()->withInput()->withErrors($validator);
        }
    }
    
    
     public function newstore()
    {
        $email = Input::get('email'); 
        $password = Input::get('password');  
        if (Auth::attempt(Input::only('email','password')))
        {
            return Redirect::back()->with(Auth::user()->email);
        }
        
        //return Redirect::back()->withInput()->withErrors($validator);
        
        if (Auth::attempt(Input::only('email')))
            {
        return Redirect::to('user/addusers');
            }
    }
    
    public function destroy()
    {   
        Session::forget('return_url');
		Session::forget('dest_email');
		Session::forget('login_to');
        Cart::instance('main')->destroy();
        Cart::instance('shop')->destroy();
        Auth::logout();
        
        return Redirect::to(URL::previous('/'));
    }
    
    public function adminDestroy()
    {
    	Session::forget('return_url');
		Session::forget('dest_email');
		Session::forget('login_to');
        Cart::instance('main')->destroy();
        Cart::instance('shop')->destroy();
        Auth::logout();
        
        return Redirect::to('/');
    }
    
    protected function getLoginValidator()
    {
        return Validator::make(Input::all(),array(
        "email" => "required|email",
        "password" => "required"
        ));
    }
    
    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }
}