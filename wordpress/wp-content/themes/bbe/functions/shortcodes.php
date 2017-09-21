<?php
///////////////////////// DEMO DUMMY SHORTCODE //////////////////////
add_shortcode( 'bbe_demoshortcode', 'bbe_demoshortcode_func' );
function bbe_demoshortcode_func(){
	return '
	<div style="width:100%;padding:20px;background:#eee;text-align:center">
	<h2>I am a demo shortcode placeholder</h2><hr>
	<p>Hover this block and use the purple drop-down to edit me!</p>
	</div>
	
	
	';
}


///////////////////////// CUSTOM SIDEBARS SHORTCODE /////////////////////
function bbe_sidebar_func( $atts ){
 
    $attributes = shortcode_atts( array(
        'id' => 'bbe-widgetarea-1',
    ), $atts );
	
	extract($attributes); 
	ob_start();
	
	dynamic_sidebar($id);
	 
	$sidebar_html = ob_get_contents();
	if ($sidebar_html=="") {
		$sidebar_html="<section class='text-center' style='width:100%;padding:20px;background:#efefef';text-align:center>
							<h2>Populate this Widget Area!</h2>
							<blockquote>
								<p>Use the <a class='bbe-open-cutomizer-toeditwidgetarea' onFocus=\"javascript:jQuery(this).attr('href',jQuery('#wp-admin-bar-customize a').attr('href'));\" href='#'>theme customizer</a>  
									and go to <code>Widgets</code> >    <code>  ".$id." </code>
								</p>				
							<blockquote>
						</section>";
	}
	ob_end_clean();
	
    return $sidebar_html;
}
add_shortcode( 'bbe_widgetsarea', 'bbe_sidebar_func' );





///////////////////////////// 'POSTLIST' SHORTCODE TO GET POSTS - a simple wrap for the get_posts function /////////////
function bbe_postlist_func( $atts ){
	//EXTRACT VALUES FROM SHORTCODE CALL
	$postlist_shortcode_atts=shortcode_atts( array(
			'posts_per_page'   => 10,
			'offset'           => 0,
			'category'         => '',
			'category_name'    => '',
			'orderby'          => 'date',
			'order'            => 'DESC',
			'include'          => '',
			'exclude'          => '',
			'meta_key'         => '',
			'meta_value'       => '',
			'post_type'        => 'post',
			'post_mime_type'   => '',
			'post_parent'      => '',
			'author'	   => '',
			'post_status'      => 'publish',
			'suppress_filters' => true,
			'tax_query' => '', //custom: taxonomy=term_id
			
			'output_callback' => 'bbe_postlist_default_callback',
			'output_number_of_columns' => '', //for bbe_postlist_horizontal_callback
			'output_wrapper_class' => '',
			'output_article_class' => '',
			'output_heading_tag' => 'h2',
			//'output_hide_elements'  => 'title,author,datetime,featured,excerpt,category,comments,clearfix',
			'output_hide_elements'  => '',
			'output_excerpt_length' =>55,
			'output_excerpt_text' => '&hellip; Read more ',
			'output_featured_image_before' =>'',
			'output_featured_image_format' =>'thumbnail',
			'output_featured_image_class' => 'attachment-thumbnail img-responsive alignleft'
     ), $atts );
	 
	extract($postlist_shortcode_atts);
	
	//CUSTOM TAX QUERY CASE
	if ($tax_query!=""):
		//custom tax case
		$array_tax_query_par=explode("=",$tax_query);
		$postlist_shortcode_atts= array_merge($postlist_shortcode_atts,
											  array( 'tax_query' => array(
													array(
													  'taxonomy' => $array_tax_query_par[0], //taxonomy name
													  'field' => 'id',
													  'terms' => $array_tax_query_par[1], //term_id  
													  'include_children' => false
													)
													  )));
	endif; //end custom tax case 
	$the_posts = get_posts( $postlist_shortcode_atts );
	
	//TAKE CARE OF EXCERPT LENGTH
	global $bbe_output_excerpt_length;
	$bbe_output_excerpt_length=$output_excerpt_length;
   	add_filter( 'excerpt_length', 'bbe_postlist_func_excerpt_length', 999 );
	
	
	//EXCERPT CUSTOMIZATION
	global $bbe_output_excerpt_text;
	$bbe_output_excerpt_text=$output_excerpt_text;
	add_filter('excerpt_more', 'bbe_postlist_func__excerpt_readmore');
	
	//CHECK IF NO RESULTS
	if(!$the_posts && current_user_can("administrator")) return "<h2>No results found</h2>"; 
	
	//LAUNCH OUTPUT CALLBACK FUNCTION
	return call_user_func(  $output_callback ,$the_posts, $postlist_shortcode_atts);
	////
	
	

}
add_shortcode( 'bbe_postlist', 'bbe_postlist_func' );
function bbe_postlist_func_excerpt_length( $length ) {global $bbe_output_excerpt_length;  return $bbe_output_excerpt_length;  }
function bbe_postlist_func__excerpt_readmore() { global $bbe_output_excerpt_text;	return '&nbsp; <a href="'. get_permalink() . '">' . ' ' .$bbe_output_excerpt_text . '&nbsp;<i class="glyphicon glyphicon-arrow-right"></i> ' . '</a></p>';}
	

