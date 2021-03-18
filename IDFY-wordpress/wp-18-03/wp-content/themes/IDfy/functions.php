<?php
/*This file is part of IDfy, generatepress child theme.

All functions of this file will be loaded before of parent theme functions.
Learn more at https://codex.wordpress.org/Child_Themes.

Note: this function loads the parent stylesheet before, then child theme stylesheet
(leave it in place unless you know what you are doing.)
*/

if ( ! function_exists( 'suffice_child_enqueue_child_styles' ) ) {
	function IDfy_enqueue_child_styles() {
	    // loading parent style
	    wp_register_style(
	      'parente2-style',
	      get_template_directory_uri() . '/style.css'
	    );

	    wp_enqueue_style( 'parente2-style' );
	    // loading child style
	    wp_register_style(
	      'childe2-style',
	      get_stylesheet_directory_uri() . '/style.css'
	    );
	    wp_enqueue_style( 'childe2-style');
		
		
	 }
}
add_action( 'wp_enqueue_scripts', 'IDfy_enqueue_child_styles' );

/*Write here your own functions */

/**
 * Enqueue responsive query stylesheet
 */ 

function icon_enqueue_admin_script( $hook ) {
    if ( 'post.php' != $hook ) {
        return;
    }
    wp_enqueue_script( 'secondimage', get_stylesheet_directory_uri() . '/js/image.js', array(), '1.0' );
}
add_action( 'admin_enqueue_scripts', 'icon_enqueue_admin_script' );


add_action( 'wp_enqueue_scripts', 'my_plugin_add_stylesheet' );
function my_plugin_add_stylesheet() {
    wp_enqueue_style( 'responsive-query', get_stylesheet_directory_uri() . '/responsive-query.css');
}

add_action( 'wp_enqueue_scripts', 'idfy_scroll' );
function idfy_scroll() {
    wp_enqueue_script( 'idfy-js', get_stylesheet_directory_uri() . '/js/image.js');	
	wp_localize_script( 'idfy-js', 'idfy', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );	
}

