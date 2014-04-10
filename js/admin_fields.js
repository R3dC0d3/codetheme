jQuery(document).ready(function($){

	$('.input_wrap select, .input_wrap input[type="checkbox"]').hover(function(){
		$item = $(this).parents('.input_wrap').find('.input_desc');
		if($item.text().length > 2){
			$item.css('display', 'inline-block').fadeIn(200);
		}
	},function(){
		$(this).parents('.input_wrap').find('.input_desc').fadeOut(100);
	});
	$('.input_wrap input, .input_wrap select').not('.input_wrap input[type="checkbox"]').focusin(function(){
		$item = $(this).parents('.input_wrap').find('.input_desc');
		if($item.text().length > 2){
			$item.css('display', 'inline-block').fadeIn(200);
		}
	}).focusout(function(){
		$(this).parents('.input_wrap').find('.input_desc').fadeOut(100);
	});

});

function clearFields(selector){
	jQuery(selector).find(":input").each(function() {
		switch(this.type) {
			case "password":
			case "text":
			case "textarea":
			case "file":
			case "select-one":
			case "select-multiple":
				jQuery(this).val("");
				break;
			case "checkbox":
			case "radio":
				this.checked = false;
		}
	});
}