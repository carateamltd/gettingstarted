Ext.define('MyApp.view.catelog.CatalogProducts', {
    extend: 'Ext.Panel',
    alias: 'widget.catalogproducts',
    config: {
        layout: 'fit',
        items: [{
            xtype: 'list',
            store: 'CatalogProductStore',
            height: '100%',
            styleHtmlContent: true,
            width: '100%',
            layout: {
                type: 'fit'
            },
            inline: {
                wrap: true
            },
            itemCls: 'dataview-item',
            itemTpl: Ext.create('Ext.XTemplate',
            	'<div style="height:100px;width:100%;font-size: 12px;">',
						 '<div style="text-align: left;float:left;width:30%">',
							'<img src="http://{vImage}" height="100px" width="100px"/>',
						 '</div>',
						 '<div style="text-align: left;float:right;padding-left:20px;width:70%">',
							'<div style="font-weight: bold">{text}</div>',
							'<div >{tDescription}</div>',
						 '</div>',
            		 '</div>',
            		 '<tpl if="sizes.length != 0" >',
                     	'<div style="margin-top:15px;height:25px;font-size: 12px;">',
                            '<span style="font-weight:bold;position:relative;top:5px">{[this.getSize()]}: </span>',
                            '<div class="styled-select">',
								'<select style="width:140px;" id="size_{iCatelogueId}" onchange="MyApp.app.getController(\'CatalogController\').changeProductSizePrice(this)"><option value="NA">-{[this.getSelectText()]}-</option>',
									'<tpl for="sizes">',
									'<option value="{iSizeId}">{text} ({parent.vCurrencyCode}{fSizePrice})</option>',
									'</tpl>',
								'</select>',
                            '</div>',
                     	'</div>',
                     '</tpl>',
                     '<tpl if="option.length != 0" >',
                     	'<div style="margin-top:15px;height:25px;font-size: 12px;">',
                            '<span style="font-weight:bold;position:relative;top:5px">{[this.getOption()]} : </span>',
                            '<div class="styled-select">',
								'<select style="width:140px;" id="option_{iCatelogueId}" onchange="MyApp.app.getController(\'CatalogController\').changeProductOptionPrice(this)"><option value="NA">-{[this.getSelectText()]}-</option>',
									'<tpl for="option">',
									'<option value="{iOptionId}">{text} ({parent.vCurrencyCode}{fOptionPrice})</option>',
									'</tpl>',
								'</select>',
                            '</div>',
                     	'</div>',
                     '</tpl>',
                     '<div id="price_{iCatelogueId}"style="margin-top:5px;height:25px;font-size: 12px;font-weight:bold">',
                        '<tpl if="sizes.length == 0" >',
                            '{[this.getPrice()]} : {vCurrencyCode}{vCurrency}',
                        '<tpl else>',
                            '{[this.getPrice()]} : {vCurrencyCode}{vCurrency}',
                        '</tpl>',
                     '</div>',
                     '<div style="width:50%;float:left;margin-top:5px;font-weight:bold;font-size:12px">{[this.getQty()]} : <input value="1" id="qty_{iCatelogueId}" type="text" style="width:40px;height:40px;text-align:center;"></div>',
                     '<div style="width:50%;float:right;margin-top:5px"><button id="cart_{iCatelogueId}" onclick="MyApp.app.getController(\'CatalogController\').addProductToCart(this)" class="cartBtn" style="float: right;width: 40px; height: 40px;" type="button"></button></div>',
                    {
                        getPrice: function(code, price) {
                        	return Loc.t('CATELOG.PRICE');
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
        }]
    }
})
