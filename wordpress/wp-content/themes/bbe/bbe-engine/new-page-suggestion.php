<?php

/////SUGGEST IN WP ADMIN TO ENABLE BBE TEMPLATES FOR PAGES, DISABLE WYSIWYG WHEN BBE TEMPLATES ARE ENABLED
add_action( 'current_screen', 'bbe_tweak_wp_interface_page' ); 
function bbe_tweak_wp_interface_page() {
	 
	 //only on page editing screen, exit otherwise
	  $currentScreen = get_current_screen();
     if( $currentScreen->id !== "page" && $currentScreen->id !== "post" )   return;
	 
	 $already_using_bbe_template=FALSE; //init...we'll determine that below
	 if(isset( $_GET['post'])) $already_using_bbe_template=bbe_post_is_using_bbe_template($_GET['post']);
	
	 if ($already_using_bbe_template) { 
		  remove_post_type_support('page', 'editor');
		  remove_post_type_support('post', 'editor');  
		  add_action('admin_notices', 'bbe_template_admin_notice_using_bbe');
    }
	
	else {
	 //not using bbe (yet)
	 
	 if( $currentScreen->id === "page") add_action('admin_notices', 'bbe_template_admin_notice_not_using_bbe_yet');
	}
}



 
 function bbe_template_admin_notice_using_bbe(){
	 bbe_print_admin_notice_styles();
	 global $post;
	 
    ?>
	<div id="bbe_template_admin_notice_using_bbe" class="updated notice notice-success">
		  <div class="bbe-logo"></div>
		  <p> 
			   <b>A BBE Template  is enabled on this Page! </b> &nbsp; We're ready to start editing &nbsp;
			   <a  class="button button-primary button-large"  href="<?php echo esc_url( add_query_arg( 'bbe_action_launch_editing', '1', get_permalink($post->ID))) ?>">
					<span id="icon-bbe-launch-editing"> </span>Edit Page with the BBE Frontend Editor
			   </a>
		  </p>
		  
	</div>
	<?php 
 
}



 function bbe_template_admin_notice_not_using_bbe_yet(){
	 bbe_print_admin_notice_styles();
	 global $post;
	 
    ?>
	<script>
	 ///SOME JS TO GET AND SET CONTENT IN THE WP EDITOR
	 function bbe_tmce_getContent(editor_id, textarea_id) {
	   if ( typeof editor_id == 'undefined' ) editor_id = wpActiveEditor;
	   if ( typeof textarea_id == 'undefined' ) textarea_id = editor_id;
	   
	   if ( jQuery('#wp-'+editor_id+'-wrap').hasClass('tmce-active') && tinyMCE.get(editor_id) ) {
		 return tinyMCE.get(editor_id).getContent();
	   }else{
		 return jQuery('#'+textarea_id).val();
	   }
	 }
	 
	 function bbe_tmce_setContent(content, editor_id, textarea_id) {
	   if ( typeof editor_id == 'undefined' ) editor_id = wpActiveEditor;
	   if ( typeof textarea_id == 'undefined' ) textarea_id = editor_id;
	   
	   if ( jQuery('#wp-'+editor_id+'-wrap').hasClass('tmce-active') && tinyMCE.get(editor_id) ) {
		 return tinyMCE.get(editor_id).setContent(content);
	   }else{
		 return jQuery('#'+textarea_id).val(content);
	   }
	 }
	 
	 /*
	 function tmce_focus(editor_id, textarea_id) {
	   if ( typeof editor_id == 'undefined' ) editor_id = wpActiveEditor;
	   if ( typeof textarea_id == 'undefined' ) textarea_id = editor_id;
	   
	   if ( jQuery('#wp-'+editor_id+'-wrap').hasClass('tmce-active') && tinyMCE.get(editor_id) ) {
		 return tinyMCE.get(editor_id).focus();
	   }else{
		 return jQuery('#'+textarea_id).focus();
	   }
	 }
	 */
	 
	 function bbe_display_alert_content_wrong()
	 {
		  var confirmWindow = confirm("We will have to completely WIPE OUT the content in the WYSIWYG editor before proceeding.");
		  if (confirmWindow == true) {
			  bbe_tmce_setContent("");
			  // jQuery("#wp-content-editor-container").delay(100).fadeOut().fadeIn('slow').delay(100).fadeOut().fadeIn('slow');
		  } else {
			  jQuery('select#page_template').val(bbe_old_page_template);
		  }
	 	 
		
		
	 }
	 //CHECK FUNCTION, TRIGGERED BY THE BUTTON
 
	 function bbe_show_me_where() {
		  
					jQuery('select#page_template').val("page-bbe.php").focus().change(); //.css('background','yellow').delay(100).fadeOut().fadeIn('slow');
					jQuery('#bbe-suggest-saving').hide().removeClass("hidden").slideDown();
					jQuery("#submitdiv").css("border","1px solid red");
					//jQuery('html, body').animate({ scrollTop: jQuery('select#page_template').offset().top }, 1000);
		  }

			   
			   
	 jQuery( document ).ready(function() {
		  //global var
		  bbe_old_page_template=jQuery('select#page_template').val();
		  
		  jQuery('select#page_template').change(function(){
			   jQuery("#bbe-suggest-to-use-bbe").slideUp();
			   if(jQuery('select#page_template').val().indexOf("bbe") > -1 && bbe_tmce_getContent()!='' && bbe_tmce_getContent().indexOf("bbe-container-wrap") == -1) bbe_display_alert_content_wrong();		 
			   });
		  
	  });//end document ready
	</script>
	 <div class=" updated notice notice-success is-dismissible" id="bbe-suggest-to-use-bbe">
		  <div class="bbe-logo"></div>
		  <p>
			   <b>Do you want to use the  BBE Editor on this page?</b>
		  
			   Switch to a BBE template and update the page. &nbsp;&nbsp;&nbsp;
			   <a href="#" class="button button-primary button-large" onclick="bbe_show_me_where();">
					Enable BBE on this page <span id="icon-bbe-switch-to-bbe-template"> </span>
			   </a> 
		 </p>
	 
	 </div>
	 <div class="hidden updated notice notice-success is-dismissible" id="bbe-suggest-saving">
		  <div class="bbe-logo"></div>
		  <p style="display: inline-block">
			   Please <b>Save</b> or <b>Publish</b> the page.  We're almost done!
		  
			     
		 </p>
	 
	 </div>

	<?php 
	 
}










function bbe_print_admin_notice_styles()
{
?>
<style>
.bbe-logo {
    background: url('<?php echo bbe_engine_url() ?>/assets/helper-img/bbe-minilogo.jpg');
    background-size: contain;
    height: 25px;
    width: 25px;
    display: inline-block;
	margin-right:10px;
	margin-top: -2px;
	margin-bottom: 4px;
	vertical-align: middle;
	
}
#bbe_template_admin_notice_using_bbe p, #bbe-suggest-to-use-bbe p { display:inline}
#icon-bbe-launch-editing:before {
    content: '\f464';
    top: 5px;
    color: white;
    position: relative;
     
    font: 400 20px/1 dashicons;
    speak: none;
    padding: 0 0;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    background-image: none!important;
    margin-right: 10px;
}
#icon-bbe-switch-to-bbe-template:after {
    content: '\27BD';
    top: 2px;
    color: white;
    position: relative;
    
    font: 400 20px/1 dashicons;
    speak: none;
    padding: 0px 0;
	margin-LEFT: 10PX;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    background-image: none!important;
    
}
</style>

 <?php
}


