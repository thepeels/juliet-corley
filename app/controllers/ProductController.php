<?php
 
class ProductController extends \BaseController 

{
	public function getIndex()
	{
		$products = Product::withImages()->orderBy('created_at','DESC')->get();
		return View::make('pages.shoptable',array(
			'products' => $products
		));
	}
	/**
	 * @param string name
	 * @param int productId
	 * @param float price
	 * @param int quantity
	 * @return string
	 */
	public function postCartadd() //this is to be an ajax function
	{
		$productId 			= Input::get('productId');
		//$product			= Product::where('id',$productId)->get();
		//foreach($product as $product);
		$quantity			= Input::get('number');
		$productName 		= Input::get('productName');
		return shopCartAdd($productId,$quantity);
		
	}
	
}
	