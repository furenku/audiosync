<?php


function makeLink($content="",$url="",$onclick=""){
  if($url=="") $url = "#";
    $str = "";
    $str = '<a href="'.$url.'"';
    if($onclick!="") {    
      $str .= ' onclick="'.$onclick.'"';
    }

  $str .= '>';
  $str .= $content;
  $str .= '</a>';

  return $str;
}




function makeDiv($id="",$class="", $content="", $link=""){
  $str = '<div';
    if($id!="") {     $str .= ' id="'.$id.'"';  }
    if($class!="") {  $str .= ' class="'.$class.'"'; }

  $str .= '>';

    if($link!="") {   $str .= '<a href="'.$link.'">'; }
    if($content!="") {  $str .= $content; }
    if($link!="") {   $str .= '</a>'; }
  
  $str .= '</div>';
  
  return $str;
}


function makeLi($id="",$class="", $content="", $link=""){
  $str = '<li';
    if($id!="") {     $str .= ' id="'.$id.'"';  }
    if($class!="") {  $str .= ' class="'.$class.'"'; }

  $str .= '>';

    if($link!="") {   $str .= '<a href="'.$link.'">'; }
    if($content!="") {  $str .= $content; }
    if($link!="") {   $str .= '</a>'; }
  
  $str .= '</li>';
  
  return $str;
}


function vcenter($content="", $link="", $align="center", $id="", $class="" ){
  $str =  makeDiv($id,'vcenter_table '.$class,
        makeDiv("","vcenter_container",makeDiv("", "vcenter_content ".$align, $content) )       
      );
  if($link!="") $str = makeLink($str,$link);
  
  return $str;
}


function themeDir($dir="") {
  return get_stylesheet_directory_uri() . '/' . $dir . '/';
}


function featImg( $size = 'full', $id = "" ){
   
  if($id != "")
    $img = wp_get_attachment_image_src( get_post_thumbnail_id($id), $size);
  else
    $img = wp_get_attachment_image_src( get_post_thumbnail_id(), $size);
  return $img[0];
}

function timThumb( $src, $w=200, $h=200, $zc=1, $q=100 ) {
  return get_stylesheet_directory_uri().'/scripts/timthumb/timthumb.php?src='.$src.'&w='.$w.'&h='.$h.'&zc='.$zc.'&q='.$q;
}




/***********************************************
 *        Contenido Wordpress
 **********************************************/

function filter($content="",$filter="filter"){
  return apply_filters("the_".$filter,$content);
}


function getPost(){
  
  $arr = array();
  
  $arr['ID'] = get_the_ID();
  $arr['ttl'] = filter( get_the_title(), 'title');
  $arr['ext'] = filter( get_the_excerpt(), 'excerpt');
  $arr['cnt'] = filter( get_the_content(), 'content');
  $arr['meta'] = get_post_meta( get_the_ID() );
  $arr['url'] = get_permalink( get_the_ID() );
  $arr['img'] = featImg( get_the_ID() );
  $arr['date'] = get_the_date();
  
  return $arr;

}


function getPostID($ID){


  $arr = array();
  $post = get_post($ID);
  $arr['ID'] = $ID;
  $arr['ttl'] = foo_filter( get_the_title($post), 'title');
  $arr['ext'] = foo_filter( get_the_excerpt($post), 'excerpt');
  $arr['cnt'] = foo_filter( get_the_content($post), 'content');
  $arr['meta'] = get_post_meta( $ID );
  $arr['url'] = get_permalink( $ID );
  $arr['img'] = foo_featImg( $ID );
  
  return $arr;

}

?>