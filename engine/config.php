<?php

	$theme_uri = get_template_directory_uri();

	//first of all we make sure that all the support settings are loaded
	add_action('init', 'cte_support');
	function cte_support(){
		register_nav_menus( array(
			'primary' => 'Primary Navigation'
		) );
	}