add_action( 'wp_footer', 'slide' );
function slide() {
?><script>	
jQuery(".elementor-element-23e102b").addClass('active');
	
document.querySelectorAll('.smooth-scroll-btn a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});		
		
jQuery(".elementor-element-cfe2ea1").after('<div class="idfy-btn-main"><div class="idfy-btn"><button class="bt1">Customer</button><button class="bt2">Employee</button><button class="bt3">Partner</button><button class="bt4">Peer</button></div></div>');
	
			
	//jQuery(".elementor-element-23e102b").after('<div id="burger-wrap"><a class="burger"><span></span></a></div>');

	jQuery('.elementor-element-fac1d5e .idfy-btn-main').remove();
	
	jQuery(".idfy-home section").append('<div class="idfy-iframe-idfy-title"><div class="idfy-bind"><div class="idfy-title-main"><div class="idfy-title"><h2>UNLOCK</h2><h3>THE REAL</h3></div></div><div class="frame"><div class="button"><div class="active-val"></div><div class="btnText"><div>Customer</div><div>Employee</div><div>Partner</div>           <div>Peer</div></div></div></div></div>');
	

jQuery(document).ready(function($) {
	
$(document).on("click",".skip-next span.skiptoend-next",function() {
 var role = $(this).data('role');
 var pos = $(this).data('pos'); 
	$(this).parent().parent().parent().hide();
	
	if(role == 'customer' && pos == 1)
	{
	jQuery(".elementor-element-77a8abb2 .elementor-container .elementor-col-25:nth-child(1)").attr('style','width:25%;display:block;transition:width 1s;');
	jQuery(".elementor-element-77a8abb2 .elementor-container .elementor-col-25:nth-child(1)").addClass('wact');
	jQuery(".elementor-element-77a8abb2 .elementor-container .elementor-col-25:nth-child(2)").attr('style','width:50%;display:block;');	
	//jQuery(".elementor-element-77a8abb2 .elementor-container .elementor-col-25:nth-child(1) .skip-next").parent().parent().parent().hide();		
	window.setTimeout(function(){
				jQuery(".elementor-element-77a8abb2 .elementor-container .elementor-col-25:nth-child(2) .skip-next").parent().parent().parent().show();
	}, 1500);

	jQuery(".elementor-element-05afb7e").show();
	jQuery(".elementor-element-1edc496f").show();
	jQuery(".elementor-element-5aa1c89").hide();
	}
	if(role == 'customer' && pos == 2)
	{  
    jQuery(".elementor-element-77a8abb2 .elementor-container .elementor-col-25:nth-child(2)").attr('style','width:25%;display:block;transition:width 1s;');
	jQuery(".elementor-element-77a8abb2 .elementor-container .elementor-col-25:nth-child(2)").addClass('wact');
	window.setTimeout(function(){
	jQuery(".elementor-element-77a8abb2 .elementor-container .elementor-col-25:nth-child(3)").attr('style','width:50%;display:block;');
	}, 1000);		
	window.setTimeout(function(){
	jQuery(".elementor-element-77a8abb2 .elementor-container .elementor-col-25:nth-child(3) .skip-next").parent().parent().parent().show();
	}, 1500);
	jQuery(".elementor-element-474df057").show();	
	jQuery(".elementor-element-5aa1c89").show();
	jQuery(".elementor-element-2e5fa37").hide();	
	}
	if(role == 'customer' && pos == 3)
	{
	jQuery(".elementor-element-77a8abb2 .elementor-container .elementor-col-25:nth-child(3)").attr('style','width:25%;display:block;transition:width 1s;');
	jQuery(".elementor-element-77a8abb2 .elementor-container .elementor-col-25:nth-child(3)").addClass('wact');
	window.setTimeout(function(){	
	jQuery(".elementor-element-77a8abb2 .elementor-container .elementor-col-25:nth-child(4)").attr('style','width:25%;display:block;');
	}, 1000);	
	window.setTimeout(function(){
				jQuery(".elementor-element-77a8abb2 .elementor-container .elementor-col-25:nth-child(4) .skip-next").parent().parent().parent().show();
	}, 1500);
	jQuery(".elementor-element-3dc333a9").show();		
	jQuery(".elementor-element-294678f ").hide(); 	
	jQuery(".elementor-element-2e5fa37").show();	
	}
	if(role == 'customer' && pos == 4)
	{
	jQuery(".elementor-element-8bdf44a ").show(); 	
	jQuery(".elementor-element-294678f ").show(); 		 
	}
    if(role == 'employee' && pos == 1)
	{
	jQuery(".elementor-element-715d0e36 .elementor-container .elementor-col-25:nth-child(1)").attr('style','width:25%;transition:width 1s;');
	jQuery(".elementor-element-715d0e36 .elementor-container .elementor-col-25:nth-child(1)").addClass('wact');
	jQuery(".elementor-element-715d0e36 .elementor-container .elementor-col-25:nth-child(2)").attr('style','width:50%;display:block;');	
	window.setTimeout(function(){
				jQuery(".elementor-element-715d0e36 .elementor-container .elementor-col-25:nth-child(2) .skip-next").parent().parent().parent().show();
	}, 2000);

	jQuery(".elementor-element-44125093").show();
	jQuery(".elementor-element-2143d31e").show();
	jQuery(".elementor-element-4513082").hide();
	}
	if(role == 'employee' && pos == 2)
	{
	jQuery(".elementor-element-715d0e36 .elementor-container .elementor-col-25:nth-child(2)").attr('style','width:25%;display:block;transition:width 1s;');
	jQuery(".elementor-element-715d0e36 .elementor-container .elementor-col-25:nth-child(2)").addClass('wact');
	window.setTimeout(function(){
	jQuery(".elementor-element-715d0e36 .elementor-container .elementor-col-25:nth-child(3)").attr('style','width:50%;display:block;');
	}, 1000);	
	window.setTimeout(function(){
				jQuery(".elementor-element-715d0e36 .elementor-container .elementor-col-25:nth-child(3) .skip-next").parent().parent().parent().show();
	}, 2000);
	jQuery(".elementor-element-7a2cadd3").show();	
	jQuery(".elementor-element-4513082").show(); 
	jQuery(".elementor-element-1cd9f70").hide(); 
	}
	if(role == 'employee' && pos == 3)
	{
	jQuery(".elementor-element-715d0e36 .elementor-container .elementor-col-25:nth-child(3)").attr('style','width:25%;display:block;transition:width 1s;');
	jQuery(".elementor-element-715d0e36 .elementor-container .elementor-col-25:nth-child(3)").addClass('wact');
	window.setTimeout(function(){	
	jQuery(".elementor-element-715d0e36 .elementor-container .elementor-col-25:nth-child(4)").attr('style','width:25%;display:block;');
	}, 1000);	
	window.setTimeout(function(){
				jQuery(".elementor-element-715d0e36 .elementor-container .elementor-col-25:nth-child(4) .skip-next").parent().parent().parent().show();
	}, 2000);
	jQuery(".elementor-element-857a992").show();
	jQuery(".elementor-element-1cd9f70").show(); 
	jQuery(".elementor-element-7149e4c ").hide(); 
	}
	if(role == 'employee' && pos == 4)
	{
	jQuery(".elementor-element-37b88bcf ").show(); 	 
	jQuery(".elementor-element-7149e4c ").show(); 
	}
	if(role == 'partner' && pos == 1)
	{
	jQuery(".elementor-element-7650f7a4 .elementor-container .elementor-col-25:nth-child(1)").attr('style','width:25%;transition:width 1s;');
	jQuery(".elementor-element-7650f7a4 .elementor-container .elementor-col-25:nth-child(1)").addClass('wact');
	jQuery(".elementor-element-7650f7a4 .elementor-container .elementor-col-25:nth-child(2)").attr('style','width:50%;display:block;');	
	window.setTimeout(function(){
				jQuery(".elementor-element-7650f7a4 .elementor-container .elementor-col-25:nth-child(2) .skip-next").parent().parent().parent().show();
	}, 2000);

	jQuery(".elementor-element-440d61f").show();
	jQuery(".elementor-element-dde4b0e").hide(); 
	jQuery(".elementor-element-1e3ba21").show();		
	}
	if(role == 'partner' && pos == 2)
	{
	jQuery(".elementor-element-7650f7a4 .elementor-container .elementor-col-25:nth-child(2)").attr('style','width:25%;display:block;transition:width 1s;');
	jQuery(".elementor-element-7650f7a4 .elementor-container .elementor-col-25:nth-child(2)").addClass('wact');
	window.setTimeout(function(){
	jQuery(".elementor-element-7650f7a4 .elementor-container .elementor-col-25:nth-child(3)").attr('style','width:50%;display:block;');
	}, 1000);	
	window.setTimeout(function(){
				jQuery(".elementor-element-7650f7a4 .elementor-container .elementor-col-25:nth-child(3) .skip-next").parent().parent().parent().show();
	}, 2000);
	jQuery(".elementor-element-2751ca9f").show();	
	jQuery(".elementor-element-dde4b0e").show();
	jQuery(".elementor-element-11c1cbb6").hide();	 
	}
	if(role == 'partner' && pos == 3)
	{
	jQuery(".elementor-element-7650f7a4 .elementor-container .elementor-col-25:nth-child(3)").attr('style','width:25%;display:block;transition:width 1s;');
	jQuery(".elementor-element-7650f7a4 .elementor-container .elementor-col-25:nth-child(3)").addClass('wact');
	window.setTimeout(function(){	
	jQuery(".elementor-element-7650f7a4 .elementor-container .elementor-col-25:nth-child(4)").attr('style','width:25%;display:block;');
	}, 1000);	
	window.setTimeout(function(){
				jQuery(".elementor-element-7650f7a4 .elementor-container .elementor-col-25:nth-child(4) .skip-next").parent().parent().parent().show();
	}, 2000);
	jQuery(".elementor-element-6bcf1a3e").show();
	jQuery(".elementor-element-1e3ba21").show();	
	jQuery(".elementor-element-11c1cbb6").show();	
	jQuery(".elementor-element-8f81508").hide();	
	}
	if(role == 'partner' && pos == 4)
	{
	jQuery(".elementor-element-2637e582 ").show(); 	
	jQuery(".elementor-element-8f81508").show();	
	}
	if(role == 'peer' && pos == 1)
	{
	jQuery(".elementor-element-4727bfe5 .elementor-container .elementor-col-25:nth-child(1)").attr('style','width:25%;transition:width 1s;');
	jQuery(".elementor-element-4727bfe5 .elementor-container .elementor-col-25:nth-child(1)").addClass('wact');
	jQuery(".elementor-element-4727bfe5 .elementor-container .elementor-col-25:nth-child(2)").attr('style','width:50%;display:block;');	
	window.setTimeout(function(){
				jQuery(".elementor-element-4727bfe5 .elementor-container .elementor-col-25:nth-child(2) .skip-next").parent().parent().parent().show();
	}, 2000);

	jQuery(".elementor-element-6152ab14").show();
	jQuery(".elementor-element-8c934ae").hide();	
	jQuery(".elementor-element-e41601b").show();	
	}
	if(role == 'peer' && pos == 2)
	{
	jQuery(".elementor-element-4727bfe5 .elementor-container .elementor-col-25:nth-child(2)").attr('style','width:25%;display:block;transition:width 1s;');
	jQuery(".elementor-element-4727bfe5 .elementor-container .elementor-col-25:nth-child(2)").addClass('wact');
	window.setTimeout(function(){
	jQuery(".elementor-element-4727bfe5 .elementor-container .elementor-col-25:nth-child(3)").attr('style','width:50%;display:block;');
	}, 1000);	
	window.setTimeout(function(){
				jQuery(".elementor-element-4727bfe5 .elementor-container .elementor-col-25:nth-child(3) .skip-next").parent().parent().parent().show();
	}, 2000);
	jQuery(".elementor-element-3f60c24e").show();	
	jQuery(".elementor-element-8c934ae").show(); 
	jQuery(".elementor-element-fa064cf").hide(); 	
	}
	if(role == 'peer' && pos == 3)
	{
	jQuery(".elementor-element-4727bfe5 .elementor-container .elementor-col-25:nth-child(3)").attr('style','width:25%;display:block;transition:width 1s;');
	jQuery(".elementor-element-4727bfe5 .elementor-container .elementor-col-25:nth-child(3)").addClass('wact');
	window.setTimeout(function(){	
	jQuery(".elementor-element-4727bfe5 .elementor-container .elementor-col-25:nth-child(4)").attr('style','width:25%;display:block;');
	}, 1000);	
	window.setTimeout(function(){
				jQuery(".elementor-element-4727bfe5 .elementor-container .elementor-col-25:nth-child(4) .skip-next").parent().parent().parent().show();
	}, 2000);
	jQuery(".elementor-element-6be30521").show();
	jQuery(".elementor-element-c605ff3").hide(); 	
	jQuery(".elementor-element-fa064cf").show(); 		
	}
	if(role == 'peer' && pos == 4)
	{
	jQuery(".elementor-element-15fb5326").show(); 	
	jQuery(".elementor-element-c605ff3").show(); 		 
	}
});
		window.setTimeout(function(){
				jQuery(".idfy-title-main").addClass('idfy-title-animate');
				jQuery(".frame").addClass('idfy-frame-animate');
			}, 100);
	


});	

	
	
</script>		
<?php
}

function get_title()
{
	return '<div class="idfy-get-title-style"><h1>'.get_the_title().'</h1></div>';
}
add_shortcode('get_title','get_title');

/**
 * Create shorcode for print custom menu in page
 */ 

function print_menu_shortcode($atts, $content = null) {
extract(shortcode_atts(array( 'name' => null, ), $atts));
return wp_nav_menu( array( 'menu' => $name, 'echo' => false ) );
}
add_shortcode('menu', 'print_menu_shortcode');

/**
 * Chronicles/Testimonials
 */
add_shortcode( 'chronicles-testimonials', 'rmcc_post_listing_shortcode' );
function rmcc_post_listing_shortcode( $atts ) {
    ob_start();
    global $post;
    $query = new WP_Query( array(
        'post_type' => 'post',
        'posts_per_page' => 2,
    ) );
    if ( $query->have_posts() ) { ?>
        <div class="blog-archive79 sol-ovr">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="pr-post" id="post-<?php the_ID(); ?>">
				<div class="inner-items">
    					<?php $categories = get_the_category();  ?>
                             <div class="my-cat">
                                  <?php 
                                      if ( ! empty( $categories ) ) {
                                            echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                                        }  ?>
                            </div>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<h3><a href="<?php the_permalink(); ?>">Read <span class="menu-arrow1">→</span></a></h3>
			     </div>
            </div>
            <?php endwhile; ?>
        </div>
    <?php wp_reset_postdata(); ?>
    <?php $myvariable = ob_get_clean();
    return $myvariable;
    }
}


function mega_menu_section()
{
	echo do_shortcode('[INSERT_ELEMENTOR id="1608"]');
}
add_action('wp_footer','mega_menu_section');


add_action( 'add_meta_boxes', 'icon_image_add_metabox' );
function icon_image_add_metabox () {
    add_meta_box( 'idfyimagediv', __( 'Body Image', 'text-domain' ), 'idfy_image_metabox', 'post', 'normal', 'low');
}

function idfy_image_metabox ( $post ) {
    global $content_width, $_wp_additional_image_sizes;

    $image_id = get_post_meta( get_the_ID(), '_idfy_image_id', true );

    $old_content_width = $content_width;
    $content_width = 254;

    if ( $image_id && get_post( $image_id ) ) {

        if ( ! isset( $_wp_additional_image_sizes['post-thumbnail'] ) ) {
            $thumbnail_html = wp_get_attachment_image( $image_id, array( $content_width, $content_width ) );
        } else {
            $thumbnail_html = wp_get_attachment_image( $image_id, 'post-thumbnail' );
        }

        if ( ! empty( $thumbnail_html ) ) {
            $content = $thumbnail_html;
            $content .= '<p class="hide-if-no-js"><a href="javascript:;" id="remove_idfy_image_button" >' . esc_html__( 'Remove content image', 'text-domain' ) . '</a></p>';
            $content .= '<input type="hidden" id="upload_idfy_image" name="_idfy_cover_image" value="' . esc_attr( $image_id ) . '" />';
        }

        $content_width = $old_content_width;
    } else {

        $content = '<img src="" style="width:' . esc_attr( $content_width ) . 'px;height:auto;border:0;display:none;" />';
        $content .= '<p class="hide-if-no-js"><a title="' . esc_attr__( 'Set icon image', 'text-domain' ) . '" href="javascript:;" id="upload_idfy_image_button" id="set-icon-image" data-uploader_title="' . esc_attr__( 'Choose an image', 'text-domain' ) . '" data-uploader_button_text="' . esc_attr__( 'Set body image', 'text-domain' ) . '">' . esc_html__( 'Set body image', 'text-domain' ) . '</a></p>';
        $content .= '<input type="hidden" id="upload_idfy_image" name="_idfy_cover_image" value="" />';

    }

    echo $content;
}

add_action( 'save_post', 'icon_image_save', 10, 1 );
function icon_image_save ( $post_id ) {
    if( isset( $_POST['_idfy_cover_image'] ) ) {
        $image_id = (int) $_POST['_idfy_cover_image'];
        update_post_meta( $post_id, '_idfy_image_id', $image_id );
    }
}

function add_custom_meta_boxes() {
 
    // Define the custom attachment for posts
    add_meta_box(
        'wp_custom_background',
        'Tile Background ',
        'wp_custom_background',
        'post',
        'side',
		'low'
    );
 
} // end add_custom_meta_boxes
add_action('add_meta_boxes', 'add_custom_meta_boxes');

function wp_custom_background() {
	$background = get_post_meta(get_the_ID(), 'background', true);
    wp_nonce_field(plugin_basename(__FILE__), 'wp_custom_background_nonce');
	?>
	<p class="description">
	<select name="background" id="background">
                <option value="">--Select Background--</option>
                <option value="rgba(206, 16, 16, 0.8)" <?php selected( $background, 'rgba(206, 16, 16, 0.8)' );?>>IDfy Red</option>
                <option value="rgba(28, 67, 185, 0.8)" <?php selected( $background, 'rgba(28, 67, 185, 0.8)' );?>>IDfy Blue</option>
 				<option value="rgba(52, 52, 52, 0.8)" <?php selected( $background, 'rgba(52, 52, 52, 0.8)' );?>>IDfy Charcoal Grey</option>
                <option value="rgba(96, 96, 96, 0.8)" <?php selected( $background, 'rgba(96, 96, 96, 0.8)' );?>>IDfy Stone Grey</option>
				<option value="rgba(128, 128, 128, 0.8)" <?php selected( $background, 'rgba(128, 128, 128, 0.8)' );?>>IDfy Slate Grey</option>
            </select>
	 </p>
  <?php
} // end wp_custom_attachment

function save_custom_meta_data($id) {
 
    /* --- security verification --- */
    if(!wp_verify_nonce($_POST['wp_custom_background_nonce'], plugin_basename(__FILE__))) {
      return $id;
    } // end if
       
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
      return $id;
    } // end if
       
    if('page' == $_POST['post_type']) {
      if(!current_user_can('edit_page', $id)) {
        return $id;
      } // end if
    } else {
        if(!current_user_can('edit_page', $id)) {
            return $id;
        } // end if
    } // end if
	
	update_post_meta($id, 'background', $_POST['background']);     
     
} // end save_custom_meta_data
add_action('save_post', 'save_custom_meta_data');

