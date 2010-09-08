=== Protovis Loader ===
Contributors: seancarmody
Donate link: http://twitter.com/seancarmody
Tags: protovis, data visualization, charts
Requires at least: 2.8.0
Tested up to: 3.0.1
Stable tag: 0.1

Creates a shortcode to faciliate the use of [Protovis](http://vis.stanford.edu/protovis/) scripts.

== Description ==

Creates a shortcode to faciliate the use of Protovis scripts.

== Installation ==

1. Upload 'pv-loader' to the '/wp-content/plugins/' directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Use the [pvis] shortcode to add protovis code to your post

== Frequently Asked Questions ==

= What is the syntax of the pvis shortcode? =

Here is an example:

[pvis src="/scripts/pv/my-chart.js" img="images/fail.png"]My caption[/pvis]

src specifies the location of the protovis script
img specifes the URL of an image to display instead if scripts are blocked
alt speficies image alternative text

text between the tags will be set as a caption

= Is there any CSS control possible =

Not yet.

= Which Protovis library does the plugin use? =

Currently version Protovis 3.2 ships with the plugin.

= Can I use a different version of Protovis? =

Not yet.

== Screenshots ==

== To-Do List ==

This list is not really prioritised yet.

1. Improve user-agent (browser) detection
1. Create an options page
1. Allow for alterntive specification of the protovis js library
1. Replace tags in the imported script to allow shortcode parameters to be used in the script

I'm sure there'll be a lot more!

== Changelog ==

= 0.1 =
* The first release of the plugin.
