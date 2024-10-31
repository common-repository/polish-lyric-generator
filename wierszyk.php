<?php
/**
 * Plugin Name: Polish lyric generator
 * Plugin URI: http://seogen.pl
 * Description: Generate lyric on specific subject on website
 * Version: 0.1
 * Author: Grzegorz Patynek
 * Author URI: http://seogen.pl
 * License: GPL2
 */
 /*  Copyright 2013  Grzegorz Patynek  (email : gpatynek@gmail.com)

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

function wierszyk_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#dolly {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'wierszyk_css' );
function get_lyric() {
$tytuly = array();
$tytuly[0] = 'impreza';
$tytuly[1] = 'piwnica';
$tytuly[2] = 'jestem';
$tytuly[3] = 'komputer';
$tytuly[4] = 'epizod';
$tytuly[5] = 'nagle';
$tytuly[6] = 'piepszony';
$tytuly[7] = 'nienawidze';
$tytuly[8] = 'samotny';
$tytuly[9] = 'sukces';
$tytuly[10] = 'przyjaciele';
$tytuly[11] = 'gra';

$i = rand(0,11);
$url = 'http://seogen.pl:8080/seogen/Wiersz?tytul='.$tytuly[$i];
$options = array(
    'http' => array(
        'protocol_version' => '1.0',
        'method' => 'GET'
    )
);
$context = stream_context_create($options);
$text = file_get_contents($url,false,$context);
echo $text;
}
add_shortcode( 'lyric', 'get_lyric' );