function wpartisan_excerpt_label( $translation, $original ) {
    if ( 'Excerpt' == $original ) {
        return __( 'Sub Title' );
    } if ( 'Featured image' == $original ) {
        return __( 'Title Featured Image' );
    } 
    return $translation;
}
add_filter( 'gettext', 'wpartisan_excerpt_label', 10, 2 );

// create shortcode to list all clothes which come in blue
add_shortcode( 'idfy-list', 'idfy_post_listing' );
function idfy_post_listing( $atts ) {
    ob_start();
	
	global $post;

    wp_reset_query();
    $query = new WP_Query( array(
        'post_type' => 'post',
		'orderby' => 'modified',
		'posts_per_page' => 11,

    ) );
	?>

		
    <?php if ( $query->have_posts() ) { ?>
      	<div class="idfy-listing">
            <?php $i=1;while ( $query->have_posts() ) : $query->the_post(); ?>
			
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

							<a class="my-titl" href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 10, '...' ); ?></a>
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
					
					<a class="my-titl" href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 10, '...' ); ?></a>
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
					
					<a class="my-titl" href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 10, '...' ); ?></a>
					<h3><a href="<?php the_permalink(); ?>">Read <span class="breadcrumbs-arrow">→</span></a></h3>

				</div>
			</div>
				
			<?php } ?>
				
			<?php if($i==11) { ?>	
			</div>
			<?php } ?>		
			
            <?php $i++; endwhile;  ?>
			<div class="idfy-btn">
				<button class="load-posts-btn" style="display:none;">Loading...</button>
				<button class="load-more-btn idfy-load" data-page="1">Load More</button>
            </div>
			
            <?php wp_reset_postdata(); ?>
     	</div>  
    <?php $myvariable = ob_get_clean();
    return $myvariable;
    }
}

