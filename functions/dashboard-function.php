<?php


// muda logotipo no form de login
function modify_admin_logo() { ?>
<style type="text/css">
#login h1 a, .login h1 a {
background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/logo.svg);
height: 60px;
width: 190px;
background-size: 190px 60px;
background-repeat: no-repeat;
padding-bottom: 15px;
}
</style>
<?php }
add_action( 'login_enqueue_scripts', 'modify_admin_logo' );



// Remove dashboard widgets
function remove_dashboard_meta() {
	if ( ! current_user_can( 'manage_options' ) ) {
		remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
	}
}
add_action( 'admin_init', 'remove_dashboard_meta' ); 



// Widget bem vindo - dashboard
function wpexplorer_add_dashboard_widgets() {
	wp_add_dashboard_widget(
		'widget_bem_vindo', // Widget slug.
		'Seja bem-vindo(a)!', // Title.
		'wpexplorer_dashboard_widget_function' // Display function.
	);
}
add_action( 'wp_dashboard_setup', 'wpexplorer_add_dashboard_widgets' );

function wpexplorer_dashboard_widget_function() {
    global $current_user; wp_get_current_user();
    echo "Olá, " . $current_user->display_name . "! 
  Seja bem-vindo(a) ao painel de administração do seu site.
  <br><br>
  Navegue no menu à esquerda para editar a(s) página(s) que desejar.
  <br><br>
  Qualquer dúvida sobre como utilizar este painel, fique à vontade para entrar em contato comigo.
  <br><br>
  Atenciosamente,<br>
  Talita - Mezzi Studio
  ";
}



// Cores Admin
function dashboard_admin_color_scheme() {
  //Get the theme directory
  $theme_dir = get_template_directory_uri();
 
  //dashboard
  wp_admin_css_color( 'dashboard', __( 'Mezzi' ),
    $theme_dir . '/css/dashboard.css',
    array( '#bdadaf', '#f7eaea', '#9a64c6' , '#9a64c6')
  );
}
add_action('admin_init', 'dashboard_admin_color_scheme');


function login_background() {
echo '<style type="text/css">
body { background: #f5f3f3; }
.login form { background: #9a64c6; border:none}
.login label {color: #f5f3f3} 
.login .button {background: #f5f3f3; color: #9a64c6}
.login .button:hover {background: #f5f3f3; color: #3E3E3F}
.login input:active, .login input:focus {outline: none; border: none; box-shadow: none}
</style>';
}
add_action('login_head', 'login_background');



// muda o texto do rodapé
function modify_admin_footer() {
echo '<span id="footer-thankyou">Desenvolvido com &#10084; por <a href="http://www.mezzi.studio" target="_blank" rel="noopener noreferrer">Mezzi Studio</a>.</span>';
}
add_filter( 'admin_footer_text', 'modify_admin_footer' );




// Remove os menus para usuário específico
function remove_menus(){
  global $current_user;
    $user = wp_get_current_user();
    if ($current_user->user_login != 'mezzi') { 
        remove_menu_page('edit.php'); // Posts
        remove_menu_page('upload.php'); // Media
        remove_menu_page('link-manager.php'); // Links
        remove_menu_page('edit-comments.php'); // Comments
        //remove_menu_page('edit.php?post_type=page'); // Pages
        remove_menu_page('plugins.php'); // Plugins
        remove_menu_page('themes.php'); // Appearance
        remove_menu_page('users.php'); // Users
        remove_menu_page('tools.php'); // Tools
        remove_menu_page('options-general.php'); // Settings
        remove_menu_page( 'edit.php?post_type=acf-field-group' ); // acf
        remove_menu_page( 'optimisationio-dashboard' ); // optimisation.io
        remove_menu_page( 'smush' ); // optimisation.io
        remove_menu_page( 'wpforms-overview' ); //wp-forms
        remove_menu_page( 'mlang' );
        remove_menu_page( 'sb-instagram-feed' );
        remove_menu_page( 'wpseo_dashboard' );
        remove_menu_page( 'edit.php?post_type=af_form' );
        remove_menu_page( 'ai1wm_export' );
        remove_menu_page( 'edit.php?post_type=cookielawinfo' );
        remove_menu_page( 'edit.php?post_type=blog' );

    } 
}
add_action( 'admin_menu', 'remove_menus' );

?>