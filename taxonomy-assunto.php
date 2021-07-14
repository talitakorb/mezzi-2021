<?php get_header(); ?>  


    <section class="container">
        <div class="conteudo-blog">
            <h1 class="titulo reveal">Posts sobre <?php single_term_title(); ?></h1>                          
        </div>
    </section> 
    
    <svg class="animated-lines" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120"></svg> 
    <svg class="animated-lines-two" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120"></svg>                
</header> <!-- fecha hero header -->






<div id="pagina-blog">
    <div class="container">

        <section class="lista-posts">  
        
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>

                    <article class="post-individual">
                        <?php if (existeImagem()) { ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <figure class="img-post" style="background-image: url(<?php echo the_post_thumbnail_url( 'full' ); ?>)">
                                </figure>             
                            </a>
                        <?php } else { ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <figure class="img-post" style="background-image: url(<?php bloginfo('url'); ?>/wp-content/themes/mezzi-2021/img/if.png)">     
                                </figure>
                            </a>                           
                        <?php } ?>


                        <header class="texto">           
                            <h2 class="titulo-post">
                                <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">  
                                    <?php the_title(); ?>
                                </a>
                            </h2> 

                            <div class="data-categ">
                                <div class="categoria"><i class="fas fa-folder"></i> <?php the_category( ', '); ?>    </div>                                 
                                <div class="data"><i class="fas fa-calendar-alt"></i> <?php echo get_the_date(); ?></div>                      
                            </div>    

                            <div class="descricao"><?php the_excerpt(); ?></div> 
                        </header>
                    </article>

                <?php endwhile; ?>  

            <?php else : ?>
                <article class="post-single">
                    <h1 class="titulo-post">Nenhum post publicado.</h1>
                    <p>Por favor, aguarde.</p>
                </article>
            <?php endif; ?>

        </section>

        <?php post_pagination();?>
    </div>
</div>        

<?php get_footer(); ?>
