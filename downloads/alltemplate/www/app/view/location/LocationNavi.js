Ext.define("MyApp.view.location.LocationNavi", {
    extend: "Ext.navigation.View",
    requires: [
        "MyApp.view.location.LocationList"
    ],
    alias: "widget.locationnavi",
    config: {
        navigationBar: {
            hidden:false,
//            baseCls: 'younaviCls',
//            height: 50,
//            items:[{
//                      xtype:'button',
//                      ui:'plain',
//                      text:'<img src="img/backbtn.png" />'
//            }]
        },
        items: [{
                xtype:'locationlist',
                //title: Loc.t('LOCATION.TITLE'),
                //style: "background-image: url('img/splash.png');",
                scrollable:{
                	indicators:false
                }
            }]
    }
});
