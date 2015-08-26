@extends('admin.layout')
@section('title')
<title>Purchases</title>
@stop
@section('content')

<?php
#$email = Input::get('email');

#$purchases = adminshowpurchases($email);


?>    
    <h4><a href="../back" class="btn btn-primary">Select different User</a></h4>
    <table class="text-table">
        <caption>
            
        <?echo('<h4>Purchases by '.(isset($email)?$email:'nothing here').'</h4>');?>
        </caption>
        <tr>
            <th>ID</th>
            <th>E-Mail</th>
            <th>Purchase</th>
            <th>Amount</th>
            <th>Date</th>
        </tr>
        <? foreach ($purchases as $row) :
		$date = new DateTime($row->created_at,new DateTimeZone('Europe/London'));
		$date->setTimeZone(new DateTimeZone('Australia/Brisbane'));
		 
        ?>            <tr>
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
                    <?=date_format($date,'Y-M-d g:ia');?>
                </td>
            </tr>
        
        <? endforeach; ?>

    </table>
    {{--$purchases->links()--}}
@stop
@section('footer')  
    <!--<h4><a href="../back" class="btn btn-primary">Select different User</a></h4>-->
@stop