function bbe_postlist_func_cleanup() {
	
	remove_filter( 'excerpt_length', 'bbe_postlist_func_excerpt_length', 999 );
}


//TEMPLATING: DEFAULT ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function bbe_postlist_default_callback($the_posts,$postlist_shortcode_atts) {
	 
	global $post; $post_backup=$post; 
	extract($postlist_shortcode_atts);
	$output_hide_elements=strtolower($output_hide_elements);
	 
	ob_start(); 
	foreach ( $the_posts as $post ):    //bbe_postlist_default_callback($post);
		setup_postdata( $post );
		
	   
	   ?>
	   <article role="article" id="post_<?php the_ID()?>" class="<?php echo $output_article_class ?>">
		   <header>
			   
			   <?php if ($output_featured_image_before=="1" && strpos( $output_hide_elements,'featuredimage')  === false   ): ?>
			   <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail($output_featured_image_format,array( 'class'	=> $output_featured_image_class )); ?></a>
			   <?php endif ?>
			   
			   <?php if (strpos( $output_hide_elements,'title')  === false   ): ?>
			   <<?php echo $output_heading_tag ?>><a href="<?php the_permalink(); ?>"><?php the_title()?></a></<?php echo $output_heading_tag ?>>
			   <?php endif ?>
			   
			   <?php if (strpos( $output_hide_elements,'author')  === false  OR strpos( $output_hide_elements,'datetime')  === false  ): ?>
			   <h4>
				 <em>
				   <?php if (strpos( $output_hide_elements,'author')  === false   ): ?>
				   <span class="text-muted author"><?php _e('By', 'bbe'); echo " "; the_author() ?>,</span>
				   <?php endif ?>
					<?php if (strpos( $output_hide_elements,'datetime')  === false   ): ?>
				   <time  class="text-muted" datetime="<?php the_time('d-m-Y')?>"><?php the_time('jS F Y') ?></time>
				   <?php endif ?>
				 </em>
			   </h4>
			   <?php endif ?>
			   
		   </header>
		   <section>
			   <?php if ($output_featured_image_before!="1" && strpos( $output_hide_elements,'featuredimage')  === false   ): ?>
			   <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail($output_featured_image_format,array( 'class'	=> $output_featured_image_class )); ?></a>
			   <?php endif ?>
			   
			   <?php //the_content( __( '&hellip; ' . __('Continue reading', 'bbe' ) . ' <i class="glyphicon glyphicon-arrow-right"></i>', 'bbe' ) ); ?>
			   <?php if (strpos( $output_hide_elements,'excerpt')  === false  && $output_excerpt_length !=0  ): ?>
			   <?php the_excerpt(); ?>
			   <?php endif ?>
		   </section>
		   
		   <?php if (strpos( $output_hide_elements,'category')  === false  OR strpos( $output_hide_elements,'comments')  === false    ): ?>
		   <footer>
			   <p class="text-muted">
				   <?php if (strpos( $output_hide_elements,'category')  === false   ): ?>
				   <i class="glyphicon glyphicon-folder-open"></i>&nbsp; <?php _e('Category', 'bbe'); ?>: <?php the_category(', ') ?><br/>
				   <?php endif ?>
				   
				   <?php if (strpos( $output_hide_elements,'comments')  === false   ): ?>
				   <i class="glyphicon glyphicon-comment"></i>&nbsp; <?php _e('Comments', 'bbe'); ?>: <?php comments_popup_link(__('None', 'bbe'), '1', '%'); ?>
				   <?php endif ?>
			   </p>
		   </footer>
		   <?php endif ?>
		   
	   </article>
	   <?php if (strpos( $output_hide_elements,'clearfix')  === false      ): ?>
	   <div class="clearfix"></div>
	   <?php endif ?>
	   <?php 
   
   endforeach;
   
   
   $out =  "<div class='bbe_postlist bbe_postlist_default'> ".ob_get_contents()."</div>";
   ob_end_clean();
   wp_reset_postdata();
   
   $post=$post_backup;
   return $out;

   
   
}

