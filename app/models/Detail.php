<?php
class detail extends Eloquent
{
	protected $table = 'details';
		
	protected $fillable = array(
		'user_id',
		'author_name',
		'alias',
		'note',
		'address',
		'postcode'
	);
	
	public function user()
	{
		return $this->belongsTo('User');
	}
}
