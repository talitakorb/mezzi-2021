<?php get_header(); ?>

            <section class="container">
                    <div class="conteudo-paginas">
                        <h1 class="titulo-projeto reveal"><?php the_title(); ?></h1>

                        <div class="descricao-inicio reveal">
                        <?php echo $descricao_do_projeto; ?>
                        </div>  
              
                    </div>
                </section> 
            
            <svg class="animated-lines" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120"></svg> 
            <svg class="animated-lines-two" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120"></svg>                
        </header> <!-- fecha hero header -->


<div class="container">
    <article class="conteudo-sobre">                  
        <?php the_content(); ?>       
    </article>    
</div>




<?php get_footer(); ?>
