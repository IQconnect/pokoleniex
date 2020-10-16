<?php

/**
 * Do not edit anything in this file unless you know what you're doing
 */

use Roots\Sage\Config;
use Roots\Sage\Container;

/**
 * Helper function for prettying up errors
 * @param string $message
 * @param string $subtitle
 * @param string $title
 */
$sage_error = function ($message, $subtitle = '', $title = '') {
    $title = $title ?: __('Sage &rsaquo; Error', 'sage');
    $footer = '<a href="https://roots.io/sage/docs/">roots.io/sage/docs/</a>';
    $message = "<h1>{$title}<br><small>{$subtitle}</small></h1><p>{$message}</p><p>{$footer}</p>";
    wp_die($message, $title);
};

/**
 * Ensure compatible version of PHP is used
 */
if (version_compare('7.1', phpversion(), '>=')) {
    $sage_error(__('You must be using PHP 7.1 or greater.', 'sage'), __('Invalid PHP version', 'sage'));
}

/**
 * Ensure compatible version of WordPress is used
 */
if (version_compare('4.7.0', get_bloginfo('version'), '>=')) {
    $sage_error(__('You must be using WordPress 4.7.0 or greater.', 'sage'), __('Invalid WordPress version', 'sage'));
}

/**
 * Ensure dependencies are loaded
 */
if (!class_exists('Roots\\Sage\\Container')) {
    if (!file_exists($composer = __DIR__ . '/../vendor/autoload.php')) {
        $sage_error(
            __('You must run <code>composer install</code> from the Sage directory.', 'sage'),
            __('Autoloader not found.', 'sage')
        );
    }
    require_once $composer;
}

/**
 * Sage required files
 *
 * The mapped array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 */
array_map(function ($file) use ($sage_error) {
    $file = "../app/{$file}.php";
    if (!locate_template($file, true, true)) {
        $sage_error(sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file), 'File not found');
    }
}, ['helpers', 'setup', 'filters', 'admin']);

/**
 * Here's what's happening with these hooks:
 * 1. WordPress initially detects theme in themes/sage/resources
 * 2. Upon activation, we tell WordPress that the theme is actually in themes/sage/resources/views
 * 3. When we call get_template_directory() or get_template_directory_uri(), we point it back to themes/sage/resources
 *
 * We do this so that the Template Hierarchy will look in themes/sage/resources/views for core WordPress themes
 * But functions.php, style.css, and index.php are all still located in themes/sage/resources
 *
 * This is not compatible with the WordPress Customizer theme preview prior to theme activation
 *
 * get_template_directory()   -> /srv/www/example.com/current/web/app/themes/sage/resources
 * get_stylesheet_directory() -> /srv/www/example.com/current/web/app/themes/sage/resources
 * locate_template()
 * ├── STYLESHEETPATH         -> /srv/www/example.com/current/web/app/themes/sage/resources/views
 * └── TEMPLATEPATH           -> /srv/www/example.com/current/web/app/themes/sage/resources
 */
array_map(
    'add_filter',
    ['theme_file_path', 'theme_file_uri', 'parent_theme_file_path', 'parent_theme_file_uri'],
    array_fill(0, 4, 'dirname')
);
Container::getInstance()
    ->bindIf('config', function () {
        return new Config([
            'assets' => require dirname(__DIR__) . '/config/assets.php',
            'theme' => require dirname(__DIR__) . '/config/theme.php',
            'view' => require dirname(__DIR__) . '/config/view.php',
        ]);
    }, true);


/**
 * ADD ACF OPTION PAGE
 */

if (function_exists('acf_add_options_page')) {

    acf_add_options_page('Ustawienia Strony');
}

