<?php

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
        if ($test){
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
    {
        $selections = Image::where('id',$id)->get();
        foreach($selections as $selection)
        {
            //only add to cart if not already present so...    
            if (Cart::search(array('id'=>$selection->id)) == false)
                Cart::add(array(
                    'id' => $selection->id,
                    'name' => $fish_name . " " . $selection->filename,
                    'qty' => 1,
                    'price' => $base_price,
                    'options' => array(
                    'filepath'=>$selection->id,
                    'prior'=>$prior
                    )
                    )
                );
            }
        $return_to ='download#'.$id_index;
        //returnSession::get('go_back_to_URL');
        return Redirect::to($return_to);
        //return Redirect::back();
    }
    
function fillOutPurchaseTable()
    {   //move to download controller
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
    $purchases = DB::table('userpurchases')
        ->where('email',$email)
        ->orderBy('created_at','DESC')
        ->get();
    return $purchases;
}

function showPurchases($email)
{
    $purchases = DB::table('userpurchases')
        ->distinct('purchase')
        ->where('email',$email)
        ->orderBy('purchase')
        ->get();
    return $purchases;
}
 function priorPurchase($id,$fish_name,$base_price,$table_row_index)
 {
     $prev_charge = 0;
     $prior = FALSE;
     if(!Auth::check())return Redirect::action('SessionsController@create');  
     
     $prior_purchases = showPurchases(Auth::user()->email);

     foreach ($prior_purchases as $prior_purchase)
        if (strpos($prior_purchase->purchase,$fish_name)!==false)
            //&& ($prior_purchase->image_id == $id))
        {   
            $prev_charge += $prior_purchase->amount;
            $prior = TRUE;
        $charge = $base_price - $prev_charge;
        if($charge <= 0)$charge = 100;
        $base_price = $charge;
        }   
        return cartAdd($id,$fish_name,$base_price,$table_row_index,$prior);
    
 }