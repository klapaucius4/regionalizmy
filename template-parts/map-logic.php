<!-- Leaflet -->
<script src="<?= get_template_directory_uri(); ?>/vendor/leaflet/leaflet.js"></script>
<script>

var map = L.map('rgm-map');

map.createPane('labels');

// This pane is above markers but below popups
map.getPane('labels').style.zIndex = 650;

// Layers in this pane are non-interactive and do not obscure mouse/touch events
map.getPane('labels').style.pointerEvents = 'none';

var cartodbAttribution = '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, &copy; <a href="https://carto.com/attribution">CARTO</a>';

var positron = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_nolabels/{z}/{x}/{y}.png', {
  attribution: cartodbAttribution
}).addTo(map);

var positronLabels = L.tileLayer('http://{s}.basemaps.cartocdn.com/light_only_labels/{z}/{x}/{y}.png', {
  attribution: cartodbAttribution,
  pane: 'labels'
}).addTo(map);


<?php

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

while($myQuery->have_posts()): $myQuery->the_post();
  $coordinates = get_field('koordynaty');
  if(!$coordinates){
    continue;
  }
?>
  var counties = [<?= $coordinates; ?>];
  var polygon = L.polygon(counties);
  polygon.setStyle({
    'fillColor': '#ff0000'
  });
  polygon.on('mouseover', function () {
    this.setStyle({
      'fillColor': '#0000ff'
    });
  });
  polygon.on('mouseout', function () {
    this.setStyle({
      'fillColor': '#ff0000'
    });
  });
  polygon.addTo(map);
<?php endwhile; wp_reset_postdata(); ?>

var counties = [<?= null; ?>];
L.polygon(counties).addTo(map);

map.setView({ lat: 51.759445, lng: 19.457216 }, 7);

</script>