<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Editor</title>
<style type="text/css" media="screen">
    #editor { 
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
		font-size:14px !important;
    }
</style>
</head>
<body>

<div id="editor">Loading...</div>
    
<script src="//ajaxorg.github.io/ace-builds/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
<script>
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/twilight");
    editor.getSession().setMode("ace/mode/css");
	editor.getSession().setUseWrapMode(true);
	//init and get contebt and put into editor
	 if (window.opener != null && !window.opener.closed) {
		
		   //  window.opener.document.getElementById("bbe-kill-tools").click(); //remove tools
		 
			var html=window.opener.document.querySelector('#bbe-page-style').innerHTML;
            
			// window.opener.document.getElementById("bbe-add-editing-tools").click(); //add editing tools
		 
		 
			editor.setValue(html,1); // or session.setValue
		   
			document.title ="Edit CSS" 
        }
		
	//on editor chanhe	
	editor.getSession().on('change', function(e) {
				// e.type, etc
				
				 if (window.opener != null && !window.opener.closed) {
					
					 
					 var newCSS =editor.getValue(); //GET VALUE
					 window.opener.document.querySelector('#bbe-page-style').innerHTML=newCSS; //PUT VALUE
					
					//  window.opener.document.getElementById("bbe-add-editing-tools").click(); //add editing tools
		 
		
				 }
 
			});
						
						
						
</script>
</body>
</html>