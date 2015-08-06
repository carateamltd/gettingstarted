Ext.define('MyApp.view.Loyality.LoyalitiView',{
    extend: 'Ext.List',
    xtype: 'loyalitiview',
    requires: ['MyApp.view.Loyality.LoyalityDetail'],
    
    config: {
    	scrollable:{
        	indicators:false
        },
         emptyText: Loc.t('LOYALTY.NOLOYALTYAVAILABE'),
        itemTpl: new Ext.XTemplate('<li style="padding:5px; font-family: Times New Roman, Georgia, Serif;">\n\
<div style="padding:10px 0px 0px 0px;  color:black;background-color:rgba(255, 255, 255, 1);border: 1px solid #efefef; border-radius: 15px;">\n\
<div style="float:left;margin-right:5px;border-radius: 10px 0px 0px 24px;overflow:hidden;margin-top: -11px;margin-left: -1px;">\n\
<img src="http://{vThumbnail}" width="100px" height="99px" style="border-radius: 15px 0px 0px 15px;"/></div>\n\
<div style="padding:5px;margin-top: -9px; margin-left:100px;">{vRewardText}</div>\n\
{[this.social(values)]}\n\
<div style="padding:5px;  border-bottom-right-radius: 10px; border-bottom-left-radius: 10px;">'+Loc.t('LOYALTY.NOOFUSE')+': {UserUsed}</div>\n\
        	<div style="padding:5px;">'+Loc.t('LOYALTY.TOTAL')+': {vSquareCount}</div></div></li>',{
             social: function (values) {
                if (values.vSocialShare != "NO") {
                    return '<div style="float:right;padding: 0px;"><span class="sharebtncls">'+Loc.t('LOYALTY.SHARE')+'</span></div>'
                } else {
                    return ''
                }
            }
        }),
        store: 'loyalitistoreid'
    }
});