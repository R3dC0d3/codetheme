jQuery(document).ready(function($){
	//fade in load
	// $("body").fadeOut(0).delay(100).fadeIn(500);

	//start foundation
	$(document).foundation();

	bsu = $('#bsu').val();
	cpage = $('#cpage').val();


	$("#searchsubmit").click(function(e){
		$hasClass = $(e.target).hasClass('goForIt');
		if(!$hasClass){
			$("#s").addClass('active');
			$(this).addClass('goForIt');
			return false;
		}else{
			$(this).removeClass('goForIt');
			if($("#s").val().length < 1){
				$("#s").removeClass('active');
				return false;
			}
		}
	});

	// $("#dashboard_form").submit(function(){
	// 	$dates = $(this).serialize()

	// 	$.post(cpage, $dates, function(data){
	// 		console.log(data);
	// 	});

	// 	return false;
	// });
});