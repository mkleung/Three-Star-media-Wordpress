<?php
/**
 * Header template.
 *
 * @package Algonquin
 */
?>
<!doctype html>
<html lang="<?php language_attributes(); ?>">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php 
// checks if user is using wordpress lower than 5.2
if (function_exists('wp_body_open')) {
	wp_body_open();
}
?>

<div class="wrapper" id="home">

<header>
		<div class="header-content" id="headerContent">
			<div class="logo-title">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="three star media logo" class="logo animated bounceIn"/>
				<h1>Three Star Media</h1>
			</div>
			<nav id="mainNav">
				<span class="im im-menu" id="menuIcon"></span>
				<ul>
					<li class="active"><a href="#home">Home</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#services">Services</a></li>
					<li><a href="#contact">Contact</a></li>
					<li><a href="#team">Team</a></li>
				</ul>
			</nav>
		</div>
	</header>

