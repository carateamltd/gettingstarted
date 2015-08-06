Ext.define("MyApp.view.event.EventNavi", {
    extend: "Ext.navigation.View",
    requires: [
        "MyApp.view.event.EventListView"
    ],
    alias: "widget.eventnavi",
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
                xtype:'eventlistview',
                title: Loc.t('EVENT.TITLE'),
                style: "background-image: url('img/splash.png');",
                scrollable:{
                	indicators:false
                }
            }]
    }
});
