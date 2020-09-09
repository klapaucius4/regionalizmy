var map = L.map('rgm-map', {minZoom: 7, maxZoom: 10}).setView([51.759445, 19.457216], 6);

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
    this._div.innerHTML = '<h4>Lorem ipsum dolor</h4>' + (props ?
    '<b>' + props.name + '</b><br />' + '<span>' + props.subtitle + '</span>' + '<br /><br />' + props.density + ' people / mi<sup>2</sup>'
    : 'Hover over a state');
};

info.addTo(map);

/// scroll disabled
// map.scrollWheelZoom.disable();


// get color depending on population density value
function getColor(d) {
    return d > 100 ? '#800026' :
        d > 90  ? '#BD0026' :
        d > 75  ? '#E31A1C' :
        d > 60  ? '#FC4E2A' :
        d > 45   ? '#FD8D3C' :
        d > 30   ? '#FEB24C' :
        d > 15   ? '#FED976' :
            '#FFEDA0';
}
if(typeof countiesData !== 'undefined'){
    var geojson;
    geojson = L.geoJson(countiesData, {
        style: initStyle,
        onEachFeature: onEachFeature
    }).addTo(map);
}


/// actions begin
function resetHighlight(e) {
    // geojson.resetStyle(e.target)
    geojson.setStyle(initStyle(e.target.feature));
    info.update();
}
function setCurrentCounty(e) {
    var newCookie = {
        'id': e.target.feature.id,
        'name': e.target.feature.properties.name
    };
    if($.cookie('rgmUserCounty', JSON.stringify(newCookie), { expires: 7 })){
        geojson.resetStyle();
        e.target.setStyle({ fillColor: 'red' });
        $('.findCountyInput').val(e.target.feature.properties.name);
    };
    
}
function highlightFeature(e) {
    var layer = e.target;

    layer.setStyle({
        // weight: 5,
        color: '#666',
        dashArray: '',
        fillOpacity: 0.7
    });

    if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
    layer.bringToFront();
    }

    info.update(layer.feature.properties);
}
/// actions end

function initStyle(feature) {
    var returnData = {
    weight: 2,
    opacity: 1,
    color: 'green',
    dashArray: '3',
    fillOpacity: 0.7
    // fillColor: getColor(feature.properties.density)
    };
    return returnData;
}


function onEachFeature(feature, layer) {
    if(typeof cookie !== 'undefined' && feature.id == cookie.id){
    // returnData.fillColor = 'red';
    layer.setStyle({ fillColor: 'red' });
    }
    layer.on({
        mouseover: highlightFeature,
        mouseout: resetHighlight,
        click: setCurrentCounty
    });
}



map.attributionControl.addAttribution('Population data &copy; <a href="http://census.gov/">US Census Bureau</a>');


var legend = L.control({position: 'bottomright'});

legend.onAdd = function (map) {

    var div = L.DomUtil.create('div', 'info legend'),
    grades = [0, 15, 30, 45, 60, 75, 90, 100],
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
