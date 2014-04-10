<?php
	global $post;
	global $options;

	$theme_url = get_template_directory_uri();

	$steps_nr = 3;
	$progress_nr = 0;
	$steps = array();

	for($i=1; $i<=$steps_nr; $i++){
		$step = get_user_meta(get_current_user_id(), "step_".$i);
		if(empty($step)){
			update_user_meta(get_current_user_id(), "step_".$i, 0);
		}

		$step = get_user_meta(get_current_user_id(), "step_".$i);
		$steps[$i] = $step[0];

		if($step[0] == 2)
			$progress_nr ++;
	}
	$progress = $progress_nr * 100 / $steps_nr;

	$step_no = get_field('step_no', $post->ID);

	$step_1_link = $options['dashboard_step1_page'];
	$step_1_link = get_permalink($step_1_link);

?>
<div id="steps_content" class="row">
	<div id='steps_left' class="columns small-8">
		<?php
			if($step_no > 0){
				if($steps[$step_no] == 0 || $steps[$step_no] == 1){
					if(!empty($step_no) && !empty($options['dashboard_step'.$step_no])){
						$form_id = $options['dashboard_step'.$step_no];
						echo do_shortcode("[gravityform id=".$form_id." title=true description=false ajax=true tabindex=49]");
					}
				}
				if($steps[$step_no] == 0){
					while(have_posts()){
						the_post();
						the_content();
					}
				}elseif($steps[$step_no] == 1){
					echo $options['step_under_review_message'];
				}elseif($steps[$step_no] == 2 && $step_no == 1){
					?>
						<h1 class="dashboard_title thin">FILES UPLOADED</h1>
						<h1 class="dashboard_title"><a href=''>Step 1: <?php echo $options['dashboard_step1_title']; ?></a></h1>
						<div class="row">
							<div class="columns small-7">
								<img src="<?php echo $theme_url; ?>/img/doc.png">&nbsp;&nbsp;
								<?php
									$document = get_user_meta(get_current_user_id(), 'step_1_document');
								?>
								<a href='<?php echo $document[0]; ?>' target='_blank'><?php echo basename($document[0]); ?></a>
							</div>
							<div class="columns small-5">
								<?php
									$document_date = get_user_meta(get_current_user_id(), 'step_1_document_date');
									echo $document_date[0];
								?>
							</div>
						</div>
						<br>
						<div class="note">
							Please wait for our team to approve your upload, and enable the next step!
						</div>
					<?php
				}
			}else{
				while(have_posts()){
					the_post();
					the_content();
				}
			}
			
		?>
	</div>
	<div id="steps_right" class="columns small-4">
		<h1 id="progress">PROGRESS REPORT <a id="uploads" href="<?php echo $step_1_link; ?>">View Uploads</a></h1>
		<div id="progress_bar">
			<div class="text"><?php echo ceil($progress); ?>%</div>
			<div class="completed" style="width: <?php echo $progress; ?>%;"></div>
		</div>
		<ul id="steps">
			<?php
				$sw_on = false;
				$sw_step_open = true;
				for($i=1; $i<=$steps_nr; $i++){
			?>
				<li class='<?php echo (!empty($steps[$i]) && $steps[$i] == 2) ? ' done ' : ''; ?> <?php echo ($sw_on) ? ' on ' : ''; ?>'>
					<?php
						echo "<span class='tag'>".$i."</span>";

						echo "<span class='title'>";
							if($steps[$i] == 0 || $steps[$i] == 1){
								$sw_on = true;
							}
							if($sw_on && $sw_step_open){
								$sw_step_open = false;

								$page_id = (isset($options['dashboard_step'.$i.'_page'])) ? $options['dashboard_step'.$i.'_page'] : '';
								$page_link = get_permalink($page_id);
								echo "<a href='".$page_link."'>". $options['dashboard_step'.$i.'_title'] ."</a>";
							}else{
								echo $options['dashboard_step'.$i.'_title'];
							}
						echo "</span>";
					?>
				</li>
			<?php
				}
			?>
		</ul>
	</div>
</div>

<style>
	#page_content{
		padding: 0px !important;
	}
</style>