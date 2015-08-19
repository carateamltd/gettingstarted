Ext.define('MyApp.view.website.WebSiteListView', {
    extend: 'Ext.List',
    xtype: 'websitelistview',
    requires: ['MyApp.view.website.WebView'],
    config: {
    	scrollable:{
        	indicators:false
        },
        emptyText:Loc.t('WEBSITES.NOWEBLISTAVL'),
    	style: "background-image: url('img/splash.png');",
        store: 'websitestoreid',
        itemTpl:'<div style="background: rgba(255, 255, 255, 0.73);border-radius:10px;margin:10px;padding:10px;">{vWebTitle}</div>',
//        items:[{
//                xtype:'toolbar',
//                title:'WebSite List',
//                docked:'top'
//        }]
    }
});