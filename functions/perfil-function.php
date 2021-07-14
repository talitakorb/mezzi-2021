<?php 
class widget_Perfil extends WP_Widget {

	public function __construct() {
		$widget_ops = array( 
			'classname' => 'widget_perfil',
			'description' => 'Widget de Perfil - por Talita Korb',
		);
		parent::__construct( 'widget_perfil', '&#x061E; Widget Perfil', $widget_ops );
	}


    public function widget( $args, $instance ) {
        // outputs the content of the widget
        if ( ! isset( $args['widget_id'] ) ) {
          $args['widget_id'] = $this->id;
        }
  
        // widget ID with prefix for use in ACF API functions
        $widget_id = 'widget_' . $args['widget_id'];
        
        $imagem_perfil = get_field( 'imagem', $widget_id ) ? get_field( 'imagem', $widget_id ) : '';
        $nome = get_field( 'nome', $widget_id ) ? get_field( 'nome', $widget_id ) : '';
        $descricao = get_field( 'descricao', $widget_id ) ? get_field( 'descricao', $widget_id ) : '';
        $titulo_botao = get_field( 'titulo_botao', $widget_id ) ? get_field( 'titulo_botao', $widget_id ) : '';
        $link_botao = get_field( 'link_botao', $widget_id ) ? get_field( 'link_botao', $widget_id ) : '';
        
        echo $args['before_widget']; ?>
  
        <?php if ( $imagem_perfil ) { ?>
            <img src="<?php echo $imagem_perfil; ?>" />
        <?php } ?>

        <?php if ( $nome ) { ?>
            <h2><?php echo $nome; ?></h2>
        <?php } ?> 

        <?php if ( $descricao ) { ?>
            <div class="descricao-perfil">
                
                <?php echo $descricao; ?>

                <a href="<?php echo $link_botao; ?>">
                    <button class="btn-sidebar"><?php echo $titulo_botao; ?> <i class="fas fa-long-arrow-alt-right"></i></button>
                </a>                 
            </div>
        <?php } ?>                    
         
        
        <?php the_field( 'text', $widget_id );
  
   
  
        echo $args['after_widget']; 
    }

    
	public function form( $instance ) {
		// outputs the options form on admin
	}

	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
	}
}

add_action( 'widgets_init', function(){
	register_widget( 'widget_Perfil' );
});
?>