//TEMPLATING: HORIZONTAL ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function bbe_postlist_horizontal_callback($the_posts,$postlist_shortcode_atts) {
	 
	global $post; $post_backup=$post; 
	extract($postlist_shortcode_atts);
	$output_hide_elements=strtolower($output_hide_elements);
	
	//define classes 
	
	if($output_number_of_columns=="") $output_number_of_columns="4";
	if($output_number_of_columns=="2") $output_article_class .=" col-md-6";
	if($output_number_of_columns=="3") $output_article_class .=" col-md-4";
	if($output_number_of_columns=="4") $output_article_class .=" col-md-3";
	if($output_number_of_columns=="6") $output_article_class .=" col-md-2";
	 
	ob_start();
	$articles_counter=0;
	foreach ( $the_posts as $post ):    //bbe_postlist_default_callback($post);
		$articles_counter++;
		
		setup_postdata( $post );
	   ?>
	   <div role="article" id="post_<?php the_ID()?>" class="<?php echo $output_article_class ?>">
		   <header>
			   
			   <?php if ($output_featured_image_before=="1" && strpos( $output_hide_elements,'featuredimage')  === false   ): ?>
			   <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail($output_featured_image_format,array( 'class'	=> $output_featured_image_class )); ?></a>
			   <?php endif ?>
			   
			   <?php if (strpos( $output_hide_elements,'title')  === false   ): ?>
			   <<?php echo $output_heading_tag ?>><a href="<?php the_permalink(); ?>"><?php the_title()?></a></<?php echo $output_heading_tag ?>>
			   <?php endif ?>
			   
			   <?php if (strpos( $output_hide_elements,'author')  === false  OR strpos( $output_hide_elements,'datetime')  === false  ): ?>
			   <h4>
				 <em>
				   <?php if (strpos( $output_hide_elements,'author')  === false   ): ?>
				   <span class="text-muted author"><?php _e('By', 'bbe'); echo " "; the_author() ?>,</span>
				   <?php endif ?>
					<?php if (strpos( $output_hide_elements,'datetime')  === false   ): ?>
				   <time  class="text-muted" datetime="<?php the_time('d-m-Y')?>"><?php the_time('jS F Y') ?></time>
				   <?php endif ?>
				 </em>
			   </h4>
			   <?php endif ?>
			   
		   </header>
		   <section>
			   <?php if ($output_featured_image_before!="1" && strpos( $output_hide_elements,'featuredimage')  === false   ): ?>
			   <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail($output_featured_image_format,array( 'class'	=> $output_featured_image_class )); ?></a>
			   <?php endif ?>
			   
			   <?php //the_content( __( '&hellip; ' . __('Continue reading', 'bbe' ) . ' <i class="glyphicon glyphicon-arrow-right"></i>', 'bbe' ) ); ?>
			   <?php if (strpos( $output_hide_elements,'excerpt')  === false  && $output_excerpt_length !=0  ): ?>
			   <?php the_excerpt(); ?>
			   <?php endif ?>
		   </section>
		   
		   <?php if (strpos( $output_hide_elements,'category')  === false  OR strpos( $output_hide_elements,'comments')  === false    ): ?>
		   <footer>
			   <p class="text-muted">
				   <?php if (strpos( $output_hide_elements,'category')  === false   ): ?>
				   <i class="glyphicon glyphicon-folder-open"></i>&nbsp; <?php _e('Category', 'bbe'); ?>: <?php the_category(', ') ?><br/>
				   <?php endif ?>
				   
				   <?php if (strpos( $output_hide_elements,'comments')  === false  &&  comments_open()  ): ?>
				   <i class="glyphicon glyphicon-comment"></i>&nbsp; <?php _e('Comments', 'bbe'); ?>: <?php comments_popup_link(__('None', 'bbe'), '1', '%'); ?>
				   <?php endif ?>
			   </p>
		   </footer>
		   <?php endif ?>
		   
	   </div>
	   <?php if ($articles_counter==$output_number_of_columns): $articles_counter=0;?>
	   <div class="clearfix"></div>
	   <?php endif ?>
	   <?php 
   
   endforeach;
   
   $out =  "<div class='bbe_postlist bbe_postlist_horizontal row'> ".ob_get_contents()."</div>";
   ob_end_clean();
   wp_reset_postdata();
   
   $post=$post_backup;
   return $out;

   
   
}
   

    
//TEMPLATING: CAROUSEL ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function bbe_postlist_carousel_callback($the_posts,$postlist_shortcode_atts) {
	global $post;
	$post_backup=$post;
	$bbe_carousel_index=rand(0,1000);
	extract($postlist_shortcode_atts); 
	$output_hide_elements=strtolower($output_hide_elements);
	
	ob_start();
	?> 
	<section id="bbe-carousel-index-<?php echo $bbe_carousel_index; ?>" class="carousel slide" data-ride="carousel">
		
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<?php
			$carousel_item_count=0;
			foreach ( $the_posts as $post ): ?>
				 <li data-target="#bbe-carousel-index-<?php echo $bbe_carousel_index; ?>" data-slide-to="<?php echo $carousel_item_count ?>" <?php if ($carousel_item_count==0): ?>class="active" <?php endif ?>></li>
				<?php $carousel_item_count++;
			endforeach ?>
		</ol>
		
		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<?php
			$carousel_item_count=0;
			foreach ( $the_posts as $post ):
				setup_postdata( $post );
				$carousel_item_count++;
				$image_url_array = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), $output_featured_image_format);
				?>
				<div id="post_<?php the_ID()?>" class="item <?php if ($carousel_item_count==1) echo "active "; ?><?php echo $output_article_class ?>">
					<img src="<?php echo $image_url_array[0] ?>" alt="<?php echo esc_attr(get_the_title()); ?>" >																
					<div class="carousel-caption">
						
						<?php if (strpos( $output_hide_elements,'title')  === false   ): ?>
						<<?php echo $output_heading_tag ?>><a href="<?php the_permalink(); ?>"><?php the_title()?></a></<?php echo $output_heading_tag ?>>
						<?php endif ?>
						
						<?php if (strpos( $output_hide_elements,'author')  === false  OR strpos( $output_hide_elements,'datetime')  === false  ): ?>
						<h4> 
						  <em>
							<?php if (strpos( $output_hide_elements,'author')  === false   ): ?>
							<span class="text-muted author"><?php _e('By', 'bbe'); echo " "; the_author() ?>,</span>
							<?php endif ?>
							 <?php if (strpos( $output_hide_elements,'datetime')  === false   ): ?>
							<time  class="text-muted" datetime="<?php the_time('d-m-Y')?>"><?php the_time('jS F Y') ?></time>
							<?php endif ?>
						  </em>
						</h4>
						<?php if (strpos( $output_hide_elements,'excerpt')  === false  && $output_excerpt_length !=0 ): ?>
								<div class="excerpt"><?php the_excerpt() ?></div>
								<?php endif ?>
						<?php endif ?>
					
					</div> <!-- close carousel caption -->
				</div> <!-- close item -->
				<?php
			endforeach;
			?>
		</div>
		
		
		<!-- Controls -->
		<a class="left carousel-control" href="#bbe-carousel-index-<?php echo $bbe_carousel_index; ?>" role="button" data-slide="prev">
		  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		  <span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#bbe-carousel-index-<?php echo $bbe_carousel_index; ?>" role="button" data-slide="next">
		  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		  <span class="sr-only">Next</span>
		</a>
		
	</section>

	
	<?php
	$out =   ob_get_contents();
	ob_end_clean();
	wp_reset_postdata();
	$post=$post_backup;
	return $out;
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//TEMPLATING: Custom BASIC Demo /// move to blog
function bbe_postlist_custom_callback($the_posts,$postlist_shortcode_atts) {
	 
	global $post; $post_backup=$post; 
	//extract($postlist_shortcode_atts); ///no real need but if you want you can decode and access shortcode parameters
	ob_start();
	foreach ( $the_posts as $post ):    //bbe_postlist_default_callback($post);
	 
		setup_postdata( $post );
		?>
		<article role="article" id="post_<?php the_ID()?>"  >
			<header>
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail("thumbnail",array( 'class'	=> 'attachment-thumbnail' )); ?></a>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title()?></a></h2>
				<h4>
				  <em>
					<span class="text-muted author"><?php _e('By', 'bbe'); echo " "; the_author() ?>,</span>
					<time class="text-muted" datetime="<?php the_time('d-m-Y')?>"><?php the_time('jS F Y') ?></time>
				  </em>
				</h4> 
				
			</header>
			<section><?php the_excerpt(); ?></section>
		 
			<footer>
				<p class="text-muted">
			  
				   <i class="glyphicon glyphicon-folder-open"></i>&nbsp; <?php _e('Category', 'bbe'); ?>: <?php the_category(', ') ?><br/>
				   <i class="glyphicon glyphicon-comment"></i>&nbsp; <?php _e('Comments', 'bbe'); ?>: <?php comments_popup_link(__('None', 'bbe'), '1', '%'); ?>
					
				</p>
			</footer>
		</article>
		<?php 
   endforeach;
   $out =  "<section class='bbe_postlist bbe_postlist_custom'> ".ob_get_contents()."</section>";
   ob_end_clean();
   wp_reset_postdata();
   $post=$post_backup;
   return $out;
}
   



