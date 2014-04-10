<?php

	//we need this for every include
	$theme_dir = get_template_directory();
	//load the configuration file
	require_once $theme_dir."/engine/config.php";

	require_once $theme_dir."/engine/code/theme.php";
	require_once $theme_dir."/engine/code/dashboard.php";
