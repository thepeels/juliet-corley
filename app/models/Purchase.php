<?php
class Purchase extends Eloquent
{
    /*
     * Fillable attributes
     */
     protected $fillable = [        
        'email',
        'purchase',
        'amount',
        'image_id',
        'client_ip'     
    ];
    
    
}
