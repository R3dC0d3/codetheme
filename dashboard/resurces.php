<?php
	global $post;

	$parent = get_post_ancestors($post->ID);
	if(!empty($parent[0])){
		$parent = $parent[0];
	}else{
		$parent = -1;
	}
?>
<div class="row">
	<div id="dashboard_left" class="columns small-3">
		<ul id='resurces_nav'>
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
					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h1>
				<?php the_content(); ?>
			<?php endwhile; // end of the loop. ?>
		</div>
	</div>
</div>