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
            <th>Date</th>
        </tr>
        <? foreach ($purchases as $row) : ?>
            <? $number = Purchase::where('purchase',$row->purchase)->count();?>
        
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
                    <?=$row->created_at?>
                </td>
        
        <? endforeach; ?>

    </table>
    {{$purchases->links()}}
@stop
@section('footer')  
    
@stop
