<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package Dickinsons
 * @since Dickinsons 1.0.0
 */
?>

<?php if ( is_active_sidebar( 'sidebar_product' )  ) : ?>
	<aside class="left-rail left-rail--product" role="complementary">

		<div class="placeholder-desktop">
			<div class="product-images">
				<?php
				// Start the loop.
				while ( have_posts() ) : the_post();

					$images = get_field_object('images');

					if($images['value'] && is_array($images['value'])){
						echo '<div class="popup-gallery gallery-slide">';
						foreach ($images['value'] as $index => $image) {
							echo '<div class="popup-gallery-item" style="display: none;"><a href="' . $image['url'] . '" title="' . get_the_title() . '"><img src="' . $image['url'] . '" alt="" /></a></div>';
						}
						echo '</div>';


						echo '<div class="gallery-nav">';
						foreach ($images['value'] as $index => $image) {
							echo '<div class="gallery-item"><a href="javascript:void(0);" data-slick="' . $index . '" title="' . get_the_title() . '"><img src="' . $image['sizes']['thumb_menu'] . '" alt="" /></a></div>';
						}
						echo '</div>';
					}

					// End of the loop.
				endwhile;
				?>

			</div>
		</div>

		<?php dynamic_sidebar( 'sidebar_product' ); ?>

	</aside>
<?php endif; ?>


