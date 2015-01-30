<?php 
/*
Template Name: Textos+Audio
*/
get_header();


function showPost( $p ) {
		
		$file = $p['meta']['audio_archivo'][0];
		$file = get_site_url() . '/wp-content/files_mf/' . $file;
		$fadeIn = $p["meta"]["audio_fadein"][0];
		$fadeOut = $p["meta"]["audio_fadeout"][0];
		//$echo .= makeLink( $p['ttl'], $file );+
		
		$showTtl = $p["meta"]["texto_titulo_visible"][0];

		$echo = "";

		if( $showTtl != "" ) {

			$echo .= '<h3>'.$showTtl.'</h3>';
			
		}

		if( $p["cnt"] != "" ) {
			$echo .= $p["cnt"];
		}

		$echo .= '<audio src="'.$file.'" data-fadein="'.$fadeIn.'" data-fadeOut="'.$fadeOut.'" controls preload="none">';

		$echo = makeDiv( 'text_'.$p['ID'], "text row", $echo );
		
/*
		$args = array( 'post_type' => 'texto', 'post_parent'=>$p['ID'], 'posts_per_page' => -1, 'orderby' => 'menu_order' );
		$q = new WP_Query( $args );

		if( $q -> have_posts() ) {

			while( $q -> have_posts() ) {
				$q -> the_post();
				$p = getPost();

				$echo .= showPost( $p );

			}

		}
		wp_reset_query();*/

		return $echo;
}

function textos() {

$args = array( 'post_type' => 'texto', 'category_name'=>'Capitulo1', 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC' );
$q = new WP_Query( $args );

if( $q -> have_posts() ) {

	while( $q -> have_posts() ) {
		$q -> the_post();
		$p = getPost();

		echo showPost( $p );

	}

}


}


?>


<div id="counter" class="row"></div>
<div id="text_frame" class="row">
	
	<div id="text_holder" class="row">
		<div id="texts" class="small-12 medium-10 medium-offset-1 columns">
			<?php textos(); ?>
		</div>
	</div>

</div>

<div id="audios" class="row">
</div>






<?php get_footer(); ?>