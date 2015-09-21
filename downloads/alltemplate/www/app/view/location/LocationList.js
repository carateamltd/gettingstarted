Ext.define('MyApp.view.location.LocationList', {
    extend: 'Ext.Container',
    alias: 'widget.locationlist',
    requires: ['MyApp.view.location.MyMap'],
    config: {
        layout: 'card',
        title: Loc.t('RESERVATION.Confirm'),
        cls: 'location_list'
    },
    initialize: function () {
        var arround_ListView = new Ext.create('Ext.List', {
            selectedCls: 'color:transperent',
			//height: 300,
            flex:1,
            emptyText: Loc.t('LOCATION.NOLOCATIONAVAILABLE'),
            hidden: false,
            itemId: 'locationListId',
            style: 'background-color:transparent',
            store: 'locationstoreid',
            itemTpl: new Ext.XTemplate('<table cellpadding="0" cellspacing="0" width="100%" style="background-color:rgba(255, 255, 255, 0.5); font-style:italic; border-radius:10px; margin:10px 0px;font-family:RalewayRegular;">\n\
        		 <tr>\n\
        		 <td valign="top">\n\
        		 <div style="font-weight:bold;font-size:14px; margin:0px; padding:5px 0 5px 10px;">'+Loc.t('LOCATION.NAME')+': {vLocationTitle}</div>\n\
        		 <div style="font-weight:bold;font-size:14px; margin:0px; padding:0px 0px 0px 10px;">'+Loc.t('LOCATION.ADDRESS')+': {vAddress1} \t {vAddress2}</div>\n\
        		 </td></tr></table>'),
        });

        var finalPanel = new Ext.Panel({
            layout: 'vbox',
            scrollable: false,
            //style: "background-image: url('img/splash.png');background-repeat: no-repeat fixed;background-size:100% 100%;",
            items: [arround_ListView]
        })
        this.add([finalPanel])
    },
    onConfirm: function () {
        this.fireEvent('onConfirmBtn', this)
    }
});