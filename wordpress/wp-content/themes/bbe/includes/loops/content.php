<?php
/*
The Default Loop (used by index.php and archive.php)
=====================================================

If you require only post excerpts to be shown in index and archive pages, then use the [---more---] tag within blog posts to cut content.

If you require different templates for different post types,
then simply duplicate this template, save the copy as, e.g. "content-aside.php",
and modify it the way you like it.
(The function-call "get_post_format()" within index.php, category.php and single.php will redirect WordPress to use your custom content template.)

*/
?>

<?php if(have_posts()): while(have_posts()): the_post();?>
    <article role="article" id="post-<?php the_ID()?>" <?php post_class(); ?>>
        <header>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title()?></a></h2>
            <h5>
              <em>
                <?php if (bbe_option_is_true('archives_author')): ?><span class="text-muted author"><?php _e('Par', 'bbe'); echo " "; the_author() ?><?php if (bbe_option_is_true('archives_author') && bbe_option_is_true('archives_meta_date')) echo ","?></span><?php endif ?>
                <?php if (bbe_option_is_true('archives_meta_date')): ?><time  class="text-muted" datetime="<?php the_time('d-m-Y')?>"><?php the_time('jS F Y') ?></time><?php endif ?>
              </em>
            </h5>
        </header>
        <section>
            <?php if (!is_single()): ?><a href="<?php the_permalink(); ?>"><?php endif ?>
            <?php if (bbe_option_is_true('archives_featuredimage')) the_post_thumbnail(); ?>
            <?php if (!is_single()): ?></a><?php endif ?>
            <?php if(!bbe_option_is_true('archives_use_excerpt' ) or  bbe_post_is_using_bbe_template(get_the_ID())) the_excerpt(); else the_content( __( '&hellip; ' . __('Continuer à lire', 'bbe' ) . ' <i class="glyphicon glyphicon-arrow-right"></i>', 'bbe' ) ); ?>
        </section>
        <footer>
            <p class="text-muted">
                <?php if (bbe_option_is_true('archives_meta_category')): ?><i class="glyphicon glyphicon-folder-open"></i>&nbsp; <?php _e('Catégorie', 'bbe'); ?>: <?php the_category(', ') ?><br/><?php endif ?>
                <?php if (bbe_option_is_true('archives_meta_comments')): ?><i class="glyphicon glyphicon-comment"></i>&nbsp; <?php _e('Commentaires', 'bbe'); ?>: <?php comments_popup_link(__('Aucun', 'bbe'), '1', '%', 'comments-link', 'Comments off'); ?><?php endif ?>
            </p>
        </footer>
    </article>
<?php endwhile; ?>

<?php if ( function_exists('bbe_pagination') ) { bbe_pagination(); } else { ?>
  <ul class="pagination">
    <li class="older"><?php next_posts_link('<i class="glyphicon glyphicon-arrow-left"></i> ' . __('Page précédente', 'bbe')) ?></li>
    <li class="newer"><?php previous_posts_link(__('Page suivante', 'bbe') . ' <i class="glyphicon glyphicon-arrow-right"></i>') ?></li>
  </ul>
<?php } ?>

<?php else: wp_redirect(get_bloginfo('siteurl').'/404', 404); exit; endif; ?>
