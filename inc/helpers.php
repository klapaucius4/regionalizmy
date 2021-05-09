<?php

function reg_get_map_coordinates(){
    
}


function bootstrap_pagination( \WP_Query $wp_query = null, $echo = true, $params = [] ) {
    if ( null === $wp_query ) {
        global $wp_query;
    }

    $add_args = [];

    //add query (GET) parameters to generated page URLs
    /*if (isset($_GET[ 'sort' ])) {
        $add_args[ 'sort' ] = (string)$_GET[ 'sort' ];
    }*/

    $pages = paginate_links( array_merge( [
            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
            'format'       => '?paged=%#%',
            'current'      => max( 1, get_query_var( 'paged' ) ),
            'total'        => $wp_query->max_num_pages,
            'type'         => 'array',
            'show_all'     => false,
            'end_size'     => 3,
            'mid_size'     => 1,
            'prev_next'    => true,
            'prev_text'    => __( '« Wstecz', 'rgm' ),
            'next_text'    => __( 'Dalej »', 'rgm' ),
            'add_args'     => $add_args,
            'add_fragment' => ''
        ], $params )
    );

    if ( is_array( $pages ) ) {
        //$current_page = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );
        $pagination = '<nav class="pagination-container"><ul class="pagination">';

        foreach ( $pages as $page ) {
            $pagination .= '<li class="page-item' . (strpos($page, 'current') !== false ? ' active' : '') . '"> ' . str_replace('page-numbers', 'page-link', $page) . '</li>';
        }

        $pagination .= '</ul></nav>';

        if ( $echo ) {
            echo $pagination;
        } else {
            return $pagination;
        }
    }

    return null;
}


function rgmCoordinatesConverter($coordinates){
    $newCoordinates = array();
    $v0 = json_decode($coordinates);
    if($v0){
      $array1 = array();
      foreach($v0 as $v1){
                    if(is_array($v1)){
                      if(is_array($v1[0])){
                        $array3 = array();
                        foreach($v1 as $a){
                          // if(!is_array($a)){
                          //   var_dump($a); exit;
                          // }
                          $array3[] = array_reverse($a);
                        }
                        $array2 = $array3;
                        // var_dump($array2); exit;
                      }else{
                        $array2 = array_reverse($v1);
                      }
                      
                      // foreach($v1 as $v2){
                      //   print_r($v2); exit;
                      //               // if(is_array($v2)){
                      //                 $array3 = array_reverse($v2);
                                      
                      //               // }
                      //   $array2[] = $array3;
                      // }
                    }
        $array1[] = $array2;
      }


      $newCoordinates = json_encode($array1);
    }
    $newCoordinates = str_replace('"', "", trim($newCoordinates));
    return $newCoordinates;
  }





  // HTML Minifier
