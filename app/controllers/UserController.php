<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	
	public function getIndex()
	{
		$users = \User::all();  //paginate(6);
		
		return View::make('pages.users', array(
			'table_row' => $users
		));
	}
    
/*    public function postUserexists()
    {
        $email = Input::get('email');
        $password = Input::get('password');
        $e_exists = (!null ==(DB::table('users')->where('email',$email)->get()));
        $p_exists = (!null ==(DB::table('users')->where(array('email',$email,'password',$password))->get()));
        if($e_exists){
            if($p_exists){
        return 'rubbish';
                return Redirect::to('sessions.store')->with($email,$password);
            }
        return Redirect::to('user/addusers');
        }
        //
    }*/
	//////////////////////////
	public function postAdduser()
	{
	    User::create(array(
	        'name' => Input::get('newuser'),
            'email' => Input::get('email'),
            'password' => Hash::make(Input::get('password'))
	    ));  
	   
		$validation = Validator::make(Input::all(), array('newuser'=>'required','email'=>'required','password'=>'required'));	
		if ($validation->fails())
		{
			return Redirect::back()->withInput()->withErrors($validation->messages());
		}
         /*
		$password = Input::get('password');
		$hashedPassword = Hash::make($password);
		$userdata = array(
			'newuser' => Input::get('newuser'),
			'email' => Input::get('email'),
			'password' => $hashedPassword//Input::get('password')
		);
		DB::table('users')->insert(array(
			'email' => $userdata['email'], 
			'name' => $userdata['newuser'],
			'password' => $userdata['password']
		));
		*/
		//return Redirect::to('user');
        return Redirect::intended();
	}
	////////////////////////
	public function getAddusers()
	{
		return View::make('pages.addusers');
	}
    
    public function getNewuser()
    {
        return View::make('sessions.newuser');
    }
    
        public function getReset()
    {
        return View::make('sessions.forgot');
    }
    
    public function getMyaccount()
    {
        return View::make('myaccount');
    }
    
    public function getUserpurchases()
    {
        return View::make('selectuser_showpurchases');
    }
    
    public function postUserpurchases()
    {
        $email = Input::get('email');    
        return View::make('userpurchases')->with($email);
    }
    
     public function getShowuserpurchases()
    {
        return View::make('userpurchases');
    }
    
    public function getChange()
    {
        return View::make('change_details');
    }
	/////////////////////////
		/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
	 
	