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
                    <h1 class="titulo-inicio reveal">OPS! Essa página não existe =(</h1>

                    <div class="descricao-inicio reveal">Se algo estiver errado, entre em contato comigo. Você também pode <a href="<?php bloginfo('url'); ?>">voltar para a página inicial</a></div>         
                </div>
            </section> 
            
            <svg class="animated-lines" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120"></svg> 
            <svg class="animated-lines-two" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120"></svg>                
        </header> <!-- fecha hero header -->

                    
    <?php endwhile;?>
<?php wp_reset_query(); ?>



<?php include 'includes/bloco-cta.php'; ?>

<?php get_footer(); ?>


