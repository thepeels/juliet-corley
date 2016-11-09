<?php

class UserController extends \BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        $users = \User::all();

        return View::make('pages.users', array(
            'table_row' => $users,
            'title'     => 'User List'
        ));
    }


    /**
     * Display a page of users author names
     *
     * @return Response
     */
    public function authorname()
    {
        $user_list = Detail::where('author_name','<>','')
            ->where('note','<>','')
            ->lists('user_id');
        $users_with_details = \User::withDetail()->whereIn('id',$user_list)->get();
            //yeeeeeee haaaaaaaaa
        return View::make('pages.authors', array(
            'users_with_details' => $users_with_details
        ));
    }

    /**
     * Select a user to show their notes
     *
     * @return Response
     */
    public function authornotes()
    {
        $list = \Detail::where('author_name','<>','')
            ->where('note','<>','')
            ->lists('author_name','author_name');
        $placeholder = [null=>'Select'];
        $authors = array_merge($placeholder, $list);
        return View::make('selectauthor_shownotes',array(
            'authors' => $authors,
            'title'   => 'Select Author'
        ));
    }


    /**
     * Display the user with their notes
     *
     * @return Response
     */
    public function postAuthornotes()
    {
        $author = Input::get('author');
        if ($author != null) {
            $notes = Detail::distinct('note')
                ->where('author_name', $author)
                ->orderBy('created_at', 'DESC')
                ->get();

            $email = User::where('id', '=', $notes[0]->user_id)->pluck('email');

            return View::make('authornotes', [
                'author' => $author,
                'notes' => $notes,
                'email' => $email
            ]);
        } else {
            Session::flash('notselected', 'No Author selected!');

            return Redirect::back();
        }
    }

    public function postAdduser()
    {
        $rules = [
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:4|not_in:admin1,admin,123456,password,654321,1234567,7654321'
        ];
        $validation = Validator::make(Input::all(), $rules);

        if ($validation->fails()) {
            return Redirect::back()->withInput()->withErrors($validation->messages());
        }
        $user = new User;
        $user->name = Input::get('name');
        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
        $user->save();

        Detail::create([
            'user_id' => $user->id
        ]);
        $credentials = [
            'email' => Input::get('email'),
            'password' => Input::get('password')
        ];
        if (Auth::attempt($credentials)) {
            if (Session::has('login_from')) {
                return Redirect::to(Session::get('login_from'));
            } else {
                return Redirect::to('/');
            }
        }

        return Redirect::to('login')->withInput(Input::all());
    }

    public function postEdituser()
    {
        $id = Input::get('userid');
        $user = User::find($id);
        $new_email = Input::get('email');//dd($new_email);// need to eliminate integ constr violn
        $password_login = ['email' => $new_email];
        $userexists = User::where($password_login)->first();//dd($userexists);
        if (NULL != $userexists) {//dd($new_email);
            $resp = Redirect::action('UserController@getChange')
                ->with('duplicate', 'This email address is already in 
					use, please enter another');
            Session::driver()->save();
            $resp->send();
            exit();
        };
        $oauth_login = ['oauth_email' => $new_email];
        $userexists = User::where($oauth_login)->first();//user id with the oalogin email
        if (NULL != $userexists) {
            $oauth_user = DB::table('oauth_identities')->where('user_id', '=', $userexists->id)->first();
            if ($userexists->id != $user->id) {//not users own oauth email
                $resp = Redirect::action('UserController@getChange')
                    ->with('duplicate', "This email address has been used to 
						login with <strong>" . $oauth_user->provider . ".</strong>\nPlease login with 
						" . $oauth_user->provider . " and then add your email using 
						this same method");
                Session::driver()->save();
                $resp->send();
                exit();
            }
        };
        if ($user->oauth_email !== NULL) {
            $user->both_emails = TRUE;
        }
        $user->email = $new_email;
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
        if ($validation->fails()) {
            return Redirect::back()->withInput()->withErrors($validation->messages());
        }
        $id = Input::get('userid');
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
        if (NULL != Input::get('address')) {
            $detail->address = Input::get('address');
        }
        if (NULL != Input::get('postcode')) {
            $detail->postcode = Input::get('postcode');
        }

        $detail->save();
        
        return Redirect::to('user/change');
    }

    public function postAddalias()
    {
        $detail_id = \Auth::user()->detail->id;
        $detail = Detail::find($detail_id);
        if ($detail->alias != "") {
            $alias = ($detail->alias . ', ' . Input::get('alias'));
        } else {
            $alias = Input::get('alias');
        }
        $detail->alias = $alias;
        $detail->save();

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
        if (Input::get('append')) {
            $note = ($detail->note . '</br>' . Input::get('note'));
            $detail->note = $note;
        }
        if (Input::get('newnote')) {
            $detail->note = Input::get('note');
        }
        if (Input::get('delete')) {
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
        if (Auth::check()) {
            return View::make('myaccount');
        } else {
            Redirect::to('/');
        }
    }

    public function userpurchases()
    {
        $list_email = \User::lists('email','email');
        $list_oauth_email = \User::lists('oauth_email','oauth_email');
        $emails = [null => 'Select'] + $list_email;
        $oauth_emails = [null => 'Select'] + $list_oauth_email;
        return View::make('selectuser_showpurchases',array(
            'title' => 'Select User',
            'emails' => $emails,
            'oauth_emails'=>$oauth_emails
        ));
    }

    public function postUserpurchases()
    {
        $key_value = null;
        $email = Input::get('email');
        $oauth_email = Input::get('oauth_email');
        if ($email != null) {
            $key_value = $email;
        } else if ($oauth_email != null) {
            $key_value = $oauth_email;
        }
        if ($key_value != null) {
            $purchases = Userpurchase::distinct()
                ->where('email', $key_value)
                ->orderBy('created_at', 'DESC')
                ->get();
            foreach ($purchases as $key => $field)
            {       //change displayed timezone to Oz time
                $date = new DateTime($field['updated_at'],new DateTimeZone('Europe/London'));
                $date->setTimeZone(new DateTimeZone('Australia/Brisbane'));

                $purchases[$key]['updated_at'] = $date;
                //dd($purchases[$key]['updated_at']);
            }

            return View::make('userpurchases', array(
                'purchases' => $purchases,
                'email' => $key_value,
                'title' => 'Purchases'
            ));
        }
        Session::flash('notselected', 'No email selected!');
        
        return Redirect::back();
    }

    public function getShowuserpurchases()
    {
        return View::make('userpurchases');
    }

    public function showallpurchases() //summarized and grouped on page
    {
        $purchases = DB::table('purchases')
            ->groupBy('purchase')
            ->orderBy('created_at','desc')
            ->paginate(10);
        
        return View::make('showallpurchases', array(
            'purchases' => $purchases,
            'title'     => 'Summary of'
        ));
    }
    public function allpurchases() //unsummarized
    {
        $purchases = DB::table('purchases')
            ->orderBy('id','desc')
            ->paginate(50);

        return View::make('recentpurchases', array(
            'purchases' => $purchases,
            'title'     => 'All',
            'subtitle'  => ''
        ));
    }
    public function showrecentpurchases() //most recent purchases
    {
        $date_from = (date('Y-m-d H:m:s',strtotime("-61 days")));
        $purchases = DB::table('purchases')
            ->where('created_at','>',$date_from)
            ->where('email','!=','FREE download')
            ->orderBy('id','desc')
            ->paginate(10);

        return View::make('recentpurchases', array(
            'purchases' => $purchases,
            'title'     => 'Last 61 Days\'',
            'subtitle'  => 'Excluding FREE downloads',
            'reverse'   => 'recent_reversed'
        ));
    }
    public function showrecent_reversed()
    {
        $date_from = (date('Y-m-d H:m:s',strtotime("-61 days")));
        $purchases = DB::table('purchases')
            ->where('created_at','>',$date_from)
            ->where('email','!=','FREE download')
            ->orderBy('id','asc')
            ->paginate(10);

        return View::make('recentpurchases', array(
            'purchases' => $purchases,
            'title'     => 'Last 61 Days\'',
            'subtitle'  => 'Excluding FREE downloads',
            'reverse'   => 'recentpurchases'
        ));
    }
    public function twelvepurchases() //one year's purchases
    {
        $date_from = (date('Y-m-d H:m:s',strtotime("-366 days")));
        $purchases = DB::table('purchases')
            ->where('created_at','>',$date_from)
            ->where('email','!=','FREE download')
            ->orderBy('id','desc')
            ->paginate(10);

        return View::make('recentpurchases', array(
            'purchases' => $purchases,
            'title'     => 'One Year\'s',
            'subtitle'  => 'Excluding FREE downloads'
        ));
    }

    public function usernotes()
    {
        $list_email = \User::lists('email','email');
        $list_oauth_email = \User::lists('oauth_email','oauth_email');
        $emails = [null => 'Select'] + $list_email;
        $oauth_emails = [null => 'Select'] + $list_oauth_email;
        return View::make('selectuser_shownotes',array(
            'title' => 'Select User',
            'emails' => $emails,
            'oauth_emails'=>$oauth_emails
        ));
    }

    public function postUsernotes()
    {
        $user_id = null;
        $email = Input::get('email');
        $oauth_email = Input::get('oauth_email');
        if ($email != null) {
            $user_id = User::where('email', $email)->pluck('id');
        } else if ($oauth_email != null) {
            $user_id = User::where('oauth_email', $oauth_email)->pluck('id');
        }
        if ($user_id != null) {
            $detail = Detail::where('user_id', $user_id)->get();
            foreach ($detail as $detail) {
                $note = $detail->note;
                $address = $detail->address;
                $postcode = $detail->postcode;
                $alias = $detail->alias;
                $author_name = $detail->author_name;
            }
            return View::make('usernotes', array(
                'email' => $email,
                'oauth_email' => $oauth_email,
                'note' => $note,
                'address' => $address,
                'postcode' => $postcode,
                'alias' => $alias,
                'author_name' => $author_name
            ));
        }
        Session::flash('notselected', 'No email selected!');
		
        return Redirect::back();
    }

    public function getChange()
    {
        return View::make('change_details');
    }


    public function getDelete($id)
    {
        User::where('id',$id)->delete();

        return Redirect::back();

    }
    public function getRestore($id)
    {
        User::where('id',$id)->restore();

        return Redirect::back();

    }
    public function getDeleted()
    {
        $users = \User::onlyTrashed()->get();

        return View::make('pages.users_deleted', array(
            'table_row' => $users,
            'title'     => 'Deleted Users'
        ));
    }

}
 