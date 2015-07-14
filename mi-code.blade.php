

@if(isset($mapa))
	<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>

	<script type="text/javascript">
	    

	    var infowindow = new google.maps.InfoWindow();

	    var marker, i;

	    var image = 'https://cdn0.iconfinder.com/data/icons/small-n-flat/24/678111-map-marker-48.png';

	    @if(isset($localizaciones))
	    	var map = new google.maps.Map(document.getElementById('mapa'), {
		      	zoom: 12,
		      	center: new google.maps.LatLng(18.46573465298379, -69.9055862560574),
		      	mapTypeId: google.maps.MapTypeId.ROADMAP
		    });

		    var locations = [
		      	['AfterImage', 18.478734566471957, -69.93721888807454],
		      	['27 de febrero', 18.46272239937689, -69.93620635417142],
		      	['UASD', 18.459313197220194, -69.9208587541882]
		    ];

		    for (i = 0; i < locations.length; i++) {  
		      	marker = new google.maps.Marker({
		        	position: new google.maps.LatLng(locations[i][1], locations[i][2]),
		        	map: map,
		        	icon: image
		      	});

		      	google.maps.event.addListener(marker, 'click', (function(marker, i) {
		        	return function() {
		          		infowindow.setContent(locations[i][0]);
		          		infowindow.open(map, marker);
		        	}
		      	})(marker, i));
		    }
		@endif
		@if(isset($oneMap))
			var map = new google.maps.Map(document.getElementById('mapa'), {
		      	zoom: 17,
		      	center: new google.maps.LatLng({{$content->lat}}, {{$content->long}}),
		      	mapTypeId: google.maps.MapTypeId.ROADMAP
		    });

		  	marker = new google.maps.Marker({
		     	position: new google.maps.LatLng({{$content->lat}}, {{$content->long}}),
		     	map: map,
		     	icon: image
		    });

		    //google.maps.event.addListener(marker, 'click', (function(marker, i) {
		    //	return function() {
		    //  		infowindow.setContent('<center>{{$content->nombre}}<br>{{formatTelLib::format($content->t1)}}</center>');
		    //  		infowindow.open(map, marker);
		    //	}
		   	//})(marker, i));

		    infowindow.setContent('<center>{{$content->nombre}}<br>{{formatTelLib::format($content->t1)}}</center>');
		   	infowindow.open(map,marker);
		@endif
	</script>
@endif


<div class="row">
	<div id="mapa" style="height:400px;"></div>
</div>
