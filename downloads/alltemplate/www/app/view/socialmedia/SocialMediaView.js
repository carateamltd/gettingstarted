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
         emptyText: Loc.t('LOCATION.NOLOCATIONAVAILABLE'),
        itemTpl: '<div style="background: rgba(255, 255, 255, 0.73);border-radius:10px;margin:10px;padding:10px;">{vName}</div>',
        items: [{
                xtype: 'toolbar',
                title: Loc.t('SOCIALMEDIA.SOCIALPAGES'),
//                baseCls: 'younaviCls',
//                height: 50,
                docked: 'top'
            }]
    }
});