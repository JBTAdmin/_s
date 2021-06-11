<?php

add_filter('walker_nav_menu_start_el', 'toggle_button', 20, 4);

/**
 * Add the caret inside the menu item link.
 *
 * @param string   $item_output The menu item's starting HTML output.
 * @param WP_Post  $item        Menu item data object.
 * @param int      $depth       Depth of menu item. Used for padding.
 * @param stdClass $args        An object of wp_nav_menu() arguments.
 * @return string
 */

function toggle_button($item_output, $item, $depth, $args)
{
    if (in_array('menu-item-has-children', $item->classes, true)) {
        $item_output .= '<button class="drawer-dropdown-button toggle" ><span class="plus"><i class="fa fa-plus"></i></span><span class="minus"><i class="fa fa-minus"></i></span></button>';
    }

    return $item_output;
}

// add_filter( 'nav_menu_item_title', 'add_caret', 10, 4 );
/**
 * Add the caret inside the menu item link.
 *
 * @param string $title menu item title.
 * @param object $item menu item object.
 * @param object $args menu args.
 * @param int    $depth the menu item depth.
 *
 * @return string
 */
function add_caret($title, $item, $args, $depth)
{
    if (in_array('menu-item-has-children', $item->classes, true)) {
        $title = '<span class="menu-item-title-wrap">' . $title . '</span>';

        // $title .= '<div class="caret-wrap ' . $item->menu_order . '" tabindex="0">';
        $title .= '<button class="drawer-dropdown-button toggle" ><span class="plus"><i class="fa fa-plus"></i></span><span class="minus"><i class="fa fa-minus"></i></span></button>';
        // $title .= '</div>';
    }

    return $title;
}

/**
 * Comments
 */
function gautam_comments($comment, $args, $depth)
{
    ?>
	<li <?php comment_class('list-none');?>>
		<!-- Comment -->
		<div id="comment-<?php comment_ID();?>"  >
			<div class="comment-inner md:flex p-9">
				<div class="comment-author-image h-32 ">
					<?php echo get_avatar($comment, 75); ?>
				</div>
				<div class="comment-content font-medium  pl-7">
					<div class="comment-title-wrapper">
						<span class="comment-author-title text-gray-800"><?php comment_author();?></span>
						<div class="comment-meta text-gray-500 text-xl pt-1">
							<a href="<?php echo esc_url(get_comment_link($comment->comment_ID)) ?>" class="comment-date"><?php printf(' %1$s ' . esc_html__('at', 'gautam') . ' %2$s', get_comment_date(), get_comment_time());?></a>
						</div>
					</div>
					<?php if ($comment->comment_approved == '0'): ?>
					<p><?php esc_html_e('Your comment is awaiting moderation.', 'gautam');?></p>
					<?php endif;?>
					<div class="comment-text text-2xl pt-5"><?php comment_text();?></div>
                    <div class="text-2xl pt-5 text-blue-900">
                        <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => esc_html__('Reply', 'gautam'))));?>
                                <?php edit_comment_link(esc_html__('Edit', 'gautam'), '  ', '');?>
                    </div>
				</div>
                
			</div>
		</div>
<?php
}