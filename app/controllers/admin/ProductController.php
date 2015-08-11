<?php namespace Admin;
use \Session,\Product,\ProductBuilder,\PdfBuilder,\Redirect,\DB,\View,\Price,\Input,\Validator,\Userpurchase,\Image;

class ProductController extends \BaseController
{
	
	public function getIndex()
	{
		$product = Product::withImages()
			->orderBy('page_order','ASC')
			->orderBy('created_at','DESC')
			->get();
		return View::make('admin.shop_table',array(
			'products' => $product
		));
	}
	public function getDelete($productId)
	{
		$product = Product::where('id', $productId)->first();
        $product->delete();
        
        return Redirect::to('admin/shop');
	}
	    /**
     * Get Add
     * 
     * @param  none
     * @return string
     */
	public function getAdd()
    {
    	return View::make('admin.add_product');
    }

    /**
     * Add
     * 
     * This builds a new product item
     * 
     * @param  none
     * @return string
     */
	public function postAdd()
    {	
        $input = Input::all();
        $builder = new PdfBuilder;
        $product = $builder->build(
        $input['name'], 
		$input['price'],
		$input['title'],
		$input['subtitle'],
		$input['description_1'],
		$input['description_2'],
		$input['description_3'],
		$input['description_4'],
		$input['product_type'],
		$input['product_sub_type'],
		$input['page_order'],
		$input['image'],
		$input['pdf']
        );
        return Redirect::to('admin/shop');//re-load the admin product table
    }
	
	public function getEdit($productId)
	{
		$product = Product::where('id',$productId)->first();
		return View::make('admin.edit_product',array(
			'product' => $product));
	}
	
	public function postEdit()
	{
		//dd(Input::get('productId'));	
		$input = Input::all();
        DB::transaction(function()
		{
			DB::table('product')->where('id' , Input::get('productId'))
			->update(array(
        
	        'name'  			=> Input::get('name'), 
			'price'  			=> Input::get('price')*100,
			'title'  			=> Input::get('title'),
			'subtitle' 			=> Input::get('subtitle'),
			'description_1'  	=> Input::get('description_1'),
			'description_2' 	=> Input::get('description_2'),
			'description_3'  	=> Input::get('description_3'),
			'description_4'  	=> Input::get('description_4'),
			'product_type'  	=> Input::get('product_type'),
			'product_sub_type' 	=> Input::get('product_sub_type'),
			'page_order' 		=> Input::get('page_order'),
			'updated_at' 		=> \Carbon\Carbon::now()
	        ));
		});
        return Redirect::to('admin/shop');
	}
}