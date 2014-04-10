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

	$('#your-profile').prepend('<div id="wp-user-dashboard-tabs"></div>')
	$("#your-profile h3").each(function(k, v){
		if(k == 0)
			$(this).addClass('active');
		$(this).attr('for', k);
		$('#wp-user-dashboard-tabs').append($(this));
	});
	$('.form-table').first().css('display', 'block');
	$('#wp-user-dashboard-tabs h3').click(function(){
		$tab_for = $(this).attr('for');

		$('#wp-user-dashboard-tabs h3.active').removeClass('active');
		$(this).addClass('active');

		$('#your-profile > .form-table').hide();
		$('#your-profile > .form-table:eq('+$tab_for+')').css('display', 'block');
	});
});