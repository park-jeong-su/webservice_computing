<scrpt>

function initialize() {
      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map_canvas"));
         map.setCenter(new GLatLng(37.4419, 127.1419), 10);

        GDownloadUrl("./data.xml", function(data) {
          var xml = GXml.parse(data);
          var markers = xml.documentElement.getElementsByTagName("marker");
          for (var i = 0; i < markers.length; i++) {
            var latlng = new GLatLng(parseFloat(markers[i].getAttribute("lat")),
                                    parseFloat(markers[i].getAttribute("lng")));
            map.addOverlay(new GMarker(latlng));
          }
        });
      }
    }

</script>