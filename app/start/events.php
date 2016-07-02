<?php
/**
 * Created by PhpStorm.autpmatic title section
 * User: John
 * Date: 01/07/2016
 * Time: 23:07
 */
Event::listen('has_addedtocart',function()
{
    $pageload = new Pageload;
    $pageload->addtocart = 1;
    $pageload->amount_in_cart = \Cart::total();
    $pageload->client_ip = Request::getClientIp();
    $pageload->save();
});
Event::listen('cartclick', function()
{
    $pageload = new Pageload;
    $pageload->cartview = 1;
    $pageload->amount_in_cart = \Cart::total();
    $pageload->client_ip = Request::getClientIp();
    $pageload->save();
});
Event::listen('has_downloaded_pdf',function()
{
    $pageload = new Pageload;
    $pdf = Pageload::where('pdf','>',0)->get();
    foreach($pdf as $pdf);
    $pdf_count = $pdf->pdf+1;
    $pdf->delete();
    $pageload->pdf = $pdf_count;
    $pageload->save();
});
Event::listen('viewed_preview',function()
{
    $pageload = new Pageload;
    $preview = Pageload::where('preview','>',0)->get();
    foreach($preview as $preview);
    $preview_count = $preview->preview+1;
    $preview->delete();
    $pageload->preview = $preview_count;
    $pageload->save();
});