<?php /* Template Name: Briefing Site */ ?>

<?php get_header(); ?>

<?php 
$descricao_orcamento = get_field('descricao_page_briefing');
?>   

        <section class="container">
            <div class="conteudo-briefing">
                <h1 class="titulo reveal"><?php the_title(); ?></h1>

                <div class="descricao reveal">
                <?php echo $descricao_orcamento; ?>
                </div>  
        
            </div>
        </section>         
        
        <svg class="animated-lines" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120"></svg> 
        <svg class="animated-lines-two" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120"></svg>                
    </header> <!-- fecha hero header -->




<?php 
$form_key = 'form_5d95099d0b620';
$args = array(
    'submit_text' => 'Enviar Briefing',
); ?>


<article class="container page-briefing">
    <?php advanced_form( $form_key, $args ); ?>
</article>





<?php get_footer(); ?>