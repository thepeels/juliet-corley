<?php namespace Admin;
use \Session,\Fish,\FishBuilder,\Redirect,\DB,
	\View,\Price,\Input,\Validator,\Userpurchase,\Purchase,\Image;

class FishController extends \BaseController
{
    /**
     * Get Index
 */
public function getIndex()
    {
        $prices = Price::where('name','icons')->first();
        $fish = Fish::withImages()->orderBy('name')->get();
        return View::make('admin.fish_table', array(
            'fishs' => $fish,
            'prices'=> $prices
        ));
    }
    
    /**
     * Get Delete
     * 
     * @param   int     $fishId
	 * @return string
     */
public function getDelete($fishId)
    {
        $fish = Fish::where('id', $fishId)->first();
        $fish->delete();
        
        return Redirect::to('admin/fish');
    }
    
    /**
     * Get Add
     * 
     * @param  none
     * @return string
     */
public function getAdd()
    {
    	return View::make('admin.add_fish');
    }

    /**
     * Add
     * 
     * This builds a new fish
     * 
     * @param  none
     * @return string
     */
public function postAdd()
    {	
        $prices = Price::getPrice('icons');
        foreach ($prices as $price){}  
        /*DB::disableQueryLog(); */
        $input = Input::all();
        $builder = new FishBuilder;
        $fish = $builder->build(
            $input['name'], 
            $price->first_price, 
            $input['main-image'],
            $input['small-image'], 
            $input['silhouette-image'],
            $input['outline-image'] 
        );
        return Redirect::to('admin/fish');//re-load the admin fish table
    }
     
public function postPrices()
    {
         //$now = new \DateTime();
        DB::transaction(function()
        {
            DB::table('prices')->where('name','icons')
            ->update(array(
            'first_price' => Input::get('first_price')*100,
            'second_price' => Input::get('second_price')*100,
            'third_price' => Input::get('third_price')*100,
            'fourth_price' => Input::get('fourth_price')*100,
            'special_price' => Input::get('fifth_price')*100,
            'updated_at' => \Carbon\Carbon::now()
            )
            );
        });
        return Redirect::to('admin/prices');
    }
 
    /**
     * Download
     * 
     * @param  string   $name
     * @param  string   $type
     * @return string
     */
public function getDownload($name, $type)
    {
        $fish = Fish::withImages()->where('name', $name)->first();
        $response = $fish->$type->download();
        
        return $response;
    }

    /**
     * Find
     * 
     * @param  none
     * @return string
     */
public function getFind()
    {
        //$fish = Fish::find(1);
        $fish = Fish::orderBy('created_at','desc')->first();
         
        $large_image = new Image(array(
            'display_name' => $fish->name . ' 5cm',
            'filename' => $fish->id,
            'size' => '5cm',
            'type' => 'jpg'
        ));
        $large_image->save();
         
        $fish->large_image_id = $large_image->id;
        $fish->save();
         
        $large_image = new Image(array(
            'display_name' => $fish->name . ' 3cm',
            'filename' => $fish->id,
            'size' => '3cm',
            'type' => 'jpg'
        ));
        $large_image->save();
         
        $fish->small_image_id = $large_image->id;
        $fish->save();
         
        $large_image = new Image(array(
            'display_name' => $fish->name . ' outline',
            'filename' => $fish->id,
            'size' => '3cm',
            'type' => 'jpg'
        ));
        $large_image->save();
         
        $fish->outline_image_id = $large_image->id;
        $fish->save();
         
        $large_image = new Image(array(
            'display_name' => $fish->name . ' silhouette',
            'filename' => $fish->id,
            'size' => '3cm',
            'type' => 'jpg'
        ));
        $large_image->save();
         
        $fish->silhouette_image_id = $large_image->id;
        $fish->save();
         
        return Redirect::to('/addafish');
    }

    /**
     * Image
     * 
     * @param  none
     * @return string
     */
public function getImage()
    {
        $fish = Fish::with('small_image')->get();
         
        $fish->each(function($fish)
        {
            echo '<img src="' . $fish->small_image['image_path'] . '">';
             
        });
         
        $fish = Fish::find(1);
        $image = $fish->small_image;
        #$image = $fish->small_image()->first();
         
        print_r($image);
    }
     
public function getStore()
    {
         
    }
     
    private $rules = array
    	(
            'name' => 'required',
            'base-price' => 'required',
     	);
     
