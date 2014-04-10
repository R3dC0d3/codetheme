<?php
	/*
		Template Name: Dashboard
	*/
?>

<?php

	//out if you're logged in
	if(!is_user_logged_in()){
		wp_redirect(site_url());
		exit;
	}

	//current page template style
	add_action('wp_enqueue_scripts', 'login_custom_files');
	if(!function_exists("login_custom_files")){
		function login_custom_files(){
			wp_enqueue_style( "dashboard-style", get_template_directory_uri()."/css/dashboard.css", array("codetheme-style-main"));
		}
	}

?>

<?php
	global $post;

	$theme_url = get_template_directory_uri();
	$theme_dir = get_template_directory();
	$home_url = get_home_url();
	$options = get_options();

	$dashboard_template = get_field('dashboard_template', $post->ID);
	if(strlen($dashboard_template) < 3){
		$dashboard_template = "default";
	}

	$school_name = get_user_meta(get_current_user_id(), "first_name");
	$school_name = $school_name[0];
?>
<?php get_header(); ?>
	<?php include $theme_dir."/header_menu.php"; ?>
	<div id="title">
		<div class="row">
			<div class="columns small-12">
				<h3><?php echo $school_name; ?></h3>
				<?php wp_nav_menu(array('menu' => 'dashboard', 'menu_id' => 'dashboard_nav')); ?>	
			</div>
		</div>
	</div>

	<!-- page_content -->
	<div class="row">
		<div class="columns small-12">
			<div id="page_content">
				<?php
					include $theme_dir."/dashboard/".$dashboard_template.".php";
				?>
			</div>
		</div>
	</div>
	<!-- ~page_content -->
<?php get_footer(); ?>
