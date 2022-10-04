var directionsService = new google.maps.DirectionsService();
var map, geocoder, marker;
var depart, arrivee, ptCheck;
var lat = 49.36459;
var lon = 6.15869;

const icon = "O:/Informatiques/Applications/LocationReport/GMap_API/test.png"; 


const briquerie = { lat: 49.36459, lng: 6.15869 };

var testcircle;
var test;
var verif = false;

/*initialise google MAP V3*/
function init() {
	const date = Date.now();

	/*gestion des routes*/
	directionsDisplay = new google.maps.DirectionsRenderer();
	/*emplacement par défaut de la carte */
	var maison = new google.maps.LatLng(lat, lon);
	/*option par défaut de la carte*/
	var myOptions = {
		zoom: 18,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		center: maison,
		mapTypeId: "satellite",
		minZoom: 3
		
	}

	/*creation de la map*/
	map = new google.maps.Map(document.getElementById("divMap"), myOptions);

	/* Lorsquqe l'utilisateur appuie sur la map créé un div avec écrit "Salut toi" dedans dans le gestionnaire des missions  */
	map.addListener("click", function(event) {

		placeMarker(event.latLng);

		// En developpement
		if (geocoder) {
			geocoder.geocode({ 'address': "thionville" }, function (results, status) {
				if (status == google.maps.GeocoderStatus.OK) {

					/*on remplace l'adresse par celle fournie du geocoder*/
					document.getElementById("emplacement").value = results[0].formatted_address;
				} else {
					alert("Geocode n'a rien trouvé !\n raison : " + status);
				}
			});
		}

	});
	
	/*connexion de la map + le panneau de l'itinéraire*/
	directionsDisplay.setMap(map);
	directionsDisplay.setPanel(document.getElementById("divRoute"));
	/*intialise le geocoder pour localiser les adresses */
	geocoder = new google.maps.Geocoder();

	document.getElementById("test").addEventListener("click", test);

	/*Afficher votre possition boutton */
	infoWindow = new google.maps.InfoWindow();

	const locationButton = document.createElement("button");

	locationButton.textContent = "Votre position";
	locationButton.classList.add("custom-map-control-button");
	map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(locationButton);
	
	locationButton.addEventListener("click", () => {
		// Try HTML5 geolocation.
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(
				(position) => {
					const pos = {
						lat: position.coords.latitude,
						lng: position.coords.longitude,
					};
					const pos_2 = 
					{
						lat: position.coords.latitude+0.00005,
						lng: position.coords.longitude+0.00005,
					}
					//infoWindow.setPosition(pos_2);
					document.getElementById("latitude").value = position.coords.latitude;
					document.getElementById("longitude").value = position.coords.longitude;
					//infoWindow.setContent("Vous êtes ici");
					
					
					if(verif) { test.setMap(null); testcircle.setMap(null); }

					const svgMarker = {
						path: "M10.453 14.016l6.563-6.609-1.406-1.406-5.156 5.203-2.063-2.109-1.406 1.406zM12 2.016q2.906 0 4.945 2.039t2.039 4.945q0 1.453-0.727 3.328t-1.758 3.516-2.039 3.070-1.711 2.273l-0.75 0.797q-0.281-0.328-0.75-0.867t-1.688-2.156-2.133-3.141-1.664-3.445-0.75-3.375q0-2.906 2.039-4.945t4.945-2.039z",
						fillColor: "blue",
						fillOpacity: 0.6,
						strokeWeight: 0,
						rotation: 0,
						scale: 2,
						anchor: new google.maps.Point(15, 30),
					};
					test = new google.maps.Marker({
						position: pos,
						map,
						icon: svgMarker,
						optimized: true
					});
					testcircle = new google.maps.Circle({
						center: new google.maps.LatLng(pos),
						radius: 30,
						fillColor: "white",
						fillOpacity: 0.3,
						strokeOpacity: 0.0,
						strokeWeight: 0,
						map: map
					});

					test.addListener("click", () =>
					{
						map.setZoom(19);
						map.setCenter(pos);  
					});
					verif = true;
					
					//infoWindow.open(map);
					map.setCenter(pos);
					map.setZoom(19);
				},
				() => {
					handleLocationError(true, infoWindow, map.getCenter());
				}
			);
		} else {
			// Browser doesn't support Geolocation
			handleLocationError(false, infoWindow, map.getCenter());
		}
	});

	const centerControlDiv = document.createElement("div");

	CenterControl(centerControlDiv, map);
	map.controls[google.maps.ControlPosition.TOP_CENTER].push(centerControlDiv);
	





	/* Marker de test afficher les stats d'un parking */
	/*
	const pos1 = { // Position géographique de la briquerie
		lat: 49.36591748661367,
		lng: 6.15831122043127,
	};
	const image = "file:///C:/Users/ROSELLO/Downloads/parking-sign_icon-icons.com_72642.png"; 

	const beachMarker = new google.maps.Marker({
		position: pos1,
		map,
		icon: icon,
		fontSize: 5,
		
	});
	var circle = new google.maps.Circle({
		center: new google.maps.LatLng(pos1),
		radius: 10,
		fillColor: "#ff69b4",
		fillOpacity: 0.5,
		strokeOpacity: 0.0,
		strokeWeight: 0,
		map: map
	});
	beachMarker.addListener("mouseover", () => {	
		infoWindow.setPosition(pos1);
		infoWindow.setContent("Je suis moche");	
		infoWindow.open(map);
	});
	   */

	   
}

