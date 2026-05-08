<?php

$gallery = get_field( 'gallery' );

?>

<section class="gallery pb-5">
	<div class="container">
		<div class="row">
			<div class="col">
				<h2 class="heading-2">Gallery</h2>
			</div>
		</div>
		<div class="row row-cols-2 row-cols-md-4 g-2 mt-4">
			<?php if ( $gallery ) : ?>
				<?php foreach ( $gallery as $index => $image ) : ?>
					<div class="col">
						<a class="gallery-item rounded" href="#" data-bs-toggle="modal" data-bs-target="#galleryModal"
							data-bs-image="<?php echo esc_url( $image['url'] ); ?>">
							<img src="<?php echo esc_url( $image['sizes']['medium'] ); ?>" class="img-fluid"
								alt="<?php echo esc_attr( $image['alt'] ); ?>">
						</a>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</section>

<!-- Bootstrap 5 Modal -->
<div class="modal fade" id="galleryModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body p-0">
				<img src="" class="img-fluid w-100" id="modalImage" alt="Gallery Image">
			</div>
		</div>
	</div>
</div>