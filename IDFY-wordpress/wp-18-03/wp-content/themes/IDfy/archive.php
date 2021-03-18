<?php
/**
 * The template for displaying Archive pages.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>
<div id="left-sidebar" class="widget-area grid-35 tablet-grid-35 grid-parent sidebar" itemtype="https://schema.org/WPSideBar" itemscope="">
   <?php echo do_shortcode('[INSERT_ELEMENTOR id="3036"]'); ?>
</div>

	<div id="primary" <?php generate_do_element_classes( 'content' ); ?>>
		<main id="main" <?php generate_do_element_classes( 'main' ); ?>>
			<?php
			/**
			 * generate_before_main_content hook.
			 *
			 * @since 0.1
			 */
			do_action( 'generate_before_main_content' );

			if ( generate_has_default_loop() ) {
				if ( have_posts() ) :

					/**
					 * generate_archive_title hook.
					 *
					 * @since 0.1
					 *
					 * @hooked generate_archive_title - 10
					 */
					do_action( 'generate_archive_title' );
				
				   ?><div class="idfy-listing"> <?php
				
					$i=1;

					while ( have_posts() ) :

						the_post();
				?>
					<?php 
						$background = get_post_meta(get_the_ID(), 'background', true);
						$image_id = get_post_meta( $post->ID, '_idfy_image_id', true );		
						$content_image = wp_get_attachment_image( $image_id, 'post-thumbnail' );
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 

					 ?>

					<?php if($i==1) { ?>	
					<div class="top-post-listing">
					<?php } ?>	

					<?php if($i<=1) { ?>
					<div class="idfy-left">
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> style='<?php if($featured_img_url){ echo 'background:url("'.esc_url($featured_img_url).'") no-repeat';} ?>'>
			<?php if($background){?><div class="idfy-bg" style='<?php if($background){ echo 'background:'.$background; }?>'></div><?php } ?>							
							<?php $categories = get_the_category(get_the_ID());  ?>
							<div class="my-cat"> <span class="add-bef">Chronicles /</span>
										  <?php 
											  if ( ! empty( $categories ) ) {
													echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
												}  ?>
							  </div>

							<a class="my-titl" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							<h3><a href="<?php the_permalink(); ?>">Read <span class="breadcrumbs-arrow">→</span></a></h3>
							
							<?php 

								if(has_excerpt())	
								{
									echo '<p>'.get_the_excerpt().'</p>';
								}

									 ?>
						</div>
					</div>

					<?php } if($i==2) { ?>	
					<div class="idfy-right">
						<div class="idfy-right-inn">
					<?php } ?>	
					<?php if($i>=2 && $i<=5) { ?>
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> style='<?php if($featured_img_url){ echo 'background:url("'.esc_url($featured_img_url).'") no-repeat';} ?>'>
			<?php if($background){?><div class="idfy-bg" style='<?php if($background){ echo 'background:'.$background; }?>'></div><?php } ?>								
							<?php $categories = get_the_category(get_the_ID());  ?>
							<div class="my-cat"> <span class="add-bef">Chronicles /</span>
										  <?php 
											  if ( ! empty( $categories ) ) {
													echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
												}  ?>
							  </div>

							<a class="my-titl" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							<h3><a href="<?php the_permalink(); ?>">Read <span class="breadcrumbs-arrow">→</span></a></h3>
							
						</div>
					<?php }  ?>	
					<?php if($i==5) { ?>	
					</div></div></div>
					<?php } ?>	

					<?php if($i==6) { ?>	
					<div class="bottom-post-listing">
					<?php } ?>	

					<?php if($i>=6) { ?>
					<div class="idfy-btm">
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> style='<?php if($featured_img_url){ echo 'background:url("'.esc_url($featured_img_url).'") no-repeat';} ?>'>
			<?php if($background){?><div class="idfy-bg" style='<?php if($background){ echo 'background:'.$background; }?>'></div><?php } ?>							
							<?php $categories = get_the_category(get_the_ID());  ?>
							<div class="my-cat"> <span class="add-bef">Chronicles /</span>
										  <?php 
											  if ( ! empty( $categories ) ) {
													echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
												}  ?>
							  </div>

							<a class="my-titl" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							<h3><a href="<?php the_permalink(); ?>">Read <span class="breadcrumbs-arrow">→</span></a></h3>
							
						</div>
					</div>

					<?php } ?>

					<?php if($i==11) { ?>	
					</div>
					<?php } ?>		

					<?php $i++; 
						//generate_do_template_part( 'archive' );
					endwhile;
				
					?></div><?php

					/**
					 * generate_after_loop hook.
					 *
					 * @since 2.3
					 */
					do_action( 'generate_after_loop', 'archive' );

				else :

					generate_do_template_part( 'none' );

				endif;
			}

			/**
			 * generate_after_main_content hook.
			 *
			 * @since 0.1
			 */
			do_action( 'generate_after_main_content' );
			?>
		</main>
	</div>

	<?php
	/**
	 * generate_after_primary_content_area hook.
	 *
	 * @since 2.0
	 */
	do_action( 'generate_after_primary_content_area' );

	generate_construct_sidebars();

	get_footer();
