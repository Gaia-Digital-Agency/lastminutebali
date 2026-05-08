<?php

$accomodations = new WP_Query(
	array(
		'post_type'      => 'accomodation',
		'posts_per_page' => 6,
		'post_status'    => 'publish',
		'orderby'        => 'date',
		'order'          => 'DESC',
	)
);

?>

<section id="accomodation-listing" class="home-accomodation py-5">
	<div class="container">
		<div class="row align-items-end g-3">
			<div class="col-lg-8">
				<p class="home-section-kicker text-uppercase mb-2">Stay With Us</p>
				<h2 class="heading-2 mb-0">Accommodation</h2>
			</div>
		</div>

		<div class="row g-4 mt-4">
			<?php if ( $accomodations->have_posts() ) : ?>
				<?php while ( $accomodations->have_posts() ) : $accomodations->the_post(); ?>
					<?php $features = get_field( 'features' ); ?>
					<div class="col-12">
						<article class="accomodation-card h-100">
							<a class="accomodation-card-link h-100 d-flex flex-column flex-lg-row text-decoration-none" href="<?php the_permalink(); ?>">
								<div class="accomodation-card-media flex-shrink-0">
									<?php if ( has_post_thumbnail() ) : ?>
										<?php the_post_thumbnail( 'large', array( 'class' => 'img-fluid w-100' ) ); ?>
									<?php else : ?>
										<div class="accomodation-card-placeholder d-flex align-items-center justify-content-center">
											<span>No image available</span>
										</div>
									<?php endif; ?>
								</div>

								<div class="accomodation-card-body d-flex flex-column flex-grow-1">
									<div class="accomodation-card-label text-uppercase mb-2">Accommodation</div>
									<h3 class="heading-4 mb-3"><?php the_title(); ?></h3>
									<?php if ( $features ) : ?>
										<ul class="accomodation-card-features list-unstyled d-flex flex-wrap gap-2 mb-3">
											<?php foreach ( $features as $feature ) : ?>
												<?php if ( empty( $feature['label'] ) ) : ?>
													<?php continue; ?>
												<?php endif; ?>
												<li class="accomodation-feature-pill d-inline-flex align-items-center gap-2">
													<?php if ( ! empty( $feature['icon'] ) ) : ?>
														<img
															src="<?php echo esc_url( $feature['icon']['sizes']['thumbnail'] ?? $feature['icon']['url'] ); ?>"
															alt="<?php echo esc_attr( $feature['icon']['alt'] ?? $feature['label'] ); ?>">
													<?php endif; ?>
													<span><?php echo esc_html( $feature['label'] ); ?></span>
												</li>
											<?php endforeach; ?>
										</ul>
									<?php endif; ?>
									<div class="accomodation-card-excerpt flex-grow-1">
										<?php echo wpautop( wp_trim_words( get_the_excerpt() ? get_the_excerpt() : wp_strip_all_tags( get_the_content() ), 24 ) ); ?>
									</div>
									<span class="accomodation-card-cta mt-4">View details</span>
								</div>
							</a>
						</article>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php else : ?>
				<div class="col">
					<div class="accomodation-empty">
						<p class="mb-0">No accomodation posts found.</p>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