function minify_html($input) {
  if(trim($input) === "") return $input;
  // Remove extra white-space(s) between HTML attribute(s)
  $input = preg_replace_callback('#<([^\/\s<>!]+)(?:\s+([^<>]*?)\s*|\s*)(\/?)>#s', function($matches) {
      return '<' . $matches[1] . preg_replace('#([^\s=]+)(\=([\'"]?)(.*?)\3)?(\s+|$)#s', ' $1$2', $matches[2]) . $matches[3] . '>';
  }, str_replace("\r", "", $input));
  // Minify inline CSS declaration(s)
  if(strpos($input, ' style=') !== false) {
      $input = preg_replace_callback('#<([^<]+?)\s+style=([\'"])(.*?)\2(?=[\/\s>])#s', function($matches) {
          return '<' . $matches[1] . ' style=' . $matches[2] . minify_css($matches[3]) . $matches[2];
      }, $input);
  }
  if(strpos($input, '</style>') !== false) {
    $input = preg_replace_callback('#<style(.*?)>(.*?)</style>#is', function($matches) {
      return '<style' . $matches[1] .'>'. minify_css($matches[2]) . '</style>';
    }, $input);
  }
  if(strpos($input, '</script>') !== false) {
    $input = preg_replace_callback('#<script(.*?)>(.*?)</script>#is', function($matches) {
      return '<script' . $matches[1] .'>'. minify_js($matches[2]) . '</script>';
    }, $input);
  }

  return preg_replace(
      array(
          // t = text
          // o = tag open
          // c = tag close
          // Keep important white-space(s) after self-closing HTML tag(s)
          '#<(img|input)(>| .*?>)#s',
          // Remove a line break and two or more white-space(s) between tag(s)
          '#(<!--.*?-->)|(>)(?:\n*|\s{2,})(<)|^\s*|\s*$#s',
          '#(<!--.*?-->)|(?<!\>)\s+(<\/.*?>)|(<[^\/]*?>)\s+(?!\<)#s', // t+c || o+t
          '#(<!--.*?-->)|(<[^\/]*?>)\s+(<[^\/]*?>)|(<\/.*?>)\s+(<\/.*?>)#s', // o+o || c+c
          '#(<!--.*?-->)|(<\/.*?>)\s+(\s)(?!\<)|(?<!\>)\s+(\s)(<[^\/]*?\/?>)|(<[^\/]*?\/?>)\s+(\s)(?!\<)#s', // c+t || t+o || o+t -- separated by long white-space(s)
          '#(<!--.*?-->)|(<[^\/]*?>)\s+(<\/.*?>)#s', // empty tag
          '#<(img|input)(>| .*?>)<\/\1>#s', // reset previous fix
          '#(&nbsp;)&nbsp;(?![<\s])#', // clean up ...
          '#(?<=\>)(&nbsp;)(?=\<)#', // --ibid
          // Remove HTML comment(s) except IE comment(s)
          '#\s*<!--(?!\[if\s).*?-->\s*|(?<!\>)\n+(?=\<[^!])#s'
      ),
      array(
          '<$1$2</$1>',
          '$1$2$3',
          '$1$2$3',
          '$1$2$3$4$5',
          '$1$2$3$4$5$6$7',
          '$1$2$3',
          '<$1$2',
          '$1 ',
          '$1',
          ""
      ),
  $input);
}

// CSS Minifier => http://ideone.com/Q5USEF + improvement(s)
function minify_css($input) {
  if(trim($input) === "") return $input;
  return preg_replace(
      array(
          // Remove comment(s)
          '#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')|\/\*(?!\!)(?>.*?\*\/)|^\s*|\s*$#s',
          // Remove unused white-space(s)
          '#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\'|\/\*(?>.*?\*\/))|\s*+;\s*+(})\s*+|\s*+([*$~^|]?+=|[{};,>~]|\s(?![0-9\.])|!important\b)\s*+|([[(:])\s++|\s++([])])|\s++(:)\s*+(?!(?>[^{}"\']++|"(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')*+{)|^\s++|\s++\z|(\s)\s+#si',
          // Replace `0(cm|em|ex|in|mm|pc|pt|px|vh|vw|%)` with `0`
          '#(?<=[\s:])(0)(cm|em|ex|in|mm|pc|pt|px|vh|vw|%)#si',
          // Replace `:0 0 0 0` with `:0`
          '#:(0\s+0|0\s+0\s+0\s+0)(?=[;\}]|\!important)#i',
          // Replace `background-position:0` with `background-position:0 0`
          '#(background-position):0(?=[;\}])#si',
          // Replace `0.6` with `.6`, but only when preceded by `:`, `,`, `-` or a white-space
          '#(?<=[\s:,\-])0+\.(\d+)#s',
          // Minify string value
          '#(\/\*(?>.*?\*\/))|(?<!content\:)([\'"])([a-z_][a-z0-9\-_]*?)\2(?=[\s\{\}\];,])#si',
          '#(\/\*(?>.*?\*\/))|(\burl\()([\'"])([^\s]+?)\3(\))#si',
          // Minify HEX color code
          '#(?<=[\s:,\-]\#)([a-f0-6]+)\1([a-f0-6]+)\2([a-f0-6]+)\3#i',
          // Replace `(border|outline):none` with `(border|outline):0`
          '#(?<=[\{;])(border|outline):none(?=[;\}\!])#',
          // Remove empty selector(s)
          '#(\/\*(?>.*?\*\/))|(^|[\{\}])(?:[^\s\{\}]+)\{\}#s'
      ),
      array(
          '$1',
          '$1$2$3$4$5$6$7',
          '$1',
          ':0',
          '$1:0 0',
          '.$1',
          '$1$3',
          '$1$2$4$5',
          '$1$2$3',
          '$1:0',
          '$1$2'
      ),
  $input);
}

