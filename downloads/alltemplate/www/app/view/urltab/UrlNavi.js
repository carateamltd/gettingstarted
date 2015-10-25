Ext.define("MyApp.view.urltab.UrlNavi", {
    extend: "Ext.navigation.View",
    requires: [
        "MyApp.view.urltab.UrlList"
    ],
    alias: "widget.urlnavi",
    config: {
        navigationBar: {
            hidden: false
        },
        items: [{
			xtype: 'urllist',
			width: '100%',
			height: '100%'
		}]
    }
});
