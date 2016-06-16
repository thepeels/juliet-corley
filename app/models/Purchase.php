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
        'client_ip', 
        'cardholder_name',
    ];
    
	/**
	 * @return Purchase
	 */
    public static function addToTable($itemName, $name, $itemPrice, $itemId, $email, $zip_code)
    {
    	$purchase = new Purchase;
        $purchase->purchase = $itemName;
        $purchase->amount = $itemPrice;
        $purchase->image_id = $itemId;
		$purchase->cardholder_name = $name;
        $purchase->email = $email;
        $purchase->zip_code = $zip_code;

		return $purchase;
	}
	
    public static function createFromItem(Item $item, $name, $email, $zip_code)
    {
    	$purchase = new Purchase;
        $purchase->purchase = $item->name;
        $purchase->amount = $item->price;
        $purchase->image_id = $item->id;
		$purchase->cardholder_name = $name;
        $purchase->email = $email;
        $purchase->zip_code = $zip_code;
		
		return $purchase;
	}
	
	
}
