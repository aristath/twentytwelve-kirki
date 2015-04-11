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
	$wp_customize->add_panel( 'backgrounds', array(
		'priority'    => 10,
		'title'       => __( '', 'twentytwelve' ),
	) );

    $wp_customize->add_section( 'typography', array(
		'title'       => __( 'Typography', 'twentytwelve' ),
		'priority'    => 10,
	) );

	$wp_customize->add_section( 'background', array(
		'title'       => __( 'Background', 'twentytwelve' ),
		'priority'    => 20,
	) );

	$wp_customize->add_section( 'layout', array(
		'title'       => __( 'Layout', 'twentytwelve' ),
		'priority'    => 30,
	) );

}
add_action( 'customize_register', 'kirki_twentytwelve_panels_sections' );


/**
 * Add our controls.
 */
function kirki_twentytwelve_fields( $fields ) {

    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'text_color',
        'label'       => __( 'Main Color', 'twentytwelve' ),
        'section'     => 'typography',
        'default'     => '#222',
        'priority'    => 10,
        'output'      => array(
            'element'  => 'body #page',
            'property' => 'color',
        )
    );

    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'headers_color',
        'label'       => __( 'Headers Color', 'twentytwelve' ),
        'section'     => 'typography',
        'default'     => '#555',
        'priority'    => 10,
        'output'      => array(
            'element'  => 'body #page h1, body #page h2, body #page h3, body #page h4, body #page h5, body #page h6',
            'property' => 'color',
        )
    );

    $fields[] = array(
        'type'        => 'color',
        'setting'     => 'links_color',
        'label'       => __( 'Links Color', 'twentytwelve' ),
        'section'     => 'typography',
        'default'     => '#08c',
        'priority'    => 10,
        'output'      => array(
            'element'  => 'body #page a, body #page a:link, body #page a:visited, body #page a:hover',
            'property' => 'color',
        )
    );

    $fields[] = array(
        'type'        => 'select',
        'setting'     => 'body_font_family',
        'label'       => __( 'Body Font-Family', 'twentytwelve' ),
        'description' => __( 'Choose any google font you want!', 'twentytwelve' ),
        'help'        => __( 'Kirki integrates with google fonts and automatically does everything for you. From creating the fonts list to generating the google scripts needed.', 'twentytwelve' ),
        'section'     => 'typography',
        'default'     => 'Roboto',
        'priority'    => 10,
        'choices'     => Kirki_Fonts::get_font_choices(),
        'output'      => array(
            'element'  => 'body #page',
            'property' => 'font-family',
        )
    );

    $fields[] = array(
        'type'        => 'select',
        'setting'     => 'headers_font_family',
        'label'       => __( 'Headers Font-Family', 'twentytwelve' ),
        'description' => __( 'Choose any google font you want!', 'twentytwelve' ),
        'help'        => __( 'Kirki integrates with google fonts and automatically does everything for you. From creating the fonts list to generating the google scripts needed.', 'twentytwelve' ),
        'section'     => 'typography',
        'default'     => 'Roboto Slab',
        'priority'    => 10,
        'choices'     => Kirki_Fonts::get_font_choices(),
        'output'      => array(
            'element'  => 'body #page h1, body #page h2, body #page h3, body #page h4, body #page h5, body #page h6',
            'property' => 'font-family',
        )
    );

    $fields[] = array(
        'type'     => 'multicheck',
        'settings' => 'font_subsets',
        'label'    => __( 'Google-Font subsets', 'twentytwelve' ),
        'description' => __( 'The subsets used from Google\'s API.', 'twentytwelve' ),
        'section'  => 'typography',
        'default'  => 'all',
        'priority' => 10,
        'choices'  => Kirki_Fonts::get_google_font_subsets(),
        'output' => array(
            'element'  => 'body #page',
            'property' => 'font-subset',
        ),
    );

    $fields[] = array(
        'type'     => 'slider',
        'settings' => 'base_font_size',
        'label'    => __( 'Base font-size', 'twentytwelve' ),
        'section'  => 'typography',
        'priority' => 20,
        'default'  => 16,
        'choices'  => array(
            'min'  => 4,
            'max'  => 32,
            'step' => 1,
        ),
        'output'   => array(
            'property' => 'font-size',
            'units'    => 'px',
            'element'  => 'body #page',
        )
    );

    $fields[] = array(
        'type'     => 'slider',
        'settings' => 'font_base_weight',
        'label'    => __( 'Base Font Weight', 'twentytwelve' ),
        'section'  => 'typography',
        'default'  => 100,
        'priority' => 25,
        'choices'  => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
        'output' => array(
            'element'  => 'body #page',
            'property' => 'font-weight',
        ),
    );

    $fields[] = array(
        'type'     => 'slider',
        'settings' => 'font_base_height',
        'label'    => __( 'Base Line Height', 'twentytwelve' ),
        'section'  => 'typography',
        'default'  => 1.43,
        'priority' => 30,
        'choices'  => array(
            'min'  => 0,
            'max'  => 3,
            'step' => 0.01,
        ),
        'output' => array(
            'element'  => 'body #page',
            'property' => 'line-height',
        ),
    );

    $fields[] = array(
        'type'     => 'slider',
        'settings' => 'font_headers_weight_h1',
        'label'    => __( 'H1 Font Weight', 'twentytwelve' ),
        'section'  => 'typography',
        'default'  => 900,
        'priority' => 35,
        'choices'  => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
        'output' => array(
            'element'  => 'body #page h1',
            'property' => 'font-weight',
        ),
    );

    $fields[] = array(
        'type'     => 'slider',
        'settings' => 'font_headers_weight_h2',
        'label'    => __( 'H2 Font Weight', 'twentytwelve' ),
        'section'  => 'typography',
        'default'  => 800,
        'priority' => 40,
        'choices'  => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
        'output' => array(
            'element'  => 'body #page h2',
            'property' => 'font-weight',
        ),
    );

    $fields[] = array(
        'type'     => 'slider',
        'settings' => 'font_headers_weight_h3',
        'label'    => __( 'H2 Font Weight', 'twentytwelve' ),
        'section'  => 'typography',
        'default'  => 600,
        'priority' => 45,
        'choices'  => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
        'output' => array(
            'element'  => 'body #page h3',
            'property' => 'font-weight',
        ),
    );

    $fields[] = array(
        'type'     => 'slider',
        'settings' => 'font_headers_weight_h4',
        'label'    => __( 'H4 Font Weight', 'twentytwelve' ),
        'section'  => 'typography',
        'default'  => 400,
        'priority' => 50,
        'choices'  => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
        'output' => array(
            'element'  => 'body #page h4',
            'property' => 'font-weight',
        ),
    );

    $fields[] = array(
        'type'     => 'slider',
        'settings' => 'font_h1_size',
        'label'    => __( 'H1 Font Size', 'twentytwelve' ),
        'section'  => 'typography',
        'default'  => 52,
        'priority' => 55,
        'choices'  => array(
            'min'  => 7,
            'max'  => 72,
            'step' => 1,
        ),
        'output' => array(
            'element'  => 'body #page h1',
            'property' => 'font-size',
            'units'    => 'px',
        ),
    );

    $fields[] = array(
        'type'     => 'slider',
        'settings' => 'font_h2_size',
        'label'    => __( 'H2 Font Size', 'twentytwelve' ),
        'section'  => 'typography',
        'default'  => 36,
        'priority' => 60,
        'choices'  => array(
            'min'  => 7,
            'max'  => 72,
            'step' => 1,
        ),
        'output' => array(
            'element'  => 'body #page h2',
            'property' => 'font-size',
            'units'    => 'px',
        ),
    );

    $fields[] = array(
        'type'     => 'slider',
        'settings' => 'font_h3_size',
        'label'    => __( 'H3 Font Size', 'twentytwelve' ),
        'section'  => 'typography',
        'default'  => 24,
        'priority' => 65,
        'choices'  => array(
            'min'  => 7,
            'max'  => 72,
            'step' => 1,
        ),
        'output' => array(
            'element'  => 'body #page h3',
            'property' => 'font-size',
            'units'    => 'px',
        ),
    );

    $fields[] = array(
        'type'     => 'slider',
        'settings' => 'font_h4_size',
        'label'    => __( 'H4 Font Size', 'twentytwelve' ),
        'section'  => 'typography',
        'default'  => 18,
        'priority' => 70,
        'choices'  => array(
            'min'  => 7,
            'max'  => 72,
            'step' => 1,
        ),
        'output' => array(
            'element'  => 'body #page h4',
            'property' => 'font-size',
            'units'    => 'px',
        ),
    );

    $fields[] = array(
        'type'        => 'background',
        'setting'     => 'background',
        'label'       => __( 'Main Background', 'twentytwelve' ),
        'description' => __( 'Choose a background image and color for your site', 'twentytwelve' ),
        'section'     => 'background',
        'default'     => array(
            'color'    => 'rgba(10,10,10,0.22)',
            'image'    => '',
            'repeat'   => 'no-repeat',
            'size'     => 'cover',
            'attach'   => 'fixed',
            'position' => 'left-top',
        ),
        'priority'    => 10,
        'output'      => 'html body.custom-background-empty, html body',
        'units'       => ' !important'
    );

	$fields[] = array(
        'type'     => 'radio-image',
        'settings' => 'layout',
        'label'    => __( 'Layout', 'twentytwelve' ),
        'section'  => 'layout',
        'default'  => 'right-sidebar',
        'priority' => 10,
        'choices'  => array(
			'full'          => trailingslashit( KIRKI_URL ) . 'assets/images/1c.png',
			'left-sidebar'  => trailingslashit( KIRKI_URL ) . 'assets/images/2cl.png',
			'right-sidebar' => trailingslashit( KIRKI_URL ) . 'assets/images/2cr.png',
        ),
    );

	$fields[] = array(
        'type'     => 'slider',
        'settings' => 'site_width',
        'label'    => __( 'Site width', 'twentytwelve' ),
        'section'  => 'layout',
        'priority' => 20,
        'default'  => 1020,
        'choices'  => array(
            'min'  => 640,
            'max'  => 1600,
            'step' => 1,
        ),
        'output'   => array(
			'element'  => 'body #page',
            'property' => 'max-width',
            'units'    => 'px',
        )
    );

	return $fields;

}
add_filter( 'kirki/fields', 'kirki_twentytwelve_fields' );

/**
 * Configuration sample for the Kirki Customizer
 */
function kirki_twentytwelve_configuration() {

    $args = array(
        'logo_image'    => 'http://kirki.org/images/logo.png',
        'description'   => __( 'This is the theme description. You can edit it in the Kirki configuration and add whatever you want here.', 'twentytwelve' ),
        'color_accent'  => '#00bcd4',
        'color_back'    => '#455a64',
    );

    return $args;

}
add_filter( 'kirki/config', 'kirki_twentytwelve_configuration' );

/**
 * Custom CSS
 */
function kirki_twentytwelve_custom_css() {

	// Early exit if Kirki is not installed
	if ( ! function_exists( 'kirki_get_option' ) ) {
		return;
	}

	// Add custom CSS for layouts
	$css = '';
	if ( 'full' == kirki_get_option( 'layout' ) ) {
		$css .= '#primary{width:100%;}';
	} elseif ( 'left-sidebar' == kirki_get_option( 'layout' ) ) {
		$css .= '#primary{float:right;}#secondary{float:left;}';
	}

	wp_add_inline_style( 'twentytwelve-style', $css );

}
add_action( 'wp_enqueue_scripts', 'kirki_twentytwelve_custom_css' );
