Ext.define("MyApp.view.reservation.ReservationNavi", {
    extend: "Ext.navigation.View",
    requires: [
        "MyApp.view.reservation.ReservationView"
    ],
    alias: "widget.reservationnavi",
    config: {
        navigationBar: {
            hidden: false,
//            baseCls: 'younaviCls',
//            height: 50,
//            items:[{
//                      xtype:'button',
//                      ui:'plain',
//                      text:'<img src="img/backbtn.png" />'
//            }]
        },
        items: [{
                xtype: 'reservationview',
                title: Loc.t('RESERVATION.TITLE'),
                scrollable: {
                    indicators: false
                }
            }]
    }
});
