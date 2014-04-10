			<?php
				global $options;
				$registerModalForm = $options['register_form'];
			?>
			<div id="registerModalForm" class="reveal-modal" data-reveal>
				<?php echo do_shortcode("[gravityform id=".$registerModalForm." title=true description=false ajax=true tabindex=49]"); ?>
			</div>

			<div id="footer">
			</div><!-- #footer -->

		</div><!-- #page -->
		<?php wp_footer(); ?>
	</body>
</html>