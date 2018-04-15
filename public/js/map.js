jQuery(function ($) {
    "use strict";

    function initialize() {
        //add map, the type of map
        var mapOptions = {
            zoom: 15,
            draggable: true,
            scrollwheel: false,
            animation: google.maps.Animation.DROP,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            center: new google.maps.LatLng(40.167009, 44.521333), // area location
            styles: [{
                "stylers": [{
                    "saturation": -100
                }, {
                    "gamma": 1
                }]
            }, {
                "elementType": "labels.text.stroke",
                "stylers": [{
                    "visibility": "off"
                }]
            }]
        };
        var mapElement = document.getElementById('map');
        var map = new google.maps.Map(mapElement, mapOptions);

        //add locations
        var locations = [
            ['<p class="logomap"><img src="/public/images/logo.png" alt="logo" style="width: 70px;"><span class="font-20 font-weight: 400;">Show-Master</span></p>', 40.167009,44.521333, '/public/images/map-marker.png'],
        ];
        //declare marker call it 'i'
        var marker, i;
        //declare infowindow
        var infowindow = new google.maps.InfoWindow();
        //add marker to each locations
        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                animation: google.maps.Animation.BOUNCE,
                map: map,
                icon: locations[i][3]
            });
            //click function to marker, pops up infowindow
            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    infowindow.setContent(locations[i][0]);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
    }
    google.maps.event.addDomListener(window, 'load', initialize);
});