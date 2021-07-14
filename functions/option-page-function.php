<?php

if( function_exists('acf_add_options_page') ) {
	
	
	add_action('acf/init', 'my_acf_op_init');
	function my_acf_op_init() {
	
		// Check function exists.
		if( function_exists('acf_add_options_sub_page') ) {
	
			// Add parent.
			$parent = acf_add_options_page(array(
				'page_title' => 'Mezzi Painel',
				'menu_title' => '',
				'menu_slug' => 'mezzi-painel',
				'capability' => 'edit_posts',
				'position' => false,
				'parent_slug' => '',
				'icon_url' => false,
				'redirect' => true,
				'icon_url' => 'dashicons-awards',
				'autoload' => false,
				'update_button'		=> __('Atualizar', 'acf'),
				'updated_message'	=> __("Atualizado!", 'acf'),
			));

			// Add sub page.
			$child = acf_add_options_sub_page(array(
				'page_title'  => __('Conteúdos'),
				'menu_title'  => __('Conteúdos'),
				'post_id' => 'mezzipainel',
				'parent_slug' => $parent['menu_slug'],
			));			
	
			// Add sub page.
			$child = acf_add_options_sub_page(array(
				'page_title'  => __('Tags do Site'),
				'menu_title'  => __('Tags do Site'),
				'post_id' => 'tagsdosite',
				'parent_slug' => $parent['menu_slug'],
			));

			// Add sub page.
			$child = acf_add_options_sub_page(array(
				'page_title'  => __('Redes Sociais'),
				'menu_title'  => __('Redes Sociais'),
				'post_id' => 'redessociais',
				'parent_slug' => $parent['menu_slug'],
			));			
		}
	}	

	
	
}