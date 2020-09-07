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
            'prev_text'    => __( '« Wstecz' ),
            'next_text'    => __( 'Dalej »' ),
            'add_args'     => $add_args,
            'add_fragment' => ''
        ], $params )
    );

    if ( is_array( $pages ) ) {
        //$current_page = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );
        $pagination = '<div class="pagination"><ul class="pagination">';

        foreach ( $pages as $page ) {
            $pagination .= '<li class="page-item' . (strpos($page, 'current') !== false ? ' active' : '') . '"> ' . str_replace('page-numbers', 'page-link', $page) . '</li>';
        }

        $pagination .= '</ul></div>';

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