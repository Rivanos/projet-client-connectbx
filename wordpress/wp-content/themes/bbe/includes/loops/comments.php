<?php

// Do not delete this section
if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])){
  die ('Please do not load this page directly. Thanks!'); }
if ( post_password_required() ) { ?>
  <div class="alert alert-warning">
    <?php _e('Cet article est protegé. Entré votre password pour voir les commenaires.', 'bbe'); ?>
  </div>
<?php
  return;
}
// End do not delete section

if (have_comments()) : ?>

<h3><?php _e('Feedback', 'bbe'); ?></h3>
<p class="text-muted" style="margin-bottom: 20px;">
 <i class="glyphicon glyphicon-comment"></i>&nbsp; <?php _e('Commentaires', 'bbe');  ?>: <?php comments_number(__('Aucun', 'bbe'), '1', '%'); ?>
</p>

<ol class="commentlist">
  <?php wp_list_comments('type=comment&callback=bbe_comment');?>
</ol>

<ul class="pagination">
  <li class="older"><?php previous_comments_link() ?></li>
  <li class="newer"><?php next_comments_link() ?></li>
</ul>

<?php
  else :
	  if (comments_open()) :
  echo "<p class='alert alert-info'>" . __('Sois le premier à écrire quelque chose sur cet article.', 'bbe') . "</p>";
		else :
			echo "<p class='alert alert-warning hidden'>" . __('Les commentaires sont fermés pour cet article.', 'bbe') . "</p>";
		endif;
	endif;
?>

<?php if (comments_open()) : ?>
<section id="respond">
  <h3><?php comment_form_title(__('Votre commentaires', 'bbe'), __('Réponses pour %s', 'bbe')); ?></h3>
  <br />
  <p><?php cancel_comment_reply_link(); ?></p>
  <?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
  <p><?php printf(__('Tu dois être <a href="%s">logged in</a> pour poster un commentaire.', 'bbe'), wp_login_url(get_permalink())); ?></p>
  <?php else : ?>
  <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
    <?php if (is_user_logged_in()) : ?>
    <p>
      <?php printf(__('Vous êtes connecté en tant que', 'bbe') . ' <a href="%s/wp-admin/profile.php">%s</a>.', get_option('siteurl'), $user_identity); ?>
      <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php __('Deconnexion de ce compte', 'bbe'); ?>"><?php echo __('Deconnexion', 'bbe') . ' <i class="glyphicon glyphicon-arrow-right"></i>'; ?></a>
    </p>
    <?php else : ?>
    <div class="form-group" id="form-group-name">
      <label for="author"><?php _e('Votre nom', 'bbe'); if ($req) echo ' <span class="text-muted">' . __('(Requis)', 'bbe') . '</span>'; ?></label>
      <input type="text" class="form-control" name="author" id="author" placeholder="<?php _e('Vore nom', 'bbe'); ?>" value="<?php echo esc_attr($comment_author); ?>" <?php if ($req) echo 'aria-required="true" required="true"'; ?> >
    </div>
    <div class="form-group" id="form-group-email">
      <label for="email"><?php _e('Votre email', 'bbe'); if ($req) echo ' <span class="text-muted">' . __('(Requis. Ces informations ne seront pas dévoilés au public)', 'bbe') . '</span>'; ?></label>
      <input type="email" class="form-control" name="email" id="email" placeholder="<?php _e('Votre email', 'bbe'); ?>" value="<?php echo esc_attr($comment_author_email); ?>" <?php if ($req) echo 'aria-required="true" required="true"'; ?>  >
    </div>
	<div class="form-group" id="form-group-email-address"> <?php //  just a honeypot ?>
      <label for="email"><?php _e('Votre email (encore un fois)', 'bbe'); ?></label>
      <input type="email" class="form-control" name="email-address" id="email-address" placeholder="<?php _e('Votre email (encore un fois)', 'bbe'); ?>" value="" >
    </div>
    <?php endif; ?>
    <div class="form-group">
      <label for="comment"><?php _e('Votre commentaire', 'bbe'); ?></label>
      <textarea name="comment" class="form-control" id="comment" placeholder="<?php _e('Votre commentaire', 'bbe'); ?>" rows="8" aria-required="true" required="true" ></textarea>
    </div>
    <p><input name="submit" class="btn btn-default" type="submit" id="submit" value="<?php _e('Envoyer', 'bbe'); ?>"></p>
    <?php comment_id_fields(); ?>
    <?php do_action('comment_form', $post->ID); ?>
  </form>
  <?php endif; ?>
</section>
<?php endif; ?>
