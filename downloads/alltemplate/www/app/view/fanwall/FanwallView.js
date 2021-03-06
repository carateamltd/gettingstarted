Ext.define('MyApp.view.fanwall.FanwallView', {
    extend: 'Ext.List',
    xtype: 'fanwallview',
    requires: ['MyApp.view.website.WebView'],
    config: {
        scrollable: {
            indicators: false
        },
        emptyText: Loc.t('FANWALL.NOOBJAVAILABLE'),
        style: "background-image: url('img/splash.png');",
        store: 'websitestoreid',
        itemTpl: '<div style="background: rgba(255, 255, 255, 0.73);border-radius:10px;margin:10px;padding:10px;">{vWebTitle}</div>',
//        items:[{
//                xtype:'toolbar',
//                title:'WebSite List',
//                docked:'top'
//        }]
    }
});