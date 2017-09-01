<?php
//BBE ENGINE INDEX


include("new-page-suggestion.php");


if (!function_exists('bbe_engine_url')):
	 function bbe_engine_url($path='',$const='') { return get_template_directory_uri()."/bbe-engine".$path; }
endif;



////////FUNCTION TO DETERMINE IF A BBE TEMPLATE IS ASSIGNED TO POST OR PAGE
function bbe_post_is_using_bbe_template($post_id){
	 // Get the name of the Page Template file.
	 $template_file = get_post_meta($post_id, '_wp_page_template', true);
	 if (strpos($template_file,'bbe') !== false)  return TRUE; else return FALSE;
}

/////// BBE SCRIPTS LOADING ////////////////////////////////

add_action('wp_enqueue_scripts', 'bbe_add_head_scripts');

function bbe_add_head_scripts() { //INCLUDE JS LIBRARIES AND STUFF
	
	//for everybody
	$bbe_theme_version= wp_get_theme( get_template() )->get( 'Version' );		
	    
	///HELPER CSS
	wp_enqueue_style('bbe-helper', bbe_engine_url('/assets/helper.css', __FILE__), array(), $bbe_theme_version);  //the helper css for everybody
	
	
	//for editing only ://///////////////////////////////////////////////////////////////////////////////////////////////////////
	
	//FOLLOWING STUFF IS ONLY FOR SUPER ADMINS AND WHEN EDITING IS ENABLED  ///////////////////////////////
	if (!current_user_can("edit_pages") OR !isset($_GET['bbe_action_launch_editing'])) return; 
	
	//LAYOUT EDITOR CSS
	wp_enqueue_style('bbe-engine-css', bbe_engine_url('/assets/engine.css', __FILE__), array(), $bbe_theme_version);   
	
	//LAYOUT ENGINE
	wp_enqueue_script('bbe-layout-engine',
					 bbe_engine_url('/assets/engine.js', __FILE__),
					 array( 'jquery', 'jquery-ui-draggable','jquery-ui-resizable',//'jquery-ui-droppable',//'jquery-ui-slider', 'jquery-touch-punch' ,'jquery-ui-dialog',
						    'jquery-ui-sortable','jquery-form' ),
					 $bbe_theme_version,
					 true
					  ); //the JS plugin engine 
	
	
	if (is_ssl()) $protocol='https'; else $protocol='http'; //get current page protocol
	wp_localize_script( 'bbe-layout-engine', 'ajax_object',
						array( 'ajax_url' => admin_url( 'admin-ajax.php',$protocol ), 'we_value' => 1234 ) ); // in JavaScript, object properties are accessed as ajax_object.ajax_url, ajax_object.we_value
	
	
	//TINYMCE
	wp_enqueue_script('tinymce',
				  '//cdn.tinymce.com/4/tinymce.min.js',
					 array( 'jquery' ),
					 false,
					 true
					  );
	
							    
	//UPDATE AVAILABLE NOTIFY
	wp_enqueue_script('bbe-update-notify',
				  'https://www.dopewp.com/remote/update_notification.js',
					 array( ),
					 $bbe_theme_version,
					 true
					  );

}    //end function
 


/////// CHECK URL ACTIONS ////////////////////////////////
 
add_action( 'init', 'bbe_check_url_actions' );

function bbe_check_url_actions() {
 
		//FOLLOWING STUFF IS ONLY FOR SUPER ADMINS AND WHEN EDITING IS ENABLED  
		if (!current_user_can("edit_pages")  ) return; 

		if (isset($_GET['bbe_action']) && $_GET['bbe_action']=="load_icons")   { include("assets/libs/icons.html"); 	die; }

		//useless 2017
		//if (isset($_GET['bbe_action']) && $_GET['bbe_action']=="load_local_html_template" && is_numeric($_GET['template']))   { include("assets/templates/".$_GET['template'].".html"); 	die; }
		
		if (isset($_GET['bbe_open_htmleditor_popup']) && $_GET['bbe_open_htmleditor_popup']==1) {include("assets/actions/bbe_open_htmleditor_popup.php");die;}
		if (isset($_GET['bbe_open_csseditor_popup']) && $_GET['bbe_open_csseditor_popup']==1) {include("assets/actions/bbe_open_csseditor_popup.php");die;}
        
        //if (isset($_GET['t'])) {echo bbe_get_starter_content();die;}  //just for debug
}


