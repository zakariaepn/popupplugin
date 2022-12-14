<?php
/*

Title: Popup Metabox
Post Type: popup

*/

piklist( 'field', array(
	'type'  => 'checkbox',
	'field' => 'popupcreator_active',
	'label' => __( 'Active', 'popupcreator' ),
	'value'=>0,
	'choices'=>array(
		1=>__( 'Active', 'popupcreator' )
	)
) );

piklist( 'field', array(
	'type'  => 'text',
	'field' => 'popupcreator_display_after',
	'label' => __( 'Display Popup After', 'popupcrator' ),
	'value' => '5',
	'help'  => __( 'in seconds', 'popupcrator' ),
) );

piklist( 'field', array(
	'type'  => 'url',
	'field' => 'popupcreator_url',
	'label' => __( 'URL', 'popupcreator' ),
) ); 

piklist( 'field', array(
	'type'  => 'checkbox',
	'field' => 'popupcreator_auto_hide',
	'label' => __( 'Auto Hide', 'popupcreator' ),
	'value'=>1,
	'choices'=>array(
		1=>__( 'Don\'t Hide', 'popupcreator' )
	)
) );


piklist( 'field', array(
	//'type'    => 'checkbox',
	'type'    => 'radio',
	'field'   => 'popupcreator_on_exit',
	'label'   => __( 'Display On Exit', 'popupcreator' ),
	'value'   => 1,
	'choices' => array(
		0 => __( 'Display On Exit', 'popupcreator' ),
		0 => __( 'Display On Exit', 'popupcreator' ),
		1 => __( 'Display On Page Load', 'popupcreator' )
	)
) );

piklist( 'field', array(
	'type'    => 'select',
	'field'   => 'popupcreator_popup_size',
	'label'   => __( 'Popup Size', 'popupcreator' ),
	'value'   => 'landscape',
	'choices' => array(
		'popup-landscape' => __( 'Landscape', 'popupcreator' ),
		'popup-square' => __( 'Square', 'popupcreator' ),
		'full' => __( 'Original', 'popupcreator' ),
	)
) );