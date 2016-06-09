<?php
class Userpurchase extends Purchase
{
	protected $table = 'userpurchases';	
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
    
   /* function __construct(email $email,name $item,cardholder $name,price $price,image_id $id){
        $this->email = $email;
        $this->purchase = $name;
		$this->cardholder_name = $name;
        $this->amount = $price;
        $this->image_id = $id;
	}*/
}
