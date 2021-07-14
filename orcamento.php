<?php /* Template Name: Orçamento */ ?>

<?php get_header(); ?>

<?php 
    $descricao = get_field('descricao');
    $descricao_2 = get_field('descricao_2');
?>

        <section class="container">
            <div class="conteudo-orcamento">
                <h1 class="titulo reveal"><?php the_title(); ?></h1>

                <div class="descricao reveal">
                <?php echo $descricao; ?>
                </div>  
        
            </div>
        </section> 
    
    <svg class="animated-lines" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120"></svg> 
    <svg class="animated-lines-two" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120"></svg>                
</header> <!-- fecha hero header -->


<div id="pagina-orcamento">
    <?php 
    $form_key = 'form_5d40fd243a05e';
    $args = array(
        'submit_text' => 'Enviar',
    ); ?>

    <div class="wrap-form-orcamento">
        <?php advanced_form( $form_key, $args ); ?>
    </div>

    <?php include 'includes/bloco-faq.php'; ?>   
</div>


<?php get_footer(); ?>
