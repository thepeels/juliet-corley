<?php
 
class IconController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

  
    public function getDisplayTable()
    {
        //return Carthelper::display();
        $fish = \Fish::withImages()->orderBy('name')->get();
        return \View::make('icondownloads', array(
            'fishs' => $fish
        ));
    }
	
	public function getAjaxcart($id,$fish_name,$base_price,$table_row_index)
	{
		return Response::json(array(
			'success'	=>	true,
			'price'		=> 	$base_price,
			'message'	=>	'yes',
			'row' 		=> 	$table_row_index
			)
		);
	}
    public function getMakecart()
    {
    	$pageload = new Pageload;
		$pageload->cartview = 1;
		$pageload->amount_in_cart = \Cart::total();
		$pageload->client_ip = Request::getClientIp();
		$pageload->save();
    		
    	//dd(Session::get('dest_email'));
		//   $proxy=Input::get('proxyemail');
	//if($proxy==""){$proxy=Auth::user()->email;}
        return View::make('shoppingcart',array(
            'back'=>Input::get('return_url','/download'),
			//'dest_email'=>$proxy)
			)
        );
    }
	public function getMakeshopcart()
    {
        return View::make('shopcart',array(
            'back'=>Input::get('return_url','/shop'),
            'cart_instance'=>'shop',
			//'dest_email'=>$proxy)
			)
        );
    }
 /*
  * see functions cartAdd and cartTabulate in helpers.php
  */	
    public function postAjaxemail($proxyemail=null)
	{
		$proxyemail=Input::get('proxyemail');
		$instance = null!=($proxyemail)?$proxyemail:'main';
		Cart::instance($instance);
		Session::forget('cart_instance');
		Session::put('cart_instance',$instance);
		//dd(Cart::get('instance'));
		//dd($instance);
		//return ajaxemail($proxyemail);
		return Response::json(array(
			'success' 		=> true,
			'current_email' => Session::get('cart_instance')));
	}
	public function getPageload($id,$fish_name,$base_price,$table_row_index)
	{	dd($fish_name);
		return Redirect::to('icon/addtocart')->compact('id','fish_name','$base_price','$table_row_index');
	}	 
	public function getAddtocart($id,$fish_name,$base_price,$table_row_index)
	{
		/*if(!Auth::check())return Response::json(array(
				'fail' 		=>	true,
				'notloggedin' 	=>	"Please login/register to use the cart.\r\n...I apologise for this, as I hate being forced to register to use sites!\nBut this is the only way I can keep a record of your entitlement to use your images.\nSo I've kept registration minimal, with just an email address and password.\nAnd I promise not to spam you!"
			)
		);*/
	    // add return URL to session? 
        if (Session::has('go_back_to_URL'))
        {   
            Session::forget('go_back_to_URL');
        }   
        Session::push('go_back_to_URL',URL::previous());
        //dd($id_index);   
	    return $this->priorPurchase($id,$fish_name,$base_price,$table_row_index);   //add check for existing prior purchase
		//was return cartAdd($id,$fish_name,$base_price/2,$table_row_index);
	}
	
	public function getDumprow($rowId)
	{
	    if (Cart::instance('main')->get($rowId))
	    {
	        Cart::remove($rowId);
	    }
		//return Carthelper::display();
		return Redirect::back();
	}
	public function getShopdumprow($rowId)
	{
	    if (Cart::instance('shop')->get($rowId))
	    {
	        Cart::remove($rowId);
	    }
		//return Carthelper::display();
		return Redirect::back();
	}

	public function getDumpcart()
	{
		Cart::instance('main')->destroy();
	    return Redirect::back();
	    /*return View::make('shoppingcart',array(
            'back'=>Input::get('return_url','/download'),
			'dest_email'=>$proxy)
		);*/
	}
	
	public function getDumpshopcart()
	{
		Cart::instance('shop')->destroy();
	    return Redirect::back();
	    /*return View::make('shoppingcart',array(
            'back'=>Input::get('return_url','/download'),
			'dest_email'=>$proxy)
		);*/
	}
	
	public function getAjaxdumpcart()
	{
		Cart::instance('main')->destroy();
	    return Response::json(array(
			'success' => true,
			'cart_description' => "",
			'cart_amount' => ""
			)
		);
	}
	public function getAjaxdumpshopcart()
	{
		Cart::instance('shop')->destroy();
	    return Response::json(array(
			'success' => true,
			'cart_description' => "",
			'cart_amount' => ""
			)
		);
	}
	
