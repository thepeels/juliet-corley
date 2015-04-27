<?php
class FishBuilder
{
    /**
     * Large image width
     * 
     * In pixels
     * 
     * @var int
     */
    private $large_image_width = 591;
    /**
     * Small image width
     * 
     * In pixels
     * 
     * @var int
     */
    private $small_image_width = 355;
    
    /**
     * Thumb image width
     * 
     * In pixels
     * 
     * @var int 
     */
    private $thumb_image_width = 80;
    
    /**
     * X-Small image width
     * 
     * In pixels
     * 
     * @var int
     * 
     */
    private $x_small_image_width = 200;
    
    /**
     * smaller size images generated
     * 
     * mirror images generated
     * 
     * now have total of six images and a fish name
     * 
     * store the fish in the fish table 
     * 
     * save the images in the image folder
     * 
     * save the image paths or some refernce in the images table
     * 
     * return to add fish page with or without errors
     */
    
    /**
     * Build
     * 
     * @param   string  $name
     * @param   int     $base_price
     * @param   string  $large_image_path
     * @param   string  $outline_image_path
     * @param   string  $silhouette_image_path
     * @return  Fish|string
     */
     public function build(
        $name,
        $base_price,
        $large_image_path,
        $silhouette_image_path,
        $outline_image_path
     ) {
         # Check name doesn't exist
         if ($this->fish_name_exists($name))
         {
             return 'Fish name already exists';
         }
         # Create our fish object to be returned
         $fish = new Fish;
         $fish->name = ucfirst(strtolower(trim($name)));  
         $fish->base_price = $base_price;
         $genus_species = explode(" ", $fish->name);
         $fish->genus = $genus_species[0];
         $fish->species = $genus_species[1];
         # Process images
         $paths = $this->process_images($large_image_path, $silhouette_image_path, $outline_image_path);
         if ( ! $paths)
         {
             return 'One of the images wasn\'t found';
         }

         # Create our image objects to compose the fish with
         $large_image = new Image; #1.jpg
         $large_image->size = '5cm';
         $large_image->filename =  $large_image->size . 'L.jpg';
         $large_image->addImage($paths['large_image']);
         $large_image->save();
         
         # Add image id to fish to link them
         $fish->large_image_id = $large_image->id;
         
         $large_image_flipped = new Image;  #2.jpg
         $large_image_flipped->size = '5cm';
         $large_image_flipped->filename =  $large_image_flipped->size . 'R.jpg';
         $large_image_flipped->addImage($paths['large_image_flipped']);
         $large_image_flipped->save();
         $fish->large_image_flipped_id = $large_image_flipped->id;
         
         $small_image = new Image;  #3.jpg
         $small_image->size = '3cm';
         $small_image->filename =  $small_image->size . 'L.jpg';
         $small_image->addImage($paths['small_image']);
         $small_image->save();
         $fish->small_image_id = $small_image->id;
         
         $small_image_flipped = new Image; #4.jpg
         $small_image_flipped->size = '3cm';
         $small_image_flipped->filename =  $small_image_flipped->size . 'R.jpg';
         $small_image_flipped->addImage($paths['small_image_flipped']);
         $small_image_flipped->save();
         $fish->small_image_flipped_id = $small_image_flipped->id;
         
         $silhouette_image = new Image; #5.jpg
         $silhouette_image->size = '5cm';
         $silhouette_image->filename =  $silhouette_image->size . '.silhouette.jpg';
         $silhouette_image->addImage($paths['silhouette_image']);
         $silhouette_image->save();
         $fish->silhouette_image_id = $silhouette_image->id;
         
         $outline_image = new Image;    #6.jpg
         $outline_image->size = '5cm';
         $outline_image->filename =  $outline_image->size . '.outline.jpg';
         $outline_image->addImage($paths['outline_image']);
         $outline_image->save();
         $fish->outline_image_id = $outline_image->id;
         
         $image_thumb = new Image;  #7.jpg
         $image_thumb->size = '2cm';
         $image_thumb->public = TRUE;
         $image_thumb->filename =  $image_thumb->size . '.jpg';
         $image_thumb->addImage($paths['image_thumb']);
         $image_thumb->save();
         $fish->image_thumb_id = $image_thumb->id;
         
         $image_thumb_flipped = new Image;  #8.jpg
         $image_thumb_flipped->size = '2cm';
         $image_thumb_flipped->public = TRUE;
         $image_thumb_flipped->filename =  $image_thumb_flipped->size . '.jpg';
         $image_thumb_flipped->addImage($paths['image_thumb_flipped']);
         $image_thumb_flipped->save();
         $fish->image_thumb_flipped_id = $image_thumb_flipped->id;
         
         $silhouette_thumb = new Image; #9.jpg
         $silhouette_thumb->size = '2cm';
         $silhouette_thumb->public = TRUE;
         $silhouette_thumb->filename =  $silhouette_thumb->size . '.jpg';
         $silhouette_thumb->addImage($paths['silhouette_thumb']);
         $silhouette_thumb->save();
         $fish->silhouette_thumb_id = $silhouette_thumb->id;
         
         $outline_thumb = new Image;    #a.jpg
         $outline_thumb->size = '2cm';
         $outline_thumb->public = TRUE;
         $outline_thumb->filename =  $outline_thumb->size . '.jpg';
         $outline_thumb->addImage($paths['outline_thumb']);
         $outline_thumb->save();
         $fish->outline_thumb_id = $outline_thumb->id;
         
        
         $large_image_watermarked = new Image; #b.jpg
         $large_image_watermarked->size = '5cm';
         $large_image_watermarked->public = TRUE;
         $large_image_watermarked->filename =  $large_image_watermarked->size . '.jpg';
         $large_image_watermarked->addImage($paths['large_image_watermarked']);
         $large_image_watermarked->save();
         $fish->large_image_watermarked_id = $large_image_watermarked->id;
         
         
         
         // $fish->generateThumbnails();
         
         # Call save method to persist the in memory object to the database row
         $fish->save();

         return $fish;
     }
    /**
     * Fish Name Exists
     * 
     * @param   string  $name
     * @return  bool
     */
    private function fish_name_exists($name)
    {
        return (bool) Fish::where('name', '=', $name)->first();
    }

