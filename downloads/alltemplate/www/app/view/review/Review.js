Ext.define('MyApp.view.review.Review', {
    extend: 'Ext.Panel',
    xtype: 'review',
    config: {
        scrollable: {
            indicators: false
        },
//        emptyText: 'No Partners is available',
//        itemTpl: new Ext.XTemplate('\
// <div style="background-color:white;border-radius:10px;margin: 10px;">\n\
// <div style="color:gray;font-weight:bold;padding:5px">{title}</div>\n\
//<div style="color:gray;padding:10px">{describtion}</div>\n\
//</div>'),
//        store: 'reviewstoreid',
        style: ' background-image: url("img/splash.png");',
        items:[{
                xtype: 'toolbar',
                title: 'Review',
                docked: 'top'
            },{
                xtype:'panel',
                docked:'top',
                layout:'vbox',
                items:[{
                        xtype:'fieldset',
                        items:[{
                                xtype:'textfield',
                                name:"nametext",
                                itemId:'nameid',
                                label:'Name'
                        },{
                            xtype:'textfield',
                            name:'feedbacktext',
                            itemId:'feedbacktextid',
                            label:'Review'
                        }]
                },{
                    xtype:'panel',
                    layout:'hbox',
                    items:[{
                            xtype:'spacer'
                    },{
                        xtype:'button',
                        text:'Submit',
                        ui:'confirm',
                        itemId:'reviewconfirmbtnid'
                    },{
                        xtype:'spacer',
                        
                    }]
                }]
        }]
    }
});

