<?php 
$mezzipainel = 'mezzipainel';             
?>

<?php if( have_rows('cta', $mezzipainel) ): ?>
    <?php while( have_rows('cta', $mezzipainel) ): the_row(); 
        $titulo_cta = get_sub_field('titulo_cta', $mezzipainel);
        $texto_cta = get_sub_field('texto_cta', $mezzipainel);
        $titulo_botao = get_sub_field('titulo_botao', $mezzipainel);
        $link_botao = get_sub_field('link_botao', $mezzipainel);
    ?>

        <section class="cta">
            <div class="container reveal">
                <h1 class="titulo center"><?php echo $titulo_cta; ?></h1>

                <div><?php echo $texto_cta; ?></div>

                <a class="botao-cta" href="<?php echo $link_botao; ?>"><?php echo $titulo_botao; ?></a>
            </div>
        </section>

    <?php endwhile; ?>
<?php endif; ?> 
   