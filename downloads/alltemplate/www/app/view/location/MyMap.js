Ext.define("MyApp.view.location.MyMap", {
    extend: "Ext.Map",
    xtype: 'mymap',
    config: {
        
        mapOptions: {
            center: new google.maps.LatLng(28.80010128657071, 77.28747820854187),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            mapTypeControl: false,
        },
        listeners: {
            maprender: function (comp, map) {
                
                var storedata=this.config.data;
                var lat=storedata.vLatitude;
                var long=storedata.vLongitude;
                var name=storedata.vLocationTitle;
                TextConstants.Callus=storedata.vTelephone;
                TextConstants.Web=storedata.vWebsite;
                TextConstants.Email=storedata.vEmail;
                console.log(lat);
                console.log(long);
                console.log(name);
                
                        var markersll = [lat,long,name];


                              var  pinImage = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|DAE",
                                        new google.maps.Size(21, 34),
                                        new google.maps.Point(0, 0),
                                        new google.maps.Point(10, 34));
                             var   pinShadow = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_shadow",
                                        new google.maps.Size(40, 37),
                                        new google.maps.Point(0, 0),
                                        new google.maps.Point(12, 35));
//                            }

                            var infowindow = new google.maps.InfoWindow();
                            var marker, i, pos;
                            var bounds = new google.maps.LatLngBounds();
                            for (i = 0; i < markersll.length; i++) {

                                pos = new google.maps.LatLng(markersll[0], markersll[1]);
                                bounds.extend(pos);
                                marker = new google.maps.Marker({
                                    position: pos,
                                    animation: google.maps.Animation.Drop,
                                    icon: pinImage,
                                    shadow: pinShadow,
                                    map: map,
                                    title: 'Click Me ' + i
                                   
                                });

                                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                                    return function () {
                                        infowindow.setContent(markersll[2]);
                                        infowindow.open(map, marker);
                                    }
                                })(marker, i));
                                
                                map.fitBounds(bounds);
                            }
            }
        },
        items:[{
                    xtype: 'panel',
                    layout: 'hbox',
                    docked:'bottom',
                    height:40,
                    items: [{
                            xtype: 'button',
                            html: '<img src="img/Tabicon/call.png" />',
                            ui:'plain',
                            style:'width:50px;height:50px;margin-top: -15px;',
                            flex:1,
                            listeners:{
                                tap:function(){
                                    phonecall()
                                }
                            }
                        }, {
                            xtype: 'button',
                            html: '<img src="img/Tabicon/web.png" />',
                            ui:'plain',
                            style:'width:50px;height:50px;margin-top: -15px;',
                            flex:1,
                            listeners:{
                                tap:function(){
                                   window.open(TextConstants.Web);
                                }
                            }
                        },{
                            xtype: 'button',
                            html: '<img src="img/Tabicon/send.png" />',
                            ui:'plain',
                            style:'width:50px;height:50px;margin-top: -15px;',
                            flex:1,
                               listeners:{
                                tap:function(){
                                   EmailLocation()
                                }
                            }
                        }]
                }]
    },
    
}); 