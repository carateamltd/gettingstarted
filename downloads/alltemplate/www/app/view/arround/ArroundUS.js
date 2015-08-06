Ext.define("MyApp.view.arround.ArroundUS", {
    extend: "Ext.Map",
    xtype: 'arroundus',
    config: {
        mapOptions: {
            center: new google.maps.LatLng(28.80010128657071, 77.28747820854187),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            mapTypeControl: false,
        },
        listeners: {
            maprender: function (comp, map) {

//                appMask()
//                var url = URLConstants.URL + 'action=easyapps_aroundus_get&iApplicationId=' + TextConstants.ApplicationId;
//                MyApp.services.RemoteService.remoteCall(url,
//                        function success(Response) {
//                            console.log(Response);
//                            console.log("success come");
//                            appUnmask();
            
                          

                            var aroundSubStore = Ext.getStore('arroundsubstoreid');
                            var aroundStore = Ext.getStore('arroundstoreid');
                            var res = [];
                            var markersll = [];

                            var length = aroundSubStore.getCount();
                            var length2 = aroundStore.getCount();
                            for (var i = 0; i < length; i++) {
                                var color = aroundSubStore.data.items[i].data.rCatColor;
                                color = color.replace('#', '');
                                res.push(color);
                            }
                            for (var i = 0; i < length2; i++) {
                                var lat = aroundStore.data.items[i].data.rLatitude;
                                var long = aroundStore.data.items[i].data.rLongitude;
                                var name = aroundStore.data.items[i].data.rName;
                                console.log(lat)
                                console.log(long)
                                console.log(name)
                                markersll[i] = new Array(20);
                                     markersll[i][0]=name;
                                     markersll[i][1]=lat;
                                     markersll[i][2]=long;
                            }


                            var pinImage = new Array();
                            var pinShadow = new Array();

                            for (k = 0; k < 2; k++) {

                                pinImage[k] = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + res[k],
                                        new google.maps.Size(21, 34),
                                        new google.maps.Point(0, 0),
                                        new google.maps.Point(10, 34));
                                pinShadow[k] = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_shadow",
                                        new google.maps.Size(40, 37),
                                        new google.maps.Point(0, 0),
                                        new google.maps.Point(12, 35));
                            }

                            var infowindow = new google.maps.InfoWindow();
                            var marker, i, pos;
                            var bounds = new google.maps.LatLngBounds();
                            for (i = 0; i < markersll.length; i++) {

                                pos = new google.maps.LatLng(markersll[i][1], markersll[i][2]);
                                bounds.extend(pos);
                                marker = new google.maps.Marker({
                                    position: pos,
                                    animation: google.maps.Animation.Drop,
                                    icon: pinImage[i],
                                    shadow: pinShadow[i],
                                    map: map,
                                    title: 'Click Me ' + i
                                });

                                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                                    return function () {
                                        infowindow.setContent(markersll[i][0]);
                                        infowindow.open(map, marker);
                                    }
                                })(marker, i));
                                map.fitBounds(bounds);
                            }
                            
//                        },
//                        function failure(Response) {
//                            console.log('failure come')
//                            appUnmask();
////                            appCustomAlert(TextConstants.Sorry, Response.Message);
//                        }
//                );


            }
        }
    }
});