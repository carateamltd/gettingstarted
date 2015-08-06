Ext.define("MyApp.view.coupen.CoupenView", {
    extend: 'Ext.Panel',
    xtype: 'coupenview',
    config: {
        layout: 'card',
    },
    initialize: function () {
        var topToolbar = new Ext.Toolbar({
            docked: 'top',
            title: 'Coupen'
        });

        var topToolbar1 = new Ext.Panel({
            layout: {
                type: 'hbox',
                pack: 'center'
            },
            height: 50,
            items: [{
                    html: 'Coupen Code:',
                    style: 'margin-top: 15px;'
                }]
        });

        var imgPanel = new Ext.Panel({
            style: 'background-image: url("img/splash.png");background-repeat: no-repeat fixed;background-size:100% 100%;',
            layout:{
                type:'vbox',
                pack:'center'
            },
            flex: 1,
            items:[{
                     html: '<div style="text-align:center;">Image Title is coming here</div>',
            }]
        });

        var leftPanel = new Ext.Panel({
            flex: 1,
            style: 'font-size:22px;color:white;margin: 10px;',
            layout: 'vbox',
            items: [{
                    html: 'DATE OF ISSUE',
                    style: 'color:gray;font-size:14px;font-weight: bold;'
                }, {
                    html: '15-JAN-2015'
                }]
        });
        
        var rightPanel = new Ext.Panel({
            flex: 1,
            style: 'text-align: right;font-size:22px;color:white;margin: 10px;',
            layout: 'vbox',
            items: [{
                    html: 'VALID TILL',
                    style: 'color:gray;font-size:14px;font-weight: bold;'
                }, {
                    html: '16-JAN-2015'
                }, {
                    html: '<img src="img/informatiion.png" width="25px" />'
                }]
        });

        var bottomPanel = new Ext.Panel({
            flex: 2,
            layout: 'hbox',
            items: [leftPanel, rightPanel]
        });

        var mainPanel = new Ext.Panel({
            layout: 'vbox',
            scrollable: {
            	indicators:false
            },
            style: 'background-color:silver;',
            items: [topToolbar, topToolbar1, imgPanel, bottomPanel]
        });
        this.add([mainPanel]);
    }
});