<?php
/**
 * Test Controller
 * 
 * This controller is just to illustrate the functionality of Image objects.
 * 
 * */
class TestController extends Controller
{
    /**
     * Temp Image Path
     * 
     * This is just a helper method to return an image for us to create
     * our Image objects from in all the other methods in this controller.
     * 
     * @var    none
     * @return string
     */
    private function get_temp_image_path()
    {
        return storage_path() . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR . '1.jpg';
    }
     
    /**
     * Create And Download
     * 
     * Create an image and download it
     * 
     */
    public function getCreateAndDownload()
    {
        # Create a new private image, by default images are private 
        # and stored in the storage folder
        $image = new Image;
        $image->filename = 'My new private image';
        $image->addImage($this->get_temp_image_path());
        
        return $image->download();
    }
     
    /**
     * Create And View
     * 
     * Create an image and view it inline in the browser
     * 
     */
    public function getCreateAndView()
    {
        # Create a new private image, by default images are private 
        # and stored in the storage folder
        $image = new Image;
        $image->filename = 'My new private image';
        $image->addImage($this->get_temp_image_path());
        
        return $image->view();
    }

    /**
     * Private Url
     * 
     * Create a private image and try to get the URL - this should
     * throw an exception telling us we cannot get the URL for a 
     * private image, since these are stored in the storage folder
     * which is not accessible via HTTP - this is what we mean
     * when we talk about private and public. Privtae means it can
     * only be accessed by the server (i.e. inside the PHP), not
     * directly via HTTP. 
     * 
     */
    public function getPrivateUrl()
    {
        # Create a new private image, by default images are private 
        # and stored in the storage folder
        $image = new Image;
        $image->filename = 'My new private image';
        $image->addImage($this->get_temp_image_path());
        
        return $image->image_url;
    }

    /**
     * Public URL
     * 
     * Create a public image and echo the image_url atrribute.
     * 
     */
    public function getPublicUrl()
    {
        # Create a new private image, by default images are private 
        # and stored in the storage folder
        $image = new Image;
        $image->filename = 'My new private image';
        $image->public = TRUE;
        $image->addImage($this->get_temp_image_path());
        
        $html = $image->image_url . '<br>';
        $html .= '<img src="' . $image->image_url . '">';
        
        return $html;
    }
    
    public function getIndex()
    {
        $purchases = UserPurchase::where('email','john@jjc.me')->get();
        
        return View::make('test',compact('purchases'));
    }
}
