Ext.define('MyApp.view.OrderView.OrderHistory', {
    extend: 'Ext.List',
    xtype: 'orderhistory',
//    requires: ['MyApp.view.OrderView.ShowOrderView', 'MyApp.view.OrderView.ItemDetailsView'],
    config: {
        title: Loc.t('ORDER.ORDERHISTORY'),
        style: "background-image: url('img/splash.png');",
        store: 'orderhistoryid',
        scrollable: {
            indicators: false
        },
         itemTpl:Ext.create('Ext.XTemplate',
         	'<table cellpadding="0" cellspacing="0" width="100%" style="background-color:rgba(255, 255, 255, 0.5); font-style:italic; border-radius:10px; margin:10px 0px;font-family:RalewayRegular;">\n',
        	'<tr><td height="100px" width="40%" style="vertical-align: bottom;padding: 0px;"><img src="http://{vImage}" style="height:110px; width:100%; vertical-align: bottom;border-radius:10px 0px 0px 10px; overflow:hidden;" /></td>\n',
        	'<td height="100px" valign="top">\n',
        	'<div style="font-weight:bold;font-size:14px; margin:0px; padding:5px 0 5px 10px;">{[this.getNameText()]}: {vItemName}</div>\n',
        	'<div style="font-weight:bold;font-size:14px; margin:0px; padding:0px 0px 0px 10px;">{[this.getVarientText()]}: {vVarient}</div>\n',
        	'<div style="font-weight:bold;font-size:14px; font-style:italic;padding:5px 0px 0px 10px;">{[this.getPriceText()]}: {fPrice}</div>\n',
        	'</td></tr></table>',
        	{
        		getNameText: function()
        		{
        			return Loc.t('ORDER.NAME');
        		},
        		getVarientText: function()
        		{
        			return Loc.t('ORDER.VARIENT');
        		},
        		getPriceText: function()
        		{
        			return Loc.t('ORDER.PRICE');
        		}
        	})
    }
});
