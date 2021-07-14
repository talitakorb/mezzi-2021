<?php get_header(); ?>  


<?php $the_query = new WP_Query( 'pagename=home' ); ?> 
    <?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>

            <?php 
            $imagem_inicial = get_field('imagem_inicial');
            $titulo_inicio = get_field('titulo_inicial'); 
            $descricao_inicio = get_field('descricao_inicial'); 

            $titulo_botao_orcamento = get_field('titulo_botao_orcamento');
            $link_botao_orcamento = get_field('link_botao_orcamento');
            ?>

            <div class="img-hero-inicio" style="background-image: url(<?php echo $imagem_inicial; ?>)">
            </div>

            <section class="container">
                <div class="conteudo-home">
                    <h1 class="titulo-inicio reveal"><?php echo $titulo_inicio; ?></h1>

                    <div class="descricao-inicio reveal"><?php echo $descricao_inicio; ?></div>

                    <a href="<?php echo $link_botao_orcamento; ?>" class="reveal">
                        <button class="btn-inicio"><?php echo $titulo_botao_orcamento; ?></button>
                    </a>            
                </div>
            </section> 
            
            <svg class="animated-lines" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120"></svg> 
            <svg class="animated-lines-two" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120"></svg>                
        </header> <!-- fecha hero header -->

        <?php include 'includes/bloco-diferenciais.php'; ?>

        <section class="bg-line">
            <div class="wrap-botao-outline">
                <a class="botao-outline" href="<?php bloginfo('url'); ?>/servicos">
                    Conheça os serviços <i class="fas fa-long-arrow-alt-right"></i>
                </a>
            </div>
        </section>            

        <?php include 'includes/bloco-depoimentos.php'; ?>  
                    
    <?php endwhile;?>
<?php wp_reset_query(); ?> 

<div id="pagina-home">
    <?php $the_query = new WP_Query( 'pagename=home' ); ?> 
        <?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>
            <section class="sobre reveal">
                <?php if( have_rows('sobre') ): ?>
                    <?php while( have_rows('sobre') ): the_row(); 
                        $foto = get_sub_field('foto');
                        $titulo = get_sub_field('titulo');
                        $texto = get_sub_field('texto');
                    ?>

                    <div class="container">
                        <div class="wrap-sobre">
                            <div class="img-sobre">
                                <figure class="img-inner" style="background-image: url(<?php echo $foto; ?>);"></figure>
                            </div>

                            <div class="texto ">
                                <h1 class="titulo"><?php echo $titulo; ?></h1>
                                <div class="texto-inside"><?php echo $texto; ?></div>
                                <a class="saiba-mais" href="<?php bloginfo('url'); ?>/sobre">Saiba mais +</a>
                            </div>
                        </div>
                    </div>

                    <?php endwhile; ?>
                <?php endif; ?>            
            </section>
        <?php endwhile;?>
    <?php wp_reset_query(); ?> 

    <section class="projetos">
        <div class="container">
            <h1 class="titulo">Alguns projetos já criados aqui no studio</h1>
        
            <?php query_posts(array('post_type' => 'projetos')); ?>
                <?php if (have_posts()) : ?>
                    <section class="wrap-projetos">
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
                        <?php endwhile; ?>
                    </section>                                       
                <?php endif; ?>
            <?php wp_reset_query(); ?>  
        </div>
    </section> 

    <section class="bg-line">
        <div class="wrap-botao-outline">
            <a class="botao-outline" href="<?php bloginfo('url'); ?>/projetos">
                Veja + projetos <i class="fas fa-long-arrow-alt-right"></i>
            </a>
        </div>
    </section> 

    <?php include 'includes/bloco-cta.php'; ?>            

</div>

<?php get_footer(); ?>