/*=============================================
=            BREADCRUMBS			            =
=============================================*/
//  to include in functions.php
function the_breadcrumb()
{
    $sep = '';
    if (!is_front_page()) {

        // Start the breadcrumb with a link to your homepage
        echo '<ul class="breadcramps">';
        echo '<li class="breadcramps__item body">';
        echo '<a href="';
        echo get_option('home');
        echo '" class="breadcramps__elem body link">';
        echo 'Strona główna';
        echo '</a>';
        echo '</li>';

        // Check if the current page is a category, an archive or a single page. If so show the category or archive name.
        if (is_category()) {

            $cat = get_queried_object();

            if ($cat->category_parent == '0') {
                echo '<li class="breadcramps__item body">';
                echo $cat->name;
                echo '</li>';
            } else {
                $parent = get_category($cat->category_parent);
                echo '<li class="breadcramps__item body">';
                echo '<a href="';
                echo get_category_link($parent->term_id);
                echo '" class="breadcramps__elem body link">';
                echo $parent->name;
                echo '</a>';
                echo '</li>';
                echo '<li class="breadcramps__item body">';
                echo $cat->name;
                echo '</li>';
            }
            //print_r( get_queried_object());

        } elseif (is_archive() || is_single()) {
            if (is_single()) {
                if (get_post_type() == 'team') :
                    echo '<li class="breadcramps__item body">';
                    echo '<a href="';
                    echo get_permalink(277);
                    echo '" class="breadcramps__elem body link">';
                    echo get_post_type_object(get_post_type())->label;
                    echo '</a>';
                    echo '</li>';
                else :
                    echo '<li class="breadcramps__item body">';
                    echo '<a href="';
                    echo get_post_type_archive_link(get_post_type());
                    echo '" class="breadcramps__elem body link">';
                    echo get_post_type_object(get_post_type())->label;
                    echo '</a>';
                    echo '</li>';
                endif;
            } else {
                echo '<li class="breadcramps__item body">';
                echo get_post_type_object(get_post_type())->label;
                echo '</li>';
            }
        }

        // If the current page is a single post, show its title with the separator
        if (is_single()) {
            echo '<li class="breadcramps__item body">';
            the_title();
            echo '</li>';

            //print_r(get_post_type_object(get_post_type())->label);

        }

        // If the current page is a static page, show its title.
        if (is_page()) {
            $parent_id = get_page(get_the_ID())->post_parent;
            $parent = get_page($parent_id);

            if ($parent_id != 0) {
                echo '<li class="breadcramps__item body">';
                echo '<a href="';
                echo get_permalink($parent_id);
                echo '" class="breadcramps__elem body link">';
                echo $parent->post_title;
                echo '</a>';
                echo '</li>';
            }
            echo '<li class="breadcramps__item body">';
            echo the_title();
            echo '</li>';
            //print_r($parent);
        }

        // if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
        if (is_home()) {
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ($page_for_posts_id) {
                $post = get_page($page_for_posts_id);
                setup_postdata($post);
                echo '<li class="breadcramps__item body">';
                the_title();
                echo '</li>';
                rewind_posts();
            }
        }

        if (is_tag()) {
            echo '<li class="breadcramps__item body">';
            echo single_tag_title();
            echo '</li>';
        }
        echo '</ul>';

        if (is_post_type_archive('oferty')) {
            echo 'halo';
        }
    }
}
/*
* Credit: http://www.thatweblook.co.uk/blog/tutorials/tutorial-wordpress-breadcrumb-function/
*/


@ini_set('upload_max_size', '64M');
@ini_set('post_max_size', '64M');
@ini_set('max_execution_time', '300');

function get_option_field($var) {
    return get_field($var, 'option');
}


function image($id, $size, $class)
{
    return wp_get_attachment_image($id, $size, false, ['class' => $class]);
}

function option($key)
{
    return get_field($key, 'options');
}

// Our custom post type function




function my_acf_init()
{
    acf_update_setting('google_api_key', 'AIzaSyDqX_hqXzx0uZS2NcENrA2fkutTyXOHpMo');
}

add_action('acf/init', 'my_acf_init');

@ini_set('upload_max_size', '64M');
@ini_set('post_max_size', '64M');
@ini_set('max_execution_time', '300');

add_image_size('room', 400, 560, true);
add_image_size('food', 800, 400, true);


