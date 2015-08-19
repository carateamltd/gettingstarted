Ext.define('MyApp.view.testimonial.TestimonialView', {
    extend: 'Ext.List',
    xtype: 'testimonialview',
    config: {
        scrollable: {
            indicators: false
        },
        emptyText: Loc.t('TESTIMONIAL.NOTESTIMONIALAVL'),
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
                title: Loc.t('TESTIMONIAL.TITLE'),
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
                                label:Loc.t('CATELOG.NAME')
                        },{
                            xtype:'textfield',
                            name:'feedbacktext',
                            itemId:'feedbacktextid',
                            label:Loc.t('REVIEW.TITLE')
                        }]
                },{
                    xtype:'panel',
                    layout:'hbox',
                    items:[{
                            xtype:'spacer'
                    },{
                        xtype:'button',
                        text:Loc.t('CONTACTUS.SUBMIT'),
                        ui:'confirm',
                        itemId:'testimonialsubmitbtnid'
                    },{
                        xtype:'spacer',
                        
                    }]
                }]
        }]
    }
});

