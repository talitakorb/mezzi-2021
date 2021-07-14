<!-- META TAGS -->
<meta charset=<?php bloginfo('charset'); ?> />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">


<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; <?php } ?> <?php wp_title(); ?></title>   
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>   


<!-- WP HEAD -->
<?php wp_head(); ?>

<meta property="fb:admins" content="100002233627395" />
<meta property="fb:app_id" content="2421300124820846" />
    
<!-- COMENTÁRIOS FACEBOOK -->
<?php if(is_single() || is_page()) { ?>
<meta property="og:type" content="article" />
<meta property="og:title" content="<?php single_post_title(''); ?>" />
<meta property="og:url" content="<?php the_permalink(); ?>"/>
<meta property="og:image" content="<?php echo the_post_thumbnail_url( 'full' ); ?>" />
<?php  } else { ?>
<meta property="og:type" content="website" />
<meta property="og:title" content="<?php bloginfo('name'); ?>" />
<meta property="og:url" content="<?php bloginfo('url'); ?>"/>
<meta property="og:description" content="<?php bloginfo('description'); ?>" />
<meta property="og:image" content="<?php echo imagem_if_principal( 'imagem_if_principal' ); ?>" />
<meta property="og:site_name" content="<?php bloginfo('name'); ?>">
<meta property="og:locale" content="pt_BR">
<?php  }  ?> 

<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#9a64c6">
<meta name="msapplication-TileColor" content="#9a64c6">
<meta name="theme-color" content="#ffffff">

<?php 
$tagsdosite = 'tagsdosite';

$google_analytics = get_field('google_analytics', $tagsdosite); 
$google_search_console = get_field('google_search_console', $tagsdosite);
$pinterest_code = get_field('pinterest_code', $tagsdosite);  
?>

<?php if( have_rows('pixel', $tagsdosite) ): ?>
    <?php while( have_rows('pixel', $tagsdosite) ): the_row(); 
        $onde_add = get_sub_field('onde_add');
        $pagina = get_sub_field('pagina');
        $codigo_do_pixel = get_sub_field('codigo_do_pixel');
    ?>

        <?php if( is_array($onde_add) && in_array( 'site', $onde_add ) ): ?>  
            <?php echo $codigo_do_pixel; ?> 

        <?php elseif ( is_array($onde_add) && in_array( 'especifica', $onde_add ) ): ?> 
            <?php if ( is_page($pagina) ) : ?>
                <?php echo $codigo_do_pixel; ?> 
            <?php endif; ?>  
        <?php endif; ?>  

    <?php endwhile; ?>
<?php endif; ?>  

<?php if( $google_analytics ): ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $google_analytics; ?> "></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', '<?php echo $google_analytics; ?> ');
    </script>
    
<?php endif; ?>  

<?php if( $google_search_console ): ?>
    <?php echo $google_search_console; ?> 
<?php endif; ?>  

<?php if( $pinterest_code ): ?>
    <?php echo $pinterest_code; ?> 
<?php endif; ?>  