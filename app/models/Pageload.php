<?php
class Pageload extends Eloquent
{
    /*
     * Fillable attributes
     */
     protected $fillable = [        
        'cartview',
        'addtocart',
        'pdf',
        'amount_in_cart',
        'client_ip'     
    ];
    
    public function add_icon(){
    	$pageload = new Pageload;
		$pageload->set_addtocart(1);
		$pageload->set_amount_in_cart(\Cart::total());
		$pageload->set_client_ip(Request::getClientIp());
		$pageload->save();
		return;
    }
	public function add_pdf(){
		$pageload = $this->get_pdf();
		$pageload++;
		$pageload->save();
	}
}
