<?php
/**
 * Footer template
 *
 * @package Gaia
 */

$whatsapp_number = get_field( 'whatsapp', 'option' );
if ( ! $whatsapp_number ) {
	$whatsapp_number = get_field( 'whatsapp', 'contact-info' );
}

$whatsapp_digits = $whatsapp_number ? preg_replace( '/\D+/', '', $whatsapp_number ) : '';
$whatsapp_message = "Hi, I'm interested in booking a room. Could you send over your rates and let me know what's available? Thanks!";
$whatsapp_url     = $whatsapp_digits
	? 'https://wa.me/' . $whatsapp_digits . '?text=' . rawurlencode( $whatsapp_message )
	: '';
?>

</main>
<!-- Site Content -->
<?php if ( $whatsapp_url ) : ?>
	<a class="whatsapp-float" href="<?php echo esc_url( $whatsapp_url ); ?>" target="_blank" rel="noopener noreferrer"
		aria-label="Chat on WhatsApp">
		<i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
		<span class="visually-hidden">Chat on WhatsApp</span>
	</a>
<?php endif; ?>
<footer>
	<div class="container pt-5">
		<!-- Bottom -->
		<div class="d-flex flex-column flex-sm-row align-items-center py-5 border-top">
			<p class="mb-0">
				©
				<?php echo date( 'Y' ); ?>
				<?php bloginfo( 'name' ); ?>. All rights reserved.
			</p>

			<ul class="list-unstyled d-flex">
				<li class="ms-3">
					<a class="link-body-emphasis" href="#" aria-label="Instagram">
						<svg class="bi" width="24" height="24">
							<use xlink:href="#instagram"></use>
						</svg>
					</a>
				</li>
				<li class="ms-3">
					<a class="link-body-emphasis" href="#" aria-label="Facebook">
						<svg class="bi" width="24" height="24">
							<use xlink:href="#facebook"></use>
						</svg>
					</a>
				</li>
			</ul>
		</div>

	</div>
</footer>

<?php wp_footer(); ?>
</body>

</html>
