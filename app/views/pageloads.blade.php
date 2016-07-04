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
                $free_icon = Pageload::where('free_icon','>',0)->get();

            ?>
    <table class="text-table">
        <caption>
            
    <h4>Pageloads </h4>
            <p>These have been reset on 4th July after checking that the vast majority
            of hits were from search engine bots.<br>
            I have now excluded these from the counters.</p>
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
                    <?=$pdf->pdf-1?>
                </td>
            </tr>
            @endforeach
            @foreach($preview as $preview)
            <tr>
                <td>
                    Fish Previews
                </td>
                <td>
                <?=$preview->preview-1?>
                </td>
            </tr>
            @endforeach
            @foreach($free_icon as $free_icon)
            <tr>
                <td>
                    Free Icons
                </td>
                <td>
                <?=$free_icon->free_icon-1?>
                </td>
            </tr>
            @endforeach


    </table>
    <p><br> "Cart View" increments when someone clicks to view the cart.<br>
    	Fish Icon Clicks is literally that, someone has clicked on a fish icon.<br>
    	Free PDFs are those on the colouring page and this should pick up and count the downloads.<br>
        Fish previews is the link on the Fish name which opens the preview.<br>
        Added Free Icon count (excluding bots).
        Love Johnny </p>
@stop
@section('footer')  
    
@stop
