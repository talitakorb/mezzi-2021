<?php /* Template Name: Sobre */ ?>

<?php get_header(); ?>


<?php if( have_rows('hero') ): ?>
    <?php while( have_rows('hero') ): the_row(); 
        $titulo = get_sub_field('titulo');
        $descricao = get_sub_field('descricao');
        $imagem_1 = get_sub_field('imagem_1');
        $imagem_2 = get_sub_field('imagem_2');
        $imagem_3 = get_sub_field('imagem_3');
    ?>

        <section class="container">
            <div class="conteudo-sobre">

                <header class="header-conteudo">
                    <h1 class="titulo reveal"><?php echo $titulo; ?></h1>
                    <div class="descricao reveal"><?php echo $descricao; ?></div>  
                </header>

                <aside class="wrap-img-hero-sobre">
                    <div class="img-hero-sobre one reveal">
                        <figure class="img-inner" style="background-image: url(<?php echo $imagem_1; ?>);"></figure>
                    </div>  
                    
                    <div class="img-hero-sobre two reveal">
                        <figure class="img-inner" style="background-image: url(<?php echo $imagem_2; ?>);"></figure>
                    </div>  
                    
                    <div class="img-hero-sobre three reveal">
                        <figure class="img-inner" style="background-image: url(<?php echo $imagem_3; ?>);"></figure>
                    </div>   
                </aside>                           
            </div>
        </section> 
        
        <svg class="animated-lines" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120"></svg> 
        <svg class="animated-lines-two" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120"></svg>                
    </header> <!-- fecha hero header -->

    <?php endwhile; ?>
<?php endif; ?> 

<div id="pagina-sobre">
    <?php 
    $imagem = get_field('imagem');
    $texto = get_field('texto');
    ?>   

    <section class="container">
        <div class="wrap-sobre">
            <div class="wrap-imgs">
                <?php if( have_rows('hero') ): ?>
                    <?php while( have_rows('imagens_laterais') ): the_row(); 
                        $imagem_1 = get_sub_field('imagem_1');
                        $imagem_2 = get_sub_field('imagem_2');
                    ?>            
                        <figure class="img-sobre" style="background-image: url(<?php echo $imagem_1; ?>);"></figure>
                        <figure class="img-sobre" style="background-image: url(<?php echo $imagem_2; ?>);"></figure>
                    <?php endwhile; ?>
                <?php endif; ?> 
            </div>

            <article class="texto-sobre">                  
                <?php echo $texto; ?>         
            </article>    
        </div>
    </section>


    <?php include 'includes/bloco-processo.php'; ?> 



    <?php query_posts(array('post_type' => 'projetos', 'posts_per_page' => '3', 'orderby' => 'rand')); ?>
        <?php if (have_posts()) : ?>

            <section class="projetos bg-projetos projetos-relacionados">
                <div class="container">
                    <h1 class="titulo center reveal">Veja mais projetos já criados aqui no studio</h1>

                    <div class="wrap-projetos">
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
                    </div>  
                            
                    <a href="<?php bloginfo('url'); ?>/projetos">
                        <button class="ver-mais-projetos">Veja + projetos <i class="fas fa-long-arrow-alt-right"></i></button>
                    </a>                      
                </div>
            </section> 
        <?php endif; ?>
    <?php wp_reset_query(); ?>  


    <?php include 'includes/bloco-cta.php'; ?> 
</div>


<?php get_footer(); ?>