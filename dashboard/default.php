<div id="steps_content" class="row">
	<div id='steps_left' class="columns small-8">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	</div>
	<div id="steps_right" class="columns small-4">
		<h1 id="progress">PROGRESS REPORT <a id="uploads" href="">View Uploads</a></h1>
		<div id="progress_bar">
			<div class="text">20%</div>
			<div class="completed" style="width: 20%;"></div>
		</div>
	</div>
</div>

<style>
	#page_content{
		padding: 0px !important;
	}
</style>