////////////PAGE HTML SAVING /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

add_action( 'wp_ajax_bbe_save_page', 'bbe_ajax_save_page_func' );
 
function bbe_ajax_save_page_func() {
	 
	if (!current_user_can("edit_pages")) return; //Only for super admins				
	   
	if (!isset($_POST['bbe-go-saving'])) return;
	
	$post_id=$_POST['bbe-saving-id'];
	
	// define the update
	$update_post = array(
		'ID'           => $post_id,
		'post_content' => $_POST['bbe-magic-html'],
	);
	
	//UPDATE THE PAGE CONTENT INTO THE DATABASE
	$the_update=wp_update_post( $update_post );
	
	//Update CSS	  
	update_post_meta($post_id,'bbe-magic-css', ($_POST['bbe-magic-css']));
	
	//print_r($_POST); 
	if ( $the_update==true) echo "Saved Successfully.";
	
	//did user say stop editing?
	if (isset($_POST['bbe-save-and-stop-editing'] ))
			   {
					?> <script>  window.location.assign("<?php echo get_permalink($post_id) ?>"); </script> <?php
			   }
	
	wp_die();
}



// EDITING TRIGGER LINKS: Place in admin menu a trigger to enable/disable editing

add_action('admin_bar_menu', 'bbe_add_toolbar_items', 100);

function bbe_add_toolbar_items($admin_bar) {
    //check if user has rights to edit, and if it's a page
    if (!current_user_can("edit_pages")  or is_admin() or isset($_GET['bbe_action_launch_editing'])  ) return;
    //FOLLOWING STUFF IS ONLY FOR SUPER ADMINS  when browsing site frontend - when we are not in bbe editing mode.
    
    if(!is_single() && !is_page()) return; //ONLY SINGLE POSTS OR PAGES OR CPTs
    
    if ( !bbe_post_is_using_bbe_template(get_the_ID()))  return; // the page is not using a BBE template
    
    // ADD LINK TO ADMIN BAR TO LAUNCH BBE EDITING:
    global $wp_admin_bar;
    $wp_admin_bar->add_node( array(
                                  'id'    => 'bbe-launch-editing',
                                  'title' => '<span id="icon-bbe-launch-editing"> </span>'.'Edit with BBE',
                                  'href'  => (add_query_arg( array('bbe_action_launch_editing' => 1 ) )),	
                                  ));
    //OPTIONALLY...
    //$wp_admin_bar->remove_menu('edit');
} //end func

/// HIDE WP ADMIN BAR WHILE EDITING WITH BBE		
function bbe_handle_actions()
{
	 if (!current_user_can("edit_pages")  or is_admin()) return;
	 global $wp_admin_bar;
	if (  isset($_GET['bbe_action_launch_editing'])) add_filter('show_admin_bar', '__return_false');
	 
}
add_action ('wp_loaded','bbe_handle_actions');
 
 		

function bbe_magic_editor()

