<?php
 
class DownloadController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * @param string
	 * @return Response
	 */
	
	public function getIndex()
	{
		$prices = Price::where('name','icons')->first();
        $table_row_index = 1;
	    $contents = Cart::content();
        //$fishs = Fish::withImages()->orderby('name','asc')->take(10)->get();
        $fishs = Fish::withImages()->orderby('name','asc')->get();

        return View::make('pages.fishtable')->with([
            'contents'          => $contents,
            'fishs'             => $fishs,
            'prices'            => $prices,
            'table_row_index'   => $table_row_index
        ]);
	}
    
    public function getCartdownload($image_id,$name)
    {
        $image = Image::where('id',$image_id)->first();
        // check session for files put into session after success return from stripe
        if (in_array($name, Session::get('purchased'))) 
        {
            $key = array_search($name,Session::get('purchased'));
            $new_session = Session::get('purchased');
            unset($new_session[$key]);  
            Session::forget('purchased');
            //save Session with file removed
            Session::put('purchased', $new_session);   

            $image_file = storage_path() . '/images/' . $image->storage_filename;
            $response = Response::download($image_file, $name);//,$headers
            if (App::environment('local')) ob_end_clean();//for xampp locally
            return $response;

        } else { 
            Session::flash('message','File already downloaded');
            Session::flash('alert-class', 'alert-info');
            return Redirect::back();//App::abort(401, 'File already downloaded');
        }
    }
    
    public function getFreedownload($image_id)
    {
		Event::fire('downloaded_free_icon');
		
		$target_image = public_path()."/images/bg-images/".$image_id;
        $name = $image_id;
		$clicked = date("Y-m-d H:i:s");
		$clicked_at = Purchase::whereCreated_at($clicked)->first();
		if(NULL != $clicked_at){
			return Redirect::back();
		}
        $response = Response::download($target_image,$name);
		if (App::environment('local')) {
			ob_end_clean();
		}
		if(strpos($_SERVER['HTTP_USER_AGENT'],'bot')===FALSE) {
			$purchase_email = null != Auth::user() ? Auth::user()->email : 'FREE download';
			$purchase = new Purchase;
			$purchase->email = $purchase_email;
			$purchase->purchase = $name;
			$purchase->amount = 0;
			$purchase->image_id = 0;
			$purchase->client_ip = null != Request::getClientIp() ? Request::getClientIp() : 'not discovered';
			$purchase->save();
			usleep(10000);
		}
        return $response;
    }
    
    public function getFreepdfdownload($image_id,$description)
    {
        Event::fire('has_downloaded_pdf');

        $target_image = public_path()."/images/".$image_id;
        $name = $description.".pdf";
		$clicked = date("Y-m-d H:i:s");
		$clicked_at = Purchase::whereCreated_at($clicked)->first();
		if(NULL != $clicked_at){
			return Redirect::back();
		}
		$response = Response::download($target_image,$name);
        if (App::environment('local')) {
			ob_end_clean();
		}
		if(strpos($_SERVER['HTTP_USER_AGENT'],'bot')===FALSE) {
        	$purchase_email = null!=Auth::user()?Auth::user()->email:'FREE download';

        	$purchase = new Purchase;
            $purchase->email = $purchase_email;
            $purchase->purchase = $name;
            $purchase->amount = 0;
            $purchase->image_id = 0;
			$purchase->client_ip = null!=Request::getClientIp()?Request::getClientIp():'not discovered';
            $purchase->save();
			usleep(10000);
		}

        return $response;
		
    }
    
	public function getFreedbdownload($image_id,$name)
    {
        //must only be allowed if file is in DB for user Auth::user()->email ?????
        $email = Auth::user()->email;
        $eligible_files = Userpurchase::where('email',$email)->lists('image_id');
      
        if( ! in_array($image_id, $eligible_files))
        {
            App::abort(401, 'This file not in purchase record');
        }
		$purchase = Userpurchase::where('email',$email)
			->where('image_id',$image_id)
			->firstOrFail();
			$purchase->touch();
		//dd($purchase->image_id);	
		//$update_purchase = DB::table('userpurchases')- 
        $image = Image::where('id',$image_id)->first();
        $target_image = storage_path() . '/images/' . $image->storage_filename;
        $response = Response::download($target_image,$name);
        if (App::environment('local')) ob_end_clean();//for xampp locally
        
        return $response;
    }
	public function getAllocate($image_id,$name)
	{
		dd($image_id,$name,Auth::user()->email);
	}

    public function getFinished()//after successful downloads
    {	$instance = null != Session::get('cart_instance')?Session::get('cart_instance'):'main';
        $back_to = Session::get('before_cart_url');
        Cart::instance($instance)->destroy();
        return Redirect::to($back_to);
    }
    
    public function getDownloadall()
    { 
        return downloadWholeCart();
    }
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
