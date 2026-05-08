<?php
$featured_image = get_the_post_thumbnail_url();
$whatsapp_number = get_field( 'whatsapp', 'option' );
if ( ! $whatsapp_number ) {
	$whatsapp_number = get_field( 'whatsapp', 'contact-info' );
}
$accomodation_title = get_the_title();

$whatsapp_digits = $whatsapp_number ? preg_replace( '/\D+/', '', $whatsapp_number ) : '';
$whatsapp_message = sprintf(
	'Hello, I would like to make a reservation for %s. Please share availability and rates.',
	$accomodation_title
);
$whatsapp_url = $whatsapp_digits
	? 'https://wa.me/' . $whatsapp_digits . '?text=' . rawurlencode( $whatsapp_message )
	: '';
?>

<section class="banner" style="background-image: url('<?php echo esc_url( $featured_image ); ?>')">
	<div class="container">
		<div class="row align-items-end">
			<div class="col-lg-9 col-xl-8">
				<div class="accomodation-banner-box">
					<p class="accomodation-banner-kicker text-uppercase mb-2">Accommodation</p>
					<h1 class="heading-1 text-white mb-3"><?php echo esc_html( $accomodation_title ); ?></h1>
					<?php if ( $whatsapp_url ) : ?>
						<div class="accomodation-banner-actions d-flex flex-wrap align-items-center gap-3 mt-5">
							<a class="btn btn-primary" href="<?php echo esc_url( $whatsapp_url ); ?>" target="_blank"
								rel="noopener noreferrer">
								<div class="btn-wrapper">
									<div class="btn-text">Book Your Stay</div>
								</div>
							</a>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>