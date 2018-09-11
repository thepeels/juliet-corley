<?php
/**
 * Created by PhpStorm.automatic title section
 * User: John
 * Date: 01/07/2016
 * Time: 23:07
 */

Event::listen('has_addedtocart',function()
{
    if(strpos($_SERVER['HTTP_USER_AGENT'],'bot')===FALSE) {
        $pageload = new Pageload;
        $pageload->addtocart = 1;
        $pageload->amount_in_cart = \Cart::total();
        $pageload->client_ip = Request::getClientIp();
        $pageload->save();
    }
});
Event::listen('cartclick', function()
{
    if(strpos($_SERVER['HTTP_USER_AGENT'],'bot')===FALSE)
    {
        $pageload = new Pageload;
        $pageload->cartview = 1;
        $pageload->amount_in_cart = \Cart::total();
        $pageload->client_ip = Request::getClientIp();
        $pageload->save();
    }
});
Event::listen('has_downloaded_pdf',function()
{
    if(strpos($_SERVER['HTTP_USER_AGENT'],'bot')===FALSE) {
        $pageload = new Pageload;
        $pdf = Pageload::where('pdf', '>', 0)->get();
        foreach ($pdf as $pdf) ;
        $pdf_count = $pdf->pdf + 1;
        $pdf->delete();
        $pageload->pdf = $pdf_count;
        $pageload->save();
    }
});
Event::listen('viewed_preview',function()
{
    if(strpos($_SERVER['HTTP_USER_AGENT'],'bot')===FALSE)
    {
        $pageload = new Pageload;
        $preview = Pageload::where('preview','>',0)->get();
        foreach($preview as $preview);
        $preview_count = $preview->preview+1;
        $preview->delete();
        $pageload->preview = $preview_count;
        $pageload->save();
    }
});
Event::listen('downloaded_free_icon',function()
{
    if(strpos($_SERVER['HTTP_USER_AGENT'],'bot')===FALSE)
    {
        $pageload = new Pageload;
        $preview = Pageload::where('free_icon','>',0)->get();
        foreach($preview as $preview);
        $preview_count = $preview->free_icon+1;
        $preview->delete();
        $pageload->free_icon = $preview_count;
        $pageload->save();
    }
});