{ 
	if ( isset($_GET['bbe_action_launch_editing']) && is_user_logged_in() && current_user_can("edit_pages") ) $bbe_editing_mode=TRUE; else $bbe_editing_mode=FALSE; 
    //in which page are we?
   //$page_object = get_queried_object();
   $page_id     = get_queried_object_id();
   //print the div and it's content
   ?>
   <div id="bbe-magic-content" <?php if ($bbe_editing_mode): ?>
		data-wpadminurl="<?php echo get_admin_url() ?>" 
		data-bbe-saving-id="<?php echo $page_id;  ?>" 	data-page-slug="<?php echo get_post( $page_id )->post_name; ?>"
		<?php endif ?>
		><?php
		
		  $html_out=  get_post_field( 'post_content', $page_id, 'raw' );
			   
		  if ($bbe_editing_mode) { //we are in edit mode: don't process shortcodes
			   
			  
			   $output= $html_out;
			   
				}
				
			   else { //WE Are not in editing mode
			   
			   $html_out = str_replace('data-bbe-inline-editable="1"','',$html_out); // eliminate: data-bbe-inline-editable="1"
			   $html_out = str_replace('data-bbe-links-editable="1"','',$html_out); // eliminate: data-bbe-links-editable="1"
			   $html_out = str_replace('data-bbe-html-editable="1"','',$html_out); // eliminate:  //data-bbe-html-editable="1"
			   $html_out = str_replace('data-bbe-bg-editable="1"','',$html_out); // eliminate: data-bbe-bg-editable="1"
			   $output= do_shortcode( $html_out); //process  eventual shortcodes
		  }
		  
		  if (current_user_can("edit_pages") && isset($_GET['set_api_key'])) $output="";
		  
		  if ( post_password_required() ) { echo '<div class="bbe-container-wrap-passwordform"><div class="container"><div class="row"><div class="col-xs-12 text-center">'.get_the_password_form()."</div></div></div></div>";  }
			   else  echo $output;
   
   
   
   ?></div>
   
    <?php
	if ($bbe_editing_mode):
		  echo '<section id="bbe-html-tools-section">';
		  include('assets/engine.html');
		  echo '</section>';
		  echo '<section id="bbe-editing-extras" class="hidden">'.wp_dropdown_categories( array("echo"=>"0") ).'</section>';
	endif
	
	?>
 
   
   <style id ="bbe-page-style"><?php echo get_post_meta( $page_id, "bbe-magic-css", true ); ?></style>
<?php		
}





