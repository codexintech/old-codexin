    /*--------------------------------------------------------------

  Google Map Customization

    ---------------------------------------------------------------- */
(function(){
    var map;

    map = new GMaps({
        el: '#gmap',
        lat: codexin_lat,
        lng: codexin_long,
        scrollwheel:false,
        zoom: codexin_m_zoom,
        zoomControl : true,
        panControl : false,
        streetViewControl : false,
        mapTypeControl: true,
        overviewMapControl: false,
        clickable: false
    });

    // var image = 'http://www.surgeenterprise.com/wp-content/uploads/2017/04/map-marker.png';
    var image = codexin_marker;



    map.addMarker({
        lat: codexin_lat,
        lng: codexin_long,
        icon: image,
        animation: google.maps.Animation.DROP,
        verticalAlign: 'bottom',
        horizontalAlign: 'center',
        backgroundColor: '#3e8bff',
    });

  var styles = [ 

  {

    "featureType": "road",

    "stylers": [

    { "color": "#b4b4b4" }

    ]

  },{

    "featureType": "water",

    "stylers": [

    { "color": "#c1efff" }

    ]

  },{

    "featureType": "landscape",

    "stylers": [

    { "color": "#f1f1f1" }

    ]

  },{

    "elementType": "labels.text.fill",

    "stylers": [

    { "color": "#000000" }

    ]

  },{

    "featureType": "poi",

    "stylers": [

    { "color": "#d9d9d9" }

    ]

  },{

    "elementType": "labels.text",

    "stylers": [

    { "saturation": 1 },

    { "weight": 0.1 },

    { "color": "#000000" }

    ]

  }



  ];



  map.addStyle({

    styledMapName:"Styled Map",

    styles: styles,

    mapTypeId: "map_style"  

  });

  map.setStyle("map_style");

}());