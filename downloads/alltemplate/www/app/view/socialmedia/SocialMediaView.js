Ext.define('MyApp.view.socialmedia.SocialMediaView', {
    extend: 'Ext.List',
    xtype: 'socialmediaview',
//    requires: ['MyApp.view.Loyality.LoyalityDetail'],
    config: {
        scrollable: {
            indicators: false
        },
//    	style: "background-image: url('img/splash.png');",
        store: 'socialstorid',
         emptyText: 'Sorry  no data available',
        itemTpl: '<div style="background: rgba(255, 255, 255, 0.73);border-radius:10px;margin:10px;padding:10px;">{vName}</div>',
        items: [{
                xtype: 'toolbar',
                title: 'Socail Pages',
//                baseCls: 'younaviCls',
//                height: 50,
                docked: 'top'
            }]
    }
});