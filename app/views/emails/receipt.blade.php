<h2>Your Receipt from JulietCorley.com</h2>
<p>our Reference number {{$reference}}</p>
<h3>Thankyou {{$name}},</h3>
<p>We have successfully charged AUD${{$amount}} to your card with number ending .. {{$number}}<br><br>
for:-<br><strong>
    @foreach($description as $row)
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$row}}<br>
    @endforeach
</strong></p>
<p>The image/images purchased here are licensed to <strong>{{$licensee}}.</strong></p>
