<?php

$title = get_the_title();
$content = apply_filters( 'the_content', get_the_content() );
$features = get_field( 'features' );

?>

<section class="description py-5">
	<div class="container">
		<div class="row mt-5">
			<div class="col-4">
				<?php if ( have_rows( 'features' ) ) : ?>
					<?php while ( have_rows( 'features' ) ) :
						the_row(); ?>
						<div class="feature d-flex gap-3">
							<span class="feature-icon">
								<?php $icon = get_sub_field( 'icon' ); ?>
								<?php if ( $icon ) : ?>
									<img src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>">
								<?php endif; ?>
							</span>
							<span class="feature-text">
								<?php the_sub_field( 'label' ); ?>
							</span>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
			<div class="col-8">
				<?php echo $content; ?>
			</div>
		</div>
	</div>
</section>