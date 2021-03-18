<?php
/**
 * The template for displaying single posts.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<div id="left-sidebar" class="widget-area grid-35 tablet-grid-35 grid-parent sidebar" itemtype="https://schema.org/WPSideBar" itemscope="">
   <?php echo do_shortcode('[INSERT_ELEMENTOR id="3036"]'); ?>
</div>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_do_microdata( 'article' ); ?>>
	<div class="inside-article">
		<div class="my-bread">
			<div class="inside-bread">
				<div class="in-bed"><a href='<?php echo get_home_url(); ?>/chronicles'>Blog Overview <span class="menu-arrow">→</span></a> <?php
					
					$categories = get_the_category();
					$separator = ', ';
					$output = '';
					if ( ! empty( $categories ) ) {
						foreach( $categories as $category ) {
							$output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
						}
						echo trim( $output, $separator );
					}
					
					?> <span class="menu-arrow1">→</span> <?php the_title( '<span>', '</span>' ); ?></div>
				<?php the_title( '<h1>', '</h1>' ); ?>
				<div class="posted-date"><time itemprop="datePublished"><?php echo get_the_date( 'd M Y' ) ?></time></div>
			</div>
		</div>
		<?php
		/**
		 * generate_before_content hook.
		 *
		 * @since 0.1
		 *
		 * @hooked generate_featured_page_header_inside_single - 10
		 */
		do_action( 'generate_before_content' );

		if ( generate_show_entry_header() ) :
			?>
			<header class="entry-header">
				<?php
				/**
				 * generate_before_entry_title hook.
				 *
				 * @since 0.1
				 */
				do_action( 'generate_before_entry_title' );

				if ( generate_show_title() ) {
					$params = generate_get_the_title_parameters();

					the_title( $params['before'], $params['after'] );
				}

				/**
				 * generate_after_entry_title hook.
				 *
				 * @since 0.1
				 *
				 * @hooked generate_post_meta - 10
				 */
				do_action( 'generate_after_entry_title' );
				?>
			</header>
			<?php
		endif;

		/**
		 * generate_after_entry_header hook.
		 *
		 * @since 0.1
		 *
		 * @hooked generate_post_image - 10
		 */
		/*do_action( 'generate_after_entry_header' );

		$itemprop = '';

		if ( 'microdata' === generate_get_schema_type() ) {
			$itemprop = ' itemprop="text"';
		}*/
		?>

		<div class="entry-content"<?php echo $itemprop; // phpcs:ignore -- No escaping needed. ?>>
		<div class="idfy-content-main">
				<div class="idfy-content-1">			
						<?php if ( ! has_excerpt() ) { echo ''; }  else { ?>
						<div class="idfy-sub-title">	
								<?php the_excerpt(); ?>
						</div>
						<?php } ?>
				
					<div class="idfy-desc">
						<?php the_content(); ?>
					</div>
				</div>	
				<div class="idfy-content-2">
					<div class="idfy-body-img">
						<?php 
						 $image_id = get_post_meta( $post->ID, '_idfy_image_id', true );

						  echo wp_get_attachment_image( $image_id, 'post-thumbnail' );
						
						?>
					</div>
				</div>
		</div>
			<?php

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'generatepress' ),
					'after'  => '</div>',
				)
			);
			?>
		</div>

		<?php
		/**
		 * generate_after_entry_content hook.
		 *
		 * @since 0.1
		 *
		 * @hooked generate_footer_meta - 10
		 */
	//	do_action( 'generate_after_entry_content' );

		/**
		 * generate_after_content hook.
		 *
		 * @since 0.1
		 */
		do_action( 'generate_after_content' );
		?>
	</div>
</article>