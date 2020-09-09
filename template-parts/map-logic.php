<?php
/**
 * - set_default_county
 * - set_current_county
 * - single_phrase
 */

$javaScriptString = "";
$javaScriptString .= "var countiesData = {'type':'FeatureCollection','features':[]};";
$args = array(
  'post_type' => 'regionalizmy_county',
  'posts_per_page' => -1,
  'meta_query' => array(
      array(
        'key' => 'koordynaty',
        'compare' => 'EXISTS'
      )
    )
);
$myQuery = new WP_Query($args);
$counter = 1;
while($myQuery->have_posts()): $myQuery->the_post();
  $coordinates = get_field('koordynaty');
  if(!$coordinates){
    continue;
  }
  $title = 'powiat '.get_the_title();
  $subTitle = '';
  if(get_field('miasto_na_prawach_powiatu')){
    $title = get_the_title();
    $subTitle = '(miasto na prawach powiatu)';
  }
  $coordinates = rgmCoordinatesConverter($coordinates);

  $javaScriptString .= "
    countiesData.features.push(
    {
      'type': 'Feature',
      'id': '<?= get_the_ID(); ?>',
      'properties': {'name': '" . $title . "', 'density': <?= intval(rand(1, 100)); ?>, 'subtitle': '" . $subTitle . "'},
      'geometry': {
        'type': '" . (substr($coordinates, 0, 3) == '[[[')?'MultiPolygon':'Polygon' ."',
        'coordinates': [".$coordinates."]
        }
    });";

endwhile; wp_reset_postdata();
?>
<script type="text/javascript">
<?php echo $javaScriptString; ?>
</script>