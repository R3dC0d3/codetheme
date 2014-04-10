<?php
	global $options;

	$dashboard_page = $options['dashboard_page'];
	$dashboard_page = get_permalink($dashboard_page);

	$login_page = $options['login_page'];
	$login_page = get_permalink($login_page);
?>
<div id="header">
	<div class="row">
		<div class="columns small-12">
			<div id="logo">
				<a href="<?php echo $home_url; ?>">
					<img src="<?php echo $theme_url."/img/logosub.png"; ?>" alt="School Enterprise Challange">
				</a>
			</div>

			<div id="header_buttons">
				<?php if(is_user_logged_in()){ ?>
					<a href="<?php echo $dashboard_page; ?>" class='dashboard_button'></a>
					<a href="<?php echo wp_logout_url(get_home_url()); ?>" class='signout_button' title="Sign Out">Sign Out</a>
				<?php }else{ ?>
					<a href="<?php echo $login_page; ?>" class='login_button'></a>
					<a href="#" data-reveal-id="registerModalForm" data-reveal="" class='register_button'></a>
				<?php } ?>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
<div id="header2">
	<div class="row">
		<div class="columns small-12">
			<?php wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'navbar')); ?>

			<div id="header_donate">
				<a href="#donate" class="donate"></a>
			</div>

			<div id="header_search">
				<?php get_search_form(); ?>
			</div><!-- #header_search -->
		</div>
	</div>
</div>