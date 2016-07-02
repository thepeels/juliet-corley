@extends('admin.layout')
@section('title')
<title>Page Loads</title>
@stop
@section('content')

  
            <? 	
             	$cartview = Pageload::where('cartview',1)->where('amount_in_cart','<',200)->count();
             	$cartview_plus = Pageload::where('cartview',1)->where('amount_in_cart','>=',200)->count();
             	$addtocart = Pageload::where('addtocart',1)->where('amount_in_cart','<',2000)->count();
             	$addtocart_plus = Pageload::where('addtocart',1)->where('amount_in_cart','>=',2000)->count();
             	$pdf = Pageload::where('pdf','>',0)->get();
                $preview = Pageload::where('preview','>',0)->get();
            ?>
    <table class="text-table">
        <caption>
            
    <h4>Pageloads </h4>
    {{--$purchases->links()--}}
        </caption>
        <tr>
            <th>View</th>
            <th>Number of views</th>
            
        </tr>
        
        
            <tr>
				<td>
					Cart View <$2
				</td>
                <td>
                    <?=$cartview?>
                </td>
        	</tr>
            <tr>
				<td>
					Cart View >$2
				</td>
                <td>
                    <?=$cartview_plus?>
                </td>
        	</tr>
            <tr>
				<td>
					Fish Icon Clicks 
				</td>
                <td>
                    <?=$addtocart?>
                </td>
        	</tr>
        	@foreach ($pdf as $pdf)
            <tr>
                <td>
                    Free PDFs
                </td>
                <td>
                    <?=$pdf->pdf?>
                </td>
            </tr>
            @endforeach
            @foreach($preview as $preview)
            <tr>
                <td>
                    Fish Previews
                </td>
                <td>
                <?=$preview->preview?>
                </td>
            </tr>
            @endforeach


    </table>
    <p></br> "Cart View" represents colouring page items added to the cart and then someone clicking to view the cart.
    	</br>Currently they are sent to the login page.</br>
    	Fish Icon Clicks is literally that, someons has clicked on a fish icon, which prompts them to login first.</br> 
    	Free PDFs are those on the colouring page and this should pick up and count the downloads.</br> (available elsewhere but summarised here)
    	</br> Love Johnny </p>
@stop
@section('footer')  
    
@stop
