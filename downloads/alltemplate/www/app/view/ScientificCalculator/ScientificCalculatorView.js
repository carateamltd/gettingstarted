Ext.define('MyApp.view.ScientificCalculator.ScientificCalculatorView', {
    extend: 'Ext.Panel',
     xtype: 'scientificcalculatorview',
    config: {
        style:'background-color:#4C3C3C;',
        id: 'MyPanel',
        itemId: 'MyPanel',
        layout:{
            type:'hbox',
            pack:'center'
        },
        scrollable: {
        indicators:false
        },
        listeners: [
            {
                fn: 'onMyPanelActivate',
                event: 'activate'
            }
        ]
    }, onMyPanelActivate: function (newActiveItem, container, oldActiveItem, eOpts) {
        Ext.Ajax.request({
            url: 'demo.html',
            success: function (response) {
                Ext.getCmp('MyPanel').setHtml(response.responseText);
            },
            failure: function (response) {
                var text = response.responseText;
                Ext.Msg.alert(Loc.t('CATELOG.ERROR'), text, Ext.emptyFn);
            }
        });
    }
});

