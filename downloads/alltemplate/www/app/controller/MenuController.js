/**
 * Created by hirendave on 5/25/15.
 */
/**
 * Created by hirendave on 5/15/15.
 */
Ext.define('MyApp.controller.MenuController', {
    extend: 'Ext.app.Controller',
    config: {
        refs: {
            menuNavi: 'menunavi',
            menuViewList: 'menuviewlist'
        },
        control: {
			menuNavi: {
                activate: 'onMenuListActivate'
            },
			menuViewList: {
                itemtap: 'onMenuItemTap'
            }
        }
    },
	onMenuListActivate: function(tab){
		var tabId = tab.config.iAppTabId;
        Ext.getStore('MenuStore').load({url:URLConstants.URL + 'action=easyapp_menu_category&iApplicationId=' + TextConstants.ApplicationId + '&iAppTabId=' + tabId});
    },

	onMenuItemTap: function(list, index, target, record, e, eOpts){
		var menuId = record.get('iMenuID');
        Ext.getStore('MenuDetailStore').load({url: URLConstants.URL + 'action=easyapps_item_get&iApplicationId=' + TextConstants.ApplicationId+'&iMenuId='+menuId});
        this.catalogProductView = Ext.create('MyApp.view.menu.MenuDetailView',{title: record.get('text')});
        this.getMenuNavi().push(this.catalogProductView);
    },

    changeProductSizePrice: function(selectElement){
        var productId = selectElement.id.replace('menusize_','');
        var sizeId = selectElement.value;
        var selectedProduct = Ext.getStore('MenuDetailStore').getById(productId);
        var sizePrice = 0;
        for(var i=0;i<selectedProduct.get('sizes').length;i++){
            if(selectedProduct.get('sizes')[i].iSizeId == sizeId){
                sizePrice = selectedProduct.get('sizes')[i].fPrice;
                break;
            }
        }

        //get options price if option is selected
        var optionPrice = 0;
        if(selectedProduct.get('options').length>0){
            var optionId = document.getElementById('menuoption_'+productId).value;
            if(optionId!= 'NA'){
                for(var i=0;i<selectedProduct.get('options').length;i++){
                    if(selectedProduct.get('options')[i].iOptionId == optionId){
                        optionPrice = selectedProduct.get('options')[i].fCharge;
                        break;
                    }
                }
            }
        }
        var newPrice = Number(sizePrice) + Number(optionPrice);
        document.getElementById('menuprice_'+productId).innerHTML = Loc.t('CATELOG.PRICE')+' : '+selectedProduct.get('vCurrency')+newPrice;
    },

    changeProductOptionPrice: function(selectElement){
        var productId = selectElement.id.replace('menuoption_','');
        var optionId = selectElement.value;
        var selectedProduct = Ext.getStore('MenuDetailStore').getById(productId);
        var optionPrice = 0;

        if(optionId!= 'NA'){
            for(var i=0;i<selectedProduct.get('options').length;i++){
                if(selectedProduct.get('options')[i].iOptionId == optionId){
                    optionPrice = selectedProduct.get('options')[i].fCharge;
                    break;
                }
            }
        }
        var sizePrice = 0;
        if(selectedProduct.get('sizes').length>0){
            var sizeId = document.getElementById('menusize_'+productId).value;
            if(sizeId!= 'NA'){
                for(var i=0;i<selectedProduct.get('sizes').length;i++){
                    if(selectedProduct.get('sizes')[i].iSizeId == sizeId){
                        sizePrice = selectedProduct.get('sizes')[i].fPrice;
                        break;
                    }
                }
            }
        }else{
            sizePrice = selectedProduct.get('fPrice');
        }

        var newPrice = Number(sizePrice) + Number(optionPrice);
        document.getElementById('menuprice_'+productId).innerHTML = Loc.t('CATELOG.PRICE')+' : '+selectedProduct.get('vCurrency')+newPrice;
    }
});