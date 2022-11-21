<?php
add_action( 'wp_ajax_posts_load_more', 'posts_load_more' );
add_action( 'wp_ajax_nopriv_posts_load_more', 'posts_load_more' );

function posts_load_more() {
    $termSlug = $_POST['termSlug'] ?? '';
    $order = $_POST['order']?? 'ASC';
    $orderby = $_POST['orderby'] ?? 'title';
    $meta = $_POST['meta'] ?? 0;
    $paged = $_POST['paged'] ?? 0;
    $perPage = $_POST['perPage'] ?? 12;
    $searchQuery = $_POST['query'] ?? '';
    $template_args = $_POST['args'] ?? null;

    $post_type = $_POST['postType'] ?? 'products';
    $post_term = $_POST['taxonomy'] ?? 'products-category';

        $args = array(
            'post_type' => $post_type,
            'posts_per_page' => $perPage,
            'paged' => $paged,
            'post_status' => 'publish',
            'orderby' => $orderby,
            'order' => $order,
        );

    if(!empty($termSlug) && $termSlug !== 0) {
        $args['tax_query'] =  array(
            array(
                'taxonomy' => $post_term,
                'field' => 'slug',
                'terms' => $termSlug,
            ),
        );
    }

    if(!empty($meta) && $meta !== 0) {
        $args['meta_query'] =  array(
            'text_field' => array(
                'key' => $meta,
                'compare' => 'EXISTS',
            ),
        );
    }

    if(!empty($searchQuery)) {
        $args['s'] = $searchQuery;
    }

    $query =  new WP_Query($args);
    if ( $query->have_posts() ) {

        while ( $query->have_posts() ) {
            $query->the_post();
            get_template_part( 'template-parts/single/' . $post_type, get_post_format(), $template_args);
        }

        wp_reset_postdata();
    }
    else {
        echo '<p>' . __('За вашим запитом нічого не знайдено', 'psec') . '</p>';
    }
    wp_reset_query();
    wp_die();
}





