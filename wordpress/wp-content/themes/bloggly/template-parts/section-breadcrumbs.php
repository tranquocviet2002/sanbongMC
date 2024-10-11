<?php 
$bloggly_option = blogone_theme_options();
$bloggly_bubble_shows = get_theme_mod('bloggly_breadcrumb_bubble_shows', true);
$bloggly_waves_shows  = get_theme_mod('bloggly_breadcrumb_waves_shows', true);

$bloggly_breadcrumb_class = '';
if($bloggly_option['blogone_breadcrumb_bg_image']!=''){
	$bloggly_breadcrumb_class = 'bg_image';
}
if( $bloggly_option['blogone_breadcrumb_show'] == true ){
	?>
	<section class="breadcrumb-area <?php echo esc_attr($bloggly_breadcrumb_class); ?>">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breadcrumb-content">
						<?php if( $bloggly_option['blogone_breadcrumb_title_show'] == true ){ ?>
							<div class="breadcrumb-heading">
								<?php 
								blogone_breadcrumbs_title();
								?>
							</div>
						<?php } ?>

						<?php 
						if( $bloggly_option['blogone_breadcrumb_path_show'] == true ){
							blogone_breadcrumbs();
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<?php if($bloggly_bubble_shows == true ){ ?>
			<div class="bs-bubbles">
				<div class="bs-bubble"></div>
				<div class="bs-bubble"></div>
				<div class="bs-bubble"></div>
				<div class="bs-bubble"></div>
				<div class="bs-bubble"></div>
				<div class="bs-bubble"></div>
				<div class="bs-bubble"></div>
				<div class="bs-bubble"></div>
				<div class="bs-bubble"></div>
				<div class="bs-bubble"></div>
			</div>
		<?php } 
		if($bloggly_waves_shows == true ){ ?>
			<svg class="bs-waves bs-waves-bread" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto"> <defs> <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path> </defs> <g class="bs-parallax"> <use xlink:href="#gentle-wave" x="48" y="2" fill-opacity="0.05"></use> <use xlink:href="#gentle-wave" x="48" y="4" fill-opacity="0.05"></use> <use xlink:href="#gentle-wave" x="48" y="7" fill-opacity="0.05"></use> </g> </svg>
		<?php } ?>
	</section>
	<?php } ?>