<?php
class Fish extends Eloquent
{
    protected $fillable = array(
        'name',
        'base_price',
        'small_image',
        'large_image',
        'outline_image',
        'silhouette_image',
        'genus',
        'species'
    );
    
    protected $table = 'fish';
    
    private static $images = array(
        'small_image',
        'small_image_flipped',
        'large_image',
        'large_image_flipped',
        'outline_image',
        'silhouette_image',
        'image_thumb',
        'image_thumb_flipped',
        'silhouette_thumb',
        'outline_thumb',
        'large_image_watermarked'
    );
    
    /**
     * Small Image
     * 
     * @param  none
     * @return Image
     */
     public function small_image()
     {
         return $this->hasOne('Image', 'id', 'small_image_id');
     }
    
    /**
     * Small Image Flipped
     * 
     * @param  none
     * @return Image
     */
     public function small_image_flipped()
     {
         return $this->hasOne('Image', 'id', 'small_image_flipped_id');
     }

    /**
     * Large Image
     * 
     * @param  none
     * @return Image
     */
     public function large_image()
     {
         return $this->hasOne('Image', 'id', 'large_image_id');
     }

    /**
     * Large Image Flipped
     * 
     * @param  none
     * @return Image
     */
     public function large_image_flipped()
     {
         return $this->hasOne('Image', 'id', 'large_image_flipped_id');
     }

    /**
     * Outline Image
     * 
     * @param  none
     * @return Image
     */
     public function outline_image()
     {
         return $this->hasOne('Image', 'id', 'outline_image_id');
     }
         
    /**
     * Silhouette Image
     * 
     * @param  none
     * @return Image
     */
     public function silhouette_image()
     {
         return $this->hasOne('Image', 'id', 'silhouette_image_id');
     }
         
        /**
     * Silhouette Image
     * 
     * @param  none
     * @return Image
     */
     public function image_thumb()
     {
         return $this->hasOne('Image', 'id', 'image_thumb_id');
     }
             /**
     * Silhouette Image
     * 
     * @param  none
     * @return Image
     */
     public function image_thumb_flipped()
     {
         return $this->hasOne('Image', 'id', 'image_thumb_flipped_id');
     }
             /**
     * Silhouette Image
     * 
     * @param  none
     * @return Image
     */
     public function silhouette_thumb()
     {
         return $this->hasOne('Image', 'id', 'silhouette_thumb_id');
     }
             /**
     * Silhouette Image
     * 
     * @param  none
     * @return Image
     */
     public function outline_thumb()
     {
         return $this->hasOne('Image', 'id', 'outline_thumb_id');
     }
      
                   /**
     * Large watermarked Image
     * 
     * @param  none
     * @return Image
     */
     public function large_image_watermarked()
     {
         return $this->hasOne('Image', 'id', 'large_image_watermarked_id');
     }
          
    /**
     * Base Price Dollars
     * 
     * This is a 'virtual' attribute i.e, not stored in the database, 
     * it's derived.
     * 
     * @param   none
     * @return  float
     */
     public function getBasePriceDollarsAttribute()
     {
         return number_format($this->base_price / 100, 2);
     }

    /**
     * Name
     * 
     * This is acting on the stored database name, note that the database 
     * value is passed in as an argument.
     * 
     * @param   string
     * @return  string
     */
     public function getNameAttribute($value)
     {
         return ucfirst(strtolower(trim($value)));
     }

    /**
     * With Images Scope
     * 
     * This scope allows all images to be loaded automatically when
     * getting a fish from the database.
     * 
     * @param  none
     * @return Fish
     */
    public function scopeWithImages($query)
    {
        foreach (self::$images as $image_property_name)
        {
            $query->with($image_property_name);
        }
        
        return $query;
    }

    /**
     * Get By Name
     * 
     * This returns a single Fish object when querying the model, e.g.:-
     * 
     * $fish = Fish::getByName('fish_name');
     * 
     * @param  none
     * @return Fish
     */
    public function scopeGetByName($query, $name)
    {
        return $query
            ->withImages()
            ->where('name', $name)
            ->first();
    }
    
    /**
     * Delete
     * 
     * This method deletes all the Image objects that belong to
     * the Fish object before deleting it.
     * 
     * @param   none
     * @return  bool
     */
    public function delete()
    {
        foreach (self::$images as $image)
        {
            $this->$image()->first()->delete();
        }
        
        return parent::delete();
    }
}