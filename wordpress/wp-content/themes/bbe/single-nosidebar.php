<?php


/*
Template Name: No Sidebar Standard Single
Template Post Type: post, page
*/

get_template_part('includes/header'); ?>

<div class="container">
  <div class="row">
    
    <div class="col-xs-12  ">
      <div id="content" role="main">
        <?php get_template_part('includes/loops/content', 'single'); ?>
      </div><!-- /#content -->
    </div>
     
    
  </div><!-- /.row -->
</div><!-- /.container -->

<?php get_template_part('includes/footer'); ?>
