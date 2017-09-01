<?php
////////////////// BBE EXTRAS: FORMS MODULE //////////////////////////////

add_action('wp_enqueue_scripts', 'bbeforms_add_head_scripts');  
function bbeforms_add_head_scripts() {//INCLUDE JS LIBRARIES AND STUFF
		 
		 if (isset($_GET['bbe_action_launch_editing'])) return; ///IF WE ARE EDITING WITH BBE, DO NOT ADD ANYTHING
		 
		//HELPER JS
		wp_enqueue_script ('bbeform-helper-js', get_template_directory_uri().'/extras/bbe-forms-engine/bbe-forms-engine.js',  array( 'jquery','jquery-form' ),   false,   true );
		wp_localize_script('bbeform-helper-js', 'ajax_object',   array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'we_value' => 1234 ) );
} //end function   
 
 
//HANDLE AJAX FORM SUBMIT
add_action( 'wp_ajax_bbe_forms_check_submission_and_process', 'bbeforms_ajax_check_submission_and_process' );
add_action( 'wp_ajax_nopriv_bbe_forms_check_submission_and_process', 'bbeforms_ajax_check_submission_and_process' );
function bbeforms_ajax_check_submission_and_process() {
	 
	 if (isset($_POST['bbeHandleForm'])   ) //flag for processing that form
	
			   {	//echo strlen($_POST['bbeHandleForm']);
					if (strlen($_POST['bbeHandleForm'])<1 or strlen($_POST['bbeHandleForm'])>35) die("Invalid form action");
					 
					//ANTI SPAM
					if ($_POST['somemore']!='go on and make it funky') die("Invalid submission."); //you can change here and customize the key - just remember to update also  /helper.js
					  
					
					//EXECUTE THE CALLBACK FUNCTION
					$callback_func_name= sanitize_title($_POST['bbeHandleForm'])."_formcallback";
					if (function_exists($callback_func_name)) {eval ($callback_func_name."(); "); } else {if (current_user_can('install_plugins')) echo "You should declare somewhere a function called <b>".$callback_func_name."()</b> to handle this form submission actions.";}
					 
			   
				    wp_die();
				 }
} //end function
 
////////////////////// END ENGINE /////////  


//////////////////////  DEFINE defaultform - the default contact form //////////////

include("contactform_submit.php");  //include frontend handling action
include("contactform_backend.php"); //include backend for consultation of submitted data

 

/////////////EXTRAS ////////



/* CSV EPORT: FUTURE */
 

if(0)
//function print_csv()
{
    if ( ! current_user_can( 'install_plugins' ) )  return;
	echo "daje";die;
	/*prepare data */
	global $wpdb;
	$the_table = $wpdb->prefix . "defaultform";
	
	$result = $wpdb->get_results("SHOW COLUMNS FROM ".$the_table."");
	$i = 0;
	if (mysql_num_rows($result) > 0) {
	while ($row = mysql_fetch_assoc($result)) {
	$csv_output .= $row['Field']."; ";
	$i++;
	}
	}
	$csv_output .= "\n";
	
	$values = mysql_query("SELECT * FROM ".$table."");
	while ($rowr = mysql_fetch_row($values)) {
	for ($j=0;$j<$i;$j++) {
	$csv_output .= $rowr[$j]."; ";
	}
	$csv_output .= "\n";
	}

	/*start template */
    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename=example.csv');
    header('Pragma: no-cache');

    // output the CSV data
	print $csv_output;
}






