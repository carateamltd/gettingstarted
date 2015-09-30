Ext.define('MyApp.view.menu.MenuDetailView', {
    extend: 'Ext.List',
    xtype: 'menudetailview',
    config: {
        style: "background-image: url('img/splash.png');",
        store: 'MenuDetailStore',
        id: 'menuDetailViewPanel',
        itemId: 'menuDetailViewPanel',
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
            '<div style="text-align: left;float:left;width:105px;">',
            '<img src="http://{vImage}" height="100px" width="100px"/>',
            '</div>',
            '<div style="text-align: left;float:right;width:'+(window.innerWidth-110)+'px;">',
            '<div style="font-weight: bold">{text}</div>',
            '<div >{tDescription}</div>',
            '</div>',
            '</div>',
            '<tpl if="sizes.length != 0" >',
            '<div style="margin-top:15px;height:25px;font-size: 12px;">',
            '<span style="font-weight:bold;position:relative;top:5px">{[this.getSizeText()]} : </span>',
            '<div class="styled-select">',
            '<select style="" id="menusize_{iItemId}" onchange="MyApp.app.getController(\'MenuController\').changeProductSizePrice(this, \'detailView\')"><option value="NA">-{[this.getSelectText()]}-</option>',
            '<tpl for="sizes">',
            '<option value="{iSizeId}">{vSizeName} ({parent.vCurrency}{fPrice})</option>',
            '</tpl>',
            '</select>',
            '</div>',
            '</div>',
            '</tpl>',
            '<tpl if="options.length != 0" >',
            '<div style="margin-top:15px;height:25px;font-size: 12px;">',
            '<span style="font-weight:bold;position:relative;top:5px">{[this.getOptionText()]} : </span>',
            '<div class="styled-select">',
            '<select style="" id="menuoption_{iItemId}" onchange="MyApp.app.getController(\'MenuController\').changeProductOptionPrice(this, \'detailView\')"><option value="NA">-{[this.getSelectText()]}-</option>',
            '<tpl for="options">',
            '<option value="{iOptionId}">{vOptName} ({parent.vCurrency}{fCharge})</option>',
            '</tpl>',
            '</select>',
            '</div>',
            '</div>',
            '</tpl>',
            '<div id="menuprice_{iItemId}"style="margin-top:5px;height:25px;font-size: 12px;font-weight:bold">',
            '<tpl if="sizes.length == 0" >',
            '{[this.getPriceText()]} : {vCurrencyCode}{fPrice}',
            '<tpl else>',
            '{[this.getPriceText()]} : -',
            '</tpl>',
            '</div>',
            {
            	getSelectText: function(){
					return Loc.t('CATELOG.SELECT');
				},
            	getSizeText: function(){
					return Loc.t('CATELOG.SIZE');
				},
				getOptionText: function(){
					return Loc.t('CATELOG.OPTION');
				},
				getPriceText: function(code, price) {
					return Loc.t('CATELOG.PRICE');
				}
			}
        )
    }
});
