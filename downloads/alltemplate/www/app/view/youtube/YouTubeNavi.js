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
            hidden: true
        },
        items: [{
            xtype: 'youtube',
            style: "background-image: url('img/splash.png');"
        }]
    }
});
