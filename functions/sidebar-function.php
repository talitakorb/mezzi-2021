<?php



// ---------------------- SIDEBAR
add_filter('widget_text','execute_php',100);

function execute_php($html) {
    if (strpos($html,"<"."?php") !== false) {
        ob_start();
        eval("?".">".$html);
        $html=ob_get_contents();
        ob_end_clean();
    }
    return $html;
}

function theme_widgets_init() {

    // Perfil 
    register_sidebar( array (
    'name' => 'Perfil',
    'id' => 'perfil_widget_area',
    'before_widget' => '<li id="%1$s" class="box-perfil %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h2>',
    'after_title' => '</h2>',
    ) );    


    // Espaço para Anúncios
    register_sidebar( array (
    'name' => 'Espaço para Anúncios',
    'id' => 'anuncie_widget_area',
    'before_widget' => '<li id="%1$s" class="box-sidebar %2$s">',
    'after_widget' => "</li>",
    'before_title' => '<h2>',
    'after_title' => '</h2>',
    ) );   


    // Widget Adicional 1
    register_sidebar( array (
    'name' => 'Widget Adicional 1',
    'id' => 'adicional1_widget_area',
    'before_widget' => '<li id="%1$s" class="box-sidebar %2$s">',
    'after_widget' => "</li>",
    'before_title' => '<h2>',
    'after_title' => '</h2>',
    ) ); 

    // Widget Adicional 2
    register_sidebar( array (
    'name' => 'Widget Adicional 2',
    'id' => 'adicional2_widget_area',
    'before_widget' => '<li id="%1$s" class="box-sidebar %2$s">',
    'after_widget' => "</li>",
    'before_title' => '<h2>',
    'after_title' => '</h2>',
    ) ); 


}

add_action( 'init', 'theme_widgets_init' );

$preset_widgets = array (
    'primary_widget_area'  => array( 'search', 'pages', 'categories', 'archives' ),
    'secondary_widget_area'  => array( 'links', 'meta' )
);

if ( isset( $_GET['activated'] ) ) {
    update_option( 'sidebars_widgets', $preset_widgets );
}

function is_sidebar_active( $index ){
    global $wp_registered_sidebars;
    $widgetcolums = wp_get_sidebars_widgets();
    if ($widgetcolums[$index]) return true;
    return false;
} 


?>