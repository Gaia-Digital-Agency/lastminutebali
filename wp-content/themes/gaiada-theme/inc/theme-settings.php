<?php
/**
 * Plugin Name: Theme Settings
 */

if ( ! defined( 'ABSPATH' ) )
	exit;

class Gaia_Templates {

	private static $page_templates = [];

	public static function init() {

		self::scan_pages();

		add_filter( 'theme_page_templates', [ __CLASS__, 'register_pages' ] );
		add_filter( 'template_include', [ __CLASS__, 'load_templates' ] );
		add_action( 'save_post_page', [ __CLASS__, 'force_save' ], 20, 2 );
		add_filter( 'wp_get_theme', [ __CLASS__, 'inject_cache' ] );
	}

	/* ---------------------------------------------------
	 * PAGE TEMPLATE ( /pages/ )
	 * --------------------------------------------------- */

	private static function scan_pages() {

		$base = get_template_directory() . '/pages';

		if ( ! is_dir( $base ) )
			return;

		$iterator = new RecursiveIteratorIterator(
			new RecursiveDirectoryIterator(
				$base,
				RecursiveDirectoryIterator::SKIP_DOTS
			)
		);

		foreach ( $iterator as $file ) {

			if ( $file->getExtension() !== 'php' )
				continue;

			$headers = get_file_data(
				$file->getPathname(),
				[ 'name' => 'Template Name' ]
			);

			if ( empty( $headers['name'] ) )
				continue;

			$relative = str_replace(
				trailingslashit( get_template_directory() ),
				'',
				$file->getPathname()
			);

			self::$page_templates[ $relative ] = $headers['name'];
		}
	}

	private static function enqueue_assets( $type, $post_type ) {

		$base_path = get_template_directory() . "/{$type}/{$post_type}";
		$base_uri = get_template_directory_uri() . "/{$type}/{$post_type}";

		// MAIN STYLE
		if ( file_exists( "{$base_path}/style.css" ) ) {

			wp_enqueue_style(
				"{$type}-{$post_type}-style",
				"{$base_uri}/style.css",
				[],
				filemtime( "{$base_path}/style.css" )
			);
		}

		// MAIN SCRIPT
		if ( file_exists( "{$base_path}/script.js" ) ) {

			wp_enqueue_script(
				"{$type}-{$post_type}-script",
				"{$base_uri}/script.js",
				[],
				filemtime( "{$base_path}/script.js" ),
				true
			);
		}
	}

	public static function register_pages( $templates ) {
		return array_merge( $templates, self::$page_templates );
	}

	public static function force_save( $post_id, $post ) {

		if ( isset( $_POST['page_template'] ) ) {

			update_post_meta(
				$post_id,
				'_wp_page_template',
				sanitize_text_field( $_POST['page_template'] )
			);
		}
	}

	/* ---------------------------------------------------
	 * MAIN TEMPLATE LOADER
	 * --------------------------------------------------- */

	public static function load_templates( $template ) {

		// PAGE TEMPLATE
		if ( is_page() ) {

			$tpl = get_post_meta( get_the_ID(), '_wp_page_template', true );

			if ( isset( self::$page_templates[ $tpl ] ) ) {

				$file = get_template_directory() . '/' . $tpl;

				if ( file_exists( $file ) ) {
					return $file;
				}
			}
		}

		// ARCHIVE TEMPLATE
		if ( is_post_type_archive() ) {

			$post_type = get_query_var( 'post_type' );

			$file = get_template_directory() . "/archive/{$post_type}/template.php";

			if ( file_exists( $file ) ) {

				add_action( 'wp_enqueue_scripts', function () use ($post_type) {
					self::enqueue_assets( 'archive', $post_type );
				} );

				return $file;
			}
		}


		// SINGLE TEMPLATE
		if ( is_singular() ) {

			$post_type = get_post_type();

			$file = get_template_directory() . "/single/{$post_type}/template.php";

			if ( file_exists( $file ) ) {

				add_action( 'wp_enqueue_scripts', function () use ($post_type) {
					self::enqueue_assets( 'single', $post_type );
				} );

				return $file;
			}
		}

		return $template;
	}

	/* ---------------------------------------------------
	 * CACHE INJECT
	 * --------------------------------------------------- */

	public static function inject_cache( $theme ) {

		$cache = $theme->get_page_templates();

		foreach ( self::$page_templates as $k => $v ) {
			$cache[ $k ] = $v;
		}

		$theme->cache_add( 'page_templates', $cache );

		return $theme;
	}
}

Gaia_Templates::init();

// Auto load CSS and JS
add_action( 'get_template_part', function ( $slug, $name, $args ) {
	$base_path = get_template_directory() . '/' . $slug;
	$base_uri = get_template_directory_uri() . '/' . $slug;
	$folder_path = dirname( $base_path );
	$folder_uri = dirname( $base_uri );

	// CSS
	if ( file_exists( $folder_path . '/style.css' ) ) {
		wp_enqueue_style(
			basename( $folder_path ) . '-style',
			$folder_uri . '/style.css',
			[],
			null
		);
	}

	// JS
	if ( file_exists( $folder_path . '/script.js' ) ) {
		wp_enqueue_script(
			basename( $folder_path ) . '-script',
			$folder_uri . '/script.js',
			[],
			null,
			true
		);
	}

}, 10, 3 );

// Disblae Gutenberg
add_filter( 'use_block_editor_for_post', '__return_false', 1000 );
add_filter( 'use_block_editor_for_post_type', '__return_false', 1000 );
// Disable widgets block editor
add_action( 'after_setup_theme', function () {
	remove_theme_support( 'widgets-block-editor' );
}, 1000 );
// Support WooCommerce
add_theme_support( 'woocommerce' );
// Enable Featured Images
add_theme_support( 'post-thumbnails' );
// Enable Title Tag
add_theme_support( 'title-tag' );
// Save ACF JSON into /acf-json folder inside theme
add_filter( 'acf/settings/save_json', function () {
	return get_stylesheet_directory() . '/acf-json';
} );
// Load ACF JSON from theme folder
add_filter( 'acf/settings/load_json', function ( $paths ) {
	unset( $paths[0] );
	$paths[] = get_stylesheet_directory() . '/acf-json';
	return $paths;
} );