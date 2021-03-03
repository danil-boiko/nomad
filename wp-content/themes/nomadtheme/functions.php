<?php
/**
 * NomadTheme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package NomadTheme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'nomadtheme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function nomadtheme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on NomadTheme, use a find and replace
		 * to change 'nomadtheme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'nomadtheme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'nomadtheme' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'nomadtheme_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'nomadtheme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nomadtheme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'nomadtheme_content_width', 640 );
}
add_action( 'after_setup_theme', 'nomadtheme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nomadtheme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'nomadtheme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'nomadtheme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'nomadtheme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function nomadtheme_scripts() {
	wp_enqueue_style( 'nomadtheme-bootstrap-reboot', get_template_directory_uri() . '/assets/libs/bootstrap-reboot/bootstrap-reboot.min.css');
	
	wp_enqueue_style( 'nomadtheme-fontawesome', get_template_directory_uri() . '/assets/libs/fontawesome/css/fontawesome.min.css');

	wp_enqueue_style( 'nomadtheme-hamburger', get_template_directory_uri() . '/assets/libs/hamburgers/hamburgers.min.css');
	
	wp_enqueue_style( 'nomadtheme-style', get_stylesheet_uri(), array(), _S_VERSION );

	wp_style_add_data( 'nomadtheme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'nomadtheme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nomadtheme_scripts' );

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

// хук для регистрации
add_action( 'init', 'create_taxonomy' );
function create_taxonomy(){

	// список параметров: wp-kama.ru/function/get_taxonomy_labels
	register_taxonomy( 'trip_type', [ 'trip' ], [
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Тип путешествия',
			'singular_name'     => 'Тип путешествия',
			'search_items'      => 'Поиск по типу путешествия',
			'all_items'         => 'Все типы путешествий',
			'view_item '        => 'Просмотреть тип путешествия',
			'parent_item'       => 'Родительский тип путешествия',
			'parent_item_colon' => 'Родительский тип путешествия:',
			'edit_item'         => 'Редактировать тип путешествия',
			'update_item'       => 'Обновить тип путешествия',
			'add_new_item'      => 'Добавить новый тип путешествия',
			'new_item_name'     => 'Новое имя типа путешествия',
			'menu_name'         => 'Тип путешествия',
		],
		'description'           => '', // описание таксономии
		'public'                => true,
		// 'publicly_queryable'    => null, // равен аргументу public
		// 'show_in_nav_menus'     => true, // равен аргументу public
		// 'show_ui'               => true, // равен аргументу public
		// 'show_in_menu'          => true, // равен аргументу show_ui
		// 'show_tagcloud'         => true, // равен аргументу show_ui
		// 'show_in_quick_edit'    => null, // равен аргументу show_ui
		'hierarchical'          => true,

		'rewrite'               => array('slug' => 'trip', 'with_front' => false),
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'          => null, // добавить в REST API
		'rest_base'             => null, // $taxonomy
		// '_builtin'              => false,
		//'update_count_callback' => '_update_post_term_count',
	] );
}

add_action( 'init', 'register_post_types' );
function register_post_types(){
	register_post_type( 'trip', [
		'label'  => null,
		'labels' => [
			'name'               => 'Путешествия', // основное название для типа записи
			'singular_name'      => 'Путешествие', // название для одной записи этого типа
			'add_new'            => 'Добавить Путешествие', // для добавления новой записи
			'add_new_item'       => 'Добавление Путешествия', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование Путешествия', // для редактирования типа записи
			'new_item'           => 'Новое Путешествие', // текст новой записи
			'view_item'          => 'Смотреть Путешествия', // для просмотра записи этого типа.
			'search_items'       => 'Искать Путешествия', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Путешествия', // название меню
		],
		'description'         => '',
		'public'              => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'        => null, // показывать ли в меню адмнки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => null,
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor','author','thumbnail','excerpt' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => ['trip_type'],
		'has_archive'         => trip,
		'rewrite'             => array('slug' => 'trip/%trip_type%', 'with_front' => false),
		'query_var'           => true,
	] );	
}

add_filter( 'post_type_link', 'trip_permalink', 1, 2 );
function trip_permalink($permalink, $post){
	//Выходим если это не тип записи trip_type
	if( strpos($permalink, '%trip_type%') === false)
		return $permalink;

	//Получаем элементы таксономии
	$terms = get_the_terms($post, 'trip_type');
	//Если есть элемент, то заменяем ярлык
	if( ! is_wp_error($terms) && !empty($terms) && is_object($terms[0]) )
		$term_slug = array_pop($terms)->slug;
	//Если такого элмента нет
	else
		$term_slug = 'no-trip_type';

	return str_replace('%trip_type%', $term_slug, $permalink);

}

