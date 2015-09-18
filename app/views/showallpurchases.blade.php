@extends('admin.layout')
@section('title')
<title>All Purchases</title>
@stop
@section('content')

  
    <table class="text-table">
        <caption>
            
    <h4>Image Downloads and Sales </h4>
    {{$purchases->links()}}
        </caption>
        <tr>
            <th>X Times</th>
            <th>Purchase</th>
            <th>Amount</th>
            <th>Total</th>
            <th>First Sale</th>
            <th>Most Recent Sale</th>
            <th>Sold to:</th>
        </tr>
        <? foreach ($purchases as $row) : ?>
            <? 	$number = Purchase::where('purchase',$row->purchase)->count();
            	$total_amount 	= Purchase::where('purchase',$row->purchase)->sum('amount');
            	$first_entry 	= Purchase::where('purchase',$row->purchase)->orderBy('created_at','ASC')->first();
            	$last_entry 	= Purchase::where('purchase',$row->purchase)->orderBy('created_at','DESC')->first();
				$first_date = new DateTime($first_entry->created_at,new DateTimeZone('Europe/London'));
				$first_date->setTimeZone(new DateTimeZone('Australia/Brisbane'));
				$last_date = new DateTime($last_entry->created_at,new DateTimeZone('Europe/London'));
				$last_date->setTimeZone(new DateTimeZone('Australia/Brisbane'));
            ?>
        
            <tr>
                
				<td>
					<?=$number?>
				</td>
                <td>
                    <?=$row->purchase?>
                </td>
                <td>
                    <?='$'.number_format($row->amount/100,2,'.','')?>
                </td>
                <td>
                    <?='$'.number_format($total_amount/100,2,'.','')?>
                </td>
                <td>
                    <?=date_format($first_date,'Y-M-d')?>
                </td>
                <td>
                    <?=date_format($last_date,'Y-M-d g:ia')?>
                </td>
                <td>
                	<?=$last_entry->email?>
                </td>
        	</tr>
        <? endforeach; ?>

    </table>
@stop
@section('footer')  
    
@stop
