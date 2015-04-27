<?php namespace classes;
class Helpers {
    public static function doMessage($message) 
    {
       // $message = $mess;
        return $message;
    }
	
	public static function selectUserId($variableName)
	{
		$users = DB::table('users')->find($variableName);
		if($users) {return $users->id; }
		else {return 'no user here';}
	}
	
	public static function selectUserEmail($selectEmail)
	{
		$users = DB::table('users')->find($selectEmail);
		if($users)return $users->email;
	}
	
	public static function selectUserName($selectName)
	{
		$users = DB::table('users')->find($selectName);
		if($users)return $users->username;
			
		#$users = User::all();
		#return $users;
		#return View::make('pages.users')->with($users);
		
/*or*/	#$users = User::find(4);
	}
	public static function selectUserPassword($j)
	{
		$users = DB::table('users')->find($j);
		if($users)return $users->password;
	}
}
//This is in the main believed to be a completely redundant file
