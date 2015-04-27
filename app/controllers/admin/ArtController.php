<?php

namespace Admin;

class ArtController extends \BaseController
{
    /**
     * Get Index
     */
    public function getIndex()
    {
        $art = \Art::withImages()->orderBy('name')->get();
        return \View::make('admin.art_table', array(
            'art' => $art
        ));
    }
     public function getGallery()
    {
            return \Carthelper::artdisplay();
    }
    /**
     * Get Delete
     * 
     * @param   int     $artId
     */
    public function getDelete($artId)
    {
        $art = \Art::where('id', $artId)->first();
        $art->delete();
        
        return \Redirect::to('admin/art');
    }
    
    /**
     * Get Add
     * 
     * @param  none
     * @return string
     */
     public function getAdd()
     {
        return \View::make('admin.add_art');
     }

    /**
     * Add
     * 
     * This builds a new art
     * 
     * @param  none
     * @return string
     */
     public function postAdd()
     {
        $input = \Input::all();
        $builder = new \ArtBuilder;
        $art = $builder->build(
            $input['name'], 
            $input['price']*100, 
            $input['image'], 
            $input['description'], 
            $input['category']
        );
        
        return \Redirect::to('admin/art');
     }

    /**
     * Get Edit
     * 
     * This loads edit art form
     * 
     * @param  none
     * @return string
     */
     public function getEdit()
     {
        return \View::make('editart');
     }
 

    /**
     * Download
     * 
     * @param  none
     * @return string
     */
    public function getDownload($name, $type)
    {
        $art = Art::withImages()->where('name', $name)->first();
        $response = $art->$type->download();
        
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
         //$art = Art::find(1);
         $art = Art::orderBy('created_at','asc')->first();
         
         
         
         $large_image = new Image(array(
            'display_name' => $art->name . ' full',
            'filename' => $art->id,
            'size' => 'full',
            'type' => 'jpg'
         ));
         $large_image->save();
         
         $art->full_size_image_id = $large_image->id;
         $art->save();
         
         $large_image = new Image(array(
            'display_name' => $art->name . ' small',
            'filename' => $art->id,
            'size' => 'small',
            'type' => 'jpg'
         ));
         $large_image->save();
         
         $art->small_size_image_id = $large_image->id;
         $art->save();
         
         $large_image = new Image(array(
            'display_name' => $art->name . ' thumb',
            'filename' => $art->id,
            'size' => 'thumb',
            'type' => 'jpg'
         ));
         $large_image->save();
         
         $art->thumbnail_id = $large_image->id;
         $art->save();
         
         return Redirect::to('art/add');
     }

    /**
     * Image
     * 
     * @param  none
     * @return string
     */
     public function getImage()
     {
         $art = Art::with('small_size_image')->get();
         
         $art->each(function($art)
         {
             echo '<img src="' . $art->small_size_image['image_path'] . '">';
             
         });
         
         $art = Art::find(1);
         $image = $art->small_size_image;
         #$image = $fish->small_image()->first();
         
         print_r($image);
     }
     
     public function getStore()
     {
         
     }
     
     private $rules = array
     (
            'name' => 'required',
            'price' => 'required',
     );
     
           // 'main-image' => 'required',
           // 'outline-image' => 'required',   
           // 'silhouette-image' => 'required',
     
     public function postValidateaddart()
     {
         $input = Input::get();
         
         $validator = Validator::make($input, $this->$rules);
         
         if ($validator->fails()) 
         {
             $messages = $validator->messages();
             return Redirect::to('art/add')
                ->withErrors($validator);
         } else {
             return Redirect::to('/art/create');
         }
     }
}
