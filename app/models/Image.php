<?php
class Image extends Eloquent
{
    /**
     * Subfolder
     * 
     * This is the subfolder inside the private (storage) or public folder where
     * all images will be stored.
     * 
     * @var string
     */
    private $subfolder = 'images';

    /**
     * Fillable Attributes
     * 
     * These are the editable attributes for Image objects.
     * 
     * @var string[]
     */
    protected $fillable = array(
        'filename',
        'size',
        'public'
    );
    
    /**
     * Private Attributes
     * 
     * These are attributes that are only available inside this object
     * 
     * @var string[]
     */
    protected $private = array(
        'storage_filename',
    );
    
    
    /**
     * Default Attributes
     * 
     * These are the default attributes, so for example
     * the image type defaults to 'jpg'.
     * 
     * @var string[]
     */
    protected $attributes = array(
    );

    /**
     * Folder
     * 
     * @param   none
     * @return  string
     */
    public function getFolderAttribute()
    {
        $base_path = $this->public ? public_path() : storage_path();
        
        return $base_path . DIRECTORY_SEPARATOR . $this->subfolder;
    }

    /**
     * Image Path
     * 
     * Returns the full filesystem path to the image, regardless of
     * whether the image is stored in storage or public.
     * 
     * If you want the URL of a public image then see getImageUrlAttribute()
     * 
     * @param   none
     * @return  string
     */
    public function getImagePathAttribute() //attribute drops off the end of this name
    {
        return $this->folder . DIRECTORY_SEPARATOR . $this->storage_filename;
    }

    /**
     * Image URL
     * 
     * Returns the URL of a public image, or throw an exception if
     * the image is private.
     * 
     * @param   none
     * @return  string
     */
    public function getImageUrlAttribute() //attribute drops off the end of this name
    {
        if ( ! $this->public)
        {
            throw new Exception('Cannot provide a URL for a private image');
        }
        
        return '/' . $this->subfolder . '/' . $this->storage_filename;
    }
	
    public function getFreeImageUrlAttribute() //attribute drops off the end of this name
    {
        return '/' . $this->storage_filename;
    }
	
	

    /**
     * Add Image
     * 
     * @var    string     $path
     * @return void
     * 
     */
    public function addImage($path)
    {
        if ( ! file_exists($path))
        {
            throw new Exception("Must specify valid path to image");
        }
        
        # Delete the old file if one exists
        if (file_exists($this->image_path) && ! is_dir($this->image_path))
        {
            unlink($this->image_path);
        }
        
        # Copy the image to the storage folder with a unique filename
        $this->storage_filename = uniqid('',TRUE) . '.jpg';
        copy($path, $this->image_path);
        
    }
    /**
     * Add Pdf(Image)
     * 
     * @var    string     $path
     * @return void
     * 
     */
    public function addPdf($path)
	
    {#dd($path);
        if ( ! file_exists($path))
        {
            throw new Exception("Must specify valid path to pdf file");
        }
        #dd($path);
        # Delete the old file if one exists
        if (file_exists($this->image_path) && ! is_dir($this->image_path))
        {
            unlink($this->image_path);
        }
        
        # Copy the pdf to the storage folder with a unique filename if paid for item
        if(! $this->public)
		{
	        $this->storage_filename = uniqid('',TRUE) . '.pdf';
	        copy($path, $this->image_path);
		}
		if( $this->public)
		{
			$this->storage_filename = uniqid('',TRUE) . '.pdf';
			copy($path, $this->image_path);
		}
        # Copy the pdf to the public folder with a original filename if free item
        #$this->storage_filename = uniqid('',TRUE) . '.jpg';
        #copy($path, $this->image_path);
        
    }
	public static function freeFile($path)
	{
		if ( ! file_exists($path))
        {
            throw new Exception("Must specify valid path to pdf file");
        }
		$pdfname = pathinfo($path, PATHINFO_BASENAME);
		return $pdfname;
	}
    
    /**
     * Download
     * 
     * Returns the response object that needs to be returned by the 
     * controller method to download the image. If you want to
     * display rather than download the image, either use view()
     * or if the image is public then you can simply use $this->image_url
     * to get the url to the image to be used inside <img src=''>
     * 
     * @param  string   $filename_prefix    (optional) string to prepend to the filename
     * @return Response
     * 
     */
    public function download($filename_prefix='')
    {
        $filename = $filename_prefix . $this->filename;
        $response = Response::download($this->image_path, $filename);
        ob_end_clean();
        
        return $response;
    }

    /**
     * View
     * 
     * Returns the response object that needs to be returned by the 
     * controller method to view an image in the browser
     * 
     * @param  none
     * @return Response
     * 
     */
    public function view($filename_prefix='')
    {
        $image = ImageManip::make($this->image_path);
        $response = $image->response();
        ob_end_clean();
        
        return $response;
    }

    /**
     * Delete
     * 
     * This method deletes the image file from the filesystem
     * before calling the parent delete method so that Eloquent
     * can delete the database row.
     * 
     * @param   none
     * @return  bool
     */
    public function delete()
    {
        if (is_file($this->image_path))
        {
            unlink($this->image_path);
        }
        
        return parent::delete();
    }
}