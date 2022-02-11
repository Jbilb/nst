<?php

// HOW TO USE
// include_once 'pathto/multimap.class.php';
// $map = new Multimap('map-agences',8,[43.604652, 1.4442090000000007]); // Paramètres (ID de la map | Zoom | lat et long 'centrage normal')
// $map = new Multimap('map-agences',8,[43.596381, 1.432272, 43.605991, 1.483219]); // Paramètres (ID de la map | Zoom | lat et long et lat et long 'fitbounds')
// $map->setMarker($html,$lat,$long);  // Possibilité de foreach pour créer plusieurs markers,// Paramètres (Texte de la pop html | lat | long)
// echo $map->createMap();
//

class Multimap {
    
    private $idmap;
    private $zoommap = 13 ;
    private $centermap = [];
    private $marker;
    private $boundsVariables = '';
    private $boundsDeclaration = '';
    private $boundsResize = '';
    private $centerDeclaration = '';
    
    public function __construct($idmap, $zoommap, array $centermap) {
        if(!empty($idmap)) { 
            $this->idmap = $idmap; 
        }
        if(!empty($zoommap)){ 
            $this->zoommap = $zoommap;
        }
        
        if(!empty($centermap)){ 
            $this->centermap = (array)$centermap;
            $this->centerMap($this->centermap);
        }
        
    }
    
   public function setMarker($html,$lat,$long) {
        $this->html = (string)$this->test_input($html);
        $this->lat = (float)$this->test_input($lat);
        $this->long = (float)$this->test_input($long);
        $this->marker .= '[\''.$this->html.'\','.$this->lat.','.$this->long.', 1],'."\n";
    }
    
    private function centerMap(array $array) {
        $result = count($array);
        if($result == 4) {
            $this->boundsVariables = 	
                'var bounds = new google.maps.LatLngBounds();
                var firstB = new google.maps.LatLng('.$array[0].','.$array[1].');
                var secondB = new google.maps.LatLng('.$array[2].','.$array[3].');
                bounds.extend(firstB);
                bounds.extend(secondB);';
            $this->boundsDeclaration = 'map.fitBounds(bounds);';
            $this->boundsResize =
                'google.maps.event.addDomListener(window, "resize", function() {
                google.maps.event.trigger(map, "resize");
                map.fitBounds(bounds);	});';
        }else if($result == 2) {
            $this->centerDeclaration = ', center: new google.maps.LatLng('.$array[0].','.$array[1].')';
        }
         
    }
    
    public function createMap() {
    return 
<<<HTML
<script>
    function initialiser() { 
        {$this->boundsVariables}
        var locations = [
        {$this->marker}
        ];
        var  styles = [
          {
            featureType: "all",
            stylers: [
              { saturation: -100 }
            ]
          }
        ];
        var map = new google.maps.Map(document.getElementById('{$this->idmap}'), {
            zoom: {$this->zoommap}
            {$this->centerDeclaration}
            , mapTypeId: google.maps.MapTypeId.ROADMAP
            , scrollwheel: false
            , navigationControl: false
            , mapTypeControl: false
            , scaleControl: false
            , styles : styles
            , minZoom : 5
        });
        {$this->boundsDeclaration}
        var infowindow = new google.maps.InfoWindow();
        var marker, i;
        for (i = 0; i < locations.length; i++) {
           marker = new google.maps.Marker({
               position: new google.maps.LatLng(locations[i][1], locations[i][2])
               , map: map,
               icon: "img/icons/map.png"
           });
           google.maps.event.addListener(marker, 'click', (function (marker, i) {
               return function () {
                   infowindow.setContent(locations[i][0]);
                   infowindow.open(map, marker);
               }
           })(marker, i));
        }
        {$this->boundsResize}	
    }
</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6IZbf0OEZcl4F2Ivpa7h65PVWXONecY4&callback=initialiser"></script>
HTML;
}

    private function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        //$data = htmlspecialchars($data);
        return $data;
    }

    
}

?>