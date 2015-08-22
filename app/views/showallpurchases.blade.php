@extends('admin.layout')
@section('title')
<title>All Purchases</title>
@stop
@section('content')

  
    <table class="text-table">
        <caption>
            
    <h4>Image Downloads and Sales </h4>
        </caption>
        <tr>
            <th>X Times</th>
            <th>Purchase</th>
            <th>Amount</th>
            <th>Total</th>
            <th>First Sale</th>
            <th>Most Recent Sale</th>
        </tr>
        <? foreach ($purchases as $row) : ?>
            <? 	$number = Purchase::where('purchase',$row->purchase)->count();
            	$total_amount 	= Purchase::where('purchase',$row->purchase)->sum('amount');
            	$first_entry 	= Purchase::where('purchase',$row->purchase)->orderBy('created_at','ASC')->first();
            	$last_entry 	= Purchase::where('purchase',$row->purchase)->orderBy('created_at','DESC')->first();
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
                    <?=date_format($first_entry->created_at,'Y-M-d')?>
                </td>
                <td>
                    <?=date_format($last_entry->created_at,'Y-M-d g:ia')?>
                </td>
        	</tr>
        <? endforeach; ?>

    </table>
    {{$purchases->links()}}
@stop
@section('footer')  
    
@stop
