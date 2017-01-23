


		var introduction = document.getElementById( 'introduction' );
		
		introduction.setAttribute( 'contenteditable', true );

		CKEDITOR.inline( 'introduction', {
			// Allow some non-standard markup that we used in the introduction.
			extraAllowedContent: 'a(documentation);abbr[title];code',
			removePlugins: 'stylescombo',
			extraPlugins: 'sourcedialog',
			// Show toolbar on startup (optional).
			startupFocus: true
		} );
	
	
	
	var optionsPanel = $.jsPanel({
    position:    {my: "right-top", at: "right-top", offsetY: 20},
    theme:       "rebeccapurple",
    contentSize: {width: 300, height: 275},
    headerTitle: "Control panel",
    //contentAjax: 'wcontent.html',
    callback: function () {
        this.content.css("padding", "8px");
    }
    
    

   
});
 
 $(function(){
	
    $("*[editable='editable']").addClass('editable');
		
	
	
});    
