<?php

function keenshot_customize_register($wp_customize)
{
    class Keenshot_Switch_Control extends WP_Customize_Control {
        public $type = 'switch';
        /**
        * Render the control's content.
        */
        public function render_content() {
        ?>
        <label for="_customize-input-heading_fontsize_pro" class="customize-control-title"><?php echo esc_html( $this->label ); ?></label>
        <fieldset id="keenshot_opt-opt-switch-1" class="redux-field-container redux-field redux-container-switch" data-id="opt-switch-1" data-type="switch"><div class="switch-options"><label class="cb-enable" data-id="opt-switch-1"><span><?php esc_html_e('On', 'keenshot'); ?></span></label><label class="cb-disable selected" data-id="opt-switch-1"><span><?php esc_html_e('Off', 'keenshot'); ?></span></label><input type="hidden" class="checkbox checkbox-input " id="opt-switch-1" name="keenshot_opt[opt-switch-1]" value="1"></div></fieldset>  
        <?php
        }
    }
    class Keenshot_Code_Control extends WP_Customize_Control {
        public $type = 'code';
        /**
        * Render the control's content.
        */
        public function render_content() {
        ?>
        <label for="_customize-input-heading_fontsize_pro" class="customize-control-title"><?php echo esc_html( $this->label ); ?></label>
        <div class="ace-wrapper">
            <input type="hidden" class="localize_data" value="{&quot;minLines&quot;:10,&quot;maxLines&quot;:30}">
            <pre id="css_code-editor" class="ace-editor-area ace_editor ace-monokai ace_dark" style="height: 140px;"><textarea class="ace_text-input" wrap="off" autocorrect="off" autocapitalize="off" spellcheck="false" style="opacity: 0; height: 14px; width: 6.59781px; left: 44px; top: 0px;"></textarea><div class="ace_gutter"><div class="ace_layer ace_gutter-layer ace_folding-enabled" style="margin-top: 0px; height: 168px; width: 40px;"><div class="ace_gutter-cell " style="height: 14px;">1</div></div><div class="ace_gutter-active-line" style="top: 0px; height: 14px;"></div></div><div class="ace_scroller" style="left: 40px; right: 0px; bottom: 0px;"><div class="ace_content" style="margin-top: 0px; width: 756px; height: 168px; margin-left: 0px;"><div class="ace_layer ace_print-margin-layer"><div class="ace_print-margin" style="left: 531.825px; visibility: visible;"></div></div><div class="ace_layer ace_marker-layer"><div class="ace_active-line" style="height:14px;top:0px;left:0;right:0;"></div></div><div class="ace_layer ace_text-layer" style="padding: 0px 4px;"><div class="ace_line" style="height:14px"></div></div><div class="ace_layer ace_marker-layer"></div><div class="ace_layer ace_cursor-layer ace_hidden-cursors"><div class="ace_cursor" style="left: 4px; top: 0px; width: 6.59781px; height: 14px;"></div></div></div></div><div class="ace_scrollbar ace_scrollbar-v" style="display: none; width: 22px; bottom: 0px;"><div class="ace_scrollbar-inner" style="width: 22px; height: 14px;"></div></div><div class="ace_scrollbar ace_scrollbar-h" style="display: none; height: 22px; left: 40px; right: 0px;"><div class="ace_scrollbar-inner" style="height: 22px; width: 796px;"></div></div><div style="height: auto; width: auto; top: 0px; left: 0px; visibility: hidden; position: absolute; white-space: pre; font: inherit; overflow: hidden;"><div style="height: auto; width: auto; top: 0px; left: 0px; visibility: hidden; position: absolute; white-space: pre; font: inherit; overflow: visible;"></div><div style="height: auto; width: auto; top: 0px; left: 0px; visibility: hidden; position: absolute; white-space: pre; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; overflow: visible;">XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</div></div></pre>
        </div>
        <?php
        }
    }

    // Settting on default sections
    $wp_customize->get_control('background_color')->priority   = 20;

    $wp_customize->add_setting('header_textcolor_hover', array(
        'default'   => '#7b62d8',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_textcolor_hover', array(
        'label'      => __('Header Text Hover Color', 'keenshot'),
        'section'    => 'colors',
        'settings'   => 'header_textcolor_hover',
        'priority'   => 10,
    )));

    $wp_customize->add_setting('header_textcolor_active', array(
        'default'   => '#7b62d8',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_textcolor_active', array(
        'label'      => __('Header Text Active Color', 'keenshot'),
        'section'    => 'colors',
        'settings'   => 'header_textcolor_active',
        'priority'   => 10,
    )));

    //Theme Panel
    $wp_customize->add_panel(
        'keenshot_panel',
        array(
            'title' => __('Keenshot Settings', 'keenshot'),
            'description' => esc_html__('Adjust your theme section.', 'keenshot'),
            'capability' => 'edit_theme_options',
            'priority'	=> 10
        )
    );

    //Header
    $wp_customize->add_section(
        'header_section',
        array(
            'title'              => __('Header Settings', 'keenshot'),
            'capability'         => 'edit_theme_options',
            'description_hidden' => 'false',
            'panel' => 'keenshot_panel'
        )
    );

    $wp_customize->add_setting('header_layout', array(
        'default'           => 'left_right',
        'transport'         => 'refresh',
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'dirty'             => false,
        'sanitize_callback' => 'keenshot_customizer_sanitize'
    ));

    $wp_customize->add_control('header_layout', array(
        'label'       => __('Navigation Layout', 'keenshot'),
        'section'     => 'header_section',
        'settings'    => 'header_layout',
        'description' => 'Select the header layout.',
        'type'        => 'select',
        'choices'     => array(
            'left_right' => __('Left - Right', 'keenshot'),
            'center'     => __('Center', 'keenshot')
        )
    ));

    $wp_customize->add_setting(
        'header_style_pro',
        array(
            'default' => 1,
            'transport' => 'refresh',
            'sanitize_callback' => 'keenshot_customizer_sanitize'
        )
    );

    $wp_customize->add_control(
        'header_style_pro',
        array(
            'label' => __('Header Style', 'keenshot'),
            'section' => 'header_section',
            'settings' => 'header_style_pro',
            'type'        => 'select',
            'choices'     => array(
                1 => __('Style One', 'keenshot'),
                2 => __('Style Two', 'keenshot')
            )
        )
    );

    $wp_customize->add_setting(
        'retina_logo_pro',
        array(
            'default' => get_template_directory_uri().'/assets/images/logo.png',
            'transport' => 'refresh',
            'sanitize_callback' => 'keenshot_sanitize'
        )
    );

    $wp_customize->add_control(new WP_Customize_Media_Control(
        $wp_customize,
        'retina_logo_pro',
        array(
            'label' => __('Retina Logo', 'keenshot'),
            'section' => 'header_section',
            'settings' => 'retina_logo_pro',
            'mime_type' => 'image'
        )
    ));

    //Typography
    $wp_customize->add_section(
        'typography_section',
        array(
            'title'              => __('Typography', 'keenshot'),
            'capability'         => 'edit_theme_options',
            'description_hidden' => 'false',
            'panel' => 'keenshot_panel'
        )
    );

    $wp_customize->add_setting('keenshot_heading_font', array(
        'default'           => 'Bebas Neue',
        'transport'         => 'refresh',
        'sanitize_callback' => 'keenshot_customizer_sanitize'
    ));

    $wp_customize->add_control('keenshot_heading_font', array(
        'label'       => __('Heading Font', 'keenshot'),
        'section'     => 'typography_section',
        'settings'    => 'keenshot_heading_font',
        'type'        => 'select',
        'choices'     => array(
            'Bebas Neue' => __('Bebas Neue', 'keenshot'),
            'Montserrat'     => __('Montserrat', 'keenshot'),
            'Poppins'     => __('Poppins', 'keenshot'),
            'Open Sans'     => __('Open Sans', 'keenshot'),
            'Roboto'     => __('Roboto', 'keenshot'),
            'Lato'     => __('Lato', 'keenshot'),
            'Source Sans Pro'     => __('Source Sans Pro', 'keenshot'),
            'Oswald'     => __('Oswald', 'keenshot'),
            'Raleway'     => __('Raleway', 'keenshot'),
            'Noto Sans'     => __('Noto Sans', 'keenshot'),
        )
    ));

    $wp_customize->add_setting('keenshot_body_font', array(
        'default'           => 'Montserrat',
        'transport'         => 'refresh',
        'sanitize_callback' => 'keenshot_customizer_sanitize'
    ));

    $wp_customize->add_control('keenshot_body_font', array(
        'label'       => __('Body Font', 'keenshot'),
        'section'     => 'typography_section',
        'settings'    => 'keenshot_body_font',
        'type'        => 'select',
        'choices'     => array(
            'Bebas Neue' => __('Bebas Neue', 'keenshot'),
            'Montserrat'     => __('Montserrat', 'keenshot'),
            'Poppins'     => __('Poppins', 'keenshot'),
            'Open Sans'     => __('Open Sans', 'keenshot'),
            'Roboto'     => __('Roboto', 'keenshot'),
            'Lato'     => __('Lato', 'keenshot'),
            'Source Sans Pro'     => __('Source Sans Pro', 'keenshot'),
            'Oswald'     => __('Oswald', 'keenshot'),
            'Raleway'     => __('Raleway', 'keenshot'),
            'Noto Sans'     => __('Noto Sans', 'keenshot'),
        )
    ));

    $wp_customize->add_setting(
        'heading_fontsize_pro',
        array(
            'default' => 32,
            'transport' => 'refresh',
            'sanitize_callback' => 'keenshot_customizer_sanitize'
        )
    );

    $wp_customize->add_control(
        'heading_fontsize_pro',
        array(
            'label' => __('Heading Font Size', 'keenshot'),
            'section' => 'typography_section',
            'settings' => 'heading_fontsize_pro',
            'type'        => 'select',
            'choices'     => array(
                32 => __('32px', 'keenshot'),
                36 => __('36px', 'keenshot')
            )
        )
    );

    $wp_customize->add_setting(
        'body_fontsize_pro',
        array(
            'default' => 14,
            'transport' => 'refresh',
            'sanitize_callback' => 'keenshot_customizer_sanitize'
        )
    );

    $wp_customize->add_control(
        'body_fontsize_pro',
        array(
            'label' => __('Body Font Size', 'keenshot'),
            'section' => 'typography_section',
            'settings' => 'body_fontsize_pro',
            'type'        => 'select',
            'choices'     => array(
                14 => __('14px', 'keenshot'),
                15 => __('15px', 'keenshot')
            )
        )
    );

    $wp_customize->add_setting(
        'lineheight_pro',
        array(
            'default' => 130,
            'transport' => 'refresh',
            'sanitize_callback' => 'keenshot_customizer_sanitize'
        )
    );

    $wp_customize->add_control(
        'lineheight_pro',
        array(
            'label' => __('Line Height', 'keenshot'),
            'section' => 'typography_section',
            'settings' => 'lineheight_pro',
            'type'        => 'select',
            'choices'     => array(
                130 => __('130%', 'keenshot'),
                140 => __('140%', 'keenshot')
            )
        )
    );

    $wp_customize->add_setting('headings_color_pro', array(
        'default'   => '#7b62d8',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'headings_color_pro', array(
        'label'      => __('Headings Color', 'keenshot'),
        'section'    => 'typography_section',
        'settings'   => 'headings_color_pro'
    )));

    $wp_customize->add_setting('body_color_pro', array(
        'default'   => '#484848',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'body_color_pro', array(
        'label'      => __('Body Color', 'keenshot'),
        'section'    => 'typography_section',
        'settings'   => 'body_color_pro'
    )));

    //Blog
    $wp_customize->add_section(
        'keenshot_blog_custom_controls_section',
        array(
            'title' => __('Blog &amp; Single', 'keenshot'),
            'panel' => 'keenshot_panel',
            'capability' => 'edit_theme_options'
        )
    );

    $wp_customize->add_setting('tags_on_blog_pro', array(
        'default'   => 2,
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control(new Keenshot_Switch_Control($wp_customize, 'tags_on_blog_pro', array(
        'label'      => __('Tags', 'keenshot'),
        'section'    => 'keenshot_blog_custom_controls_section',
        'settings'   => 'tags_on_blog_pro'
    )));

    $wp_customize->add_setting('cats_on_blog_pro', array(
        'default'   => 2,
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control(new Keenshot_Switch_Control($wp_customize, 'cats_on_blog_pro', array(
        'label'      => __('Category', 'keenshot'),
        'section'    => 'keenshot_blog_custom_controls_section',
        'settings'   => 'cats_on_blog_pro'
    )));

    $wp_customize->add_setting('social_share_pro', array(
        'default'   => 2,
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control(new Keenshot_Switch_Control($wp_customize, 'social_share_pro', array(
        'label'      => __('Social Share', 'keenshot'),
        'section'    => 'keenshot_blog_custom_controls_section',
        'settings'   => 'social_share_pro'
    )));

    $wp_customize->add_setting('related_post_from_pro', array(
        'default'   => 'cat',
        'transport' => 'refresh',
        'sanitize_callback'  => 'keenshot_customizer_sanitize'
    ));

    $wp_customize->add_control('related_post_from_pro', array(
        'label'      => __('Related posts from', 'keenshot'),
        'section'    => 'keenshot_blog_custom_controls_section',
        'settings'   => 'related_post_from_pro',
        'type'      => 'select',
        'choices'   => array(
            'cat'   => __('From same category', 'keenshot'),
            'tag'   => __('From same tag', 'keenshot'),
        )
    ));

    //Footer copyright
    $wp_customize->add_section(
        'keenshot_footer_custom_controls_section',
        array(
       'title' => __('Footer Copyright', 'keenshot'),
       'description' => esc_html__('These are an example of Customizer Custom Controls.', 'keenshot'),
       'panel' => 'keenshot_panel',
       'capability' => 'edit_theme_options',
       'description_hidden' => 'false'
    )
    );

    $wp_customize->add_setting(
        'sample_default_footer_text',
        array(
     'default' => '',
     'transport' => 'refresh',
     'type' => 'theme_mod',
     'capability' => 'edit_theme_options',
     'theme_supports' => '',
     'validate_callback' => '',
     'sanitize_callback' => 'keenshot_sanitize',
     'dirty' => false
  )
    );

    $wp_customize->add_control(
        'copyright_footer_text_control',
        array(
     'label' => __('Copyrigth Text', 'keenshot'),
     'description' => esc_html__('Text controls Type can be either text, email, url, number, hidden, or date', 'keenshot'),
     'section' => 'keenshot_footer_custom_controls_section',
     'settings' => 'sample_default_footer_text',
     'type' => 'text',
     'capability' => 'edit_theme_options',
     'input_attrs' => array(
        'class' => 'my-custom-class',
        'style' => 'border: 1px solid rebeccapurple',
        'placeholder' => __('Enter copy write text...', 'keenshot')
     )
  )
    );

    $wp_customize->add_setting(
        'sample_default_footer_text_body',
        array(
            'default' => '',
            'transport' => 'refresh',
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'validate_callback' => '',
            'sanitize_callback' => 'keenshot_sanitize',
            'dirty' => false
        )
    );

    $wp_customize->add_control(
        'copyright_footer_text_body_control',
        array(
   'label' => __('Copyright Body', 'keenshot'),
   'description' => esc_html__('Text controls Type can be either text, email, url, number, hidden, or date', 'keenshot'),
   'section' => 'keenshot_footer_custom_controls_section',
   'settings' => 'sample_default_footer_text_body',
   'type' => 'textarea',
   'capability' => 'edit_theme_options',
   'input_attrs' => array(
      'class' => 'my-custom-class',
      'style' => 'border: 1px solid rebeccapurple',
      'placeholder' => __('Enter copyright body message...', 'keenshot')
   )
)
    );

    $wp_customize->add_setting(
        'sample_default_footer_image',
        array(
      'default' => '',
      'transport' => 'refresh',
      'type' => 'theme_mod',
      'capability' => 'edit_theme_options',
      'theme_supports' => '',
      'validate_callback' => '',
      'sanitize_callback' => 'keenshot_sanitize',
      'dirty' => false
   )
    );

    $wp_customize->add_control(new WP_Customize_Media_Control(
        $wp_customize,
        'copyright_footer_image_control',
        array(
      'label' => __('Footer Image', 'keenshot'),
      'description' => '',
      'section' => 'keenshot_footer_custom_controls_section',
      'settings' => 'sample_default_footer_image',
      'mime_type' => 'image',
      'capability' => 'edit_theme_options'
   )
    ));

    $wp_customize->selective_refresh->add_partial('sample_default_footer_text_body', array(
    'selector' => '#address',
   ));

    // Footer address
    $wp_customize->add_section(
        'keenshot_footer_address',
        array(
      'title' => __('Footer Address', 'keenshot'),
      'description' => esc_html__('Update your address', 'keenshot'),
      'panel' => 'keenshot_panel',
      'capability' => 'edit_theme_options',
      'theme_supports' => '',
      'active_callback' => '',
      'description_hidden' => 'false'
   )
    );

    $wp_customize->add_setting(
        'keenshot_footer_title_settings',
        array(
      'default' => '',
      'transport' => 'refresh',
      'type' => 'theme_mod',
      'capability' => 'edit_theme_options',
      'theme_supports' => '',
      'validate_callback' => '',
      'sanitize_callback' => 'keenshot_sanitize',
      'dirty' => false
   )
    );

    $wp_customize->add_setting(
        'keenshot_footer_phone_settings',
        array(
      'default' => '',
      'transport' => 'refresh',
      'type' => 'theme_mod',
      'capability' => 'edit_theme_options',
      'theme_supports' => '',
      'validate_callback' => '',
      'sanitize_callback' => 'keenshot_sanitize',
      'dirty' => false
   )
    );

    $wp_customize->add_control(
        'keenshot_footer_title_control',
        array(
      'label' => __('Title', 'keenshot'),
      'description' => esc_html__('Widget title', 'keenshot'),
      'section' => 'keenshot_footer_address',
      'settings' => 'keenshot_footer_title_settings',
      'type' => 'text',
      'capability' => 'edit_theme_options',
      'input_attrs' => array(
         'class' => 'my-custom-class',
         'style' => 'border: 1px solid rebeccapurple',
         'placeholder' => __('Enter widget title...', 'keenshot')
      )
    )
    );

    $wp_customize->add_control(
        'keenshot_footer_phone_control',
        array(
      'label' => __('Phone', 'keenshot'),
      'description' => esc_html__('Type Phone Number', 'keenshot'),
      'section' => 'keenshot_footer_address',
      'settings' => 'keenshot_footer_phone_settings',
      'type' => 'text',
      'capability' => 'edit_theme_options',
      'input_attrs' => array(
         'class' => 'my-custom-class',
         'style' => 'border: 1px solid rebeccapurple',
         'placeholder' => __('Enter phone number...', 'keenshot')
      )
    )
    );

    $wp_customize->add_setting(
        'keenshot_footer_address_settings',
        array(
      'default' => '',
      'transport' => 'refresh',
      'type' => 'theme_mod',
      'capability' => 'edit_theme_options',
      'theme_supports' => '',
      'validate_callback' => '',
      'sanitize_callback' => 'keenshot_sanitize',
      'dirty' => false
   )
    );

    $wp_customize->add_control(
        'keenshot_footer_address_control',
        array(
      'label' => __('Your Address', 'keenshot'),
      'description' => esc_html__('Enter your address info', 'keenshot'),
      'section' => 'keenshot_footer_address',
      'settings' => 'keenshot_footer_address_settings',
      'type' => 'textarea',
      'capability' => 'edit_theme_options',
      'input_attrs' => array(
         'class' => 'my-custom-class',
         'style' => 'border: 1px solid rebeccapurple',
         'placeholder' => __('Enter your current address info', 'keenshot')
      )
    )
    );

    $wp_customize->selective_refresh->add_partial('keenshot_footer_address_settings', array(
    'selector' => '#copywrite',
   ));

   //Footer style
   $wp_customize->add_section(
    'keenshot_custom_footer_style_section',
        array(
            'title' => __('Footer Style', 'keenshot'),
            'panel' => 'keenshot_panel'
        )
    );

   $wp_customize->add_setting(
    'footer_style_pro',
        array(
            'default' => 1,
            'transport' => 'refresh',
            'sanitize_callback' => 'keenshot_customizer_sanitize'
        )
    );

    $wp_customize->add_control(
        'footer_style_pro',
        array(
            'label' => __('Footer Style', 'keenshot'),
            'section' => 'keenshot_custom_footer_style_section',
            'settings' => 'footer_style_pro',
            'type'        => 'select',
            'choices'     => array(
                1 => __('Style One', 'keenshot'),
                2 => __('Style Two', 'keenshot'),
                3 => __('Style Three', 'keenshot')
            )
        )
    );

    $wp_customize->add_setting(
        'footer_logo_pro',
        array(
            'default' => get_template_directory_uri().'/assets/images/logo.png',
            'transport' => 'refresh',
            'sanitize_callback' => 'keenshot_sanitize'
        )
    );

    $wp_customize->add_control(new WP_Customize_Media_Control(
        $wp_customize,
        'footer_logo_pro',
        array(
            'label' => __('Footer Logo', 'keenshot'),
            'section' => 'keenshot_custom_footer_style_section',
            'settings' => 'footer_logo_pro',
            'mime_type' => 'image'
        )
    ));

    // Login page
    $wp_customize->add_section(
        'keenshot_custom_login_page_section',
        array(
            'title' => __('Login Page', 'keenshot'),
            'description' => __('Manage Login Page Banner and Logo', 'keenshot'),
            'panel' => 'keenshot_panel',
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'active_callback' => '',
            'description_hidden' => false
        )
    );

    $wp_customize->add_setting(
        'keenshot_custom_login_page_settings',
        array(
      'default' => __('Manage Login Page Banner', 'keenshot'),
      'transport' => 'refresh',
      'type' => 'theme_mod',
      'capability' => 'edit_theme_options',
      'theme_supports' => '',
      'validate_callback' => '',
      'sanitize_callback' => 'keenshot_wp_media_upload_sanitize',
      'dirty' => false
   )
    );

    $wp_customize->add_control(new WP_Customize_Media_Control(
        $wp_customize,
        'keenshot_custom_login_page_control',
        array(
      'label' => __('Manage Login Page Banner', 'keenshot'),
      'section' => 'keenshot_custom_login_page_section',
      'settings' => 'keenshot_custom_login_page_settings',
      'mime_type' => 'image',
      'capability' => 'edit_theme_options'
   )
    ));

    $wp_customize->add_setting(
        'keenshot_custom_login_page_logo_settings',
        array(
      'default' => __('Manage Login Page Logo', 'keenshot'),
      'transport' => 'refresh',
      'type' => 'theme_mod',
      'capability' => 'edit_theme_options',
      'theme_supports' => '',
      'validate_callback' => '',
      'sanitize_callback' => 'keenshot_wp_media_upload_sanitize',
      'dirty' => false
   )
    );

    $wp_customize->add_control(new WP_Customize_Media_Control(
        $wp_customize,
        'keenshot_custom_login_page_logo_control',
        array(
            'label' => __('Manage Login Page Logo', 'keenshot'),
            'section' => 'keenshot_custom_login_page_section',
            'settings' => 'keenshot_custom_login_page_logo_settings',
            'mime_type' => 'image',
            'capability' => 'edit_theme_options'
        )
    ));

    //Custom Code
    $wp_customize->add_section(
        'keenshot_custom_code_section',
        array(
            'title' => __('Custom Code', 'keenshot'),
            'panel' => 'keenshot_panel'
        )
    );

    $wp_customize->add_setting(
        'custom_css_pro',
        array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback'  => 'keenshot_customizer_sanitize'
        )
    );

    $wp_customize->add_control(new Keenshot_Code_Control(
        $wp_customize,
        'custom_css_pro',
        array(
            'label' => __('Custom CSS', 'keenshot'),
            'section' => 'keenshot_custom_code_section',
            'settings' => 'custom_css_pro'
        )
    ));

    $wp_customize->add_setting(
        'custom_js_pro',
        array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback'  => 'keenshot_customizer_sanitize'
        )
    );

    $wp_customize->add_control(new Keenshot_Code_Control(
        $wp_customize,
        'custom_js_pro',
        array(
            'label' => __('Custom JS', 'keenshot'),
            'section' => 'keenshot_custom_code_section',
            'settings' => 'custom_js_pro'
        )
    ));
    $wp_customize->add_setting(
        'analytic_pro',
        array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback'  => 'keenshot_customizer_sanitize'
        )
    );

    $wp_customize->add_control(new Keenshot_Code_Control(
        $wp_customize,
        'analytic_pro',
        array(
            'label' => __('Google Analytis', 'keenshot'),
            'section' => 'keenshot_custom_code_section',
            'settings' => 'analytic_pro'
        )
    ));
}
function keenshot_customizer_sanitize($input)
{
    if (!empty($input)) {
        return $input;
    }
    return $input;
}
add_action('customize_register', 'keenshot_customize_register');

function keenshot_footer_image_option()
{
    $image_id = wp_get_attachment_url(get_theme_mod('sample_default_footer_image', ''));
    return $image_id;
}
 add_action('wp_head', 'keenshot_footer_image_option');
 
 function keenshot_sanitize($input)
 {
     if (!empty($input)) {
         return $input;
     }
     return $input;
 }
 
 function keenshot_wp_login_page_banner_upload()
 {
     $image_id = wp_get_attachment_url(get_theme_mod('keenshot_custom_login_page_settings'));
     return $image_id;
 }
 
 add_action('wp_head', 'keenshot_wp_login_page_banner_upload');
 
 function keenshot_wp_login_page_logo_upload()
 {
     $image_id = wp_get_attachment_url(get_theme_mod('keenshot_custom_login_page_logo_settings'));
     if (!$image_id) {
         $image_id = get_template_directory_uri().'/assets/images/logo.png';
     }
     return $image_id;
 }
 
 add_action('wp_head', 'keenshot_wp_login_page_logo_upload');
 
 function keenshot_wp_media_upload_sanitize($input)
 {
     if (!empty($input)) {
         return $input;
     }
     return $input;
 }
