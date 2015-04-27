<?php

class Carthelper {
    


    
    
		

   
/*    public static function contentsofcart()
    {
        $content = Cart::content();
        $downloads = DB::table('downloads')->orderBy('name','asc')->get();
    }*/
    public static function downloadwholecart()//unfinished business here
    {
               $content = Cart::content();
        $downloads = DB::table('downloads')->orderBy('name','asc')->get();

	
/*	public static function download($image_id,$name)
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
            // $headers = array('Content-Type: application/jpg',);
    		$response = Response::download($image_file, $name);//,$headers
            ob_end_clean();
            return $response;

        } else { 
            App::abort(401, 'File already downloaded');
            //return Redirect::back(); 
            //better error handling needed;
        }
	}
*/    
/*
    public static function artdisplay()
    {
        
        $contents = Cart::content();
        $arts = Art::withImages()->orderby('name','asc')->get();
        //var_dump ($fishs);
        //return 'stop';
        return View::make('pages.arttable',compact('contents','arts'));
    }
    
	public static function olddisplay()
	{
		$content = Cart::content();
        $alldownloads = DB::table('downloads')->orderBy('name','asc')->get();
        $downloads = DB::table('downloads')->where('filepath','')->orderBy('name','asc')->get();
        //$downloads = DB::select(DB::raw("SELECT name from downloads WHERE filepath ='' ORDER BY name ASC"));
		return View::make('pages.icondownloads',compact('alldownloads','downloads','content'));
	}
*/
        
    }
		
}
