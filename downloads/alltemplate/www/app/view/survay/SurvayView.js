Ext.define('MyApp.view.survay.SurvayView', {
    extend: 'Ext.Panel',
     xtype: 'survayview',
    config: {
        id: 'survayPanelid',
        itemId: 'survayPanelid',
        scrollable: {
                indicators:false
        },
        listeners: [
            {
                fn: 'onMyPanelActivate',
                event: 'activate'
            }
        ],
        items:[{
                xtype:'toolbar',
                title:Loc.t('SURVEY.TITLE'),
                docked:'top'
        }]
    }, onMyPanelActivate: function (newActiveItem, container, oldActiveItem, eOpts) {
        appMask();
        Ext.Ajax.request({
            url: 'https://www.surveymonkey.com/s/P58B9BX',
            success: function (response) {
                appUnmask();
                console.log(response.responseText)
                Ext.getCmp('survayPanelid').setHtml(response.responseText);
            },
            failure: function (response) {
                appUnmask();
                var text = response.responseText;
                Ext.Msg.alert(Loc.t('CATELOG.ERROR'), text, Ext.emptyFn);
            }
        });
    }
});

