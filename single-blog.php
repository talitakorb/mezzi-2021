<?php get_header(); ?>

    <section class="container">
        <div class="conteudo-single-blog">
        <h1 class="titulo reveal"><?php the_title(); ?></h1>             
            <div class="categorias"><?php the_category( ' '); ?> <?php the_terms( $post->ID, 'assunto', ' ', ' ', ' ' ); ?> <span class="data"><?php echo get_the_date(); ?></span></div>                     
        </div>
    </section> 

    <svg class="animated-lines" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120"></svg> 
    <svg class="animated-lines-two" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120"></svg>                
</header> <!-- fecha hero header -->


<?php if (have_posts()) : ?>

    <section class="container">
        <div class="wrap-single-sidebar">
            <?php while (have_posts()) : the_post(); ?>
                <article class="post-single">

                    <?php the_content( ); ?>

                    <aside class="final-post">   
                        <section class="share-icons"> 
                            <div class="compartilhe">Compartilhe este post</div>        

                            <div class="wrap-icons">
                                <a title="Compartilhe no Facebook" data-toggle="tooltip" data-placement="top" onclick="window.open(this.href,this.target,'width=570,height=400');return false;" 
                                href="http://www.facebook.com/share.php?u=<?php the_permalink(''); ?>&amp;t=<?php the_title(''); ?>">
                                    <i class="fab fa-facebook-f"></i>
                                </a>

                                <a title="Compartilhe no Twitter" data-toggle="tooltip" data-placement="top" onclick="window.open(this.href,this.target,'width=570,height=400');return false;" 
                                href="http://twitter.com/share?text=<?php the_title(''); ?>&url=<?php echo wp_get_shortlink(get_the_ID()); ?>&counturl=<?php the_permalink(''); ?>">
                                    <i class="fab fa-twitter"></i>
                                </a>

                                <a title="Compartilhe via E-mail" data-toggle="tooltip" data-placement="top" href="mailto:?subject=<?php the_title(); ?>&body=Oi!%20Eu%20acabei%20de%20ler%20esse%20post%20e%20achei%20que%20seria%20%C3%B3timo%20compartilhar%20ele%20contigo.%20Segue%20o%20link:%20<?php the_permalink(); ?>. Abraço!">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                        </section>   
                        
                        <section class="tags">
                            <?php the_tags('', ', ', '<br />'); ?>
                        </section>    
                    </aside>                    

                    <?php afc_posts_relacionados(); ?>          

                </article>
            <?php endwhile; ?> 

            <aside class="sidebar">
                <?php get_sidebar(); ?>
            </aside>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>