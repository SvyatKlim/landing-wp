<?php
add_action( 'wp_ajax_casino_sort', 'casino_sort' );
add_action( 'wp_ajax_nopriv_casino_sort', 'casino_sort' );

function casino_sort() {
    $term_slug = $_POST['termSlug'] ?? '';

        $args = array(
            'post_type' => 'casino',
            'post_status' => 'publish',
            'paged' => -1,
            'order' => 'DESC',
            'meta_key' => '_kksr_avg', //metabox with average rating created by kksr plugin
            'orderby' => 'meta_value_num',
        );

    if(!empty($term_slug) && $term_slug !== 0) {
        $args['tax_query'] =  array(
            array(
                'taxonomy' => 'casino-cat',
                'field' => 'slug',
                'terms' => $term_slug,
            ),
        );
    }


    $query =  new WP_Query($args);
    $number = 1;
    if ( $query->have_posts() ) {

        while ( $query->have_posts() ) {
            $query->the_post();
            echo get_template_part('template-parts\single-casino', null, [
                'index'=> $number
            ]);
            $number++;
        }

        wp_reset_postdata();
    }
    else {
        echo '<p>' . __('No casinos in rating', 'bcasino') . '</p>';
    }

    wp_reset_query();
    wp_die();
}





