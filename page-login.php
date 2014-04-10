<?php
	/*
		Template Name: Login
	*/
?>

<?php

	//out if you're logged in
	if(is_user_logged_in()){
		wp_redirect(site_url());
		exit;
	}

	//current page template style
	add_action('wp_enqueue_scripts', 'login_custom_files');
	if(!function_exists("login_custom_files")){
		function login_custom_files(){
			wp_enqueue_style( "login-style", get_template_directory_uri()."/css/login.css", array("codetheme-style-main"));
		}
	}

?>

<?php
	$theme_url = get_template_directory_uri();
	$theme_dir = get_template_directory();
	$home_url = get_home_url();
	$options = get_options();

	$dashboard_page = $options['dashboard_page'];
	$dashboard_page = get_permalink($dashboard_page);

?>
<?php get_header(); ?>
	<?php include $theme_dir."/header_menu.php"; ?>
	
	<div class="row">
		<div class="columns small-12">
			<div id="login">
				<?php if(isset($_GET['login'])){ ?>
					<div class="row">
						<div class="columns small-12">
							<div class="alert-box error">
								<?php if($_GET['login'] == "empty"){ ?>
									Fields can't be empty!
								<?php }else{ ?>
									Wrong email and/or password!
								<?php } ?>
							</div>
						</div>
					</div>
				<?php } ?>
				<div class="row">
					<div class="columns small-5">
						<h1 class="title">LOGIN</h1>
					</div>
					<div class="columns small-7">
						<?php
							$args = array(
									'echo'           	=> true,
									'redirect'			=> $dashboard_page, 
									'label_username'	=> __( 'Email' ),
									'id_submit'			=> 'login_button'
								);
							wp_login_form($args);
						?>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>
