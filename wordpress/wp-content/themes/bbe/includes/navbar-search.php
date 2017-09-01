<?php
/*
Navbar search form
==================

If you don't want a search form in your navbar, just disable it from the WordPress Customizer Options, in the Header Section.
*/
?>

<form class="navbar-form navbar-right" role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="form-group">
		<input class="form-control" type="text" value="<?php echo get_search_query(); ?>" placeholder="Recherches un article..." name="s" id="s">
	</div>
	<button type="submit" id="searchsubmit" value="<?php esc_attr_x('Recherche', 'bbe') ?>" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
</form>
