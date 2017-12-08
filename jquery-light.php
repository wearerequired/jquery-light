<?php
/**
 * Plugin Name: jQuery Light
 * Plugin URI:  https://github.com/wearerequired/jquery-light
 * Description: Removes jQuery Migrate from the list of jQuery dependencies and allows jQuery to enqueue before </body> instead of in the <head>.
 * Version:     1.0.0
 * Author:      required
 * Author URI:  https://required.com/
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * Copyright (c) 2017 required (email: info@required.ch)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2 or, at
 * your discretion, any later version, as published by the Free
 * Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @package Required\jQueryLight
 */

namespace Required\jQueryLight;

/**
 * Removes jQuery Migrate from the list of jQuery dependencies
 * and allows jQuery to enqueue before </body> instead of
 * in the <head>.
 *
 * @since 1.0.0
 *
 * @param \WP_Scripts $scripts WP_Scripts instance, passed by reference.
 */
function dequeue_jquery_migrate_and_move_jquery_to_footer( $scripts ) {
	if ( ! is_admin() && ! empty( $scripts->registered['jquery'] ) ) {
		$scripts->registered['jquery']->deps = array_diff(
			$scripts->registered['jquery']->deps,
			[ 'jquery-migrate' ]
		);

		$scripts->registered['jquery']->add_data( 'group', 1 );
		$scripts->registered['jquery-core']->add_data( 'group', 1 );
	}
}
add_action( 'wp_default_scripts', __NAMESPACE__ . '\dequeue_jquery_migrate_and_move_jquery_to_footer' );
