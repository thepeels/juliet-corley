<?php

class PaymentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
public function postIndex()
	{	
		return View::make('pages.striper');
	}
public function getPayforcart()
	{
		return View::make('pages.cartstriper');
	}
public function getStripe()
	{	#return 'hello';
		return View::make('pages.singlepayment');
	}
	// Maybe add an entry to your DB that the charge was successful, or at least Log the charge or errors
	// Stripe charge was successfull, continue by redirecting to a page with a thank you message
public function getSuccess()
	{
		return View::make('pages.successfulpayment');
		#return Redirect::to($return_url);
	}
public function getSinglesuccess()
	{
		return View::make('pages.successfulsingle');
	}
public function postPay()
	{
		// Use the config for the stripe secret key
	Stripe::setApiKey(Config::get('stripe.stripe.secret'));

	// Get the credit card details submitted by the form
	$token = Input::get('stripeToken');
	$amountincents = Input::get('amountincents');
	$itemdescription = Input::get('itemdescription');
	// Create the charge on Stripe's servers - this will charge the user's card
	try {
	    $charge = Stripe_Charge::create(array(
	      "amount" => $amountincents, // amount in cents
	      "currency" => "aud",
	      "card"  => $token,
	      "description" => $itemdescription,
	      "receipt_email" => $receipt_email,
		  )
	    );

	} catch(Stripe_CardError $e) {
	    $e_json = $e->getJsonBody();
	    $error = $e_json['error'];
	    // The card has been declined
	    // redirect back to checkout page
	    return Redirect::to('payment/pay')
	        ->withInput()->with('stripe_errors',$error['message']);
	}
	// Maybe add an entry to your DB that the charge was successful, or at least Log the charge or errors
	// Stripe charge was successfull, continue by redirecting to a page with a thank you message
	if ($charge->paid == true) 
	   {
    	    $content = Cart::content();
            $email = isset(Auth::user()->email);
            
            //Session::put('purchased',array());
                //put the purchased items in the database for later download if necessary
            
            //     var_dump($content);return 'stop here';
            foreach ($content as $item)
        {
            $purchase = new Userpurchase;
            $purchase->email = $email;
            $purchase->purchase = $item->name;
            $purchase->amount = $item->price;
            $purchase->image_id = $item->id;
            $purchase->save();
            /*
            DB::table('userpurchases')->insert(
                array(
                    'email'=>$email,
                    'purchase'=>$item->name,
                    'amount'=>$item->price,
                    'image_id'=>$item->id,
                    'created_at'=> new DateTime,
                    )
                );*/
            #Session::push('purchased_download',$item->name);
            Session::push('purchased',$item->filepath);
        }
    		//return Session::all();
    		//return to download
		return Redirect::to('payment/success');
	}
	#return Route::get('success/{return_url}','PaymentController@getSuccess');
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
    public function postTestpay()
    {
        // Use the config for the stripe secret key
    Stripe::setApiKey(Config::get('stripetest.stripe.secret'));//duplicated in stripe script in cartstriper

    // Get the credit card details submitted by the form
    $token = Input::get('stripeToken');
    $amountincents = Input::get('amountincents');
    $itemdescription = Input::get('itemdescription');
	$receipt_email = Input::get('receipt_email');
    // Create the charge on Stripe's servers - this will charge the user's card
    try {
        $charge = Stripe_Charge::create(array(
          "amount" => $amountincents, // amount in cents
          "currency" => "aud",
          "card"  => $token,
          "description" => $itemdescription,
          "receipt_email" => $receipt_email,
          )
        );

    } catch(Stripe_CardError $e) {
        $e_json = $e->getJsonBody();
        $error = $e_json['error'];
        // The card has been declined
        // redirect back to checkout page
        return Redirect::to('payment/pay')
            ->withInput()->with('stripe_errors',$error['message']);
    }
    // Maybe add an entry to your DB that the charge was successful, or at least Log the charge or errors
    // Stripe charge was successfull, continue by redirecting to a page with a thank you message
    if ($charge->paid == true) {
        $content = Cart::content();
        $email = isset(Auth::user()->email);
        //Session::put('purchased',array());
            //put the purchased items in the database for later download if necessary
        
        foreach ($content as $item){
            
            DB::table('userpurchases')->insert(
                array(
                    'email'=>$email,
                    'purchase'=>$item->name,
                    'amount'=>$item->price,
                    'image_id'=>$item->id,
                    'created_at'=> new DateTime,
                    )
                );
            #Session::push('purchased_download',$item->name);
            Session::push('purchased',$item->name);
        }
        
            //return to download
        return Redirect::to('payment/success');
    }
    #return Route::get('success/{return_url}','PaymentController@getSuccess');
    }
public function postTestsinglepayment()
    {
        // Use the config for the stripe secret key
    Stripe::setApiKey(Config::get('stripetest.stripe.secret'));//duplicated in stripe script in cartstriper

    // Get the credit card details submitted by the form
    $token = Input::get('stripeToken');
    $amountincents = Input::get('amountincents');
    $itemdescription = Input::get('itemdescription');
				$receipt_email = null!=Input::get('receipt_email')?Input::get('receipt_email'):null;
    // Create the charge on Stripe's servers - this will charge the user's card
    try {
        $charge = Stripe_Charge::create(array(
          "amount" => $amountincents, // amount in cents
          "currency" => "aud",
          "card"  => $token,
          "description" => $itemdescription,
          "receipt_email" => $receipt_email,
          )
        );

    } catch(Stripe_CardError $e) {
        $e_json = $e->getJsonBody();
        $error = $e_json['error'];
        // The card has been declined
        // redirect back to checkout page
        return Redirect::to('payment/pay')
            ->withInput()->with('stripe_errors',$error['message']);
    }
    // Maybe add an entry to your DB that the charge was successful, or at least Log the charge or errors
    // Stripe charge was successfull, continue by redirecting to a page with a thank you message
    if ($charge->paid == true) {
        
        //$email = isset(Auth::user()->email) ? Auth::user()->email : $receipt_email;
        //dd($email);
        //ok so send an email as stripe won't...
        return Redirect::to('payment/singlesuccess');
    }
    #return Route::get('success/{return_url}','PaymentController@getSuccess');
    }

public function postSinglepayment()
    {
        // Use the config for the stripe secret key
    Stripe::setApiKey(Config::get('stripe.stripe.secret'));//duplicated in stripe script in cartstriper

    // Get the credit card details submitted by the form
    $token = Input::get('stripeToken');
    $amountincents = Input::get('amountincents');
    $itemdescription = Input::get('itemdescription');
				$receipt_email = null!=Input::get('receipt_email')?Input::get('receipt_email'):null;
    // Create the charge on Stripe's servers - this will charge the user's card
    try {
        $charge = Stripe_Charge::create(array(
          "amount" => $amountincents, // amount in cents
          "currency" => "aud",
          "card"  => $token,
          "description" => $itemdescription,
          "receipt_email" => $receipt_email,
          )
        );

    } catch(Stripe_CardError $e) {
        $e_json = $e->getJsonBody();
        $error = $e_json['error'];
        // The card has been declined
        // redirect back to checkout page
        return Redirect::to('payment/pay')
            ->withInput()->with('stripe_errors',$error['message']);
    }
    // Maybe add an entry to your DB that the charge was successful, or at least Log the charge or errors
    // Stripe charge was successfull, continue by redirecting to a page with a thank you message
    if ($charge->paid == true) {
        
        $email = isset(Auth::user()->email) ? Auth::user()->email : $receipt_email;
        //dd($email);
        return Redirect::to('payment/singlesuccess');
    }
    #return Route::get('success/{return_url}','PaymentController@getSuccess');
    }
}
	