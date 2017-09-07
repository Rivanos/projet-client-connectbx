<?php get_template_part('includes/header'); ?>

<div class="container">
  <div class="row">
    
    <div class="col-xs-12 <?php if ((get_theme_mod('archives_template')=='')): ?>col-sm-8<?php endif ?>">
      <div id="content" role="main" data-template-var="<?php echo get_theme_mod('archives_template') ?>">
       
        <?php
        the_archive_title( '<h1>', '</h1>' );
        if (!is_paged()) the_archive_description( '<div class="taxonomy-description">', '</div>' );
        ?>

        <div class="clearfix"></div>
        <hr>
        <?php if (get_theme_mod('archives_template')=="") $extra=""; else $extra="-".get_theme_mod('archives_template') ?>
        <?php get_template_part('includes/loops/content'.$extra, get_post_format()); ?>
      </div><!-- /#content -->
    </div>
    <?php if ((get_theme_mod('archives_template')=='')): ?>
    <div class="col-xs-12 col-sm-4" id="sidebar" role="navigation">
       <?php get_template_part('includes/sidebar'); ?>
    </div>
    <?php endif ?>
    
  </div><!-- /.row -->
</div><!-- /.container -->

<?php get_template_part('includes/footer'); ?>
