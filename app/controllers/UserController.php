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
		$rules = [
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:4|not_in:admin1,admin,123456,password,654321,1234567,7654321'
        ];
		$validation = Validator::make(Input::all(), $rules);

        if($validation->fails())
        {
            return Redirect::back()->withInput()->withErrors($validation->messages());
        }
	    User::create(array(
	        'name' => Input::get('name'),
            'email' => Input::get('email'),
            'password' => Hash::make(Input::get('password'))
	    ));
		$credentials = [
			'email' => Input::get('email'),
            'password' => Input::get('password')
			];
		if (Auth::attempt($credentials)){
			return Redirect::intended('/');
		}
		 
        return Redirect::to('login')->withInput(Input::all());
	}
	public function postEdituser()
	{
		$id=Input::get('userid');
		$user = User::find($id);
		$user->email = Input::get('email');
		$user->save();
		return View::make('change_details');
	}
	public function postEditpassword()
	{
		$rules = [
		'password' => 'required|min:6|not_in:admin1,administrator,
			123456789,987654321,87654321,12345678,123456,1234567,
			password,7654321,654321,111111,aaaaaaa'
		];
		$validation = Validator::make(Input::all(), $rules);
		if($validation->fails())
        {
            return Redirect::back()->withInput()->withErrors($validation->messages());
        }
		$id=Input::get('userid');
		$user = User::find($id);
		$user->password = Hash::make(Input::get('password'));
		$user->save();
		return View::make('change_details');
	}
	public function postEditauthor()
	{
		$id=Input::get('userid');
		$user = User::find($id);
		$user->author_name = Input::get('authorname');
		$user->save();
		return View::make('change_details');
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
		if ($email!=null){
			$purchases = Userpurchase::distinct()
        	->where('email',$email)
        	->orderBy('created_at','DESC')
			#->paginate(3);
        	->get();	    
        return View::make('userpurchases',array(
			'purchases' => $purchases,
			'email'		=> $email
		));
        }
		Session::flash('notselected', 'No email selected!');
        return Redirect::back();
    }
    
     public function getShowuserpurchases()
    {
        return View::make('userpurchases');
    }
     
     public function getShowallpurchases()
    {
        #$purchases = Purchase::all();
		$purchases = DB::table('purchases')
		
		->groupBy('purchase')
		//->first()
		->paginate(10);
		#->get();
        return View::make('showallpurchases',array(
        	'purchases' => $purchases
		));
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
	 
	