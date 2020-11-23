<?php
/**
 * File autoloader functionality
 *
 * @package     LionHeart\CustomProducts\Support
 * @since       1.0.0
 * @author      Chris Norman
 * @link        https://lionheartdevs.com
 * @license     GNU General Public License 2.0+
 */
namespace LionHeart\CustomProducts\Support;

/**
 * Load all of the plugin's files.
 *
 * @since 1.0.0
 *
 * @param string $src_root_dir Root directory for the source files
 *
 * @return void
 */
function autoload_files( $src_root_dir ) {

	$filenames = array(
		 'custom/custom-post-type',
	);

	foreach( $filenames as $filename ) {
		include_once( $src_root_dir . $filename . '.php' );
	}
}
