
<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {
	
	use UserTrait, RemindableTrait;

	protected $fillable = array('name','email','password');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	
    public static function showPurchases($email)
    {
        $purchases = DB::table('userpurchases')->distinct('purchase')->where('email',$email)->get();
        return $purchases;
    }
    
    public static function adminshowpurchases($email)
    {
        $purchases = DB::table('userpurchases')->where('email',$email)->orderBy('created_at','DESC')->get();
        return $purchases;
    }
}
