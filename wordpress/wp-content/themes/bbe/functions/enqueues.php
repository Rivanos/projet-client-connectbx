<?php

function bbe_enqueues() {

	//wp_enqueue_script( 'jquery' );

	//WHICH MAIN CSS IS DESIRED?
	$bootstrap_styling=get_theme_mod('bootcss_choice');
	if ($bootstrap_styling!="disable"):
	
		//we actually want some css
		
		if ($bootstrap_styling=="" or $bootstrap_styling=="bootstrap_default_optional_theme") {
			//BUILT IN BOOTSTRAP MAIN CSS
			wp_register_style('bootstrap-main', get_template_directory_uri() . '/css/bootstrap.min.css', false, '3.3.6', null);
		}
		else {
			//CDN - PROVIDED BOOTSWATCH MAIN CSS
			wp_register_style('bootstrap-main', 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/'.$bootstrap_styling.'/bootstrap.min.css', false, '3.3.6', null);
		}
			  
		// NOW   ENQUEUE THE MAIN CSS
		wp_enqueue_style('bootstrap-main'); 
	
		//IF DESIRED, ADD THE DEFAULT OPTIONAL BOOTSTRAP THEME 
		if ($bootstrap_styling=="bootstrap_default_optional_theme") {
			wp_register_style('bootstrap-theme', get_template_directory_uri() . '/css/bootstrap-theme.min.css', false, '3.3.6', null);
			wp_enqueue_style('bootstrap-theme');
		}
	endif;
	
	//EXTRA CSS
	$bbe_extra_css_url=get_theme_mod('bbe_extra_css_url');
	if ($bbe_extra_css_url!=""):
		wp_register_style('bbe-extra', $bbe_extra_css_url, false, '3.3.6', null);
		wp_enqueue_style('bbe-extra');
	endif;
	
  	wp_register_style('bbe-theme', get_template_directory_uri() . '/css/bbe.css', false, null);
	wp_enqueue_style('bbe-theme');
	
	//ADD CSS PERSONALIZATION FROM CUSTOMIZER OPTIONS
	wp_add_inline_style( 'bbe-theme', bbe_customizable_inline_css() );
	
	
	//ANIMATE.CSS
	if(bbe_option_is_true('animatecss') ) wp_enqueue_style('animate', get_template_directory_uri().'/css/animate.min.css' , array());  //for Animations, disable if not necessary
	 
	//FONT AWESOME ICONS
	if(bbe_option_is_true('fontawesome') ) wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
	 
	 
	//MODERNIZER 
  	wp_register_script('modernizr', get_template_directory_uri() . '/js/modernizr-2.8.3.min.js', false, null, true);
	if(bbe_option_is_true('modernizer') ) wp_enqueue_script('modernizr');

	//BOOTSTRAP JS
  	wp_register_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', false, null, true);
	wp_enqueue_script('bootstrap-js');
	 
	//BBE JS
	wp_register_script('bbe-js', get_template_directory_uri() . '/js/bbe.js', array( 'jquery' ), null, true);
	wp_enqueue_script('bbe-js');

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'bbe_enqueues', 100);





//pull customization data and spit some good ol inline CSS
function bbe_customizable_inline_css() {
	$css="";
	//LINKS COLORS
	if (get_theme_mod('bbe_links_color')!="") $css.="a {color: ". get_theme_mod('bbe_links_color')."; } ";
	if (get_theme_mod('bbe_hover_links_color')!="") $css.="a:hover {color: ". get_theme_mod('bbe_hover_links_color')."; } ";

	//FONTS
	if (get_theme_mod('bbe_headings_font')!="") $css.="h1,h2,h3,h4,h5,h6, .h1, .h2, .h3, .h4, .h5, .h6 {font-family: '". bbe_get_font_family_name(get_theme_mod('bbe_headings_font'))."'; } ";
	if (get_theme_mod('bbe_body_font')!="") $css.="html body {font-family: '". bbe_get_font_family_name(get_theme_mod('bbe_body_font'))."'; } ";

	//FOOTER WRAP BG COLOR 
	if (get_theme_mod('bbe_footer_bgcolor')!="") $css.="#bbe-footer-wrap {background-color: ". get_theme_mod('bbe_footer_bgcolor')."; } ";
	
	//FOOTER BACKGROUND IMAGE
	if(get_theme_mod('footer_bg_image_url')!="") $css.="#bbe-footer-wrap {background-image:url(".get_theme_mod('footer_bg_image_url')."); background-size: cover; } ";
	
	return $css;
}
function bbe_get_font_family_name($font) {
	$arr=explode(":",$font); return $arr[0];
}




function bbe_footer_codes() {
    
	if (isset($_GET['bbe_action_launch_editing'])) return; //QUIT IF WE ARE IN EDITING MODE
	
	global $post;
 
	if (strpos(($post->post_content), 'bbe-facebook-helper') !== false): ?>
	<!-- fb -->
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/<?php echo  get_locale() ?>/sdk.js#xfbml=1&version=v2.3";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<!-- end fb -->
	<?php endif ?>
	
	<?php
	if (strpos(($post->post_content), 'bbe-twitter-helper') !== false): ?>
	<!-- TW -->
	<script>window.twttr = (function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0],
		t = window.twttr || {};
	  if (d.getElementById(id)) return t;
	  js = d.createElement(s);
	  js.id = id;
	  js.src = "https://platform.twitter.com/widgets.js";
	  fjs.parentNode.insertBefore(js, fjs);
	 
	  t._e = [];
	  t.ready = function(f) {
		t._e.push(f);
	  };
	 
	  return t;
	}(document, "script", "twitter-wjs"));</script>
	<!-- end TW -->
	<?php endif ?>
	
	<?php	
} //end function

add_action( 'wp_footer', 'bbe_footer_codes' );







add_action( 'wp_head', 'bbe_add_chosen_font_assets' );
function bbe_add_chosen_font_assets() {
	  if (get_theme_mod('bbe_headings_font')!=''): ?><link href="https://fonts.googleapis.com/css?family=<?php echo str_replace(' ','+',get_theme_mod('bbe_headings_font')); ?>" rel="stylesheet"><?php endif;
	  if (get_theme_mod('bbe_body_font')!=''): ?><link href="https://fonts.googleapis.com/css?family=<?php echo str_replace(' ','+',get_theme_mod('bbe_body_font')); ?>" rel="stylesheet"><?php endif;
}


add_action( 'wp_head', 'bbe_add_header_anlytics_code' );
function bbe_add_header_anlytics_code() {
	  if (!current_user_can('administrator')) echo get_theme_mod("bbe_header_analytics_code");
}



add_action( 'wp_head', 'bbe_add_header_chrome_color' );
function bbe_add_header_chrome_color() {
	 if (get_theme_mod('bbe_header_chrome_color')!=""): ?><meta name="theme-color" content="<?php echo get_theme_mod('bbe_header_chrome_color'); ?>" />
	<?php endif;
}

 


