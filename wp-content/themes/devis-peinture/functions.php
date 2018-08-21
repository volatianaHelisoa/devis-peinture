<?php 

register_nav_menus(
        array(
                'primary' => __( 'main-menu' )
        )
);

add_theme_support('post-thumbnails');
add_image_size('blog-liste', 370, 235, true);
add_image_size('blog-detail', 747, 331, true);
add_image_size('mentions', 370, 422, true);
// require_once  get_template_directory() . '/inc/rewrite.php';
// require_once  get_template_directory() . '/inc/blog.class.php';
// require_once  get_template_directory() . '/inc/widgets/ArticleWidget.php' ;
// require_once  get_template_directory() . '/inc/temoignage.class.php' ;

require_once  get_template_directory() . '/inc/rewrite.php';
require_once  get_template_directory() . '/inc/blog.class.php';
require_once  get_template_directory() . '/inc/widgets/ArticleWidget.php' ;
require_once  get_template_directory() . '/inc/temoignage.class.php' ;

remove_action("wp_head", "wp_generator");
add_filter('login_errors',create_function('$a', "return null;"));
define('DISALLOW_FILE_EDIT',true);

function load_custom_post_type() {

	$labels = array(
		'name'                => _x( 'Temoignage', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Temoignage', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Temoignage', 'text_domain' ),
		'all_items'           => __( 'Tous les témoignages', 'text_domain' ),
		'view_item'           => __( 'Voir', 'text_domain' ),
		'add_new_item'        => __( 'Ajouter nouveau', 'text_domain' ),
		'add_new'             => __( 'Ajouter nouveau', 'text_domain' ),
		'edit_item'           => __( 'Modifier', 'text_domain' ),
		'update_item'         => __( 'Mettre a jour', 'text_domain' ),
		'search_items'        => __( 'Rechercher', 'text_domain' ),
		'not_found'           => __( 'Aucun temoignage', 'text_domain' ),
		'not_found_in_trash'  => __( 'Aucun temoignage', 'text_domain' ),
	);
	
	$args = array(
		'label'               => __( 'Temoignage', 'text_domain' ),
		'description'         => __( 'Temoignage', 'text_domain' ),
		'labels'              => $labels,
		'supports'            =>   array( 'title', 'editor', 'custom-fields','thumbnail' ),
		'taxonomies'          => array(''),
		'hierarchical'        => false,
		'public'              => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 4,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'temoignage', $args );
	

}
add_action( 'init', 'load_custom_post_type' );


function devis_peinture_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Page article', 'peinture' ),
        'id'            => 'sidebar-astuce',
        'description'   => __( 'Ajoutez des widgets ici pour les faire apparaître dans votre barre latérale de la page liste des aricles.', 'peinture' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'devis_peinture_widgets_init' );


?>
