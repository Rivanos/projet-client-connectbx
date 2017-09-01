<?php


////////// Frontend Utility Functions //////

function bbe_option_is_true ($option_name)

{
	//Always defaults to true if user didnt choose 
	$option_value=get_theme_mod($option_name);
	//echo" <script> alert(' $option_name IS NOW: $option_value'); </script> ";
	if ( $option_value!="" && $option_value=="0") return FALSE; else return TRUE;
}

///////// End Frontend Utility Functions //////


//ENABLE SELECTIVE REFRESH 
add_theme_support( 'customize-selective-refresh-widgets' );

//ADD HELPER ICONS
function bbe_register_main_partials( WP_Customize_Manager $wp_customize ) {
 
    // Abort if selective refresh is not available.
    if ( ! isset( $wp_customize->selective_refresh ) ) {
        return;
    }
 
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//blogname
    $wp_customize->selective_refresh->add_partial( 'header_site_title', array(
        'selector' => '#top-textlogo',
        'settings' => array( 'blogname' ),
        'render_callback' => function() {
            return get_bloginfo( 'name', 'display' );
        },
    ));
	
	//blog description
    $wp_customize->selective_refresh->add_partial( 'header_site_desc', array(
        'selector' => '#top-description',
        'settings' => array( 'blogdescription' ),
        'render_callback' => function() {
            return get_bloginfo( 'description', 'display' );
        },
    ));
	
	//navbar search
	$wp_customize->selective_refresh->add_partial( 'header_search_form', array(
        'selector' => '#navbar .navbar-form',
        'settings' => array( 'header_navbar_search_form' ),
          
    ));
	
	//MENUS
	$wp_customize->selective_refresh->add_partial( 'header_menu_left', array(
        'selector' => '#navbar .menuwrap-left',
        'settings' => array( 'nav_menu_locations[navbar-left]' ),
          
    ) );
	
	//too much - confusion, so we disable that
	if(0) $wp_customize->selective_refresh->add_partial( 'header_menu_right', array(
        'selector' => '#navbar .menuwrap-right',
        'settings' => array( 'nav_menu_locations[navbar-right]' ),     
    ));
	
	//footer text
	$wp_customize->selective_refresh->add_partial( 'footer_ending_text', array(
        'selector' => 'footer .site-sub-footer',
        'settings' => array( 'footer_text' ),
		'render_callback' => function() {
             return bbe_footer();
        },     
    ));
	//inline css
	$wp_customize->selective_refresh->add_partial( 'bbe_inline_css', array(
        'selector' => '#bbe-inline-style',
        'settings' => array( 'bbe_footer_bgcolor','bbe_links_color','bbe_hover_links_color','bbe_headings_font','bbe_body_font'  ),
		'render_callback' => function() {
             return bbe_footer_add_inline_css();
        },
    ));
	
	  
		
		
}
add_action( 'customize_register', 'bbe_register_main_partials' );

 
//CUSTOM BACKGROUND
$defaults_bg = array(
'default-color'          => '',
'default-image'          => '',
'default-repeat'         => '',
'default-position-x'     => '',
'default-attachment'     => '',
'wp-head-callback'       => '_custom_background_cb',
'admin-head-callback'    => '',
'admin-preview-callback' => ''
);
add_theme_support( 'custom-background' );


//CUSTOM BACKGROUND SIZING OPTIONS

function custom_background_size( $wp_customize ) {
 
	// Add your setting.
	$wp_customize->add_setting( 'background-image-size', array(
		'default' => 'inherit',
	) );

	// Add your control box.
	$wp_customize->add_control( 'background-image-size', array(
		'label'      => __( 'Background Image Size' ),
		'section'    => 'background_image',
		'settings'   => 'background-image-size',
		'priority'   => 200,
		'type' => 'radio',
		'choices' => array(
			'cover' => __( 'Cover' ),
			'contain' => __( 'Contain' ),
			'inherit' => __( 'Inherit' ),
		)
	) );
}

add_action( 'customize_register', 'custom_background_size' );

function custom_background_size_css() {
	if ( ! get_theme_mod( 'background_image' ) )  return;
	$background_size = get_theme_mod( 'background-image-size', 'inherit' );
	echo '<style> body.custom-background { background-size: '.$background_size.'; } </style>';
}

