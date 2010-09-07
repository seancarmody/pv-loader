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

function sProtovis($atts, $content = null) {
   extract(shortcode_atts(array(
                               'src' => '#',
                               'img' => '#',
   ), $atts));
   if ( $img ) 
       $no_script = "<noscript><img src='$img'></noscript>";
   else
       $no_script = '<noscript>Scripts disabled, cannot display image!</noscript>';
   $script = file_get_contents($src);
   $script = '<script type="text/javascript+protovis">'."\n".$script.'</script>';
   $caption = '<p align="center"><strong>'.do_shortcode($content).'</strong></p>';
   return $script.$no_script.$caption;
}
add_shortcode('pvis', 'sProtovis');

?>
