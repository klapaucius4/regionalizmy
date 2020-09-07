<!-- Leaflet -->
<script src="<?= get_template_directory_uri(); ?>/vendor/leaflet/leaflet.js"></script>
<script type="text/javascript">

var statesData = {"type":"FeatureCollection","features":[
{"type":"Feature","id":"05","properties":{"name":"Arkansas","density":56.43},"geometry":{"type":"Polygon","coordinates":[[[49.777200,19.316800],[49.777800,19.316700],[49.777900,19.316300],[49.77900,19.315600],[49.779900,19.315500],[49.781600,19.315900],[49.783200,19.315800],[49.783900,19.315700],[49.784400,19.315500],[49.785300,19.314800],[49.786500,19.313300],[49.787600,19.312200],[49.788900,19.311400],[49.790200,19.311000],[49.790600,19.310600],[49.792100,19.309100],[49.793000,19.308300]]] }},
]};

console.log(statesData);

var statesDataa = {"type":"FeatureCollection","features":[]};

<?php
$counties = array(
  'type' => 'FeatureCollection',
  'features' => array()
);
$args = array(
  'post_type' => 'regionalizmy_county',
  'posts_per_page' => 20,
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
?>
    statesDataa.features.push({
      'type': 'Feature',
      // 'id': <?= get_the_ID(); ?>,
      'id': '<?= $counter++; ?>',
      'properties': {'name': '<?= get_the_title(); ?>', 'density': <?= intval(rand(1, 100)); ?>},
      'geometry': {
        'type': '<?= (count(json_decode($coordinates))<=1)?'Polygon':'MultiPolygon'; ?>',
        'coordinates': [<?= $coordinates; ?>]
      }
    });
<?php
endwhile; wp_reset_postdata();
?>

console.log(statesData);


var map = L.map('rgm-map').setView([51.759445, 19.457216], 7);

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
  maxZoom: 18,
  attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
  id: 'mapbox/light-v9',
  tileSize: 512,
  zoomOffset: -1
}).addTo(map);


// control that shows state info on hover
var info = L.control();

info.onAdd = function (map) {
  this._div = L.DomUtil.create('div', 'info');
  this.update();
  return this._div;
};

info.update = function (props) {
  this._div.innerHTML = '<h4>US Population Density</h4>' +  (props ?
    '<b>' + props.name + '</b><br />' + props.density + ' people / mi<sup>2</sup>'
    : 'Hover over a state');
};

info.addTo(map);


// get color depending on population density value
function getColor(d) {
  return d > 1000 ? '#800026' :
      d > 500  ? '#BD0026' :
      d > 200  ? '#E31A1C' :
      d > 100  ? '#FC4E2A' :
      d > 50   ? '#FD8D3C' :
      d > 20   ? '#FEB24C' :
      d > 10   ? '#FED976' :
            '#FFEDA0';
}

function style(feature) {
  return {
    weight: 2,
    opacity: 1,
    color: 'white',
    dashArray: '3',
    fillOpacity: 0.7,
    fillColor: getColor(feature.properties.density)
  };
}

function highlightFeature(e) {
  var layer = e.target;

  layer.setStyle({
    weight: 5,
    color: '#666',
    dashArray: '',
    fillOpacity: 0.7
  });

  if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
    layer.bringToFront();
  }

  info.update(layer.feature.properties);
}

var geojson;

function resetHighlight(e) {
  geojson.resetStyle(e.target);
  info.update();
}

function zoomToFeature(e) {
  map.fitBounds(e.target.getBounds());
}

function onEachFeature(feature, layer) {
  layer.on({
    mouseover: highlightFeature,
    mouseout: resetHighlight,
    click: zoomToFeature
  });
}

geojson = L.geoJson(statesData, {
  style: style,
  onEachFeature: onEachFeature
}).addTo(map);

map.attributionControl.addAttribution('Population data &copy; <a href="http://census.gov/">US Census Bureau</a>');


var legend = L.control({position: 'bottomright'});

legend.onAdd = function (map) {

  var div = L.DomUtil.create('div', 'info legend'),
    grades = [0, 10, 20, 50, 100, 200, 500, 1000],
    labels = [],
    from, to;

  for (var i = 0; i < grades.length; i++) {
    from = grades[i];
    to = grades[i + 1];

    labels.push(
      '<i style="background:' + getColor(from + 1) + '"></i> ' +
      from + (to ? '&ndash;' + to : '+'));
  }

  div.innerHTML = labels.join('<br>');
  return div;
};

legend.addTo(map);

</script>