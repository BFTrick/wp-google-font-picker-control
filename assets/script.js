/**
* Hide default select box, replace with fancy font picker
*/
jQuery(document).ready(function($) {
	// initialize the custom control for the font picker
	$(".fontPickerCustomControl").fontPickerCustomControl();
});

/**
* A small jquery plugin that does all of the hard work
*/
(function( $ ) {
	$.fn.fontPickerCustomControl = function() {

		//return the 'this' selector to maintain jquery chainability
		return this.each(function() {

			// cache this selector for further use
			thisFontPickerCustomControl = this;

			// hide select box
			$("select", this).hide();

			// show fancy content
			$(".fancyDisplay", this).show();

			// add event listeners to fancy display
			$(".fancyDisplay ul li").on("click", function(event){
				// get index of clicked element
				var index = $(".fancyDisplay ul li", thisFontPickerCustomControl).index(this);
				
				// change the selected option in the select box
				$('select', thisFontPickerCustomControl).val(index);

				// simulate a change on the select box
				$("select", thisFontPickerCustomControl).change();
			});

		});

	};
})( jQuery );