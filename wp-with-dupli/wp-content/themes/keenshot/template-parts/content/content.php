<?php

/**
 *
 * Description: keenshot theme main content page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage keenshot
 * @since 1.0.0
 */


if (has_post_thumbnail()) { ?>
	<li class="post-item align-center <?php echo $wp_query->current_post % 2 != 0 ? 'reverse' : ''; ?>">
		<a class="permalink" target="_blank" href="<?php the_permalink(); ?>">
			<div class="media ">
				<?php the_post_thumbnail('medium', array('class' => 'blog-image-size')); ?>
			</div>
		</a>

		<div class="post-meta">
			<a class="title" href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a>

			<div class="data">
				<p><?php echo get_the_date(); ?></p>
			</div>

			<div class="comment-whislist">
				<i class="fa fa-heart like" rel="<?php echo esc_attr($post->ID, 'keenshot'); ?>"></i>
				<a class="like_counter whishlist" rel="<?php echo esc_attr($post->ID, 'keenshot'); ?>"><?php echo esc_html(keenshot_like_count($post->ID), 'keenshot'); ?></a>

				<a href="<?php echo esc_url(get_permalink()); ?>">
					<p><?php echo (get_comments_number($post->ID) == 0 ? 'No Comments' : esc_html(get_comments_number($post->ID), 'keenshot') . 'Comments'); ?><span class="fa fa-comment-alt"></span></p>
				</a>
				<p></p>
			</div>
		</div><!-- / post meta -->
	</li><!-- / post -->
<?php	} else { ?>
	<li class="no-thumb post-item align-center">
		<div class="post-meta">
			<div class="post-title">
				<a class="title" href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a>
			</div>
			<div class="data post-date">
				<p><?php echo get_the_date(); ?></p>
			</div>

			<div class="comment-whislist">
				<i class="fa fa-heart like" rel="<?php echo esc_attr($post->ID, 'keenshot'); ?>"></i>
				<a class="like_counter whishlist" rel="<?php echo esc_attr($post->ID, 'keenshot'); ?>"><?php echo esc_html(keenshot_like_count($post->ID), 'keenshot'); ?></a>

				<a href="<?php echo esc_url(get_permalink()); ?>">
					<p><?php echo (get_comments_number($post->ID) == 0 ? 'No Comments' : esc_html(get_comments_number($post->ID), 'keenshot') . 'Comments'); ?><span class="fa fa-comment-alt"></span></p>
				</a>
				<p></p>
			</div>
		</div><!-- / post meta -->
	</li><!-- / post -->
<?php }
