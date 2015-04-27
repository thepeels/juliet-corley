<?php

#use Illuminate\Auth\UserTrait;
#use Illuminate\Auth\UserInterface;
#use Illuminate\Auth\Reminders\RemindableTrait;
#use Illuminate\Auth\Reminders\RemindableInterface;

class Icon extends Eloquent {
	

/*	public static function addfish()
	{
		$missingfiles = array();
		$suffices = array('3cmL','3cmR','5cmL','5cmR','outline','silhouette');	
		$name = Input::get('name');
		$price = Input::get('baseprice')*100;
		
		DB::table('downloads')->insert(array('name'=>$name));
		
		foreach($suffices as $suffix){
			$filecheck = public_path().'/images/'.$name.' '.$suffix.'.jpg';
			if (!File::exists($filecheck)){
				$missingfiles[]=$filecheck;
			}	
			DB::table('downloads')->insert(array('name'=>$name.' '
				.$suffix,'price'=>$price,'filepath'=>$name.' '.$suffix.'.jpg'));
		}
		
		if(!empty($missingfiles)){	
			return View::make('missingfiles',compact('missingfiles'));
		}
		
		return Redirect::to('addafish');
	}*/
	
	#protected $table = 'icons';
	
	#public function get_icon_table(){
	#	$icons = Icon::all();
	#	return $icons;
	#}

	//use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	//protected $table = 'icons';//assumed anyway lowercase plural of class

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = array('password', 'remember_token');
	

}