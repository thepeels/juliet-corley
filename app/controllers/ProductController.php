<?php
 
class ProductController extends \BaseController 
{
	public function getIndex()
	{
		$products = Product::withImages()
			->where('product_type','<>','colouring')//->where('product_type','<>','photo')//additional filter
			->orderBy('page_order','ASC','created_at','DESC')
			->get();

		return View::make('pages.shoptable',array(
			'products'      => $products,
            'form_index'    => 1,
            'form_id'       => 1
		));
	}

	public function getColouring()
	{
		$products = Product::withImages()
			->where('product_type','colouring')
			->orderBy('page_order','ASC','created_at','DESC')
			->get();

		return View::make('pages.colouring',array(
			'products'  => $products,
            'div_index' => 1,
            'div_id'    => 1
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

        if ($productType == 'ColouringPdf'){
            return cartAddColouringItem($productId);
        }
	}

    public function getContinue()
    {
        return Redirect::to('/colouring');
	}
}
	