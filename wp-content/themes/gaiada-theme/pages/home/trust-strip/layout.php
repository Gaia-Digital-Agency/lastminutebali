<?php

$trust_points = array(
	array(
		'icon' => 'fa-solid fa-location-dot',
		'title' => 'Prime location',
		'text'  => 'A calm base with easy access to Bali experiences.',
	),
	array(
		'icon' => 'fa-solid fa-wifi',
		'title' => 'Connected stay',
		'text'  => 'Practical comfort for work, planning, and downtime.',
	),
	array(
		'icon' => 'fa-solid fa-bed',
		'title' => 'Curated rooms',
		'text'  => 'Accommodation choices designed for a smoother stay.',
	),
	array(
		'icon' => 'fa-solid fa-bell-concierge',
		'title' => 'Guest-focused service',
		'text'  => 'Thoughtful support from check-in to checkout.',
	),
);

?>

<section class="home-trust-strip py-4 py-lg-5">
	<div class="container">
		<div class="row g-3 row-cols-1 row-cols-md-2 row-cols-xl-4">
			<?php foreach ( $trust_points as $point ) : ?>
				<div class="col">
					<div class="trust-item h-100 d-flex align-items-start gap-3">
						<div class="trust-icon d-inline-flex align-items-center justify-content-center">
							<i class="<?php echo esc_attr( $point['icon'] ); ?>"></i>
						</div>
						<div class="trust-copy">
							<h2 class="heading-5 mb-1"><?php echo esc_html( $point['title'] ); ?></h2>
							<p class="mb-0"><?php echo esc_html( $point['text'] ); ?></p>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
