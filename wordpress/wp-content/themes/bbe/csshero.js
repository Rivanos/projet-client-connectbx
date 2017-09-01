function csshero_theme_declarations(){
    
    
    // BODY
    csshero_declare_item('body','Site background');
    
    // HEADER
    csshero_declare_item('nav#main-nav','Header background');
    
    //HEADER SEARCH MODULE
    
    csshero_declare_item('nav#main-nav  #s', 'Header Search Input');
    csshero_declare_item('nav#main-nav  #searchsubmit', 'Header Search Submit');
    csshero_declare_item('nav#main-nav  #searchform', 'Header Searchform');
    
    
    // TOP MENU LEFT 
    csshero_config_menu("#main-nav .menuwrap-left",".navbar-left","Top Menu Left");
    // TOP MENU RIGHT 
    csshero_config_menu("#main-nav .menuwrap-right",".navbar-right","Top Menu Right");
    
    // TOP HEADER   LOGO image
    csshero_declare_item('#main-nav .navbar-header a img#top-logo','Top logo');
    
    // TOP HEADER   LOGO text
    csshero_declare_item('#main-nav .navbar-header a #top-textlogo','Top Textual logo');
     
    // TAGLINE
    csshero_declare_item('#top-description','Tagline'); 
    
    // POST
    csshero_config_post(".hentry","","Article");
    // SIDEBAR
    csshero_my_config_sidebar("#sidebar",".sidebar section","Sidebar");
    // FOOTER
    csshero_my_config_sidebar("footer.site-footer",".row > div","Footer");
    csshero_declare_item("footer.site-footer .site-sub-footer p","Footer copyright text");
    csshero_declare_item("footer.site-footer .site-sub-footer p a","Footer copyright link");
     
    
    
  
 
    // BEGIN CONFIGURATION OF BBE COMPONENTS
    // DECLARATION OF ALL ROW WRAPPER
    frame = window.frames['csshero-iframe-main-page'].document.body; 
    jQuery('#bbe-magic-content *[data-wrapper-id]',frame).each(function(){
        wrapper_id = jQuery(this).data('wrapper-id');
        //jQuery(this).removeAttr('style');
        csshero_declare_item(jQuery(this).prop('tagName')+'[data-wrapper-id='+wrapper_id+']','ContainerWrap #'+wrapper_id);
    });
    
    // DECLARATION OF ALL CONTAINER
    jQuery('#bbe-magic-content *[data-container-id]',frame).each(function(){
        container_id = jQuery(this).data('container-id');
        //jQuery(this).removeAttr('style');
        csshero_declare_item(jQuery(this).prop('tagName')+'[data-container-id='+container_id+']','Container #'+container_id);
    });
    // DECLARATION OF ALL COLUMN
    jQuery('#bbe-magic-content *[data-column-id]',frame).each(function(){
        column_id = jQuery(this).data('column-id');
        //jQuery(this).removeAttr('style');
        csshero_declare_item(jQuery(this).prop('tagName')+'[data-column-id='+column_id+']','Column #'+column_id);
    });
    // DECLARATION OF ALL BLOCK
    jQuery('#bbe-magic-content *[data-block-id]',frame).each(function(){
        block_id = jQuery(this).data('block-id');
        //jQuery(this).removeAttr('style');
        csshero_declare_item(jQuery(this).prop('tagName')+'[data-block-id='+block_id+']','Block #'+block_id);
        
        //general selectors, not for custom components
        if (!jQuery(this).hasClass("carousel-caption") ) {
            
            if (jQuery(this).find("h1").length)  csshero_declare_item(jQuery(this).prop('tagName')+'[data-block-id='+block_id+']   h1','Block #'+block_id+' h1');
            if (jQuery(this).find("h1 small").length)  csshero_declare_item(jQuery(this).prop('tagName')+'[data-block-id='+block_id+']   h1 small','Block #'+block_id+' h1 small');
            
            
            if (jQuery(this).find("h2").length)  csshero_declare_item(jQuery(this).prop('tagName')+'[data-block-id='+block_id+']   h2','Block #'+block_id+' h2');
            if (jQuery(this).find("h2 small").length)  csshero_declare_item(jQuery(this).prop('tagName')+'[data-block-id='+block_id+']   h2 small','Block #'+block_id+' h2 small');
            
            if (jQuery(this).find("h3").length)  csshero_declare_item(jQuery(this).prop('tagName')+'[data-block-id='+block_id+']   h3','Block #'+block_id+' h3');
            if (jQuery(this).find("h3 small").length)  csshero_declare_item(jQuery(this).prop('tagName')+'[data-block-id='+block_id+']   h3 small','Block #'+block_id+' h3 small');
            
            if (jQuery(this).find("h4").length)  csshero_declare_item(jQuery(this).prop('tagName')+'[data-block-id='+block_id+']   h4','Block #'+block_id+' h4');
            if (jQuery(this).find("h4 small").length)  csshero_declare_item(jQuery(this).prop('tagName')+'[data-block-id='+block_id+']   h4 small','Block #'+block_id+' h4 small');
            
            if (jQuery(this).find("h5").length)  csshero_declare_item(jQuery(this).prop('tagName')+'[data-block-id='+block_id+']   h5','Block #'+block_id+' h5');
            if (jQuery(this).find("h5 small").length)  csshero_declare_item(jQuery(this).prop('tagName')+'[data-block-id='+block_id+']   h5 small','Block #'+block_id+' h5 small');
 
            
            
            if (jQuery(this).find("p").length)  csshero_declare_item(jQuery(this).prop('tagName')+'[data-block-id='+block_id+']   p','Block #'+block_id+' p');
        
            //8jul
            if (jQuery(this).find(".btn").length)  csshero_declare_item(jQuery(this).prop('tagName')+'[data-block-id='+block_id+']   .btn','Block #'+block_id+' Button');
            if (jQuery(this).find("img").length)  csshero_declare_item(jQuery(this).prop('tagName')+'[data-block-id='+block_id+']   img','Block #'+block_id+' Image');
            // blockquote
            if (jQuery(this).find("blockquote").length)  csshero_declare_item(jQuery(this).prop('tagName')+'[data-block-id='+block_id+']   blockquote','Block #'+block_id+' Blockquote');
            if (jQuery(this).find("blockquote footer").length)  csshero_declare_item(jQuery(this).prop('tagName')+'[data-block-id='+block_id+']   blockquote footer','Block #'+block_id+' Blockquote Footer');
             
        
        
        
        }
        //component-specific
        if (jQuery(this).find("div.page-header").length) {  //PAGE HEADER COMPONENT
            csshero_declare_item(jQuery(this).prop('tagName')+'[data-block-id='+block_id+'] div.page-header h1','Block #'+block_id+' h1');
            csshero_declare_item(jQuery(this).prop('tagName')+'[data-block-id='+block_id+'] div.page-header h1 small','Block #'+block_id+' h1 small');
        }
        
        if (jQuery(this).find("div.jumbotron").length) {  //JUMBOTRON COMPONENT
            csshero_declare_item(jQuery(this).prop('tagName')+'[data-block-id='+block_id+'] div.jumbotron','Block #'+block_id+' jumbotron');
            csshero_declare_item(jQuery(this).prop('tagName')+'[data-block-id='+block_id+'] div.jumbotron p','Block #'+block_id+' jumbotron p');
            csshero_declare_item(jQuery(this).prop('tagName')+'[data-block-id='+block_id+'] div.jumbotron .btn','Block #'+block_id+' jumbotron .btn');
        }
        
        if (jQuery(this).find("div.thumbnail").length) {  //THUMBNAIL COMPONENT
            csshero_declare_item(jQuery(this).prop('tagName')+'[data-block-id='+block_id+'] div.thumbnail img ','Block #'+block_id+' thumbnail image');
            csshero_declare_item(jQuery(this).prop('tagName')+'[data-block-id='+block_id+'] div.thumbnail h3 ','Block #'+block_id+' thumbnail h3');
            csshero_declare_item(jQuery(this).prop('tagName')+'[data-block-id='+block_id+'] div.thumbnail p:first-of-type','Block #'+block_id+' thumbnail p:first');
            csshero_declare_item(jQuery(this).prop('tagName')+'[data-block-id='+block_id+'] div.thumbnail .btn-primary','Block #'+block_id+' thumbnail .btn-primary');
            csshero_declare_item(jQuery(this).prop('tagName')+'[data-block-id='+block_id+'] div.thumbnail .btn-default','Block #'+block_id+' thumbnail .btn-default');
        }
        
        
        if (  jQuery(this).find("div.carousel").length) {  //CAROUSEL COMPONENT
            csshero_declare_item(jQuery(this).prop('tagName')+'[data-block-id='+block_id+'] div.carousel img','Block #'+block_id+' Carousel image');
            csshero_declare_item(jQuery(this).prop('tagName')+'[data-block-id='+block_id+'] div.carousel .carousel-caption h2 ','Block #'+block_id+' Carousel h2');
            csshero_declare_item(jQuery(this).prop('tagName')+'[data-block-id='+block_id+'] div.carousel .carousel-caption p ','Block #'+block_id+' Carousel p ');
            csshero_declare_item(jQuery(this).prop('tagName')+'[data-block-id='+block_id+'] div.carousel ol.carousel-indicators','Block #'+block_id+' Carousel indicators  ');
            csshero_declare_item(jQuery(this).prop('tagName')+'[data-block-id='+block_id+'] div.carousel ol.carousel-indicators li','Block #'+block_id+' Carousel indicators li');
            
            csshero_declare_item(jQuery(this).prop('tagName')+'[data-block-id='+block_id+'] .carousel-control .glyphicon-chevron-left, .carousel-control .glyphicon-chevron-right','Block #'+block_id+' Carousel Control Icon ');
            
            csshero_declare_item(jQuery(this).prop('tagName')+'[data-block-id='+block_id+'] .carousel-control','Block #'+block_id+' Carousel Control Background');
            
            
            
        }
        
        
        if (  jQuery(this).find("i.fa").length) {  //ICON FONTAWESOME COMPONENT
            csshero_declare_item(jQuery(this).prop('tagName')+'[data-block-id='+block_id+'] i.fa','Block #'+block_id+' Icon ');
            
        }
        
        
         if (  jQuery(this).find(".panel-group").length) {  //ACCORDION
            csshero_declare_item(jQuery(this).prop('tagName')+'[data-block-id='+block_id+'] .panel-heading h4.panel-title','Block #'+block_id+' Panel Title ');
            
        }
        
    });
    
    
    // DECLARATION OF ALL IMAGE //? take away?
    if (0) jQuery('#bbe-magic-content *[data-image-id]',frame).each(function(){
        image_id = jQuery(this).data('image-id');
        //jQuery(this).removeAttr('style');
        csshero_declare_item(jQuery(this).prop('tagName')+'[data-image-id='+image_id+']','Image #'+image_id);
    });
    
    
    //Declare typography headings
    //csshero_declare_item("h1,.h1,h2,.h2,h3,.h3,h4,.h4","Headings Font",'color,font-family');
}

