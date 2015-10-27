Ext.define('MyApp.view.reservation.ReservationView', {
    extend: 'Ext.List',
    xtype: 'reservationview',
    requires: ['MyApp.view.reservation.ScheduleReservation'],
    config: {
//        title: 'Détail de la commande',
        style: "background-image: url('img/splash.png');",
        store: 'resesrvationstoreid',
        emptyText: Loc.t('RESERVATION.NORESERVATIONAVAILABLE'),
        scrollable: {
            indicators: false
        },
        itemTpl: new Ext.XTemplate('<table cellpadding="0" cellspacing="0" width="100%" style="background-color:rgba(255, 255, 255, 0.5); font-style:italic; border-radius:10px; margin:10px 0px;font-family:RalewayRegular;">\n\
        		 <tr><td height="100px" width="40%" style="vertical-align: bottom;padding: 0px;"><img src="img/cal.jpg" style="height:110px; width:100%; vertical-align: bottom;border-radius:10px 0px 0px 10px; overflow:hidden;" /></td>\n\
        		 <td height="100px" valign="top">\n\
        		<div style="font-weight:bold;font-size:14px; margin:0px; padding:5px 0 5px 10px;">{vServiceName}</div>\n\
        		<div style="font-weight:bold;font-size:14px; margin:0px; padding:0px 0px 0px 10px;">{vAddress1}</div>\n\
        		<div style="font-weight:bold;font-size:14px; font-style:italic;padding:5px 0px 0px 10px;">{vDate}, {vTime}</div>\n\
        		</td></tr></table>'),
        items: [{
                xtype: 'panel',
                docked: 'top',
                layout: 'vbox',
                style: 'border-bottom:0px solid black;background-color:rgba(31,153,98,0.84);',
                items: [{
                        xtype: 'panel',
                        layout: 'hbox',
                        items: [{xtype: 'spacer'},{
                                xtype: 'button',
                                text: Loc.t('RESERVATION.SCHEDULERESERVATION'),
                                margin:5,
                                itemId:'ScheduleReservationBtnID'
                            },{
                                xtype: 'spacer'
                            }]
                    },{
                                xtype: 'segmentedbutton',
                                 height: 40,
                                 margin:10,
                                 itemId:'segmentedbtnid',
                                layout: {
                                    type: 'hbox',
                                    pack: 'center',
                                    align: 'stretchmax'
                                },
                                items: [
                                    {
                                        text: Loc.t('RESERVATION.UPCOMING'),
                                        width: "50%",
                                        pressed: true
                                    },
                                    {
                                        text: Loc.t('RESERVATION.PAST'),
                                        width: "50%",
                                    }
                                ]
                    }]
            }]
    }
});
