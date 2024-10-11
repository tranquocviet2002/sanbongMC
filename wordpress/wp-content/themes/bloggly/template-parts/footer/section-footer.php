<?php 
$bloggly_option = blogone_theme_options();

$bs_main_footer_class = '';
if($bloggly_option['blogone_footer_bg_image']!=''){
	$bs_main_footer_class = 'bg_image';
}
?>
<footer class="bs-footer_wrapper">
	
	<?php do_action('blogone_footer_inner_before'); ?>

	<div class="bs-main_footer <?php echo esc_attr($bs_main_footer_class); ?>">
		<div class="container">
			<?php do_action('blogone_footer_area'); ?>
		</div>
	</div>
	<svg class="bs-waves bs-wave-color" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">    <defs> 
		    <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path> 
		</defs>
		<g class="bs-parallax">
			<use xlink:href="#gentle-wave" x="48" y="2" fill-opacity="0.06"></use>
			<use xlink:href="#gentle-wave" x="48" y="4" fill-opacity="0.06"></use>
			<use xlink:href="#gentle-wave" x="48" y="7" fill-opacity="0.06"></use>
		</g>
	 </svg>

	<?php do_action('blogone_footer_inner_after'); ?>

</footer>