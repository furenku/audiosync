<?php 
/*
Template Name: Textos+Audio
*/
get_header();


function showPost( $p ) {
		$file = $p['meta']['archivo'][0];
		$file = get_site_url() . '/wp-content/files_mf/' . $file;
		$fadeIn = $p["meta"]["fadein"][0];
		$fadeOut = $p["meta"]["fadeout"][0];
		//$echo .= makeLink( $p['ttl'], $file );+
		
		$showTtl = $p["meta"]["mostrar_titulo"][0];

		$echo = "";

		if( $showTtl == 1 ) {

			$echo .= '<h3>'.$p["ttl"].'</h3>';
			
		}

		if( $p["cnt"] != "" ) {
			$echo .= $p["cnt"];
		}

		$echo .= '<audio src="'.$file.'" data-fadein="'.$fadeIn.'" data-fadeOut="'.$fadeOut.'" controls preload="none">';

		$echo = makeDiv( 'text_'.$p['ID'], "text row", $echo );
		
		$child_posts = get_posts( array('post_parent'=>$p['ID'], 'posts_per_page' => -1 ) );

			var_dump($child_posts);
		foreach ($child_posts as $child_post ) {	
			$pp = getPost( $child_post->ID );			
			var_dump($pp);
			$echo .= showPost( getPost( $pp->ID ) );
		}

		return $echo;
}

function textos() {

$args = array( 'post_type' => 'texto', 'category_name'=>'Capitulo', 'posts_per_page' => -1 );
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



<div id="text_frame" class="row">
	
	<div id="text_holder" class="row">
		<div id="texts" class="medium-10 medium-offset-1 columns">
			<?php textos(); ?>
		</div>
	</div>

</div>

<div id="audios" class="row">
</div>






<?php get_footer(); ?>