/**
 * Wp Live Portfolio Ajax
 */

function idfy_shortcode_callback() 
{	
	global $post;
	
	if(isset($_POST['page']))
	{
			$page=$_POST['page'];
			$paged = $page + 1;	
			$ppp = 6; 

	}else{$paged = 1;$ppp = 6; }
				
	$args = array(
			'post_type' => 'post',
			'orderby' => 'modified',
			'posts_per_page' => $ppp,
			'paged'=>$paged
		);
			
	$query = new WP_Query($args);
			//check
		$output ='';
		if ($query->have_posts()):
				
		while ($query->have_posts()): $query->the_post(); ?>

			<?php 
					$background = get_post_meta(get_the_ID(), 'background', true);
					$image_id = get_post_meta( $post->ID, '_idfy_image_id', true );		
					$content_image = wp_get_attachment_image( $image_id, 'post-thumbnail' );
					$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
								
			?>
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
					
					<a class="my-titl" href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 10, '...' ); ?></a>
					<h3><a href="<?php the_permalink(); ?>">Read <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20">
<path fill="#ffffff" d="M19.354 10.146l-6-6c-0.195-0.195-0.512-0.195-0.707 0s-0.195 0.512 0 0.707l5.146 5.146h-16.293c-0.276 0-0.5 0.224-0.5 0.5s0.224 0.5 0.5 0.5h16.293l-5.146 5.146c-0.195 0.195-0.195 0.512 0 0.707 0.098 0.098 0.226 0.146 0.354 0.146s0.256-0.049 0.354-0.146l6-6c0.195-0.195 0.195-0.512 0-0.707z"></path>
</svg></a></h3>

				</div>
			</div>
				<?php
				endwhile;
				echo $output; 
				wp_reset_postdata();
		
				endif;
			
			 wp_die(); 
}

