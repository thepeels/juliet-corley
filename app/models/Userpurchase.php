<?php
class Userpurchase extends Eloquent
{
    /*
     * Fillable attributes
     */
     protected $fillable = [        
        'email',
        'purchase',
        'amount',
        'image_id'     
    ];
    
    
}
