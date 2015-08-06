Ext.define('MyApp.view.qrcode.QRListView', {
    extend: 'Ext.List',
    xtype: 'qrlistview',
    requires: ['MyApp.view.qrcode.QRView'],
    config: {
    	scrollable:{
        	indicators:false
        },
        emptyText:Loc.t('QRCODE.NODATAAVAILABLE'),
        
//    	style: "background-image: url('img/splash.png');",
        store: 'qrstoreid',
        itemTpl:'<div style="background: rgba(255, 255, 255, 0.73);border-radius:10px;margin:10px;padding:10px;"><img src="http://{vMobileHeaderImage}" style="height:110px; width:100%; vertical-align: bottom;border-radius:10px 0px 0px 10px; overflow:hidden;" /></td>\n\
                 <td height="100px" valign="top">   \n\
<div><div style="background: rgba(255, 255, 255, 0.73);border-radius:10px;margin:10px;padding:10px;"><span style="font-weight:bold;">{vName}</span>\n\
<div>'+Loc.t('QRCODE.STARTDATE')+': {dStartDate}</div><div>'+Loc.t('QRCODE.ENDDATE')+': {dEndDate}</div></div>',
    }
});