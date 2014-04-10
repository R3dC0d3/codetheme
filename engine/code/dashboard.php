<?php
	/**
		*make sure that a normal user is not able to access any kind of admin panel information
	*/
	add_action('admin_init', 'check_if_can_see_admin');
	function check_if_can_see_admin(){
		if(current_user_can('subscriber')){
			wp_redirect(site_url());
		}
	}
	add_action('init', 'check_if_can_see_admin_bar');
	function check_if_can_see_admin_bar(){
		if(current_user_can('subscriber')){
			show_admin_bar(false);
		}
	}

	/*-------------------------------------------------------------------------------------*/
	/* Customize the Admin Panel Profile & User Edit Page
	/*-------------------------------------------------------------------------------------*/
	add_action('show_user_profile', 'ct_profile_page');
	add_action('edit_user_profile', 'ct_profile_page');
	function ct_profile_page($user) {
		global $theme_uri;
		global $field_tabs;
		global $user_id;

		$options = get_options();
		$user_details_form = $options['admin_panel_form1'];
		$steps_form = $options['admin_panel_form2'];

		wp_enqueue_style("ct-admin-fields-style", $theme_uri."/css/admin_fields.css");
		wp_enqueue_style("ct-admin-user-style", $theme_uri."/css/admin_user.css");
		wp_enqueue_script("ct-admin-fields-script", $theme_uri."/js/admin_fields.js", array('jquery'));
		wp_enqueue_script("ct-admin-user-script", $theme_uri."/js/admin_user.js", array('jquery'));

	?>
			<div class='tabs_list' for='tabs_list1'>
				<span class='active' for='tab1'>User &amp; School Info</span>
				<span for='tab2'>Steps</span>
			</div>
			<div class='tabs_cont' is='tabs_list1'>
				<div is="tab1">
					<?php echo do_shortcode('[gravityform id='.$user_details_form.' title=false description=false ajax=true tabindex=49]'); ?>
				</div>
				<div is="tab2">
					<?php echo do_shortcode('[gravityform id='.$steps_form.' title=false description=false ajax=true tabindex=49]'); ?>
				</div>
			</div>
		<?php
	}
	add_action('personal_options_update', 'ct_save_profile_page');
	add_action('edit_user_profile_update', 'ct_save_profile_page');
	function ct_save_profile_page($user_id) {
		global $field_tabs;
		$usermeta = array();
		$i = 0;
		foreach($field_tabs as $fields){
			foreach($fields as $field){
				if(!in_array($field['type'], array('hr', 'cond'))){
					$usermeta[$i]['type'] = $field['type'];
					$usermeta[$i]['name'] = $field['name'];
					$usermeta[$i]['value'] = $_POST[$field['name']];
					$i++;
				}
			}
		}
		if(!current_user_can('edit_user', $user_id))
			return false;

	 	foreach($usermeta as $meta){
	 		$val = $meta['value'];

	 		if($meta['type'] == 'true'){
				$val = !empty($meta['value']) ? 'true' : 'false';
			}

			update_user_meta($user_id, $meta['name'], $val);
		}
	}
	function ct_profile_page_get_fields_values($user_id){
		global $field_tabs;
		foreach($field_tabs as $field_tab => $fields){
			foreach($fields as $key => $field){
				if(!in_array($field['type'], array('hr', 'cond'))){
					$val = get_user_meta($user_id, $field['name']);
					if(isset($val[0])){
						$val = $val[0];
						$field_tabs[$field_tab][$key]['value'] = $val;
					}
				}
			}
		}
		return $field_tabs;
	}