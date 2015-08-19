/**
 * Created by hirendave on 5/25/15.
 */
/**
 * Created by hirendave on 5/15/15.
 */
Ext.define('MyApp.view.OrderView.OrderCart', {
    extend: 'Ext.Container',
    alias: 'widget.ordercart',
    config: {
        itemId: 'orderCart',
        id: 'orderCart',
        //layout: 'fit',
        layout: 'vbox',
        scrollable: {
        	direction: "vertical",
        	directionLock: true
        },
        items: [
            {
                xtype:'button',
                text:Loc.t('CATELOG.CHECKOUT'),
                docked: 'bottom',
                itemId: 'btnCheckOutOrder',
                id: 'btnCheckOutOrder',
                baseCls:'submitbuttonCls',
                margin:5,
                handler: function(){
                    MyApp.app.getController('OrderController').onBtnCheckOutTap();
                }
            },
            {
                xtype: 'panel',
                height: 30,
                docked: 'bottom',
                itemId: 'orderCartTotal',
                id: 'orderCartTotal'
            },
            {
                xtype: 'list',
                store: 'OrderCartStore',
                //height: '100%',
                flex: 1,
                styleHtmlContent: true,
                width: '100%',
                layout: {
                    type: 'fit'
                },
                inline: {
                    wrap: true
                },
                scrollable: {
					direction: "vertical",
					directionLock: true
				},
                itemCls: 'dataviewcart-item',
                itemTpl: Ext.create('Ext.XTemplate',
                	'<div style="height:100px;width:100%;font-size: 12px;">',
                    '<div style="text-align: left;float:left;width:30%">',
                    '<img src="http://{vImage}" height="100px" width="100px"/>',
                    '</div>',
                    '<div style="text-align: left;float:right;padding-left:10px;width:70%">',
                    '<div style="font-weight: bold">{text}</div>',
                    '<div >{tDescription}</div>',
                    '</div>',
                    '</div>',
                    '<tpl if="sizes.length != 0" >',
                    '<div style="margin-top:15px;height:25px;font-size: 12px;">',
                    '<span style="font-weight:bold;position:relative;top:5px">{[this.getSize()]} : </span>',
                    '<div class="styled-select">',
                    '<select style="" id="ordercartsize_{iItemId}" onchange="MyApp.app.getController(\'OrderController\').changeProductSizePrice(this, \'cartView\')"><option value="NA">-{[this.getSelectText()]}-</option>',
                    '<tpl for="sizes">',
                    '<tpl if="iSizeId == parent.selectedSize" >',
                    '<option value="{iSizeId}" selected>{vSizeName} ({parent.vCurrency}{fPrice})</option>',
                    '<tpl else>',
                    '<option value="{iSizeId}">{vSizeName} ({parent.vCurrency}{fPrice})</option>',
                    '</tpl>',
                    '</tpl>',
                    '</select>',
                    '</div>',
                    '</div>',
                    '</tpl>',
                    '<tpl if="options.length != 0" >',
                    '<div style="margin-top:15px;height:25px;font-size: 12px;">',
                    '<span style="font-weight:bold;position:relative;top:5px">{[this.getOption()]} : </span>',
                    '<div class="styled-select">',
                    '<select style="" id="ordercartoption_{iItemId}" onchange="MyApp.app.getController(\'OrderController\').changeProductOptionPrice(this, \'cartView\')"><option value="NA">-{[this.getSelectText()]}-</option>',
                    '<tpl for="options">',
                    '<tpl if="iOptionId == parent.selectedOption" >',
                    '<option value="{iOptionId}" selected>{vOptName} ({parent.vCurrency}{fCharge})</option>',
                    '<tpl else>',
                    '<option value="{iOptionId}">{vOptName} ({parent.vCurrency}{fCharge})</option>',
                    '</tpl>',
                    '</tpl>',
                    '</select>',
                    '</div>',
                    '</div>',
                    '</tpl>',
                    '<div id="ordercartprice_{iItemId}"style="margin-top:5px;height:25px;font-size: 12px;font-weight:bold">',
                    '{[this.getPrice(values.vCurrency, values.price)]}',
                    '</div>',
                    '<div style="width:50%;float:left;margin-top:5px;font-weight:bold;font-size:12px">{[this.getQty()]} : <input value="{selectedQty}" id="orderCartQty_{iItemId}" type="text" style="width:40px;height:40px;text-align:center;"></div>',
                    '<div style="width:100%;margin-top:5px">',
                    '<div style="width:100%;margin-top:5px">',
                    '<button id="ordercart_{iItemId}" onclick="MyApp.app.getController(\'OrderController\').updateProductInCart(this)" class="cartBtn" style="float: left;width: 40px; height: 40px;" type="button"></button>',
                    '<button id="ordercart_{iItemId}" onclick="MyApp.app.getController(\'OrderController\').removeProductInCart(this)" class="cartDeleteBtn" style="float: right;width: 40px; height: 40px;" type="button"></button>',
                    '</div>',
                    {
                        getPrice: function(code, price) {
                        	return Loc.t('CATELOG.PRICE') + ' : ' + code + '' + Number(price).toFixed(2);
                        },
                        getOption: function(){
                        	return Loc.t('CATELOG.OPTION');
                        },
                        getSize: function(){
                        	return Loc.t('CATELOG.SIZE');
                        },
                        getQty: function(){
                        	return Loc.t('CATELOG.QTY');
                        },
						getSelectText: function(){
							return Loc.t('CATELOG.SELECT');
						}
                    })
            }, {
            	xtype: "fieldset",
            	margin: '0 0.5em',
            	title: Loc.t('CATELOG.ORDERDETAILS'),
            	defaultType: "radiofield",
            	itemId: "orderDetails",
            	defaults: {
            		name : 'orderType',
            		checked: false,
            		labelAlign: "right",
            		labelWidth: window.innerWidth - 70
            	},
            	items: [{
            		itemId: "homeDelivery",
					label: Loc.t('CATELOG.HOMEDELIVERY')
            	}, {
            		itemId: "takeAway",
					label: Loc.t('CATELOG.TAKEAWAY')
            	}]
            }]
    }
})