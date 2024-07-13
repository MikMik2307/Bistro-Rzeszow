<?php
    $wrapper_attributes = get_block_wrapper_attributes([]);
    $rows = get_field('row' );
    $subtitle = get_field('range_subtitle');
    $title = get_field('range_title');
	$counter = 0;
?>

<section <?php echo $wrapper_attributes; ?>>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cab-range-intro">
                    <p class="cab-range-intro-subtitle"><?php echo $subtitle ?></p>
                    <p class="cab-range-intro-title"><?php echo $title ?></p>
                </div>
            </div>
        </div>
		<div class="row cab-range-list-row">
            <?php
            $args = array(
                'post_type' => 'range',
                'post_status' => 'publish',
                'posts_per_page' => '4',
                'paged' => 1,
                'order' =>'ASC',
            );
            $range_posts = new WP_Query( $args );
            ?>
            <div class="entry-content">
                <?php if ( $range_posts->have_posts() ) : ?>
                    <div class="range-posts">
                        <?php while ( $range_posts->have_posts() ) : $range_posts->the_post();
                            $post_id = $range_posts->post->ID;
                            $range_title          = get_field('title', $post_id);
                            $range_description    = get_field('description', $post_id);
                            $range_img            = get_field('range_featured_image', $post_id);
                            ?>
                            <div class="col-12 col-lg-5 cab-range-item-single" data-id="<?=$counter++?>">
                                <div class="cab-range-item-single-card">
                                    <div class="cab-range-featured-img"><img src="<?php echo esc_url($range_img); ?>"></div>
                                    <div class="cab-range-content-section">
                                        <div class="cab-range-title"><?php echo esc_html($range_title); ?></div>
                                        <div class="cab-range-description"><?php echo esc_html($range_description); ?></div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                <?php endif; ?>
            </div><!-- .entry-content -->
		</div>
        <div class="row cab-row-loadmore">
            <div class="col-12 cab-col-showmore-posts">
                <div class="cab-showmore-posts">
                    <p class="cab-showmore-posts-txt loadmore">+ Show more</p>
                </div>
            </div>
        </div>
    </div>
</section>

