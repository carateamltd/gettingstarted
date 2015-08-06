/**
 * Created by hirendave on 5/15/15.
 */
Ext.define('MyApp.view.catelog.CatalogCart', {
    extend: 'Ext.Container',
    alias: 'widget.catalogcart',
    config: {
    	itemId: 'catalogCart',
    	id: 'catalogCart',
        //layout: 'fit',
        layout: 'vbox',
        items: [
            {
                xtype:'button',
                text:Loc.t('CATELOG.CHECKOUT'),
                docked: 'bottom',
                itemId: 'btnCheckOut',
                id: 'btnCheckOut',
                baseCls:'submitbuttonCls',
                margin:5,
                handler: function(){
                	MyApp.app.getController('CatalogController').onBtnCheckOutTap();
                }
            },
            {
                xtype: 'panel',
                height: 30,
                docked: 'bottom',
                itemId: 'cartTotal',
                id: 'cartTotal'
            },
            {
                xtype: 'list',
                store: 'AddCartStore',
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
                itemCls: 'dataviewcart-item',
                itemTpl: '<div style="height:100px;width:100%;font-size: 12px;">'+
						 '<div style="text-align: left;float:left;width:30%">'+
							'<img src="http://{vImage}" height="100px" width="100px"/>' +
						 '</div>'+
						 '<div style="text-align: left;float:right;padding-left:20px;width:70%">'+
							'<div style="font-weight: bold">{text}</div>'+
							'<div >{tDescription}</div>'+
						 '</div>'+
            		 '</div>'+
            		 '<tpl if="sizes.length != 0" >'+
                     	'<div style="margin-top:15px;height:25px;font-size: 12px;">'+
                            '<span style="font-weight:bold;position:relative;top:5px">Size : </span>'+
                            '<div class="styled-select">'+
								'<select style="width:140px;" id="cartsize_{iCatelogueId}" onchange="MyApp.app.getController(\'CatalogController\').changeProductSizePrice(this)"><option value="NA">-Select-</option>'+
									'<tpl for="sizes">'+
									'<tpl if="iSizeId == parent.selectedSize" >'+
                						'<option value="{iSizeId}" selected>{text} ({parent.vCurrencyCode}{fSizePrice})</option>'+
                					'<tpl else>'+
                						'<option value="{iSizeId}">{text} ({parent.vCurrencyCode}{fSizePrice})</option>'+
                					'</tpl>'+
									'</tpl>'+
								'</select>'+
                            '</div>'+
                     	'</div>'+
                     '</tpl>'+
                     '<tpl if="option.length != 0" >'+
                     	'<div style="margin-top:15px;height:25px;font-size: 12px;">'+
                            '<span style="font-weight:bold;position:relative;top:5px">Option : </span>'+
                            '<div class="styled-select">'+
								'<select style="width:140px;" id="cartoption_{iCatelogueId}" onchange="MyApp.app.getController(\'CatalogController\').changeProductOptionPrice(this)"><option value="NA">-Select-</option>'+
									'<tpl for="option">'+
									'<tpl if="iOptionId == parent.selectedOption" >'+
                						'<option value="{iOptionId}" selected>{text} ({parent.vCurrencyCode}{fOptionPrice})</option>'+
                					'<tpl else>'+
                						'<option value="{iOptionId}">{text} ({parent.vCurrencyCode}{fOptionPrice})</option>'+
                					'</tpl>'+
									'</tpl>'+
								'</select>' +
                            '</div>'+
                     	'</div>'+
                     '</tpl>'+
                     '<div id="price_{iCatelogueId}"style="margin-top:5px;height:25px;font-size: 12px;font-weight:bold">'+
                        'Price : {vCurrencyCode}{price}'+
                     '</div>'+
                     '<div style="width:50%;float:left;margin-top:5px;font-weight:bold;font-size:12px">Qty : <input value="{selectedQty}" id="cartQty_{iCatelogueId}" type="text" style="width:40px;height:40px"></div>'+
                	'<div style="width:100%;margin-top:5px">'+
                     '<div style="width:100%;margin-top:5px">'+
                		'<button id="cart_{iCatelogueId}" onclick="MyApp.app.getController(\'CatalogController\').updateProductInCart(this)" class="cartBtn" style="float: left;width: 40px; height: 40px;" type="button"></button>'+
                		'<button id="cart_{iCatelogueId}" onclick="MyApp.app.getController(\'CatalogController\').removeProductInCart(this)" class="cartDeleteBtn" style="float: right;width: 40px; height: 40px;" type="button"></button>'+
                	'</div>'
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