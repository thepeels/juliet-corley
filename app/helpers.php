<?php

/**
 * In URL
 * 
 * Checks to see if a string is in the current URL.
 * 
 * @param   string  $string
 * @return  bool
 */
function in_url($string)
    {
        return strpos($_SERVER["REQUEST_URI"], $string) !== FALSE;
    }

function showPayButton($dest_email)
    {
        if (Cart::instance('main')->total()!=0){
            echo('<h3><a href="/cardpay" class="btn btn-primary ">Pay by Card
                </a></h3>');
			//echo('Cart destination:-');
        }
    }

function shopShowPayButton($dest_email)
    {
        if (Cart::instance('shop')->total()!=0){
            //echo('<h3><a href="/shopcardpay" class="btn btn-primary ">Pay by Card</a></h3>');
			echo('<h3><input type = "submit" value="Pay by Card" class="btn btn-primary "></h3>');
        }
    }

function cartSummary()
    {   $test = FALSE;
		Cart::instance('main');
        $cart = Cart::content();
        foreach ($cart as $row){
            if($row->options->prior == TRUE){$test=TRUE;}}
        //insert here if(total = 0 && No >0) echo go to my account to download
            if($test && Cart::total()==0 && Cart::count()>0){
            echo'<td class="table-summary"><em>* Download these Images from your Account</em>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Cart Total</td>';}
            elseif($test){
            echo'<td class="table-summary"><em>* Previous purchase discount applied</em>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Cart Total</td>';}
        else{
            echo'<td class="table-summary">Cart Total</td>';
        }
        echo'<td>&dollar;'.(Cart::total()/100).'</td>';
        echo'<td>'.Cart::count().'</td>';
        //carthelper::showPaybutton(); // would need to be inside <td>
    }

function shopCartSummary()
    {   $test = FALSE;
		Cart::instance('shop');
        $cart = Cart::content();
        foreach ($cart as $row){
            if($row->options->prior == TRUE){$test=TRUE;}}
        //insert here if(total = 0 && No >0) echo go to my account to download
            if($test && Cart::total()==0 && Cart::count()>0){
            echo'<td class="table-summary"><em>* Download these Images from your Account</em>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Cart Total</td>';}
            elseif($test){
            echo'<td class="table-summary"><em>* Previous purchase discount applied</em>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Cart Total</td>';}
        else{
            echo'<td class="table-summary">Cart Total</td>';
        }
        echo'<td>&dollar;'.(Cart::total()/100).'</td>';
        echo'<td>'.Cart::count().'</td>';
        //carthelper::showPaybutton(); // would need to be inside <td>
    }
    
function cartTabulate()
    {
        $cart = Cart::instance('main')->content();
        foreach ($cart as $row){
           
           echo'<tr>';
                //echo'<td>'.$row->id.'</td>';
                if($row->options->prior == TRUE){
                    echo'<td>* '.$row->name. '</td>';
                    
                }
                else{
                    echo'<td>'.$row->name.'</td>';
                }
                echo'<td>&dollar;'.($row->price/100).'</td>';
                echo'<td>'.$row->qty.'</td>';
                echo'<td><a href="/icon/dumprow/'.$row->rowid.'" class="btn btn-warning btn-custom-warning btn-xs">Remove</a>'./*$row->options->proxy.*/'</td>';
                //echo'<td>'.$row->options->filepath.'</td>';
            echo'</tr>';
        }
    } 

function shopCartTabulate()
    {
        $cart = Cart::instance('shop')->content();
        foreach ($cart as $row){
           
           echo'<tr>';
                //echo'<td>'.$row->id.'</td>';
                if($row->options->prior == TRUE){
                    echo'<td>* '.$row->name. '</td>';
                    
                }
                else{
                    echo'<td>'.$row->name.'</td>';
                }
                echo'<td>&dollar;'.($row->price/100).'</td>';
                echo'<td>'.$row->qty.'</td>';
                echo'<td><a href="/icon/shopdumprow/'.$row->rowid.'" class="btn btn-warning btn-xs">Remove</a>'./*$row->options->proxy.*/'</td>';
                //echo'<td>'.$row->options->filepath.'</td>';
            echo'</tr>';
        }
    } 
    
function cartResume()
    {
        if(Cart::count()>0)
        {   if(Cart::count()==1){echo Cart::count().' item  . . . ';}
            else {echo Cart::count().' items . . . ';}
            echo '&dollar;' . Cart::total()/100;
        }    
    } 

function shopResume()
    {
        if(Cart::instance('shop')->count()>0)
        {   if(Cart::instance('shop')->count()==1){echo Cart::instance('shop')->count().' item  . . . ';}
            else {echo Cart::instance('shop')->count().' items . . . ';}
            echo '&dollar;' . Cart::instance('shop')->total()/100;
        }    
    } 

function cartAdd($id,$fish_name,$base_price,$id_index,$prior)
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
function cartAddColouringItem($productId)
{
	Cart::instance('shop');
	$products = Product::where('id',$productId)->get();
	foreach ($products as $product)
	#$name = Image::withImages()->where('id',$product->full_size_image_id)->get();
	
		{
			Cart::add(array(
				'id'		=> $product->full_size_image_id,
				'name'		=> $product->title.'.pdf',
				'qty' 		=> 1,
				'price'		=> $product->price,
				'options'	=> array(
				'filepath'	=> $product->full_size_image_id,
				))
			);
		}
		Session::flash('before_cart_url','colouring');
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
}
function shopCartAdd($productId,$quantity)
{
		$product = Product::where('id',$productId)->get();
		foreach($product as $product){
		//dd($product);
		Cart::instance('shop');	
		Cart::add(
			$product->id,
	        $product->title,
	        $quantity,
	    	$product->price
	        );
		if(Cart::count()>0) //show summary
        {   if(Cart::count()==1){$cart_description = Cart::count() . ' item  . . . ';}
            else {$cart_description = Cart::count() . ' items . . ';}
            $cart_amount = '$' . Cart::total()/100;
        }
		//send ajax response ...
		return Response::json(array(
			'success' => true,
			'cart_description' => $cart_description,
			'cart_amount' => $cart_amount
			//'id'=>$product->id
			)
		);}
}

function fillOutPurchaseTable()
    {
        $cart_instance = Session::get('cart_instance');
		Cart::instance($cart_instance);
        $content = Cart::content();
        foreach ($content as $row){
            echo'<tr>';
                echo'<td>'.$row->name.'</td>';
                echo'<td>&dollar;'.($row->price/100).'</td>';
                echo'<td>'.$row->qty.'</td>';
                if(Session::has('purchased',$row->options->name)){
                    echo'<td><a href="../download/cartdownload/'
                    . $row->id . '/' . $row->name . '" class="btn btn-info btn-xs">'
                    . 'Download Now</a> '
                    //. '<a href="../download/allocate/'
                    //. $row->id . '/' . $row->name . '" class="btn btn-default btn-xs byajax">'
                    //. 'Allocate to email</a>
                    //.'<form action="../icon/ajaxemail" class="btn btn-default btn-xs byajax">
                    //<input type="email" name="proxyemail" size="20" />
                    .'  
                    </td>';
                }
            echo'</tr>';
        }
        echo'<tr><td class="table-summary">Cart Total</td>';
        echo'<td>&dollar;' . Cart::total()/100 . '</td>';
        echo'<td>' . Cart::count() . '</td>';
        if($cart_instance == 'main')echo'<td><a href="/download/downloadall" class="btn btn-default btn-xs">&nbsp;&nbsp;Download All&nbsp;&nbsp;</a></td></tr>';
  	//Cart::destroy();
   //var_dump(Session::get('cart_instance'));
   //dd(Session::get('purchased'));
    }
    
function downloadWholeCart()
{
    $zipname = 'julietcorley' .time().'.zip';
	$zip = new ZipArchive();
	$zip->open($zipname, ZipArchive::CREATE);	
    $content = Cart::instance('main')->content();
        foreach ($content as $row){
            $image = Image::where('id',$row->id)->first();
    		$image_file = storage_path() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $image->storage_filename;
        	$zip->addFile($image_file,$row->name);
		}
		$zipfilepath = $zip->filename;
	$zip->close();//save zipfile in public folder with contents
    
		header("Content-Type: application/zip"); 
	    header("Content-Length: " . filesize($zipfilepath)); 
	    header("Content-Disposition: attachment; filename=". $zipname); 
    	readfile($zipfilepath); //shows download options window
    	unlink($zipfilepath);//deletes zipfile from public folder
}
function downloadafile($image_id,$name)
{
    $image = Image::where('id',$image_id)->first();
    $image_file = storage_path() . '/images/' . $image->storage_filename;
    $response = Response::download($image_file, $name);
    if (App::environment('local')) ob_end_clean();//for xampp locally
    return $response;
}

function adminshowpurchases($email)
{
    $purchases = Userpurchase::distinct()
        ->where('email',$email)
        ->orderBy('created_at','DESC')
		#->paginate(3);
        ->get();
    return $purchases;
}

function showPurchases($email)
{
    $purchases = Userpurchase::distinct('purchase')
        ->where('email',$email)
        ->orderBy('purchase')
		->orderBy('created_at','ASC')
		//->paginate(10);
        ->get();
    return $purchases;
}

function priorPurchase($id,$fish_name,$base_price,$table_row_index)
{                      //dd(Auth::check());
    $prev_charge = 0;
    $prior = FALSE;
    if(!Auth::check())Redirect::action('SessionsController@create');
	//dd ($fish_name);
       
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
      
    return cartAdd($id,$fish_name,$base_price,$table_row_index,$prior);
}
 
function getPrice($column)
{
    $prices = Price::where('name',$column)->get();
    //$prices = DB::table('prices')->where('name',$column)->get();
    return $prices;
}

function ajaxemail($proxyemail)
	{
		$proxyemail=Input::get('proxyemail');
		if ($proxyemail=="")$proxyemail=Auth::user()->email;
		//dd($proxyemail);
		//Session::put('dest_email',$proxyemail);
		//dd(Session::get('dest_email'));
		return Response::json(array(
			'success' 		=> true,
			'current_email' => $proxyemail));
	}





  