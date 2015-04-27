<?php

namespace Admin;

class IndexController extends \BaseController
{
    /**
     * Login
     * 
     */
    public function getLogin()
    {
        return \View::make('session.create');
    }

    /**
     * 
     * Index
     *
     */ 
     
     public function getIndex()
     {
         return \View::make('admin.add_fish');
     }
     
     public function getPrices()
     {
         return \View::make('admin.set_prices');
     }
    /**
     * Bootstrap
     * 
     */
    public function getBootstrap()
    {
        return \View::make('admin.boostrap');
    }
    
    public function getUser()
    {
        $users = User::all();  //paginate(6);
        
        return \View::make('pages.users', array(
            'table_row' => $users
        ));
    }
    
}
