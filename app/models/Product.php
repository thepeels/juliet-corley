<?php
class Product extends Eloquent
{
	protected $fillable = [
		'name',
		'price',
		'title',
		'subtitle',
		'description_1',
		'description_2',
		'description_3',
		'description_4',
		'product_type',
		'product_sub_type',
	];
		
	protected $table = 'product';
	
	private static $images = [
		'full_size_image',
		'small_size_image',
		'thumbnail_image',
	];
    /**
     * Thumbnail
     * 
     * @param none
     * @return Image 
     */     
    public function thumbnail_image()
    {
        return $this->hasOne('Image','id','thumbnail_image_id');
    }
    
    /**
    * Full Size Image
    * 
    * @param none
    * @return Image
    */
    public function full_size_image()
    {
       return $this->hasOne('Image','id','full_size_image_id');
    }
    
    /**
    * Small Size Image
    * 
    * @param none
    * @return Image
    */
    public function small_size_image()
    {
       return $this->hasOne('Image','id','small_size_image_id');
    }
    
    /***
    * Price Dollars
    * 
    * @param none
    * @return float
    */
    public function getPriceDollarsAttribute()
    {
        return number_format($this->price / 100, 2);
    }
    
    /**
    * Name
    * 
    * @param string
    * @return string
    * 
    */
    public function getNameAttribute($value)
    {
        return ucfirst(strtolower(trim($value)));
    }
      
    /**
    * With Images Scope
    * 
    * @param none
    * @return Art
    */
    public function scopeWithImages($query)
    {
       foreach (self::$images as $image_property_name)
       {
           $query->with($image_property_name);
       }
       return($query);
    }
       
    /**
    * 
    * Get by Name
    *  @param none
    * @return Art
    */
  
    public function scopeGetByName($query, $name)
    {
        return $query->withImages()->where('name',$name)->first();
    }
    
    /**
    * Get by Category
    * @param none
    * @return Art
    */
    
    public function scopeGetByProductType($query, $productt_type)
    {
        return $query->withImages()->where('product_type',$product_type);
    }
      
    /**
    * Delete
    * 
    * @param none
    * @return bool
    * 
    * */
    public function delete()
    {
       foreach (self::$images as $image)
       {
           $this->$image()->first()->delete();
       }
       return parent::delete();
    }
}
