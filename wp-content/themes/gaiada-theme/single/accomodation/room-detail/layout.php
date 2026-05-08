<?php

$room_sections = array(
	'Room Overview' => get_field( 'room_overview' ),
	'In Room Media' => get_field( 'in_room_media' ),
	'Available Upon Request' => get_field( 'available_upon_request' ),
	'Bathroom' => get_field( 'bathroom' ),
	'Nearby Attraction' => get_field( 'nearby_attraction' ),
);

$render_room_section = function ( $title, $items ) {
	if ( empty( $items ) ) {
		return;
	}

	$item_chunks = count( $items ) > 5 ? array_chunk( $items, (int) ceil( count( $items ) / 2 ) ) : array( $items );
	?>
	<section class="room-overview py-5">
		<div class="container">
			<div class="row">
				<div class="col">
					<h2 class="heading-3"><?php echo esc_html( $title ); ?></h2>
				</div>
			</div>
			<div class="row  g-4">
				<?php foreach ( $item_chunks as $chunk ) : ?>
					<div class="col-12 col-md-6">
						<div class="room-item border rounded h-100 p-4">
							<ul class="mb-0">
								<?php foreach ( $chunk as $item ) : ?>
									<?php if ( ! empty( $item['label'] ) ) : ?>
										<li class="py-1">
											<?php echo esc_html( $item['label'] ); ?>
										</li>
									<?php endif; ?>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php
};

foreach ( $room_sections as $title => $items ) {
	$render_room_section( $title, $items );
}

