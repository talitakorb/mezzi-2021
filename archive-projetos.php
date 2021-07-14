<?php get_header(); ?>  


        <section class="container">
            <div class="conteudo-projetos">
                <h1 class="titulo reveal">Projetos</h1>

                <div class="descricao reveal">
                    Cada projeto é único e personalizado de acordo com a identidade 
                    visual do cliente, nicho e público-alvo. Confira abaixo alguns dos projetos já desenvolvidos pelo studio.</div>  

                <figure class="img-hero-projetos reveal">
                    <img src="<?php echo get_theme_file_uri() ?>/img/img-projetos.png" alt="Portfólio - Mezzi Digital"/>
                </figure>  
                
          
                          
            </div>
        </section> 
    
    <svg class="animated-lines" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120"></svg> 
    <svg class="animated-lines-two" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120"></svg>                
</header> <!-- fecha hero header -->

    <div id="pagina-projetos">
        <section class="projetos">
            <div class="container">
            
                <?php query_posts(array('post_type' => 'projetos', 'posts_per_page' => '50')); ?>
                    <?php if (have_posts()) : ?>
                        <div class="wrap-projetos">
                            <?php while ( have_posts() ) : the_post(); ?>      
                                <article class="projeto-individual revealer" >
                                
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
                        </div>  
                    <?php endif; ?>
                <?php wp_reset_query(); ?>  
            </div>
        </section> 

        <?php include 'includes/bloco-cta.php'; ?>
    </div>
    
<?php get_footer(); ?>