function boot_pagination( $args = array() ) {
	$defaults = array(
		'echo' => true,
		'query' => $GLOBALS['wp_query'],
		'show_all' => false,
		'prev_next' => true,
        'mid_size'  => 5,
		'prev_text' => __('Previous Page', 'sage'),
		'next_text' => __('Next Page', 'sage'),
	);

	$args = wp_parse_args( $args, $defaults );
	extract($args, EXTR_SKIP);

	// If there's only one page we sure don't need pagination
	if( $query->max_num_pages <= 1 ) {
		return;
	}

	$pagination = '';
	$links = array();

	$paged = max( 1, absint( $query->get( 'paged' ) ) );
	$max   = intval( $query->max_num_pages );

    //Descriptive aria-label for the <nav> to reflect its purpose.
    //single_post_title( $prefix, $display );
    $page_title = single_post_title( 'Page Navigation: ', false );

	if ( $show_all ) {
		$links = range(1, $max);
	} else {
		// Add some pages before the current page
		if ( $paged >= 3 ) {
			$links[] = $paged - 2;
			$links[] = $paged - 1;
		}
		// Add the current page
		if ( $paged >= 1 ) {
			$links[] = $paged;
		}
		// Add some pages after the current page
		if ( ( $paged + 2 ) <= $max ) {
			$links[] = $paged + 1;
			$links[] = $paged + 2;
		}
	}

    // Use a wrapping <nav> element to identify it as a navigation section to screen readers and other assistive technologies.
	$pagination .= "\n" . '<nav aria-label="' . $page_title . '"><ul class="pagination justify-content-end">' . "\n";

	// Previous Post Link
	if ( $prev_next && get_previous_posts_link() ) {
		$pagination .= sprintf( '<li class="page-item prev"><a class="page-link" href="%s"><span aria-hidden="true">&laquo;</span><span class="sr-only">' . $prev_text . '</span></a></li>' . "\n", get_previous_posts_page_link() );
	} else {
        $pagination .= '<li class="page-item prev disabled"><span class="page-link">&laquo;</span></li>';
    }

	// Link to first page, plus ellipses if necessary
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' active' : '';
		$pagination .= sprintf( '<li class="page-item%s"><a class="page-link" href="%s">%s</a></li>', $class, esc_url( get_pagenum_link( 1 ) ), '1' );
		$pagination .= "\n";
		if ( ! in_array( 2, $links ) ) {
			$pagination .= '<li class="page-item disabled"><span class="page-link">' . __( '&hellip;' ) . '</span></li>';
		}
		$pagination .= "\n";
	}

	// Link to current page, plus $mid_size pages in either direction if necessary
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' active' : '';
		$pagination .= sprintf( '<li class="page-item%s"><a class="page-link" href="%s">%s</a></li>', $class, esc_url( get_pagenum_link( $link ) ), $link );
		$pagination .= "\n";
	}

	// Link to last page, plus ellipses if necessary
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) ) {
			$pagination .= '<li class="page-item ellipsis disabled"><span class="page-link">' . __( '&hellip;' ) . '</span></li>';
			$pagination .= "\n";
		}
		$class = $paged == $max ? ' class="page-item active"' : '';
		$pagination .= sprintf( '<li%s><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
		$pagination .= "\n";
	}

	// Next Post Link
	if ( $prev_next && get_next_posts_link() && $paged <= $max ) {
		$pagination .= sprintf( '<li class="page-item next"><a class="page-link" href="%s"><span aria-hidden="true">&raquo;</span> <span class="sr-only">' . $next_text . '</span></a></li>' . "\n", get_next_posts_page_link() );
	} else {
        $pagination .= '<li class="page-item next disabled"><span class="page-link">&raquo;</span></li>';
    }

	$pagination .= "</ul></nav><!-- /.pagination -->\n";

	if ( $echo ) {
		echo $pagination;
	} else {
		return $pagination;
	}
}

function remove_page_from_query_string($query_string)
{
    if ($query_string['name'] == 'page' && isset($query_string['page'])) {
        unset($query_string['name']);
        $query_string['paged'] = $query_string['page'];
    }
    return $query_string;
}
add_filter('request', 'remove_page_from_query_string');


function createProjectPostType() {
    register_post_type('people',
        array(
            'menu_icon' => 'dashicons-groups',
            'labels' => array(
                'name' => esc_attr__('Znane osoby'),
                'singular_name' => esc_attr__('Znana osoba'),
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'osoba'),
            'show_in_rest' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'revisions'),
        )
    );
}

add_action('init', 'createProjectPostType');
