<footer class="footer-inteiro">

    <div class="container">
      <div class="wrap-footer">

            <div class="logo">
                <img src="<?php echo get_theme_file_uri() ?>/img/logo.svg" alt="Mezzi Studio">
            </div>

            <section class="itens-contato">
                <div class="redes-sociais">
                    <?php 
                    $redes_sociais = 'redessociais';

                    $facebook = get_field('facebook', $redes_sociais); 
                    $instagram = get_field('instagram', $redes_sociais);
                    $linkedin = get_field('linkedin', $redes_sociais);                    
                    ?>

                    <?php if ( $facebook ) { ?>
                        <a class="rede-social" href="<?php echo $facebook; ?>" data-toggle="tooltip" data-placement="top" title="Facebook" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    <?php } ?>

                    <?php if ( $instagram ) { ?>
                        <a class="rede-social" href="<?php echo $instagram; ?>" data-toggle="tooltip" data-placement="top" title="Instagram" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                    <?php } ?>   

                    <?php if ( $linkedin ) { ?>
                        <a class="rede-social" href="<?php echo $linkedin; ?>" data-toggle="tooltip" data-placement="top" title="Linkedin" target="_blank">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    <?php } ?>             
                </div> 

                <div class="email">
                    <a href="mailto:contato@mezzidigital.com.br"><i class="far fa-envelope"></i> contato@mezzidigital.com.br</a>
                </div>    
                
                <div class="telefone">
                    <a target="_blank" href="https://api.whatsapp.com/send?phone=5551986518558&text=Ol%C3%A1%2C%20tudo%20bem%3F%20Gostaria%20de%20saber%20mais%20informa%C3%A7%C3%B5es%20para%20criar%20um%20site%20INCR%C3%8DVEL%20para%20o%20meu%20neg%C3%B3cio.">
                        <i class="fab fa-whatsapp"></i> (51) 98651-8558
                    </a>
                </div>                
            </section>          
        </div>  
 
        <div class="testeinsta">
        <?php echo do_shortcode('[instagram-feed]'); ?>
        </div> 
        
        <div class="sub-footer">
           
                <div class="wrap-sub-footer">
                    <div class="item">
                        Todos os Direitos Reservados © <?php echo date('Y');?> Mezzi Studio
                    </div>
                    <div class="divider">|</div>
                    <div class="item">
                        CNPJ: 21.663.200/0001-02
                    </div>   
                    <div class="divider">|</div>             
                    <div class="item">
                        <a href="<?php bloginfo('url'); ?>/politica-de-privacidade">Política de Privacidade & Cookies</a>
                    </div> 
                    <div class="divider">|</div>
                    <div class="item">
                        Design & Programação <a href="https://www.mezzi.studio">por-adivinhe-quem</a>
                    </div>                 
                </div>      
        
        </div>     
    </div>  
</footer>

<?php if (!is_page_template( 'briefing-site.php' )) : ?>   
</main>
</div>
<?php endif; ?> 

<?php wp_footer(); ?>

</body>
</html>