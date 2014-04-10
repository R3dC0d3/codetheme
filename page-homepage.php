<?php
	/*
		Template Name: HomePage
	*/
?>

<?php

	//current page template style
	add_action('wp_enqueue_scripts', 'homepage_custom_files');
	if(!function_exists("homepage_custom_files")){
		function homepage_custom_files(){
			wp_enqueue_style( "homepage-style", get_template_directory_uri()."/css/homepage.css", array("codetheme-style-main"));
		}
	}

?>

<?php

	$theme_url = get_template_directory_uri();
	$theme_dir = get_template_directory();
	$home_url = get_home_url();
	$options = get_options();

	global $post;

	//get the page content
	$page_content = apply_filters("the_content", $post->post_content);

	//bubble
	$bubble_title = get_field("bubble_title", $post->ID);
	$bubble_content = get_field("bubble_content", $post->ID);

	//form
	$register_your_interest = $options['register_interest_form'];

?>

<?php get_header(); ?>
	<?php include $theme_dir."/header_menu.php"; ?>
	<div class="row">
		<div class="columns small-12">
			<div id="homepage_body">
				<div id="homepage_bubble">
					<h1><?php echo $bubble_title; ?></h1>
					<div id='homepage_bubble_content'>
						<?php echo $bubble_content; ?>
					</div>
				</div>
				<?php echo $page_content; ?>
			</div>
		</div>
	</div><!-- homepage_body -->

	<div id="registerInterestModal" class="reveal-modal" data-reveal>
		<h1>Register your Interest</h1>
		<div class="panel">
			We're delighted that you would like to enter your school into the School Enterprise Challenge 2014! Please enter your information and you will be the first to receive an email from us when registration opens to enter or re-enter the competition.
			<br/><br/>
			For every school which you refer AND who signs up, we'll automatically give you additional points when you register in April! 
		</div>
		<?php echo do_shortcode("[gravityform id=".$register_your_interest." title=false description=false ajax=true tabindex=49]"); ?>
	</div>

<?php get_footer(); ?>