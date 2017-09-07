<?php

/*
Template Name: BBE Full Width Template with Comments
Template Post Type: post, page
*/

?>

<?php get_template_part('includes/header'); ?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>

<?php bbe_magic_editor();  ?>


<div class=bbe-comments-single-wrap">
		<div class="container">
				<div class="col-xs-12">
						<?php comments_template('/includes/loops/comments.php'); ?>
				</div>		
		</div>
</div>
 
<?php endwhile; ?>
<?php else: ?>
<?php wp_redirect(get_bloginfo('siteurl').'/404', 404); exit; ?>
<?php endif; ?>




<?php get_template_part('includes/footer'); ?>
