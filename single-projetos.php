<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

        <?php 
        $imagem_mockup = get_field('imagem_mockup');
        $titulo_inicio = get_field('titulo_inicio'); 
        $descricao_do_projeto = get_field('descricao_do_projeto');
        $link_do_projeto = get_field('link_do_projeto');
        $tipografia = get_field('tipografia');
        $paleta_de_cores = get_field('paleta_de_cores');
        $layout_final = get_field('layout_final');
        $width_mockup = get_field('width_mockup');
        ?>

                <section class="container">
                    <div class="conteudo-single">

                        <header class="header-conteudo">
                            <h1 class="titulo reveal"><?php the_title(); ?></h1>
                            <div class="descricao reveal"><?php echo $descricao_do_projeto; ?></div>  
                        </header>

                        <figure class="img-hero-single reveal">
                            <img src="<?php echo $imagem_mockup; ?>" alt="<?php the_title(); ?>"/>
                        </figure>  
              
                    </div>
                </section> 
            
            <svg class="animated-lines" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120"></svg> 
            <svg class="animated-lines-two" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120"></svg>                
        </header> <!-- fecha hero header -->

        <section class="container">
            <div class="conteudo-single">
                <?php if ( $layout_final ) { ?>
                    <section class="item-single-projetos reveal">
                         <img src="<?php echo $layout_final; ?>" />
                    </section>
                <?php } ?>
            </div>
        </section>
        
    <?php endwhile; ?> 
<?php endif; ?>



    <section class="projetos bg-projetos projetos-relacionados">
        <div class="container">
            <h1 class="titulo center reveal">Veja mais projetos já criados aqui no studio</h1>
        
            <?php query_posts(array('post_type' => 'projetos', 'posts_per_page' => '3', 'orderby' => 'rand')); ?>
                <?php if (have_posts()) : ?>
                    <section class="wrap-projetos">
                        <?php while ( have_posts() ) : the_post(); ?>      
                            <article class="projeto-individual reveal" >
                            
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
                        <?php endwhile; ?>
                    </section>  
                    
                    <a href="<?php bloginfo('url'); ?>/projetos">
                        <button class="ver-mais-projetos">Veja + projetos <i class="fas fa-long-arrow-alt-right"></i></button>
                    </a>                      
                <?php endif; ?>
            <?php wp_reset_query(); ?>  
        </div>
    </section> 


    <?php include 'includes/bloco-cta.php'; ?> 

<?php get_footer(); ?>