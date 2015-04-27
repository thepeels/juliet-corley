<h1>Select your download:</h1>

<table class="table table-bordered">
{{print_r($alldownloads)}}
@foreach ($downloads as $download)
<tr>
    <?$x=$download->id?>
    <td>
        {{$download->name}}
    </td>
    <td>
        {{$x}}
    </td>
</tr>

@endforeach
 
</table>
