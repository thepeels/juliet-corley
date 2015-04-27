<?php 
class ImageTable{
	public static function fetchTableRow()
	{
	    $table_data = Fish::get();    
	    echo('<table>');
        foreach($table_data as $row)
        {
               /*
            $small_image = DB::table('images')
                ->where('id',$row->small_image_id)
                ->get();
            
            echo('<tr>');     
            echo('<td>'.$row->id.'</td>');
            echo('<td>'.$row->name.'</td>');
            echo('<td>'.$row->base_price.'</td>');
            ?><td><?
                foreach($small_image as $key)
                echo($key->display_name.'.'.$key->type);
            ?></td><?  
            echo('</tr>');
            */
             $assoc_images = DB::table('images')
                ->where('filename',$row->id)
                ->get();
            echo('<tr>');     
                echo('<td>'.$row->id.'</td>');
                echo('<td>'.$row->name.'</td>');
                echo('<td>'.$row->base_price.'</td>');
                
                foreach($assoc_images as $key)
                echo('<td>'.$key->display_name.'.'.$key->type.'</td>');
                
            echo('</tr>');
        }
        echo('</table>');   
		#$table_cell = Image::filename();
		
	}
    
    
    
	public static function fetchSmallIcon($i)
	{
		$icons = Icon::find($i);
		if($icons) {return $icons->icon3cm;}
	}
	public static function fetchLargeIcon($i)
	{
		$icons = DB::table('icons')->find($i);
		if($icons) {return $icons->icon5cm;}
	}
	
	
/*	public static function fetchIconRow($icon) // this one does not overlay the link, copying the tect frpm icon_view.blade doues not pull the variables into the link
	{	$suffixes = array('3','5','full');
		echo'<tr>
			<td style="width:120px; height:50px;">&nbsp;&nbsp;'.$icon->latin.'</td>'.PHP_EOL;
			for($array_index=0;$array_index<3;$array_index++)
				{	echo
					'<td style="width:120px; height:50px; background:url(\'../images/sprite.jpg\')no-repeat scroll '.($array_index*-120).'px '.(($icon->id-1)*-50).'px">'.PHP_EOL;
						'<a href="{{URL::action(\'IconController@iconDownload\',array(\'array_index\'=>$array_index, \'latin\'=>$icon->latin))}}">'.PHP_EOL;
							'<span>'.'&nbsp;&nbsp;'.$icon->latin.'<br>&nbsp;&nbsp;'.$suffixes[$array_index].' cm<br>&nbsp;&nbsp;&copy;JulietCorley.com</span>'.PHP_EOL;
						'</a>'.PHP_EOL;
					'</td>'.PHP_EOL;
				}
			echo'<td>'.$icon->id.'</td>	
		</tr>';
	}*/
	
	
}
