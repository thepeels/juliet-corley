@extends('admin.layout')
@section('title')
<title>Purchases</title>
@stop
@section('content')

<?php
#$email = Input::get('email');

#$purchases = adminshowpurchases($email);


?>    
    <h4><a href="../authornotes" class="btn btn-primary">Select different Author</a></h4>
    <table class="text-table">
        <caption>
            
        <?echo('<h4>Notes by '.(isset($author)?$author:'nothing here').'</h4>');?>
        </caption>
        <tr>
            <th>Author</th>
            <th>Note</th>
            <th>Aliases</th>
            <th>E-mail</th>
        </tr>
        <? foreach ($notes as $row) :
	        ?>
	        <tr>
                <td>
                    <?=$author?>
                </td>
                <td>
                    <?=$row->note?>
                </td>
                <td>
                    <?=$row->alias?>
                </td>
                <td>
                    <?=$email?>
                </td>
                
            </tr>
        
        <? endforeach; ?>

    </table>
    {{--$purchases->links()--}}
@stop