add_action( 'wp_head', 'custom_background_size_css', 999 );


//END CUSTOM BACKGROUND SIZING OPTIONS



 

	
	
add_action("customize_register","bbetheme_customize_register_extras");
	
function bbetheme_customize_register_extras($wp_customize) 
{
	
	//COLORS: LINKS COLOR
	$wp_customize->add_setting(  'bbe_links_color',  array(
	 'default' => '', // Give it a default
	 "transport" => "postMessage",
	 ));
	 $wp_customize->add_control(
	 new WP_Customize_Color_Control(
	 $wp_customize,
	 'bbe_links_color', //give it an ID
	 array(
	 'label' => __( 'Links Color', 'bbe' ), //set the label to appear in the Customizer
	 'section' => 'colors', //select the section for it to appear under 
	 'settings' => 'bbe_links_color' //pick the setting it applies to
		)
	 ));
	 
	 
	//COLORS: HOVER LINKS COLOR
	$wp_customize->add_setting(  'bbe_hover_links_color',  array(
	 'default' => '', // Give it a default
	 "transport" => "postMessage",
	 ));
	 $wp_customize->add_control(
	 new WP_Customize_Color_Control(
	 $wp_customize,
	 'bbe_hover_links_color', //give it an ID
	 array(
	 'label' => __( 'Hover Links Color', 'bbe' ), //set the label to appear in the Customizer
	 'section' => 'colors', //select the section for it to appear under 
	 'settings' => 'bbe_hover_links_color' //pick the setting it applies to
		)
	 ));
	 
	 
	 
	
	
	//COLORS: FOOTER BACKGROUND COLOR
	$wp_customize->add_setting(  'bbe_footer_bgcolor',  array(
	 'default' => '#efefef', // Give it a default
	 "transport" => "postMessage",
	 ));
	 $wp_customize->add_control(
	 new WP_Customize_Color_Control(
	 $wp_customize,
	 'bbe_footer_bgcolor', //give it an ID
	 array(
	 'label' => __( 'Footer Wrap Background Color', 'bbe' ), //set the label to appear in the Customizer
	 'section' => 'colors', //select the section for it to appear under 
	 'settings' => 'bbe_footer_bgcolor' //pick the setting it applies to
		)
	 ));
	 
	//COLORS: ANDROID CHROME HEADER COLOR
	$wp_customize->add_setting(  'bbe_header_chrome_color',  array(
	 'default' => '', // Give it a default
	 "transport" => "postMessage",
	 ));
	 $wp_customize->add_control(
	 new WP_Customize_Color_Control(
	 $wp_customize,
	 'bbe_header_chrome_color', //give it an ID
	 array(
	 'label' => __( 'Header Color in Android Chrome', 'bbe' ), //set the label to appear in the Customizer
	 'section' => 'colors', //select the section for it to appear under 
	 'settings' => 'bbe_header_chrome_color' //pick the setting it applies to
		)
	 ));
	 


    //TAGLINE: SHOW / HIDE SWITCH
	$wp_customize->add_setting("tagline_visibility", array(
        "default" => "",
        "transport" => "refresh",
    ));
	$wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "tagline_visibility",
        array(
            "label" => __("Tagline Visibility", "bbe"),
            "section" => "title_tagline",
            "settings" => "tagline_visibility",
            'type'     => 'select',
			'choices'  => array(
				''  => 'Show',
				'0' => 'Hide',
				)
        )
    ));
	
	//TOP HEADER LOGO
	
	$wp_customize->add_setting( 'themeslug_logo' );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(
    'label'    => __( 'Logo', 'bbe' ),
    'section'  => 'title_tagline',
    'settings' => 'themeslug_logo',
	) ) );
	
	
    // ADD A SECTION TO MANAGE THE NAVBAR
	$wp_customize->add_section("nav", array(
        "title" => __("Main Navigation Bar", "bbe"),
        "priority" => 60,
    ));

	// HEADER NAVBAR CHOICE
	$wp_customize->add_setting("header_navbar_choice", array(
        "default" => "",
        "transport" => "refresh",
    ));
	$wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "header_navbar_choice",
        array(
            "label" => __("Navbar Position", "bbe"),
            "section" => "nav",
            "settings" => "header_navbar_choice",
            'type'     => 'select',
			'choices'  => array(
				''  => 'Standard Static Top',
				'navbar-fixed-top' => 'Fixed on Top',
				'navbar-fixed-bottom'  => 'Fixed on Bottom',
				'navbar-hidden'  => 'No Navbar', 
				)
        )
    ));
	
	//HEADERNAVBAR COLOR CHOICE
	$wp_customize->add_setting("header_navbar_color_choice", array(
        "default" => "",
        "transport" => "refresh",
    ));
	$wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "header_navbar_color_choice",
        array(
            "label" => __("Color Scheme", "bbe"),
            "section" => "nav",
            "settings" => "header_navbar_color_choice",
            'type'     => 'select',
			'choices'  => array(
				''  => 'Normal',
				'navbar-inverse' => 'Inverse'
				)
        )
    ));
	
	
	//SEARCH FORM IN NAVBAR
	$wp_customize->add_setting("header_navbar_search_form", array(
        "default" => "",
        "transport" => "refresh",
    ));
	$wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "header_navbar_search_form",
        array(
            "label" => __("Navbar Search Form", "bbe"),
            "section" => "nav",
            "settings" => "header_navbar_search_form",
            'type'     => 'select',
			'choices'  => array(
				''  => 'Enable',
				'0' => 'Disable',
				)
        )
    ));
	
	
	
	
	
	//BOOTSWATCH PALETTES
	$wp_customize->add_section("bootcss", array(
        "title" => __("Styling", "customizer_bootcss_sections"),
        "priority" => 50,
    ));
	
	$wp_customize->add_setting("bootcss_choice", array(
        "default" => "",
        "transport" => "refresh",
    ));
	$wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "bootcss_choice",
        array(
            "label" => __("Bootstrap Theme", "bbe"),
            "section" => "bootcss",
            "settings" => "bootcss_choice",
            'type'     => 'select',
			'choices'  => array(
				''  => 	'Plain Barebones Bootstrap, no Theme',
				'bootstrap_default_optional_theme'  => 'Bootstrap: Default Optional Theme',
				
				'cerulean'  =>  'BootSwatch: Cerulean',
				'cosmo' => 		'BootSwatch: Cosmo',
				'cyborg'  => 	'BootSwatch: Cyborg',
				'darkly' => 	'BootSwatch: Darkly',
				'flatly'  => 	'BootSwatch: Flatly',
				'journal'  => 	'BootSwatch: Journal',
				'lumen' => 		'BootSwatch: Lumen',
				'paper'  => 	'BootSwatch: Paper',
				'readable' => 	'BootSwatch: Readable',
				'sandstone'  => 'BootSwatch: Sandstone',
				'simplex'  => 	'BootSwatch: Simplex',
				'slate'  => 	'BootSwatch: Slate',
				'spacelab' => 	'BootSwatch: Spacelab',
				'superhero'  => 'BootSwatch: Superhero',
				'united'  => 	'BootSwatch: United',
				'yeti' => 		'BootSwatch: Yeti',
				
				'disable' =>	'Zero CSS. For Geeks.'
				
				)
        )
    ));
	
	$wp_customize->add_setting("bbe_extra_css_url", array(
        "default" => "",
        "transport" => "refresh",
    ));
	$wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "bbe_extra_css_url",
        array(
            "label" => __("Extra CSS URL (optional)", "bbe"),
            "section" => "bootcss",
            "settings" => "bbe_extra_css_url",
            'type'     => 'text',
			 
        )
    ));
	
	
	//FONT COMBINATIONS
	$wp_customize->add_setting("bbe_font_combinations", array(
        "default" => "",
        "transport" => "postMessage",
    ));

	$wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "bbe_font_combinations",
        array(
            "label" => __("Font Combination", "bbe"),
			'description' => __( 'Check out  <a target="_blank" href="http://fontpair.co/">FontPair</a> for more   inspiration.', 'bbe' ),
            "section" => "bootcss",
            "settings" => "bbe_font_combinations",
            'type'     => 'select',
			'choices'  => array(
				'' => 'Choose a combination...',
				'Cabin and Old Standard TT' => 'Cabin and Old Standard TT',
				'Fjalla One and Average' => 'Fjalla One and Average',
				'Istok Web and Lora' => 'Istok Web and Lora',
				'Josefin Sans and Playfair Display' => 'Josefin Sans and Playfair Display',
				'Lato and Merriweather' => 'Lato and Merriweather',
				'Montserrat and Cardo' => 'Montserrat and Cardo',
				'Montserrat and Crimson Text' => 'Montserrat and Crimson Text',
				'Montserrat and Domine' => 'Montserrat and Domine',
				'Montserrat and Neuton' => 'Montserrat and Neuton',
				'Montserrat and Playfair Display' => 'Montserrat and Playfair Display',
				'Muli and Playfair Display' => 'Muli and Playfair Display',
				'Nunito and Alegreya' => 'Nunito and Alegreya',
				'Nunito and Lora' => 'Nunito and Lora',
				'Open Sans and Gentium Book Basic' => 'Open Sans and Gentium Book Basic',
				'Oswald and Merriweather' => 'Oswald and Merriweather',
				'Oswald and Quattrocento'=>'Oswald and Quattrocento',
				'PT Sans and PT Serif'=>'PT Sans and PT Serif',
				'Quicksand and EB Garamond'=>'Quicksand and EB Garamond',
				'Raleway and Merriweather'=>'Raleway and Merriweather',
				'Ubuntu and Lora'=>'Ubuntu and Lora',
				
				'Alegreya and Open Sans'=>'Alegreya and Open Sans',
				'Cantata One and Imprima'=>'Cantata One and Imprima',
				'Crete Round and AbeeZee'=>'Crete Round and AbeeZee',
				'Libre Baskerville and Montserrat'=>'Libre Baskerville and Montserrat',
				'Playfair Display and Open Sans'=>'Playfair Display and Open Sans',
				
				'Abel and Ubuntu'=>'Abel and Ubuntu',
				'Didact Gothic and Arimo'=>'Didact Gothic and Arimo',
				'Fjalla One and Cantarell'=>'Fjalla One and Cantarell',
				'Francois One and Lato'=>'Francois One and Lato',
				'Montserrat and Hind'=>'Montserrat and Hind',
				'Oxygen and Source Sans Pro'=>'Oxygen and Source Sans Pro',
				
				'Alfaslab One and Gentium Book'=>'Alfaslab One and Gentium Book',
				'Clicker Script and EB Garamond'=>'Clicker Script and EB Garamond',
				'Dancing Script and Ledger'=>'Dancing Script and Ledger',
				'Nixie One and Ledger'=>'Nixie One and Ledger',
				'Patua One and Lora'=>'Patua One and Lora',
				'Sacramento and Alice'=>'Sacramento and Alice',
				'Walter Turncoat and Kreon'=>'Walter Turncoat and Kreon',
			),
        )
    ));
	
	
	
	//HEADING FONTS
	$wp_customize->add_setting("bbe_headings_font", array(
        "default" => "",
        "transport" => "postMessage",
    ));
	global $bbe_google_fonts_array;
	$wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "bbe_headings_font",
        array(
            "label" => __(" Headings Font ", "bbe"),
			'description' => __( 'Browse the official <a target="_blank" href="https://fonts.google.com/">Google Fonts</a> page ', 'bbe' ),
            "section" => "bootcss",
            "settings" => "bbe_headings_font",
            'type'     => 'select',
			'choices'  => $bbe_google_fonts_array,
        )
    ));
	
	
	//BODY FONTS
	$wp_customize->add_setting("bbe_body_font", array(
        "default" => "",
        "transport" => "postMessage",
    ));
	global $bbe_google_fonts_array;
	$wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "bbe_body_font",
        array(
            "label" => __(" Body Font ", "bbe"),
			'description' => __( 'Browse the official <a target="_blank" href="https://fonts.google.com/">Google Fonts</a> page ', 'bbe' ),
            "section" => "bootcss",
            "settings" => "bbe_body_font",
            'type'     => 'select',
			'choices'  => $bbe_google_fonts_array,
        )
    ));
	
	
	
	
	 
 
	//ADD SECTION FOR FOOTER  
	$wp_customize->add_section("footer", array(
        "title" => __("Footer", "customizer_footer_sections"),
        "priority" => 100,
    ));
	
 
	 
	//FOOTER COLUMNS SCHEMA 
	$wp_customize->add_setting("footer_columns_schema", array(
        "default" => "4-8",
        "transport" => "refresh",
    ));
	$wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "footer_columns_schema",
        array(
            "label" => __("Footer Columns Schema", "bbe"),
            "section" => "footer",
            "settings" => "footer_columns_schema",
            'type'     => 'select',
			'choices'  => array(
				'0' => 'Disable Footer Widgets',
				'12'  => '1 Column',
				'6-6'  => '2 Columns: Equal Sizes',
				'4-8'  => '2 Columns: 4-8',
				'8-4'  => '2 Columns: 8-4',
				'4-4-4'  => '3 Columns: Equal Sizes',
				'6-3-3'  => '3 Columns: 6-3-3',
				'3-3-6'  => '3 Columns: 3-3-6',
				'3-4-5'  => '3 Columns: 3-4-5',
				'5-4-3'  => '3 Columns: 5-4-3',
				'3-3-3-3'  => '4 Columns: Equal Sizes',
				
				)
        )
    ));
	 
	//FOOTER TEXT
	$wp_customize->add_setting("footer_text", array(
        "default" => "",
        "transport" => "postMessage",
    ));
	$wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "footer_text",
        array(
            "label" => __("Footer Text", "bbe"),
            "section" => "footer",
            "settings" => "footer_text",
            'type'     => 'textarea',
			 
        )
    ));
	
	//FOOTER BACKGROUND
	$wp_customize->add_setting("footer_bg_image_url", array(
        "default" => "", 
    ));
	$wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "footer_bg_image_url",
        array(
            "label" => __("Footer Wrap Background Image URL", "bbe"),
            "section" => "footer",
            "settings" => "footer_bg_image_url",
            'type'     => 'text',
			 
        )
    ));
	
	
	
	
	// ADD A SECTION FOR EXTRAS
	$wp_customize->add_section("extras", array(
        "title" => __("Theme Extras", "bbe"),
        "priority" => 160,
    ));
	
	//LIGHTBOX OPT-OUT
	$wp_customize->add_setting("autolightbox", array(
        "default" => "",
        "transport" => "refresh",
    ));
	$wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "autolightbox",
        array(
            "label" => __("Automatic Lightbox for Posts and standard Pages", "bbe"),
            "section" => "extras",
            "settings" => "autolightbox",
            'type'     => 'select',
			'choices'  => array(
				''  => 'Enable',
				'0' => 'Disable',
				 				)
			)
    ));
	
	//ANIMATE.CSS OPT-OUT
	$wp_customize->add_setting("animatecss", array(
        "default" => "",
        "transport" => "refresh",
    ));
	$wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "animatecss",
        array(
            "label" => __("Animate.css library", "bbe"),
            "section" => "extras",
            "settings" => "animatecss",
            'type'     => 'select',
			'choices'  => array(
				''  => 'Enable',
				'0' => 'Disable',
				 				)
			)
    ));
	
	//FONTAWESOME.CSS OPT-OUT
	$wp_customize->add_setting("fontawesome", array(
        "default" => "",
        "transport" => "refresh",
    ));
	$wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "fontawesome",
        array(
            "label" => __("fontawesome.css library", "bbe"),
            "section" => "extras",
            "settings" => "fontawesome",
            'type'     => 'select',
			'choices'  => array(
				''  => 'Enable',
				'0' => 'Disable',
				 				)
			)
    ));
	
	//MODERNIZER OPT-OUT
	$wp_customize->add_setting("modernizer", array(
        "default" => "",
        "transport" => "refresh",
    ));
	$wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "modernizer",
        array(
            "label" => __("modernizer.js library", "bbe"),
            "section" => "extras",
            "settings" => "modernizer",
            'type'     => 'select',
			'choices'  => array(
				''  => 'Enable',
				'0' => 'Disable',
				 				)
			)
    ));
	
	
	
	//BBE FORMS  OPT-OUT
	$wp_customize->add_setting("bbe_forms_engine", array(
        "default" => "",
        "transport" => "refresh",
    ));
	$wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "bbe_forms_engine",
        array(
            "label" => __("BBE Forms Engine", "bbe"),
            "section" => "extras",
            "settings" => "bbe_forms_engine",
            'type'     => 'select',
			'choices'  => array(
				''  => 'Enable',
				'0' => 'Disable',
				 				)
			)
    ));
	
	
	
	//ANALYTICS HEADER CODE for non-admins
	$wp_customize->add_setting("bbe_header_analytics_code", array(
        "default" => "",
        "transport" => "refresh",
    ));
	$wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "bbe_header_analytics_code",
        array(
            "label" => __("Analytics Tracking Code (printed in page header - only for Non-admins)", "bbe"),
            "section" => "extras",
            "settings" => "bbe_header_analytics_code",
            'type'     => 'textarea',
			 
        )
    ));
	
	
	
	
	// ADD A SECTION FOR SINGLE POSTS///////////////////////////////
	$wp_customize->add_section("singleposts", array(
        "title" => __("Single Post Template", "bbe"),
        "priority" => 160,
    ));
	
	//FIELDS
	
	
	
	//AUTHOR
	$wp_customize->add_setting("singlepost_author", array(
        "default" => "",
        "transport" => "refresh",
    ));
	$wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "singlepost_author",
        array(
            "label" => __("Author", "bbe"),
            "section" => "singleposts",
            "settings" => "singlepost_author",
            'type'     => 'select',
			'choices'  => array(
				''  => 'Enable',
				'0' => 'Disable',
				 				)
			)
    ));
	
	
	
	//DATE
	$wp_customize->add_setting("singlepost_meta_date", array(
        "default" => "",
        "transport" => "refresh",
    ));
	$wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "singlepost_meta_date",
        array(
            "label" => __("Date", "bbe"),
            "section" => "singleposts",
            "settings" => "singlepost_meta_date",
            'type'     => 'select',
			'choices'  => array(
				''  => 'Enable',
				'0' => 'Disable',
				 				)
			)
    ));
	
	
	
	//Meta: CATEGORY
	$wp_customize->add_setting("singlepost_meta_category", array(
        "default" => "",
        "transport" => "refresh",
    ));
	$wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "singlepost_meta_category",
        array(
            "label" => __("Meta: Category", "bbe"),
            "section" => "singleposts",
            "settings" => "singlepost_meta_category",
            'type'     => 'select',
			'choices'  => array(
				''  => 'Enable',
				'0' => 'Disable',
				 				)
			)
    ));
	
 
	//Meta: COMMENTS
	$wp_customize->add_setting("singlepost_meta_comments", array(
        "default" => "",
        "transport" => "refresh",
    ));
	$wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "singlepost_meta_comments",
        array(
            "label" => __("Meta: Comments", "bbe"),
            "section" => "singleposts",
            "settings" => "singlepost_meta_comments",
            'type'     => 'select',
			'choices'  => array(
				''  => 'Enable',
				'0' => 'Disable',
				 				)
			)
    ));
	
	
	//Meta: featured image
	$wp_customize->add_setting("singlepost_featuredimage", array(
        "default" => "",
        "transport" => "refresh",
    ));
	$wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "singlepost_featuredimage",
        array(
            "label" => __("Meta: Featured Image", "bbe"),
            "section" => "singleposts",
            "settings" => "singlepost_featuredimage",
            'type'     => 'select',
			'choices'  => array(
				''  => 'Enable',
				'0' => 'Disable',
				 				)
			)
    ));
	
	
	
	
	//related posts 
	$wp_customize->add_setting("singlepost_relatedposts", array(
        "default" => "",
        "transport" => "refresh",
    ));
	$wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "singlepost_relatedposts",
        array(
            "label" => __("Related Posts (by Category)", "bbe"),
            "section" => "singleposts",
            "settings" => "singlepost_relatedposts",
            'type'     => 'select',
			'choices'  => array(
				''  => 'Enable',
				'0' => 'Disable',
				 				)
			)
    ));
	
	
	//end single
	
	
	
	
	
	
	// ADD A SECTION FOR ARCHIVES ///////////////////////////////
	$wp_customize->add_section("archives", array(
        "title" => __("Archive Templates", "bbe"),
        "priority" => 160,
    ));
	
	//FIELDS
	
	//ARCHIVES_TEMPLATE
	$wp_customize->add_setting("archives_template", array(
        "default" => "",
        "transport" => "refresh",
    ));
	$wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "archives_template",
        array(
            "label" => __("Template", "bbe"),
            "section" => "archives",
            "settings" => "archives_template",
            'type'     => 'select',
			'choices'  => array(
				''  => 'Standard Blog: List With Sidebar',
				'v2' => 'v2 : Horizontal split with Featured Image',
				'v3' => 'v3 : Simple 3 Columns Grid ',
				'v4' => 'v4 : Masonry Grid',
				 				)
			)
    ));
	
	
	
	//AUTHOR
	$wp_customize->add_setting("archives_author", array(
        "default" => "",
        "transport" => "refresh",
    ));
	$wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "archives_author",
        array(
            "label" => __("Author", "bbe"),
            "section" => "archives",
            "settings" => "archives_author",
            'type'     => 'select',
			'choices'  => array(
				''  => 'Enable',
				'0' => 'Disable',
				 				)
			)
    ));
	
	
	
	//DATE
	$wp_customize->add_setting("archives_meta_date", array(
        "default" => "",
        "transport" => "refresh",
    ));
	$wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "archives_meta_date",
        array(
            "label" => __("Date", "bbe"),
            "section" => "archives",
            "settings" => "archives_meta_date",
            'type'     => 'select',
			'choices'  => array(
				''  => 'Enable',
				'0' => 'Disable',
				 				)
			)
    ));
	
	
	
	//Meta: CATEGORY
	$wp_customize->add_setting("archives_meta_category", array(
        "default" => "",
        "transport" => "refresh",
    ));
	$wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "archives_meta_category",
        array(
            "label" => __("Meta: Category", "bbe"),
            "section" => "archives",
            "settings" => "archives_meta_category",
            'type'     => 'select',
			'choices'  => array(
				''  => 'Enable',
				'0' => 'Disable',
				 				)
			)
    ));
	
 
	//Meta: COMMENTS
	$wp_customize->add_setting("archives_meta_comments", array(
        "default" => "",
        "transport" => "refresh",
    ));
	$wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "archives_meta_comments",
        array(
            "label" => __("Meta: Comments", "bbe"),
            "section" => "archives",
            "settings" => "archives_meta_comments",
            'type'     => 'select',
			'choices'  => array(
				''  => 'Enable',
				'0' => 'Disable',
				 				)
			)
    ));
	
	
	//Meta: featured image
	$wp_customize->add_setting("archives_featuredimage", array(
        "default" => "",
        "transport" => "refresh",
    ));
	$wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "archives_featuredimage",
        array(
            "label" => __("Meta: Featured Image", "bbe"),
            "section" => "archives",
            "settings" => "archives_featuredimage",
            'type'     => 'select',
			'choices'  => array(
				''  => 'Enable',
				'0' => 'Disable',
				 				)
			)
    ));
	
	
	
	//Force Excerpt Instead of Content
	$wp_customize->add_setting("archives_use_excerpt", array(
        "default" => "",
        "transport" => "refresh",
    ));
	$wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "archives_use_excerpt",
        array(
            "label" => __("Article: Content or Excerpt", "bbe"),
            "section" => "archives",
            "settings" => "archives_use_excerpt",
            'type'     => 'select',
			'choices'  => array(
				''  => 'Content',
				'0' => 'Excerpt',
				 				)
			)
    ));
	
	
	
	//end archive fields
	
	
 
	
	//add more stuff 
	
}
 


/**
 * Enqueue script for custom customize control.
 */
function custom_customize_enqueue() {
	wp_enqueue_script( 'custom-customize', get_template_directory_uri() . '/functions/js/theme-customizer.js', array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'custom_customize_enqueue' );







//ADD Body classes to match user desires - so they can be accessed in bbe.js
function bbe_config_body_classes( $classes ) {
	
	if ( get_theme_mod('autolightbox')!="") $classes[]="disable-autolightbox";
	
	return $classes;
}

add_filter( 'body_class', 'bbe_config_body_classes' );
