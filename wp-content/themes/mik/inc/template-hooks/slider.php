<?php
/**
 * Slider hook
 *
 * @package mik
 */

if ( ! function_exists( 'mik_add_slider_section' ) ) :
    /**
    * Add slider section
    *
    *@since Mik 1.0.0
    */
    function mik_add_slider_section() {

        // Check if slider is enabled on frontpage
        $slider_enable = apply_filters( 'mik_section_status', 'enable_slider', 'slider_entire_site' );

        if ( ! $slider_enable )
            return false;

        if ( ! is_singular() ) {
            $paged = get_query_var( 'paged' );
            if ( $paged !== 0 )
                return false;
        }

        // Get slider section details
        $section_details = array();
        $section_details = apply_filters( 'mik_filter_slider_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render slider section now.
        mik_render_slider_section( $section_details );
    }
endif;
add_action( 'mik_primary_content_action', 'mik_add_slider_section', 10 );


if ( ! function_exists( 'mik_get_slider_section_details' ) ) :
    /**
    * slider section details.
    *
    * @since Mik 1.0.0
    * @param array $input slider section details.
    */
    function mik_get_slider_section_details( $input ) {

        $content = array();
        $post_ids = array();

        for ( $i = 1; $i <= 5; $i++ )  :
            $post_ids[] = mik_theme_option( 'slider_content_post_' . $i );
        endfor;
        
        $args = array(
            'post_type'         => 'post',
            'post__in'          =>  ( array ) $post_ids,
            'posts_per_page'    => 5,
            'orderby'           => 'post__in',
            'ignore_sticky_posts' => true,
            );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : '';

                // Push to the main array.
                array_push( $content, $page_post );
            endwhile;
        endif;
        wp_reset_postdata();
            
        if ( ! empty( $content ) )
            $input = $content;
       
        return $input;
    }
endif;
// slider section content details.
add_filter( 'mik_filter_slider_section_details', 'mik_get_slider_section_details' );


if ( ! function_exists( 'mik_render_slider_section' ) ) :
  /**
   * Start slider section
   *
   * @return string slider content
   * @since Mik 1.0.0
   *
   */
   function mik_render_slider_section( $content_details = array() ) {
        if ( empty( $content_details ) )
            return;

        $slider_control = mik_theme_option( 'slider_arrow' );
        $auto_slide = mik_theme_option('slider_auto_slide', false );
        $readmore = mik_theme_option( 'slider_btn_label', '' );
        ?>
    	<div id="custom-header" class="homepage-section">
            <div class="section-content banner-slider center-align column-3" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "infinite": true, "speed": 1200, "dots": false, "arrows":<?php echo $slider_control ? 'true' : 'false'; ?>, "autoplay": <?php echo $auto_slide ? 'true' : 'false'; ?>, "fade": false, "draggable": true }'>
                <?php foreach ( $content_details as $content ) : ?>
                    <div class="custom-header-content-wrapper slide-item">
                        <div class="overlay"></div>
                        <?php if ( ! empty( $content['image'] ) ) : ?>
                            <img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>">
                        <?php endif; ?>

                        <div class="wrapper">
                            <div class="custom-header-content">
                                <span class="cat-links">
                                    <?php the_category( ', ', '', $content['id'] ); ?>
                                </span>

                                <?php if ( ! empty( $content['title'] ) ) : ?>
                                    <h2><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                <?php endif; 

                                if ( ! empty( $content['url'] ) && ! empty( $readmore ) ) : ?>
                                    <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn btn-transparent"><?php echo esc_html( $readmore ); ?></a>
                                <?php endif; ?>
                            </div><!-- .custom-header-content -->
                        </div><!-- .wrapper -->
                    </div><!-- .custom-header-content-wrapper -->
                <?php endforeach; ?>
            </div><!-- .banner-slider -->
        </div><!-- #custom-header -->
    <?php 
    }
endif;