<?php

class RemindersController extends Controller {

	/**
	 * Display the password reminder view.
	 *
	 * @return Response
	 */
	public function getRemind() /*getRemind or (index if resource)*/
	{
		return View::make('password.remind');
	}

	/**
	 * Handle a POST request to remind a user of their password.
	 *
	 * @return Response
	 */
	public function postRemind() /*postRemind or store*/
	{
		    
		switch ($response = Password::remind(Input::only('email'), function($message)
		{
			$message->subject('Link with Password Reset Token');
		}))
		{
			case Password::INVALID_USER:
				return Redirect::back()->with('error', Lang::get($response));

			case Password::REMINDER_SENT:
				return Redirect::back()->with('success', Lang::get($response));
		}
	}
	/**
	 * Display the password reset view for the given token.
	 *
	 * @param  string  $token
	 * @return Response
	 */
	public function getReset($token = null) /*getReset or show*/
	{
		if (is_null($token)) App::abort(404);

		return View::make('password.pw_reset')->with('token', $token);
	}

	/**TODO: trace routes during reset
	 * 
	 * Handle a POST request to reset a user's password.
	 *
	 * @return Response
	 */
	public function postReset() 
	{
		$credentials = Input::only(
			'email', 'password', 'password_confirmation', 'token'
		);

		$response = Password::reset($credentials, function($user, $password)
		{
			$user->password = Hash::make($password);

			$user->save();
		});

		switch ($response)
		{
			case Password::INVALID_PASSWORD:
                return Redirect::back()->withInput()->with('error', Lang::get($response));
			case Password::INVALID_TOKEN:
                return Redirect::back()->with('error', Lang::get($response));
			case Password::INVALID_USER:
				return Redirect::back()->with('error', Lang::get($response));

			case Password::PASSWORD_RESET:
				return Redirect::to('/login')->withInput();
		}
        return Redirect::to('/');
	}

}
