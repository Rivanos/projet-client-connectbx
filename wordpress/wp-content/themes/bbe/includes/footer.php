<div id="bbe-footer-wrap">
  <footer class="container site-footer">
	<hr/>
	<?php $footer_columns_schema = get_theme_mod('footer_columns_schema', '4-8');
		if($footer_columns_schema!="0" && (!is_numeric($post->ID) or get_post_meta($post->ID,'bbe_hide_footer',TRUE)!=1)):
		?>
		<div class="row">
			<?php
			$number_of_footer_columns=substr_count($footer_columns_schema,'-')+1;
			$array_column_sizes=explode('-',$footer_columns_schema);
			for ($count=1; $count<=$number_of_footer_columns; $count++):
				?>
				<div id="footer-column-<?php echo $count ?>" class="footer-column col-md-<?php echo $array_column_sizes[$count-1] ?>">
					<?php dynamic_sidebar('footer-'.$count);   ?>
				</div><!-- /footer-column  -->
				<?php
			endfor;
			?>
		</div> <!-- /row -->
		<hr/>
	<?php endif ?>

	<div class="row">
	  <div class="col-lg-12 site-sub-footer"> <?php wp_footer_colophon() ?>  </div>
	</div>
  </footer>
</div> <!-- /bbe-footer-wrap -->

<?php wp_footer(); ?>
</body>
</html>
