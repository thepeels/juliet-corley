<?php
 
class ProductController extends \BaseController 

{
	public function getIndex()
	{
		$products = Product::withImages()
		->where('product_type','<>','colouring')
		//->where('product_type','<>','photo')//additional filter
		->orderBy('page_order','ASC','created_at','DESC')
		->get();
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
		$productType 		= Input::get('productType');
		//$product			= Product::where('id',$productId)->get();
		//foreach($product as $product);
		$quantity			= 1;
		//$productName 		= Input::get('productName');
		//return $productId;
		if ($productType == 'ColouringPdf')
		return cartAddColouringItem($productId);
	}
	public function getColouring()
	{
		$products = Product::withImages()
			->where('product_type','colouring')
			->orderBy('page_order','ASC','created_at','DESC')
			->get();
		return View::make('pages.colouring',array(
			'products' => $products
		));
	}
}
	