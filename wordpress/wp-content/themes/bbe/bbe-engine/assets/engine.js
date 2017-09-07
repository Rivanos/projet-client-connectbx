//BBE ENGINE JS

String.prototype.ucwords = function() {
    str = this.toLowerCase();
    return str.replace(/(^([a-zA-Z\p{M}]))|([ -][a-zA-Z\p{M}])/g,
        function($1){
            return $1.toUpperCase();
        });
}

function bbe_parseParams(str) {
    
    str=str.split('?')[1]; //eliminate part before ?
    
    return str.split('&').reduce(function (params, param) {
        var paramSplit = param.split('=').map(function (value) {
            return decodeURIComponent(value.replace('+', ' '));
        });
        params[paramSplit[0]] = paramSplit[1];
        return params;
    }, {});
}

function bbe_get_string_between_words(from,to,outerText){
    var s = outerText.indexOf(from);
    var e = outerText.lastIndexOf(to);
    
    return  outerText.substring(s+from.length, e);
}

function bbe_get_parameter_value_from_shortcode(paramName,theShortcode){
    var array1=theShortcode.split(paramName+'="');
    var significant_part= array1[1];
    if(significant_part===undefined) return "";
    var array2=significant_part.split('"');
    return array2[0];
}

//function to get query string parameters 
function bbe_$_GET(param) {
    var vars = {};
    window.location.href.replace( 
        /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
        function( m, key, value ) { // callback
            vars[key] = value !== undefined ? value : '';
        }
    );
    
    if ( param ) {
        return vars[param] ? vars[param] : null;	
    }
    return vars;
}

function bbe_show_no_connection_alert()	{
	alert("Connection error. Please retry in a short while, or check your Internet connection. ");
}
function bbe_play_audio_feedback(situation){

    console.log("action '"+situation+"' performed ok.");
    //DEFAULT AND SPECIFIC SOUNDS
    var audio_feedback = new Audio('https://www.dopewp.com/media/SOUNDFX/edit.mp3');
    if (situation==='insert') var audio_feedback = new Audio('https://www.dopewp.com/media/SOUNDFX/insert.mp3');
    if (situation==='error') var audio_feedback = new Audio('https://www.dopewp.com/media/SOUNDFX/error.mp3');
    
    audio_feedback.play();
    bbe_reveal_saving_buttons();
    
    jQuery(".bbe-contextual-close-top .glyphicon:visible ").removeClass("glyphicon-remove").addClass("glyphicon-ok");
    setTimeout(function () {
		 jQuery(".bbe-contextual-close-top .glyphicon:visible ").removeClass("glyphicon-ok").addClass("glyphicon-remove");										 
    }, 1000);
    //do more in case to show success    
    
}

function bbe_get_rootSel() {
    return "#bbe-magic-content";
}

function bbe_randomString() {
length=5;
    chars='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    var result = '';
    for (var i = length; i > 0; --i)
        result += chars[Math.round(Math.random() * (chars.length - 1))];
    return result;
}

function bbe_popup_style_parameters(){
				 return "top=20, left=0, width=650, height=600, scrollbars=1, titlebar=0, toolbar=0, location=0, status=0";
				 
}

//FUNCTION TO CONVERT HEX FORMAT TO A RGB COLOR
function bbe_rgb2hex(rgb) { rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/); return "#" + bbe_hex(rgb[1]) + bbe_hex(rgb[2]) + bbe_hex(rgb[3]); }
function bbe_hex(x) {  var hexDigits = new Array("0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f");  return isNaN(x) ? "00" : hexDigits[(x - x % 16) / 16] + hexDigits[x % 16]; }

function get_all_column_classes_list(){
			 rootsel = bbe_get_rootSel();
				return rootsel+" .col-xs-1, "+rootsel+" .col-xs-2, "+rootsel+" .col-xs-3, "+rootsel+" .col-xs-4, "+rootsel+" .col-xs-5, "+rootsel+" .col-xs-6, "+rootsel+" .col-xs-7, "+rootsel+" .col-xs-8, "+rootsel+" .col-xs-9, "+rootsel+" .col-xs-10, "+rootsel+" .col-xs-11, "+rootsel+" .col-xs-12, "+rootsel+" .col-sm-1, "+rootsel+" .col-sm-2, "+rootsel+" .col-sm-3, "+rootsel+" .col-sm-4, "+rootsel+" .col-sm-5, "+rootsel+" .col-sm-6, "+rootsel+" .col-sm-7, "+rootsel+" .col-sm-8, "+rootsel+" .col-sm-9, "+rootsel+" .col-sm-10, "+rootsel+" .col-sm-11, "+rootsel+" .col-sm-12, "+rootsel+" .col-md-1, "+rootsel+" .col-md-2, "+rootsel+" .col-md-3, "+rootsel+" .col-md-4, "+rootsel+" .col-md-5, "+rootsel+" .col-md-6, "+rootsel+" .col-md-7, "+rootsel+" .col-md-8, "+rootsel+" .col-md-9, "+rootsel+" .col-md-10, "+rootsel+" .col-md-11, "+rootsel+" .col-md-12, "+rootsel+" .col-lg-1, "+rootsel+" .col-lg-2, "+rootsel+" .col-lg-3, "+rootsel+" .col-lg-4, "+rootsel+" .col-lg-5, "+rootsel+" .col-lg-6, "+rootsel+" .col-lg-7, "+rootsel+" .col-lg-8, "+rootsel+" .col-lg-9, "+rootsel+" .col-lg-10, "+rootsel+" .col-lg-11, "+rootsel+" .col-lg-12  ";
				}

function bbe_lipsum_text() {
    return '<div class="bbe-component-block">\n' +
            '   <h3 class="featurette-heading text-center" >Whatever you want \n    <span class="text-muted">me to be.</span>\n    </h3>\n' +
            '   <p class="lead text-center" >Replace me now! <br><br>  <a class="bbe-prepare-components-modal btn btn-primary btn-block" data-action="replace-block-component" role="menuitem" tabindex="-1" href="#"  ><span class="glyphicon glyphicon-log-in"></span> Choose Component...</a> \n' +
            //'   <p class="lead" >Non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.\n</p>\n' +
            '</div>\n';
}


function bbe_get_container_tools(){
    return '<div class="bbe-container-tools bbe-eliminate-on-saving" >' +
            '<p class="pull-ledft">  ' +
            ' <div class="btn-group">' +
            '    <button class="btn btn-success btn-xs dropdown-toggle bbe-dropdownMenu-container" type="button"  data-toggle="dropdown"  >' +
            '      Edit Container ' +
            '      <span class="caret"></span>' +
            '    </button>' +
            '    <ul class="dropdown-menu" role="menu"  >' +
            '      <li role="presentation"><a class="bbe-container-insert-rowandcols" role="menuitem" data-toggle="modal" data-target="#bbe-insert-rowcols-modal"  href="#"><span class="glyphicon glyphicon-th"></span>  Insert Row & Divide into Columns</a></li>' +
            '      <li role="presentation"><a class="bbe-prepare-components-modal" data-action="put-fullwidth-component-into-container" role="menuitem"   href="#"  ><span class="glyphicon glyphicon-align-justify"></span> Insert Row with FullWidth Component</a></li>' +
            '      <li role="presentation"><a class="bbe-duplicate-container" role="menuitem"   href="#"><span class="glyphicon glyphicon-duplicate"></span> Duplicate container</a></li>' +
            '      <li role="presentation"><a role="menuitem"  class="bbe-remove-container" href="#" ><span class="glyphicon glyphicon-trash"></span> Delete Container (and destroy content!)</a></li>' +
            '      <li role="presentation" class="divider"></li>' +
            '      <li role="presentation"><a class="bbe-reorder" data-action="rows" role="menuitem"   href="#"  ><span class="glyphicon  glyphicon-sort"></span> Reorder Rows...</a></li>' +
            '      <li role="presentation"><a class="bbe-reorder" data-action="containers" role="menuitem"   href="#"  ><span class="glyphicon  glyphicon-sort"></span> Reorder Containers...</a></li>' +
            '      <li role="presentation"><a class="bbe-edit-container-properties" role="menuitem"   href="#"><span class="glyphicon glyphicon-cog"></span> Edit Properties...</a></li>' +
            '      <li role="presentation"><a class="bbe-trig-edit-html-container" role="menuitem"   href="#"><span class="glyphicon glyphicon-sound-stereo"></span> HTML Editor</a></li>' +
            //'      <li role="presentation" class="divider"></li>'+
            //'      <li role="presentation"><a class="bbe-create-container role="menuitem"   href="#"> <span class="glyphicon glyphicon-plus"></span> Add Another Container</a></li>'+
            '    </ul>' +
            '</div>' +
           '</p>' +
            '</div>';
}


function bbe_get_column_tools() {
    return '<div class="bbe-column-tools bbe-eliminate-on-saving ">' +
            '<p>' +
            ' <div class="dropdown">' +
            '    <button class="btn btn-default btn-xs dropdown-toggle" type="button" data-toggle="dropdown">' +
            '      Edit Column ' +
            '      <span class="caret"></span>' +
            '    </button>' +
            '    <ul class="dropdown-menu" role="menu">' +
            '      <li role="presentation"><a class="bbe-trigger-edit-html-col" role="menuitem" tabindex="-1" href="#"><span class="glyphicon glyphicon-sound-stereo"></span> HTML Editor</a></li>' +
            '      <li role="presentation" class="divider"></li>' +
            '      <li role="presentation"><a class="bbe-reorder" data-action="columns" role="menuitem"   href="#"  ><span class="glyphicon  glyphicon-transfer"></span> Reorder Columns...</a></li>' +
            '      <li role="presentation" class="divider"></li>' +
            '      <li role="presentation"><a class="bbe-prepare-components-modal" data-action="add-block-to-col" role="menuitem" tabindex="-1" href="#"  ><span class="glyphicon glyphicon-log-in"></span> Add Block...</a></li>' +
            '    </ul>' +
            '</div>' +
            '' +
            '</p>' +
            '</div>';
}

function bbe_reveal_saving_buttons(){
  jQuery("nav.bbe-bottom-nav .bbe-hidden-before-domchange").removeClass('bbe-hidden-before-domchange');
}

function bbe_get_editable_block_tools(el) {
    //Build a customized menu for a block
    //init vars
    var custom_options="";
    var element_type="default-type";
    var extra_label="";
    
    // Carousel options
    if(jQuery(el).children('div').hasClass('carousel')) {
        element_type="carousel";
        extra_label="Carousel";
        custom_options+='<li role="presentation"><a class="bbe-add-carousel-slide" role="menuitem" tabindex="-1" href="#"><span class="glyphicon glyphicon-plus"></span> Add slide to Carousel</a></li>';
        custom_options+='<li role="presentation"><a class="bbe-change-active-carousel-img" role="menuitem" tabindex="-1" href="#"><span class="glyphicon glyphicon-picture"></span> Change current image</a></li>';
        custom_options+='<li role="presentation"><a class="bbe-remove-active-carousel-slide" role="menuitem" tabindex="-1" href="#"><span class="glyphicon glyphicon-trash"></span> Delete current slide</a></li>';
    }
    
    // Video background options
    if(jQuery(el).children('div').hasClass('bbe-videobg')) {
        element_type="video-background-wrapper";
        extra_label="Video BG";
        custom_options+='<li role="presentation"><a class="bbe-open-contextual-window-videobg"   role="menuitem" tabindex="-1" href="#"><span class="glyphicon glyphicon-film"></span> Video Options...</a></li>';
    }
    
    // Gmap embed options
    if(jQuery(el).children('div').hasClass('bbe-gmapembed')) {
        extra_label="G Map";
        element_type="gmapembed";
        custom_options+='<li role="presentation"><a class="bbe-open-contextual-window-gmapembed"  role="menuitem" tabindex="-1" href="#"><span class="glyphicon glyphicon-map-marker"></span> Map Properties...</a></li>';
    }

    //  Responsive Embed options (oEmbed)  
    if(jQuery(el).children('div').hasClass('bbe-responsive-embed')) {
        extra_label="Embed";
        element_type="responsive-embed";
        custom_options+='<li role="presentation"><a class="bbe-open-contextual-window-responsive-embed"  role="menuitem" tabindex="-1" href="#"><span class="glyphicon glyphicon-facetime-video"></span> Embed URL...</a></li>';
    }
  
    // Collapsible options
    if(jQuery(el).children('div').hasClass('panel-group')) {
        element_type="panel-group";
        extra_label="Collapsible";
        custom_options+='<li role="presentation"><a class="bbe-change-collapsible-bootstrap-class" role="menuitem" tabindex="-1" href="#"><span class="glyphicon glyphicon-tint"></span> Heading Background...</a></li>';
        custom_options+='<li role="presentation"><a class="bbe-add-panel-element" role="menuitem" tabindex="-1" href="#"><span class="glyphicon glyphicon-plus"></span> Add Panel</a></li>'; 
        custom_options+='<li role="presentation"><a class="bbe-remove-panel-element" role="menuitem" tabindex="-1" href="#"><span class="glyphicon glyphicon-trash"></span> Delete current Panel</a></li>';
    }
    
    // Panel options
    if(jQuery(el).children('div').hasClass('panel')) {
        element_type="panel";
        custom_options+='<li role="presentation"><a class="bbe-change-panel-bootstrap-class" role="menuitem" tabindex="-1" href="#"><span class="glyphicon glyphicon-tint"></span> Panel Heading Background...</a></li>';
    }
    // Alert options
    if(jQuery(el).children('div').hasClass('alert')) {
        element_type="alert";
        custom_options+='<li role="presentation"><a class="bbe-change-alert-bootstrap-class" role="menuitem" tabindex="-1" href="#"><span class="glyphicon glyphicon-tint"></span> Alert Background...</a></li>';
    }
	// Nav tabs  
	if(jQuery(el).children('div').hasClass('tab-content')) {
        element_type="tab-content";
        extra_label="Tabber";
        custom_options+='<li role="presentation"><a class="bbe-add-tab-element" role="menuitem" tabindex="-1" href="#"><span class="glyphicon glyphicon-plus"></span> Add Tab Panel</a></li>'; 
        custom_options+='<li role="presentation"><a class="bbe-remove-tab-element" role="menuitem" tabindex="-1" href="#"><span class="glyphicon glyphicon-trash"></span> Delete current Tab</a></li>';
    }
	// Gallery options
    if(jQuery(el).children('div').hasClass('bbe-gallery')) {
        element_type="bbe-gallery";
        extra_label="Gallery";
        custom_options+='<li role="presentation"><a class="bbe-add-gallery-image" role="menuitem" tabindex="-1" href="#"><span class="glyphicon glyphicon-plus"></span> Add Gallery Image</a></li>';
        custom_options+='<li role="presentation"><a class="bbe-remove-gallery-image" role="menuitem" tabindex="-1" href="#"><span class="glyphicon glyphicon-trash"></span> Delete last Image</a></li>';
        custom_options+='<li role="presentation"><a class="bbe-reorder" data-action="gallery" role="menuitem"   href="#"  ><span class="glyphicon  glyphicon-transfer"></span> Reorder Images...</a></li>';  
    }
	// SVG object options
    if(jQuery(el).children('object').hasClass('bbe-svg-object')) {
        element_type="bbe-svg-object";
        extra_label="SVG Image";
        custom_options+='<li role="presentation"><a class="bbe-open-contextual-window-svg"  role="menuitem" tabindex="-1" href="#"><span class="glyphicon glyphicon-picture"></span> Change SVG Image</a></li>';
    }
	//bbe-posts-loop $(this).is('[name]');
    if(jQuery(el).children('*[data-bbe-helper]').length) {
        element_type=jQuery(el).children('*[data-bbe-helper]').attr('data-bbe-helper');
        extra_label=element_type.replace('-',' ').ucwords();
        custom_options+='<li role="presentation"><a class="bbe-open-contextual-window-'+element_type+'"  role="menuitem" tabindex="-1" href="#"><span class="glyphicon glyphicon-cog"></span> Edit ' +extra_label+ ' Options</a></li>';
    }
    
    
    
	if(custom_options!=="") {
        custom_options+='<li role="presentation" class="divider"></li>';
    }
				
				 
								
    return '<div class="bbe-block-tools bbe-eliminate-on-saving" data-bbe-tools-for="'+element_type+'">' +
            //'<p class="">' +
            ' <div class="dropdown">' +
            '    <button class="btn btn-default btn-xs dropdown-toggle" type="button" data-toggle="dropdown">' +
            '      Edit '+extra_label+' Block ' +
            '      <span class="caret"></span>' +
            '    </button>' +
            '    <ul class="dropdown-menu" role="menu">' +
            custom_options+  
            
            '      <li role="presentation"><a class="bbe-trigger-edit-html-block" role="menuitem" tabindex="-1" href="#"><span class="glyphicon glyphicon-sound-stereo"></span> HTML Editor</a></li>' +
            '      <li role="presentation"><a class="bbe-copy-block" role="menuitem" tabindex="-1" href="#"><span class="glyphicon glyphicon-copy"></span> Copy Block</a></li>' +
            '      <li role="presentation"><a class="bbe-paste-block" role="menuitem" tabindex="-1" href="#"><span class="glyphicon glyphicon-paste"></span> Paste Block</a></li>' +
            '      <li role="presentation"><a class="bbe-duplicate-block" role="menuitem" tabindex="-1" href="#"><span class="glyphicon glyphicon-duplicate"></span> Duplicate Block</a></li>' +
            '      <li role="presentation"><a class="bbe-delete-block" role="menuitem" tabindex="-1" href="#"><span class="glyphicon glyphicon-trash"></span> Delete Block</a></li>' +
            '      <li role="presentation" class="divider"></li>' +
            '      <li role="presentation"><a class="bbe-reorder" data-action="blocks" role="menuitem"   href="#"  ><span class="glyphicon  glyphicon-sort"></span> Reorder Blocks...</a></li>' +
            '      <li role="presentation"><a class="bbe-prepare-components-modal" data-action="replace-block-component" role="menuitem" tabindex="-1" href="#"  ><span class="glyphicon glyphicon-log-in"></span> Replace with Component...</a></li>' +
            '    </ul>' +
            '</div>' +
            '' +
            //'</p>' +
            '</div>';
}


