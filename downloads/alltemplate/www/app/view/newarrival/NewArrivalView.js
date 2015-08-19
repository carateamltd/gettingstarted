Ext.define('MyApp.view.newarrival.NewArrivalView', {
    extend: 'Ext.List',
    xtype: 'newarrivalview',
    requires: ['MyApp.view.newarrival.NewArrivalDetails'],
    config: {
        title: Loc.t('ORDER.ORDERDETAIL'),
        style: "background-image: url('img/splash.png');",
        store: 'newarrivalstoreid',
        emptyText: Loc.t('NEWARRIVAL.NONEWARRIVAL'),
        scrollable: {
            indicators: false
        },
         itemTpl:new Ext.XTemplate('<table cellpadding="0" cellspacing="0" width="100%" style="background-color:rgba(255, 255, 255, 0.5); font-style:italic; border-radius:10px; margin:10px 0px;font-family:RalewayRegular;">\n\
        		 <tr><td height="100px" width="40%" style="vertical-align: bottom;padding: 0px;"><img src="http://{vArrivalImage}" style="height:110px; width:100%; vertical-align: bottom;border-radius:10px 0px 0px 10px; overflow:hidden;" /></td>\n\
        		 <td height="100px" valign="top">\n\
        		<div style="font-weight:bold;font-size:14px; margin:0px; padding:5px 0 5px 10px;">{vArrivalName}</div>\n\
                <div style="font-weight:bold;font-size:14px; margin:0px; padding:5px 0 5px 10px;">'+Loc.t('NEWARRIVAL.DETAILS')+': {tDescription}</div>\n\
        		</td></tr></table>')

    }
});
