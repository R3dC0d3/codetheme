<?php
	$options = get_options();
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width">
		<title><?php wp_title( ' ', true, 'right' ); ?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<input type="hidden" id='bsu' value="<?php echo site_url(); ?>">
		<input type="hidden" id='cpage' value="<?php echo site_url($_SERVER['REQUEST_URI']); ?>">
		<div id="page">
			<div id="social_bar">
				<ul>
					<li><a href="<?php echo $options['facebook_link']; ?>" class="social facebook" target="_blank"></a></li>
					<li><a href="<?php echo $options['twitter_link']; ?>" class="social twitter" target="_blank"></a></li>
					<li><a href="mailto:<?php echo $options['email_address']; ?>" class="social mail" target="_blank"></a></li>
					<li><a href="<?php echo $options['social_print']; ?>" class="social print" target="_blank"></a></li>
					<li><a href="<?php echo $options['social_plus']; ?>" class="social plus" target="_blank"></a></li>
				</ul>
			</div>