////SHORTCODE BBE NEWSMIXER

add_shortcode( 'bbe_newsmixer', 'bbe_newsmixer_func' );

function bbe_newsmixer_func($atts) {
	
	$the_shortcode_atts=shortcode_atts( array(
			'cats'   => "", //category IDs,comma separated
			'cat_query_args' =>"",
			'heading_postfix'   => "",
			 
     ), $atts );
	 
	extract($the_shortcode_atts);
	
	if($cats==""){
		//If no 'cats' parameter is supplied, list all categories
		$categories = get_categories( $cat_query_args );
		$cats="";
		foreach($categories as $c) $cats .= $c->term_taxonomy_id.",";
	}
	 
	$array_cats=explode(',',$cats);
	 
	$html="";
	$attributes=$atts;
	foreach ($array_cats as $cat_id):
	
		$attributes['category']=$cat_id;
		$html.= ' <div class="page-header "> <h1>  '.get_cat_name($cat_id).' <span class="text-muted">  '.$heading_postfix.' </span></h1>   </div> ';
		$html.= bbe_postlist_func($attributes);
		  
		 
	endforeach;
	return "<div class='bbe-newsmixer'>". $html."</div>";
}
		
		
		
//////////////////////////////////////////////


////SHORTCODE BBE NEWSMIXER CUSTOM TAX

