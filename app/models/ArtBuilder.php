<?php
class ArtBuilder
{
    /**
     * Art Image width 
     * in pixels
     * 
     * @var int
     */
    protected $full_size_image_width = 0;
    
    /**
     * Small image width
     * in pixels
     * @var int
     */
    private $small_size_image_width = 500;
    
    /**
     * Thumb image width
     * in pixels
     * @var int
     */
    private $thumbnail_image_width =100;
    
    /**
     * Build
     * @param string $name
     * @param int $price
     * @param string $art_image_path
     * @param string $description
     * @param string $category
     * @return Art/string
     */
     public function build(
        $name,
        $price,
        $art_image_path,
        $description,
        $category
     )  {
         //check name not exists
         if($this->art_name_exists($name))
         {
             return 'Art image name already exists';
         }
         // ok so get creating art
         $art = new Art;
         $art->name = ucfirst(strtolower(trim($name)));
         $art->price = $price;
         $art->description = $description;
         $art->category = $category;
          # Process images
         $paths = $this->process_images($art_image_path);
         if(! $paths)
         {
             return 'The art image not found';
         }
         $full_size_image = new Image;
         $full_size_image->size = '.full.';
         $full_size_image->filename = $full_size_image->size . 'jpg';
         $full_size_image->addImage($paths['full_size_image']);
         $full_size_image->save();
         $art->full_size_image_id = $full_size_image->id;
         
         $small_size_image = new Image;
         $small_size_image->size = '.small.';
         $small_size_image->filename = $small_size_image->size . 'jpg';
         $small_size_image->addImage($paths['small_size_image']);
         $small_size_image->save();
         $art->small_size_image_id = $small_size_image->id;
         
         $thumbnail = new Image;
         $thumbnail->size = '.thumb.';
         $thumbnail->public = TRUE;
         $thumbnail->filename = $thumbnail->size . 'jpg';
         $thumbnail->addImage($paths['thumbnail']);
         $thumbnail->save();
         $art->thumbnail_id = $thumbnail->id;
         
         $art->save();
         //var_dump($art);
         return $art;
     }

        /**
     * Art Name Exists
     * 
     * @param   string  $name
     * @return  bool
     */
    private function art_name_exists($name)
    {
        return (bool) Art::where('name', '=', $name)->first();
    }
    
    /**
     * Process Images
     * 
     * @param string $art_image_path
     * @return string[]|FALSE array of paths to temp images
     * 
     */
     private function process_images($art_image_path)
     {
         try
         {
             $paths = array(
             'full_size_image'  =>$this->process_image($art_image_path,     '1.jpg', $this->full_size_image_width, FALSE, FALSE),
             'small_size_image' =>$this->process_image($art_image_path,     '2.jpg', $this->small_size_image_width, FALSE, FALSE),
             'thumbnail'        =>$this->process_image($art_image_path,     '3.jpg', $this->thumbnail_image_width, FALSE, TRUE),
             );
         }
         catch (InvalidArgumentException $exception)
         {
             return FALSE;
         }
          return $paths;
     }
     
     /**
      * Process image
      * @param string $image-path
      * @param string $dest_filename
      * @param int width
      * @param bool $pixelated
      * @return string path to temp image
      */
      private function process_image(
            $image_path,
            $dest_filename,
            $width,
            $pixelated=FALSE, 
            $copyrighted=FALSE)
      {
          //check image exists
          if(! file_exists($image_path))
          {
              throw new \InvalidArgumentException();
          }
          if ($width == 0)
          {
              $width = ImageManip::make($image_path)->width();//gets original image width
          }
          
               
          $img = ImageManip::make($image_path)->resize($width, NULL, function ($constraint)
          {
               $constraint->aspectratio();
          });
               
          
          if ($pixelated)
          {
              $img->pixelate(2);
          }
          if($copyrighted)
          {
              $img->insert(public_path().'/images/watermark.png', 'bottom-left', 5,20);
          }
          $img->encode('jpg',85);
          $temp_path = storage_path()
            . DIRECTORY_SEPARATOR . 'temp'
            . DIRECTORY_SEPARATOR . $dest_filename;
          $img->save($temp_path, 85);
          
          return $temp_path;
      }
}

