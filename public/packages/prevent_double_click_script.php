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
<script type="text/javascript">
disableDoubleClick = function() {
        if (typeof(_linkEnabled)=="undefined") _linkEnabled = true;
        setTimeout("blockClick()", 100);
        return _linkEnabled;
    }
    blockClick = function() {
        _linkEnabled = false;
        setTimeout("_linkEnabled=true", 1000);
    }
</script></br>
