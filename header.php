<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php include 'includes/head.php'; ?>
</head>


<body>

<?php if (!is_page_template( 'briefing-site.php' )) : ?>   
<div class="viewport">
<main id="scroll-container" class="scroll-container">
<?php endif; ?> 

<header class="hero">
    <div class="menu-nav-header">
        <div class="container">
            
            <nav class="hold-header">
                <span id="brand">
                    <a href="<?php bloginfo('url'); ?>">
                        <img src="<?php echo get_theme_file_uri() ?>/img/logo.svg" alt="Mezzi Studio">
                    </a>
                </span>

                <?php
                    wp_nav_menu( array(
                    'theme_location'    => 'menu-topo',
                    'depth'             => 3,
                    'container'      => '',
                    'items_wrap'    => '<ul>%3$s</ul>',
                    ) );
                ?>                                         
        
                <div id="toggle">
                    <div class="span" id="one"></div>
                    <div class="span" id="two"></div>
                    <div class="span" id="three"></div>
                </div>
            </nav>
        </div>

        <nav id="resize">
            <?php
                wp_nav_menu( array(
                'theme_location'    => 'menu-topo',
                'depth'             => 3,
                'container'      => '',
                'items_wrap'    => '<ul>%3$s</ul>',
                ) );
            ?> 
        </nav>    
    </div>




    
    



