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
    
    /**
     * Return the price in cents
     * 
     * @var string
     * 
     * @return integer
     */
    public static function getPrice($column)
    {
        $prices = DB::table('prices')->where('name',$column)->get();
        return $prices;
    }
}
