Ext.define('MyApp.view.reservation.ServicesView', {
    extend: 'Ext.List',
    xtype: 'servicesview',
    requires: ['MyApp.view.reservation.TimeView'],
    config: {
        title: Loc.t('RESERVATION.SERVICETITLE'),
        style: "background-image: url('img/splash.png');",
        store: 'servicestore',
        scrollable: {
            indicators: false
        },
        itemTpl:new Ext.XTemplate('<div style="background: -webkit-linear-gradient(top, rgba(201,222,150,1) 0%,rgba(138,182,107,1) 44%,rgba(57,130,53,1) 100%);border-radius:10px;color:black;height:140px;padding:10px;margin: 5px;font-family: cursive;font-weight: bolder;">\n\
                <div style="float:left;margin-right:5px;">\n\
                <img src="img/round_with_map.png" width="70px" height="70px"/></div>\n\
                <div style="div">{vServiceName}</div>\n\
                <div style="margin-top:5px;">\n\
                <div style="float:left;margin-right:10px">'+Loc.t('RESERVATION.PRICE')+': {vPrice} {vCurrency}</div>\n\
                <div >'+Loc.t('RESERVATION.DURATION')+': {iDuration} min</div>\n\
                <div><button type="button" style="background-color: transparent;  border-radius: 10px;  padding: 8px;  width: 70%;  color: greenyellow;border: 1px solid greenyellow;  margin: 5px;  font-family: cursive;">'+Loc.t('RESERVATION.BOOKIT')+'</button></div>\n\
                </div>\n\
            </div>')
    }
}); 