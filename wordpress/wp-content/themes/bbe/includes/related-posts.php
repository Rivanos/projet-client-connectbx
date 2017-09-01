<?php

$post_categories = get_the_category(get_the_ID());

if ($post_categories):
    ?>
    <h3 class="bbe-related-title">Articles Reliés</h3>
    <?php
    $category_ids = array();
    foreach($post_categories as $individual_category) $category_ids[] = $individual_category->term_id;
    //PRINT_R($category_ids);
    $args=array(
    'category__in' => $category_ids,
    //'category__not_in' => array(0,1),
    'post__not_in' => array(get_the_ID()),
    'posts_per_page'=> 9, // Number of related posts that will be shown.
    'caller_get_posts'=>1
    );
    $related_posts=get_posts($args);
    if( $related_posts ) {
        ?><div id="bbe-related-posts">
        <div class="row">
        <?php
        $col_count=0;
        foreach($related_posts as $related_post):
             $col_count++;
             ?>
            <div class="col-md-4">
                <div class="relatedthumb">
                    <a href="<?php echo  get_permalink($related_post->ID) ?>" rel="bookmark" title="<?php echo esc_attr(get_the_title($related_post->ID)); ?>">
                    <?php echo get_the_post_thumbnail($related_post->ID,'medium',array(
                                                                                'src'	=> $src,
                                                                                'class'	=> "attachment-$size img-responsive",
                                                                                'alt'	=> trim(strip_tags( $attachment->post_excerpt )),
                                                                                'title'	=> trim(strip_tags( $attachment->post_title )),
                                                                            )); ?>
                    </a>
                </div>
                <div class="relatedcontent">
                <h4><a href="<?php echo esc_attr(get_permalink($related_post->ID)) ?>" rel="bookmark" title="<?php echo esc_attr(get_the_title($related_post->ID)); ?>"><?php echo esc_attr(get_the_title($related_post->ID)); ?></a></h4>
                </div>
            </div>
            <?php
            if ($col_count==3) { $col_count=0; ?> <div class="clearfix"></div><?php }
        endforeach;
        ?></div> <!-- /row -->
        </div> <!-- /related -->
        <?php
        }

endif; //end if categories
