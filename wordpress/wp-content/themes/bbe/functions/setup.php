<?php

function bbe_setup() {
	add_editor_style('css/editor-style.css');
	add_theme_support('post-thumbnails');
	//update_option('thumbnail_size_w', 170);
	//update_option('medium_size_w', 470);
	//update_option('large_size_w', 970);
}
add_action('init', 'bbe_setup');

if (! isset($content_width))
	$content_width = 600;

function bbe_excerpt_readmore() {
	return '&nbsp; <a href="'. get_permalink() . '">' . '&hellip; ' . __('Read more', 'bbe') . ' <i class="glyphicon glyphicon-arrow-right"></i>' . '</a></p>';
}
add_filter('excerpt_more', 'bbe_excerpt_readmore');

// Browser detection body_class() output

function bbe_browser_body_class( $classes ) {
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
	
	if($is_lynx) $classes[] = 'lynx';
	elseif($is_gecko) $classes[] = 'gecko';
	elseif($is_opera) $classes[] = 'opera';
	elseif($is_NS4) $classes[] = 'ns4';
	elseif($is_safari) $classes[] = 'safari';
	elseif($is_chrome) $classes[] = 'chrome';
	elseif($is_IE) {
		$browser = $_SERVER['HTTP_USER_AGENT'];
		$browser = substr( "$browser", 25, 8);
		if ($browser == "MSIE 7.0"  ) {
			$classes[] = 'ie7';
			$classes[] = 'ie';
		} elseif ($browser == "MSIE 6.0" ) {
			$classes[] = 'ie6';
			$classes[] = 'ie';
		} elseif ($browser == "MSIE 8.0" ) {
			$classes[] = 'ie8';
			$classes[] = 'ie';
		} elseif ($browser == "MSIE 9.0" ) {
			$classes[] = 'ie9';
			$classes[] = 'ie';
		} else {
	            $classes[] = 'ie';
	        }
	}
	else $classes[] = 'unknown';
 
	if( $is_iphone ) $classes[] = 'iphone';
 
	return $classes;
}
add_filter( 'body_class', 'bbe_browser_body_class' );

// Add post formats support. See http://codex.wordpress.org/Post_Formats
add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));

// Bootstrap pagination

if ( ! function_exists( 'bbe_pagination' ) ) {
	function bbe_pagination() {
		global $wp_query;
		$big = 999999999; // This needs to be an unlikely integer
		// For more options and info view the docs for paginate_links()
		// http://codex.wordpress.org/Function_Reference/paginate_links
		$paginate_links = paginate_links( array(
			'base' => str_replace( $big, '%#%', get_pagenum_link($big) ),
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages,
			'mid_size' => 5,
			'prev_next' => True,
			'prev_text' => '<i class="glyphicon glyphicon-chevron-left"></i> '. __('Previous Page'),
			'next_text' => '<i class="glyphicon glyphicon-chevron-right"></i> '.__('Next Page'),
			'type' => 'list'
		) );
		$paginate_links = str_replace( "<ul class='page-numbers'>", "<ul class='pagination'>", $paginate_links );
		$paginate_links = str_replace( "<li><span class='page-numbers current'>", "<li class='active'><a href='#'>", $paginate_links );
		$paginate_links = str_replace( "</span>", "</a>", $paginate_links );
		$paginate_links = preg_replace( "/\s*page-numbers/", "", $paginate_links );
		// Display the pagination if more than one page is found
		if ( $paginate_links ) {
			echo $paginate_links;
		}
	}
}


// CONTENT PROTECTION FOR PAGES THAT REQUIRE LOGIN ////
function bbe_check_if_loggedin() {
	global $post;
	if ( is_numeric($post->ID) && get_post_meta($post->ID,'bbe_loggedin_only',TRUE)==1  && !is_user_logged_in() ):
		wp_safe_redirect(  wp_login_url( get_permalink($post->ID) ) ); //redirect to 'members-area'
		die();
	endif;
} //end function
add_action( 'template_redirect', 'bbe_check_if_loggedin' );


///NAV MENUS IN HEADER ///////
register_nav_menu('navbar-left', __('Main menu (left)', 'bbe'));
register_nav_menu('navbar-right', __('Main menu (right)', 'bbe'));


//TITLE TAG SUPPORT 
add_action( 'after_setup_theme', 'bbe_theme_slug_setup' );
function bbe_theme_slug_setup() { add_theme_support( 'title-tag' ); }


//TEXTDOMAIN
add_action('after_setup_theme', 'true_load_theme_textdomain');

function true_load_theme_textdomain(){
    load_theme_textdomain( 'bbe', get_template_directory() . '/languages' );
}



//////////////////////////

function wp_footer_colophon()
{	?>
	<p><?php
		if (get_theme_mod('footer_text')==""){ ?>
			&copy; <?php echo date('Y'); ?>  <?php bloginfo('name'); ?>  | <a href="#" id="bbe-show-credits">Credits</a>
			<span id="bbe-site-credits"><a href="https://www.dopewp.com/" target="_blank" title="WordPress Page Builder">WordPress Page Builder</a> by DopeWP</span>
		   <?php
		   } else echo get_theme_mod('footer_text'); ?>
	</p>
	<?php	
}