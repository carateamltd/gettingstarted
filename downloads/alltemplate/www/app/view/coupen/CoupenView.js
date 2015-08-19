Ext.define("MyApp.view.coupen.CoupenView", {
    extend: 'Ext.Panel',
    xtype: 'coupenview',
    config: {
        layout: 'card',
    },
    initialize: function () {
        var topToolbar = new Ext.Toolbar({
            docked: 'top',
            title: Loc.t('COUPOUN.TITLE')
        });

        var topToolbar1 = new Ext.Panel({
            layout: {
                type: 'hbox',
                pack: 'center'
            },
            height: 50,
            items: [{
                    html: Loc.t('COUPOUN.CODE'),
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
                     html: '<div style="text-align:center;">'+Loc.t('COUPOUN.IMGTITLE')+'</div>',
            }]
        });

        var leftPanel = new Ext.Panel({
            flex: 1,
            style: 'font-size:22px;color:white;margin: 10px;',
            layout: 'vbox',
            items: [{
                    html: Loc.t('COUPOUN.ISSUEDATE'),
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
                    html: Loc.t('COUPOUN.VALIDTILL'),
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