// FUNCTION TO UPDATE ALL DATA-*-ID TO A DIV
function bbe_replace_data_id(div) {
    var arrDataId = [
        'data-wrapper-id',
        'data-container-id',
        'data-column-id',
        'data-block-id',
    //    'data-video-id',
    //    'data-video-edit-id',
    //    'data-embed-responsive-video-id',
        'data-collapsible-id',
        'data-collapsible-edit-id',
        'data-list-group-id',
        'data-list-group-edit-id',
        'data-panel-id',
        'data-panel-edit-id',
        'data-progress-id',
        'data-progress-edit-id',
        'data-image-id',
    //    'data-icon-id',
    //    'data-link-id',
    //    'data-link-edit-id'
    ];
    jQuery(arrDataId).each(function(k,v) {
        if(div.attr(v) != undefined) {
            div.attr(v,bbe_randomString());
        }
        div.find('*['+v+']').each(function() {
            jQuery(this).attr(v,bbe_randomString());
        });
    });
}



function bbe_check_if_content_empty()

{
    //INITIALIZE WHEN CONTENT IS EMPTY
    if (jQuery(bbe_get_rootSel()).html().replace(/ /g,'').replace(/\n/g,'') == "")
    {
        html_welcome_empty_project =
								'<div id="bbe-new-project-notice" class="container-fluid bg-primary text-center" >' +
                '<h1>Welcome to the BootStrap Building Engine</h1> ' +
                '<h2>Your page is now empty. Get started now!</h2>' +
														 	'<p><br></p><p>Feeling lazy? </p> <a href="#" id="bbe-lazy-webmaster-link" class="bbe-show-readymade-templates btn btn-lg btn-outlined btn-info" ><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>  Pick a Starter Template</a>'+
																'<div id="bbe-new-project-notice-down"   class="text-center   animated bounceInDown">'+
																'<h3>...or build your own masterpiece:</h3>'+
																'<span class="fa fa-arrow-down " ></span>'+
																'</div>'+
        '</div>';
        jQuery(bbe_get_rootSel()).hide().html(html_welcome_empty_project).slideDown().removeAttr("style");
    }

}


// FUNCTION CALLED AFTER ADDING A COMPONENT TO RUN SOME JS
function callback_add_component(divToEdit) {
    // add an auto background url after insert the image big component
    if(divToEdit.find('.image-bg-title').length) {
        divToEdit.parent().attr("data-bbe-bg-editable","1").css('background-image',"url('https://images.unsplash.com/photo-1424894408462-1c89797f2305?fit=crop&fm=jpg&h=500&ixlib=rb-0.3.5&q=80&w=1450')").addClass("bbe-bscover");
    }
}


///INIT EDITING TOOLS  to all suitable elements inside rootsel /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function bbe_remove_editing_tools()
{
    //jQuery("body").removeClass("bbe-body-flag-on");
    jQuery(bbe_get_rootSel() + " .bbe-eliminate-on-saving").remove();
    jQuery(bbe_get_rootSel() + " *[data-bbe-inline-editable=1]").removeAttr("contenteditable");
    jQuery(bbe_get_rootSel() + " *[data-image-id]").removeAttr('data-image-id');
    //jQuery(bbe_get_rootSel() + " *[data-video-id]").removeAttr('data-video-id');
    //jQuery(bbe_get_rootSel() + " *[data-embed-responsive-video-id]").removeAttr('data-embed-responsive-video-id');
    jQuery(bbe_get_rootSel() + " *[data-collapsible-id]").removeAttr('data-collapsible-id');
    jQuery(bbe_get_rootSel() + " *[data-list-group-id]").removeAttr('data-list-group-id');
    jQuery(bbe_get_rootSel() + " *[data-panel-id]").removeAttr('data-panel-id');
    jQuery(bbe_get_rootSel() + " *[data-progress-id]").removeAttr('data-progress-id');
}



function bbe_init_editing_tools() {
				 
    rootsel = bbe_get_rootSel();
    //REMOVE EDITOR BITS AND PIECES IF WE ARE RE-INITING
    bbe_remove_editing_tools();
				
    ///jQuery("body").addClass("bbe-body-flag-on");
				
    //TAKE CARE OF .BBE-INLINE-EDITABLE DECLARED ELEMENTS
    jQuery(rootsel + " *[data-bbe-inline-editable=1]").attr("contenteditable", "true");
				
				
    ///START ADDING THE EDITOR LOOPING ALL RELEVANT ELEMENTS:                                
    //LOOP EACH CONTAINER   AND ADD EDITORS  ///////////////////////////////////////////////////                               
    jQuery(rootsel + " .container, " + rootsel + " .container-fluid").each(function (index, el) {
        if (jQuery(el).attr("data-container-id") == undefined && jQuery(el).attr("id")!='bbe-new-project-notice' ) jQuery(el).attr("data-container-id", bbe_randomString());   
        jQuery(el).append(bbe_get_container_tools());
    });
    //LOOP EACH COLUMN  AND ADD EDITORS   /////////////////////////////////////////////////// 
    jQuery(get_all_column_classes_list()).each(function (index, el) {
		if (!jQuery(el).parent().hasClass("bbe-gallery")){ 
			if (jQuery(el).attr("data-column-id") === undefined) jQuery(el).attr("data-column-id", bbe_randomString());       
			jQuery(el).append(bbe_get_column_tools());
			}
    }); //end each
    //LOOP EACH UNIT BLOCK  AND ADD EDITORS   ///////////////////////////////////////////////////
    jQuery(rootsel + " .bbe-component-block").each(function (index, el) {
        if (jQuery(el).attr("data-block-id") === undefined) jQuery(el).attr("data-block-id", bbe_randomString());        
        jQuery(el).append(bbe_get_editable_block_tools(el));
    });

    //ALL EDITORS FIRED NOW.
    

    
} //end initializing function

function bbe_render_shortcode(el){
    //build preview for a .bbe-liveshortcode div
    jQuery(el).parent().find(".bbe-shortcode-preview").remove();
    var preview_random_id="livepreview-" +bbe_randomString();
    jQuery(el).after("<div id='"+ preview_random_id+"' class='bbe-shortcode-preview'>Loading preview...</div>");
    jQuery.ajax({
               type : "post",
               dataType : "html",
               url : ajax_object.ajax_url,
               data : {action: "bbe_process_shortcode", shortcode: jQuery(el).text() },
               success: function(response) {
                    jQuery(el).parent().find('#'+preview_random_id).html(response); //place 
               }
    }); //end ajax call
      
}

function bbe_remove_all_shortcode_previews(){
        jQuery(bbe_get_rootSel() + " .bbe-shortcode-preview").remove();
}


function bbe_render_all_shortcodes(){
        jQuery(bbe_get_rootSel() + " .bbe-liveshortcode").each(function (index, el) {
            bbe_render_shortcode(el);
        }); //end each
}

function bbe_render_shortcodes_in_block(element){ //good api
        jQuery(element).find(".bbe-liveshortcode").each(function (index, el) {
            bbe_render_shortcode(el);
        }); //end each
}
    
        

function bbe_init_navbar(){ //SAVING FORM INJECT VALUES for SAVING 
				
				jQuery(".bbe-bottom-nav input[name='bbe-saving-id']").val(jQuery(bbe_get_rootSel()).attr("data-bbe-saving-id"));
				jQuery(".bbe-bottom-nav #bbe-the-form").attr("action",ajax_object.ajax_url);
}


function bbe_filter_components(unfiltered_html_components){ 
				var filtered_html = unfiltered_html_components.replace(/@randomid@/g, bbe_randomString());		///substitute random IDs for components
				var filtered_html = filtered_html.replace(/@zero_to_ten@/g, Math.floor((Math.random() * 10) + 1) ); ///substitute random vars for demo images
				return filtered_html;								
}


function bbe_check_api_key() {
				
				//CHECK TOKEN EXPIRATION
				var now = new Date().getTime();
				if (localStorage.getItem('bbe_apikey_setuptime')===null || (now-(localStorage.getItem('bbe_apikey_setuptime')) > 7*24*60*60*1000 )) //seven days and one week
												{
																localStorage.removeItem('bbe_apikey');
																console.log("API Key expired, deleting it.");
												}
								
								
				//CHECK if TOKEN EXISTS
				if (localStorage.getItem("bbe_apikey")===null ) 
						 
								{			//DOES NOT EXIST: WE HAVE TO GET API KEY
												console.log("Remote auth, to get new API Key....");
												jQuery("#bbe-modal-backdrop").fadeIn();
												jQuery("#bbe-modal-splash-login").draggable({ handle: "h4", containment: "window"  }).fadeIn();
												//switch modal status
												jQuery('body').attr("data-bbe-status","logging");
												
												return false; //DELIVER FAILURE
								}
												
								else {
																//API KEY IS PRESENT
																//jQuery("#bbe-modal-splash-login").hide(); //hide login window
																
																console.log("Welcome, "+localStorage.getItem("bbe_username")); 
																
																//switch modal status
																jQuery('body').attr("data-bbe-status","logged");
												
																return true; //DELIVER SUCCESS
								}
								
} //end function

//USER CLICKS LOGIN BUTTON
jQuery("body").on("click", "#bbe-open-login-popup", function (e) {
        e.preventDefault();
        var url = 'https://www.dopewp.com/get-app-token-v3/?src='+encodeURIComponent(window.location.href);
        bbe_login_popup_window = window.open(url, "", bbe_popup_style_parameters());
        
    }); //end function
    
	
// END FUNCTIONS ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//GET API KEY short circuit////////////////// 
if(bbe_$_GET('set_api_key')) {					
    localStorage.setItem("bbe_apikey", bbe_$_GET('set_api_key'));
    localStorage.setItem("bbe_username", bbe_$_GET('bbe_username'));
    var now = new Date().getTime();
    localStorage.setItem("bbe_apikey_setuptime", now);
    
    var html =	'<h3 style="text-align:center">Welcome: '+localStorage.getItem("bbe_username")+'</h3>'+
                '<h4 style="text-align:center">Activated Key: '+localStorage.getItem("bbe_apikey")+'</h4>'+
                '<p style="text-align:center;margin-bottom:40vh">Attempt to open the cloud browser automatically...</p>		';
    console.log(html);
    jQuery('body').html(html);
    
    //close login modal 
    jQuery('#bbe-modal-splash-login,#bbe-modal-backdrop', window.opener.document).fadeOut();
    
    //try reissueing last action...
    jQuery('.bbe-last-clicked-before-login-attempt', window.opener.document).click();
     
    window.close(); //close popup
    } // end function
					
