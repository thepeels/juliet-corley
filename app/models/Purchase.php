<?php
class Purchase extends Eloquent
{
	protected $table = 'purchases';
	  
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
        'purchase_number'
     );
    
	/**
	 * @return Purchase
	 */
    public static function addToTable($itemName, $name, $itemPrice, $itemId, $email, $purchase_number)
    {
    	$purchase = new Purchase;
        $purchase->purchase = $itemName;
        $purchase->amount = $itemPrice;
        $purchase->image_id = $itemId;
		$purchase->cardholder_name = $name;
        $purchase->email = $email;
        $purchase->purchase_number = $purchase_number;

		return $purchase;
	}
	
    public static function createFromItem(Item $item, $name, $email, $purchase_number)
    {
    	$purchase = new Purchase;
        $purchase->purchase = $item->name;
        $purchase->amount = $item->price;
        $purchase->image_id = $item->id;
		$purchase->cardholder_name = $name;
        $purchase->email = $email;
        $purchase->purchase_number = $purchase_number;
		
		return $purchase;
	}
	
	
}
