<?php

function bbe_preprocess_comment_antispam_check( $commentdata ) {
  
  	// if it's a trackback or a pingback, skip checks
	if ($commentdata['comment_type'] != '') return $commentdata;
		
	//check honeypot	
	if ( $_POST['email-address']!='') wp_die("bad girls");
	
    
    //check hidden field built with js
    if ( $_POST['e-nable-daf-orm']!='yes') wp_die("bad boys");
    
    
    
	return $commentdata;
	   
}
add_filter( 'preprocess_comment' , 'bbe_preprocess_comment_antispam_check' );