add_shortcode( 'bbe_newsmixer_tax', 'bbe_newsmixer_tax_func' );

function bbe_newsmixer_tax_func($atts) {
	
	$the_shortcode_atts=shortcode_atts( array(
			'tax_name'   => "",
			'term_ids' =>"",
			'heading_postfix'   => "",
			 
     ), $atts );
	 
	extract($the_shortcode_atts);
	
	if($term_ids==""){
		//If no 'term_ids' parameter is supplied, list all terms in tax
		$terms = get_terms( array( 'taxonomy' => $tax_name,  'hide_empty' => false,) );
		$term_ids="";
		foreach($terms as $t) $term_ids .= $t->term_taxonomy_id.",";
	 
	}
	 
	$array_terms=explode(',',$term_ids);
	 
	$html="";
	$attributes=$atts;
	foreach ($array_terms as $term_id):
		 //$html.=$tax_name.'='.$term_id;
		$attributes['tax_query']=$tax_name.'='.$term_id;
		$TermObject = get_term_by( 'id', $term_id ,$tax_name);
		if(!$TermObject) $html.= '<h3>Wrong '.$term_id .' parameter </h3> ';
			else {
			$html.= ' <div class="page-header "> <h1>    '.$TermObject->name.' <span class="text-muted">  '.$heading_postfix.' </span></h1>   </div> ';
			$html.= bbe_postlist_func($attributes);
		}	  
		 
	endforeach;
	return "<div class='bbe-newsmixer-tax'>". $html."</div>";
}
		
		
		
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////// 'CATLIST' SHORTCODE TO LIST ELEMENTS FROM CATEGORY - A simple wrap for wp_list_categories /////////////
function bbe_catlist_func( $atts ){
	//EXTRACT VALUES FROM SHORTCODE CALL
	$catlist_shortcode_atts=shortcode_atts( array(
			'child_of'  => '0',
			'current_category' => '0',
			'depth'  => '0',
			'echo'  => false, //so we return the output in a string instead of printing it
			 // INPUT-RELATED PARAMETERS
			'exclude' => false,
			'exclude_tree' => false, //ADD feed,feed_image,feed_type ?
			'hide_empty' => '1',
			'hide_title_if_empty' => false,
			'hierarchical' => true,
			'order' => 'ASC',
			'orderby' => 'ID',
			'separator' => '<br>',
			'show_count' => 0,
			'show_option_all' =>  false,
			'show_option_none' => 'No categories',
			'style'   => 'list',
			'taxonomy'   => 'category',
			'title_li' => 'Categories',
			'use_desc_for_title'     => 1,
			// OUTPUT-RELATED PARAMETERS
			'output_callback' => 'bbe_catlist_default_callback',
     ), $atts );
	
	extract($catlist_shortcode_atts);
	
	//GET THE THING
 
	$the_cats = wp_list_categories( $catlist_shortcode_atts );
	 
	//LAUNCH OUTPUT CALLBACK FUNCTION
	return call_user_func(  $output_callback ,$the_cats, $catlist_shortcode_atts);
} 

add_shortcode( 'bbe_catlist', 'bbe_catlist_func' );

//////////////// CATLIST: OUTPUT CALLBACKS /////////////////////////
////////////////////////////////////////////////////////////////////

/////////////////CATSLIST OUTPUT DEFAULT CALLBACK //////////////////////
function bbe_catlist_default_callback($the_cats,$catlist_shortcode_atts){
	extract($catlist_shortcode_atts);
	return "<ul>". $the_cats. "</ul>";
}
/////////////////ADD TO BLOG //////////////////////
function bbe_catlist_custom_callback($the_cats,$catlist_shortcode_atts){
	extract($catlist_shortcode_atts);
	//PROCESS THINGS ....
	return "<ul>". $the_cats. "</ul>";
}
