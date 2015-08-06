/**
 * Created by hirendave on 5/16/15.
 */
Ext.define('MyApp.view.catelog.CustomerDetails', {
    extend: 'Ext.form.Panel',
    xtype: 'customerdetails',
    config: {
        items:[
            {
                xtype:'button',
                text:'Ok',
                docked: 'bottom',
                itemId: 'btnSaveCustomerDetails',
                id: 'btnSaveCustomerDetails',
                baseCls:'submitbuttonCls',
                margin:5
            },
            {
                xtype: 'fieldset',
                items: [
                    {
                        xtype: 'textfield',
                        name: 'vName',
                        label: Loc.t('CATELOG.NAME'),
                        labelAlign: 'top',
                        labelWidth: '100%'
                    },
                    {
                        xtype: 'emailfield',
                        name: 'vEmailId',
                        label: Loc.t('CATELOG.EMAIL'),
                        labelAlign: 'top',
                        labelWidth: '100%'
                    },
                    {
                        xtype: 'textareafield',
                        name: 'vAddress',
                        label: Loc.t('CATELOG.ADDRESS'),
                        labelAlign: 'top',
                        labelWidth: '100%'
                    },
                    {
                        xtype: 'textfield',
                        name: 'vCity',
                        label: Loc.t('CATELOG.CITY'),
                        labelAlign: 'top',
                        labelWidth: '100%'
                    },
                    {
                        xtype: 'textfield',
                        name: 'vState',
                        label: Loc.t('CATELOG.STATE'),
                        labelAlign: 'top',
                        labelWidth: '100%'
                    },
                    {
                        xtype: 'textfield',
                        name: 'vPincode',
                        label: Loc.t('CATELOG.PIN'),
                        labelAlign: 'top',
                        labelWidth: '100%'
                    }
                ]
            }
        ]
    }
});
