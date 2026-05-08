<?php
/**
 * Footer template
 *
 * @package Gaia
 */
?>

</main>
<!-- Site Content -->
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