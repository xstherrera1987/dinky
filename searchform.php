<form method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
	<input class="searchinput" type="text" placeholder="Search" name="s" id="s" />
    <?php /* search by Enter key */ ?>
    <script>
    	var searchform = document.getElementById("searchform");
    	searchform.onkeypress = function(e) {
    		if('13' === e.keyCode) {
                searchform.submit();
            }
    	}
    </script>
</form>