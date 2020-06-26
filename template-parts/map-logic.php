<!-- Leaflet -->
<script src="<?= get_template_directory_uri(); ?>/vendor/leaflet/leaflet.js"></script>
<script>

var map = L.map('map');

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


var countries = [<?= reg_get_map_coordinates(); ?>];
L.polygon(countries).addTo(map);


map.setView({ lat: 51.759445, lng: 19.457216 }, 4);

</script>