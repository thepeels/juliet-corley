<?php
class Detail extends Eloquent
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
	
	public function author()
	{
		return $this->author_name;
	}
	public function scopeHasnotes()
    {
        return $this->where('note','!=','');
    }
}
