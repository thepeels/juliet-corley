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

function showPayButton()
    {
        if (Cart::total()!=0){
            echo('<h3><a href="/cardpay" class="btn btn-primary ">Pay by Card
                </a></h3>');
        }
    } 
    
function cartSummary()
    {   $test = FALSE;
        $cart = Cart::content();
        foreach ($cart as $row){
            if($row->options->prior == TRUE){$test=TRUE;}}
        //insert here if(total = 0 && No >0) echo go to my account to download
            if($test && Cart::total()==0 && Cart::count()>0){
            echo'<td class="table-summary"><em>* Download these Icons from your Account</em>
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
        $cart = Cart::content();
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
                echo'<td><a href="/icon/dumprow/'.$row->rowid.'" class="btn btn-warning btn-xs">Remove</a></td>';
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

function cartAdd($id,$fish_name,$base_price,$id_index,$prior)
    {  //dd($base_price);
        //dd ('download#'.$fish_name[1]);
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
                    'prior'		=> $prior
                    )
                    )
                );
            }
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
    
function fillOutPurchaseTable()
    {   
        $content = Cart::content();
        foreach ($content as $row){
            echo'<tr>';
                echo'<td>'.$row->name.'</td>';
                echo'<td>&dollar;'.($row->price/100).'</td>';
                echo'<td>'.$row->qty.'</td>';
                if(Session::has('purchased',$row->options->name)){
                    echo'<td><a href="../download/cartdownload/'
                    . $row->id . '/' . $row->name . '" class="btn btn-info btn-xs">'
                    . 'Download Now.</a>
                    </td>';
                }
            echo'</tr>';
        }
        echo'<tr><td class="table-summary">Cart Total</td>';
        echo'<td>&dollar;' . Cart::total()/100 . '</td>';
        echo'<td>' . Cart::count() . '</td>';
        echo'<td></td></tr>';
    }
    
function downloadWholeCart()
{
    $content = Cart::content();
        foreach ($content as $row){
            
            //return downloadafile($row->id,$row->name);
            $image = Image::where('id',$row->id)->first();
    $image_file = storage_path() . '/images/' . $image->storage_filename;
    $response = Response::download($image_file, $row->name);
    if (App::environment('local')) ob_end_clean();//for xampp locally
    return $response;
        }
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
        ->get();
    /*$purchases = DB::table('Userpurchases')
        ->where('email',$email)
        ->orderBy('created_at','DESC')
        ->get();*/
    return $purchases;
}

function showPurchases($email)
{
    $purchases = Userpurchase::distinct()
        ->where('email',$email)
        ->orderBy('purchase')
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








  