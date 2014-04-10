<?php
	/*
		Template Name: SubPage
	*/
?>
<?php
	//current page template style
	add_action('wp_enqueue_scripts', 'homepage_custom_files');
	if(!function_exists("homepage_custom_files")){
		function homepage_custom_files(){
			wp_enqueue_style( "subpage-style", get_template_directory_uri()."/css/subpage.css", array("codetheme-style-main"));
		}
	}
?>

<?php
	$theme_url = get_template_directory_uri();
	$theme_dir = get_template_directory();
	$home_url = get_home_url();
	$options = get_options();
	
	$parent = get_post_ancestors($post->ID);

	//form
	$register_your_interest = $options['register_interest_form'];
?>
<?php get_header(); ?>
	<?php include $theme_dir."/header_menu.php"; ?>
	<div id="title">
		<div class="row">
			<div class="columns small-12">
				<h2><?php echo empty( $post->post_parent ) ? get_the_title( $post->ID ) : get_the_title( $post->post_parent ); ?></h2>				
			</div>
		</div>
	</div>
	<div id="page_content">
		<div class="row">
			<div class="columns-sub small-40">
				<?php if ($post->post_parent == '26') { wp_nav_menu(array('menu' => 'SubPages', 'menu_id' => 'sub_pages')); } else { wp_nav_menu(array('menu' => 'Schools', 'menu_id' => 'sub_pages')); }?><Br/>
			<img src="<?php echo $home_url; ?>/wp-content/uploads/2014/03/cominsoon3.png"/>
				<div id="help_buttons" style="display:none;">
					<a href="#" class="button2 register_button2 fade_over"></a>
					<a href="#" class="button2 login_button2 fade_over"></a>
					<a href="#" class="button2 explore_button fade_over"></a>
				</div>
			</div>
			<div class="columns-sub small-80">
				<h1 class='title'>
					<?php echo $post->post_title; ?>
				</h1>
				<div class="page_content">
					<?php
						$page_content = apply_filters("the_content", $post->post_content);
						echo $page_content;
					?>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<div id="footer">
		Registered charity no. 1112699 | ©2014–Forever, The School Enterprise Challenge
	</div>

<div id="registerInterestModal" class="reveal-modal" data-reveal>
		<h1>Register your Interest</h1>
		<div class="panel">
		We're delighted that you would like to enter your school into the School Enterprise Challenge 2014! Please enter your information and you will be the first to receive an email from us when registration opens to enter or re-enter the competition.
<br/><br/>
For every school which you refer AND who signs up, we'll automatically give you additional points when you register in April! 
		</div>
		<?php echo do_shortcode("[gravityform id='1' title=false description=false ajax=true tabindex=49]"); ?>
	</div>

<?php get_footer(); ?>