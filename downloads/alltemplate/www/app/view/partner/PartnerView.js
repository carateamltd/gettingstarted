Ext.define('MyApp.view.partner.PartnerView', {
    extend: 'Ext.List',
    xtype: 'partnerview',
//    requires: ['MyApp.view.Loyality.LoyalityDetail'],
    
    config: {
    	scrollable:{
        	indicators:false
        },
         emptyText:'No Partners is available',
        itemTpl: new Ext.XTemplate('<li style="padding:5px; font-family:Times New Roman, Georgia, Serif;">\n\
<div style="padding:10px 0px 0px 0px;  color:black;background-color:rgba(255, 253, 253, 0.84);border-radius: 10px;">\n\
<div style="float:left;margin-right:5px;border-radius: 10px 0px 0px 24px;overflow:hidden;margin-top: -11px;margin-left: -1px;">\n\
<img src="{image}" width="76px" height="67px"/></div>\n\
<div style="margin-left:86px;padding:5px;margin-top: -9px;">{title}</div>\n\
<div style="float:right;padding: 0px;margin-top: -20px;margin-left:10px;"><span><img src="img/arrow.png"></span></div>\n\
<div style="padding:5px;  border-bottom-right-radius: 10px; border-bottom-left-radius: 10px;margin-left:86px;">{describtion}</div>\n\
</div></li>'),
        store: 'partnerstoreid',
        style:' background-image: url("img/splash.png");',
        items:[{
                xtype:'toolbar',
                title:'Partners',
                docked:'top'
        }]
    }
});

