Ext.define('MyApp.view.custom.CustomView', {
    extend: 'Ext.Panel',
    xtype: 'customview',
    requires: [],
    config: {
        layout: 'vbox',
        items: [{
                xtype: 'toolbar',
                itemId: 'customToolbarID',
                title: Loc.t('CUSTOM.TITLE'),
//                baseCls: 'younaviCls',
//                height: 50,
                docked: 'top'
            }, {
                xtype: 'panel',
                itemId: 'CustomPanelid',
                scrollable: true,
                styleHtmlContent: true,
                layout: 'vbox',
                items: [
//                    {
//                        margin: '0 0 0 2%',
//                        html: '<div style="text-align:center"><img src="img/bertolino.png" width="98%" /></div>'
//                    }, 
                    {
                        style: 'word-wrap: break-word;',
                        html: Loc.t('CUSTOM.NODATAAVAILABLE'),
                        itemId: 'customTextId'
                    }]
            }],
    }
});