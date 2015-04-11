<?php
/**
 * Kirki Advanced Customizer
 * @package Kirki
 */

/**
 * Create our panels and sections.
 */
function kirki_twentytwelve_panels_sections( $wp_customize ) {
	/**
	 * Add panels
	 */
	$wp_customize->add_panel( 'kirki', array(
		'priority'    => 10,
		'title'       => __( 'Kirki', 'kirki' ),
	) );

	$wp_customize->add_section( 'content_background', array(
		'title'       => __( 'Content Background', 'kirki' ),
		'priority'    => 10,
		'panel'       => 'kirki',
	) );

}
add_action( 'customize_register', 'kirki_twentytwelve_panels_sections' );


/**
 * Add our controls.
 */
function kirki_twentytwelve_fields( $fields ) {

	return $fields;

}
add_filter( 'kirki/fields', 'kirki_twentytwelve_fields' );

/**
 * Configuration sample for the Kirki Customizer
 */
function kirki_twentytwelve_configuration() {

    $args = array(
        'logo_image'    => 'http://kirki.org/images/logo.png',
        'description'   => __( 'This is the theme description. You can edit it in the Kirki configuration and add whatever you want here.', 'kirki' ),
        'color_accent'  => '#00bcd4',
        'color_back'    => '#455a64',
    );

    return $args;

}
add_filter( 'kirki/config', 'kirki_twentytwelve_configuration' );
