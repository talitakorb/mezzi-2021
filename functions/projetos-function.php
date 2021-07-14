<?php

function projetos_function() {
    register_post_type( 'projetos',
        array(
            'labels' => array(
                'name' => __( 'Projetos' ),
                'singular_name' => __( 'Projeto' ),
                'add_new' => __( 'Adicionar projeto' ),
                'add_new_item' => __( 'Adicionar projeto' ),
                'edit_item' => __( 'Editar projeto' ),
                'new_item' => __( 'Adicionar projeto' ),
                'view_item' => __( 'Ver projeto' ),
                'search_items' => __( 'Procurar projeto' ),
                'not_found' => __( 'Projeto não encontrado' ),
                'not_found_in_trash' => __( 'Nenhum projeto encontrado na lixeira' )
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title','editor','thumbnail'),
            'capability_type' => 'post',
            'rewrite' => array("slug" => "projetos"), // Permalinks format
            'menu_position' => 5,
            'taxonomies'  => array( 'category' ),
        )
    );
}

add_action( 'init', 'projetos_function' );


?>