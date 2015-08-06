Ext.define("MyApp.view.youtube.YouTubeNavi", {
    extend: "Ext.navigation.View",
    requires: [
        "MyApp.view.youtube.YouTube"
    ],
    alias: "widget.youtubenavi",
    config: {
        layout: {
            type: 'card'
        },
        scrollable: false,
        navigationBar: {
            hidden: true,
//            baseCls: 'younaviCls',
//            height: 50,
//            items:[{
//                      xtype:'button',
//                      ui:'plain',
//                      text:'<img src="img/backbtn.png" />'
//            }]
        },
        items: [{
                xtype: 'youtube',
                style: "background-image: url('img/splash.png');",
            }]
    }
});
