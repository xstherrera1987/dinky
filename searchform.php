<form method="get" id="searchForm" action="<?php echo home_url( '/' ); ?>">
	<input class="searchInput" type="text" placeholder="Search" name="s" id="s" />
    <script>
    	var searchform = document.getElementById("searchForm");
    	searchform.onkeypress = function(e) {
    		if('13' === e.keyCode) {
                searchform.submit();
            }
    	}
    </script>
</form>
