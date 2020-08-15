var map;
            
            var location = new google.maps.LatLng(9.934720, -84.105909);
            
            mostrarMapa();

            window.onresize = function () {
                resizeMap();
            };

            //*********************************************************************
            //*********************************************************************
            //*********************************************************************
            //Funciones de los mapas
            //*********************************************************************
            //*********************************************************************
            //*********************************************************************

            function mostrarMapa() {
                var location = new google.maps.LatLng(9.934720, -84.105909);
                var zoom = 8;

                // Try HTML5 geolocation.
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        location = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                        zoom = 16;
                    });
                } else {
                   location = new google.maps.LatLng(9.934720, -84.105909);
                    zoom = 8;
                }

                //toma la capa en donde se creara el mata
                var mapCanvas = document.getElementById('map-container');

                //setea las opciones del mapa
                var mapOptions = {
                    center: location,
                    zoom: zoom,
                    panControl: false,
                    gestureHandling: 'cooperative',
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };

                //crea el mapa en la capa seleccionada y con las opciones indicadas
                map = new google.maps.Map(mapCanvas, mapOptions);

                //crea un nuevo marcador y lo setea en el mapa
                marker = new google.maps.Marker({
                    map: map,
                    draggable: true,
                    animation: google.maps.Animation.DROP,
                    position: location
                });

                //le setea un efecto al marcados
                marker.addListener('click', toggleBounce);
                marker.addListener('drag', obtenerCoordenadas);


                //toma la latitud del marcador 
                var latLng = marker.getPosition(); // returns LatLng object

                //y setea el mapa en la latitud del marcados
                map.setCenter(latLng); // setCenter takes a LatLng object

                //informacion del marcador
                var contentString = '<div class="info-window">' +
                                        '<h3 style="text-align:center;">SELECCIONE LA UBICACIÓN</h3>' +
                                        '<div class="info-content">' +
                                        '   <p style="text-align:center;">Seleccione y arrastre el marcador en la <b>ubicación en donde se encuentra la bodega</b> en el mapa</p>' +
                                        '</div>' +
                                    '</div>';

                //crea un info window en donde se mostrara la informacion en el marcados
                var infowindow = new google.maps.InfoWindow({
                    content: contentString,
                    maxWidth: 400
                });

                //le pone el info window en el marcador
                infowindow.open(map, marker);

            }

            //**********************************************************************************
            //efecto del marcador al dar clic
            //**********************************************************************************

            function toggleBounce() {
                if (marker.getAnimation() !== null) {
                    marker.setAnimation(null);
                } else {
                    marker.setAnimation(google.maps.Animation.BOUNCE);
                }
            }

            //**********************************************************************************
            //**********************************************************************************


            //**********************************************************************************
            //optiene las coordenadas del marcador en el mapa
            //**********************************************************************************
            function obtenerCoordenadas(){
                var ubicacion = marker.position.lat().toFixed(6) + "&" + marker.position.lng().toFixed(6);
                $("#coordenadas").html(ubicacion);
                
            }

            //**********************************************************************************
            //se crea el mapa 
            //**********************************************************************************
            google.maps.event.addDomListener(window, 'load', mostrarMapa);