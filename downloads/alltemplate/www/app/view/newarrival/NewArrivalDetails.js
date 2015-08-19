Ext.define('MyApp.view.catelog.NewArrivalDetails', {
    extend: 'Ext.Container',
    alias: 'widget.newarrivaldetails',
    config: {
        layout: 'card',
        title:Loc.t('NEWARRIVAL.NEWARRIVALDETAILS')
    },
    initialize: function () {
        var storeData = this.config.data;
        var headerImage = storeData.vArrivalImage;
        var Title = storeData.vArrivalName;
        var descr = storeData.tDescription;


        var ImagePanel = new Ext.Panel({
            layout: {
                type: 'vbox',
                pack: 'center'
            },
            scrollable: {
                indicators: false
            },
            items: [{
                html: '<div style="text-align:center;font-weight: bold;font-size: 18px;">' + Title + '<div>',
                margin: '10 0 10 0'
            }, {
                html: '<div style="text-align:center"><img src="http://' + headerImage + '" width="100%"/></div>',
                margin: '0 10 10 10'
            }, {
                html: '<div style="text-align:center;font-weight: bold;font-size: 18px;padding-left: 10px;">'+Loc.t('NEWARRIVAL.DETAILS')+'</div>',
                margin: '0 10 0 10'
            }, {
                html: '<div style="text-align:left;font-size: 16px;word-wrap:break-word;width:100%">' + descr + '</div>',
                itemId: 'itemDetail_panelid',
                margin: '0 10 0 10'
            }
            ]
        })
        this.add([ImagePanel])
    }

})