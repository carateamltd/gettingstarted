Ext.define('MyApp.view.services.ServicesView', {
    extend: 'Ext.List',
    xtype: 'servicesview',
//    requires: ['MyApp.view.website.WebView'],
    config: {
    	scrollable:{
        	indicators:false
        },
        emptyText:'No services is available',
//    	style: "background-image: url('img/splash.png');",
        store: 'websitestoreid',
        itemTpl:'<div style="background: rgba(255, 255, 255, 0.73);border-radius:10px;margin:10px;padding:10px;">{vWebTitle}<div style="float:right;">100 rs</div></div>',
        items:[{
                xtype:'toolbar',
                title:'Services',
                docked:'top'
        }]
    }
});