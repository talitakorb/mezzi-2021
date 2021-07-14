<?php 
$mezzipainel = 'mezzipainel';             
?>


<section id="vantagens">
    <div class="container">

        <?php if( have_rows('diferenciais', $mezzipainel) ): ?>
            <?php while( have_rows('diferenciais', $mezzipainel) ): the_row(); 
                $titulo_sessao = get_sub_field('titulo_sessao', $mezzipainel);
            ?>
                <h1 class="titulo"><?php echo $titulo_sessao; ?></h1>

                <?php if( have_rows('repeater_diferenciais', $mezzipainel) ): ?>
                    <div class="wrap-vantagens">
                        <?php while( have_rows('repeater_diferenciais', $mezzipainel) ): the_row(); 
                            $titulo = get_sub_field('titulo', $mezzipainel);
                            $subtitulo = get_sub_field('subtitulo', $mezzipainel);
                            $icone = get_sub_field('icone', $mezzipainel);
                            $texto = get_sub_field('texto', $mezzipainel);
                        ?>  

                        <article class="vantagem reveal">   
                            <span class="subtitulo"><?php echo $subtitulo; ?></span>

                            <header class="wrap-icone-titulo">
                                <img class="icone" src="<?php echo $icone; ?>" />

                                <h2 class="h1-vantagens">
                                    <?php echo $titulo; ?>
                                </h2>
                            </header>

                            <div class="descricao">
                                <?php echo $texto; ?>
                            </div>
                            
                        </article>                                    
                            
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?> 
            <?php endwhile; ?> 
        <?php endif; ?>    
    </div>  
</section> 