/////////////////////////////////////////////////        			
// DOCUMENT READY
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
jQuery(document).ready(function ($) {			
    var isChromium = window.chrome,winNav = window.navigator,vendorName = winNav.vendor,isOpera = winNav.userAgent.indexOf("OPR") > -1,    isIEedge = winNav.userAgent.indexOf("Edge") > -1,    isIOSChrome = winNav.userAgent.match("CriOS");

    if(isIOSChrome){
       // is Google Chrome on IOS
       alert("Please use a desktop machine for running the BBE Editor!");
    } else if(isChromium !== null && isChromium !== undefined && vendorName === "Google Inc." && isOpera === false && isIEedge === false) {
       // is Google Chrome
    } else { 
       // not Google Chrome
        alert("We recommend running the BBE Editor on Google Chrome for best results!");
    }
    
    //since editor is active, flag the body
    jQuery('body').addClass('bbe-editor-active');
    //basically, we're unlogged
    jQuery("body").attr("data-bbe-status","unlogged");
    
    //check if div empty
    bbe_check_if_content_empty();

    //ADD TOOLBAR &  TOOLS
    bbe_init_navbar();
    bbe_init_editing_tools();
    
    ///RENDER AJAX PREVIEW OF SHORTCODES
    bbe_render_all_shortcodes();
    
	//INIT TOOLTIPS on navbar
	jQuery('[data-toggle="tooltip"]').tooltip();
    
    //INIT ICONS WINDOW
    jQuery("#bbe-contextual-window-icons #bbe-icons-listing").load("?bbe_action=load_icons", function () { });
     
    //SET NETWORK TIMEOUT
    jQuery.ajaxSetup({ timeout: 5000 });
     
    //INIT COMPONENTS WINDOW
    
    
    function bbe_load_basic_components(){
        jQuery( "li[data-slug='basic-elements']").click().parent().addClass('active'); //TRIGGER FORM
    }
    setTimeout(bbe_load_basic_components, 2000);

    //FOR DEBUG COMMODITY, SHOW COMPONENTS WINDOW
    //jQuery("#bbe-contextual-window-components").show();
    
    //TAKE CARE OF .BBE-INLINE-EDITABLE PASTING
    jQuery(rootsel).on("paste"," *[data-bbe-inline-editable=1]", function (e) {
								
		e.preventDefault();// alert("paste intercept");
		var text = (e.originalEvent || e).clipboardData.getData('text/plain') || prompt('Paste something..');
		
		setTimeout(function () {
						var tmp = document.createElement("DIV");
						tmp.innerHTML = text;
						//text=text.replace(/(<([^>]+)>)/ig,"");
						text = tmp.textContent || tmp.innerText;
						text=text.replace(/\n/g, ' ');
						
						jQuery(".bbe-eliminate-on-saving").remove(); //important, not to mess up stuff!
						document.execCommand('insertText', false, text);
						bbe_init_editing_tools();
		}, 100);

    });
			
	//TAKE CARE OF .BBE-INLINE-EDITABLE NEWLINE  / ENTER KEY  
    jQuery(rootsel).on("keydown"," *[data-bbe-inline-editable=1]", function (e) { if (e.keyCode === 13) { document.execCommand('insertHTML', false, '<br>'); return false; 	}		});
 
    /////INTERCEPT CSS CHANGES AND SHOW SAVING BUTTONS    								
    jQuery("#bbe-page-style" ).bind("DOMSubtreeModified", function() {
        bbe_reveal_saving_buttons();
    });    
    
    /////INTERCEPT HTML CHANGES AND SHOW SAVING BUTTONS    	
    var bbe_main_observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
             //console.log(mutation.type);
             bbe_reveal_saving_buttons();
             bbe_main_observer.disconnect();
        });    
    });
    var observerConfig = { attributes: true, childList: true,  characterData: true, subtree:true };
    var targetNode =  jQuery( bbe_get_rootSel() )[0];
    bbe_main_observer.observe(targetNode, observerConfig);
    ////////////////////////    
        
    //CANCEL HTML SAVING     
    jQuery("body").on("click", ".bbe-cancel-saving-layout", function (e) {
		e.preventDefault();
		if  (typeof bbe_html_window !== "undefined") bbe_html_window.close(); //Close HTML popup if it was open
		if  (typeof bbe_css_window !== "undefined") bbe_css_window.close(); //Close CSS popup if it was open
		window.location.assign(window.location.href.split('bbe_action_launch_editing=1').join(''));
	});
				
    // SAVE LAYOUT //////////////////////////////////////// // bind form using 'ajaxForm' 
    jQuery('#bbe-the-form').ajaxForm({
        data: {
            // Here you can include additional data along with the form fields
			action:'bbe_save_page',
        },
        target: '#bbe-saving-result', 
        //	beforeSubmit: function(formData, jqForm, options) {
        beforeSerialize: function (jqForm, options) {
            jQuery('#bbe-saving-result').html("Saving page...").fadeIn();
           
            //   CLOSE POPUP WINDOWS - "optional" & new
            if  (typeof bbe_html_window !== "undefined") bbe_html_window.close(); //Close HTML popup if it was open
            if  (typeof bbe_css_window !== "undefined") bbe_css_window.close(); //Close CSS popup if it was open
            
            //STOP TINYMCE  
            if (typeof tinymce == 'object' ) {
                //	tinymce.execCommand('mceRemoveControl', true, 'mce_0');
                jQuery("div[data-bbe-html-editable]").removeAttr("style").removeAttr("id").removeAttr("spellcheck").removeAttr("style");
                jQuery("div[data-bbe-html-editable] a[data-mce-href]").removeAttr("data-mce-href");
                jQuery("div[data-bbe-html-editable] *[data-mce-bogus]").removeAttr("data-mce-bogus");
                tinyMCE.remove();
            }
											
            bbe_remove_editing_tools();
            jQuery(".bbe-shortcode-preview").remove(); //remove shortcode previews
            //reset all dynamic components   
            reset_all_dynamic_components();
            //PUT CONTENT IN HIDDEN FIELD
            jQuery("[name='bbe-magic-html']").val(jQuery(bbe_get_rootSel()).html());
			jQuery("[name='bbe-magic-css']").val(jQuery("#bbe-page-style").html());
												
        },
        success: function (responseText, statusText, xhr, $form) {   //alert("loadedsaving!"+jQuery("[name='bbe-magic-html']").val());
            bbe_init_editing_tools();
            bbe_render_all_shortcodes();
            //location.reload(true);
            jQuery('#bbe-saving-result').fadeOut(1000);
			bbe_check_if_content_empty();
												
        }

    });


    //function to reset all dynamic components
    function reset_all_dynamic_components() {
        reset_tabs();
        reset_carousel();
        reset_collapse();
		reset_readmore();
    }

    //RESET CAROUSELS
    function reset_carousel() {
        $('.carousel').each(function () {
            $(this).find('.carousel-inner .item').removeClass('prev right active');
            $(this).find('.carousel-indicators li').removeClass('active');
            $(this).find('.carousel-inner .item:first').addClass('active');
            $(this).find('.carousel-indicators li:first').addClass('active');
        });
    }

    //RESET TABS
    function reset_tabs() {
        $('.nav-tabs').each(function () {
            $(this).find('li').removeClass('active');
            $(this).parent().find('.tab-content .tab-pane').removeClass('active');
            $(this).find('li:first').addClass('active');
            $(this).parent().find('.tab-content .tab-pane:first').addClass('active');
        });
    }

    //RESET COLLAPSE
    function reset_collapse() {
        $('.panel-group:not(".noreset")').each(function () {
            $(this).find('.panel-collapse').removeClass('in');
            $(this).find('.panel-collapse:first').css('height', 'auto').addClass('in');
        });
    }
				
	//RESET READ MORE
    function reset_readmore() {
        $('.read-more-text').each(function () {
            $(this).removeClass('in');
          
        });
    }

    ///END SAVING STUFF ////////////////////////
    

    //USER CLICKS ON KILL TOOLS  - needed for communication from editor window
    jQuery("body").on("click", "#bbe-kill-tools", function (e)
    {
        e.preventDefault();
        bbe_remove_editing_tools();
    });
				
    //USER CLICKS ON ADD TOOLS - needed for communication from editor window
    jQuery("body").on("click", "#bbe-add-editing-tools", function (e)
    {
        e.preventDefault();
        bbe_init_editing_tools();
    });

    //USER CLICKS ON CREATE NEW CONTAINER    
    jQuery("body").on("click", ".bbe-create-container, .bbe-create-container-fluid", function (e){
        e.preventDefault();

        jQuery("#bbe-new-project-notice").slideUp().remove();
        jQuery(".bbe-newly-created-container-wrap").removeClass("bbe-newly-created-container-wrap");
		if (jQuery(this).hasClass("bbe-create-container-fluid"))		{ var the_container_class="container-fluid"; } else  { var the_container_class="container"; }
		var the_helper_link='<a class="bbe-prepare-components-modal btn btn-primary btn-md" data-action="put-fullwidth-component-into-container" href="#"  ><span class="glyphicon glyphicon-align-justify"></span> Insert Row with FullWidth Component</a> ';
						
		var the_helper_link2='<a class="bbe-container-insert-rowandcols btn btn-primary btn-md" data-toggle="modal" data-target="#bbe-insert-rowcols-modal" href="#"><span class="glyphicon glyphicon-th"></span>  Insert Row & Divide into Columns</a> ';
												
        the_new_element ='\n'+
						 '<div class="bbe-container-wrap bbe-newly-created-container-wrap" data-wrapper-id="'+bbe_randomString()+'">\n' +
						 ' <div class="bbe-container '+the_container_class+' "> \n' +
						 '   <div class="bbe-lipsum-title">\n'+
						 '		<h1 class="text-center ">A new  <span class="text-muted">'+the_container_class+'</span></h1> <br />\n'+
						 '		<br /> <h3 class="text-center">'+the_helper_link+' or '+the_helper_link2+'</h3> \n' +							
						 '   </div>\n' +
						 '  \n</div><!-- /bbe-container  -->\n' +
                         '</div>';
		if (jQuery(bbe_get_rootSel()).html() == "")
            jQuery(bbe_get_rootSel()).append(the_new_element); //new document
        else
            jQuery(bbe_get_rootSel() + " .bbe-container-wrap:last").after(the_new_element); //add to existing
								 
        jQuery(".bbe-newly-created-container-wrap").hide().slideDown(500, function () {
            jQuery(".bbe-newly-created-container-wrap").removeAttr("style"); //removeClass("bbe-newly-created-container-wrap").
			bbe_init_editing_tools();
        });
								
        jQuery('html, body').animate({
            scrollTop: jQuery(".bbe-newly-created-container-wrap").offset().top
        }, 1000);
								
    });


    //USER CLICKS ON INSERT NEW ROW & COLS    
    jQuery("body").on("click", ".bbe-container-insert-rowandcols", function (e)
    {
        e.preventDefault();
        contentDiv = jQuery(this).closest(".bbe-container-wrap").find(".bbe-container"); //se la passa alla funzione seguente :)

    }); //end function


    //USER CLICKS  INSERT COLUMN SCHEME FROM ADD ROW&COLS MODAL WINDOW 
    jQuery("body").on("click", ".bbe-insert-row-and-cols-from-modal", function (e)
    {    jQuery(".bbe-newly-created-container-wrap").removeClass("bbe-newly-created-container-wrap");
        
        var column_schema = jQuery(this).attr("data-rows");
        var array_col_schema = column_schema.split("-");
        var html_columns = "";
        array_col_schema.forEach(function (columnSize) {
            //alert(columnSize);
            html_columns = html_columns + '\n <div class="col-md-' + columnSize + '">\n<div class="bbe-col-content-wrap">\n' + bbe_lipsum_text() + '\n</div><!-- /bbe-col-content-wrap -->\n</div><!-- /col -->\n';
        });
        html_new_row = '<div class="row">' + html_columns + '</div><!-- close row --> \n';
        contentDiv.find('.bbe-lipsum-title').remove(); //remove placeholder
        contentDiv.append(html_new_row);
        bbe_init_editing_tools();
		jQuery("#bbe-insert-rowcols-modal button.close").click();
    });



    //USER CLICKS EDIT CONTAINER PROPERTIES 
    jQuery("body").on("click", ".bbe-edit-container-properties", function (e) {
        e.preventDefault();
        var divToEdit = jQuery(this).closest("div[data-container-id]");
        var unique_element_id = divToEdit.attr("data-container-id");
        jQuery(".bbe-edit-container-nav").attr("data-container-id", unique_element_id);

        //initialize the status of the fluid/fixed radio button 
        if (divToEdit.hasClass("container-fluid")) { //it's fluid, let's highlight the radio  button!
            jQuery("#optionsRadiosContainerFluid").prop('checked', true);
        } else {// it should be fixed, let's highlight the radio  button!
            jQuery("#optionsRadiosContainerFixed").prop('checked', true);
		}

        //initialize the status of the full Height radio button 
        if (divToEdit.hasClass("bbh-fullscreen-height")) {
            jQuery("#optionsRadiosContainerFullHeightYes").prop('checked', true);
        } else {
            jQuery("#optionsRadiosContainerFullHeightNo").prop('checked', true);
        }
								
        //initialize the status of the container margin  radio button
		jQuery("#optionsRadiosContainerMargin0").prop('checked', true); //Main default for radio
        
        if (divToEdit.hasClass("bbe-mbsingle")) {
            jQuery("#optionsRadiosContainerMargin1").prop('checked', true);
        }

        if (divToEdit.hasClass("bbe-mbdouble")) {
            jQuery("#optionsRadiosContainerMargin2").prop('checked', true);
        }
								
        //initialize the status of the container padding radio button
		jQuery("#optionsRadiosContainerPadding0").prop('checked', true); //Main default for radio
        
		if (divToEdit.hasClass("bbe-psingle")) {
            jQuery("#optionsRadiosContainerPadding1").prop('checked', true);
        }
 
        if (divToEdit.hasClass("bbe-pdouble")) {
            jQuery("#optionsRadiosContainerPadding2").prop('checked', true);
        }			
								
        //initialize the status of the container pattern 
        jQuery("#ContainerBgPattern").val('');
		if (divToEdit.parent().attr("data-bgpattern")!==null) {
            jQuery("#ContainerBgPattern").val(divToEdit.parent().attr("data-bgpattern"));
        }
        
        //initialize the color of the wrap background
        var color_wrap=divToEdit.parent().css("background-color");
        if(color_wrap.indexOf("rgb(") >= 0) {
            jQuery("#bbe-container-wrap-background").val(bbe_rgb2hex(color_wrap));
        } else jQuery("#bbe-container-wrap-background").val("#ffffff");

        //initialize the color of the inner background
        var color_inner=divToEdit.css("background-color");
        if(color_inner.indexOf("rgb(") >= 0) {
            jQuery("#bbe-container-background").val(bbe_rgb2hex(color_inner));
        } else jQuery("#bbe-container-background").val("#ffffff");
        
        //initialize the background url value
        var background_image=divToEdit.parent().css("background-image");
        var background_url="";
        
        if (background_image.indexOf('url') == -1)  { //no urls here - //it can return a linear gradient! 
            background_url="";
            } else { //a url is present				
            background_url = background_image.replace('url("','').replace('")','');
            if(background_url == 'none') { 	background_url = ''; }
            }
        //set value	in interface							
        jQuery("#bbe-container-background-image-demo").attr("src",background_url);

        
        //initialize the status of the container background url attachment radio button 
        if (divToEdit.parent().hasClass("bbe-bafixed")) {
            jQuery("#optionsRadiosContainerBackgroundFixed").prop('checked', true);
        }
        
        jQuery('.bbe-bottom-nav-first-row').slideUp('slow',function() {
            jQuery('.bbe-edit-container-nav').slideDown('slow');
        });
        
       
    }); //end ONCLICK  EDIT CONTAINER PROPERTIES 
    
    //USER CLICKS CLOSE EDIT CONTAINER PROPERTIES 
    jQuery("body").on("click", ".bbe-close-edit-container-properties", function (e) {
        jQuery('.bbe-edit-container-nav').slideUp('slow',function() {
            jQuery('.bbe-bottom-nav-first-row').slideDown('slow');
        });
    });
    
    //USER CLICKS DUPLICATE CONTAINER 
    jQuery("body").on("click", ".bbe-duplicate-container", function (e) {
        var containerToDuplicate = jQuery(this).closest("div[data-wrapper-id]");
        var the_new_element = containerToDuplicate.clone().addClass('bbe-newly-created-container-wrap');
        bbe_replace_data_id(the_new_element);
        jQuery(bbe_get_rootSel()).append(the_new_element);
        jQuery('html, body').animate({
            scrollTop: jQuery(".bbe-newly-created-container-wrap").offset().top
        }, 1000);
        setTimeout(function() {
            jQuery(".bbe-newly-created-container-wrap").removeClass("bbe-newly-created-container-wrap");
            bbe_init_editing_tools();
        },500);
    });

	/////////  CONTAINER PROPERTIES ACTION HANDLING ////////////////////////////////////////////////////////////////
				
    //handle toggling radio buttons of container width in modal of container options
    jQuery("body").on("change", "input[name='optionsRadiosContainerFluidFixed']", function () {
        var radioValue = jQuery(this).val();
        unique_element_id = jQuery(".bbe-edit-container-nav").attr("data-container-id");
        divToEdit = jQuery(bbe_get_rootSel() + " div[data-container-id=" + unique_element_id + "]");

        if (radioValue == "fluid")
        {      //switch container to fluid
            divToEdit.removeClass("container").addClass("container-fluid");
        }
        if (radioValue == "fixed")
        {      //switch container to fixed
            divToEdit.removeClass("container-fluid").addClass("container");
        }
    });
     
					
    //handle toggling radio buttons of container FullScreen Height Option in modal of container options
    jQuery("body").on("change", "input[name='optionsRadiosContainerFullHeight']", function () {
        var radioValue = jQuery(this).val();
        unique_element_id = jQuery(".bbe-edit-container-nav").attr("data-container-id");
        divToEdit = jQuery(bbe_get_rootSel() + " div[data-container-id=" + unique_element_id + "]"); //color the wrap

        if (radioValue == "yes")
        {      //switch container to fluid
            divToEdit.addClass("bbh-fullscreen-height");
        }
        if (radioValue == "no")
        {      //switch container to fixed
            divToEdit.removeClass("bbh-fullscreen-height");
        }
    });

				
    //handle toggling radio buttons of container Margin Bottom in modal of container options
    jQuery("body").on("change", "input[name='optionsRadiosContainerMargin']", function () {
        var radioValue = jQuery(this).val();
        unique_element_id = jQuery(".bbe-edit-container-nav").attr("data-container-id");
        divToEdit = jQuery(bbe_get_rootSel() + " div[data-container-id=" + unique_element_id + "]"); //color the wrap

        if (radioValue == "")
        {      //switch container to fluid
            divToEdit.removeClass("bbe-mbsingle").removeClass("bbe-mbdouble");
        }
        else 
        {      //switch container to fixed
            divToEdit.removeClass("bbe-mbsingle").removeClass("bbe-mbdouble").addClass(radioValue);
        }
    });
    
    
    
    //handle toggling radio buttons of container Padding Bottom in modal of container options
    jQuery("body").on("change", "input[name='optionsRadiosContainerPadding']", function () {
        var radioValue = jQuery(this).val();
        unique_element_id = jQuery(".bbe-edit-container-nav").attr("data-container-id");
        divToEdit = jQuery(bbe_get_rootSel() + " div[data-container-id=" + unique_element_id + "]"); //color the wrap

        if (radioValue == "")
        {      //switch container to fluid
            divToEdit.removeClass("bbe-psingle").removeClass("bbe-pdouble");
        }
        else 
        {      //switch container to fixed
            divToEdit.removeClass("bbe-psingle").removeClass("bbe-pdouble").addClass(radioValue);
        }
    });
    

    //HANDLE CONTAINER BACKGROUND  WRAP COLOR CHANGE
    jQuery("body").on("change", "#bbe-container-wrap-background", function (e)
    {
        e.preventDefault();
        var newColor = jQuery(this).val();
        unique_element_id = jQuery(".bbe-edit-container-nav").attr("data-container-id");
        divToEdit = jQuery(bbe_get_rootSel() + " div[data-container-id=" + unique_element_id + "]").parent();  
        divToEdit.css("background-color", newColor);
		jQuery("#ContainerBgPattern").val(0).change(); //disable backgound pattern preset
    });

    //HANDLE CONTAINER BACKGROUND COLOR CHANGE
    jQuery("body").on("change", "#bbe-container-background", function (e)
    {		 
        e.preventDefault();
        var newColor = jQuery(this).val();
        unique_element_id = jQuery(".bbe-edit-container-nav").attr("data-container-id");
        divToEdit = jQuery(bbe_get_rootSel() + " div[data-container-id=" + unique_element_id + "]");  
        divToEdit.css("background-color", newColor);
    });
				
				
	/// handle COLOR RESET BUTTON reset-color-inputfield-wrap
	jQuery("body").on("click", ".reset-color-inputfield-wrap", function () {
        jQuery(this).parent().find("input").val("#ffffff");//set color widget to white
		unique_element_id = jQuery(".bbe-edit-container-nav").attr("data-container-id");
        divToEdit = jQuery(bbe_get_rootSel() + " div[data-container-id=" + unique_element_id + "]").parent();    
        divToEdit.css("background-color", ''); //remove background color
								
    });
				
				
	/// handle COLOR RESET BUTTON reset-color-inputfield-bg
	jQuery("body").on("click", ".reset-color-inputfield-bg", function () {
        jQuery(this).parent().find("input").val("#ffffff");//set color widget to white
		unique_element_id = jQuery(".bbe-edit-container-nav").attr("data-container-id");
        divToEdit = jQuery(bbe_get_rootSel() + " div[data-container-id=" + unique_element_id + "]");    
        divToEdit.css("background-color", ''); //remove background color
								
    });
				
				
    ///BACKGROUND PATTERNS
    jQuery(".bbe-bottom-nav").on("input", "#ContainerBgPattern", function (e) {
        e.preventDefault();
         
        var unique_element_id = jQuery(".bbe-edit-container-nav").attr("data-container-id");
		if (jQuery(this).val()==0) jQuery(bbe_get_rootSel() + " div[data-container-id=" + unique_element_id + "]").parent().removeAttr("data-bgpattern");
												else
												{		jQuery(".reset-color-inputfield-wrap").click();
														jQuery(bbe_get_rootSel() + " div[data-container-id=" + unique_element_id + "]").parent().attr("data-bgpattern", jQuery(this).val());
																
												}
    });
    
    
 
    
    //HANDLE TOGGLING RADIO BUTTONS OF CONTAINER BACKGROUND ATTACHMENT 
    jQuery("body").on("change", "input[name='optionsRadiosContainerBackgroundAttachment']", function () {
        var radioValue = jQuery(this).val();
        unique_element_id = jQuery(".bbe-edit-container-nav").attr("data-container-id");
        divToEdit = jQuery(bbe_get_rootSel() + " div[data-container-id=" + unique_element_id + "]").parent(); //color the wrap

        if (radioValue == "") {
            divToEdit.removeClass("bbe-bafixed");
        } else {
            divToEdit.removeClass("bbe-bafixed").addClass(radioValue);
        }
    });
    
    ///////// END MODAL CONTAINER ACTION HANDLING ////////////////////////////////////////////////////////////////
				
				

    //USER CLICKS ON ADD/subst COMPONENT: POPULATE THE MODAL  WINDOW with the components  
    jQuery("body").on("click", ".bbe-prepare-components-modal", function (e){
        e.preventDefault();
        //open modal and init
        jQuery(".bbe-contextual-window").hide(); //close other windows
        
        //let it be draggable and resizable
        jQuery("#bbe-contextual-window-components").hide().draggable({ handle: ".bbe-contextual-window-top-dragbar",  containment: "window"  }).fadeIn().resizable({
          handles: {'s': '.bbe-contextual-window-resize-handle'},
          resize: function(event, ui) {
            ui.size.height = ui.originalSize.height;
            if(ui.size.width<500) ui.size.width = 500; //limit max
            if(ui.size.width<650) {
              //switch to small, vertical mode
              jQuery("#bbe-components-listing").css("height",(ui.size.height-220)+"px");
              jQuery("#bbe-components-listing .col-md-6").addClass("was-col-md-6").removeClass("col-md-6");
              }
              else {
                //switch to standard mode
                jQuery("#bbe-components-listing").css("height",(ui.size.height-180)+"px");
                jQuery("#bbe-components-listing .was-col-md-6").addClass("col-md-6").removeClass("was-col-md-6");
                }
            //fix
          }
          
         });
         
        jQuery("#bbe-contextual-window-components").removeAttr("data-action").attr("data-action", jQuery(this).attr("data-action"));
								
		jQuery("#bbe-contextual-window-components").removeAttr("data-block-id").removeAttr("data-column-id").removeAttr("data-container-id"); //safety init

        if (jQuery(this).attr("data-action") == 'replace-block-component') {
            //we have to replace the content of a block
            divToEdit = jQuery(this).closest("*[data-block-id]");
            var unique_element_id = divToEdit.attr("data-block-id");
            jQuery("#bbe-contextual-window-components").attr("data-block-id", unique_element_id);
        }

        if (jQuery(this).attr("data-action") == 'add-block-to-col') {
            //we have to add a block to a column after the other stuff  
            divToEdit = jQuery(this).closest("div[data-column-id]");
            var unique_element_id = divToEdit.attr("data-column-id");
            jQuery("#bbe-contextual-window-components").attr("data-column-id", unique_element_id);
        }

        if (jQuery(this).attr("data-action") == 'put-fullwidth-component-into-container') {
            //we have to add a block to a column after the other stuff  
            divToEdit = jQuery(this).closest("div[data-container-id]");
            var unique_element_id = divToEdit.attr("data-container-id");
            jQuery("#bbe-contextual-window-components").attr("data-container-id", unique_element_id);
        }

    }); //END FUNCTION


    //INSERT COMPONENT FUNCTION : REPLACE THE ELEMENT WITH THE HTML OF THE COMPONENT    
    //jQuery("body").on("click", ".bbe-container-insert-component",
    function bbe_insert_component(html_component){
        //e.preventDefault();

        if (jQuery("#bbe-contextual-window-components").attr("data-action") == 'replace-block-component') {

            //we have to replace the content of a block
            unique_element_id = jQuery("#bbe-contextual-window-components").attr("data-block-id");

            divToEdit = jQuery(bbe_get_rootSel() + " *[data-block-id=" + unique_element_id + "]");

            //html_component = jQuery(this).parent().parent().find(".bbe-component-html-content").html();

            bbe_remove_editing_tools();
            divToEdit.html(html_component);
        } //end if case


        if (jQuery("#bbe-contextual-window-components").attr("data-action") == 'add-block-to-col')
        {

            unique_element_id = jQuery("#bbe-contextual-window-components").attr("data-column-id");

            divToEdit = jQuery(bbe_get_rootSel() + " div[data-column-id=" + unique_element_id + "]");
            //html_component = jQuery(this).parent().parent().find(".bbe-component-html-content").html();

            html_component = "\n<div class='bbe-component-block'>\n " + html_component + "\n\n</div> <!-- close bbe-component-block -->\n";

            bbe_remove_editing_tools();
            divToEdit.append(html_component);

        }//end if case


        if (jQuery("#bbe-contextual-window-components").attr("data-action") == 'put-fullwidth-component-into-container')
        {

            unique_element_id = jQuery("#bbe-contextual-window-components").attr("data-container-id");

            divToEdit = jQuery(bbe_get_rootSel() + " div[data-container-id=" + unique_element_id + "]");
            //html_component = jQuery(this).parent().parent().find(".bbe-component-html-content").html();

            html_component = "<div class='row bbe-component-block'>\n " + html_component + "\n\n</div> <!-- close row  bbe-component-block-->\n";

            bbe_remove_editing_tools();

            divToEdit.find('.bbe-lipsum-title').remove();
            divToEdit.append(html_component);

        }//end if case
        
        // check if a need to do something after adding this component
        callback_add_component(divToEdit);
        
        bbe_init_editing_tools();
		
        //Play sound						
		bbe_play_audio_feedback('insert');
        //close window
        jQuery(".bbe-contextual-close-top:visible ").click();
        //see if we have a helper
        first_contextual_link=divToEdit.find(".bbe-block-tools li a:first");
        if(first_contextual_link.attr("class").substr(0, 19)==='bbe-open-contextual') first_contextual_link.click();
        
        //trigger eventual shortcode preview
        bbe_render_shortcodes_in_block(divToEdit);
        
    }		//END FUNCTION


    //USER CLICKS ON bbe-remove-container
    jQuery("body").on("click", ".bbe-remove-container", function (e){
        e.preventDefault();
        if(!confirm('Are you sure to delete the selected container?')) return;
        divToEdit = jQuery(this).closest("div[data-container-id]").parent(); // get the wrap
        divToEdit.remove();
        bbe_check_if_content_empty();
    });

	//USER CLICKS SHOW  ADVANCED-FEATURES
    jQuery("body").on("click", "#bbe-show-advanced-features", function (e){
		jQuery(".bbe-bottom-nav").toggleClass("bbe-advanced-mode");   
    });
				
	//////////////////////////////// POPUP HTML EDITORS //////////////////////////////
    //USER CLICKS SHOW HTML
    jQuery("body").on("click", "#bbe-show-html", function (e){
        e.preventDefault();
        //jQuery("#bbe-kill-tools").click();
        jQuery(".bbe-contextual-window").hide(); //close other windows
		bbe_remove_editing_tools();
        bbe_remove_all_shortcode_previews();
		if  (typeof bbe_html_window !== "undefined") bbe_html_window.close(); //Close HTML popup if it was open
		bbe_html_window = window.open("?bbe_open_htmleditor_popup=1&attribute=id&value=bbe-magic-content", "", bbe_popup_style_parameters());
    });

    //USER CLICKS EDIT HTML CONTAINER
    jQuery("body").on("click", '.bbe-trig-edit-html-container', function (e){
        e.preventDefault();
        jQuery(".bbe-contextual-window").hide(); //close other windows
        bbe_remove_all_shortcode_previews(); //eliminate shortcode previews
        divToEdit = jQuery(this).closest("div[data-container-id]");
        var unique_element_id = divToEdit.attr("data-container-id");
        if  (typeof bbe_html_window !== "undefined") bbe_html_window.close(); //Close HTML popup if it was open
		bbe_html_window = window.open("?bbe_open_htmleditor_popup=1&attribute=data-container-id&value=" + unique_element_id, "", bbe_popup_style_parameters());
    });

    //USER CLICKS EDIT HTML COLUMN
    jQuery("body").on("click", '.bbe-trigger-edit-html-col', function (e){
        e.preventDefault();
        jQuery(".bbe-contextual-window").hide(); //close other windows
        divToEdit = jQuery(this).closest("div[data-column-id]");
        var unique_element_id = divToEdit.attr("data-column-id");
        divToEdit.find(" .bbe-shortcode-preview").remove(); //eliminate shortcode previews
		if  (typeof bbe_html_window !== "undefined") bbe_html_window.close(); //Close HTML popup if it was open
        bbe_html_window = window.open("?bbe_open_htmleditor_popup=1&attribute=data-column-id&value=" + unique_element_id, "", bbe_popup_style_parameters());
    });

    //USER CLICKS EDIT HTML BLOCK
    jQuery("body").on("click", '.bbe-trigger-edit-html-block', function (e){
        e.preventDefault();
        jQuery(".bbe-contextual-window").hide(); //close other windows
        divToEdit = jQuery(this).closest("*[data-block-id]");
        var unique_element_id = divToEdit.attr("data-block-id");
        divToEdit.find(" .bbe-shortcode-preview").remove(); //eliminate shortcode previews
        if  (typeof bbe_html_window !== "undefined") bbe_html_window.close(); //Close HTML popup if it was open
		bbe_html_window = window.open("?bbe_open_htmleditor_popup=1&attribute=data-block-id&value=" + unique_element_id, "", bbe_popup_style_parameters());
    });
    /////////////////////////////////// COPY/ PASTE BLOCK ////////////////////
    
    //USER CLICKS ON COPY BLOCK
    jQuery("body").on("click", ".bbe-copy-block", function (e) {
        e.preventDefault();
        var divToCopy = jQuery(this).closest("*[data-block-id]");
        //jQuery('#clipboard').html(divToCopy.html());
        //bbe_replace_data_id(jQuery('#clipboard'));
        localStorage.setItem("bbe_clipboard", divToCopy.html());
    }); //end function copy block
    
    
    //USER CLICKS ON PASTE BLOCK
    jQuery("body").on("click", ".bbe-paste-block", function (e) {
        e.preventDefault();
        var divToPaste = jQuery(this).closest("*[data-block-id]");
        //divToPaste.html(jQuery('#clipboard').html());
        if (localStorage.getItem("bbe_clipboard")===null) {alert("Clipboard is Empty"); return; }
        divToPaste.html(localStorage.getItem("bbe_clipboard"));
        bbe_replace_data_id(divToPaste);
    }); //end function paste block
    
    //USER CLICKS ON DUPLICATE BLOCK
    jQuery("body").on("click", ".bbe-duplicate-block", function (e) {
        e.preventDefault();
        divToEdit = jQuery(this).closest("*[data-block-id]");
        
        jQuery(".bbe-eliminate-on-saving").remove();
 
        var the_html = divToEdit[0].outerHTML;
        divToEdit.parent().append(the_html);
		bbe_replace_data_id(divToEdit.parent().find(" > *[data-block-id]:last"));
        
        jQuery('html, body').animate({
            scrollTop: jQuery(divToEdit.parent().find(" > *[data-block-id]:last")).offset().top
        }, 1000);
        
        bbe_init_editing_tools();
    }); //end function DUPLICATE block
      
    //USER CLICKS ON DELETE BLOCK
    jQuery("body").on("click", ".bbe-delete-block", function (e){
        e.preventDefault();

        divToEdit = jQuery(this).closest("*[data-block-id]");
        theParentRow = divToEdit.closest(".row");
        jQuery(".bbe-eliminate-on-saving").remove();

        divToEdit.remove();
        // alert(theParentRow.html());
        //LOOP EACH ROW AND ELIMINATE EMPTY ROWS   ///////////////////////////////////////////////////

        var AllRowsAreEmpty = true;
        var sfound = false;
        theParentRow.find("div[data-column-id]").each(function (index, el) {
            html = jQuery(el).html();//alert(html);
            sfound = true;
            if (AllRowsAreEmpty && html == '<div class="bbe-col-content-wrap">\n</div>')
                AllRowsAreEmpty = true;
            else
                AllRowsAreEmpty = false;
        });//end loop

        if (AllRowsAreEmpty && sfound == true) {
            theParentRow.remove();
            // alert("One empty row was cleaned up!");
        }

        bbe_init_editing_tools();
    }); //end function delete block
    

    
    //USER CLICKS CAROUSEL: force double click on the active carousel image to modify it
    jQuery("body").on("click", '.bbe-change-active-carousel-img', function (event) {
        event.preventDefault();
        jQuery(this).closest('.bbe-component-block').find('.carousel .carousel-inner .item.active img').click();
								jQuery(this).closest('.bbe-component-block').find('.carousel .carousel-inner .item.active[data-bbe-bg-editable="1"]').click();
    });
    
    
    //DELETE ACTIVE CAROUSEL SLIDE
    jQuery("body").on("click", '.bbe-remove-active-carousel-slide', function (event) {
        event.preventDefault();
        var carousel = jQuery(this).closest('.bbe-component-block').find('.carousel');
        var indicator = carousel.find('.carousel-indicators li.active');
        var slide = carousel.find('.carousel-inner .item.active');
								
								if(carousel.find(".item").length <=2) {alert("Only "+carousel.find(".item").length+" slides left, delete the Block if you want to get rid of the carousel."); return;}
								 
        if(confirm('Are you sure to delete the selected slide?')) {
            // slide to the next carousel slide before delete the active image
            // to prevent a carousel class crash
            carousel.carousel('next');
            setTimeout(function() {
                indicator.remove();
                slide.remove();
                // reorder the data-slide-to on indicators
                carousel.find('.carousel-indicators li').each(function(k,v) {
                    jQuery(v).attr('data-slide-to',k);
                });
            },1500);
        }
    });
    
    // ADD SLIDE TO CAROUSEL
    jQuery("body").on("click", '.bbe-add-carousel-slide', function (event) {
        event.preventDefault();
        var carousel = jQuery(this).closest('.bbe-component-block').find('.carousel');
								if(carousel.find('.carousel-indicators li:first').text()=="")   {
												var indicator_text="";
												var editing_attribute="";
												} else
																{
																				var indicator_text="Slide " +(1+carousel.find('.carousel-indicators li').length);
																				var editing_attribute='data-bbe-inline-editable="1"';
																}
        var indicator_html = ' <li '+editing_attribute+' data-target="#'+carousel.attr('id')+'" data-slide-to="'+carousel.find('.carousel-indicators li').length+'">'+indicator_text+'</li>';
								var slide_html = carousel.find(".carousel-inner .item:not(.active)")[0].outerHTML;
								
        // add the indicator
        carousel.find('.carousel-indicators').append(indicator_html);
        // add the slide
        carousel.find('.carousel-inner').append(slide_html);
								bbe_replace_data_id(carousel.find(".carousel-inner .item:last"));
								
        // init the editing tools to wrap the last inserted element
        bbe_init_editing_tools();
         carousel.find('.carousel-indicators li:last').click();
								// open the modal to change the last inserted slide img
        //carousel.find('.carousel-inner .item:last img').click();
    });
    
    ///ADD GALLERY IMAGE  
	jQuery("body").on("click", '.bbe-add-gallery-image', function (event) {
        event.preventDefault();
								
        var gallery = jQuery(this).closest('.bbe-component-block').find('.bbe-gallery');
		bbe_remove_editing_tools();
		new_gallery_element=gallery.find(".gallery-item").last()[0].outerHTML+'\n';
        gallery.append(new_gallery_element);
								//bbe_replace_data_id(gallery.find(".col:last"));
        bbe_init_editing_tools(); // init the editing tools to wrap the last inserted element
        //carousel.find('a:last img').click(); 	// open the modal to change the last inserted slide img
    });
    
	///REMOVE GALLERY IMAGE  
	jQuery("body").on("click", '.bbe-remove-gallery-image', function (event) {
        event.preventDefault();
								
        var gallery = jQuery(this).closest('.bbe-component-block').find('.bbe-gallery');
		bbe_remove_editing_tools();
		gallery.find(".gallery-item").last().remove();
        bbe_init_editing_tools(); 
    });
				
	// ADD NEW PANEL TO ACCORDION
    jQuery("body").on("click", '.bbe-add-panel-element', function (event) {
        event.preventDefault();
								
        var accordion = jQuery(this).closest('.bbe-component-block').find('.panel-group');
        //var counter=4;
							
		var last_panel_index=accordion.find('.panel-collapse:last').attr('id').split('collapse-')[1];
		//alert(last_panel_index);
		var randomid=accordion.attr('id').split('accordion-')[1];
		//alert(randomid);
		NewValue=(Number(last_panel_index))+1;
		
		var panel_html='\n\n'+			
		'<div class="panel panel-default">                                                                                                       \n'+
		'			<div class="panel-heading">                                                                                                            \n'+
		'					<h4 class="panel-title">                                                                                                             \n'+
		'							<a data-toggle="collapse" data-parent="#accordion-@randomid@" href="#@randomid@-collapse-'+NewValue+'" data-bbe-inline-editable="1">          \n'+
		'									Collapsible Group Item #'+NewValue+'                                                                                                        \n'+
		'							</a>                                                                                                                             \n  '+
		'					</h4>                                                                                                                              \n  '+
		'			</div>                                                                                                                               \n  '+
		'			<div id="@randomid@-collapse-'+NewValue+'" class="panel-collapse collapse">                                                          \n  '+
		'					<div class="panel-body bbe-component-block" >                                                          \n  '+
		'								<div data-bbe-html-editable="1">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.</div>  \n  '+
		'					</div>                                                                                                                             \n  '+
		'			</div>                                                                                                                               \n  '+
		'</div>                                                                                                                                 \n  ';
					
		panel_html=		panel_html.split("@randomid@").join(randomid);
		accordion.append(panel_html);
		bbe_init_editing_tools();
    });
				
    //DELETE PANEL
	jQuery("body").on("click", '.bbe-remove-panel-element', function (event) {
        event.preventDefault();
		jQuery(".panel-collapse.in").parent().remove();
	});
				
	// ADD NEW TAB TO TABBER
    jQuery("body").on("click", '.bbe-add-tab-element', function (event) {
        event.preventDefault();
								
        var navtabs = jQuery(this).closest('.bbe-component-block').find('.nav-tabs');
        var tabpanes = jQuery(this).closest('.bbe-component-block').find('.tab-content');
							
		var last_panel_index=tabpanes.find('.tab-pane:last').attr('id').split('-')[2];
		// alert(last_panel_index);
		var randomid=tabpanes.find('.tab-pane:last').attr('id').split('-')[1];
        //alert(randomid);
		NewNumValue=(Number(last_panel_index))+1;
		///continue.....
							
        navtabs.append('\n<li><a href="#tab-'+randomid+'-'+NewNumValue+'" role="tab" data-toggle="tab" data-bbe-inline-editable="1">Tab '+NewNumValue+'</a></li>');
        tabpanes.append(''+
            '\n<div class="tab-pane bbe-component-block" id="tab-'+randomid+'-'+NewNumValue+'">'+
            '<p data-bbe-inline-editable="1" >  Ut vitae sagittis dui. Cras vulputate consectetur mauris. </p>'+
            '</div>'+
            '');
		bbe_init_editing_tools();
    });
				
    //DELETE TAB ELEMENT
	jQuery("body").on("click", '.bbe-remove-tab-element', function (event) {
        event.preventDefault();
        jQuery(this).closest('.bbe-component-block').find('.nav-tabs li.active').remove();
        jQuery(this).closest('.bbe-component-block').find('.tab-pane.active').remove();
    });
				
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////CONTEXTUAL WINDOWS///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    //quick helper to show window
    function bbe_show_contextual_window(window_selector){
        
        jQuery(".bbe-contextual-window").hide(); //hide all windows
        
        if (!jQuery(window_selector).find('.bbe-contextual-close').length) {
            
            //ADD STANDARD ITEMS
            
            jQuery(window_selector).prepend('	<a href="#" class="bbe-contextual-close bbe-contextual-close-top" > <span class="glyphicon glyphicon-remove"></span> </a>'); //add a close button
            //jQuery(window_selector).append('<a href="#" class="bbe-contextual-close btn btn-success btn-md pull-right"> Done </a>  &nbsp;'); //add a close button
        
            jQuery(window_selector).hide().draggable({ handle: "h4", containment: "window"  });// resizable({handles: {'s': '#handle'}});
            
        }
        //window inited, show it
        jQuery(window_selector).fadeIn();
        
    }
    
    //Prevent form being submitted
    jQuery(".bbe-contextual-window form").submit(function(e){
        e.preventDefault();
    });
    
    //CLICK ON CLOSE CONTEXTUAL WINDOW
    jQuery("body").on("click",  " .bbe-contextual-window .bbe-contextual-close", function (e) {
        e.preventDefault();
        jQuery(this).closest(".bbe-contextual-window").fadeOut(); //hide the window
    });
    //CLICK ON CLOSE SPLASH WINDOW
    jQuery("body").on("click",  ".bbe-modal-splash-close", function (e) {
        e.preventDefault();
        jQuery(this).closest(".bbe-modal-splash").fadeOut(); //hide the window
        jQuery("#bbe-modal-backdrop").fadeOut();
    });
    
    /////PROGRESS BAR  CONTEXTUAL WINDOW ///////////////////////////////////////////////////////////////
	//DOUBLE CLICK  PROGRESS BARS ON PAGE : OPEN CONTEXTUAL WINDOW AND INIT VALUES 
    jQuery("body").on("click", bbe_get_rootSel() + " .progress", function (e) {
        bbe_array_progress_color_classes= [ "progress-bar-default","progress-bar-primary", "progress-bar-success","progress-bar-info","progress-bar-warning","progress-bar-danger"];
        bbe_clicked_page_element=jQuery(this); //store for later
        bbe_show_contextual_window("#bbe-contextual-window-progress-bar"); 
        
        //init values of fields: pick element on the page
        var page_element=jQuery(this).find(".progress-bar");
        //get value and set form input: Value 
        var cur_value=page_element.attr("aria-valuenow");
        jQuery("#bbe-contextual-window-progress-bar input[name='value']").val(cur_value);
        
        jQuery("#bbe-contextual-window-progress-bar input[name='animation']"). prop('checked', cur_value);
        //get value and set form input: Color Classes 
        jQuery.each(bbe_array_progress_color_classes, function( index, class_name ) {
            //select the right option 
            if (page_element.hasClass(class_name))   jQuery("#bbe-contextual-window-progress-bar select[name='color_classes'] option[value='"+class_name+"']").prop('selected', true);
            
            // jQuery("#bbe-contextual-window-progress-bar select[name='color_classes']")  .append(jQuery('<option>', { value : class_name }) .text(class_name)); // in case you  need to populate selects
          });
        
        //get value and set form input: Striped 
        if(page_element.hasClass("progress-bar-striped")) var cur_value=true; else var cur_value=false; 
        jQuery("#bbe-contextual-window-progress-bar input[name='striped']"). prop('checked', cur_value);
        
        //get value and set form input: Animation 
        if(page_element.hasClass("active")) var cur_value=true; else var cur_value=false;
        
    }); //END FUNCTION OPEN WINDOW
    
    
    //ON INPUT CHANGE, update HTML.
    //percentage value change
    jQuery("body").on("change", "#bbe-contextual-window-progress-bar input[name='value']",function(){
        var input_value=jQuery(this).val();
        bbe_clicked_page_element.find(".progress-bar").css("width",input_value+"%").attr("aria-valuenow",input_value);
        bbe_clicked_page_element.find(".sr-only").text(input_value+"% Complete");
	}); //end function
				
    //color select change
    jQuery("body").on("change", "#bbe-contextual-window-progress-bar select[name='color_classes']",function(){
        var input_value=jQuery(this).val();
        //remove all colorclasses
        jQuery.each(bbe_array_progress_color_classes, function( index, class_name ) {  bbe_clicked_page_element .find(".progress-bar").removeClass(class_name); });
        //add the right one
        bbe_clicked_page_element .find(".progress-bar").addClass(input_value);
	}); //end function
				
    //striped checkbox change
    jQuery("body").on("change", "#bbe-contextual-window-progress-bar input[name='striped']",function(){
        if(jQuery(this).is(":checked"))  bbe_clicked_page_element .find(".progress-bar").addClass("progress-bar-striped");
            else   bbe_clicked_page_element .find(".progress-bar").removeClass("progress-bar-striped");
	}); //end function
				
    //animation checkbox change
    jQuery("body").on("change", "#bbe-contextual-window-progress-bar input[name='animation']",function(){
        if(jQuery(this).is(":checked"))  bbe_clicked_page_element .find(".progress-bar").addClass("active");
            else   bbe_clicked_page_element .find(".progress-bar").removeClass("active");
	}); //end function
				
    
    /////COLLAPSIBLE CONTEXTUAL WINDOW: CHANGE BOOTSTRAP CLASS ///////////////////////////////////////////////////////////////
	// : OPEN CONTEXTUAL WINDOW AND INIT VALUES 
    jQuery("body").on("click", '.bbe-change-collapsible-bootstrap-class', function (event) {
        event.preventDefault();
        bbe_array_collapsible_color_classes= [ "panel-default","panel-primary", "panel-success","panel-info","panel-warning","panel-danger"];
        bbe_clicked_page_element=jQuery(this).closest('.bbe-component-block'); //store for later
        
        bbe_show_contextual_window("#bbe-contextual-window-collapsible");
        
        //init values of fields: pick element on the page
        var first_panel=bbe_clicked_page_element.find('.panel-group .panel:first');
        //get value and set form input: Color Classes 
        jQuery.each(bbe_array_collapsible_color_classes, function( index, class_name ) {
            //select the right option 
            if (first_panel.hasClass(class_name))   jQuery("#bbe-contextual-window-collapsible input[value='"+class_name+"']").prop('checked', true);
        });
        
    }); //end function
    
    //User submits the form to change the Collapsible bootstrap class: ON INPUT CHANGE, update HTML.
    jQuery("body").on("change", "#bbe-contextual-window-collapsible input[type='radio']",function(){
        var input_value=jQuery(this).val();
        //remove all colorclasses
        jQuery.each(bbe_array_collapsible_color_classes, function( index, class_name ) {  bbe_clicked_page_element.find('.panel-group .panel') .removeClass(class_name); });
        //add the right one
        bbe_clicked_page_element.find('.panel-group .panel').addClass(input_value);
	}); //end function
				
    
    
       
    /////PANELS CONTEXTUAL WINDOW: CHANGE BOOTSTRAP CLASS ///////////////////////////////////////////////////////////////
    jQuery("body").on("click", '.bbe-change-panel-bootstrap-class', function (event) {
        event.preventDefault();
        bbe_array_panel_color_classes= [ "panel-default","panel-primary", "panel-success","panel-info","panel-warning","panel-danger"];
        bbe_clicked_page_element=jQuery(this).closest('.bbe-component-block').find('.panel'); //store for later
        
        bbe_show_contextual_window("#bbe-contextual-window-panel");
        
        //get value and set form input: Color Classes 
        jQuery.each(bbe_array_panel_color_classes, function( index, class_name ) {
            //select the right option 
            if (bbe_clicked_page_element.hasClass(class_name))   jQuery("#bbe-contextual-window-panel input[value='"+class_name+"']").prop('checked', true);
        });
        
    }); //end function
    
    //User submits the form to change the panel bootstrap class: ON INPUT CHANGE, update HTML.
    jQuery("body").on("change", "#bbe-contextual-window-panel input[type='radio']",function(){
        var input_value=jQuery(this).val();
        //remove all colorclasses
        jQuery.each(bbe_array_panel_color_classes, function( index, class_name ) {  bbe_clicked_page_element .removeClass(class_name); });
        //add the right one
        bbe_clicked_page_element.addClass(input_value);
	}); //end function
				
    

    /////ALERT CONTEXTUAL WINDOW: CHANGE BOOTSTRAP CLASS ///////////////////////////////////////////////////////////////
	// : OPEN CONTEXTUAL WINDOW AND INIT VALUES 
    jQuery("body").on("click", '.bbe-change-alert-bootstrap-class', function (event) {
        event.preventDefault();
        bbe_array_alert_color_classes= [ "alert-default","alert-primary", "alert-success","alert-info","alert-warning","alert-danger"];
        bbe_clicked_page_element=jQuery(this).closest('.bbe-component-block').find('.alert'); //store for later
        
        bbe_show_contextual_window("#bbe-contextual-window-alert");
        
        //get value and set form input: Color Classes 
        jQuery.each(bbe_array_alert_color_classes, function( index, class_name ) {
            //select the right option 
            if (bbe_clicked_page_element.hasClass(class_name))   jQuery("#bbe-contextual-window-alert input[value='"+class_name+"']").prop('checked', true);
        });
        
    }); //end function
    
    //User submits the form to change the alert bootstrap class: ON INPUT CHANGE, update HTML.
    jQuery("body").on("change", "#bbe-contextual-window-alert input[type='radio']",function(){
        var input_value=jQuery(this).val();
        //remove all colorclasses
        jQuery.each(bbe_array_alert_color_classes, function( index, class_name ) {  bbe_clicked_page_element .removeClass(class_name); });
        //add the right one
        bbe_clicked_page_element.addClass(input_value);
	}); //end function
				
     
    
    
    
    
    
    /////GMAP  OPEN CONTEXTUAL WINDOW ///////////////////////////////////////////////////////////////
    jQuery("body").on("click", ".bbe-open-contextual-window-gmapembed", function (event) {
        event.preventDefault(); 
        bbe_clicked_page_element=jQuery(this).closest('.bbe-component-block'); //store for later
        bbe_show_contextual_window("#bbe-contextual-window-gmapembed");
        
        //init window values
        var iframe_url=bbe_clicked_page_element.find("iframe").attr("src");
        var params=bbe_parseParams(iframe_url);
         
        jQuery("#bbe-contextual-window-gmapembed input[name='address']").val( (params['q']));
        jQuery("#bbe-contextual-window-gmapembed input[name='zoom']").val( (params['z']));
        
        if (bbe_clicked_page_element.find(".bbe-gmapembed").hasClass("embed-responsive-16by9")) jQuery("#bbe-contextual-window-gmapembed input[value='embed-responsive-16by9']").prop('checked', true);
        if (bbe_clicked_page_element.find(".bbe-gmapembed").hasClass("embed-responsive-4by3")) jQuery("#bbe-contextual-window-gmapembed input[value='embed-responsive-4by3']").prop('checked', true);
            
    }); //END FUNCTION OPEN WINDOW
    
    
    //ON INPUT CHANGE, update HTML
    //address and zoom
    jQuery("body").on("change", "#bbe-contextual-window-gmapembed input[name='address'], #bbe-contextual-window-gmapembed input[name='zoom']",function(){
        var address=jQuery("#bbe-contextual-window-gmapembed input[name='address']").val();
        var zoom=jQuery("#bbe-contextual-window-gmapembed input[name='zoom']").val();
        var iframe_url="https://maps.google.com/maps?q="+encodeURIComponent(address)+"&t=m&z="+zoom+"&output=embed&iwloc=near";
        bbe_clicked_page_element.find("iframe").attr("src",iframe_url);
        bbe_play_audio_feedback('');
	}); //end function

    //aspect ratio
    jQuery("body").on("change", "#bbe-contextual-window-gmapembed input[name='aspect-ratio']",function(){
        bbe_clicked_page_element.find(".bbe-gmapembed").removeClass("embed-responsive-16by9").removeClass("embed-responsive-4by3").addClass(jQuery(this).val());
        bbe_play_audio_feedback('');
	}); //end function			
    
    
    
    
    /////VIDEO BG:  OPEN CONTEXTUAL WINDOW ///////////////////////////////////////////////////////////////
    jQuery("body").on("click", ".bbe-open-contextual-window-videobg", function (event) {
        event.preventDefault(); 
        bbe_clicked_page_element=jQuery(this).closest('.bbe-component-block'); //store for later
        bbe_show_contextual_window("#bbe-contextual-window-videobg");
        
        //init window values
        var mp4_video_url=bbe_clicked_page_element.find("video source[type='video/mp4']").attr("src");
         
        jQuery("#bbe-contextual-window-videobg input[name='mp4_url']").val( mp4_video_url);
        //jQuery("#bbe-contextual-window-gmapembed input[name='zoom']").val( (params['z']));    
    }); //END FUNCTION OPEN WINDOW
    
    //ON INPUT CHANGE, update HTML
    //iframe url
    jQuery("body").on("change", "#bbe-contextual-window-videobg input[name='mp4_url'] ",function(){
         
        bbe_clicked_page_element.find("video source[type='video/mp4']").attr("src",jQuery(this).val()).parent().get(0).load().play();
        bbe_play_audio_feedback('');
    }); //end function
    
    
    
    
    /////LINKS/BUTTONS:  OPEN CONTEXTUAL WINDOW ///////////////////////////////////////////////////////////////
    jQuery("body").on("click", '*[data-bbe-links-editable] a', function (event) {
        event.preventDefault();
        if (jQuery(this).closest("#bbe-remote-components-wrap").length) return;
        bbe_array_links_color_classes= [ "btn-default","btn-primary", "btn-success","btn-info","btn-warning","btn-danger"];
        bbe_array_links_size_classes= [ "btn-xs","btn-sm", "btn-md","btn-lg"];
        if ( (jQuery(this).parents('.bbe-eliminate-on-saving').length))  return;
                
        bbe_clicked_page_element=jQuery(this); //store for later
        //init form fields
        bbe_show_contextual_window("#bbe-contextual-window-links");
        jQuery('#bbe-contextual-window-links input[name="url"]').val(jQuery(this).attr('href'));
        jQuery('#bbe-contextual-window-links input[name="anchor"]').val(jQuery(this).html()); 
        
        //get value and set form input: Color Classes
        //take care of default
        jQuery("#bbe-contextual-window-links select[name='color_classes'] option[value='']").prop('selected', true);
        jQuery.each(bbe_array_links_color_classes, function( index, class_name ) {
            //select the right option 
            if (bbe_clicked_page_element.hasClass(class_name))   jQuery("#bbe-contextual-window-links select[name='color_classes'] option[value='"+class_name+"']").prop('selected', true);
        });
        
        
        //get value and set form input: Sizes
        //take care of default
        jQuery("#bbe-contextual-window-links select[name='size'] option[value='']").prop('selected', true);
        jQuery.each(bbe_array_links_size_classes, function( index, class_name ) {
            //select the right option 
            if (bbe_clicked_page_element.hasClass(class_name))   jQuery("#bbe-contextual-window-links select[name='size'] option[value='"+class_name+"']").prop('selected', true);
        });//end each
    });
    
    //ON INPUT CHANGE, update HTML
    //href
    jQuery("body").on("change", "#bbe-contextual-window-links input[name='url'] ",function(){
        bbe_clicked_page_element.attr("href",jQuery(this).val());
        bbe_play_audio_feedback('');
	}); //end function
     //anchortext
    jQuery("body").on("change", "#bbe-contextual-window-links input[name='anchor'] ",function(){
        bbe_clicked_page_element.html(jQuery(this).val());
        bbe_play_audio_feedback('');
	}); //end function
    
    //color select change
    jQuery("body").on("change", "#bbe-contextual-window-links select[name='color_classes']",function(){
        var input_value=jQuery(this).val();
        //remove all colorclasses
        jQuery.each(bbe_array_links_color_classes, function( index, class_name ) {  bbe_clicked_page_element .removeClass(class_name); });
        //add the right one
        bbe_clicked_page_element .addClass(input_value);
        bbe_play_audio_feedback('');
	}); //end function
	
    //size change
    jQuery("body").on("change", "#bbe-contextual-window-links select[name='size']",function(){
        var input_value=jQuery(this).val();
        //remove all colorclasses
        jQuery.each(bbe_array_links_size_classes, function( index, class_name ) {  bbe_clicked_page_element .removeClass(class_name); });
        //add the right one
        bbe_clicked_page_element .addClass(input_value);
        bbe_play_audio_feedback('');
	}); //end function
				
    
    
	//User deletes the Link / button
    jQuery("body").on("click", '#bbe-delete-link-button', function (event) {
        event.preventDefault();
        event.stopPropagation();
        if (confirm("Are you sure?")) {
            bbe_clicked_page_element.remove();
            jQuery(".bbe-contextual-close").click();
            bbe_play_audio_feedback('');
            }  
   });
    
    
    
    
    
    
     
    /////SVG OBJECT:  OPEN CONTEXTUAL WINDOW ///////////////////////////////////////////////////////////////
    jQuery("body").on("click", '.bbe-open-contextual-window-svg', function (event) {
        event.preventDefault();
								 
        bbe_clicked_page_element=jQuery(this).closest('.bbe-component-block').find("object"); //store for later
        //init form fields
        bbe_show_contextual_window("#bbe-contextual-window-svg");
        jQuery('#bbe-contextual-window-svg input[name="url"]').val(bbe_clicked_page_element.attr('data'));
    }); 
    
    //ON INPUT CHANGE, update HTML
    //href
    jQuery("body").on("change", "#bbe-contextual-window-svg input[name='url'] ",function(){
        bbe_clicked_page_element.attr("data",jQuery(this).val());
	}); //end function
    
    
	//SVG Search by Keyword //////////////////////////
	jQuery('body').on('change', 'input[name="bbe_search_for_svg_clipart"]', function (event) {
        event.preventDefault();
        jQuery('#bbe-contextual-window-svg').css("height",""); //prevent fixed height triggered by dragging
        jQuery("#bbe_search_for_svg_clipart_results").html("<div class='bbe-loading-spinner'></div>"); //ADD SPINNER
        //GET TERMS AND BUILD FORM
        var jqxhr = jQuery.getJSON("https://openclipart.org/search/json/?query="+jQuery(this).val()+"&amount=50&page=1" , function(a) {
                        
                        html_li="";
                        jQuery.each(a.payload, function( index,el ) { 
                                                        //console.log(el.name);
                                                     html_li+=' <li> <a href="#" data-url="'+el.svg.url+'"> <img class="" src="' +el.svg.png_thumb+'" alt=""></a></li>   ';
                                                });
                        
                        var results= '<ul  >'+ 	html_li+ 	'</ul>';
                        jQuery("#bbe_search_for_svg_clipart_results").html(results); //POPULATE HTML FORM WITH OPTION
                    
            }); //end loaded json ok
        
        jqxhr.fail(function() { 		bbe_show_no_connection_alert(); 		});
        
        
	}); //end input change function
				
	//SVG Click Search Result
    jQuery("body").on("click", "#bbe_search_for_svg_clipart_results a[data-url]", function (event) {
		event.preventDefault();
		var url=jQuery(this).attr("data-url");
		jQuery( '#bbe-contextual-window-svg input[name="url"]').val(url).change();
        bbe_play_audio_feedback('');
	});
   
   
   
   
   
   
   

    //////// RESPONSIVE    oEMBED  OPEN CONTEXTUAL WINDOW ////////////////////////////////////    
    jQuery("body").on("click", ".bbe-open-contextual-window-responsive-embed", function (event) {
        event.preventDefault();
        bbe_clicked_page_element=jQuery(this).closest('.bbe-component-block'); //store for later
        bbe_show_contextual_window("#bbe-contextual-window-responsive-embed");  
    }); //END FUNCTION OPEN WINDOW
    
    //ON INPUT CHANGE, update HTML
    jQuery("body").on("change", "#bbe-contextual-window-responsive-embed input[name='url'] ",function(){
    
        jQuery.ajax({
           type : "post",
           dataType : "html",
           url : ajax_object.ajax_url,
           data : {action: "bbe_process_oembed", src_url: jQuery(this).val() },
           success: function(response) {
                if(response.indexOf("iframe")==-1 &&  response.indexOf("img")==-1 &&  response.indexOf("div")==-1){
                    //response does not look good
                    alert("We might be having some issues parsing that link, in case double check the URL and try again.");
                } //else
                
                {
                bbe_remove_editing_tools(); 
                bbe_clicked_page_element.html(response); //place the embed!
                bbe_play_audio_feedback('');
                bbe_init_editing_tools();
                }
           }
        }); //end ajax call
    }); //end function
    



    //DOUBLE CLICK  IMAGES: OPEN CONTEXTUAL WINDOW TO EDIT URL /////////////////////////////////////////////////////////////////////
    jQuery("body").on("click", bbe_get_rootSel() + " img:not(.bbe-shortcode-preview img)", function (e) {
        
        bbe_clicked_page_element=jQuery(this); //store for later
        
        //init window sections 
        //jQuery("#bbe-contextual-window-image .bbe-unsplash-search-wrap, #bbe-contextual-window-image .bbe-wpadmin-imagesearch-wrap").addClass("hidden"); //init window
        jQuery('#bbe-contextual-window-image').css("height",""); //reflow if it was open: prevent fixed height triggered by dragging
        //populate input fields
        jQuery("#bbe-contextual-window-image input[name='url']").val(jQuery(this).attr("src"));
        jQuery("#bbe-contextual-window-image input[name='alt']").val(jQuery(this).attr("alt"));
        
        //show the window
        bbe_show_contextual_window("#bbe-contextual-window-image");
        return false;
    });
    
    //ON INPUT CHANGE (URL), update HTML
    jQuery("body").on("change", "#bbe-contextual-window-image input[name='url'] ",function(){
        bbe_clicked_page_element.attr("src",jQuery(this).val());
        bbe_play_audio_feedback("");
	}); //end function
    //ON INPUT CHANGE (ALT), update HTML
    jQuery("body").on("change", "#bbe-contextual-window-image input[name='alt'] ",function(){
        bbe_clicked_page_element.attr("alt",jQuery(this).val());
        bbe_play_audio_feedback("");
	}); //end function
    
    ///CLICK   WPADMIN & SHOW SEARCH INTERFACE
    jQuery("body").on("click", ".bbe-contextual-window .bbe-show-wpadmin-search", function (event) {
        event.preventDefault();
        var theContextualWindow=jQuery(this).closest(".bbe-contextual-window");
        theContextualWindow.css("height",""); //prevent fixed height triggered by dragging
        theContextualWindow.find(".bbe-unsplash-search-wrap").addClass("hidden");
        theContextualWindow.find(".bbe-wpadmin-imagesearch-wrap").removeClass("hidden");
         ///init iframe
        var iframe_url = jQuery(bbe_get_rootSel()).attr("data-wpadminurl")+'media-upload.php?post_mime_type=image&bbe_image_upload=1'; //&TB_iframe=true
        theContextualWindow.find(' .bbe-wpadmin-imagesearch-wrap').html('<iframe id="bbe-auxiliary-iframe" name="ch-iframe-main-page" src="' + iframe_url + '" frameborder="0" scrolling="auto" marginwidth="0" marginheight="0" ></iframe><div id="ch-close-media-uploader"></div>');
           
           
    });
   
    //WPADMIN: apply image when chosen
    window.send_to_editor = function (html) {
        //var newImageUrl = jQuery('img', html).attr('src');
         
        var matches = html.toString().match(/src="(.+)\" alt/);
        newImageUrl = matches[1];
        var newImageAlt = jQuery('img', html).attr('alt');
        
        if (bbe_clicked_page_element.is("img")) 
        {
            //dealing with image
            jQuery("#bbe-contextual-window-image input[name='url']").val(newImageUrl).change();
            jQuery("#bbe-contextual-window-image input[name='alt']").val(newImageAlt).change();
            bbe_play_audio_feedback("");
            //was the element a photo inside a gallery? 
            var el=bbe_clicked_page_element.closest('a');
            if(el.length && el.closest(".use-lightbox").length){ //if image in magic content was hyperlinked and is in a lightbox area
                //alert('You clicked a link'); // check if links an image....
                var bigImageUrl =  jQuery('img', html).closest('a').attr('href');
                el.attr("href",bigImageUrl);							
                }
            jQuery(".bbe-wpadmin-imagesearch-wrap").addClass("hidden");
            jQuery('#bbe-contextual-window-image').css("height",""); //reflow if it was open: prevent fixed height triggered by dragging								
        } else {
            //we're dealing with bg
            jQuery("#bbe-contextual-window-backgroundimage input[name='url']").val(newImageUrl).change();
            bbe_play_audio_feedback("");
            jQuery(".bbe-wpadmin-imagesearch-wrap").addClass("hidden");
            jQuery('#bbe-contextual-window-backgroundimage').css("height",""); //reflow if it was open: prevent fixed height triggered by dragging	
        }
								
        //jQuery("*[data-editable-bg-id=" + window.editable_bg_unique_id + "]").css("background-image",'url('+  bigImageUrl +')').removeAttr('data-editable-bg-id');

    }; //end function
 
    
    ///CLICK SHOW UNSPLASH & SHOW SEARCH INTERFACE
    jQuery("body").on("click", ".bbe-contextual-window .bbe-show-unsplash-search", function (event) {
        event.preventDefault();
        var theContextualWindow=jQuery(this).closest(".bbe-contextual-window");
        theContextualWindow.css("height",""); //prevent fixed height triggered by dragging
        theContextualWindow.find(".bbe-wpadmin-imagesearch-wrap").addClass("hidden");
        theContextualWindow.find(".bbe-unsplash-search-wrap").removeClass("hidden");
    });
   
    
    
    
	//IMAGES: UNSPLASH  init Search Pagination when focusing search input //////////////////////////
    jQuery('body').on('focus', '.bbe-contextual-window input[name="unsplash-search-by-keyword"]', function (event) {
        //INIT PAGINATION
        jQuery(this).attr("data-page","1");
    });
    //IMAGES: UNSPLASH  Search by Keyword //////////////////////////
	jQuery('body').on('change', '.bbe-contextual-window input[name="unsplash-search-by-keyword"]', function (event) {
		event.preventDefault();
        var theContextualWindow=jQuery(this).closest(".bbe-contextual-window");
        theContextualWindow.css("height",""); //prevent fixed height triggered by dragging
        var current_page=parseInt(jQuery(this).attr("data-page"),10);
        
		theContextualWindow.find(".bbe-unsplash-search-results").html("<div class='bbe-loading-spinner'></div>"); //ADD SPINNER
        
        var jqxhr = jQuery.getJSON("https://api.unsplash.com/search/photos/?client_id=241722b04b93fb65e1514ad48c3e916f5399e7766e5fa0dba784e008b9866216&query="+jQuery(this).val()+"&page="+current_page , function(a) {
            console.log(a.results);
            var headingText='<div class="text-center"><h4>'+a.total+' images found: <span class="text-muted"> page '+current_page+' of '+a.total_pages+'</span></h4><hr> </div>';
            html_li="";
            jQuery.each(a.results, function( index,el ) { 
               
                html_li+=' <li>  <img class="" src="' +el.urls.thumb+'" alt="" data-src-small="' +el.urls.small+'" data-src-regular="' +el.urls.regular+'" data-author-name="' +el.user.name+'"  >  </li>   ';
                });
            //check if we have to add pagination buttons
            if ( current_page>1 ) var prevButton="<button class='bbe-unsplash-pagination-button pull-left btn btn-lg btn-default' data-page='"+(current_page-1)+"' >&laquo; Previous Page</button>"; else var prevButton="";    
            if (a.total_pages>current_page) var nextButton="<button class='bbe-unsplash-pagination-button pull-right btn btn-lg btn-default' data-page='"+(1+current_page)+"' >Next Page &raquo;</button>"; else var nextButton="";
            
            theContextualWindow.find(".bbe-unsplash-search-results").html(headingText+'<ul>'+ 	html_li+ 	'</ul>'+prevButton+nextButton); //POPULATE HTML FORM WITH OPTION
                
        }); //end loaded json ok
        
        jqxhr.fail(function() { 		bbe_show_no_connection_alert(); 		});
    }); //end  func

    ///CLICK   UNSPLASH RESULT - IMAGES <img> VERSION
    jQuery("body").on("click", "#bbe-contextual-window-image .bbe-unsplash-search-results img", function (event) {
        event.preventDefault();
        jQuery("#bbe-contextual-window-image input[name='url']").val(jQuery(this).attr("data-src-regular")).change();
        jQuery("#bbe-contextual-window-image input[name='alt']").val("Photo by "+jQuery(this).attr("data-author-name")).change();
        
        //was the element a photo inside a gallery? 
        var el=bbe_clicked_page_element.closest('a');
        if(el.length && el.closest(".use-lightbox").length){ //if image in magic content was hyperlinked and is in a lightbox area
            //alert('You clicked a link'); // check if links an image....
            var bigImageUrl =  jQuery(this).attr("data-src-regular");
            el.attr("href",bigImageUrl);							
        }
        
    });
     
    
    //PAGINATION buttons clicked
    jQuery("body").on("click", ".bbe-unsplash-pagination-button", function (event) {
        event.preventDefault();
        var theContextualWindow=jQuery(this).closest(".bbe-contextual-window");
        var current_page=jQuery(this).attr("data-page");
        theContextualWindow.find('input[name="unsplash-search-by-keyword"]').attr("data-page",current_page).change(); 
    });
       
    //scrolling fix
    jQuery('.bbe-unsplash-search-results,#bbe_search_for_svg_clipart_results,#bbe-icons-listing,#bbe-components-listing,#bbe-contextual-window-templates').bind('mousewheel DOMMouseScroll', function(e) {   var scrollTo = null;  if (e.type == 'mousewheel') {                scrollTo = (e.originalEvent.wheelDelta * -1);      }       else if (e.type == 'DOMMouseScroll') {     scrollTo = 40 * e.originalEvent.detail; } if (scrollTo) {                e.preventDefault();                jQuery(this).scrollTop(scrollTo + jQuery(this).scrollTop());            }        });
            
   
    //bbe-contextual-window-backgroundimage WINDOW///////////////////////////////
	//DOUBLE CLICK  areas with editable bg class: EDIT background &style 
    jQuery("body").on("dblclick", bbe_get_rootSel() + ' [data-bbe-bg-editable="1"]', function (e) {
        bbe_clicked_page_element=jQuery(this); //store for later
         
        //init window sections 
        jQuery("#bbe-contextual-window-backgroundimage .bbe-unsplash-search-wrap,#bbe-contextual-window-backgroundimage .bbe-wpdmin-imagesearch-wrap").addClass("hidden"); //init window
        jQuery('#bbe-contextual-window-backgroundimage').css("height",""); //reflow if it was open: prevent fixed height triggered by dragging
        //populate input fields
        jQuery("#bbe-contextual-window-backgroundimage input[name='url']").val(jQuery(this).css("background-image").replace('url(','').replace(')','').replace(/\"/gi, ""));
        
        //show the window
        bbe_show_contextual_window("#bbe-contextual-window-backgroundimage");
        return false;
    });
	
    //ON INPUT CHANGE (URL), update HTML
    jQuery("body").on("change", "#bbe-contextual-window-backgroundimage input[name='url'] ",function(){
        inputValue=jQuery(this).val();
        if (inputValue!='') newBgValue="url('" + inputValue +  "')"; else newBgValue="";
        bbe_clicked_page_element.css("background-image",newBgValue);
        bbe_play_audio_feedback("");
        var theContextualWindow=jQuery(this).closest(".bbe-contextual-window");
        theContextualWindow.css("height",""); //prevent fixed height triggered by dragging
	}); //end function
    
    
    ///CLICK   UNSPLASH RESULT - BACKGROUNDS VERSION
    jQuery("body").on("click", "#bbe-contextual-window-backgroundimage .bbe-unsplash-search-results img", function (event) {
        event.preventDefault();
        jQuery("#bbe-contextual-window-backgroundimage input[name='url']").val(jQuery(this).attr("data-src-regular")).change();
        //jQuery("#bbe-contextual-window-backgroundimage input[name='alt']").val("Photo by "+jQuery(this).attr("data-author-name")).change();
        bbe_play_audio_feedback('');
    });
    
    //CONTAINER PROPERTIES TRIGGER BACKGROUND EDITING
    jQuery("body").on("click", "#bbe-trigger-container-background-editing", function (event) {
        event.preventDefault();
       	
        unique_element_id = jQuery(".bbe-edit-container-nav").attr("data-container-id");
		divToEdit = jQuery(bbe_get_rootSel() + " div[data-container-id=" + unique_element_id + "]").parent();   
		divToEdit.attr("data-bbe-bg-editable","1").dblclick();
        
        divToEdit.css("background-image", 'url("'+url+'")').addClass("bbe-bscover");
		jQuery("#ContainerBgPattern").val(0).change(); //disable backgound pattern preset
    });
    
    
    
    //ICONS CONTEXTUAL WINDOW///////////////////////////////
	//DOUBLE CLICK  areas with editable bg class: EDIT background &style 
    jQuery("body").on("click", bbe_get_rootSel() + " i.fa", function (e) {
        bbe_clicked_page_element=jQuery(this); //store for later
        //jQuery('#bbe-contextual-window-icons').css("height",""); //reflow if it was open: prevent fixed height triggered by dragging
        //populate input fields
        jQuery("#bbe-contextual-window-icons input[name='icon-size-px']").val(jQuery(this).css("font-size").replace('px',''));
        
        jQuery("#bbe-contextual-window-icons select[name='icon-size'] option[value='']").prop('selected', true);//reset
        jQuery("#bbe-contextual-window-icons select[name='icon-size'] option[value='"+jQuery(this).attr("data-size")+"']").prop('selected', true);
        
        jQuery("#bbe-contextual-window-icons input[name='icon-color']").val(bbe_rgb2hex(jQuery(this).css("color")));
         
        //show the window
        bbe_show_contextual_window("#bbe-contextual-window-icons");
         
        return false;
    });
    
    //ON INPUT COLOR CHANGE, update HTML
    jQuery("body").on("change", "#bbe-contextual-window-icons input[name='icon-color'] ",function(){
        bbe_clicked_page_element.css("color", jQuery(this).val() );
        //bbe_play_audio_feedback('');    	
    }); //end function
    
    //ON INPUT SIZE CHANGE, update HTML
    jQuery("body").on("change", "#bbe-contextual-window-icons select[name='icon-size'] ",function(){
        bbe_clicked_page_element.attr("data-size", jQuery(this).val() );
        bbe_play_audio_feedback('');
	}); //end function
    
    
    //ON INPUT SIZE (PIXELS SLIDER) CHANGE , update HTML
    jQuery("body").on("change mousemove", "#bbe-contextual-window-icons input[name='icon-size-px'] ",function(){
        bbe_clicked_page_element.css("font-size", jQuery(this).val() + "px" );
		//bbe_play_audio_feedback('');
    }); //end function
    
    //CLICK AN  ICON: put in place of old icon  
    jQuery("body").on("click","#bbe-contextual-window-icons .fontawesome-icon-list a ", function (e) {
		e.preventDefault();
        var theIconClass=jQuery(this).find("i.fa").removeClass("fa").attr("class");
        jQuery(this).find("i").addClass("fa");
		bbe_clicked_page_element.attr("class","fa "+theIconClass);
		jQuery(this).addClass("bbe-allowed-link"); //so you won't get any alert message
        bbe_play_audio_feedback('');
        return false;
    });  
    
    // USER SEARCH FOR ICONS
    jQuery('#bbe-contextual-window-icons input[name="search"]').on('keyup',function() {
        var search = jQuery(this).val();
        if (search=="") jQuery("#bbe-icons-listing h2").show(); else jQuery("#bbe-icons-listing h2").hide();
        jQuery('#bbe-icons-listing .fontawesome-icon-list i.fa').parent().parent().show();
        jQuery('#bbe-icons-listing .fontawesome-icon-list i.fa').each(function(k,v) {
            if(jQuery(v).attr('class').indexOf(search.toLowerCase()) < 0) {
                jQuery(v).parent().parent().hide();
            }
        });
    });
    
    
    /////POST LIST SHORTCODE:  OPEN CONTEXTUAL WINDOW ///////////////////////////////////////////////////////////////
    jQuery("body").on("click", '.bbe-open-contextual-window-posts-loop', function (event) {
        event.preventDefault();					 
        bbe_clicked_page_element=jQuery(this).closest('.bbe-component-block'); //store for later
        //show and init window 
        bbe_show_contextual_window("#bbe-contextual-window-posts-loop");
        //init categories select
        jQuery("#bbe-contextual-window-posts-loop select#bbe-cats-select").append(jQuery("#bbe-editing-extras select[name='cat']").html());
        ///init  all parameters
        var theShortcode=jQuery(this).closest('.bbe-component-block').find("*[data-bbe-helper]").text();
        //loop all input items to initialize input fields
        jQuery("#bbe-contextual-window-posts-loop form *[name]").each(function(index, el) {
            fieldName=jQuery(el).attr("name");
            fieldValue=bbe_get_parameter_value_from_shortcode(fieldName,theShortcode);
            if (fieldValue!=="")  jQuery("#bbe-contextual-window-posts-loop form [name="+fieldName+"]").val(fieldValue);
        });
        
    }); 
    
    //user changes options, then update shortcode
    jQuery("#bbe-contextual-window-posts-loop").on("change", 'form *[name]', function (event) {
        event.preventDefault();
        ///build shortcode parameters:init
        shortcode_params='';
        //read old shortcode for other parameters
        var theShortcodeItem=bbe_clicked_page_element.find("*[data-bbe-helper]");
        var theShortcode=theShortcodeItem.text();
        jQuery("#bbe-contextual-window-posts-loop form *[name]").each(function(index, el) {
            var fieldValue=jQuery(el).val();
            var fieldName=jQuery(el).attr("name");
            
            if (fieldValue===null) fieldValue=bbe_get_parameter_value_from_shortcode(fieldName,theShortcode); 
            shortcode_params+=jQuery(el).attr("name")+'="'+fieldValue+'" ';
            });
        //update shortcode
        theShortcodeItem.text('[bbe_postlist '+shortcode_params+']');
        //update live preview
        bbe_render_shortcodes_in_block(bbe_clicked_page_element);
        
        //jQuery('#bbe-contextual-window-posts-loop input[name="url"]').val(bbe_clicked_page_element.attr('data'));
        bbe_play_audio_feedback('');
    }); 
    
    
    
     /////GENERIC LIVE SHORTCODE:  OPEN CONTEXTUAL WINDOW ///////////////////////////////////////////////////////////////
    jQuery("body").on("click", '.bbe-open-contextual-window-shortcode', function (event) {
        event.preventDefault();					 
        bbe_clicked_page_element=jQuery(this).closest('.bbe-component-block'); //store for later
        //show and init window 
        bbe_show_contextual_window("#bbe-contextual-window-shortcode");
        var theShortcode=jQuery(this).closest('.bbe-component-block').find("*[data-bbe-helper]").text();
        //set value
        jQuery("#bbe-contextual-window-shortcode form [name=shortcode]").val(theShortcode);
    }); 
    
    //user changes options, then update shortcode
    jQuery("#bbe-contextual-window-shortcode").on("change", 'form *[name]', function (event) {
        event.preventDefault();
        var theShortcode= jQuery("#bbe-contextual-window-shortcode form *[name=shortcode]").val();
        bbe_clicked_page_element.find("*[data-bbe-helper]").text(theShortcode);        
        //update live preview
        bbe_render_shortcodes_in_block(bbe_clicked_page_element);
        bbe_play_audio_feedback('');
    });
    

     /////WIDGETED AREA SHORTCODE:  OPEN CONTEXTUAL WINDOW ///////////////////////////////////////////////////////////////
    jQuery("body").on("click", '.bbe-open-contextual-window-widgetsarea', function (event) {
        event.preventDefault();					 
        bbe_clicked_page_element=jQuery(this).closest('.bbe-component-block'); //store for later
        //show and init window 
        bbe_show_contextual_window("#bbe-contextual-window-widgetsarea");
        var theShortcode=jQuery(this).closest('.bbe-component-block').find("*[data-bbe-helper]").text();
        
        fieldValue=bbe_get_parameter_value_from_shortcode('id',theShortcode);
        if (fieldValue!=="")  jQuery("#bbe-contextual-window-widgetsarea form [name=id]").val(fieldValue);
    }); 
    
    //user changes options, then update shortcode
    jQuery("#bbe-contextual-window-widgetsarea").on("change", 'form *[name]', function (event) {
        event.preventDefault();
        var theValue= jQuery("#bbe-contextual-window-widgetsarea form *[name=id]").val();
        bbe_clicked_page_element.find("*[data-bbe-helper]").text('[bbe_widgetsarea id="'+theValue+'"]');        
        //update live preview
        bbe_render_shortcodes_in_block(bbe_clicked_page_element);
        
        bbe_play_audio_feedback('');
    });
    
    
    
    
    
    ////////END CONTEXTUAL MODALS //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    
	// BASTARD INPUTS: fake SELECT inputs
    //
    jQuery("body").on("click", '.bbe-bastard-input-wrap input[type=text]', function (event) {
        var x = event.pageX - jQuery(this).offset().left;
        var w = jQuery(this).width();
        if(w>x) return;
        var inputName=jQuery(this).attr("name");
        jQuery(this).addClass("hidden").closest(".bbe-bastard-input-wrap").find("select").removeClass("hidden"); //hide text input and show select
    });
    
    jQuery("body").on("change", '.bbe-bastard-input-wrap select', function (event) {
        var currentValue=jQuery(this).val(); //console.log("changed "+currentValue);
        jQuery(this).addClass("hidden").closest(".bbe-bastard-input-wrap").find("input[type=text]").val(currentValue).change().removeClass("hidden");  
        
     });
    //////////// end bastard input ///////////
    
    
    
 	//FORM BUTTONS: prevent submission
	jQuery("body").on("click",  bbe_get_rootSel()+' input[type="submit"] ', function (event) {
		event.preventDefault();
		alert("Forms cannot be submitted while editing with BBE.");
	});
				
    // LINKS: when user click on LINKS - prevent escaping from editor
    jQuery("body").on("click", 'a:not([data-toggle])', function (event) {  
								
		var clicked_element=jQuery(this);
		if ( clicked_element.hasClass('bbe-allowed-link'))  return;
		if ( clicked_element.attr( "href" ).charAt(0)=='#' )  return;
		if ( clicked_element.is( "*[data-bbe-links-editable] a" ) )  return;
		if ( clicked_element.parents('.bbe-eliminate-on-saving:not(.bbe-shortcode-preview)').length)  return;
		if ( clicked_element.parents('.modal').length)  return;
        if ( clicked_element.parents('.bbe-contextual-window').length)  return;
        if ( clicked_element.parents('.bbe-modal-splash').length)  return;
								
        event.preventDefault();
		console.log("BBE Prevents link clicking so you don't lose data!");
		if ( clicked_element.parents('.bbe-gallery').length)  return;
		 bbe_play_audio_feedback('error');
				
	});
				
				 

    //REORDER  //containers,columns,blocks ////////////
    jQuery("body").on("click", ".bbe-reorder", function (e){
        e.preventDefault();
		jQuery(".bbe-bottom-nav").addClass("bbe-reorder-mode");
        jQuery(bbe_get_rootSel()).addClass("bbe-reorder-mode");
		jQuery(".bbe-close-edit-container-properties").click();
        var theTarget = jQuery(this).attr("data-action"); //containers,columns,blocks? Let's see
        if (theTarget == 'columns')
            objectsToReorder = jQuery("div[data-column-id]").parent();
        if (theTarget == 'rows') {
            objectsToReorder = jQuery("div[data-container-id]");
        }
        if (theTarget == 'blocks')
            objectsToReorder = jQuery("*[data-block-id]").parent();
        if (theTarget == 'containers')
            objectsToReorder = jQuery("div[data-container-id]").parent().parent();
        if (theTarget == 'gallery')
            objectsToReorder = jQuery(".bbe-gallery");

        jQuery("#bbe-reorder-stop").removeClass("hidden");
        objectsToReorder.sortable();
        jQuery(".bbe-eliminate-on-saving").remove();

    }); //end function reorder

    
    //REORDER STOP
    jQuery("body").on("click", "#bbe-reorder-stop", function (e)
    {
        e.preventDefault();
		jQuery(".bbe-bottom-nav").removeClass("bbe-reorder-mode");
        jQuery(bbe_get_rootSel()).removeClass("bbe-reorder-mode");
		jQuery(".ui-sortable > div[data-column-id]").css("position","").css("top","").css("left","");
        jQuery(".ui-sortable > *[data-block-id]").css("position","").css("top","").css("left","");
        jQuery(".ui-sortable .ui-sortable-handle.gallery-item").css("position","").css("top","").css("left","");
        jQuery(".ui-sortable").sortable("destroy");
        jQuery(this).addClass("hidden"); //hide the "Confirm Reorder" button
        bbe_play_audio_feedback('');
        bbe_init_editing_tools();
    });


    //FUNCTION TO TERMINATE TINYMCE EDITORS
    function bbe_terminate_tinymce(){
        //console.log('Stopping Editor  ');
        jQuery("*[data-bbe-html-editable]").removeAttr("style").removeAttr("id").removeAttr("spellcheck").removeAttr("style");
        jQuery("*[data-bbe-html-editable] a[data-mce-href]").removeAttr("data-mce-href");
        jQuery("*[data-bbe-html-editable] *[data-mce-bogus]").removeAttr("data-mce-bogus");
        tinyMCE.remove(); //STOP TINYMCE
        jQuery("*[data-tinyblock-id]").removeAttr("data-tinyblock-id");
        bbe_init_editing_tools();
    } //end func

    //USER CLICKS HTML-EDITABLE REGION: trigger editing
    jQuery(bbe_get_rootSel()).on("click", '*[data-bbe-html-editable="1"]:not(.mce-content-body)', function (event){
        event.preventDefault();
        
        jQuery("*[data-tinyblock-id]").removeAttr("data-tinyblock-id");
        jQuery(this).attr("data-tinyblock-id", bbe_randomString());
        
        
        var dbuid=jQuery(this).attr("data-tinyblock-id");
        var theSel="*[data-tinyblock-id="+dbuid+"]";
        
        //console.log("trigger tinymce on "+theSel);
        
        bbe_remove_editing_tools();
                
        if (typeof tinymce == 'object' )
            tinymce.init({
                selector: theSel,
                inline: true,
                hidden_input: false,
                setup: function(editor) {
                  editor.on('blur', function(e) {
                    //console.log('Editor was now blurred'); 
                    setTimeout(bbe_terminate_tinymce, 50); //STOP TINYMCE trick
                  }); //close onblur func
                }, // end setup
                plugins: [
                    "advlist autolink lists link anchor",
                    "searchreplace  code",
                    "table contextmenu paste"
                ],
                menubar: false,
                toolbar: " undo redo | copy paste pastetext searchreplace | styleselect | bold italic | bullist numlist  | link  table"
                });
            
        jQuery(this).focus();
        
        
    }); //end on click
     

    //HELPERS FOR AJAX LOADING
    jQuery("#bbe-magic-content").on("click","[data-bbe-ajaxload-modal]",function(e) {
               bbe_perform_url_check(jQuery(this).attr("data-bbe-ajaxload-modal"));
       });
       
    jQuery("#bbe-magic-content").on("click","[data-bbe-ajaxload]",function(e) {
               bbe_perform_url_check(jQuery(this).attr("data-bbe-ajaxload"));
       });
       
    function bbe_perform_url_check(theLoadAttribute) {
           if (  (theLoadAttribute=='/' || theLoadAttribute=="/ [data-wrapper-id=your_value]")  )
                {
                   alert("Customize the HTML code of this button to decide what to load. Put your custom URL in place of the slash! ");
                   e.preventDefault();
                   e.stopPropagation();
               }
       } //end function
				
    //USER CLICKS EDIT PAGE CSS  
    jQuery("body").on("click", '#bbe-edit-page-css', function (e){
        e.preventDefault();
        jQuery(".bbe-contextual-window").hide(); //close other windows
        pageIdToEdit = jQuery("#bbe-magic-content").attr("data-bbe-saving-id");
        if  (typeof bbe_css_window !== "undefined") bbe_css_window.close(); //Close CSS popup if it was open
        bbe_css_window = window.open("?bbe_open_csseditor_popup=1&pageId=" + pageIdToEdit, "", bbe_popup_style_parameters());
    });
                    
    /////////REMOTE COMPONENTS BROWSER ////////////////////////////////////////////////////////////////////////////////////////////////////////
     
	//USER CLICKS CATEGORY LINKS to SEARCH BY NAME: REVEAL FORM
	jQuery("body").on("click","#ul-search-components-by-type li.bbe-show-search-by-name",function(e){
		e.preventDefault();
        //SHOW THE FORM
        jQuery("#bbe-form-search-component-by-name").slideDown();
        
        //HIGHLIGHT CURRENT MENU
		jQuery(this).parent().find(".active").removeClass("active");
		jQuery(this).addClass("active");
        
	}); //end function
				
			 
	//USER CLICKS CATEGORY LINKS IN REMOTE COMPONENT BROWSER
	jQuery("body").on("click","#ul-search-components-by-type li[data-slug]",function(e){
		e.preventDefault();
        var chosenType=jQuery(this).attr("data-slug");
        jQuery(".bbe-last-clicked-before-login-attempt").removeClass("bbe-last-clicked-before-login-attempt");
        jQuery(this).addClass("bbe-last-clicked-before-login-attempt");
         
        if (chosenType=='basic-elements' ) {
          //basic
          var eventual_apikey_par="";
          var predomain="cdn";
        } else {
          //pro
           if(!bbe_check_api_key())  return; //check that we have an API KEY
           jQuery("#bbe-modal-splash-login").fadeOut(); //hide login window, login was successful
           jQuery("#bbe-modal-backdrop").fadeOut();
           var eventual_apikey_par="&apikey="+localStorage.getItem("bbe_apikey");
           var predomain="www";
           //show link
           jQuery("#ul-search-components-by-type li.bbe-show-search-by-name").removeClass("hidden");
        }
        
		jQuery("input[name=search_components_by_name]").val("");
        
        //HIGHLIGHT CURRENT MENU
		jQuery(this).parent().find(".active").removeClass("active");
		jQuery(this).addClass("active");
								
        //CLOSE Search by Name form if it was open
        jQuery("#bbe-form-search-component-by-name").slideUp();
        
        //SHOW SPINNER
        jQuery("#bbe-remote-components-search-results").html("<div class='bbe-loading-spinner'></div>"); //ADD SPINNER

        var url="https://"+predomain+".dopewp.com/wp-json/wp/v2/components-api/?page=1&per_page=50&type="+jQuery(this).attr("data-id")+"&orderby=date&order=asc"+eventual_apikey_par;

        bbe_fetch_components(url);
	}); //end function
				
				
	//USER SEARCHS COMP BY NAME ///////
	jQuery("body").on("change","input[name=search_components_by_name]",function(){
        if(!bbe_check_api_key())  return; //check that we have an API KEY
		jQuery("#ul-search-components-by-type li.active").removeClass("active");
		var val_to_search=jQuery(this).val();
        var url="https://www.dopewp.com/wp-json/wp/v2/components-api/?search="+val_to_search+"&posts_per_page=100&order=asc&orderby=date&page=1&apikey="+localStorage.getItem("bbe_apikey");
		bbe_fetch_components(url);
	}); //end function
				
				
	//FUNCTION TO FETCH & DISPLAY COMPONENTS
	function bbe_fetch_components(url) {
            
            console.log("fetching components:"+url);
            var jqxhr = jQuery.getJSON(url, function(a) {
                bbe_draw_components(a);			
			}); //end loaded json 
			
			jqxhr.fail(function() { jQuery("#bbe-remote-components-search-results").html("");	bbe_show_no_connection_alert(); 			});
 		
	} // end func
				
    function bbe_apply_theming_substitutions(input) {  return input.split("media/architecture").join("media/"+theChosenTheme);  }
    function bbe_draw_components(a)  {
        
        bbe_last_drawn_components_json=a;
        //console.log(JSON.stringify(a));
        theChosenTheme=jQuery("#bbe-contextual-window-components select[name='placeholders_theme']").val();
        html="<div class='row'>";
        jQuery.each(a, function( index,component ) {
             if (component.slug.indexOf("carousel")>=0 || component.slug.indexOf("lgp")>=0) var theClass="col-md-12"; else  var theClass="col-md-6"; 
             html=html+
                '  <div class="col-xs-12 '+theClass+ " " +component.slug+'-c">                                                                      '+
                '								<div class="  bbe-component-wrapper">                                                                              '+
                '												<div class="bbe-component-title-wrap"><h4 class="text-center">&nbsp; '+component.title.rendered+'  </h4></div>         '+
                '												<div class="bbe-component-html-content"> '+ bbe_apply_theming_substitutions(bbe_filter_components(component.content.rendered)) +'</div>  															'+
                '            <div class="bbe-component-excerpt">'+component.excerpt.rendered+'</div>'+
                '												<div class="bbe-component-actions-wrap">                                                                               ';
             if (component.excerpt.rendered!='')		html=html+	'																<button class="bbe-show-component-details btn-sm  pull-left btn btn-default " data-id="'+component.id+'" href="#"><span class="glyphicon glyphicon-zoom-in"></span> Info</button>             ';
                html=html+'																<button class="bbe-apply-component btn-sm  pull-right  btn btn-primary " data-index="'+index+'" data-id="'+component.id+'" href="#"><span class="glyphicon glyphicon-import"></span> Insert</button>          '+
                '												<div class="clearfix"></div></div>                                                                                                                                                                 '+
                '								</div> '+
                '				</div>  ';
        }); //end each loop
        
        html=html+'</div>'; //close row
        jQuery(".bbe-container-close-component").click();
         
        jQuery("#bbe-remote-components-search-results").hide().html(html).slideDown();
        jQuery('.bbe-remote-search-options').removeClass('bbe-disable-pointer-events');
            
    }
    
    //CHANGE SELECT THEME 
    jQuery("body").on("change", "#bbe-contextual-window-components select[name='placeholders_theme']", function (e) {
		e.preventDefault();
        jQuery( "#ul-search-components-by-type li.active").click();
    });
    
	//SHOW COMPONENT EXCERPT- INFO SECTION
    jQuery("body").on("click", ".bbe-show-component-details", function (e) {
		e.preventDefault();
        jQuery(this).closest(".bbe-component-wrapper").find(".bbe-component-excerpt").slideToggle();
    });
    
    
    //USER CLICKS ON APPLY COMPONENT  
    jQuery("body").on("click", ".bbe-apply-component", function (e) {
        e.preventDefault();
        jQuery(".bbe-newly-created-container-wrap").removeClass("bbe-newly-created-container-wrap");
        //jQuery(this).removeClass("btn-primary").addClass("btn-success"); //change button color
        var index=jQuery(this).attr("data-index");
        var component=bbe_last_drawn_components_json[index];
        //console.log(component);
        bbe_insert_component(bbe_apply_theming_substitutions(bbe_filter_components(component.content.rendered)));

    });//end Func

    
	////READYMADE TEMPLATES //////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    
	//USER CLICKS ON SHOW READYMADE TEMPLATES 
    jQuery("body").on("click", ".bbe-show-readymade-templates", function (e){
        e.preventDefault();
        jQuery(".bbe-contextual-window").hide(); //close other windows
        jQuery("#bbe-contextual-window-templates").fadeIn();	
		if ($('#bbe-remote-templates-search-results').is(':empty')) jQuery( "#ul-search-templates-by-kind li:first").click(); //TRIGGER DATA CALLING	  
    }); //end FUNC
  
	
	//USER CLICKS KIND LINKS IN TEMPLATE BROWSER
	jQuery("body").on("click","#ul-search-templates-by-kind li",function(e){
        e.preventDefault();
        
        jQuery(".bbe-close-template").click(); //close detail view if it was open
        var chosenType=jQuery(this).attr("data-slug");
        jQuery(".bbe-last-clicked-before-login-attempt").removeClass("bbe-last-clicked-before-login-attempt");
        jQuery(this).addClass("bbe-last-clicked-before-login-attempt");
            
        if (chosenType=="basic") {
            //BASIC TEMPLATES
            var eventual_apikey_par="";
            var predomain="cdn";
        }  else {
            //PRO TEMPLATES: LOGIN REQUIRED
            if(!bbe_check_api_key())  return; //check that we have an API KEY
            jQuery("#bbe-modal-splash-login").fadeOut(); //hide login window, login was successful
            jQuery("#bbe-modal-backdrop").fadeOut();
            var eventual_apikey_par="&apikey="+localStorage.getItem("bbe_apikey");        
            var predomain="www";
            
        } //end PRO CASE
        
        //HIGHLIGHT CURRENT MENU ITEM
        jQuery(this).parent().find(".active").removeClass("active");
        jQuery(this).addClass("active");   
             
        //SHOW SPINNER
        jQuery("#bbe-remote-templates-search-results").html("<div class='bbe-loading-spinner'></div>");
            
        var url="https://"+predomain+".dopewp.com/wp-json/wp/v2/templates-api/?kind="+jQuery(this).attr("data-id")+"&posts_per_page=100&orderby=date&order=asc"+eventual_apikey_par;
        bbe_fetch_templates(url);

	}); //end function
	
	//FUNCTION TO FETCH & DISPLAY TEMPLATES
	function bbe_fetch_templates(url){
        console.log("fetching templates:"+url);
        var jqxhr = jQuery.getJSON(url, function(a) {
            console.log(a);            
            html="<div class='row'>";
            count_templates=0;
            
            jQuery.each(a, function( index,component ) {
                html=html+
                     '<div class="  col-sm-3 col-md-3 '+component.slug+'-c">    '+
                     '		<div class="thumbnail bbe-component-wrapper">     '+
                     '						<div class="bbe-template-title-wrap"><h3 class="bbe-remote-template-name text-center"><a href="#" data-id="'+component.id+'" class="bbe-remote-load-template">'+component.title.rendered+'</a>  </h3></div>         '+
                     '						<div class="bbe-template-html-content"> <a href="#" data-id="'+component.id+'" class="bbe-remote-load-template"><img class="img-responsive" src="'+   component.featured_image_url.replace("www","cdn")  +'" alt="" ></a> </div>  '+ 
                     '						<div class="clearfix"></div>       '+
                     '		</div> '+
                     '</div> ';
                count_templates=count_templates+1;
                if (count_templates==4) { html=html+	'  <div class="clearfix"></div>';  count_templates=0; }                                                        
            }); //end each loop
            
            html=html+'</div>'; //close row
           
            jQuery("#bbe-remote-templates-search-results").hide().html(html).slideDown();
            //jQuery(' ').removeClass('bbe-disable-pointer-events');
            
        }); //end loaded json 
        
        jqxhr.fail(function() { 	bbe_show_no_connection_alert(); 			});
					
	} // end func
	
	
	//USER CLICKS ON LOAD SINGLE REMOTE TEMPLATE (from API)
	jQuery("body").on("click", ".bbe-remote-load-template", function (e) {
        e.preventDefault();
         if(jQuery("#ul-search-templates-by-kind li:first").hasClass("active")) {
            var eventual_apikey_par="";
            var predomain="cdn";
         } else {
            var eventual_apikey_par="?apikey="+localStorage.getItem("bbe_apikey");
            var predomain="www";
         }
        var url="https://"+predomain+".dopewp.com/wp-json/wp/v2/templates-api/"+jQuery(this).attr('data-id')+"/"+eventual_apikey_par;
        console.log("Fetch single template:"+url);
        var jqxhr = jQuery.getJSON(url, function(result) {
            //JSON loaded of single template
            var theSelect=' <!-- <label>Choose Images Theme</label> -->   '+
            '<select class="pull-right" name="template_placeholders_theme" data-current-theme="architecture">                '+
            '					<option value="architecture">Select Images Theme....</option>  '+
            '					<option value="architecture">architecture</option>  '+
            '					<option value="business">business</option>          '+
            '					<option value="car">car</option>                    '+
            '					<option value="church">church</option>              '+
            '					<option value="edu">education</option>              '+
            '					<option value="fashion">fashion</option>            '+
            '					<option value="food">food</option>                  '+
            '					<option value="fitness">gym & fitness</option>      '+
            '					<option value="hotel">hotel</option>                '+
            '					<option value="music">music</option>                '+
            '					<option value="nature">nature</option>              '+
            '					<option value="people">people</option>              '+
            '					<option value="wedding">wedding</option>            '+
            '</select>      </div>        <br>  <br>                                                '+
            '';
            
            //if no architecture is found, hide the select
            if (result.content.rendered.indexOf('architecture') == -1)  var theSelect="";
            var heading_html="<div class='bbe-remote-template-detail-name  text-center' >  <span class='bbe-close-template  pull-left glyphicon glyphicon-menu-left'></span>  &nbsp;"+
            " <h1>"+ result.title.rendered+"</h1>" + theSelect + "<button class='bbe-insert-template btn-md btn btn-success btn-block'><span class='glyphicon glyphicon-import'></span> APPLY TEMPLATE</button> &nbsp; </div>";
            var html_templ=	'<section class="bbe-template-html-content"> '+bbe_filter_components(result.content.rendered)+'</section>  		';
            var btn_html='<div class="bbe-template-detail-actions ">'+
                        '	 	<button class="bbe-insert-template btn-lg btn btn-success btn-block"><span class="glyphicon glyphicon-import"></span> APPLY TEMPLATE</button>  '+
                        '		 <button class="bbe-close-template btn-lg btn btn-error btn-block"><span class="glyphicon glyphicon-remove"></span> Cancel</button>  '+
                        '<div class="clearfix"></div>'+
                        '</div>';
            
            jQuery("#bbe-remote-templates-detail-space").hide().html("<section class='thumbnail'>"+heading_html+bbe_filter_components(html_templ)+btn_html+"</section>").slideDown();
            
            jQuery('#bbe-contextual-window-templates').scrollTop(0);  
            
            jQuery("#bbe-remote-templates-search-results").slideUp();
            }); //end loaded json with success
            
            jqxhr.fail(function() { 	bbe_show_no_connection_alert(); 			});
            
	});//end Func
	
    
    //USER CHANGES PLACEHOLDER IMAGES THEME ON LOAD REMOTE TEMPLATE (from API)
	jQuery("body").on("change", "select[name='template_placeholders_theme']", function (e) {
          
         theOldTheme=jQuery(this).attr("data-current-theme");
         theChosenTheme=jQuery(this).val();
         jQuery(this).attr("data-current-theme",theChosenTheme);
         var new_html=jQuery("#bbe-remote-templates-detail-space .bbe-template-html-content").html().split("media/"+theOldTheme).join("media/"+theChosenTheme);
         jQuery("#bbe-remote-templates-detail-space .bbe-template-html-content").html(new_html);
         
    });
           
	//CLOSE TEMPLATE DETAIL
	jQuery("body").on("click", ".bbe-close-template", function (e) {
        e.preventDefault();
        jQuery("#bbe-remote-templates-detail-space").slideUp(500,function(){
                                                                        jQuery("#bbe-remote-templates-detail-space").html("").show();
                                                                        });
        jQuery("#bbe-remote-templates-search-results").slideDown();
	});

	//USER CLICKS ON APPLY READYMADE TEMPLATE  
    jQuery("body").on("click", ".bbe-insert-template", function (e){
        e.preventDefault();
        //jQuery("#bbe-new-project-notice").slideUp().remove();
        bbe_remove_editing_tools();
        
        var template_html=jQuery("#bbe-remote-templates-detail-space .bbe-template-html-content").html();
        jQuery("#bbe-magic-content").html(template_html);
        
        jQuery("#bbe-add-editing-tools").click(); //add editing tools
        
        jQuery("#bbe-contextual-window-templates-close").click();
        jQuery('body').scrollTop(0);
        
        var audio_feedback = new Audio('https://www.dopewp.com/media/SOUNDFX/insert.mp3');
        audio_feedback.play();
    });
	
    			
	jQuery(document).keydown(function(e) {
    // ESCAPE key pressed
        if (e.keyCode == 27) {
            //close window
            jQuery(".bbe-contextual-close-top:visible ").click();
        }
    });
    
    ///USER GOES CRAZY, enable easter party: CTRL ALT E
    jQuery(document).keydown(function(e) {
        if (e.keyCode == 69 && e.ctrlKey && e.altKey) {
            bbe_play_audio_feedback('experimental');
            jQuery('.bbe-ee-hidden').removeClass("bbe-ee-hidden");
            
        }
    });
    
    
    //USER WANTS TO LOGOUT/CLEAR COOKIE: CTRL ALT X
    // REMOTE LOGOUT
    jQuery(document).keydown(function(e) {
        if (e.keyCode == 88 && e.ctrlKey && e.altKey) {
            
            localStorage.removeItem('bbe_apikey');
            localStorage.removeItem('bbe_username');
            jQuery("body").attr("data-bbe-status","unlogged");
            alert("Logout: Local Api key deleted.");
        }
    });
    
    
    
    
      
    //  
      
}); //end document ready

//end file. Wow!
