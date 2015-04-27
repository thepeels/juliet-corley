<?php
class Price extends Eloquent
{
    protected $fillable = [
    'name',
    
    ];
      
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'prices';
    
    public $timestamps = true;
    
    public function firstPrice()
    {
        return $this->hasOne('first_price');
    }
}
