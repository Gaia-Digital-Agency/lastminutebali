<?php

$why_points = array(
	array(
		'icon' => 'fa-solid fa-couch',
		'title' => 'Modern comfort',
		'text' => 'Clean layouts, practical amenities, and an easy stay flow.',
	),
	array(
		'icon' => 'fa-solid fa-umbrella-beach',
		'title' => 'Bali-ready base',
		'text' => 'Designed for guests who want a simple, reliable home base.',
	),
	array(
		'icon' => 'fa-solid fa-shield-heart',
		'title' => 'Brand-level consistency',
		'text' => 'A polished experience that feels cohesive from hero to checkout.',
	),
);

?>

<section class="home-why-us py-5">
	<div class="container">
		<div class="row align-items-center g-5">
			<div class="col-lg-5">
				<p class="home-section-kicker text-uppercase mb-2">Why Last Minute Bali</p>
				<h2 class="heading-2 mb-3">A more deliberate stay experience.</h2>
				<p class="home-why-copy mb-4">
					Last Minute Bali is made for guests who want an easy, reliable stay without the noise.
					The homepage should feel calm, considered, and clear—setting the right tone before someone even
					scrolls.
				</p>
				<a class="btn btn-primary" href="#accomodation-listing">
					<div class="btn-wrapper">
						<div class="btn-text">Explore rooms</div>
					</div>
				</a>
			</div>

			<div class="col-lg-7">
				<div class="row g-4">
					<?php foreach ( $why_points as $point ) : ?>
						<div class="col-md-4">
							<div class="why-card h-100">
								<div class="why-icon">
									<i class="<?php echo esc_attr( $point['icon'] ); ?>"></i>
								</div>
								<h3 class="heading-5 mb-2"><?php echo esc_html( $point['title'] ); ?></h3>
								<p class="mb-0"><?php echo esc_html( $point['text'] ); ?></p>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>
