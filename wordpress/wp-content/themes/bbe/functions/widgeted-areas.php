<?php

function bbe_widgets_init() {

  //MAIN SIDEBAR
  register_sidebar( array(
    'name'            => __( 'Main Sidebar', 'bbe' ),
    'id'              => 'sidebar-widget-area',
    'description'     => __( 'The main sidebar widget area', 'bbe' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
    'before_title'    => '<h4 class="widget-title sidebar-widget-title">',
    'after_title'     => '</h4>',
  ) );


  //FOOTER WIDGET AREAS ///////
	$footer_columns_schema = get_theme_mod('footer_columns_schema', '8-4');
  $number_of_footer_columns=substr_count($footer_columns_schema,'-')+1;
  
	for ($count=1; $count<=$number_of_footer_columns; $count++) {
		register_sidebar( array(
			'name'          => __( 'Footer ', 'bbe' ) . $count,
			'id'            => 'footer-' . $count,
			'description'   => '',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title footer-widget-title">',
			'after_title'   => '</h4>',
		) );
	}
  
	
	///BBE CUSTOM WIDGET AREAS
	for ($count=1; $count<=20; $count++) {
		
			register_sidebar( array(
			'name'          => __( 'BBE Widgets Area', 'bbe' ) .' '.$count,
			'id'            => 'bbe-widgetarea-'. $count,
			'description'   => '',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'    => '<h4 class="widget-title bbe-widget-title">',
			'after_title'     => '</h4>',
		) );
	}
  
}
add_action( 'widgets_init', 'bbe_widgets_init' );
