Ext.define("MyApp.view.socialmediatab.SocialMediaNavi", {
    extend: "Ext.navigation.View",
    requires: [
        "MyApp.view.socialmediatab.SocialMediaList"
    ],
    alias: "widget.socialmedianavi",
    config: {
        navigationBar: {
            hidden: false
        },
        items: [{
			xtype: 'socialmedialist',
			width: '100%',
			height: '100%'
		}]
    }
});
