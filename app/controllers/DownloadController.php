<?php
 
class DownloadController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * @param string
	 * @return Response
	 */
	
	public function getIndex()
	{
		$contents = Cart::content();
        $fishs = Fish::withImages()->orderby('name','asc')->get();
        return View::make('pages.fishtable',compact('contents','fishs'));
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
        $target_image = public_path()."/images/bg-images/".$image_id;
        $name = "test-icon.jpg";
        $response = Response::download($target_image,$name);
        if (App::environment('local')) ob_end_clean();//for xampp locally
        $purchase_email = null!=Auth::user()?Auth::user()->email:'FREE download';
        	$purchase = new Purchase;
            $purchase->email = $purchase_email;
            $purchase->purchase = $name;
            $purchase->amount = 0;
            $purchase->image_id = 0;
            $purchase->save();
        return $response;
    }
    
    public function getFreepdfdownload($image_id,$description)
    {
        $target_image = public_path()."/images/".$image_id;
        $name = $description.".pdf";
        $response = Response::download($target_image,$name);
        if (App::environment('local')) ob_end_clean();//for xampp locally
        $purchase_email = null!=Auth::user()?Auth::user()->email:'FREE download';
        	$purchase = new Purchase;
            $purchase->email = $purchase_email;
            $purchase->purchase = $name;
            $purchase->amount = 0;
            $purchase->image_id = 0;
            $purchase->save();
        return $response;
    }
    
	public function getFreedbdownload($image_id,$name)
    {
        //must only be allowed if file is in DB for user Auth::user()->email ?????
        $email = Auth::user()->email;
        $eligible_files = DB::table('userpurchases')->where('email',$email)->lists('image_id');
      
        if( ! in_array($image_id, $eligible_files))
        {
            App::abort(401, 'This file not in purchase record');
        }
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
    {
        $back_to = Session::get('before_cart_url');
        Cart::destroy();
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
