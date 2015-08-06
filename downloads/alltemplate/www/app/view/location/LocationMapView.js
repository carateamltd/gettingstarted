Ext.define('MyApp.view.location.LocationMapView', {
    extend: 'Ext.Container',
    alias: 'widget.locationmapview',
    requires: ['MyApp.view.location.MyMap'],
    config: {
        layout: 'card',
        title: Loc.t('LOCATION.MAPVIEW')
    },
    initialize: function () {
  
        var detailPanel = new Ext.Panel({
            layout: 'fit',
            height: 300,
            margin: '10 0 0 0',
            hidden: true,
            itemId: 'mapitemid',
            items: [{
                    xtype: 'mymap',
                    height:150,
                }, {
                    xtype: 'panel',
                    layout: 'hbox',
                    docked:'bottom',
                    height:90,
                    items: [{
                            xtype: 'button',
                            text: Loc.t('LOCATION.CALL'),
                            ui:'plain',
                        //  style:'background-color:#894141',
                            flex:1,
                            scope:this,
                            handler:this.onCallTap
                        }, {
                            xtype: 'button',
                            text: Loc.t('LOCATION.WEB'),
                            ui:'plain',
                        //  style:'background-color:#589858',
                            flex:1
                        },{
                            xtype: 'button',
                            text: Loc.t('LOCATION.SEND'),
                            ui:'plain',
                        //  style:'background-color:#9797b7',
                            flex:1
                        }]
                }]
        });

        var finalPanel = new Ext.Panel({
            layout: 'vbox',
            scrollable: false,
            style: "background-image: url('img/splash.png');background-repeat: no-repeat fixed;background-size:100% 100%;",
            items: [detailPanel]
        })
        this.add([finalPanel])

    },
    onCallTap:function(){
        
    }
 
});