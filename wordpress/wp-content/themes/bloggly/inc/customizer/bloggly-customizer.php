<?php
function bloggly_customizer_settings( $wp_customize ){
    // Breadcrumb Square Bubble Shows
	$wp_customize->add_setting('bloggly_breadcrumb_bubble_shows',
		array(
			'sanitize_callback' => 'blogone_sanitize_checkbox',
			'default'           => true,
			'priority'          => 2,
		)
	);
	$wp_customize->add_control('bloggly_breadcrumb_bubble_shows',
		array(
			'type'        => 'checkbox',
			'label'       => esc_html__('Hide/Show Square Bubble', 'bloggly'),
			'section'     => 'section_breadcrumb',
		)
	);
	// Breadcrumb Waves Shows
	$wp_customize->add_setting('bloggly_breadcrumb_waves_shows',
		array(
			'sanitize_callback' => 'blogone_sanitize_checkbox',
			'default'           => true,
			'priority'          => 3,
		)
	);
	$wp_customize->add_control('bloggly_breadcrumb_waves_shows',
		array(
			'type'        => 'checkbox',
			'label'       => esc_html__('Hide/Show Waves', 'bloggly'),
			'section'     => 'section_breadcrumb',
		)
	);
}
add_action('customize_register','bloggly_customizer_settings');