add_action('wp_ajax_nopriv_idfy','idfy_shortcode_callback');
add_action('wp_ajax_idfy','idfy_shortcode_callback');

/**
 * use the [my_cat_list] shortcode.
 */

add_shortcode( 'my_cat_list', 'my_list_categories_shortcode' );

function my_list_categories_shortcode() {
	$output = '';
	$categories = get_categories();
	$output .= '<ul class="list-inner">';
	foreach($categories as $category) {
	   $output .= '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
	}
	$output .= '</ul>';
	return $output;
}

/**
 * Disable comments globally
 */

add_action('admin_init', function () {
    // Redirect any user trying to access comments page
    global $pagenow;
    
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url());
        exit;
    }

    // Remove comments metabox from dashboard
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

    // Disable support for comments and trackbacks in post types
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});

// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);

// Remove comments page in menu
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});

// Remove comments links from admin bar
add_action('init', function () {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
});

add_filter( 'generate_sidebar_layout', function( $layout ) {
    // If we are on a category, set the sidebar
    if ( is_category() || is_single() ) {
        return 'no-sidebar';
    }

    // Or else, set the regular layout
    return $layout;
 } );

/* JOB Post Type */
function create_posttype() {
register_post_type( 'job',
array(
  'labels' => array(
   'name' => __( 'JOB' ),
   'singular_name' => __( 'JOB' )
  ),
  'public' => true,
  'has_archive' => false,
  'rewrite' => array('slug' => 'job'),
  'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'revisions' )
 )
);
}
add_action( 'init', 'create_posttype' );

