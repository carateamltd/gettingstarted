/**
 * Created by hirendave on 5/16/15.
 */
Ext.define('MyApp.view.OrderView.CustomerDetails', {
    extend: 'Ext.form.Panel',
    xtype: 'ordercustomerdetails',
    config: {
        items:[
            {
                xtype:'button',
                text: Loc.t('CATELOG.CONFIRM'),
                docked: 'bottom',
                itemId: 'btnSaveOrderCustomerDetails',
                id: 'btnSaveOrderCustomerDetails',
                baseCls:'submitbuttonCls',
                margin:5
            },
            {
				html: Loc.t('CATELOG.CLIENTDETAILS'),
				styleHtmlContent: true,
				style: 'margin: -15px;font-size: 24px;text-align: center;'
			}, 
            {
                xtype: 'fieldset',
                items: [
                    {
                        xtype: 'textfield',
                        name: 'vName',
                        label: Loc.t('CATELOG.NAME'),
                        labelAlign: 'top',
                        labelWidth: '100%',
                        required: true
                    },
                    {
                        xtype: 'emailfield',
                        name: 'vEmailId',
                        label: Loc.t('CATELOG.EMAIL'),
                        labelAlign: 'top',
                        labelWidth: '100%',
                        required: true
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
                        labelWidth: '100%'//,
                        //readOnly: true
                    },
                    {
                        xtype: 'numberfield',
                        name: 'tel',
                        label: Loc.t('CATELOG.TEL'),
                        labelAlign: 'top',
                        labelWidth: '100%',
                        required: true
                    },
                    {
                        xtype: 'textfield',
                        name: 'vPincode',
                        label: Loc.t('CATELOG.PIN'),
                        labelAlign: 'top',
                        labelWidth: '100%'//,
                        //readOnly: true
                    }
                ]
            }
        ]
    }
});