           // 'main-image' => 'required',
           // 'outline-image' => 'required',   
           // 'silhouette-image' => 'required',
     
public function postValidateaddfish()
    {
        $input = Input::get();
         
        $validator = Validator::make($input, $this->$rules);
         
        if ($validator->fails()) 
        {
            $messages = $validator->messages();
            return Redirect::to('/addafish')
                ->withErrors($validator);
        } else {
            return Redirect::to('/fish/create');
        }
    }

    /**
     * Delinver
     *
     * @param  int  $id
     * @return string
     */
    public function getDeliver($id)
    {
        return View::make('admin/deliver',array('id'=>$id));
    }
     
public function postDeliver()
	{
		$input = Input::all();
        $email= $input['email'];
		if ($email!=null){ 
        //$fish = Fish::find($input['id']);
        $fishes = Fish::where('name',$input['fish-name'])->get();
        //$fishes = Fish::withImages()->where('name',$input['fish-name'])->get();
        //dd($fishes->small_image_flipped_id);
        //dd($fishes);
        //echo $email;
        $prices = Price::get();
        foreach ($prices as $price){
            $first_price = $price->first_price;
            $second_price = $price->second_price;
            $third_price = $price->third_price;
            $fourth_price = $price->fourth_price;
        }
        foreach ($fishes as $fish){
        //echo($fish->small_image_flipped_id );
        $images = Image::where('id',$fish->large_image_id)->get();
        foreach ($images as $image);
        Userpurchase::create([
        'email'         =>$email,
        'purchase'      =>$fish->name . ' ' . $image->filename,
        'amount'        =>$first_price,
        'image_id'      =>$fish->large_image_id]
        );
        
        $images = Image::where('id',$fish->large_image_flipped_id)->get();
        foreach ($images as $image);
		
        $purchase = new Userpurchase;
        $purchase->email       = $email;
        $purchase->purchase    = $fish->name . ' ' . $image->filename;
        $purchase->amount      = $first_price;
        $purchase->image_id    = $fish->large_image_flipped_id;
		$purchase->save();
		
        $purchase = new Purchase;
        $purchase->email       = $email;
        $purchase->purchase    = $fish->name . ' (Full Set of Icons)';
        $purchase->amount      = 0;
        $purchase->image_id    = 0;
		$purchase->save();
		
		
        //Session::push('purchased',$image->filepath);//this does not make a difference
        
        $images = Image::where('id',$fish->small_image_id)->get();
        foreach ($images as $image);
        Userpurchase::create([
        'email'         =>$email,
        'purchase'      =>$fish->name . ' ' . $image->filename,
        'amount'        =>$second_price,
        'image_id'      =>$fish->small_image_id]
        ); 
        
        $images = Image::where('id',$fish->small_image_flipped_id)->get();
        foreach ($images as $image);
        Userpurchase::create([
        'email'         =>$email,
        'purchase'      =>$fish->name . ' ' . $image->filename,
        'amount'        =>$second_price,
        'image_id'      =>$fish->small_image_flipped_id]
        ); 
        
        $images = Image::where('id',$fish->silhouette_image_id)->get();
        foreach ($images as $image);
        Userpurchase::create([
        'email'         =>$email,
        'purchase'      =>$fish->name . ' ' . $image->filename,
        'amount'        =>$third_price,
        'image_id'      =>$fish->silhouette_image_id]
        ); 
        
        $images = Image::where('id',$fish->outline_image_id)->get();
        foreach ($images as $image);
        Userpurchase::create([
        'email'         =>$email,
        'purchase'      =>$fish->name . ' ' . $image->filename,
        'amount'        =>$fourth_price,
        'image_id'      =>$fish->outline_image_id]
        ); 
                          
        }
        Session::flash('delivered', 'Commission posted!');
        return Redirect::back();
        }
		Session::flash('delivered', 'No email selected!');
        return Redirect::back();
            
     
     }
    /**
     * Preview the Full size fish image
     *
     * @param url
     * @return view
     */
    public function getPreview($folder,$preview_url,$fish_name,$table_row_index)
    {
        //Event::fire('viewed_preview');
        //$this->setTableRowIndex($table_row_index);

        return View::make('admin.image_preview',array(
            'preview_url'=>$preview_url,
            'fish_name'=>$fish_name,

        ));
    }
    public function setRetreat($return_to)
    {
        Session::push('return_to',$return_to);

        return;
    }

    public function getRetreat()
    {
        $retreat = Session::get('return_to.0');

        return Redirect::to($retreat);
    }
    public function getContinue()
    {
        $row = Session::pull('row.0');
        $url = 'admin\fish#'.$row;

        return Redirect::to($url);
    }
}
