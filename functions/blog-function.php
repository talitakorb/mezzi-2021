<?php

function artigos_blog_function() {
	$labels = array(
		'name'                => __( 'Blog' ),
		'singular_name'       => __( 'Blog'),
		'menu_name'           => __( 'Blog'),
		'all_items'           => __( 'Todos os posts'),
		'view_item'           => __( 'Ver posts'),
		'add_new_item'        => __( 'Adicionar post'),
		'add_new'             => __( 'Adicionar post'),
		'edit_item'           => __( 'Editar post'),
		'update_item'         => __( 'Atualizar post'),
		'search_items'        => __( 'Procurar post'),
        'not_found' => __( 'Post não encontrado' ),
        'not_found_in_trash' => __( 'Nenhum post encontrado na lixeira' )
	);
	$args = array(
		'label'               => __( 'blog'),
		'description'         => __( 'Blog'),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail'),
		'public'              => true,
		'hierarchical'        => true,
		'show_ui'             => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'taxonomies'  => array( 'assunto' ),    
		'publicly_queryable'  => true,
        'rewrite' => array('slug' => 'blog','with_front' => false),
);
	register_post_type( 'blog', $args );
}
add_action( 'init', 'artigos_blog_function', 0 );


// Let us create Taxonomy for Custom Post Type
add_action( 'init', 'create_blog_custom_taxonomy', 0 );
 
//create a custom taxonomy name it "type" for your posts
function create_blog_custom_taxonomy() {
 
  $labels = array(
    'name'              => _x( 'Assuntos', 'taxonomy general name', 'textdomain' ),
    'singular_name'     => _x( 'Assunto', 'taxonomy singular name', 'textdomain' ),
    'search_items'      => __( 'Buscar assunto', 'textdomain' ),
    'all_items'         => __( 'Todos os Assuntos', 'textdomain' ),
    'parent_item'       => __( 'Parent Lesson', 'textdomain' ),
    'parent_item_colon' => __( 'Parent Lesson:', 'textdomain' ),
    'edit_item'         => __( 'Editar assunto', 'textdomain' ),
    'update_item'       => __( 'Atualizar assunto', 'textdomain' ),
    'add_new_item'      => __( 'Adicionar assunto', 'textdomain' ),
    'new_item_name'     => __( 'Nome do assunto', 'textdomain' ),
    'menu_name'         => __( 'Assunto', 'textdomain' ),
);

$args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'assunto'),
);

register_taxonomy( 'assunto', array( 'blog' ), $args );  
}


add_action( 'init', 'gp_register_taxonomy_for_object_type' );
function gp_register_taxonomy_for_object_type() {
    register_taxonomy_for_object_type( 'post_tag', 'blog' );
};


?>