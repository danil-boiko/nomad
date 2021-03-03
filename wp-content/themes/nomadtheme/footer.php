<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package NomadTheme
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="footer-top">
			<div class="logo"><a href="/"><img src="<?php echo get_template_directory_uri();?>/assets/img/logo-white.svg" alt=""></a></div>
			<ul class="social">
				<li><a href=""><i class="fab fa-whatsapp"></i></a></li>
				<li><a href=""><i class="fab fa-vk"></i></a></li>
				<li><a href=""><i class="fab fa-instagram"></i></a></li>
			</ul>
		</div>
		<div class="footer-bottom">
			<nav class="footer-menu">
				<ul>
					<li><a href="#">Путешествия</a></li>
					<li><a href="#">Рассказы</a></li>
					<li><a href="#">О проекте</a></li>
					<li><a href="#">О компании</a></li>
					<li><a href="#">Контакты</a></li>
				</ul>
			</nav>
			<div class="copyright">© 2021 NOMAD</div>
		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
