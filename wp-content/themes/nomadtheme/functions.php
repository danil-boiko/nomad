<?php
/**
 * NomadTheme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package NomadTheme
 */

require get_template_directory() . '/inc/crb-options.php'; //подключаем carbon fields

require get_template_directory() . '/inc/theme-options.php'; //подключаем настройку темы

require get_template_directory() . '/inc/nomad-widgets.php'; //подключаем настройку виджетов

require get_template_directory() . '/inc/nomadtheme-style.php'; //подключаем стили

require get_template_directory() . '/inc/nomadtheme-scripts.php'; //подключаем скрипты


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

require get_template_directory() . '/inc/nomad-post-and-tax.php'; //подключаем кастомный посты и таксономии