<?php
	global $post;

	$parent = get_post_ancestors($post->ID);
	if(!empty($parent[0])){
		$parent = $parent[0];
	}else{
		$parent = -1;
	}

	$user_id = get_current_user_id();
	$items = array(
					array(
							'type' 		=> 'text',
							'name'		=> 'first_name',
							'title'		=> 'School Name',
							'tag'		=> 'our_school'
						),
					array(
							'type' 		=> 'text',
							'name'		=> 'city',
							'title'		=> 'City',
							'tag'		=> 'our_school'
						),
					array(
							'type' 		=> 'text',
							'name'		=> 'country',
							'title'		=> 'Country',
							'tag'		=> 'our_school'
						),
					array(
							'type' 		=> 'text',
							'name'		=> 'main_school_email_address',
							'title'		=> 'Email Address',
							'tag'		=> 'our_school'
						),
					array(
							'type'		=> 'line',
							'name'		=> '',
							'tag'		=> 'our_school'
						),
					array(
							'type' 		=> 'text',
							'name'		=> 'students_no',
							'title'		=> 'Number of students at School',
							'tag'		=> 'our_school'
						),
					array(
							'type' 		=> 'text',
							'name'		=> 'students_girls_no',
							'title'		=> 'How many girls?',
							'tag'		=> 'our_school'
						),
					array(
							'type' 		=> 'text',
							'name'		=> 'students_boys_no',
							'title'		=> 'How many boys?',
							'tag'		=> 'our_school'
						),
					array(
							'type'		=> 'line',
							'name'		=> '',
							'tag'		=> 'our_school'
						),
					array(
							'type' 		=> 'text',
							'name'		=> 'years_at_enterprise_challenge',
							'title'		=> 'Years participating in School Enterprise Challenge',
							'tag'		=> 'our_school'
						),
					array(
							'type'		=> 'line',
							'name'		=> '',
							'tag'		=> 'our_school'
						),
					array(
							'type' 		=> 'text',
							'name'		=> 'school_costs_per_year',
							'title'		=> 'Approximate school running costs per year',
							'tag'		=> 'our_school'
						),
					array(
							'type'		=> 'line',
							'name'		=> '',
							'tag'		=> 'our_school'
						),
					array(
							'type' 		=> 'text',
							'name'		=> 'info_about_school',
							'title'		=> 'Information about school:',
							'tag'		=> 'our_school'
						),
				);
	if(!empty($_POST['update_profile'])){
		ct_update_profile();
	}
	

	$user_data = get_user_meta($user_id);
	$tag = get_field('profile_form', $post->ID);
?>
<form method="post" id="dashboard_form">
	<div class="row">
		<div id='dashboard_left' class="columns small-3">
			<div id="profile_image">
				<input type="file" name="profile">
				<a href="">Change Picture</a>
			</div>
			<ul id='profile_nav'>
				<?php
					$args = array(
								'authors'      => '',
								'child_of'     => $parent,
								'date_format'  => get_option('date_format'),
								'depth'        => 0,
								'echo'         => 1,
								'exclude'      => '',
								'include'      => '',
								'link_after'   => '',
								'link_before'  => '',
								'post_type'    => 'page',
								'post_status'  => 'publish',
								'show_date'    => '',
								'sort_column'  => 'menu_order, post_title',
								'title_li'     => __(''), 
								'walker'       => ''
							);
					if($parent != -1){
						$pages = wp_list_pages($args);
					}
				?>
			</ul>
		</div>
		<div class='columns small-9'>
			<div id="resurces_content">
				<?php while ( have_posts() ) : the_post(); ?>
					<h1 class="dashboard_title">
						<a href=""><?php echo return_user_field('first_name'); ?></a>
					</h1>
					<input type='hidden' name="update_profile" value="Update">
					<?php
						foreach($items as $item){
							if($tag == $item['tag']){
								echo show_dashboard_field($item);
							}
						}
					?>
					<button>Update</button>
				<?php endwhile; // end of the loop. ?>
			</div>
		</div>
	</div>
</form>

<?php
	function show_dashboard_field($item){
		$output = '';
		if($item['type'] == "text"){
			$output .= '
					<div class="input_wrap">
						<label for="'.$item['name'].'_field">'.$item['title'].':</label>
						<input type="text" value="'. return_user_field($item['name']) .'" id="'.$item['name'].'_field" name="'.$item['name'].'">
					</div>';
		}elseif($item['type'] == 'line'){
			$output .= '<br>';
		}
		return $output;
	}
	function return_user_field($tag){
		global $user_data;
		if(!empty($user_data[$tag])){
			return $user_data[$tag][0];
		}
	}

	function ct_update_profile(){
		global $items;
		global $user_id;
		foreach($items as $item){
			if(!empty($_POST[$item['name']])){
				$meta_value = sanitize_text_field($_POST[$item['name']]);
				update_user_meta($user_id, $item['name'], $meta_value);
			}
		}

	}
?>