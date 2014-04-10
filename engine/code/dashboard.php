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
	
	$fields_user_info = array(
								array(//address
										'type'		=> 'hr',
										'name'		=> '',
										'title'		=> 'Address',
									),
									array(//postal_address
											'type'		=> 'text',
											'name'		=> 'postal_address',
											'title'		=> 'Postal Address',
											'desc'		=> ''
										),
									array(//city
											'type'		=> 'text',
											'name'		=> 'city',
											'title'		=> 'City',
											'desc'		=> ''
										),
									array(//country
											'type'		=> 'text',
											'name'		=> 'country',
											'title'		=> 'Country',
											'desc'		=> ''
										),
								array(//teacher
										'type'		=> 'hr',
										'name'		=> '',
										'title'		=> 'Teacher',
									),
									array(//teacher_name
											'type'		=> 'text',
											'name'		=> 'teacher_name',
											'title'		=> 'Teacher\'s Name',
											'desc'		=> ''
										),
									array(//teacher_name
											'type'		=> 'text',
											'name'		=> 'job_title',
											'title'		=> 'Job Title',
											'desc'		=> ''
										),
								array(//teacher
										'type'		=> 'hr',
										'name'		=> '',
										'title'		=> 'Info',
									),
									array(//specify
											'type'		=> 'text',
											'name'		=> 'specify',
											'title'		=> 'Specify',
											'desc'		=> ''
										),
									array(//tel_no
											'type'		=> 'text',
											'name'		=> 'tel_no',
											'title'		=> 'Tel No.',
											'desc'		=> ''
										)
								);
	$fields_step_1 = array(
							array(//step1
										'type'		=> 'hr',
										'name'		=> '',
										'title'		=> 'Step 1',
									),
									array(//step_1
											'type'		=> 'select',
											'options'	=> array('_0'=>'---', '_1'=>'Waiting for review', '_2'=>'Completed'),
											'name'		=> 'step_1',
											'title'		=> 'Step 1',
											'desc'		=> '',
											'value'		=> ''
										),
									array(//step_1_document
											'type'		=> 'text',
											'name'		=> 'step_1_document',
											'title'		=> 'Step 1 Document',
											'desc'		=> ''
										),
									array(//step_1_document_date
											'type'		=> 'text',
											'name'		=> 'step_1_document_date',
											'title'		=> 'Step 1 Document Date',
											'desc'		=> ''
										),
							);
	$fields_step_2 = array(
							array(//step2
										'type'		=> 'hr',
										'name'		=> '',
										'title'		=> 'Step 2',
									),
							);
	$fields_step_3 = array(
							array(//step3
										'type'		=> 'hr',
										'name'		=> '',
										'title'		=> 'Step 3',
									),
							);
	$field_tabs = array(
							'fields_user_info' => $fields_user_info,
							'fields_step_1' => $fields_step_1,
							'fields_step_2' => $fields_step_2,
							'fields_step_3' => $fields_step_3
							);
	
	add_action('show_user_profile', 'ct_profile_page');
	add_action('edit_user_profile', 'ct_profile_page');
	function ct_profile_page($user) {
		global $theme_uri;
		global $field_tabs;
		global $user_id;

		$field_tabs = ct_profile_page_get_fields_values($user_id);

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
					<?php show_fields($field_tabs['fields_user_info']); ?>
				</div>
				<div is="tab2">

					<div class='tabs_list' for='tabs_list2'>
						<span class='active' for='tab1'>Step1</span>
						<span for="tab2">Step 2</span>
						<span for="tab3">Step 3</span>
					</div>
					<div  class='tabs_cont' is='tabs_list2'>
						<div is="tab1">
							<?php show_fields($field_tabs['fields_step_1']); ?>
						</div>
						<div is="tab2">
							<?php show_fields($field_tabs['fields_step_2']); ?>
						</div>
						<div is="tab3">
							<?php show_fields($field_tabs['fields_step_3']); ?>
						</div>
					</div>

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