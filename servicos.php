<?php /* Template Name: Serviços */ ?>

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
            <div class="conteudo-servicos">

                <header class="header-conteudo">
                    <h1 class="titulo reveal"><?php echo $titulo; ?></h1>
                    <div class="descricao reveal"><?php echo $descricao; ?></div>  
                </header>

                <aside class="wrap-img-hero-servicos">
                    <div class="img-hero-servicos one reveal">
                        <figure class="img-inner" style="background-image: url(<?php echo $imagem_1; ?>);"></figure>
                    </div>  
                    
                    <div class="img-hero-servicos two reveal">
                        <figure class="img-inner" style="background-image: url(<?php echo $imagem_2; ?>);"></figure>
                    </div>  
                    
                    <div class="img-hero-servicos three reveal">
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

<div id="pagina-servicos">
    <?php if( have_rows('copy') ): ?>
        <section class="copy">
            <div class="container">
                <?php while( have_rows('copy') ): the_row(); 
                    $titulo = get_sub_field('titulo');
                    $texto = get_sub_field('texto');
                    $imagem_ilustrativa = get_sub_field('imagem_ilustrativa');
                ?>
                    <h1 class="h1-copy reveal"><?php echo $titulo; ?></h1>

                    <?php if( have_rows('itens') ): ?>
                        <ul class="wrap-items reveal">
                            <?php while( have_rows('itens') ): the_row(); 
                                $item = get_sub_field('item');
                            ?>
                                <li class="item">
                                    <i class="fas fa-check"></i> <?php echo $item; ?>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>     

                    <div class="wrap-texto-imagem">
                        <div class="texto-two reveal">
                            <?php echo $texto; ?>
                        </div>

                        <div class="img-ilustrativa reveal">
                            <img src="<?php echo $imagem_ilustrativa; ?>" alt="Criação de Sites Personalizados - Mezzi Studio" />
                        </div>

                    </div>

                <?php endwhile; ?>
            </div>
        </section>
    <?php endif; ?> 

    <?php if( have_rows('o_que_esta_incluso') ): ?>
        <section class="o-que-esta-incluso">
            <div class="container">
                <?php while( have_rows('o_que_esta_incluso') ): the_row(); 
                    $titulo = get_sub_field('titulo');
                    $titulo_botao = get_sub_field('titulo_botao');
                    $link_orcamento = get_sub_field('link_orcamento');
                ?>
                    <div class="h1-oq reveal"><?php echo $titulo; ?></div>

                    <?php if( have_rows('itens') ): ?>
                        <ul class="wrap-items reveal">
                            <?php while( have_rows('itens') ): the_row(); 
                                $item = get_sub_field('item');
                            ?>
                                <li class="item">
                                <i class="fas fa-check"></i> <?php echo $item; ?>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>     

                    <a href="<?php echo $link_orcamento; ?>">
                        <button class="btn-oq"><?php echo $titulo_botao; ?></button>
                    </a>                 

                <?php endwhile; ?>
            </div>
        </section>
    <?php endif; ?> 


    <?php include 'includes/bloco-diferenciais.php'; ?> 

    <?php include 'includes/bloco-processo.php'; ?> 

    <?php if( have_rows('veja_mais_servicos') ): ?>
        <section class="veja_mais_servicos">
            <div class="container">
                <?php while( have_rows('veja_mais_servicos') ): the_row(); 
                    $titulo = get_sub_field('titulo');
                ?>
                    <h1 class="titulo center reveal"><?php echo $titulo; ?></h1>

                    <?php if( have_rows('servicos') ): ?>
                        <div class="wrap-servicos">
                            <?php while( have_rows('servicos') ): the_row(); 
                                $titulo_servico = get_sub_field('titulo');
                                $texto = get_sub_field('texto');
                                $imagem = get_sub_field('imagem');
                            ?>
                                <div class="item reveal">
                                    <figure class="img-servico" style="background-image: url(<?php echo $imagem; ?>);"></figure>
                                    
                                    <div class="conteudo-item">
                                        <h2 class="h2-item"><?php echo $titulo_servico; ?></h2>
                                        <?php echo $texto; ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>     

                <?php endwhile; ?>
            </div>
        </section>
    <?php endif; ?> 

    <?php include 'includes/bloco-depoimentos.php'; ?>  

    <?php include 'includes/bloco-faq.php'; ?>   
</div>

<?php get_footer(); ?>