/*	public function getMakecart()
	{
		return View::make('shoppingcart',array(
            'back'=>Input::get('return_url','/download'))
		);
	}
*/
 
    /**
     * Preview the Full size fish image
     * 
     * @param url
     * @return view
     */
    public function getPreview($folder,$preview_url,$fish_name,$table_row_index)
    {
        
		return View::make('pages.image_preview',array(
        'preview_url'=>$preview_url,
        'fish_name'=>$fish_name,
        'return_to'=> URL::previous().'#'.$table_row_index
        ));
    }
    
    public function getSeek()
    {
        $genus      = Input::get('genus');
        $species    = Input::get('species');
        if (!$species && !$genus){
            $fishs = Fish::withImages()
                ->orderBy('name')
                ->get();
            return View::make('pages.fishtable',compact('contents','fishs'));    
        }
        if ($species && $genus){
            $search_g = '%'.$genus.'%';
            $search_s = '%'.$species.'%';
            $fishs = Fish::withImages()
                ->where('genus', 'LIKE', $search_g)
                ->where('species', 'LIKE', $search_s)
                ->orderBy('name')
                ->get();
        }
        elseif ($genus){
            $column = 'genus';
            $search = '%'.$genus.'%';
            $fishs = Fish::withImages()
                ->where($column, 'LIKE', $search)
                ->orderBy('name')
                ->get();
        }
        elseif ($species){
            $column = 'species';
            $search = '%'.$species.'%';
            $fishs = Fish::withImages()
                ->where($column, 'LIKE', $search)
                ->orderBy('name')
                ->get();
        }
        return View::make('pages.fishtable',compact('contents','fishs','genus','species'));
    }
	
    public function getAlldownload()//infinished business
    {
        $content = Cart::content();    
        foreach($content as $row){
            if(Session::has('purchased',$row->options->name)){
                $image_id = $row->id;
                $name = $row->name;
                Carthelper::download($image_id,$name);
            }
        }
    }
	public function shopviews()
	{
		#$purchases = Purchase::all();
		$views = Pageload::all();
			
        return View::make('pageloads',array(
        	'views' => $views
		));
	}
	private function priorPurchase($id,$fish_name,$base_price,$table_row_index)
{                      //dd(Auth::check());
    $prev_charge = 0;
    $prior = FALSE;
    //if(!Auth::check())Redirect::action('SessionsController@create');
	if(Auth::check()){
       
    $prior_purchases = showPurchases(Auth::user()->email);
    //check for prior purchases and reduce charge by amount paid or other algorithm
    foreach ($prior_purchases as $prior_purchase)
        if (strpos($prior_purchase->purchase,$fish_name)!==false)//one of the icons of the fish has been bought
		
        {  
            $prev_charge += $prior_purchase->amount;//previous charge incremented by price paid for item(s)
            $prior = TRUE;//Flag may be unnecessary
            $charge = $base_price - $prev_charge;//charge is price minus previous amount paid
            if($charge < 0)$charge = 0;// no negative amount
            $base_price= $charge; //price to be passed back in for next fish or output for payment
        }
	}  
    return $this->cartAdd($id,$fish_name,$base_price,$table_row_index,$prior);
}
 	private function cartAdd($id,$fish_name,$base_price,$id_index,$prior)
    {  //dd($base_price);
        //dd ('download#'.$fish_name[1]);
        $pageload = new Pageload;
		$pageload->addtocart = 1;
		$pageload->amount_in_cart = \Cart::total();
		$pageload->client_ip = Request::getClientIp();
		$pageload->save();
        Cart::instance('main');
        $selections = Image::where('id',$id)->get();
        foreach($selections as $selection)
        {
            //only add to cart if not already present so...    
            if (Cart::search(array('id'=>$selection->id)) == false)
                Cart::add(array(
                    'id' 		=> $selection->id,
                    'name' 		=> $fish_name . " " . $selection->filename,
                    'qty' 		=> 1,
                	'price' 	=> $base_price,
                    'options' 	=> array(
                    'filepath'	=> $selection->id,
                    'prior'		=> $prior,
                    //'proxy'		=> (string)Session::get('cart_instance')
                    )
                    )
                );
            }
		Session::flash('before_cart_url','download');
		if(Cart::count()>0) //show summary
        {   if(Cart::count()==1){$cart_description = Cart::count() . ' item  . . . ';}
            else {$cart_description = Cart::count() . ' items . . ';}
            $cart_amount = '$' . Cart::total()/100;
        }
		//send ajax response ...
		return Response::json(array(
		'cart_description' => $cart_description,
		'cart_amount' => $cart_amount
		)
		);  
        //$return_to ='download#'.$id_index;
        		//returnSession::get('go_back_to_URL');
        //return Redirect::to($return_to);
        //return Redirect::back();
    }
public function cartclick(){
	$pageload = new Pageload;
	$pageload->addtocart = 1;
	$pageload->amount_in_cart = \Cart::total();
	$pageload->client_ip = Request::getClientIp();
	$pageload->save();
}
/*	public function getCartdownload($filepath,$name)
    {
        return Carthelper::download($filepath,$name);
    }
*/    
/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
}
