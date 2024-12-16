<?php
@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

require_once('includes/scripts-styles.php');

if ( ! function_exists('custom_theme_features') ) {

// Register Theme Features
function custom_theme_features()  {

	// Add theme support for Post Formats
	add_theme_support( 'post-formats', array( 'image', 'video', 'audio' ) );

	// Add theme support for Featured Images
	add_theme_support( 'post-thumbnails' );

	// Add theme support for Custom Background
	$background_args = array(
		'default-color'          => 'ffffff',
		'default-image'          => '',
		'default-repeat'         => '',
		'default-position-x'     => '',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-background', $background_args );

	// Add theme support for HTML5 Semantic Markup
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
}
add_action( 'after_setup_theme', 'custom_theme_features' );

}
define('THEMEROOT', get_stylesheet_directory_uri());
add_theme_support( 'menus' );






// function add_active_class_to_menu_item($classes, $item, $args, $depth) {
//     // Check if the current item corresponds to the displayed page
//     if (in_array('current-menu-item', $classes)) {
//         // Add your custom active class name here
//         $classes[] = 'active-menu-item';
//     }

//     return $classes;
// }
// add_filter('nav_menu_css_class', 'add_active_class_to_menu_item', 10, 4);


// Register Custom Post Type Products
function create_products_post_type() {
    $labels = array(
        'name'                  => 'Products',
        'singular_name'         => 'Product',
        'menu_name'             => 'Products',
        'name_admin_bar'        => 'Product',
        'archives'              => 'Product Archives',
        'attributes'            => 'Product Attributes',
        'parent_item_colon'     => 'Parent Product:',
        'all_items'             => 'All Products',
        'add_new_item'          => 'Add New Product',
        'add_new'               => 'Add New',
        'new_item'              => 'New Product',
        'edit_item'             => 'Edit Product',
        'update_item'           => 'Update Product',
        'view_item'             => 'View Product',
        'view_items'            => 'View Products',
        'search_items'          => 'Search Product',
        'not_found'             => 'Not found',
        'not_found_in_trash'    => 'Not found in Trash',
        'featured_image'        => 'Featured Image',
        'set_featured_image'    => 'Set featured image',
        'remove_featured_image' => 'Remove featured image',
        'use_featured_image'    => 'Use as featured image',
        'insert_into_item'      => 'Insert into product',
        'uploaded_to_this_item' => 'Uploaded to this product',
        'items_list'            => 'Products list',
        'items_list_navigation' => 'Products list navigation',
        'filter_items_list'     => 'Filter products list',
    );
    $args = array(
        'label'                 => 'Product',
        'description'           => 'Product Description',
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,        
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
		'menu_icon'				=> 'dashicons-products',
    );
    register_post_type( 'product', $args );
}
add_action( 'init', 'create_products_post_type', 0 );



//Disable Emojis
function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );  
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );  
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'disable_emojis' );


// function custom_favicon() {
//     echo '<link rel="shortcut icon" type="image/x-icon"' . site_url('/favicon.ico') . '" />' . "\n";
// }
// add_action('wp_head', 'custom_favicon');
// add_action('admin_head', 'custom_favicon');


function ajax_search_products() {
    $search_query = isset($_GET['query']) ? sanitize_text_field($_GET['query']) : '';

    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 10,
        's' => $search_query,
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            $PRODUCT_DISPLAY_IMAGE = get_field('product_display_image');
            $PRODUCT_NAME = get_field('product_name');
            $PRODUCT_PRICE = get_field('product_price');
            ?>
            <div>
                <article>
                    <a href='<?php the_permalink(); ?>'>
                        <img src='<?= $PRODUCT_DISPLAY_IMAGE ?>' alt='.'>
                    </a>
                    <div>
                        <h2><?= $PRODUCT_NAME; ?></h2>
                        <span>C$ <?= $PRODUCT_PRICE; ?></span>
                    </div>
                </article>
            </div>
            <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo '<h2>' . __('No Products Found') . '</h2>';
    endif;

    wp_die();
}

add_action('wp_ajax_search_products', 'ajax_search_products');
add_action('wp_ajax_nopriv_search_products', 'ajax_search_products');
