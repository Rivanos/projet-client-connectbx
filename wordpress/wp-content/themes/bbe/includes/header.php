<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?> <?php if ( is_multisite() ): ?>data-sid="<?php echo get_current_blog_id() ?>"<?php endif ?>>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	</script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-nav-pos="<?php echo get_theme_mod('header_navbar_choice') ?>" >
<?php
//want to hide the menubar on a page? set custom field 'bbe_hide_menu' to 1
if ( (get_theme_mod('header_navbar_choice')!='navbar-hidden') && (!is_numeric($post->ID) or get_post_meta($post->ID,'bbe_hide_menu',TRUE)!=1)): ?>
<nav id="main-nav" class="navbar <?php if (get_theme_mod('header_navbar_choice')=="") echo "navbar-static-top "; else echo get_theme_mod('header_navbar_choice')." "; if (get_theme_mod('header_navbar_color_choice')=="") echo "navbar-default"; else echo get_theme_mod('header_navbar_color_choice'); ?>">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
       <a class="navbar-brand" href="<?php echo home_url('/'); ?>"><?php
			if ( get_theme_mod( 'themeslug_logo' ) ) { ?>  <img class="navbar-brand" id="top-logo" src='<?php echo esc_url( get_theme_mod( 'themeslug_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'> <?php
			} else  { ?> <div id="top-textlogo"><?php  bloginfo('name'); ?></div> <?php } ?>
			<?php if (get_theme_mod('tagline_visibility')==""): ?><small id="top-description" class="whiteColorText text-muted hidden-xs hidden-sm"><?php bloginfo("description") ?></small><?php endif ?>
		</a>
    </div>
    <div class="collapse navbar-collapse" id="navbar">
      <?php
            wp_nav_menu( array(
                'theme_location'    => 'navbar-left',
                'depth'             => 3,
				'container_class'	=> 'menuwrap-left',
                'menu_class'        => 'nav navbar-nav navbar-left',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>
        <?php   if (get_theme_mod('header_navbar_search_form')=="") get_template_part('includes/navbar-search'); ?>
        <?php
            wp_nav_menu( array(
                'theme_location'    => 'navbar-right',
                'depth'             => 3,
				'container_class'	=> 'menuwrap-right',
                'menu_class'        => 'nav navbar-nav navbar-right',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container -->
</nav>
<?php endif ?>
