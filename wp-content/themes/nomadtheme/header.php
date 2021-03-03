<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package NomadTheme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header id="masthead" class="site-header">
		<div class="logo"><a href="/"><img src="<?php echo get_template_directory_uri();?>/assets/img//logo-black.svg" alt="Логотип"></a></div>
		<div class="main-menu">
			<nav class="destkop-menu">
				<ul>
					<li><a href="#">Путешествия</a></li>
					<li><a href="#">Рассказы</a></li>
					<li><a href="#">О компании</a></li>
				</ul>
			</nav>
			<a href="#" class="hamburger hamburger--slider">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
				</button></a>
		</div>
	</header>
	<div class="mobile-menu">
		<ul class="m-menu">
			<li><a href="">Путешествия</a></li>
			<li><a href="">Статьи</a></li>
			<li><a href="">О проекте</a></li>
			<li><a href="">О компании</a></li>
			<li><a href="">Контакты</a></li>
		</ul>
	</div>
<div id="content" class="site-content">