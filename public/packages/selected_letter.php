<script>
$(".select-letter").click(function(){
	var wholefrag = ($(this).attr("href"));
	frags = wholefrag.split("#");
	var frag = "#" + frags[1];
		document.cookie = 'thefragment=' + frag;
		
	}
)	
</script>