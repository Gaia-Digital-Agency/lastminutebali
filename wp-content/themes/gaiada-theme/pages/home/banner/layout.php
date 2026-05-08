<?php
$banner_title = get_field( 'banner_title' );
$banner_description = get_field( 'banner_description' );
$banner_image = get_field( 'banner_image' );
?>

<section class="banner d-flex align-items-end pb-5"
	style="background-image: url('<?php echo esc_url( $banner_image['url'] ); ?>')">
	<div class="banner-overlay"></div>
	<div class="container">
		<div class="row">
			<div class="heading-wrapper col-lg-8">
				<h1 class="heading-1 text-white"><?php echo $banner_title; ?></h1>
				<p class="text-white text-large text-uppercase mt-3"><?php echo $banner_description; ?></p>
			</div>
		</div>
	</div>
</section>