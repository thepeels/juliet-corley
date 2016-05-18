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
	public function getAuthorname()
	{
		$authors = \User::has('detail')->get();
		return View::make('pages.authors', array(
			'authors' => $authors
		));
	}

    public function getAuthornotes()
    {
        return View::make('selectauthor_shownotes');
    }
	
    public function postAuthornotes()
    {
        $author = Input::get('author');
		//var_dump(Input::get('author'));
		if ($author!=null){
			$notes = Detail::distinct('note')
        	->where('author_name',$author)
        	->orderBy('created_at','DESC')
			#->paginate(3);
        	->get();
		foreach ($notes as $row);
		$email = User::where('id','=',$row->user_id)->pluck('email');
        return View::make('authornotes',array(
			'author' 	=> $author,
			'notes'		=> $notes,
			'email'		=> $email
		));
        }
		Session::flash('notselected', 'No Author selected!');
        return Redirect::back();
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
		$user = new User;
		$user->name 	= Input::get('name');
		$user->email 	= Input::get('email');
		$user->password = Hash::make(Input::get('password'));
		$user->save();
	   /* User::create(array(
	        'name' => Input::get('name'),
            'email' => Input::get('email'),
            'password' => Hash::make(Input::get('password'))
	    ));*/
		Detail::create(array(
			'user_id' => $user->id
		));
		$credentials = [
			'email' => Input::get('email'),
            'password' => Input::get('password')
			];
		if (Auth::attempt($credentials)){
			if(Session::has('login_from'))return Redirect::to(Session::get('login_from'));
			return Redirect::to('/');
		}
		 
        return Redirect::to('login')->withInput(Input::all());
	}
	public function postEdituser()
	{
		$id=Input::get('userid');
		$user = User::find($id);
		$user->email = Input::get('email');
		if ($user->oauth_email != ""){$user->both_emails = TRUE;}
		$user->save();
		return Redirect::to('user/change');
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
		return Redirect::to('user/change');
	}
	public function postEditauthor()
	{
		$detail_id = \Auth::user()->detail->id;
		$detail = Detail::find($detail_id);
		$detail->author_name = Input::get('authorname');
		
		$detail->save();
		return Redirect::to('user/change');
	}
	public function postAddaddress()
	{
		$detail_id = \Auth::user()->detail->id;
		$detail = Detail::find($detail_id);
		if(NULL != Input::get('address'))$detail->address = Input::get('address');
		if(NULL != Input::get('postcode'))$detail->postcode = Input::get('postcode');
		
		$detail->save();
		return Redirect::to('user/change');
	}
	public function postAddalias()
	{
		$detail_id = \Auth::user()->detail->id;
		$detail = Detail::find($detail_id);
		if($detail->alias != ""){
			$alias = ($detail->alias.', '.Input::get('alias'));
		}
		else{
			$alias = Input::get('alias');
		}
		$detail->alias = $alias;
		$detail->save();
		/*
		$id=Input::get('userid');
		$user = User::find($id);
		$user->detail->author_name = Input::get('authorname');
		$user->save();*/
		return Redirect::to('user/change');
	}
	public function postReplacenote() //needs two actions on form so is Addnote below
	{
		$detail_id = \Auth::user()->detail->id;
		$detail = Detail::find($detail_id);
		$detail->note = Input::get('note');
		
		$detail->save();
		return Redirect::to('user/change');
	}
	public function postAddnote()
	{
		$detail_id = \Auth::user()->detail->id;
		$detail = Detail::find($detail_id);
		if(Input::get('append')){
			$note = ($detail->note.'</br>'.Input::get('note'));
			$detail->note = $note;
		}
		if(Input::get('newnote')){
			$detail->note = Input::get('note');
		}
		if(Input::get('delete')){
			$detail->note = "";
		}
		
		$detail->save();
		return Redirect::to('user/change');
	}
	public function getDeletenote()
	{
		$detail_id = \Auth::user()->detail->id;
		$detail = Detail::find($detail_id);
		$detail->note = "";
		
		$detail->save();
		return Redirect::to('user/change');
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
        if(Auth::check()){
        	return View::make('myaccount');
		}
		else{
			Redirect::to('/');
		}
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

    public function getUsernotes()
    {
        return View::make('selectuser_shownotes');
    }

    public function postUsernotes()
    {
        $email = Input::get('email');
		if ($email!=null){
			
			$user_id = User::where('email',$email)->pluck('id');
			$detail = Detail::where('user_id',$user_id)->get();
			foreach($detail as $detail){
        	$note = $detail->note;
			//dd($note);
			$address = $detail->address;
			$postcode = $detail->postcode;
			$alias = $detail->alias;
			$author_name = $detail->author_name;
			}	    
        return View::make('usernotes',array(
			'email'		=> $email,
			'note'		=> $note,
			'address'	=> $address,
			'postcode'	=> $postcode,
			'alias'		=> $alias,
			'author_name'=> $author_name
		));
        }
		Session::flash('notselected', 'No email selected!');
        return Redirect::back();
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
	 
	