function csshero_my_config_sidebar(scope,inner_scope,prefix){
    if (!inner_scope){
            inner_scope = '.widget'; /// DEFAULTS TO .widget, MUST BE A CLASS
    }

    if (!prefix){
            prefix = 'Sidebar';
    }
    //20140822 - ADDING WOOCOMMERCE COMPATIBILITY
    inner_scope = inner_scope+':not(.woocommerce)';

    csshero_declare_item(scope,prefix);
    csshero_declare_item(scope+' h3'+inner_scope+'-title',prefix+' Widget Title');
    csshero_declare_item(scope+' '+inner_scope,prefix+' Widget');
    csshero_declare_item(scope+' '+inner_scope+' ul',prefix+' List Container');
    csshero_declare_item(scope+' '+inner_scope+' ul li',prefix+' List Element');
    csshero_declare_item(scope+' '+inner_scope+' a',prefix+' Links');
    csshero_declare_item(scope+' '+inner_scope+' p',prefix+' Paragraphs');
    csshero_declare_item(scope+' '+inner_scope+' img',prefix+' Image');
    csshero_declare_item(scope+' '+inner_scope+' h1',prefix+' Text Widget h1');
    csshero_declare_item(scope+' '+inner_scope+' h2',prefix+' Text Widget h2');
    csshero_declare_item(scope+' '+inner_scope+' h3'/*:not('+inner_scope+'-title)'*/,prefix+' Text Widget h3');
    csshero_declare_item(scope+' '+inner_scope+' h4',prefix+' Text Widget h4');
    csshero_declare_item(scope+' '+inner_scope+' h5',prefix+' Text Widget h5');
    csshero_declare_item(scope+' '+inner_scope+' h6',prefix+' Text Widget h6');
    csshero_declare_item(scope+' '+inner_scope+' #s',prefix+' Search Input');
    csshero_declare_item(scope+' '+inner_scope+' #searchsubmit',prefix+' Search Submit');
    csshero_declare_item(scope+' '+inner_scope+' #searchform',prefix+' Searchform');
 

    csshero_declare_item(scope+' '+inner_scope+' input[type=text]',prefix+' Text Input');
}



