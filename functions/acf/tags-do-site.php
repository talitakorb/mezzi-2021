<?php

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5f6284ea05a76',
	'title' => 'Tags do Site',
	'fields' => array(
		array(
			'key' => 'field_5f629b8e7efdb',
			'label' => 'Pixel Facebook',
			'name' => 'pixel',
			'type' => 'repeater',
			'instructions' => 'Adicione uma linha, escolha onde deseja adicionar o pixel (em todo o site ou página específica) e adicione o código.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'table',
			'button_label' => '',
			'sub_fields' => array(
				array(
					'key' => 'field_5f629d08bed03',
					'label' => 'Onde adicionar o código',
					'name' => 'onde_add',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'site' => 'Em todas as páginas',
						'especifica' => 'Em uma página específica',
					),
					'default_value' => false,
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 0,
					'return_format' => 'array',
					'ajax' => 0,
					'placeholder' => '',
				),
				array(
					'key' => 'field_5f6284f00c486',
					'label' => 'Página',
					'name' => 'pagina',
					'type' => 'post_object',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5f629d08bed03',
								'operator' => '==',
								'value' => 'especifica',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'post_type' => array(
						0 => 'page',
					),
					'taxonomy' => '',
					'allow_null' => 1,
					'multiple' => 0,
					'return_format' => 'id',
					'ui' => 1,
				),
				array(
					'key' => 'field_5f6285b9501b8',
					'label' => 'Código do Pixel',
					'name' => 'codigo_do_pixel',
					'type' => 'textarea',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '<!-- Facebook Pixel Code --> <script> !function(f,b,e,v,n,t,s) {if(f.fbq)return;n=f.fbq=function(){n.callMethod? n.callMethod.apply(n,arguments):n.queue.push(arguments)}; if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version=\'2.0\'; n.queue=[];t=b.createElement(e);t.async=!0; t.src=v;s=b.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t,s)}(window, document,\'script\', \'https://connect.facebook.net/en_US/fbevents.js\'); fbq(\'init\', \'000000000000000\'); fbq(\'track\', \'PageView\'); fbq(\'track\', \'Lead\');	</script><noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=000000000000000&ev=PageView&noscript=1" /></noscript>',
					'maxlength' => '',
					'rows' => '',
					'new_lines' => '',
				),
			),
		),
		array(
			'key' => 'field_5f629ed2dc7ab',
			'label' => 'Google Analytics',
			'name' => 'google_analytics',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 'UA-000000000-0',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5f629fe59e0d4',
			'label' => 'Google Search Console',
			'name' => 'google_search_console',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '<meta name="google-site-verification" content="000000000000000000000000000000000000000000" />',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5f629f6646528',
			'label' => 'Pinterest',
			'name' => 'pinterest_code',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '<meta name="p:domain_verify" content="0000000000000000000000000000000"/>',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-tags-do-site',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;

?>