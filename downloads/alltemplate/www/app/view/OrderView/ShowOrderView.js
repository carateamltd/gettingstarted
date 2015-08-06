    Ext.define('MyApp.view.OrderView.ShowOrderView', {
    extend: 'Ext.List',
    xtype: 'showorderview',
    requires: ['MyApp.view.OrderView.CustomerOrderDetailView'],
    config: {
    	 title: Loc.t('ORDER.SHOWORDER'),
    	 style: "background-image: url('img/splash.png');",
         store: 'showorderstoreid',
         
         scrollable:{
         	indicators:false
         },
         itemTpl:new Ext.XTemplate('<table cellpadding="0" cellspacing="0" width="100%" style="background-color:rgba(255, 255, 255, 0.5);  border-radius:10px; margin:10px 0px;font-family:RalewayRegular;">\n\
<tr><td height="100px" width="40%;" style="vertical-align: top;padding: 0px;" ><img src="'+URLConstants.Order_Item_Image+'{iItemId}/{vImage}" style="height:128px; width:100%; vertical-align: bottom;border-radius:10px 0px 0px 10px; overflow:hidden;" /></td>\n\
<td height="100px" valign="top">\n\
<div style="font-size:14px; font-weight:500; margin:0px; padding:5px 0 5px 10px;">{vItemName}</div>\n\
<div style="font-size:14px; font-weight:500; margin:0px; padding:0px 0px 0px 10px;">'+Loc.t('ORDER.QUANTITY')+': {vQuantity}</div>\n\
<div style="font-size:14px; font-weight:500; margin:0px; padding:5px 0px 0px 10px;">'+Loc.t('ORDER.TOTALAMT')+': {Total} {vCurrency}</div>\n\
<div style="font-size:14px; font-weight:500; margin:0px; padding:10px 0px 0px 10px;"><button type="button" style="background-color: transparent;float: right;" class="deleteorderBtnCls"><img src="img/cart_delete.png"> </button></div>\n\
</td></tr></table>{[this.BottomOrder(values)]}',{
        BottomOrder:function(values){
            if(values.iOrderId == TextConstants.OrderID){
    	      	return '<div style="background-color:transparent;text-align:center;"><button type="button" class="BottomBtnCls">'+Loc.t('ORDER.SUBMITORDERDETAIL')+'</button></div>'
        	}else{
        		return ''
    	   }
        }
        })
    }
});