add_action( 'init', 'create_job_custom_taxonomy', 0 );
 
//create a custom taxonomy name it "type" for your posts

function create_job_custom_taxonomy() {
 
  $labels = array(
    'name' => _x( 'Type', 'taxonomy general name' ),
    'singular_name' => _x( 'Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Type' ),
    'all_items' => __( 'All Type' ),
    'parent_item' => __( 'Parent Type' ),
    'parent_item_colon' => __( 'Parent Type:' ),
    'edit_item' => __( 'Edit Type' ), 
    'update_item' => __( 'Update Type' ),
    'add_new_item' => __( 'Add New Type' ),
    'new_item_name' => __( 'New Type Name' ),
    'menu_name' => __( 'Type' ),
  ); 	
 
  register_taxonomy('type',array('job'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'type' ),
  ));
}

function tab_script() {
	?><script>
const [tabs, tabsPanels] = [
	Array.from(document.querySelectorAll(".tabs li")),
	Array.from(document.querySelectorAll(".tabs-panel"))
];

tabs.forEach((tab) => {
	tab.addEventListener("click", () => {
		const target = document.querySelector(`#${tab.dataset.target}`);
		removeActiveClass([tabs, tabsPanels]);
		tab.classList.add("active");
		target.classList.add("active");
	});
});

const removeActiveClass = (el) => {
	el.forEach((item) => {
		item.find((e) => e.classList.contains("active")).classList.remove("active");
	});
};
</script>
<?php
}

add_action( 'wp_footer', 'tab_script' );

/*************Job Listing Shortcode**************/
 
add_shortcode( 'my-jobs', 'jobs_shortcode', 3 );

function jobs_shortcode() {
	$output = '';
	$output .= '<ul class="tabs">';
	$categories = get_terms(
						array(
							'taxonomy'   => 'type',
							'orderby'    => 'count',
    						'order'      => 'DESC',
							'hide_empty' => false,
						)
					);
		//$categories = get_categories($args);
		$a = 0;
		foreach($categories as $category) { 
			$a++;
			
			if($a == 1) { 
				$output .= '<li class="active" data-target="'.$category->slug.'">'.$category->name.'  ('.$category->count .')</li>';
			}else {
				$output .= '<li data-target="'.$category->slug.'">'.$category->name.'  ('.$category->count .')</li>';
			}
		
		}
		$output .= '</ul>';

		$output .= '<div class="tabs-content">';
	    $ac = 0;
		foreach($categories as $category) { 
			$ac++;
			
			if($ac == 1) { 
				$output .= '<div class="tabs-panel active" id="'. $category->slug.'">';
			}else {
				$output .= '<div class="tabs-panel" id="'. $category->slug.'">';
			}
		
			$the_query = new WP_Query(array(
				'post_type' => 'job',
				'posts_per_page' => -1,
				'tax_query' => array(
					  array(
							'taxonomy' => 'type',
							'field' => 'slug',
							'terms' => $category->slug
							  ),
							),
				));

			while ( $the_query->have_posts() ) : 
			$the_query->the_post();
			
			$position = get_post_meta( get_the_ID(), 'Position', true);
			$experience = get_post_meta( get_the_ID(), 'Experience', true);
			$apply_now = get_post_meta( get_the_ID(), 'Apply Now', true);
			
			$output .= '<div class="tabs-data-main"><div class="tabs-data">';
			
			$output .= '<h5>';$output .=	get_the_title();$output .= '</h5>';
			
			if(!empty($position)){
				$output .= '<div class="open-pos">';
				$output .= $position;
				$output .= '</div>';
			}
				$output .= '<div class="my-exp">';
				$output .= $experience;
				$output .= '</div>';
			
				$output .= '<div class="app-now">';
				$output .= '<a href="'.$apply_now.'" target="_blank">Apply <img src="http://wpuplift.com/projects/idfy/wp-content/uploads/2021/02/external-link.svg"></a>';
				$output .= '</div>';
			
			$output .= '</div></div>';
			
			endwhile; 
			$output .= '</div>';
		} 
	
		wp_reset_postdata();
		$output .= '</div>';

	return $output;
	
}


