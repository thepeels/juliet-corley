@extends('admin.layout')
@section('title')
<title>Purchases</title>
@stop
@section('content')

<?php
$email = Input::get('email');

$purchases = adminshowpurchases($email);
?>    
    <table class="text-table">
        <caption>
            
        <?echo('<h4>Summary for '.(isset($email)?$email:'nothing here').'</h4>');?>
    <h4><a href="../back" class="btn btn-primary">Select different User</a></h4>
        </caption>
        <tr>
            <th>ID</th>
            <th>E-Mail</th>
            <th>Purchase</th>
            <th>Amount</th>
            <th>Date</th>
        </tr>
        <? foreach ($purchases as $row) : ?>
        
            <tr>
                <td>
                    <?=$row->id?>
                </td>
                <td>
                    <?=$row->email?>
                </td>
                <td>
                    <?=$row->purchase?>
                </td>
                <td>
                    <?='$'.number_format($row->amount/100,2,'.','')?>
                </td>
                <td>
                    <?=$row->created_at?>
                </td>
            </tr>
        
        <? endforeach; ?>

    </table>
@stop
@section('footer')  
    <h4><a href="../back" class="btn btn-primary">Select different User</a></h4>
@stop
