<?php

use \AdamWathan\EloquentOAuth\Exceptions\ApplicationRejectedException;
use \AdamWathan\EloquentOAuth\Exceptions\InvalidAuthorizationCodeException;
use \Detail,\User;
class OauthController extends \BaseController
{
	public function githubAuth(){
		Return  OAuth::authorize('github');
}
    public function githubLogin(){
    	$provider = 'github';
    	$this->thelogin($provider);
		return Redirect::intended();
}
	public function facebookAuth(){
		Return  OAuth::authorize('facebook');
}
    public function facebookLogin(){
    	$provider = 'facebook';
    	$this->thelogin($provider);
		return Redirect::intended();
}
	public function googleAuth(){
		Return  OAuth::authorize('google');
}
    public function googleLogin(){
    	$provider = 'google';
    	$this->thelogin($provider);
		return Redirect::intended();
}
function thelogin($provider){
	try {
	    OAuth::login($provider, function($user, $details) {
	    	//has user previously created account with un pw login ?
    		$password_login = ['email' => $details->email,'both_emails' => FALSE];	
    		$userexists = User::where($password_login)->first();
			//so if we found such a user...
			if($userexists !==NULL){
				//identify the relevant detail record
				$detail = Detail::where('user_id','=',$userexists->id)->first();
				//start moving over the user values to the new user record
				$user->password = $userexists->password;
				$user->author_name = $userexists->author_name;
				$user->superuser = $userexists->superuser;
				$user->remember_token = $userexists->remember_token;
				//hold onto the email record
				Session::flash('temp_email',$userexists->email);
				//remove the original user
				User::where($password_login)->first()->delete();
				//continue filling out the new user
				$user->email = Session::get('temp_email');
				$user->oauth_email = $details->email;
				$user->both_emails = TRUE;
				$user->name  = $details->nickname;
				$user->save();
				$detail->user_id = $user->id;
				$detail->save();
			}
			if ($userexists === NULL){
				//$user = new User;
				$user->oauth_email = $details->email;
			    //$user->email = $details->email;
				$user->name  = $details->nickname;
			    $user->save();
				//dd($user);
			$detail = Detail::where('user_id','=',$user->id)->first();
			if ($detail === NULL){
				$detail = new Detail;
				$detail->user_id = $user->id;
				$detail->save();
			}
    		}
	    // Current user is now available via Auth facade
	});}
	
		 catch (ApplicationRejectedException $e){
	        // User rejected application
	    } catch (InvalidAuthorizationCodeException $e) {
	        // Authorization was attempted with invalid
	        // code,likely forgery attempt
	    }
	    	return;
}
}

/*    public function githubLogin(){
    	 try {
	    OAuth::login('github', function($user, $details) {
    		$userexists = User::where('email', '=' ,$details->email)->first();
			//dd($userexists);
    			if ($userexists === NULL){
					//$user = new User;
    				$user->oauth_email = $details->email;
				    //$user->email = $details->email;
					$user->name  = $details->nickname;
				    $user->save();
					//dd($user);
    			}
	    // Current user is now available via Auth facade
	//$user = Auth::user();
	//dd($user->id);	
			$detail = Detail::where('user_id','=',$user->id)->first();
				if ($detail === NULL){
					$detail = new Detail;
					$detail->user_id = $user->id;
					$detail->save();
				}
		//$user->id comes back as just that but all fields are empty
	});}
	
		 catch (ApplicationRejectedException $e){
	        // User rejected application
	    } catch (InvalidAuthorizationCodeException $e) {
	        // Authorization was attempted with invalid
	        // code,likely forgery attempt
	    }
	    	return Redirect::intended();
}*/