    /**
     * Process Images
     * 
     * @param   string  $large_image_path
     * @param   string  $outline_image_path
     * @param   string  $silhouette_image_path
     * @return  string[]|FALSE      array of paths to temp images
     */
     private function process_images($large_image_path, $silhouette_image_path, $outline_image_path)
     {
         try
         {
             $paths = array(
                'large_image'          => $this->process_image($large_image_path,       '1.jpg', $this->large_image_width),
                'large_image_flipped'  => $this->process_image($large_image_path,       '2.jpg', $this->large_image_width, TRUE),
                'small_image'          => $this->process_image($large_image_path,       '3.jpg', $this->small_image_width),
                'small_image_flipped'  => $this->process_image($large_image_path,       '4.jpg', $this->small_image_width, TRUE),
                'silhouette_image'     => $this->process_image($silhouette_image_path,  '5.jpg', $this->large_image_width),
                'outline_image'        => $this->process_image($outline_image_path,     '6.jpg', $this->large_image_width),
                'image_thumb'          => $this->process_image($large_image_path,       '7.jpg', $this->thumb_image_width, FALSE, TRUE),
                'image_thumb_flipped'  => $this->process_image($large_image_path,       '8.jpg', $this->thumb_image_width, TRUE, TRUE),
                'silhouette_thumb'     => $this->process_image($silhouette_image_path,  '9.jpg', $this->thumb_image_width, FALSE, TRUE),
                'outline_thumb'        => $this->process_image($outline_image_path,     'a.jpg', $this->thumb_image_width, FALSE, TRUE),
            'large_image_watermarked'  => $this->process_image($large_image_path,       'b.jpg', $this->large_image_width, FALSE, FALSE, TRUE),
                                
             );
         }
         catch (InvalidArgumentException $exception)
         {
             return FALSE;
         }
         
         return $paths;
     }
     
    /**
     * Process Image
     * 
     * @param   string  $image_path
     * @param   string  $dest_filename
     * @param   int     $width
     * @param   bool    $flipped
     * @param   bool    $pixelated
     * @return  string  path to temp image
     */
    private function process_image(
        $image_path, 
        $dest_filename, 
        $width, 
        $flipped=FALSE, 
        //$pixelated=FALSE, 
        $copyrighted=FALSE,
        $big_copyrighted=FALSE
        )
    {
        # Check image exists
        if ( ! file_exists($image_path))
        {
            throw new \InvalidArgumentException();
        }
        
        # Resize image
        $img = ImageManip::make($image_path)->resize($width, null, function ($constraint) 
        {
            $constraint->aspectRatio();
            //$constraint->upsize();
        });
        
        if ($flipped)
        {
            $img->flip();
        }
        
        /*if ($pixelated)
        {
            $img->pixelate(2);
        }*/
        
        if ($copyrighted)
        {
            $img->insert(public_path().'/images/watermark.png', 'bottom-left', 0, 5);
        }
        if ($big_copyrighted)
        {
            $img->insert(public_path().'/images/bigwatermark.png', 'bottom-left', 10, 0);
        }
        # Encode as jpg so all images are in same format, irrespective of
        # the input format
        $img->encode('jpg', 100);

        # Save and return
        $temp_path = storage_path() 
            . DIRECTORY_SEPARATOR . 'temp' 
            . DIRECTORY_SEPARATOR . $dest_filename;
        $img->save($temp_path, 100);
        
        return $temp_path;
    } 
}