function timeline_superpower_script() {
?>
<script>
/*
(function () {

  // VARIABLES
  const timeline = document.querySelector(".tsuper ol"),
  elH = document.querySelectorAll(".tsuper li > div"),
  arrows = document.querySelectorAll(".tsuper .arrows_super .arrow_super"),
  arrowPrev = document.querySelector(".tsuper .arrows_super .arrow__prev_super"),
  arrowNext = document.querySelector(".tsuper .arrows_super .arrow__next_super"),
  firstItem = document.querySelector(".tsuper li:first-child"),
  lastItem = document.querySelector(".tsuper li:last-child"),

  disabledClass = "disabled";
	
  var xScrolling ='';
	
jQuery(window).load(function () {
	var device = jQuery("body").attr("data-elementor-device-mode");
	
	if (device == "mobile"){
        xScrolling = 318;
    }else
		{
		xScrolling = 561.6666;
		}
});
  // START
  window.addEventListener("load", init_super);

  function init_super() {
    setEqualHeights_super(elH);
    animateTl_super(xScrolling, arrows, timeline);
  }

  // SET EQUAL HEIGHTS
  function setEqualHeights_super(el) {
    let counter = 0;
    for (let i = 0; i < el.length; i++) {
      const singleHeight = el[i].offsetHeight;

      if (counter < singleHeight) {
        counter = singleHeight;
      }
    }

    for (let i = 0; i < el.length; i++) {
      el[i].style.height = `${counter}px`;
    }
  }

  // CHECK IF AN ELEMENT IS IN VIEWPORT
  // http://stackoverflow.com/questions/123999/how-to-tell-if-a-dom-element-is-visible-in-the-current-viewport
  function isElementInViewport_super(el) {
    const rect = el.getBoundingClientRect();
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth));

  }

  // SET STATE OF PREV/NEXT ARROWS
  function setBtnState_super(el, flag = true) {
    if (flag) {
      el.classList.add(disabledClass);
    } else {
      if (el.classList.contains(disabledClass)) {
        el.classList.remove(disabledClass);
      }
      el.disabled = false;
    }
  }

  // ANIMATE TIMELINE
  function animateTl_super(scrolling, el, tl) {
    let counter = 0; var j=1;
    for (let i = 0; i < el.length; i++) {
      el[i].addEventListener("click", function () {	
				
        if (!arrowPrev.disabled) {
          arrowPrev.disabled = true; 
        }
        if (!arrowNext.disabled) {
          arrowNext.disabled = true;
        } 
				
				if(i == 1)
				{ 
				  var t = 7.6923 * ++j;
				  jQuery('.bar_super').attr('style','width:'+t+'%');
				}
				if(i == 0) 
				{
				 var b = 7.6923 * --j;
				 jQuery('.bar_super').attr('style','width:'+b+'%');
				}
				
				
        const sign = this.classList.contains("arrow__prev_super") ? "" : "-";
        if (counter === 0) {
          tl.style.transform = `translateX(-${scrolling}px)`; 
        } else {		
 
          const tlStyle = getComputedStyle(tl);
          // add more browser prefixes if needed here
          const tlTransform = tlStyle.getPropertyValue("-webkit-transform") || tlStyle.getPropertyValue("transform");
          const values = parseInt(tlTransform.split(",")[4]) + parseInt(`${sign}${scrolling}`);
          tl.style.transform = `translateX(${values}px)`;
        }

        setTimeout(() => {
          isElementInViewport_super(firstItem) ? setBtnState_super(arrowPrev) : setBtnState_super(arrowPrev, false);
          isElementInViewport_super(lastItem) ? setBtnState_super(arrowNext) : setBtnState_super(arrowNext, false);
        }, 1100);

        counter++;
      });
    }
  }

})();
	*/
</script>
<?php }

add_action( 'wp_footer', 'timeline_superpower_script' );

