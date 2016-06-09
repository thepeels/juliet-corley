<?php

use \socialnorm\Exceptions\ApplicationRejectedException;
use \SocialNorm\Exceptions\InvalidAuthorizationCodeException;
//use \AdamWathan\EloquentOAuth\Exceptions\InvalidAuthorizationCodeException;
use \Detail,\User;
class OauthController extends \BaseController
{
	public function Auth($provider){
		//$provider = Input::get('provider');
		return  OAuth::authorize($provider);
}
/*    public function oaLogin($provider){
		$return_url = (NULL!==(Session::get('return_url')))?Session::get('return_url'):'/';
    	$this->login($provider);
		return Redirect::to($return_url);
}*/
	public function OaLogin($provider){
		$return_url = (NULL!==(Session::get('login_from')))?Session::get('login_from'):'/';
	try {
	    OAuth::login($provider, function($user, $details) use($provider){
	    	if($details->email == NULL){//No email from in particular Facebook
	    		$this->no_email_returned($provider);
	    	}
	    	//has user previously created account with un and pw login ?
    		$password_login = ['email' => $details->email,'both_emails' => FALSE];	
    		$userexists 	= User::where($password_login)->first();
			//so we found such a user...
			if($userexists !==NULL){//we found such a user...
				//identify and hold the relevant detail record
				$detail = Detail::where('user_id','=',$userexists->id)->first();
				//start moving over the user values to the new user record
				$user->password 		= $userexists->password;
				//$user->author_name = $userexists->author_name;
				$user->superuser		= $userexists->superuser;
				$user->remember_token 	= $userexists->remember_token;
				//hold onto the email record
				Session::flash('temp_email',$userexists->email);
				//remove the original user
				//dd($password_login);
				User::where($password_login)->first()->delete();
				//continue filling out the new user
				$user->email 			= Session::get('temp_email');
				$user->oauth_email 		= $details->email;
				$user->both_emails 		= TRUE;
				$user->name  			= $details->nickname;
				$user->save();
				//allocate detail to 'new' user
				$new_detail = new Detail;
				$new_detail->user_id 		= $user->id;
				$new_detail->author_name 	= $detail->author_name;
				$new_detail->alias 			= $detail->alias;
				$new_detail->note 			= $detail->note;
				$new_detail->address 		= $detail->address;
				$new_detail->postcode 		= $detail->postcode;
				$new_detail->save();
				$detail->delete();//delete existing record
			}
			//OR....
			if ($userexists === NULL){
				//$user = new User;
				$user->oauth_email = $details->email;
			    //$user->email = $details->email;
				$user->name  = $details->nickname;
			    $user->save();
				//and also
				$detail = Detail::where('user_id','=',$user->id)->first();
				if ($detail === NULL){
					$detail = new Detail;
					$detail->user_id = $user->id;
					$detail->save();
					
				}
	    	}
	    // Current user is now available via Auth facade
	});}
	
	catch (ApplicationRejectedException $e){//dd($e);
		$resp = Redirect::action('SessionsController@create')
				->with('message','If you want to login with <strong>' 
				. $provider 
				. '</strong>, you must grant access to julietcorley.com <strong>OR</strong> ...');
		Session::driver()->save();
		$resp->send();
		exit();
	} catch (InvalidAuthorizationCodeException $e) {
        // Authorization was attempted with invalid
        // code,likely forgery attempt
    }
		return Redirect::to($return_url);
//    return;
}
	private function no_email_returned($provider){
		$resp = Redirect::action('SessionsController@create')
			->with('message','Juliet Corley.com requires your <strong>'.$provider.' email</strong> to login.
				Go back to '.$provider.' <strong>Privacy Checkup -> Apps</strong><em> (under the padlock)</em> and remove the 
				permission for Juliet Corley
				<strong> OR</strong> you have to ...');
		Session::driver()->save();
		$resp->send();
		exit();
		
	}
}

/*	function processlogins($provider){
		//$this->errorhandling($provider,$access_error);
    	$this->login($provider);
		return;
}
	public function githubAuth(){
		Return  OAuth::authorize('github');
}
    public function githubLogin(){
		$return_url = (NULL!==(Session::get('return_url')))?Session::get('return_url'):'/';
    	$this->login('github');
		return Redirect::to($return_url);
}
	public function googleAuth(){
		return  OAuth::authorize('google');
}
    public function googleLogin(){
		$return_url = (NULL!==(Session::get('return_url')))?Session::get('return_url'):'/';
    	$this->login('google'); 
		return Redirect::to($return_url);
}
	public function facebookAuth(){
		return  OAuth::authorize('facebook');
}
    public function facebookLogin(){
		$return_url = (NULL!==(Session::get('return_url')))?Session::get('return_url'):'/';
    	$this->login('facebook');
		return Redirect::to($return_url);
}*/