function placeMarker(location) {
	if (marker) { //on vérifie si le marqueur existe
		marker.setMap(null);
	}

	marker = new google.maps.Marker({ //on créé le marqueur
		position: location,
		map: map
	});
}
function addElement(location) {

	// En developpement
	if (geocoder) {
		geocoder.geocode({ 'address': document.getElementById(location).value }, function (results, status) {
			if (status == google.maps.GeocoderStatus.OK) {

				/*on remplace l'adresse par celle fournie du geocoder*/

				var test = results[0].formatted_address;
				var node = document.createElement("div");
				var textnode = document.createTextNode(test);
				node.appendChild(textnode);
				document.getElementById("Ici").appendChild(node);
				
			} else {
				alert("Geocode n'a rien trouvé !\n raison : " + status);
			}
		});
	}


}	

/* Bouton pour aller a la briquerie */
function CenterControl(controlDiv, map) {
	// Set CSS for the control border.
	const controlUI = document.createElement("div");
  
	controlUI.style.backgroundColor = "#fff";
	controlUI.style.border = "2px solid #fff";
	controlUI.style.borderRadius = "5px";
	controlUI.style.boxShadow = "0 2px 6px rgba(0,0,0,.3)";
	controlUI.style.cursor = "pointer";
	controlUI.style.marginTop = "8px";
	controlUI.style.marginBottom = "22px";
	controlUI.style.textAlign = "center";
	controlUI.title = "Retourner a cette magnifique école";
	controlDiv.appendChild(controlUI);
  
	// Set CSS for the control interior.
	const controlText = document.createElement("div");
  
	controlText.style.color = "rgb(25,25,25)";
	controlText.style.fontFamily = "Roboto,Arial,sans-serif";
	controlText.style.fontSize = "16px";
	controlText.style.lineHeight = "38px";
	controlText.style.paddingLeft = "5px";
	controlText.style.paddingRight = "5px";
	controlText.innerHTML = "Briquerie";
	controlUI.appendChild(controlText);
	// Setup the click event listeners: simply set the map to Chicago.
	controlUI.addEventListener("click", () => {
	  map.setCenter(briquerie);
	  map.setZoom(18);
	});
}

function test() {
	document.getElementById("latitude").value = "";
	document.getElementById("longitude").value = "";
}

function trouveRoute() {
	/*test si les variables sont bien initialisés*/
	if (depart && arrivee) {
		/*mode de transport*/
		var choixMode = document.getElementById("mode").value;

		var request = {
			origin: depart,
			destination: arrivee,
			travelMode: google.maps.DirectionsTravelMode[choixMode]
		};
		/*appel à l'API pour tracer l'itinéraire*/
		directionsService.route(request, function (response, status) {
			if (status == google.maps.DirectionsStatus.OK) {
				directionsDisplay.setDirections(response);
			}
		});
	}
}

function rechercher(src, code) {
	ptCheck = code; /*adresse de départ ou arrivée ? */
	if (geocoder) {
		geocoder.geocode({ 'address': document.getElementById(src).value }, function (results, status) {
			if (status == google.maps.GeocoderStatus.OK) {

				/*ajoute un marqueur à l'adresse choisie*/
				map.setCenter(results[0].geometry.location);
				if (marker) { marker.setMap(null); }
				marker = new google.maps.Marker({
					map: map,
					position: results[0].geometry.location
				});
				/*on remplace l'adresse par celle fournie du geocoder*/
				document.getElementById(src).value = results[0].formatted_address;
				if (ptCheck) {
					depart = results[0].formatted_address;
				} else {
					arrivee = results[0].formatted_address;
				}
				/*trace la route*/
				trouveRoute();
			} else {
				alert("Geocode n'a rien trouvé !\n raison : " + status);
			}
		});
	}

}


function rechercher2(src, src2) {
	if (geocoder) {
		geocoder.geocode({ 'address': document.getElementById(src).value }, function (results, status) {
			if (status == google.maps.GeocoderStatus.OK) {

				/*ajoute un marqueur à l'adresse choisie*/
				map.setCenter(results[0].geometry.location);
				if (marker) { marker.setMap(null); }
				marker = new google.maps.Marker({
					map: map,
					position: results[0].geometry.location
				});
				/*on remplace l'adresse par celle fournie du geocoder*/
				document.getElementById(src).value = results[0].formatted_address;
				depart = results[0].formatted_address;
				/*trace la route*/
				trouveRoute();
			} else {
				alert("Geocode n'a rien trouvé !\n raison : " + status);
			}
		});

	/* Arrivé */
		geocoder.geocode({ 'address': document.getElementById(src2).value }, function (results, status) {
			if (status == google.maps.GeocoderStatus.OK) {

				/*ajoute un marqueur à l'adresse choisie*/
				map.setCenter(results[0].geometry.location);
				if (marker) { marker.setMap(null); }
				marker = new google.maps.Marker({
					map: map,
					position: results[0].geometry.location
				});
				/*on remplace l'adresse par celle fournie du geocoder*/
				document.getElementById(src2).value = results[0].formatted_address;
				arrivee = results[0].formatted_address;
				/*trace la route*/
				trouveRoute();
			} else {
				alert("Geocode n'a rien trouvé !\n raison : " + status);
			}
		});
	}


}


function trouver() {
	map = new google.maps.Map(document.getElementById("divMap"), {
		center: new google.maps.LatLng(document.getElementById("latitude").value, document.getElementById("longitude").value),
		zoom: 17,
		mapTypeId: "satellite",
		mapTypeControl: true,
		scrollwheel: false,
		mapTypeControlOptions: {
			style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
		},
		navigationControl: true,
		navigationControlOptions: {
			style: google.maps.NavigationControlStyle.ZOOM_PAN
		}
	});
	var marker = new google.maps.Marker({
		position: { lat: document.getElementById("latitude").value, lng: document.getElementById("longitude").value },
		map: map
	});


	
}
