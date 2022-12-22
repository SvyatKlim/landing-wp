<?php
/**
 * The front page template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

get_header();

echo get_template_part('template-parts/intro', null, get_field('intro'));
echo get_template_part('template-parts/top-list');
echo get_template_part('template-parts/benefits-block', null, get_field('content'));
echo get_template_part('template-parts/booking-block', null, get_field('booking'));

get_footer();