<?php
class Purchase extends Eloquent
{
	protected $table = 'purchases';

	  
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
    
   /* function __construct($item,$name,$price, $id,$email){
        $this->email = $email;
        $this->purchase = $item;
		$this->cardholder_name = $name;
        $this->amount = $price;
        $this->image_id = $id;
	}*/
}
