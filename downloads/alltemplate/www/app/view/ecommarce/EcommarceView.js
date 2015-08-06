Ext.define('MyApp.view.ecommarce.EcommarceView', {
    extend: 'Ext.List',
    xtype: 'ecommarceview',
    requires: ['MyApp.view.ecommarce.EcommarceDetails','MyApp.view.ecommarce.EcommerceCartDetails'],
    config: {
        style: "background-image: url('img/splash.png');",
        store: 'catelogestoreid',
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
                 </td></tr></table>'),
        items: [
            {
                xtype: 'toolbar',
                docked: 'top',
                layout: {
                    pack: 'center'
                },
                items: [
                    {
                        xtype: 'searchfield',
                        placeHolder: Loc.t('ECOMMERCE.SEARCH'),
                        itemId: 'searchBox',
                        style: 'width:11em;'
                    },
                    {
                        xtype: 'button',
                        text: Loc.t('ECOMMERCE.SEARCH'),
                        itemId: 'ecommarcesearchbtnid'
                    },{
                        xtype: 'button',
//                      baseCls:'orderviewBtnCls',
                        style: 'border: 2px solid white;',
                        text: '<img src="img/cart_white.png" width="25px" height="25px"/>',
                        align: 'right',
                        ui: 'plain',
                        height: 40,
                        itemId: 'ecommerceCartBtnID'
                    }
                ]
            }
        ]
    }
});
//<td><div id=my_cat_{iCatelogueId} class="commarcbuy">Add to Cart<div></td>