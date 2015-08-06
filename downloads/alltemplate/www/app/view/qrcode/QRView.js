Ext.define('MyApp.view.qrcode.QRView', {
    extend: 'Ext.Container',
    alias: 'widget.qrview',
    config: {
       layout:'card',
       title:'QR Code'
    },
   initialize: function() {
        var qrPanel = new Ext.Panel({
            layout:'vbox',
            items:[{
                    xtype:'panel',
                    flex:1,
                    html:'<div id="qrcode" style="width: 100%;text-align: center;margin-top: 15px;"></div>',
                },{
                    html:'<div id="qrcode" style="width: 100%;text-align: center;margin-top: 15px;"></div>',
                    itemId:'qrdscid',
                    flex:1
            }]
        })
        var finalPanel=new Ext.Panel({
    		layout:'fit',
    		style: "background-image: url('img/splash.png');",
    		items:[qrPanel]
    	})
    	this.add([finalPanel])
    }
});

