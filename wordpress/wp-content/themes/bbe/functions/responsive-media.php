<?php

///RESPONSIVE VIDEOS HELPER: a modern approach /////////////////////////
// Hook onto 'oembed_dataparse' and get 2 parameters
add_filter( 'oembed_dataparse','responsive_wrap_oembed_dataparse',10,2);
function responsive_wrap_oembed_dataparse( $html, $data ) {

		//return $data ->provider_url; //test
		
		// Verify oembed data (as done in the oEmbed data2html code)
		if ( ! is_object( $data ) || empty( $data->type ) || (!isset($data->width)) || (!isset($data->height)) || ($data->height==0) ) return $html;
		
		// Disable for other types of embed except video and rich
		if (   $data->type != 'video' && $data->type != 'rich'   ) return $html;
		
		//a few exceptions: some rich media don't need the treatment and just need some width wrapper
		if (
		(isset($data ->provider_url) && $data ->provider_url=='http://imgur.com') OR
		(isset($data ->provider_url) && $data ->provider_url=='http://www.meetup.com/')  
		)
				return "<div class='bbe-responsive-embed embed-responsive-alt'>".$html."</div>";
		
		// Calculate aspect ratio
		$ar = $data->width / $data->height;
		
		// Set the aspect ratio modifier
		$class_name = ( abs($ar-(4/3)) < abs($ar-(16/9)) ? 'embed-responsive-4by3' : 'embed-responsive-16by9');
		
		// Strip width and height from html
		$html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
		
		//if it's a video type, create some inline styling to correct aspect ratio
		if ( $data->type == 'video') $inline_style='style="padding-bottom:'.number_format(((1/$ar)*100),5).'%"'; else $inline_style="";
		
		//check if inline styling would be useless
		if ($class_name=="embed-responsive-16by9" && abs($ar-(16/9))<0.05) $inline_style="";
		if ($class_name=="embed-responsive-4by3" && abs($ar-(4/3))<0.05) $inline_style="";
		
		return '<div class="bbe-responsive-embed embed-responsive '.$class_name.'" '.$inline_style.'> '.$html.' </div>';

}


 