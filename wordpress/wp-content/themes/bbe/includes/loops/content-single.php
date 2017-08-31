<?php
/*
The Single Posts Loop
=====================
*/


?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>
    <article role="article" id="post_<?php the_ID()?>" <?php post_class()?>>
        <header>
            <h1><?php the_title()?></h1>

            <h4 class="bbe-author-time">
                <em>
                    <?php if (bbe_option_is_true('singlepost_author')): ?><span class="text-muted author"><?php _e('Par', 'bbe'); echo " "; the_author() ?><?php if (bbe_option_is_true('singlepost_meta_date')): ?>,<?php endif ?></span><?php endif ?>
                    <?php if (bbe_option_is_true('singlepost_meta_date')): ?><time  class="text-muted" datetime="<?php the_time('d-m-Y')?>"><?php the_time('jS F Y') ?></time><?php endif ?>
                </em>
            </h4>

            <p class="text-muted bbe-single-category-comments">
                <?php if (bbe_option_is_true('singlepost_meta_category')): ?><i class="glyphicon glyphicon-folder-open"></i>&nbsp; <?php _e('Rangé sous', 'bbe'); ?>: <?php the_category(', ') ?><br/><?php endif ?>
                <?php if (bbe_option_is_true('singlepost_meta_comments')): ?><i class="glyphicon glyphicon-comment"></i>&nbsp; <?php _e('Commentaires', 'bbe'); ?>: <?php comments_popup_link(__('Aucune', 'bbe'), '1', '%', 'comments-link', 'Comments off'); ?><?php endif ?>
            </p>

        </header>
        <section>
           <?php if (bbe_option_is_true('singlepost_featuredimage')) the_post_thumbnail(); ?>
            <?php the_content()?>
            <?php wp_link_pages(); ?>
        </section>
    </article>
<?php comments_template('/includes/loops/comments.php'); ?>
<?php endwhile; ?>
<?php else: ?>
<?php wp_redirect(get_bloginfo('siteurl').'/404', 404); exit; ?>
<?php endif; ?>
