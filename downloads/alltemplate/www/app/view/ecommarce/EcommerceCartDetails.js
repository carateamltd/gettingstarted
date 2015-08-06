
Ext.define('MyApp.view.ecommarce.EcommerceCartDetails',{
    extend: 'Ext.List',
    xtype: 'ecommercecartdetails',
//    requires: ['MyApp.view.ecommarce.EcommarceDetails'],
    config: {
        title:'cart details',
        style: "background-image: url('img/splash.png');",
        store: 'addcartstoreid',
        emptyText: 'No Cart product is available',
        scrollable: {
            indicators: false
        },
        itemTpl: new Ext.XTemplate('<table cellpadding="0" cellspacing="0" width="100%" style="background-color:rgba(255, 255, 255, 0.5); font-style:italic; border-radius:10px; margin:10px 0px;font-family:RalewayRegular;">\n\
                 <tr><td height="100px" width="40%" style="vertical-align: bottom;padding: 0px;"><img src="http://{vCatalogueImage}" style="height:110px; width:100%; vertical-align: bottom;border-radius:10px 0px 0px 10px; overflow:hidden;" /></td>\n\
                 <td height="100px" valign="top">\n\
                <div style="font-weight:bold;font-size:14px; margin:0px; padding:5px 0 5px 10px;">{vCatalogueTagname}</div>\n\
                <div style="font-weight:bold;font-size:14px; margin:0px; padding:5px 0 5px 10px;">{tDescription}</div>\n\
                </td></tr></table>{[this.BottomOrder(values)]}',{
            BottomOrder: function (values) {
                    return '<div style="border-color:#C7B8A7;background-color:transparent;text-align:center;"><button type="button" class="BottomBtnCls">'+Loc.t('ORDER.SUBMITORDER')+'</button></div>'
            }
        }),
        listeners:{
            itemtap:function(cmp,index,element,e){
                console.log(e);
            }
        }
    }
});
/*Ext.define('MyApp.view.ecommarce.EcommerceCartDetails',{
    extend: 'Ext.List',
    xtype: 'ecommercecartdetails',
//  requires: ['MyApp.view.ecommarce.EcommarceDetails'],
    config: {
        title: Loc.t('ECOMMERCE.CARTTITLE'),
        style: "background-image: url('img/splash.png');",
        store: 'addcartstoreid',
        emptyText: Loc.t('ECOMMERCE.NODATAAVAILABLE'),
        scrollable: {
            indicators: false
        },
        itemTpl: new Ext.XTemplate('<table cellpadding="0" cellspacing="0" width="100%" style="background-color:rgba(255, 255, 255, 0.5); font-style:italic; border-radius:10px; margin:10px 0px;font-family:RalewayRegular;">\n\
        		 <tr><td height="100px" width="40%" style="vertical-align: bottom;padding: 0px;"><img src="http://{vCatalogueImage}" style="height:110px; width:100%; vertical-align: bottom;border-radius:10px 0px 0px 10px; overflow:hidden;" /></td>\n\
        		 <td height="100px" valign="top">\n\
        		<div style="font-weight:bold;font-size:14px; margin:0px; padding:5px 0 5px 10px;">{vCatalogueTagname}</div>\n\
        		<div style="font-weight:bold;font-size:14px; margin:0px; padding:5px 0 5px 10px;">{tDescription}</div>\n\
                <div style="font-weight:bold;font-size:14px; margin:0px; padding:5px 0 5px 10px;">{vSize}</div>\n\
                </td></tr></table> '
        }),
    }
});
*/
/*
{[this.BottomOrder(values)]}',{
                    BottomOrder: function (values) {
                            return '<div style="border-color:#C7B8A7;background-color:transparent;text-align:center;"><button type="button" class="BottomBtnCls">'+Loc.t('ORDER.SUBMITORDER')+'</button></div>'
                    }
*/