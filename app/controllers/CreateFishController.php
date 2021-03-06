<?php

class CreateFishController extends BaseController
{
    public function getIndex()
    {
        try
        {
            $builder = new FishBuilder();
            $builder->build('Some name');
        } catch (DuplicateUniqueKeyException $e) {
            # Redirect the user with some error message
        }
    }
    
    public function getCraft()
    {
        try
        {
            $builder = new CraftBuilder();
            $builder->build('Some name');
        } catch (DuplicateUniqueKeyException $e) {
            # Redirect the user with some error message
        }
    }
}
