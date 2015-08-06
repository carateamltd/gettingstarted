Ext.define('MyApp.view.testimonial.TestimonialView', {
    extend: 'Ext.List',
    xtype: 'testimonialview',
    config: {
        scrollable: {
            indicators: false
        },
        emptyText: 'No Testimonial is available',
        itemTpl:new Ext.XTemplate('<table style="width:100%;background-color:white;border-radius:10px;"><tr>\n\
<td style="width:1%;height:80px;vertical-align:top;"><img src="img/quote.png" width="25px" />\n\
</td><td style="bottom;width:94%">{tDescription}</td><td style="vertical-align:bottom;">\n\
<img src="img/quote-1.png" width="25px" />\n\
</td></tr>\n\
<tr style="width:100%;">\n\
<td colspan=3 style="text-align: right;padding-top: 0px;">\n\
{iTestonomialName}</td></tr></table>'
),
        store: 'testimonialstoreid',
        style: ' background-image: url("img/splash.png");',
         items:[{
                xtype: 'toolbar',
                title: 'Testimonial',
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
                        itemId:'testimonialsubmitbtnid'
                    },{
                        xtype:'spacer',
                        
                    }]
                }]
        }]
    }
});

