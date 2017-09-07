<?php

function bbe_search_form( $form ) {
    $form = '<form class="form-inline" role="search" method="get" id="searchform" action="' . home_url('/') . '" >
	<input class="form-control" type="text" value="' . get_search_query() . '" placeholder="' . esc_attr__('Search', 'bbe') . '..." name="s" id="s" />
	<button type="submit" id="searchsubmit" value="'. esc_attr__('Search', 'bbe') .'" class="btn btn-default hidden-xs "><i class="glyphicon glyphicon-search"></i></button>
    </form>';
    return $form;
}
add_filter( 'get_search_form', 'bbe_search_form' );