// JavaScript Minifier
function minify_js($input) {
  if(trim($input) === "") return $input;
  return preg_replace(
      array(
          // Remove comment(s)
          '#\s*("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')\s*|\s*\/\*(?!\!|@cc_on)(?>[\s\S]*?\*\/)\s*|\s*(?<![\:\=])\/\/.*(?=[\n\r]|$)|^\s*|\s*$#',
          // Remove white-space(s) outside the string and regex
          '#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\'|\/\*(?>.*?\*\/)|\/(?!\/)[^\n\r]*?\/(?=[\s.,;]|[gimuy]|$))|\s*([!%&*\(\)\-=+\[\]\{\}|;:,.<>?\/])\s*#s',
          // Remove the last semicolon
          '#;+\}#',
          // Minify object attribute(s) except JSON attribute(s). From `{'foo':'bar'}` to `{foo:'bar'}`
          '#([\{,])([\'])(\d+|[a-z_][a-z0-9_]*)\2(?=\:)#i',
          // --ibid. From `foo['bar']` to `foo.bar`
          '#([a-z0-9_\)\]])\[([\'"])([a-z_][a-z0-9_]*)\2\]#i'
      ),
      array(
          '$1',
          '$1$2',
          '}',
          '$1$3',
          '$1.$3'
      ),
  $input);
}

function alphabeticalListOfLetters(){
  return array('a', 'b', 'c', 'ć', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'ł', 'm', 'n', 'ń', 'o', 'ó', 'p', 'r', 's', 'ś', 't', 'u', 'w', 'y', 'z', 'ź', 'ż');
}



function getUserIpAddr(){
  if(!empty($_SERVER['HTTP_CLIENT_IP'])){
      //ip from share internet
      $ip = $_SERVER['HTTP_CLIENT_IP'];
  }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
      //ip pass from proxy
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }else{
      $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}

function get_breadcrumb_structure(){
  $breadrumbStructure = array();
  $frontpageID = get_option( 'page_on_front' );

  // frontpage
  $breadrumbStructure[] = array(
    get_the_title($frontpageID),      // title
    get_the_permalink($frontpageID),  // url / active
  );

  if(is_singular('rgm_phrase')){
    $breadrumbStructure[] = array(
      __('Słownik', 'rgm'),
      get_post_type_archive_link('rgm_phrase')
    );
    $breadrumbStructure[] = array(
      get_the_title(),
      false
    );
  }
  elseif(is_post_type_archive('rgm_phrase')){
    if(isset($_GET['litera'])){
      $breadrumbStructure[] = array(
        __('Słownik', 'rgm'),
        get_post_type_archive_link('rgm_phrase')
      );
      $breadrumbStructure[] = array(
        (__('Frazy na literę', 'rgm') . ' ' . '<b>' . strtoupper(strip_tags($_GET['litera']))) . '</b>',
        false
      );
    }else{
      $breadrumbStructure[] = array(
        __('Słownik', 'rgm'),
        false
      );
    }
  }
  elseif(is_page() || is_single()){
    $breadrumbStructure[] = array(
      get_the_title(),
      false
    );
  }
  else{
    $breadrumbStructure[] = array(
      get_the_title(),
      false
    );
  }

  return $breadrumbStructure;
  
}