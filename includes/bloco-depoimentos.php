<?php 
$mezzipainel = 'mezzipainel';   

$titulo_depoimentos = get_field('titulo_depoimentos', $mezzipainel);
?>

<section id="depoimentos">
    <div class="container">
        <h1 class="titulo center"><?php echo $titulo_depoimentos; ?></h1>
        
        <?php if( have_rows('depoimentos', $mezzipainel) ): ?>
            <div class="wrap-depoimentos">
                <?php while( have_rows('depoimentos', $mezzipainel) ): the_row(); 
                    $nome = get_sub_field('nome', $mezzipainel);
                    $texto = get_sub_field('texto', $mezzipainel);
                    $foto = get_sub_field('foto', $mezzipainel);
                ?>
                    <article class="depoimento reveal">                                     
                        <header class="autor">
                            <div class="wrap-foto">
                                <div class="foto" style="background-image: url(<?php echo $foto; ?>)"></div>
                            </div>

                            <div class="nome">
                                <?php echo $nome; ?>
                            </div>                                                
                        </header>                                
                        <div class="descricao">
                            <?php echo $texto; ?>
                        </div>       
                    </article>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>  
    </div>            
</section>
