<?php

 

function contactform_formcallback()

{	
	//////////////////////VALIDATE USER INPUT//////////////////////
	//init
	$FormErrors=FALSE;
	
	//honeypot trap
	if (isset($_POST['name-sptrp']) && $_POST['name-sptrp']!='' ) $FormErrors.="<b>Bad news</b> for you: we don't eat crap. <br /> ";
	 
	//validate name  
	if ($_POST['name']=="" or strlen($_POST['name'])>70) $FormErrors.="Please appropriately fill in  the <b>Name</b> field. <br /> ";

	//validate email
	if ( !is_email($_POST['email']) or strlen($_POST['email'])>100 ) $FormErrors.="Please appropriately fill in the <b>Email</b> field with a proper email. <br /> ";
	
	//validate subject 
	if ($_POST['subject']=="" or strlen($_POST['subject'])>100) $FormErrors.="Please appropriately fill in the <b>Subject</b> field. <br /> ";
	
	//validate message 
	if ($_POST['message']=="" or strlen($_POST['message'])>500) $FormErrors.="Please appropriately fill in the  <b>Message</b> field. <br /> ";
	
	//ERRORS?Print feedback and DIE exiting function
	if ($FormErrors) {
		?>
		<style>
		.bbeform_confirmation_message {display:none}
		.bbeform_error_message {display: block}
		</style>
		<div class="alert alert-danger text-center" role="alert" id="bbe-form-errors-alert">
			<b><?php  echo $FormErrors; ?></b>
		</div>
		<?php
		
		return; //Terminate execution
		}
	   		
	//// END USER VALIDATION: HERE USER INPUT HAS BEEN CHECKED //
	
	////////////////////// STORE: CHECK TABLE  AND INSERT //////////////////////
	global $wpdb;
	$table_name = $wpdb->prefix . "bbe_contacts";
	
	//CHECK IF TABLE IS CREATED
	if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
		
		//table is not created. you may create the table here.
		$charset_collate = $wpdb->get_charset_collate();
	
		$sql = "CREATE TABLE $table_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
			name tinytext NOT NULL,
			email varchar(255) DEFAULT '' NOT NULL,
			ipaddress varchar(15) DEFAULT '' NOT NULL,
			page_url varchar(255) DEFAULT '' NOT NULL,
			subject tinytext NOT NULL,
			message text NOT NULL,
			UNIQUE KEY id (id)
		) $charset_collate;";
	
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );
		
		//init setting for recipient emails
		add_option( "bbe_contactform_emailto", get_bloginfo('admin_email'));
	}
	
	//INSERT NEW ROW
	$the_insert=$wpdb->insert( 
		$table_name, 
		array( 
			'time' => current_time( 'mysql' ), 
			'name' => sanitize_text_field($_POST['name']),
			'email' => sanitize_text_field($_POST['email']),
			'subject' => sanitize_text_field($_POST['subject']), 
			'message' => sanitize_text_field($_POST['message']),
			'ipaddress' => sanitize_text_field($_SERVER['REMOTE_ADDR']),
			'page_url' => sanitize_text_field($_SERVER['HTTP_REFERER']),
		) 
	);
	
	//IF ERROR, SHOW MESSAGE
	if (!$the_insert) {
		echo "<h3 class='bbe-form-error'>Insert failed, message will not be received.</h3>";
		if (current_user_can('install_plugins')) echo "<h2>Hey admin, maybe the table doesn't have all the necessary fields/h2>";
		die;
		
	}
	//////////////////////EMAIL STUFF TO ADMIN//////////////////////
	
    //allow html emails
	function bbeforms_set_html_content_type() { return 'text/html'; }
    add_filter( 'wp_mail_content_type', 'bbeforms_set_html_content_type' );
	
	$to =  get_option('bbe_contactform_emailto');
	$subject = get_option('blogname'). ' > Contact form message from '. sanitize_text_field($_POST['name'])." : ".sanitize_text_field($_POST['subject']);
	$body = "<b>From</b>: <br> ".$_POST['email']."<br><b>Message</b>: <br>".addslashes($_POST['message']);
	
	//Send the email
	$mail_result=wp_mail( $to, $subject, $body );
	
	// Reset content-type to avoid conflicts -- http://core.trac.wordpress.org/ticket/23578
	remove_filter( 'wp_mail_content_type', 'bbeforms_set_html_content_type' );
	
	//////////////////////PRINT SOME CONFIRMATION FEEDBACK//////////////////////
	 
	if (!$mail_result)  echo "<h3 class='bbe-form-error'>An email has NOT been sent to the admin  - Something wrong with the mail server, please try again later!</h3>";
			
	echo "<style> .bbeform_confirmation_message {display:block} 	.bbeform_error_message {display: none}"; 
}

 

