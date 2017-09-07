

(function( $ ) {
    "use strict";
   // $("body.wp-core-ui").fadeOut();
   
   
   $("body").on("change","#customize-control-bbe_font_combinations select", function(){
    var value=jQuery(this).val(); //Cabin and Old Standard TT
    var arr=value.split(' and ');
    var font_headings=arr[0];
    var font_body=arr[1];
     
    if(value==='') { font_headings="";font_body="";}
 
    $('select[data-customize-setting-link="bbe_headings_font"] option:contains('+font_headings+'):first').attr('selected','selected').change();

    $('select[data-customize-setting-link="bbe_body_font"] option:contains('+font_body+'):first').attr('selected','selected').change();

    });
   
   
   
   
   
   
   
    
    function bbe_make_customizations_to_customizer()
        {
            
            var html='<h1> &nbsp; </h1><h2>Add More Custom Styling Easily</h2>'+
                     '<p>For extensive, visual, clean CSS personalization we recommend CSS Hero, a wonderful WP plugin.</p>'+
                     '<a target="_blank" href="http://www.csshero.org/?rid=23" ><img width="250" src="http://www.csshero.org/banners/250x250_01.png" alt="WordPress Theme Editor"></a>';
         
            if (0) $("#sub-accordion-section-colors").append(html);
            
            $('iframe').on('load', function(){
                bbe_highlight_menu();
           });
            
        }

    function bbe_highlight_menu() {
            
            if($("iframe").contents().find("body").hasClass("archive")) {
                jQuery("li#accordion-section-archives h3").css("background","#ffcc99"); 
            }
            
            if($("iframe").contents().find("body").hasClass("single-post")) {
                jQuery("li#accordion-section-singleposts h3").css("background","#ffcc99"); 
            }   
                
            

            
    }
    
    setTimeout(function(){
        bbe_make_customizations_to_customizer();
       
        }, 1000);

    
    
 
})( jQuery );