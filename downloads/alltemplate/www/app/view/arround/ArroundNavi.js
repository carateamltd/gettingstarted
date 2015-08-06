Ext.define("MyApp.view.arround.ArroundNavi", {
    extend: "Ext.navigation.View",
    requires: [
        "MyApp.view.arround.ArroundListView"
    ],
    alias: "widget.arroundnavi",
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
                xtype:'arrounduslist',
                title:'Around',
                style: "background-image: url('img/splash.png');",
                scrollable:{
                	indicators:false
                }
            }]
    }
});
