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
            'amountindollars' => ['required','numeric'],
            'receipt_email' => ['required', 'email'],
            'cardholder_name' => ['required'], //no field on form for single payment
            'itemdescription' => ['required']
        ];
        $validation = Validator::make(Input::all(), $rules);
        if ($validation->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validation->messages());
        }

        return View::make('pages.striper');
    }

    public function postCart()
    {
        $rules = [
            //'amountindollars' 	=> ['required'],
            //'receipt_email' 	=> ['required','email'],
            'licensee' => ['required']
            //'itemdescription'	=> ['required']
        ];
        $validation = Validator::make(Input::all(), $rules);
        if ($validation->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validation->messages());
        }

        return View::make('pages.cartstriper');
    }

    public function postShopcart()
    {
        $rules = [
            //'amountindollars' 	=> ['required'],
            //'receipt_email' 	=> ['required','email'],
            //'cardholder_name' => ['required']
            //'itemdescription'	=> ['required']
        ];
        $validation = Validator::make(Input::all(), $rules);
        if ($validation->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validation->messages());
        }

        return View::make('pages.cartstriper');
    }

    public function getPayforcart()
    {
        return View::make('pages.cartstriper');
    }

    public function getStripe()
    {
        return View::make('pages.singlepayment');
    }
    // Maybe add an entry to your DB that the charge was successful, or at least Log the charge or errors
    // Stripe charge was successfull, continue by redirecting to a page with a thank you message
    public function getSuccess()
    {
        return View::make('pages.successfulpayment');
    }

    public function getSinglesuccess()
    {
        return View::make('pages.successfulsingle');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postPay()
    {
        Stripe::setApiKey($_ENV['STRIPE_KEY']);
                    // Get the credit card details submitted by the form
        $token = Input::get('stripeToken');
        $amountincents = Input::get('amountincents');
        $itemdescription = Input::get('itemdescription');
        $name = (null != Input::get('cardholder_name') ? Input::get('cardholder_name') : null);
        $receipt_email = Input::get('receipt_email');
        $purchase_number = Input::get('purchase_number');
        $zip_code = Input::get('zip-code');
                    // Create the charge on Stripe's servers - this will charge the user's card
        try {
            $charge = Stripe_Charge::create([
                    "amount" => $amountincents,
                    "card" => $token,
                    "currency" => "aud",
                    "description" => $itemdescription,
                    "metadata" => [ "licensee"=>$name,
                        "purchase_number"=>$purchase_number],
                    "receipt_email" => $receipt_email,
                    "zip-code" => $zip_code,
                ]
            );

        } catch (Stripe_CardError $e) {
            $e_json = $e->getJsonBody();
            $error = $e_json['error'];
                    // The card has been declined
                     // redirect back to checkout page
            return Redirect::to('payment/pay')
                ->withInput()->
                with('stripe_errors', $error['message'])
            ;
        }

        if ($charge->paid == true) {
            $cart_instance = Session::get('cart_instance');
            Cart::instance($cart_instance);
            $content = Cart::content();
            //$email = 'Buyer not logged in';
            $email = $charge->source['name'];
            if (Auth::user()) {
                $email = NULL != (Auth::user()->email) ? Auth::user()->email : Auth::user()->oauth_email;
            }


            foreach ($content as $item) {
                $purchase = Purchase::addToTable($item->name, $name, $item->price, $item->id, $email, $charge->metadata{'purchase_number'});
                $purchase->save();
                $purchase = Userpurchase::addToTable($item->name, $name, $item->price, $item->id, $email, $zip_code);
                $purchase->save();

                Session::push('purchased',$item->name);//or outside foreach...
            }
            return Redirect::to('payment/success')
                ->with('purchaser',$name);
        }
    }



    public function postSinglepayment()
    {
        Stripe::setApiKey($_ENV['STRIPE_KEY']);
                    // Get the credit card details submitted by the form
        $token = Input::get('stripeToken');
        $amountincents = Input::get('amountincents');
        $itemdescription = Input::get('itemdescription');
        $name = (null != Input::get('cardholder_name') ? Input::get('cardholder_name') : null);
        $receipt_email = null != Input::get('receipt_email') ? Input::get('receipt_email') : null;
        $purchase_number = Input::get('purchase_number');
        $zip_code = Input::get('zip-code');
                    // Create the charge on Stripe's servers - this will charge the user's card
        try {
            $charge = Stripe_Charge::create([
                    "amount" => $amountincents,
                    "card" => $token,
                    "currency" => "aud",
                    "description" => $itemdescription,
                    "metadata" => [ "licensee"=>$name,
                                    "purchase_number"=>$purchase_number],
                    "receipt_email" => $receipt_email,
                    "zip-code" => $zip_code,
                ]
            );

        } catch (Stripe_CardError $e) {
                    $e_json = $e->getJsonBody();
                    $error = $e_json['error'];
            // The card has been declined
            // redirect back to checkout page
            return Redirect::to('payment/pay')
                ->withInput()
                ->with('stripe_errors', $error['message'])
            ;
        }
        
        if ($charge->paid == true) {
            //dd($charge);
            $email = isset(Auth::user()->email) ? Auth::user()->email : $receipt_email;
            
            $purchase = Purchase::addToTable($itemdescription, $name, $amountincents, 0, $email, $charge->metadata{'purchase_number'});
            $purchase->save();
            //also this $charge->metadata{'purchase_number'}
            $purchase = Userpurchase::addToTable($itemdescription, $name, $amountincents, 0, $email, $zip_code);
            $purchase->save();

            return Redirect::to('payment/singlesuccess')
                ->with('purchaser',$name);
        }
    }


}