//  STYLE THE UPLOAD WPADMIN AREA
function bbe_custom_upload_style() {
	
	 ?>
	
	 <script>
	 
		 jQuery(document).ready(function ($)
			  
			  {
				   jQuery(".button.urlfile").click();
				   
			  }); // end DOCUMENT READY

	 </script>
	  
	 <style type="text/css">
		  .ml-submit, .theme-layouts-post-layout, tr.post_title , tr.align ,   tr.post_excerpt, tr.post_content ,tr.url{display:none}
		   
		   tr.submit .savesend input:hover,
		  tr.submit .savesend input { 
			 font-size: 24px;
			 padding: 0px 14px;
			 /* text-align: center; */
			 right: 0;
			 display: block;
			 background-color:green;color:#fff;
				text-transform: uppercase
			 }
			 
	   
		.describe-toggle-off, .describe-toggle-on, .media-item .edit-attachment {
	   
		  line-height: 26px;
		  float: right;
		  margin-right: 10px;
		  font-size: 20px;
			text-decoration:none;
			text-transform:uppercase;
			padding: 1px 15px;
			 background-color:#337ab7;
			 color:#fff;
		}  
			 
		  #media-upload a.del-link:active,
		  tr.submit .savesend input:active{position: relative; top: 1px;}
		  
		  #media-upload a.del-link:hover,
		  #media-upload a.del-link{ }
		  
		  
		  tr.submit{border-top: 1px solid #dfdfdf;}
		  tr.submit .savesend{padding-top: 15px;}
		  
		  div#media-upload-header{padding: 0px; border: 0px; background: #222; position: fixed; top: 0px; left: 0px; width: 100%; height: 48px; z-index: 9999;}
		  #sidemenu a.current {  background: #337ab7; color: white;-webkit-border-top-left-radius: 0px;-webkit-border-top-right-radius: 0px;border-top-left-radius: 0px;border-top-right-radius: 0px;border-width: 0px;}
		  #sidemenu a{padding: 5px 20px; border: 0px; background: transparent; color: white; font-size: 10px; text-transform: uppercase;}
		  #sidemenu li#tab-type_url,
		  div.media-item p.media-types *,
		  #sidemenu li#tab-grabber {display: none;}
		  
		   p.media-types {display: none !important;}
		  
		  
		  body#media-upload{padding-top: 50px; background: #f5f5f5; height: 85%;}
		  body#media-upload ul#sidemenu{bottom: 0; margin: 0px; padding: 0px;}
		  #sidemenu a:hover{background:#222;}
		  h3.media-title{font-family: sans-serif; font-size: 10px; font-weight: bold; text-transform: uppercase;}
		  h3.media-title,.upload-flash-bypass,.max-upload-size{display: block;text-align: center;}
		  .upload-flash-bypass{margin-top: 20px;}
		  .max-upload-size{margin-bottom: 20px;}
         </style>
	 <?php
}

if (isset($_GET['bbe_image_upload']) && $_GET['bbe_image_upload']==1) add_action('admin_head', 'bbe_custom_upload_style');


///ADD BBE EDITING LINKS TO PAGE LISTING IN THE WP ADMIN////
 
function bbe_add_action_links($actions, $page_object) { 
	if (bbe_post_is_using_bbe_template($page_object->ID))
	$actions['edit_page_with_bbe'] = "<a class='edit_page_with_bbe' href='" . esc_url( add_query_arg( 'bbe_action_launch_editing', '1', get_permalink($page_object->ID)))  . "'>".__( 'BBE Frontend Editor', 'bbe' ) ."</a>";
	return $actions;
}
add_filter('page_row_actions', 'bbe_add_action_links', 10, 2);
add_filter('post_row_actions', 'bbe_add_action_links', 10, 2);

 

//////////// AJAX FETCH OEMBED CODE /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

add_action( 'wp_ajax_bbe_process_oembed', 'bbe_process_oembed_func' );
 
function bbe_process_oembed_func() {
	 
	if (!current_user_can("edit_pages")) return; //Only for super admins				
   
	$content = "[embed]".$_POST['src_url']  ."[/embed]";

	global $post; $post->ID = PHP_INT_MAX;		//trick to allow content filtering in ajax calls I love you

	$embed_code = apply_filters('the_content', $content);
	echo $embed_code;
	wp_die();
}

//////////// AJAX FETCH SHORTCODE /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

add_action( 'wp_ajax_bbe_process_shortcode', 'bbe_process_shortcode_func' );
 
function bbe_process_shortcode_func() {
	 
	if (!current_user_can("edit_pages")) return; //Only for super admins				
    
	global $post; $post->ID = PHP_INT_MAX;		//trick to allow content filtering in ajax calls I love you
	$input=stripslashes($_POST['shortcode']);
	$output= do_shortcode($input);
	
	if($input==$output) $output="<h2>Unrecognized Shortcode</h2>";
	
	echo $output; 
	 wp_die();
}



///////////////////STARTER CONTENT //////////
function bbe_get_starter_content($id=1) {
    ob_start();
    include("assets/templates/".$id.".html");
    return(ob_get_clean());
}

//AT THEME INIT:
// Overriding/supplementing a predefined item plus a custom definition

add_theme_support( 'starter-content', array(
    'posts' => array(
        'home' => array(
            // Use a page template with the predefined about page
            'template' => 'page-bbe.php',
            'post_type' => 'page',
            'post_title' => 'HomePage Starter',
            'post_content' => (bbe_get_starter_content()),
        ),
       /* 'custom' => array(
            'post_type' => 'page',
            'post_title' => 'HomePage Starter',
            'post_content' => (bbe_get_starter_content()),
            
        ), */
    ),
));
                  
                  
                  