function timeline_script() {
?>
<script>

(function () {

  // VARIABLES
  const timeline = document.querySelector(".tccc ol"),
  elH = document.querySelectorAll(".tccc li > div"),
  arrows = document.querySelectorAll(".tccc .arrows_ccc .arrow_ccc"),
  arrowPrev = document.querySelector(".tccc .arrows_ccc .arrow__prev_ccc"),
  arrowNext = document.querySelector(".tccc .arrows_ccc .arrow__next_ccc"),
  firstItem = document.querySelector(".tccc li:first-child"),
  lastItem = document.querySelector(".tccc li:last-child"),
  xScrolling = 500,
  disabledClass = "disabled";

  // START
  window.addEventListener("load", init_ccc);

  function init_ccc() {
    setEqualHeights_ccc(elH);
    animateTl_ccc(xScrolling, arrows, timeline);
  }

  // SET EQUAL HEIGHTS
  function setEqualHeights_ccc(el) {
    let counter = 0;
    for (let i = 0; i < el.length; i++) {
      const singleHeight = el[i].offsetHeight;

      if (counter < singleHeight) {
        counter = singleHeight;
      }
    }

    for (let i = 0; i < el.length; i++) {
      el[i].style.height = `${counter}px`;
    }
  }

  // CHECK IF AN ELEMENT IS IN VIEWPORT
  // http://stackoverflow.com/questions/123999/how-to-tell-if-a-dom-element-is-visible-in-the-current-viewport
  function isElementInViewport_ccc(el) {
    const rect = el.getBoundingClientRect();
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth));

  }

  // SET STATE OF PREV/NEXT ARROWS
  function setBtnState_ccc(el, flag = true) {
    if (flag) {
      el.classList.add(disabledClass);
    } else {
      if (el.classList.contains(disabledClass)) {
        el.classList.remove(disabledClass);
      }
      el.disabled = false;
    }
  }

  // ANIMATE TIMELINE
  function animateTl_ccc(scrolling, el, tl) {
    let counter = 0; var j=1;
    for (let i = 0; i < el.length; i++) {
      el[i].addEventListener("click", function () {	
				
        if (!arrowPrev.disabled) {
          arrowPrev.disabled = true; 
        }
        if (!arrowNext.disabled) {
          arrowNext.disabled = true;
        } 
				
				if(i == 1)
				{ 
				  var t = 7.6923 * ++j;
				  jQuery('.bar_ccc').attr('style','width:'+t+'%');
				}
				if(i == 0) 
				{
				 var b = 7.6923 * --j;
				 jQuery('.bar_ccc').attr('style','width:'+b+'%');
				}
				
				
        const sign = this.classList.contains("arrow__prev_ccc") ? "" : "-";
        if (counter === 0) {
          tl.style.transform = `translateX(-${scrolling}px)`; 
        } else {		
 
          const tlStyle = getComputedStyle(tl);
          // add more browser prefixes if needed here
          const tlTransform = tlStyle.getPropertyValue("-webkit-transform") || tlStyle.getPropertyValue("transform");
          const values = parseInt(tlTransform.split(",")[4]) + parseInt(`${sign}${scrolling}`);
          tl.style.transform = `translateX(${values}px)`;
        }

        setTimeout(() => {
          isElementInViewport_ccc(firstItem) ? setBtnState_ccc(arrowPrev) : setBtnState_ccc(arrowPrev, false);
          isElementInViewport_ccc(lastItem) ? setBtnState_ccc(arrowNext) : setBtnState_ccc(arrowNext, false);
        }, 1100);

        counter++;
      });
    }
  }

})();
	
</script>
<?php }

add_action( 'wp_footer', 'timeline_script' );

/**
 * Disable Gutenberg Editor
 */

add_filter('use_block_editor_for_post', '__return_false', 10);

add_action('do_meta_boxes', 'tp_change_image_box');
function tp_change_image_box()
{
	remove_meta_box( 'postimagediv', 'post', 'side' );
	add_meta_box( 'postimagediv', __('Tile Featured Image'), 'post_thumbnail_meta_box', 'post', 'side' );
}

function add_featured_meta_box()
{
    add_meta_box("featured-meta-box", "Featured", "featured_meta_box_markup", "post", "side", "high", null);
}

add_action("add_meta_boxes", "add_featured_meta_box");

function featured_meta_box_markup($object)
{
    wp_nonce_field(basename(__FILE__), "featured-box-nonce");

    ?>
        <p>
            <?php
                $checkbox_value = get_post_meta($object->ID, "_featured", true);

                if($checkbox_value == "")
                {
                    ?>
                        <input name="_featured" type="checkbox" value="true">
                    <?php
                }
                else if($checkbox_value == "true")
                {
                    ?>  
                        <input name="_featured" type="checkbox" value="true" checked>
                    <?php
                }
            ?><label for="meta-box-checkbox">Yes</label>
        </p>
    <?php  
}

function save_featured_meta_box($post_id, $post, $update)
{
    if (!isset($_POST["featured-box-nonce"]) || !wp_verify_nonce($_POST["featured-box-nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    $slug = "post";
    if($slug != $post->post_type)
        return $post_id;

    $meta_box_checkbox_value = "";

    if(isset($_POST["_featured"]))
    {
        $meta_box_checkbox_value = $_POST["_featured"];
    }   
    update_post_meta($post_id, "_featured", $meta_box_checkbox_value);
}

add_action("save_post", "save_featured_meta_box", 10, 3);