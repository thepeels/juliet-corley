
<h1>Select your download:</h1>

<table class="table table-bordered">
@foreach ($downloads as $download)
    <tr>
        <td>{{ $download->name }}</td>
        <td>&dollar;{{ round($download->price/100) }}</td>
        <td><a href="/icon/addtocart/{{ $download->id }}" class="btn btn-primary">Buy</a></td>
    </tr>
@endforeach
</table>
<h2><a href="/icon/dumpcart">Empty Cart</a></h2>

<p>
	Your Cart
	<table>
		<th>
			<tr>
				<td>Image</td>
				<td>Price</td>
				<td>No.</td>
				<td>RowId</td>
			</tr>
		</th>
		@foreach ($content as $row)
		<tr>
			<td>{{$row->name}}</td>
			<td>&dollar;{{$row->price/100}}</td>
			<td>{{$row->qty}}</td>
			<td style="display:none">{{$row->rowid}}</td>
			<td><a href="/icon/dumprow/{{$row->rowid}}">Remove</a></td>
		</tr>
		@endforeach
		<tr>
			<td style ="text-align:right">Cart Total</td>
			<td>&dollar;{{Cart::total()/100}}</td>
			<td>{{Cart::count()}}</td>
			
		</tr>
	</table>
	
</p>
<?if (Cart::count()!=0){echo('<h2><a class="cartpaylink" href="/cardpay">Pay by Card</a>
</h2>');}?>