<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {
	
	use UserTrait, RemindableTrait;

	protected $fillable = array('name','email','password','superuser');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
    
    protected $primaryKey = 'id';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	
	public function detail()
	{
		return $this->hasOne('Detail');
	}
	
	public function author()
	{
		return $this->detail->author;
	}
	
	 public function scopeWithDetail($query)
	 {
	 	foreach(self::$details as $detail_property_name)
		{
			$query->with($detail_property_name);
		}
		
		return $query;
	 }
}
