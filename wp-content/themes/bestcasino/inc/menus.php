<?php

/*
 * A filter that adds class to menu items
 */

/*
 * A custom nav walker to create navigation menus in plain <a> tags. 
 * That is the <ul> and <li> tags are not present. Very useful if you want to create 
 * simple links that can be centered with a simple text-align:center on the containing element.
 *
 * @link https://gist.github.com/kosinix/5544535
 *
 */

class Header_Walker extends Walker_Nav_Menu {
    /**
     * Start the element output.
     *
     * @param  string $output Passed by reference. Used to append additional content.
     * @param  object $item   Menu item data object.
     * @param  int $depth     Depth of menu item. May be used for padding.
     * @param  array $args    Additional strings.
     * @return void
     */

    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat( "\t", $depth );
        $output .= "\n$indent<ul class='header__nav__sub js-sub-menu'>";
    }

    function end_lvl(&$output, $depth = 0, $arg = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent</ul>";
    }

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
            $classes = $item->classes;
            $classes[]= 'item-' . $item->menu_order;
            if($item->menu_item_parent == 0){
                array_push($classes,"header__nav__item");
            } else {
                array_push($classes,"header__nav__subitem");
            }
            if ($args-> walker -> has_children) {
                array_push($classes,"header__nav__item--dropdown js-menu-item");
            }
            $class_names = ' class="'. implode( ' ', $classes ) . '"';

            $output .= "<li id='menu-item-$item->ID' $class_names>";
            $attributes  = '';

            ! empty( $item->attr_title )
            and $attributes .= ' title="'  . esc_attr( $item->attr_title ) .'"';
            ! empty( $item->target )
            and $attributes .= ' target="' . esc_attr( $item->target     ) .'"';
            ! empty( $item->xfn )
            and $attributes .= ' rel="'    . esc_attr( $item->xfn        ) .'"';
            ! empty( $item->url )
            and $attributes .= ' href="'   . esc_attr( $item->url        ) .'"';

            $title = apply_filters( 'the_title', $item->title, $item->ID );

            if(!($args-> walker -> has_children)) {
                $item_output = $args->before
                    . '<a class="nav-link" ' . $attributes . '>'
                    . $args->link_before
                    . $title
                    . $args->link_after
                    . '</a> '
                    . $args->after;
            } else {
                $item_output = $args->before
                    . '<span class="nav-link" ' . '>'
                    . $title
                    .'</span>'
                    . $args->after;

            }

            // Since $output is called by reference we don't need to return anything.
            $output .= apply_filters(
                'walker_nav_menu_start_el'
                ,   $item_output
                ,   $item
                ,   $depth
                ,   $args
            );
        }
}

class Footer_Walker extends Walker_Nav_Menu {
    /**
     * Start the element output.
     *
     * @param  string $output Passed by reference. Used to append additional content.
     * @param  object $item   Menu item data object.
     * @param  int $depth     Depth of menu item. May be used for padding.
     * @param  array $args    Additional strings.
     * @return void
     */
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat( "\t", $depth );
        $output .= "\n$indent<ul class='footer__nav__sub'>";
    }

    function end_lvl(&$output, $depth = 0, $arg = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent</ul>";
    }

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $classes[]= 'item-' . $item->menu_order;
        if($item->menu_item_parent == 0){
            array_push($classes,"footer-menu-item");
        } else {
            array_push($classes,"footer-submenu-item");
        }
        $class_names = ' class="'. implode( ' ', $classes ) . '"';

        $output .= "<li id='menu-item-$item->ID' $class_names>";


        $attributes  = '';

        ! empty( $item->attr_title )
        and $attributes .= ' title="'  . esc_attr( $item->attr_title ) .'"';
        ! empty( $item->target )
        and $attributes .= ' target="' . esc_attr( $item->target     ) .'"';
        ! empty( $item->xfn )
        and $attributes .= ' rel="'    . esc_attr( $item->xfn        ) .'"';
        ! empty( $item->url )
        and $attributes .= ' href="'   . esc_attr( $item->url        ) .'"';

        $title = apply_filters( 'the_title', $item->title, $item->ID );

        if(!($args-> walker -> has_children)) {
            $item_output = $args->before
                . '<a class="footer__nav__link" ' . $attributes . '>'
                . $args->link_before
                . $title
                . $args->link_after
                . '</a> '
                . $args->after;
        } else {
            $item_output = $args->before
                . '<span class="footer__nav__link" ' . '>'
                . $title
                .'</span>'
                . $args->after;

        }

        // Since $output is called by reference we don't need to return anything.
        $output .= apply_filters(
            'walker_nav_menu_start_el'
            ,   $item_output
            ,   $item
            ,   $depth
            ,   $args
        );
    }
}