/**
 * Created by hirendave on 5/15/15.
 */
Ext.define('MyApp.controller.CatalogController', {
    extend: 'Ext.app.Controller',
    config: {
        refs: {
            catelogNavi: 'catelognavi',
            catelogView: 'catelogview',
            catelogNestedList: '#catelogNestedList',
            catalogproducts: 'catalogproducts',
            ecommerceCartBtnID: '#ecommerceCartBtnID',
            btnCheckOut: '#btnCheckOut',
            customerdetails: 'ordercustomerdetails',
            btnSaveCustomerDetails: 'button[itemId=btnSaveCustomerDetails]',
            fillCustomerDetailsBtn: 'button[itemId=btnFillCustomerDetails]'
        },
        control: {
            catelogNavi: {
                activate: 'onCatelogViewActivate'
            },
            catelogNestedList: {
                'leafitemtap': 'loadProducts'
            },
            ecommerceCartBtnID:{
                'tap': 'goToCart'
            },
            btnSaveCustomerDetails:{
                'tap': 'onBtnSaveCustomerDetailsTap'
            },
            fillCustomerDetailsBtn: {
            	tap: 'showCustomerDetailsView'
            }
        }
    },
    onCatelogViewActivate: function (tab) {
        var objCatelogStore = Ext.getStore('catelogestoreid'), tabId = tab.config.iAppTabId;
        var mainView = Ext.ComponentQuery.query('mainview')[0];
		var view = mainView.getActiveItem();
        objCatelogStore.load({
        	url: URLConstants.URL + 'action=easyapps_catalogue_category&iApplicationId=' + TextConstants.ApplicationId + '&iAppTabId=' + tabId,
        	callback: function(records, operation, success){
        		try{
        			var Response = Ext.decode(operation.getResponse().responseText);
					if (Response.backgroundimage.backgroundimage) {
						view.down('list').setStyle({backgroundImage: 'url(\'http://' + Response.backgroundimage.backgroundimage + '\')'});
					}
				}
                catch(e){
                	console.log(e);
                }
        	}
        });
    },
    onBtnSaveCustomerDetailsTap: function(){
    	if(this.getCatelogNavi()){
        var url = URLConstants.URL + 'action=easyapps_catalogue_customer_details&iApplicationId=' + TextConstants.ApplicationId + '&iUserId=' + TextConstants.UserId;
        var formValues = this.getCustomerdetails().getValues();
        if(formValues.vName == ''){
        	Ext.Msg.alert(Loc.t('CATELOG.ALERT'), Loc.t('CATELOG.NAMEERROR'));
        	return;
        }
        if(formValues.vEmailId == ''){
        	Ext.Msg.alert(Loc.t('CATELOG.ALERT'), Loc.t('CATELOG.EMAILERROR'));
        	return;
        }
        /*if(formValues.vAddress == ''){
        	Ext.Msg.alert(Loc.t('CATELOG.ALERT'), Loc.t('CATELOG.ADDRESSERROR'));
        	return;
        }
        if(formValues.vCity == ''){
        	Ext.Msg.alert(Loc.t('CATELOG.ALERT'), Loc.t('CATELOG.CITYERROR'));
        	return;
        }*/
        if(formValues.tel == null){
        	Ext.Msg.alert(Loc.t('CATELOG.ALERT'), Loc.t('CATELOG.EMPTYTEL'));
        	return;
        }
        /*if(formValues.vPincode == ''){
        	Ext.Msg.alert(Loc.t('CATELOG.ALERT'), Loc.t('CATELOG.PINERROR'));
        	return;
        }*/
        var a = Ext.getStore('OrderSummaryStore').getAt(0).data;
        if(typeof a.deliverydate !="string"){
			a.deliverydate = a.deliverydate.toDateString();
        }
        formValues.orderSummary = a;
        formValues.cartItems = Ext.getStore('AddCartStore').getData();
         appMask();
        Ext.Ajax.request({
            url: url,
            params: formValues,
            method: 'GET',
            success: function (response, opts) {
                var result = Ext.decode(response.responseText);
                if(result.status == 'success'){
                    var customerId = result.customer_id;
                    Ext.Msg.alert(Loc.t('CATELOG.ALERT'), Loc.t('CATELOG.CUSTOMERSAVE'));
                    //invoke paypal
                    OnBuy();
                }
                appUnmask();
            },
            failure: function (Response, opts) {
                console.log(Response);
                appUnmask();
            },
            scope: this
        });
        }
    },

    onBtnCheckOutTap: function(){
    	var homeDelivery = Ext.ComponentQuery.query('#homeDelivery')[0];
    	var takeAway = Ext.ComponentQuery.query('#takeAway')[0];
    	if(!homeDelivery.isChecked() && !takeAway.isChecked()){
    		Ext.Msg.alert(Loc.t('CATELOG.ALERT'), Loc.t('CATELOG.SELECTOPTION'));
    		return;
    	}
        var cart = new Array();
        for(var i=0;i<Ext.getStore('AddCartStore').getCount();i++){
            var record = Ext.getStore('AddCartStore').getAt(i);
            cart.push({
                iCatelogueId: record.get('iCatelogueId'),
                qty: record.get('selectedQty'),
                iSizeId: record.get('selectedSize'),
                iOptionId: record.get('selectedOption'),
                price: record.get('price')
            });
        }
        appMask();
        var url = URLConstants.URL + 'action=easyapps_catalogue_order_details';
        Ext.Ajax.request({
            url: url,
            params: {
                iApplicationId : TextConstants.ApplicationId,
                iUserId: TextConstants.UserId,
                cart : Ext.encode(cart)
            },
            method: 'POST',
            success: function (response, opts) {
                var result = Ext.decode(response.responseText);
                if(result.status == 'success'){
                    //create customer details
//                     this.catelogCustomerView = Ext.create('MyApp.view.catelog.CustomerDetails', {title: Loc.t('CATELOG.CUSTOMER')});
//                     this.getCatelogNavi().push(this.catelogCustomerView);
					if(homeDelivery.isChecked()){
						console.log('homeDelivery');
						//create customer details
                    	this.orderDetailsView = Ext.create('MyApp.view.OrderView.HomeDelivery', {title: Loc.t('CATELOG.HOMEDELIVERYDETAILS')});
					}
					else{
						console.log('takeAway');
						this.orderDetailsView = Ext.create('MyApp.view.OrderView.TakeOut', {title: Loc.t('CATELOG.TAKEOUTDETAILS')});
					}
					this.getCatelogNavi().push(this.orderDetailsView);
                }
                appUnmask();
            },
            failure: function (Response, opts) {
                console.log(Response);
                appUnmask();
            },
            scope: this
        });
    },

    loadProducts: function(listItem, list, index, target, record, e, eOpts){
        var catId = record.get('cat_id');
        Ext.getStore('CatalogProductStore').load({url: URLConstants.URL + 'action=easyapps_catalogue_product&cat_id=' + catId});
        this.catalogProductView = Ext.create('MyApp.view.catelog.CatalogProducts',{title: Loc.t('CATELOG.ARTICLES')});
        this.getCatelogNavi().push(this.catalogProductView);
    },

    addProductToCart: function(btn){
        var productId = btn.id.replace('cart_','');
        var selectedProduct = Ext.getStore('CatalogProductStore').getById(productId);
		var sizePrice = 0;
        
        if(selectedProduct.get('sizes').length>0){
            var sizeId = document.getElementById('size_'+productId).value;
            if(sizeId!= 'NA'){
                for(var i=0;i<selectedProduct.get('sizes').length;i++){
                    if(selectedProduct.get('sizes')[i].iSizeId == sizeId){
                        sizePrice = selectedProduct.get('sizes')[i].fSizePrice;
                        break;
                    }
                }
            }
        }else{
            sizePrice = selectedProduct.get('vCurrency');
        }        
        
        var optionPrice = 0;
        if(selectedProduct.get('option').length>0){
            var optionId = document.getElementById('option_'+productId).value;
            if(optionId!= 'NA'){
                for(var i=0;i<selectedProduct.get('option').length;i++){
                    if(selectedProduct.get('option')[i].iOptionId == optionId){
                        optionPrice = selectedProduct.get('option')[i].fOptionPrice;
                        break;
                    }
                }
            }
        }
        var price = Number(sizePrice) + Number(optionPrice);
        
        var cartData = selectedProduct.data;
        var sizeId = null;
        var optionId = null;
        if(selectedProduct.get('sizes').length>0){
            sizeId = document.getElementById('size_'+productId).value;
            if(sizeId == 'NA'){
            	Ext.Msg.alert(Loc.t('CATELOG.ALERT'), Loc.t('CATELOG.SIZESELECT'));
                return;
            }
        }
        if(selectedProduct.get('option').length>0){
            optionId = document.getElementById('option_'+productId).value;
            if(optionId == 'NA'){
                optionId = null;
            }
        }
        var qty = document.getElementById('qty_'+productId).value;

        var cartProduct = Ext.getStore('AddCartStore').getById(productId);
        if(cartProduct){
            cartProduct.set('selectedSize',sizeId);
            cartProduct.set('selectedOption',optionId);
            cartProduct.set('selectedQty',Number(cartProduct.get('selectedQty'))+Number(qty));
            cartProduct.set('price',Number(cartProduct.get('selectedQty'))*Number(price));
            Ext.Msg.alert(Loc.t('CATELOG.ALERT'), Loc.t('CATELOG.CARTITEMUPDATE'));
        }else{
            cartData.selectedSize = sizeId;
            cartData.selectedOption = optionId;
            cartData.selectedQty = qty;
            cartData.price = Number(qty)*Number(price);
            Ext.getStore('AddCartStore').add(cartData);
            Ext.Msg.alert(Loc.t('CATELOG.ALERT'), Loc.t('CATELOG.CARTITEMADD'));
        }
    },

    changeProductSizePrice: function(selectElement){
        var productId = selectElement.id.replace('size_','');
        var sizeId = selectElement.value;
        var selectedProduct = Ext.getStore('CatalogProductStore').getById(productId);
        var sizePrice = 0;
        for(var i=0;i<selectedProduct.get('sizes').length;i++){
            if(selectedProduct.get('sizes')[i].iSizeId == sizeId){
                sizePrice = selectedProduct.get('sizes')[i].fSizePrice;
                break;
            }
        }

        //get options price if option is selected
        var optionPrice = 0;
        if(selectedProduct.get('option').length>0){
            var optionId = document.getElementById('option_'+productId).value;
            if(optionId!= 'NA'){
                for(var i=0;i<selectedProduct.get('option').length;i++){
                    if(selectedProduct.get('option')[i].iOptionId == optionId){
                        optionPrice = selectedProduct.get('option')[i].fOptionPrice;
                        break;
                    }
                }
            }
        }
        var newPrice = Number(sizePrice) + Number(optionPrice);
        document.getElementById('price_'+productId).innerHTML = Loc.t('CATELOG.PRICE') + ' : '+selectedProduct.get('vCurrencyCode')+Number(newPrice).toFixed(2);
    },

    changeProductOptionPrice: function(selectElement){
        var productId = selectElement.id.replace('option_','');
        var optionId = selectElement.value;
        var selectedProduct = Ext.getStore('CatalogProductStore').getById(productId);
        var optionPrice = 0;

        if(optionId!= 'NA'){
            for(var i=0;i<selectedProduct.get('option').length;i++){
                if(selectedProduct.get('option')[i].iOptionId == optionId){
                    optionPrice = selectedProduct.get('option')[i].fOptionPrice;
                    break;
                }
            }
        }
        var sizePrice = 0;
        if(selectedProduct.get('sizes').length>0){
            var sizeId = document.getElementById('size_'+productId).value;
            if(sizeId!= 'NA'){
                for(var i=0;i<selectedProduct.get('sizes').length;i++){
                    if(selectedProduct.get('sizes')[i].iSizeId == sizeId){
                        sizePrice = selectedProduct.get('sizes')[i].fSizePrice;
                        break;
                    }
                }
            }
        }else{
            sizePrice = selectedProduct.get('vCurrency');
        }

        var newPrice = Number(sizePrice) + Number(optionPrice);
        document.getElementById('price_'+productId).innerHTML = Loc.t('CATELOG.PRICE') + ' : '+selectedProduct.get('vCurrencyCode')+newPrice;
    },

    goToCart: function(){
    	if(this.getCatelogNavi().getActiveItem().id == 'catalogCart'){
    		return;
    	}
        this.catalogCartView = Ext.create('MyApp.view.catelog.CatalogCart', {title: Loc.t('CATELOG.CART')});
        this.getCatelogNavi().push(this.catalogCartView);
        var total = 0;
        var currency = '';
        for(var i=0;i<Ext.getStore('AddCartStore').getCount();i++){
            var record = Ext.getStore('AddCartStore').getAt(i);
            total = total + Number(record.get('price'));
            currency = record.get('vCurrencyCode');
        }
        this.catalogCartView.query('#cartTotal')[0].setHtml('<center>'+Loc.t('CATELOG.CARTTOTAL')+' : ' + currency + Number(total).toFixed(2) +'</center>');
        TextConstants.TotalAmount = total;
        TextConstants.PayOption = 'Catalog';
    },
    
    afterCheckoutPaypal: function(){
    	var url = URLConstants.URL + 'action=easyapps_catalogue_paypal_details';
    	var formValues = this.getCustomerdetails().getValues();
    	Ext.Ajax.request({
            url: url,
            params: {
                iTransactionId : TextConstants.TransactionId,
                iApplicationId : TextConstants.ApplicationId,
                iUserId: TextConstants.UserId,
                eStatus : 'success',
                vFirstName: formValues.vName,
                vLastName: formValues.vName
            },
            method: 'POST',
            success: function (response, opts) {
                var result = Ext.decode(response.responseText);
                if(result.Status == 'success'){
                    Ext.Msg.alert(Loc.t('CATELOG.ALERT'), Loc.t('CATELOG.ORDERSUCCESS'));
                    this.getCustomerdetails().reset();
                    Ext.getStore('AddCartStore').removeAll();
                }
                appUnmask();
            },
            failure: function (Response, opts) {
                console.log(Response);
                appUnmask();
            },
            scope: this
        });
    },

    removeProductInCart: function(button){
    	Ext.Msg.show({
            title: Loc.t('CATELOG.ALERT'),
            message: Loc.t('CATELOG.SURE'),
            scope: this,
            buttons: [{
                    itemId: 'no',
                    text: Loc.t('BUTTON.CANCEL'),
                    ui: 'action'
                }, {
                    itemId: 'yes',
                    text: Loc.t('BUTTON.OK'),
                    ui: 'action'
            }],
            fn: function (btn) {
                if (btn == 'yes') {
                	var productId = button.id.replace('cart_','');
					var selectedProduct = Ext.getStore('AddCartStore').getById(productId);
					Ext.getStore('AddCartStore').remove(selectedProduct);
					var total = 0;
					var currency = '';
					for(var i=0;i<Ext.getStore('AddCartStore').getCount();i++){
						var record = Ext.getStore('AddCartStore').getAt(i);
						total = total + Number(record.get('price'));
						currency = record.get('vCurrencyCode');
					}
					Ext.Msg.alert(Loc.t('CATELOG.ALERT'), Loc.t('CATELOG.CARTITEMDELETE'));
					this.catalogCartView.query('#cartTotal')[0].setHtml('<center>'+Loc.t('CATELOG.CARTTOTAL')+' : ' +currency +Number(total).toFixed(2)+'</center>');
					TextConstants.TotalAmount = total;
                }
            }
        });
    },

    updateProductInCart: function(btn){
        var productId = btn.id.replace('cart_','');
        var selectedProduct = Ext.getStore('CatalogProductStore').getById(productId);
        var optionId = null;
        var sizeId = null;

        var optionPrice = 0;
        if(selectedProduct.get('option').length>0){
            optionId = document.getElementById('cartoption_'+productId).value;
            if(optionId!= 'NA'){
                for(var i=0;i<selectedProduct.get('option').length;i++){
                    if(selectedProduct.get('option')[i].iOptionId == optionId){
                        optionPrice = selectedProduct.get('option')[i].fOptionPrice;
                        break;
                    }
                }
            }
        }

        var sizePrice = 0;
        if(selectedProduct.get('sizes').length>0){
            var sizeId = document.getElementById('cartsize_'+productId).value;
            if(sizeId!= 'NA'){
                for(var i=0;i<selectedProduct.get('sizes').length;i++){
                    if(selectedProduct.get('sizes')[i].iSizeId == sizeId){
                        sizePrice = selectedProduct.get('sizes')[i].fSizePrice;
                        break;
                    }
                }
            }
        }else{
            sizePrice = selectedProduct.get('vCurrency');
        }

        var qty = document.getElementById('cartQty_'+productId).value;
        var price = Number(sizePrice) + Number(optionPrice);
        var cartProduct = Ext.getStore('AddCartStore').getById(productId);
        cartProduct.set('selectedSize',sizeId);
        cartProduct.set('selectedOption',optionId);
        cartProduct.set('selectedQty',Number(qty));
        cartProduct.set('price',Number(cartProduct.get('selectedQty'))*Number(price));
        var total = 0;
        var currency = '';
        for(var i=0;i<Ext.getStore('AddCartStore').getCount();i++){
            var record = Ext.getStore('AddCartStore').getAt(i);
            total = total + Number(record.get('price'));
            currency = record.get('vCurrencyCode');
        }
        this.catalogCartView.query('#cartTotal')[0].setHtml('<center>'+Loc.t('CATELOG.CARTTOTAL')+' : ' +currency + Number(total).toFixed(2)+'</center>');
        TextConstants.TotalAmount = total;
        Ext.Msg.alert(Loc.t('CATELOG.ALERT'), Loc.t('CATELOG.CARTITEMUPDATE'));
    },
    
    showCustomerDetailsView: function(btn){
    	var vals = btn.up('formpanel').getValues();
    	if(this.getCatelogNavi()){
			var vals = btn.up('formpanel').getValues();
			if(vals.tel != null){
				//create customer details
				this.orderCustomerView = Ext.create('MyApp.view.OrderView.CustomerDetails', {title: Loc.t('CATELOG.CUSTOMER')});
				this.getCatelogNavi().push(this.orderCustomerView);
				this.orderCustomerView.setValues(vals);
			
				var orderType = null;
				var homeDelivery = Ext.ComponentQuery.query('#homeDelivery')[0];
				var takeAway = Ext.ComponentQuery.query('#takeAway')[0];
				if(homeDelivery.isChecked()){
					vals.orderType = "Home Delivery";
				}
				else{
					vals.orderType = "Take Out";
				}
				var orderSummaryStore = Ext.getStore('OrderSummaryStore');
				orderSummaryStore.removeAll();
				orderSummaryStore.add(vals);
	    	}
	    	else{
	    		Ext.Msg.alert(Loc.t('CATELOG.ALERT'), Loc.t('CATELOG.EMPTYTEL'));
	    	}
		}
    }
});