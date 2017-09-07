<?php
/*
All the functions are in the PHP pages in the functions/ folder.
*/

require_once locate_template('/functions/cleanup.php');
require_once locate_template('/functions/setup.php');
require_once locate_template('/functions/enqueues.php');
require_once locate_template('/functions/wp-bootstrap-navwalker.php');
require_once locate_template('/functions/widgeted-areas.php');
require_once locate_template('/functions/search.php');
require_once locate_template('/functions/feedback.php');
require_once locate_template('/functions/responsive-media.php');
require_once locate_template('/functions/google-fonts.php');
require_once locate_template('/functions/theme-customizer.php');
require_once locate_template('/functions/shortcodes.php');

require_once locate_template('/bbe-engine/index.php'); 

//FORMS ENGINE
if(  bbe_option_is_true('bbe_forms_engine')) require_once locate_template('extras/bbe-forms-engine/index.php'); 


if( !function_exists('bbe_disable_comment_antispam')) require_once locate_template('extras/comment-anti-spam.php'); 

