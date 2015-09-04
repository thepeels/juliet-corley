<?php
use \Stripe;
class PagesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		#return View::make('hello');
		return 'Hello';
		
	}
	public function about()
	{
		$previous = URL::previous();
		Session::flash('previous_url',$previous);
		return View::make('pages.about');
	}
	
	public function home()
	{
		return View::make('pages.home');
	}

    public function info()
    {
        $previous = URL::previous();
		Session::flash('previous_url',$previous);
        return View::make('pages.info');
    }
	
    public function commissions()
    {
        return View::make('pages.commissions');
    }
	
    public function infoNew()
    {
        return View::make('pages.fishtableinfo');
    }
	
    public function colouring()
    {
        return View::make('pages.colouring');
    }
    
	public function striper()
	{
		return View::make('pages.striper');
	}

	public function charge()
	{
		return View::make('pages.charge');
	}
    
    public function services()
    {
        return View::make('pages.services');
    }
    
    public function terms()
    {
        $previous = URL::previous();
		Session::flash('previous_url',$previous);
		return View::make('pages.terms');
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
