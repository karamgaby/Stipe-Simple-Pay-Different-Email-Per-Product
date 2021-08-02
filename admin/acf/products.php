<?php
	/**
	 * Created by PhpStorm.
	 * User: gabykaram
	 * Date: 11/25/20
	 * Time: 3:34 AM
	 * File: products.php
	 */
	if ( function_exists( 'acf_add_local_field_group' ) ):
		
		acf_add_local_field_group( array(
			'key'                   => 'group_5fbda388e214d',
			'title'                 => 'Email Template',
			'fields'                => array(
				array(
					'key'               => 'field_5fbda792a780c',
					'label'             => 'Email Content',
					'name'              => 'email_content',
					'type'              => 'wysiwyg',
					'instructions'      => '',
					'required'          => 1,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => 'Hello this is the default email, in case if something bad happened',
					'tabs'              => 'all',
					'toolbar'           => 'full',
					'media_upload'      => 1,
					'delay'             => 0,
				),
				array(
					'key'               => 'field_5fbdac468283e',
					'label'             => 'Email Subject',
					'name'              => 'email_subject',
					'type'              => 'text',
					'instructions'      => '',
					'required'          => 1,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => '',
					'placeholder'       => '',
					'prepend'           => '',
					'append'            => '',
					'maxlength'         => '',
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'simple-pay',
					),
				),
			),
			'menu_order'            => 0,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'        => '',
			'active'                => true,
			'description'           => '',
		) );
	
	endif;
