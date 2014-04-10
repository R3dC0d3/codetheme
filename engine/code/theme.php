<?php

	$fields = array(
					array(
							'type' 		=> 'hr',
							'name'		=> '',
							'title'		=> 'System Settings'
						),
						array(
								'type'		=> 'gravity_forms',
								'name'		=> 'register_interest_form',
								'title'		=> 'Register Your Interest Form',
								'desc'		=> 'Id of the `gravity form` that is used to show the register your interest form.'
							),
						array(
								'type'		=> 'gravity_forms',
								'name'		=> 'register_form',
								'title'		=> 'Register Form Id',
								'desc'		=> 'Id of the `gravity form` that is used to show the register form.'
							),
					array(
							'type' 		=> 'hr',
							'name'		=> '',
							'title'		=> 'Social Bar'
						),
						array(
								'type'		=> 'text',
								'name'		=> 'facebook_link',
								'title'		=> 'Facebook Link',
								'desc'		=> 'Facebook link that will be on the left side toolbar.'
							),
						array(
								'type'		=> 'text',
								'name'		=> 'twitter_link',
								'title'		=> 'Twitter Link',
								'desc'		=> 'Twitter link that will be on the left side toolbar.'
							),
						array(
								'type'		=> 'text',
								'name'		=> 'email_address',
								'title'		=> 'Email Address',
								'desc'		=> ''
							),
						array(
								'type'		=> 'text',
								'name'		=> 'social_print',
								'title'		=> 'Print',
								'desc'		=> ''
							),
						array(
								'type'		=> 'text',
								'name'		=> 'social_plus',
								'title'		=> 'Plus+',
								'desc'		=> ''
							),
					array(
							'type' 		=> 'hr',
							'name'		=> '',
							'title'		=> 'User Settings'
						),
						array(
								'type'		=> 'pages',
								'name'		=> 'login_page',
								'title'		=> 'Login Page',
								'desc'		=> ''
							),
						array(
								'type'		=> 'gravity_forms',
								'name'		=> 'admin_panel_form1',
								'title'		=> 'AdminPanel :: User Details',
								'desc'		=> 'Form used for the AdminPanel User Details tab'
							),
						array(
								'type'		=> 'gravity_forms',
								'name'		=> 'admin_panel_form2',
								'title'		=> 'AdminPanel :: Steps',
								'desc'		=> 'Form used for the AdminPanel Steps tab'
							),
					array(
							'type' 		=> 'hr',
							'name'		=> '',
							'title'		=> 'Dashboard'
						),
						array(
								'type'		=> 'pages',
								'name'		=> 'dashboard_page',
								'title'		=> 'Dashboard Page',
								'desc'		=> ''
							),
						array(
							'type' 		=> 'hr',
							'name'		=> '',
							'title'		=> 'Steps'
						),
							array(
									'type'		=> 'text',
									'name'		=> 'step_under_review_message',
									'title'		=> 'Step under review Message',
									'desc'		=> ''
								),
							array(
									'type'		=> 'pages',
									'name'		=> 'dashboard_step1_page',
									'title'		=> 'Step 1 Page',
									'desc'		=> ''
								),
							array(
									'type'		=> 'text',
									'name'		=> 'dashboard_step1_title',
									'title'		=> 'Step 1 Title',
									'desc'		=> ''
								),
							array(
									'type'		=> 'gravity_forms',
									'name'		=> 'dashboard_step1',
									'title'		=> 'Step 1 Form',
									'desc'		=> 'Id of the `gravity form` that is used to show the step 1 form.'
								),

							array(
									'type'		=> 'pages',
									'name'		=> 'dashboard_step2_page',
									'title'		=> 'Step 2 Page',
									'desc'		=> ''
								),
							array(
									'type'		=> 'text',
									'name'		=> 'dashboard_step2_title',
									'title'		=> 'Step 2 Title',
									'desc'		=> ''
								),
							array(
									'type'		=> 'gravity_forms',
									'name'		=> 'dashboard_step2',
									'title'		=> 'Step 2 Form',
									'desc'		=> 'Id of the `gravity form` that is used to show the step 2 form.'
								),

							array(
									'type'		=> 'pages',
									'name'		=> 'dashboard_step3_page',
									'title'		=> 'Step 3 Page',
									'desc'		=> ''
								),
							array(
									'type'		=> 'text',
									'name'		=> 'dashboard_step3_title',
									'title'		=> 'Step 3 Title',
									'desc'		=> ''
								),
							array(
									'type'		=> 'gravity_forms',
									'name'		=> 'dashboard_step3',
									'title'		=> 'Step 3 Form',
									'desc'		=> 'Id of the `gravity form` that is used to show the step 3 form.'
								),

							array(
									'type'		=> 'pages',
									'name'		=> 'dashboard_step4_page',
									'title'		=> 'Step 4 Page',
									'desc'		=> ''
								),
							array(
									'type'		=> 'text',
									'name'		=> 'dashboard_step4_title',
									'title'		=> 'Step 4 Title',
									'desc'		=> ''
								),
							array(
									'type'		=> 'gravity_forms',
									'name'		=> 'dashboard_step4',
									'title'		=> 'Step 4 Form',
									'desc'		=> 'Id of the `gravity form` that is used to show the step 4 form.'
								),

							array(
									'type'		=> 'pages',
									'name'		=> 'dashboard_step5_page',
									'title'		=> 'Step 5 Page',
									'desc'		=> ''
								),
							array(
									'type'		=> 'text',
									'name'		=> 'dashboard_step5_title',
									'title'		=> 'Step 5 Title',
									'desc'		=> ''
								),
							array(
									'type'		=> 'gravity_forms',
									'name'		=> 'dashboard_step5',
									'title'		=> 'Step 5 Form',
									'desc'		=> 'Id of the `gravity form` that is used to show the step 5 form.'
								)
				);

	//start by loading the styles and scripts
	add_action('wp_enqueue_scripts', 'cte_load_files');
	function cte_load_files(){
		global $theme_uri;

		//first we have to remove any jquery version that is loaded and add the one that will work perfectly with our theme
		wp_deregister_script("jquery");

		//styles
		wp_enqueue_style("codetheme-style-foundation", $theme_uri."/css/foundation.min.css");
		wp_enqueue_style("codetheme-style-main", $theme_uri."/css/main.css");

		//scripts
		wp_enqueue_script("jquery", $theme_uri."/js/jquery.js");
		wp_enqueue_script("codetheme-script-foundation", $theme_uri."/js/foundation.min.js", array("jquery"));
		wp_enqueue_script("codetheme-script-main", $theme_uri."/js/main.js", array("jquery"));
	}
	/**
		*create the admin menu item for the theme settings
	*/
	add_action('admin_menu', 'cte_admin_page');
	function cte_admin_page(){
		add_menu_page("Theme Settings", "Theme Settings", "manage_options", "theme_settings", "cte_admin_page_content");
	}
	function cte_admin_page_content(){
		global $theme_uri;
		global $fields;

		$fields = get_fields_values();

		wp_enqueue_style("cte-admin-style", $theme_uri."/css/admin.css");
		wp_enqueue_style("cte-admin-fields-style", $theme_uri."/css/admin_fields.css");
		wp_enqueue_script("cte-admin-fields-script", $theme_uri."/js/admin_fields.js", array('jquery'));
		?>
			<div class='cte_admin_page'>
				<div class="cte_admin_page_title">
					Theme Settings
				</div>
				<div class="cte_admin_page_content">
					<form action="" method="POST">
						<?php
							foreach($fields as $field){
								echo show_field($field);
							}
						?>
						<button name='cte_admin_page' value='Update'>Update</button>
					</form>
				</div>
			</div>
		<?php
	}

	/**
		*this function will show the filed by type
		*@param $item
		*@return output the item field
	*/
	function show_field($item){
		global $wpdb;

		$output = '';
		if($item['type'] == "text"){
			$output .= '
						<div id="cte_id'.$item['name'].'" class="input_wrap input_text_wrap">
							<div class="input_label">
								<label for="'.$item['name'].'_input">'.$item['title'].'</label>
							</div>
							<div class="input_text">
								<input type="text" name="'.$item['name'].'" value="'.(isset($item['value']) ? $item['value'] : '').'" id="'.$item['name'].'_input"/>
								<div class="input_desc">'.$item['desc'].'</div>
							</div>
						</div>
					';
		}elseif($item['type'] == "password"){
				$output .= '
							<div id="cte_id'.$item['name'].'" class="input_wrap input_text_wrap">
								<div class="input_label">
									<label for="'.$item['name'].'_input">'.$item['title'].'</label>
								</div>
								<div class="input_text">
									<input type="password" name="'.$item['name'].'" value="'.(isset($item['value']) ? $item['value'] : '').'" id="'.$item['name'].'_input"/>
									<div class="input_desc">'.$item['desc'].'</div>
								</div>
							</div>
						';
		}elseif($item['type'] == "select"){
			$options = '';
			$i = 0;
			foreach($item['options'] as $value => $title){
				if($i === $value){
					$value = $title;
				}else{
					$value = str_replace('_', '', $value);
				}
				$options .= '<option value="'.$value.'" '.($value == $item['value'] ? ' selected ' : '').'>'.$title.'</option>';
				$i++;
			}
			$output .= '
						<div id="cte_id'.$item['name'].'" class="input_wrap input_select_wrap">
							<div class="input_label">
								<label for="'.$item['name'].'_input">'.$item['title'].'</label>
							</div>
							<div class="input_select">
								<select name="'.$item['name'].'" id="'.$item['name'].'_input">
									<option value=""></option>
									'.$options.'
								</select>
								<div class="input_desc">'.$item['desc'].'</div>
							</div>
						</div>
					';
		}elseif($item['type'] == "true"){
			$output .= '
						<div id="cte_id'.$item['name'].'" class="input_wrap input_true_wrap">
							<div class="input_label">
								<label for="'.$item['name'].'_input">'.$item['title'].'</label>
							</div>
							<div class="input_true">
								<input type="checkbox" name="'.$item['name'].'" value="'.(($item['value'] == 'true') ? 'true' : 'false').'" '.(($item['value'] == 'true') ? 'checked' : '').' id="'.$item['name'].'_input"/>
								<div class="input_desc">'.$item['desc'].'</div>
							</div>
						</div>
						';
		}elseif($item['type'] == "step"){
			$output .= '
						<div id="cte_id'.$item['name'].'" class="input_wrap input_true_wrap">
							<div class="input_label">
								<label for="'.$item['name'].'_input">'.$item['title'].'</label>
							</div>
							<div class="input_true">
								<input type="checkbox" name="'.$item['name'].'" value="'.$item['value'].'" '.(($item['value'] == 2) ? 'checked' : '').' id="'.$item['name'].'_input"/>
								<div class="input_desc">'.$item['desc'].'</div>
							</div>
						</div>
						';
		}elseif($item['type'] == "hr"){
			$output .= '
						<center><h2>'.$item['title'].'</h2></center>
						<hr>
						';
		}elseif($item['type'] == "cond"){
			if($item['state'] == "open"){
				$output .= '
							<script type="text/javascript">
								jQuery(document).ready(function($){
									if($("[name=\''.$item['cond'][0].'\']").val() == "'.$item['cond'][1].'"){
										$("#'.$item['name'].'").slideDown();
									}else{
										$("#'.$item['name'].'").slideUp();
									}

									$("[name=\''.$item['cond'][0].'\']").change(function(){
										clearFields("#'.$item['name'].'");

										if($(this).val() == "'.$item['cond'][1].'"){
											$("#'.$item['name'].'").slideDown();
										}else{
											$("#'.$item['name'].'").slideUp();
										}
									});
								});
							</script>
							<div id="'.$item['name'].'" class="cond_panel">
							';
			}elseif($item['state'] == "close"){
				$output .= '
							</div>
							';
			}
		}elseif($item['type'] == "gravity_forms" || $item['type'] == "pages"){
			$options = '';
			if($item['type'] == "gravity_forms"){
				$gravity_forms = $wpdb->get_results("SELECT * FROM `{$wpdb->prefix}rg_form`");
				foreach($gravity_forms as $form){
					$options .= '<option value="'.$form->id.'" '.(isset($item['value']) && $form->id == $item['value'] ? ' selected ' : '').'>'.$form->title.'</option>';
				}
			}elseif($item['type'] == "pages"){
				$pages = $wpdb->get_results("SELECT ID, post_title FROM `$wpdb->posts` WHERE post_type='page' AND `post_status`='publish'");
				foreach($pages as $page){
					$options .= '<option value="'.$page->ID.'" '.(isset($item['value']) && $page->ID == $item['value'] ? ' selected ' : '').'>'.$page->post_title.'</option>';
				}
			}
			$output .= '
						<div id="cte_id'.$item['name'].'" class="input_wrap input_select_wrap">
							<div class="input_label">
								<label for="'.$item['name'].'_input">'.$item['title'].'</label>
							</div>
							<div class="input_select">
								<select name="'.$item['name'].'" id="'.$item['name'].'_input">
									<option value=""></option>
									'.$options.'
								</select>
								<div class="input_desc">'.$item['desc'].'</div>
							</div>
						</div>
					';
		}

		return $output;
	}
	function show_fields($items){
		foreach($items as $field){
			echo show_field($field);
		}
	}
	function get_fields_values(){
		global $fields;

		$options = get_option("cte_settings");
		$options = unserialize($options);
		foreach($fields as $key => $field){
			//if the field exists
			if(!empty($options[$field['name']])){
				$fields[$key]['value'] = $options[$field['name']];
			}
		}
		return $fields;
	}
	function get_options(){
		$options = get_option("cte_settings");
		$options = unserialize($options);
		return $options;
	}

	add_action('init', 'update_fields');
	function update_fields(){
		if(!empty($_POST['cte_admin_page'])){
			global $fields;
			$vals = array();
			foreach($fields as $field){
				if(!empty($_POST[$field['name']])){
					$vals[$field['name']] = $_POST[$field['name']];
				}
			}

			$vals = serialize($vals);
			update_option("cte_settings", $vals);

			//redirect
			wp_redirect($_SERVER['REQUEST_URI']);
			exit;
		}
	}

	/*-------------------------------------------------------------------------------------*/
	/* Login Hooks and Filters
	/*-------------------------------------------------------------------------------------*/
	function email_login($username) {
		$user = get_user_by('email', $username);
		if(!empty($user->user_login))
			$username = $user->user_login;
		return $username;
	}
	add_action('wp_authenticate', 'email_login');
	function custom_login_fail( $username ) {
		$options = get_options();
		$login_page = $options['login_page'];
		$login_page = get_permalink($login_page);

		// if there's a valid referrer, and it's not the default log-in screen
		if ( !empty($login_page) && !strstr($login_page,'wp-login') && !strstr($login_page,'wp-admin') ) {
			if ( !strstr($login_page,'?login=failed') ) { // make sure we don’t append twice
				if(strpos($login_page, "?")){
					wp_redirect( $login_page . '&login=failed' );
				}else{
					wp_redirect( $login_page . '?login=failed' );
				}
			} else {
				wp_redirect( $login_page );
			}
			exit;
		}
	}
	add_action('wp_login_failed', 'custom_login_fail' ); // hook failed login
	function custom_login_empty(){
		$options = get_options();
		$login_page = $options['login_page'];
		$login_page = get_permalink($login_page);
		$user = get_current_user();

		if (strstr($login_page, get_home_url()) && $user == null ) { // mylogin is the name of the loginpage.
			if (!strstr($login_page,'?login=empty')) { // prevent appending twice
				if(strpos($login_page, "?")){
					wp_redirect( $login_page . '&login=empty' );
				}else{
					wp_redirect( $login_page . '?login=empty' );
				}
			} else {
				wp_redirect( $login_page );
			}
		}
	}
	add_action('authenticate', 'custom_login_empty');