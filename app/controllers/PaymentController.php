<?php

class PaymentController extends \BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function postIndex()
    {
        $rules = [
            'amountindollars' => ['required'],
            'receipt_email' => ['required', 'email'],
            'cardholder_name' => ['required'],
            'itemdescription' => ['required']
        ];
        $validation = Validator::make(Input::all(), $rules);
        if ($validation->fails()) {
            return Redirect::back()->withInput()->withErrors($validation->messages());
        }
        return View::make('pages.striper');
    }

    public function postCart()
    {
        $rules = [
            //'amountindollars' 	=> ['required'],
            //'receipt_email' 	=> ['required','email'],
            'cardholder_name' => ['required']
            //'itemdescription'	=> ['required']
        ];
        $validation = Validator::make(Input::all(), $rules);
        if ($validation->fails()) {
            return Redirect::back()->withInput()->withErrors($validation->messages());
        }
        return View::make('pages.cartstriper');
    }

    public function postShopcart()
    {
        $rules = [
            //'amountindollars' 	=> ['required'],
            //'receipt_email' 	=> ['required','email'],
            'cardholder_name' => ['required']
            //'itemdescription'	=> ['required']
        ];
        $validation = Validator::make(Input::all(), $rules);
        if ($validation->fails()) {
            return Redirect::back()->withInput()->withErrors($validation->messages());
        }
        return View::make('pages.cartstriper');
    }

    public function getPayforcart()
    {
        return View::make('pages.cartstriper');
    }

    public function getStripe()
    {    #return 'hello';
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
        $name = null != Input::get('name') ? Input::get('name') : null;
        $receipt_email = Input::get('receipt_email');
        // Create the charge on Stripe's servers - this will charge the user's card
        try {
            $charge = Stripe_Charge::create(array(
                    "amount" => $amountincents, // amount in cents
                    "currency" => "aud",
                    "card" => $token,
                    "description" => $itemdescription,
                    "metadata['name']" => $name,
                    "receipt_email" => $receipt_email,
                )
            );

        } catch (Stripe_CardError $e) {
            $e_json = $e->getJsonBody();
            $error = $e_json['error'];
            // The card has been declined
            // redirect back to checkout page
            return Redirect::to('payment/pay')
                ->withInput()->with('stripe_errors', $error['message']);
        }
        // Maybe add an entry to your DB that the charge was successful, or at least Log the charge or errors
        // Stripe charge was successfull, continue by redirecting to a page with a thank you message
        if ($charge->paid == true) {
            $content = Cart::content();
            $email = 'Buyer not logged in';
            if (Auth::user()) {
                $email = NULL != (Auth::user()->email) ? Auth::user()->email : Auth::user()->oauth_email;
            }

            //Session::put('purchased',array());
            //put the purchased items in the database for later download if necessary
            foreach ($content as $item) {
                $purchase = Purchase::addToTable($item->name, $name, $item->price, $item->id, $email);
                $purchase->save();
                $purchase = Userpurchase::addToTable($item->name, $name, $item->price, $item->id, $email);
                $purchase->save();
            }
            //return Session::all();
            //return to download
            return Redirect::to('payment/success');
        }
        #return Route::get('success/{return_url}','PaymentController@getSuccess');
    }

    public function postTestpay()
    {
        // Use the config for the stripe secret key
        Stripe::setApiKey(Config::get('stripetest.stripe.secret'));//duplicated in stripe script in cartstriper

        // Get the credit card details submitted by the form
        $token = Input::get('stripeToken');
        $amountincents = Input::get('amountincents');
        $itemdescription = Input::get('itemdescription');
        $name = null != Input::get('name') ? Input::get('name') : null;
        $receipt_email = Input::get('receipt_email');
        // Create the charge on Stripe's servers - this will charge the user's card
        try {
            $charge = Stripe_Charge::create(array(
                    "amount" => $amountincents, // amount in cents
                    "currency" => "aud",
                    "card" => $token,
                    "description" => $itemdescription,
                    "metadata['name']" => $name,
                    "receipt_email" => $receipt_email,
                )
            );

        } catch (Stripe_CardError $e) {
            $e_json = $e->getJsonBody();
            $error = $e_json['error'];
            // The card has been declined
            // redirect back to checkout page
            return Redirect::to('payment/testpay')
                ->withInput()->with('stripe_errors', $error['message']);
        }
        // Maybe add an entry to your DB that the charge was successful, or at least Log the charge or errors
        // Stripe charge was successfull, continue by redirecting to a page with a thank you message
        if ($charge->paid == true) {
            $cart_instance = Session::get('cart_instance');
            Cart::instance($cart_instance);
            $content = Cart::content();
            $email = 'Buyer not logged in';
            if (Auth::user()) {
                $email = NULL != (Auth::user()->email) ? Auth::user()->email : Auth::user()->oauth_email;
            }

            //Session::put('purchased',array());
            //put the purchased items in the database for later download if necessary
            foreach ($content as $item) {
                $purchase = Purchase::addToTable($item->name, $name, $item->price, $item->id, $email);
                $purchase->save();
                $userpurchase = Userpurchase::addToTable($item->name, $name, $item->price, $item->id, $email);
                $userpurchase->save();
                Session::push('purchased', $item->name);
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
        $name = null != Input::get('name') ? Input::get('name') : null;
        $receipt_email = null != Input::get('receipt_email') ? Input::get('receipt_email') : null;
        //dd($name);
        // Create the charge on Stripe's servers - this will charge the user's card
        try {
            $charge = Stripe_Charge::create(array(
                    "amount" => $amountincents, // amount in cents
                    "currency" => "aud",
                    "card" => $token,
                    "description" => $itemdescription,
                    "metadata['name']" => $name,
                    "receipt_email" => $receipt_email
                )
            );
            //						dd($charge['receipt_email']);

        } catch (Stripe_CardError $e) {
            $e_json = $e->getJsonBody();
            $error = $e_json['error'];
            // The card has been declined
            // redirect back to checkout page
            return Redirect::to('payment/testpay')
                ->withInput()->with('stripe_errors', $error['message']);
        }
        // Maybe add an entry to your DB that the charge was successful, or at least Log the charge or errors
        // Stripe charge was successfull, continue by redirecting to a page with a thank you message
        if ($charge->paid == true) {

            $email = isset(Auth::user()->email) ? Auth::user()->email : $receipt_email;
            //dd($email);
            //ok so send an email as stripe won't...
            $purchase = Purchase::addToTable($itemdescription, $name, $amountincents, 0, $email);
            $purchase->save();/*
            $purchase->email = $email;
            $purchase->purchase = $itemdescription;
            $purchase->amount = $amountincents;
            $purchase->cardholder_name = $name;
            $purchase->image_id = 0;
            $purchase->save();*/

            $emailcheck = User::where('email', '=', $receipt_email)->first();
            //if ($emailcheck !== null){
            $purchase = Userpurchase::addToTable($itemdescription, $name, $amountincents, 0, $receipt_email);
            $purchase->save();/*
	            $purchase->email = $receipt_email;
	            $purchase->cardholder_name = $name;
	            $purchase->purchase = $itemdescription;
	            $purchase->amount = $amountincents;
	            $purchase->image_id = 0;
	            $purchase->save();	*/
            //}
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
        $name = null != Input::get('name') ? Input::get('name') : null;
        $receipt_email = null != Input::get('receipt_email') ? Input::get('receipt_email') : null;
        // Create the charge on Stripe's servers - this will charge the user's card
        try {
            $charge = Stripe_Charge::create(array(
                    "amount" => $amountincents, // amount in cents
                    "currency" => "aud",
                    "card" => $token,
                    "description" => $itemdescription,
                    "metadata['name']" => $name,
                    "receipt_email" => $receipt_email
                )
            );

        } catch (Stripe_CardError $e) {
            $e_json = $e->getJsonBody();
            $error = $e_json['error'];
            // The card has been declined
            // redirect back to checkout page
            return Redirect::to('payment/pay')
                ->withInput()->with('stripe_errors', $error['message']);
        }
        // Maybe add an entry to your DB that the charge was successful, or at least Log the charge or errors
        // Stripe charge was successfull, continue by redirecting to a page with a thank you message
        if ($charge->paid == true) {

            $email = isset(Auth::user()->email) ? Auth::user()->email : $receipt_email;
            //dd($email);
            $purchase = new Purchase;
            $purchase->email = $email;
            $purchase->purchase = $itemdescription;
            $purchase->amount = $amountincents;
            $purchase->cardholder_name = $name;
            $purchase->image_id = 0;
            $purchase->save();

            $purchase = new Userpurchase;
            $purchase->email = $email;
            $purchase->purchase = $itemdescription;
            $purchase->amount = $amountincents;
            $purchase->cardholder_name = $name;
            $purchase->image_id = 0;
            $purchase->save();
            return Redirect::to('payment/singlesuccess');
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
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */

    public function update($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}