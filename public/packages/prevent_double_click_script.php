<!--------------- Prevent Double download from double click -------->
<!--
<script type="text/javascript">
	$.fn.oneclicklink = function(event, callback) {
    var sel = this.selector;
    function unbind() { $(sel).die(event, callback).die(event, unbind); }
    return this.live(event, callback).live(event, unbind);
};

$("a").oneclicklink("click", function() {
    $(this).prop('disabled',true);
});
</script>
<script type="text/javascript">
		  $('*').one('click',function(e){
	    e.preventDefault();
	  });
</script>
-->
<script>
disableDoubleClick = function() {
        if (typeof(_linkEnabled)=="undefined") _linkEnabled = true;
        setTimeout("blockClick()", 10);
        return _linkEnabled;
    }
    blockClick = function() {
        _linkEnabled = false;
        setTimeout("_linkEnabled=true",1500);
    }
</script></br>
<!--
<script>
	var link = document.getElementByClass("oneclick");
	link.addEventListener("dblclick",'startDblClick',false);
</script>
<script type="text/javascript">
$(document).ready(function(){
    $("form").submit(function(){
        setTimeout(function() {
            $('input').attr('disabled', 'disabled');
            $('a').attr('disabled', 'disabled');
        }, 50);
    })
});
</script></br>
-->