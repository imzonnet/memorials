jQuery(document).ready(function($){

    $('.btn-view-map').each(function(){
       var thisEl = $(this), lat = thisEl.data('lat'), lng = thisEl.data('lng');
        google.maps.event.addDomListener(window, 'load', initialize);
        function initialize() {
            var myLatlng = new google.maps.LatLng(lat,lng);
            var mapOptions = {
                zoom: 4,
                center: myLatlng
            };
            var map = new google.maps.Map(document.getElementById('memorial-map'), mapOptions);

            google.maps.event.addListenerOnce(map, 'idle', function () {
                var currentCenter = map.getCenter();
                google.maps.event.trigger(map, 'resize');
                map.setCenter(currentCenter);

                map.setZoom(15);
            });

            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: 'Hello World!'
            });

            $("#memorial-map-modal").on("shown.bs.modal", function(e) {
                google.maps.event.trigger(map, "resize");
                return map.setCenter(myLatlng); // Set here center map coordinates
            });
        }
    });
});