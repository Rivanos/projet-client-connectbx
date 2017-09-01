<!DOCTYPE html>
<html lang="en">
<head>
<title>HTML Editor</title>
<style type="text/css" media="screen">
    #editor { 
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
		font-size:16px !important;
    }
</style>
</head>
<body>

<div id="editor">Loading...</div>
    
<script src="//ajaxorg.github.io/ace-builds/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>

<script src="//cdn.rawgit.com/beautify-web/js-beautify/master/js/lib/beautify-html.js" type="text/javascript" charset="utf-8"></script>
<script>
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/xcode");
    editor.getSession().setMode("ace/mode/html");
	editor.getSession().setUseWrapMode(false);
	//init and get contebt and put into editor
	 if (window.opener != null && !window.opener.closed) {
		
		     window.opener.document.getElementById("bbe-kill-tools").click(); //remove tools
		 
			var html=window.opener.document.querySelector('[<?php echo $_GET['attribute'] ?>="<?php echo $_GET['value'] ?>"]').innerHTML;
            
			 window.opener.document.getElementById("bbe-add-editing-tools").click(); //add editing tools
		 
		 
			editor.setValue(html_beautify(html),1); // or session.setValue
		   
			document.title ="Edit HTML" 
        }
		
	//on editor chanhe	
	editor.getSession().on('change', function(e) {
				// e.type, etc
				
				 if (window.opener != null && !window.opener.closed) {
					
					 
					var newContent =editor.getValue(); //GET VALUE
					window.opener.document.querySelector('[<?php echo $_GET['attribute'] ?>="<?php echo $_GET['value'] ?>"]').innerHTML=newContent; //PUT VALUE
					
					  window.opener.document.getElementById("bbe-add-editing-tools").click(); //add editing tools
		 
		
				 }
 
			});
						
						
						
</script>
</body>
</html>