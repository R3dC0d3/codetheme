jQuery(document).ready(function($){
	

	//create the tabs functionality
	$('.tabs_list > span').click(function(){
		$tabs_for = $(this).parents('.tabs_list').attr('for');
		$tab_for = $(this).attr('for');

		$('.tabs_list[for="'+$tabs_for+'"] > span.active').removeClass('active');
		$(this).addClass('active');

		$('.tabs_cont[is="'+$tabs_for+'"] > div').hide();
		console.log('.tabs_cont[is="'+$tabs_for+'"] div[is="'+$tab_for+'"]');
		$('.tabs_cont[is="'+$tabs_for+'"] > div[is="'+$tab_for+'"]').show();
	});
});