<?php
/**
 * @package Protovis_Loader
 * @version 0.0.1
 */
/*
Plugin Name: Protovis Loader
Plugin URI: http://www.stubbornmule.net/#
Description: Creates a shortcode to faciliate the use of Protovis scripts.
Author: Sean Carmody
Version: 0.0.1
Author URI: http://www.stubbornmule.net/about/
License: GPL2

Copyright 2010 Sean Carmody  (email : sean@stubbornmule.net)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

wp_enqueue_script('protovis', WP_PLUGIN_URL.'/pv-loader/js/protovis-r3.2.js');

function sProtovisLoad($atts, $content = null) {
	extract(shortcode_atts(array(
		'src' => '',
		'img' => '',
		'alt' => '',
	), $atts));
	
	// Check for Internet Explorer (IE) which does not support SVG
	$using_ie = (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE);
	
	if ( !$alt )
		$alt = 'Scripts disabled, cannot display chart!';

	if ( $img )
		$no_script = "<img src='$img' alt='$alt'>";
	else
		$no_script = $alt;
	
	if ( $using_ie )
		$script = '';
	else {
		$no_script = "<noscript>$no_script</noscript>";
		$script = file_get_contents($src);
		$script = '<script type="text/javascript+protovis">'."\n".$script.'</script>';
	}
	
	if ( $content )
		$caption = '<p align="center"><strong>'.do_shortcode($content).'</strong></p>';
	else
		$caption = '';

	return $script.$no_script.$caption;
}
add_shortcode('pvis', 'sProtovisLoad');

?>
