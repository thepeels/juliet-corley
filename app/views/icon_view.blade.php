
@extends('layout')

@section('title','')
<h2 class='centered'>Sample Icon Functionality</h2>
@stop

@section('body-class')
<body class="icon-page">
@stop
			
@section('content')
<h1>Table of Icons</h1>

<table>
	@foreach($icons as $icon) 
	<?
		echo'<tr>
			<td style="width:120px; height:50px;">&nbsp;&nbsp;'.$icon->latin.'</td>'.PHP_EOL;
			for($array_index=0;$array_index<3;$array_index++)
				{	echo
					'<td style="width:120px; height:50px;
						background:url(\'../images/sprite.jpg\')no-repeat 
						scroll '.($array_index*-120).'px '.(($icon->id-1)*-50).'px;">'?>
						<a href="{{URL::action('IconController@getIndex',array('array_index'=>$array_index, 'latin'=>$icon->latin))}}">
							<?echo'<span>'.'&nbsp;&nbsp;'.$icon->latin.'<br>&nbsp;&nbsp;'.$suffixes[$array_index].' cm<br>&nbsp;&nbsp;&copy;JulietCorley.com</span>
						</a>
					</td>'.PHP_EOL;
				}
			echo'<td>'.$icon->id.'</td>	
		</tr>';
	?>	
	@endforeach
</table> 

<BR><BR><BR>
	
<P>Below is the image the Icons are lifted from, each horizontal row corresponds to their position in the database, and the database is sorted in alphabetical order on the name</P>	

<img src="../images/sprite.jpg">
	<!--
<table>
	<?for($content=1;$content<4;$content++){?>
   <tr>
       <td>{{Icons::fetchLatinName($content)}}</td>
       <td>{{Icons::fetchsmallIcon($content)}}</td>
       <td>{{Icons::fetchLargeIcon($content)}}</td>
       
</tr><?}?>
</table>	
	-->
@include('includes.footer')

@stop




