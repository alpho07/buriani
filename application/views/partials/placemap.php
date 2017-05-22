
<body onload="initialize()">
    <div class="img-thumbnail">
        <input id="address" type="hidden" value="<?php echo $info[0]->region; ?>" >
    </div>
    <div id="map-canvas" style="height:150px;width:100%;"></div>
</body>
<script>
   
      var geocoder;
        var map;
    function initialize() {
      
        geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(-0.023559, 37.906193);
        var mapOptions = {
            zoom: 15,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            zoomControl: false, 
             scrollwheel: false,
            fullscreenControl: true
        }
        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        codeAddress();
    }


    function codeAddress() {
     
        var address = document.getElementById('address').value;
        geocoder.geocode({'address': address}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location,
                    zoom: 15,
                    zoomControl: false, 
                    scrollwheel: false,
                    fullscreenControl: true

                });
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }
</script>

</body>
