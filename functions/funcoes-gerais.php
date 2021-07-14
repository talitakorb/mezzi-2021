<?php


// ---------------------- FEATURED IMAGE
add_theme_support( 'post-thumbnails' ); 


// ---------------------- LOAD SCRIPTS
function theme_load_scripts() {
    wp_enqueue_style('all', get_template_directory_uri() . '/css/all.min.css', array(), false, false); 
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css',array(),false,false);      
    wp_enqueue_style('style', get_stylesheet_uri() );    

    
    $urlCDN = '//cdn.jsdelivr.net/npm';
    wp_deregister_script( 'jquery-core' );
    wp_register_script( 'jquery-core', $urlCDN . '/jquery@3.4.1/dist/jquery.min.js', array(), '' );
    wp_deregister_script( 'jquery-migrate' );
    wp_register_script( 'jquery-migrate', $urlCDN . '/jquery-migrate@3.3.1/dist/jquery-migrate.min.js', array(), '' );
    
    wp_enqueue_script('scrollReveal', 'https://cdnjs.cloudflare.com/ajax/libs/scrollReveal.js/4.0.7/scrollreveal.min.js', array( 'jquery' ), false, true );
    wp_enqueue_script('tweenMax', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenMax.min.js', array( 'jquery' ), false, true ); 
    wp_enqueue_script('site', get_template_directory_uri() . '/js/site.min.js', array( 'jquery' ), false, true );
}
add_action( 'wp_enqueue_scripts', 'theme_load_scripts' );


function wckc_add_my_custom_post_type ($query) {
    if(
        empty($query->query['post_type'])
        or $query->query['post_type'] === 'post'
    ){
        $query->set('post_type', array('post', 'page', 'blog'));
    }
}
 
add_action('pre_get_posts', 'wckc_add_my_custom_post_type');



// ---------------------- IMAGEM E ALT IF
function alt_if() { 
    $alt_if = wp_title();
    return $alt_if;
}

function imagem_if() {
    $imagem_if = get_theme_file_uri().'/img/if-mezzi.png';
    return $imagem_if;
}

function imagem_if_principal() {
    $imagem_if_principal = get_theme_file_uri().'/img/if-mezzi.png';
    return $imagem_if_principal;
}



// ---------------------- LOAD MINIFIED CSS
add_filter( 'stylesheet_uri', 'rv_load_alternate_stylesheet', 10, 2 );
function rv_load_alternate_stylesheet( $stylesheet_uri, $stylesheet_dir_uri ) {
	return trailingslashit( $stylesheet_dir_uri ) . 'style.min.css';
}



// ---------------------- CREAN HEADER
function clean_header() {
    remove_action('wp_head', 'wp_print_scripts');
    remove_action('wp_head', 'wp_print_head_scripts', 9);
    remove_action('wp_head', 'wp_enqueue_scripts', 1);
}

add_action('wp_enqueue_scripts', 'clean_header');



// ---------------------- MENU
register_nav_menus( array(
    'menu-topo' => __( 'Menu', '' ),
));


    
// ---------------------- REMOVER <P> DAS IMAGENS
function filter_ptags_on_images($content){
    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');



// REMOVER QUERY STRINGS
function remove_cssjs_ver( $src ) {
 if( strpos( $src, '?ver=' ) )
 $src = remove_query_arg( 'ver', $src );
 return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );



// ---------------------- OCULTAR ITENS DO PAINEL
show_admin_bar(false);

function pc_remove_links_menu() {
    global $menu;
}

add_action ('admin_menu', 'pc_remove_links_menu');
define('DISALLOW_FILE_EDIT',true);



// ---------------------- RESGATAR IMAGEM DO POST
function imagem_do_post() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];
    return $first_img;
}


// ---------------------- AJAX LOAD MORE
function misha_my_load_more_scripts() {
	global $wp_query; 

	wp_register_script( 'my_loadmore', get_stylesheet_directory_uri() . '/js/myloadmore.js', array('jquery') );
 
	wp_localize_script( 'my_loadmore', 'misha_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages
	) );
 
 	wp_enqueue_script( 'my_loadmore' );
}
 
add_action( 'wp_enqueue_scripts', 'misha_my_load_more_scripts' );

function misha_loadmore_ajax_handler(){
 
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1;
    $args['post_status'] = 'publish';
    $args['post_type'] = 'projetos';

	query_posts( $args ); ?>
 
	<?php if (have_posts()) : ?>
		<?php while ( have_posts() ) : the_post(); ?>  
            <article class="projeto-individual" >                
                <?php if (existeImagem()) { ?>
                    <div class="header-item">
                        <a href="<?php echo get_permalink(); ?>" class="teste">
                            <figure class="img-post" style="background-image: url(<?php echo the_post_thumbnail_url( 'full' ); ?>)">
                                <div class="titulo-categ">
                                    <h1 class="titulo-post"><?php the_title(); ?></h1>
                                    
                                    <div class="categ">
                                        <?php $cat = get_the_category(); echo $cat[0]->cat_name; ?>
                                    </div>
                                </div>
                            </figure>
                        </a>
                    </div>

                <?php } else { ?>
                <?php } ?>                   
            </article>
        <?php endwhile;?>
	
    <?php endif; die; }
 
add_action('wp_ajax_loadmore', 'misha_loadmore_ajax_handler');
add_action('wp_ajax_nopriv_loadmore', 'misha_loadmore_ajax_handler');



// ---------------------- THUMBNAILS
function afc_another_thumbnail( $thumb_size, $image_width, $image_height ) {
    global $post;
    $params = array( 'width' => $image_width, 'height' => $image_height );
    $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID, '' ), $thumb_size );
    $custom_img_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID, '' ), $thumb_size );
    return $custom_img_src;
}

function existeImagem (){
    $x = "0";
    $x = afc_another_thumbnail('full', 600, 600);
    if ($x == "0")
    return false;
    else
    return true;
}



?>