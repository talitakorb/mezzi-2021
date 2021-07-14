
<?php 
$mezzipainel = 'mezzipainel';             
?>     
       
<?php if( have_rows('processo', $mezzipainel) ): ?>
    <section class="processo">
        <div class="container">
            <?php while( have_rows('processo', $mezzipainel) ): the_row(); 
                $titulo = get_sub_field('titulo', $mezzipainel);
            ?>
                <div class="wrap-processo">
                    <div class="h1-processo reveal">
                        <h1>Como é o meu processo de criação</h1>
                    </div>

                    <?php if( have_rows('itens_processo', $mezzipainel) ): ?>
                        <article class="itens-processo">
                            <?php while( have_rows('itens_processo', $mezzipainel) ): the_row(); 
                                $titulo_processo = get_sub_field('titulo', $mezzipainel);
                                $texto = get_sub_field('texto', $mezzipainel);
                            ?>
                                <div class="item reveal">
                                    <h2><?php echo $titulo_processo; ?></h2>
                                    <?php echo $texto; ?>
                                </div>
                            <?php endwhile; ?>
                        </article>
                    <?php endif; ?>   
                </div>  

            <?php endwhile; ?>
        </div>
    </section>
<?php endif; ?> 
