<?php
class ProductBuilder
{
    /**
     * Large image width
     * 
     * In pixels
     * 
     * @var int
     */
    private $full_size_image_width = 591; //does this cause large file failure?
    /**
     * Small image width
     * 
     * In pixels
     * 
     * @var int
     */
    private $small_size_image_width = 270;
    
    /**
     * Thumb image width
     * 
     * In pixels
     * 
     * @var int 
     */
    private $thumbnail_image_width = 80;
	/**
	 * Build
	 * @param string 	$name
	 * @param int 		$price
	 * @param string	$title
	 * @param string	$subtitle
	 * @param string	$description_1
	 * @param string	$description_2
	 * @param string	$description_3
	 * @param string	$description_4
	 * @param string	$product_type
	 * @param string	$product_sub_type
	 */
public function build(
		$name,
		$price,
		$title,
		$subtitle,
		$description_1,
		$description_2,
		$description_3,
		$description_4,
		$product_type,
		$product_sub_type,
		$page_order,
		$image_path
	){
		if ($this->product_name_exists($name))
		{
			return 'Product name already exists';
		}
		//Create new product object to be returned
		$product = new Product;
		$product->name 			= ltrim($name);
		$product->price			= $price*100;//price in cents for stripe
		$product->title			= $title;
		$product->subtitle		= $subtitle;
		$product->description_1	= $description_1;
		$product->description_2	= $description_2;
		$product->description_3	= $description_3;
		$product->description_4	= $description_4;
		$product->product_type		= $product_type;
		$product->product_sub_type 	= $product_sub_type;
		$product->page_order	= $page_order;
		$paths = $this->process_images($image_path);
		if (!$paths)
		{
			return 'Image file missing';
		}
		
		$full_size_image			= new Image;
		$full_size_image->filename 	= 'full.jpg';
		$full_size_image->public	= TRUE;
		$full_size_image->addImage($paths['full_size_image']);
		$full_size_image->save();
		$product->full_size_image_id 	= $full_size_image->id;
		
		$small_size_image			= new Image;
		$small_size_image->filename = 'small.jpg';
		$small_size_image->public	= TRUE;
		$small_size_image->addImage($paths['small_size_image']);
		$small_size_image->save();
		$product->small_size_image_id = $small_size_image->id;
		
		$thumbnail_image			= new Image;
		$thumbnail_image->filename 	= 'thumb.jpg';
		$thumbnail_image->public	= TRUE;
		$thumbnail_image->addImage($paths['thumbnail_image']);
		$thumbnail_image->save();
		$product->thumbnail_image_id 	= $thumbnail_image->id;
		
		$product->save();
		
		return $product;
	}
	/**
	 * Product Name Exists
	 * 
	 * @param string $name
	 * @return bool
	 */
	private function product_name_exists($name)
	{
		return (bool) Product::where('name', '=', $name) ->first();
	}
	/**
	 * Process images
	 * 
	 * @param string $image_path
	 * @return string[]/FALSE path to temp image
	 * */
private function process_images($image_path)	
	{
		try
		{
			$paths = [
				'full_size_image'	=> $this->process_image($image_path,'1.jpg',$this->full_size_image_width),
				'small_size_image'	=> $this->process_image($image_path,'2.jpg',$this->small_size_image_width),
				'thumbnail_image'	=> $this->process_image($image_path,'3.jpg',$this->thumbnail_image_width),
			];
		}
		catch (InvalidArgumentException $exception)
     	{
        return FALSE;
    	}
	 	return $paths;
	}
private function process_image(
		$image_path,
		$dest_filename,
		$width,
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
            $constraint->upsize();
        });
		if ($big_copyrighted)
        {
            $img->insert(public_path().'/images/bigwatermark.png', 'bottom-left', 10, 0);
        }
		$img->encode('jpg', 100);
		 # Save and return
        $temp_path = storage_path() //was storage but need larger image
            . DIRECTORY_SEPARATOR . 'temp' 
            . DIRECTORY_SEPARATOR . $dest_filename;
        $img->save($temp_path, 100);
        
        return $temp_path;
	}
}
