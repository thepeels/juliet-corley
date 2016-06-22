<?php
class Userpurchase extends Eloquent
{
	protected $table = 'userpurchases';	
    /*
     * Fillable attributes
     */
     protected $fillable = array(
        'email',
        'purchase',
        'amount',
        'image_id',
        'client_ip',
        'cardholder_name',
        'zip_code'
     );
   
   /**
	 * @return Purchase
	 */
    public static function addToTable($itemName, $name, $itemPrice, $itemId, $email, $zip_code)
    {
    	$purchase = new Userpurchase;
        $purchase->purchase = $itemName;
        $purchase->amount = $itemPrice;
        $purchase->image_id = $itemId;
		$purchase->cardholder_name = $name;
        $purchase->email = $email;
        $purchase->zip_code = $zip_code;

		return $purchase;
	}
	 
   /* function __construct(email $email,name $item,cardholder $name,price $price,image_id $id){
        $this->email = $email;
        $this->purchase = $name;
		$this->cardholder_name = $name;
        $this->amount = $price;
        $this->image_id = $id;
	}*/
}
