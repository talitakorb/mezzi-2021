<?php 
$mezzipainel = 'mezzipainel';             
?>
  
<section class="faq">
    <div class="container">         
        <?php if( have_rows('faq', $mezzipainel) ): ?>

            <h1 class="h1-faq reveal">Perguntas Frequentes</h1>
            
            <div class="container-faq reveal">
                <?php while( have_rows('faq', $mezzipainel) ): the_row(); 
                    $pergunta_importante = get_sub_field('pergunta_importante', $mezzipainel);
                    $pergunta = get_sub_field('pergunta', $mezzipainel);
                    $resposta = get_sub_field('resposta', $mezzipainel);
                ?>
                    
                    <div class="faq-individual">
        
                        <?php if( is_array($pergunta_importante) && in_array( 'sim', $pergunta_importante ) ): ?>                       
                            <a href="#<?php echo get_row_index(); ?>" class="btn btn-faq marked collapsed" data-toggle="collapse">
                        <?php else: ?> 
                            <a href="#<?php echo get_row_index(); ?>" class="btn btn-faq collapsed" data-toggle="collapse">
                        <?php endif; ?> 

                            <i class="fas fa-plus"></i> <?php echo $pergunta; ?>
                        </a>

                        <div id="<?php echo get_row_index(); ?>" class="collapse">
                            <?php echo $resposta; ?>  
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>                   
    </div> 
</section>  
