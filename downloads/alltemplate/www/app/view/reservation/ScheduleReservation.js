Ext.define('MyApp.view.reservation.ScheduleReservation', {
    extend: 'Ext.List',
    xtype: 'schedulereservation',
    requires: ['MyApp.view.reservation.ServicesView'],
    config: {
        title: Loc.t('RESERVATION.SCHEDULETITLE'),
        style: "background-image: url('img/splash.png');",
        store: 'schedulereservationstore',
        scrollable: {
            indicators: false
        },
        itemTpl: new Ext.XTemplate('<div style="background: -webkit-linear-gradient(top, rgba(201,222,150,1) 0%,rgba(138,182,107,1) 44%,rgba(57,130,53,1) 100%);border-radius:10px;color:white;padding:10px;padding-bottom: 15px;  margin: 5px;">\n\
<div style="float:left;margin-right:5px;">\n\
<img src="img/round_with_map.png" width="50px" /></div>\n\
<div >{vAddress1}</div>\n\
<div>{vCity} {vState}</div></div>')
//        itemTpl: new Ext.XTemplate('<table cellpadding="0" cellspacing="0" width="100%" style="background-color:rgba(255, 255, 255, 0.5); font-style:italic; border-radius:10px;margin:10px;font-family:RalewayRegular;">\n\
//        		 <tr><td height="70px" width="30%" style="vertical-align: bottom;padding: 0px;"><img src="img/round_with_map.png" style="height:70px; width:70px; vertical-align: bottom;margin: 8px;" /></td>\n\
//        		 <td height="70px" valign="top">\n\
//        		<div style="font-weight:bold;font-size:14px; margin:0px; padding:5px 0 5px 10px;"> {vAddress1}</div>\n\
//        		<div style="font-weight:bold;font-size:14px; font-style:italic;padding:5px 0px 0px 10px;">{vCity} {vState} {vZip}</div>\n\
//        		</td></tr></table>'),
    }
});