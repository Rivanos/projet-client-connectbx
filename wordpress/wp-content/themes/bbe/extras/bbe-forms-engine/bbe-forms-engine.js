//////////////////////
// BBE FORM HELPER JS 
//////////////////////
// bbe-form-error-message-custom
function bbeforms_get_feedback_modal_html(theFormElement) {
    
    var customMsg=theFormElement.find(".bbe-form-success-message-custom").html();
    var customMsgErr=theFormElement.find(".bbe-form-error-message-custom").html();
    var modalBody='<section class="bbeform_error_message">'+customMsgErr+'</section><section class="bbeform_confirmation_message">'+customMsg+'</section><div class="bbeform-submission-feedback"></div>';
    
    return ''+
          '<!-- Form Feedback Modal -->                                                                                                                    '+
          '<div class="modal fade bbe-eliminate-on-saving bbeforms-modal-feedback" tabindex="-1" role="dialog" aria-labelledby="bbeforms-modal-feedback">  '+
          '  <div class="modal-dialog" role="document">                                                                                               '+
          '    <div class="modal-content">                                                                                                            '+
          '      <div class="modal-header">                                                                                                           '+
          '        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>       '+
          '        <!-- <h4 class="modal-title">Your Form Submission</h4>  -->                                                                        '+
          '      </div>                                                                                                                               '+
          '      <div class="modal-body ">'+modalBody+'</div>                                                                                         '+
          '      <div class="modal-footer">                                                                                                           '+
          '        <button type="button" class="btn btn-success btn-block" data-dismiss="modal">OK</button>                                           '+
          '      </div>                                                                                                                               '+
          '    </div>                                                                                                                                 '+
          '  </div>                                                                                                                                   '+
          '</div>                                                                                                                                     '+
          '';
}

// DOCUMENT READY
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
jQuery(document).ready(function ($)

{         //For each form, initialize engines:
          jQuery("form[data-bbe-live-form]").each(function (index, form_element) {
				
                    var theFormElement=jQuery(form_element);
                    var theFormLiveAttribute=theFormElement.attr("data-bbe-live-form");
                    //theFormElement.css("border","1px solid red");alert("Init  form "+theFormLiveAttribute); //for debug: Init form contactform
                    
                    //// DEFINE FORM TARGET
                    var theFormTargetSel=theFormElement.attr("data-bbe-form-target");
                    if (theFormTargetSel===undefined) { //default case
                        theFormElement.append(bbeforms_get_feedback_modal_html(theFormElement)); //ADD THE DIV FOR SHOWING RESULTS AND FEEDBACK - if it's not there already
                        theFormTargetSel='form[data-bbe-live-form='+theFormLiveAttribute+'] .bbeform-submission-feedback';    
                    }
                    
                    //SET FORM ACTION    
                    theFormElement.attr("action",ajax_object.ajax_url);
                    
                    //// BIND FORM(S) USING 'AJAXFORM'    
                    theFormElement.ajaxForm({  
                               data: {  
                                  action:'bbe_forms_check_submission_and_process',
                                  bbeHandleForm: theFormLiveAttribute,
                                  somemore: 'go on and make it funky'  
                               },  
                              
                               target: theFormTargetSel,
                               beforeSerialize: function(formData, jqForm, options) { },
                               beforeSubmit: function(formData, jqForm, options) { theFormElement.find('input[type="submit"]').attr("disabled","disabled"); },  
                               success: function(responseText, statusText, xhr, $form) {
                                   theFormElement.find(".bbeforms-modal-feedback").modal('show') //show modal  
                                   theFormElement.find('input[type="submit"]').removeAttr("disabled");
                                   //alert("loadedsaving!");
                               },
                               
                               error: function(responseText, statusText, xhr, $form) {
                                   //theFormElement.find(".bbeforms-modal-feedback").modal('show') //show modal  
                                   theFormElement.find('input[type="submit"]').removeAttr("disabled");
                                   alert("A connection error has occurred. Please try again later. Thank you!");
                               }
                    
                     });  //end ajaxform
                    
                    //END TRIGGER SOME FORM AND HANDLE SUBMISSION............./////////////////////////////////
                       
          }); // end for each
				
				
          //do more stuff eventually
				
				
			 
}); //end document ready