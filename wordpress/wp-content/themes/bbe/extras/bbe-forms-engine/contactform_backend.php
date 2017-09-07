<?php


add_action('admin_head', 'bbe_add_stuff_for_form_backend');

function bbe_add_stuff_for_form_backend() {
	if (!isset($_GET['bbe_show_specific_option'])) return;
	?>
	<script>
	// loop all rows and hide all except right one
   jQuery( document ).ready(function() {
		
		jQuery("table tr").each(function(index,el){
		   
			if (jQuery(el).find("label[for='<?php echo $_GET['bbe_show_specific_option'] ?>']").length) {
				//element has been found!
				jQuery("h1").text("Edit Option");
						
			} else {jQuery(el).hide();}
		   //jQuery(el).css("border","1px solid lime");
	   });
   });
	</script>
	<?php
 
}




//utility function
function bbe_check_ip_address($in) {
	
	if ($in=="::1") {
		$localIP =gethostbyname(trim(`hostname`));
		return  $localIP;
	}
	
	
	return $in;
}

////Adds a wp-admin menu page to create and display contacts 
add_action( 'admin_menu', 'bbe_add_contacts_menu' );

function bbe_add_contacts_menu() {add_menu_page( 'BBE Contacts', 'BBE Contacts', 'install_plugins', 'bbe_contacts_options_page', 'bbe_contacts_options_page' );}

 
function bbe_contacts_options_page() {
	if ( !current_user_can( 'install_plugins' ) ) wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	?>
	<div class="wrap">
		<h1>Contacts</h1>
		<?php bbe_contacts_page_check_actions(); ?>
		<?php bbe_contacts_list_printing(); ?>
	</div> <!--  close wrap -->
	<?php
}
 

function bbe_contacts_page_check_actions(){
	//future save options etc
}
 
function bbe_contacts_list_printing(){
	global $wpdb;
	$table_name = $wpdb->prefix . "bbe_contacts";
	
	//CHECK IF TABLE EXISTS
	if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
		//TABLE DOES NOT EXIST: explain things to the admin
		?>
		<div class="update-nag notice">
			<h2>No data recorded yet from the Contact Form.</h2>
			
			<p><i>At the very first form submission </i>from the site frontend, a new database table named <b><?php echo $table_name ?></b> will be created to store the data. </p>
			<p>User submitted data will be shown on this page.</p>
			
			<h3>Find out how to get started in this <a href="https://www.dopewp.com/" target="_blank">Forthcoming tutorial</a></h3>
		</div>
		<?php
		return; //end party here if table does not exist.
	}
	//TABLE EXISTS:
	//determine and do query
	$where_condition="";
	if (isset($_POST['bbe-admin-search-submit'])) {
		$keyphrase=esc_attr($_POST['bbe-admin-search-input']);
		echo "<h2>Searching for &laquo;".$keyphrase."&raquo;</h2>";
		$where_condition=" WHERE email='".$keyphrase."' OR name LIKE '%%".$keyphrase."%%' OR subject LIKE '%%".$keyphrase."%%' OR message LIKE '%%".$keyphrase."%%'";
	}
	
	//PERFORM QUERY
	$the_query="SELECT *  FROM $table_name $where_condition ORDER BY id desc limit 0,200";
	
	$rows = $wpdb->get_results($the_query);
		
	if (!$rows){
		//CASE NO RESULTS
		?>
		<div class=" ">
			<h2>Sorry, no results found.</h2>
		</div>
	<?php }
	if (1) {
		//CASE RESULTS: SHOW THEM
		?>
			
		<style>
			.bbe-admin-smaller-column {width:20%; }
			#bbe-admin-contacts-table tr:hover {background: #e5cf37}
			@media screen and (max-width: 782px) { #bbe-admin-contacts-table td {display: block;} }
		</style>
		
		<form method="post">
			<p class="search-box">
				<label class="screen-reader-text" for="post-search-input">Search:</label>
				<input type="search" name="bbe-admin-search-input" value="<?php echo esc_attr($_POST['bbe-admin-search-input']) ?>">
				<input type="submit" name="bbe-admin-search-submit" class="button" value="Find results">
			</p>
			
			<table id="bbe-admin-contacts-table" class="widefat fixed striped" cellspacing="0">
				
				<thead>
					<tr>
						<td class="bbe-admin-smaller-column">  ID / Date / IP / Page</td> <td class="bbe-admin-smaller-column">  Name / Email   </td> <td>  Subject / Message   </td>
					</tr>
				</thead>
				
				<?php foreach ( $rows as $row ):  ?>
				<?php
				//DEFINE EMAIL LINK PARS to that user can reply with their email client
				$bbe_reply_email_link_parameters= $row->email. '?subject=Re: Site+Contact+from+'. $row->name.' - Subject: '.str_replace(' ','+',$row->subject).'&body=Dear+'.$row->name.
				',%0D%0AThanks+for+getting+in+touch+with+us.%0D%0A %0D%0A %0D%0A Best regards %0D%0A %0D%0A %0D%0A  %0D%0A %0D%0A %0D%0A  Your Message: >>'.str_replace(' ','+',$row->message);
				 
				?>
					<tr>
						<td>  <b>#<?php echo $row->id ?></b> <br><?php echo date( 'j F Y, g:i a', strtotime($row->time) ); ?>
						
						
						<br>
						<a href=" http://www.ip2location.com/<?php echo bbe_check_ip_address($row->ipaddress) ?>" target="_blank"><?php echo bbe_check_ip_address($row->ipaddress) ?></a>
						<br>
						
						
						<?php echo $row->page_url ?></td>
						<td> <span style="font-size:130%;"><?php echo $row->name ?></span> <br><a href="mailto:<?php	echo $bbe_reply_email_link_parameters; ?>" target="_blank"><?php echo $row->email ?></a>  </td>
						<td> <b><?php echo $row->subject ?></b> <hr>  <?php echo $row->message ?>  <?php //echo "<br>Debug:". $bbe_reply_email_link_parameters; ?></td>
					</tr>	 
				<?php endforeach ?>
			
			</table>
		</form>
		<small style="text-align: right;display: block;margin: 30px 0;color: #777">
		Upon successful form submission, an email notification is sent to <b><?php echo get_option('bbe_contactform_emailto') ?></b>
		(<a href="<?php echo admin_url('options.php?bbe_show_specific_option=bbe_contactform_emailto'); ?>">change</a>)
		<br>
		<!-- Executed Query: <?php echo $the_query; ?> -->
		
		</small>
		  
		<?php
		} //end else
} // end function




