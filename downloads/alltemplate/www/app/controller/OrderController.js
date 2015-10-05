/**
 * Created by hirendave on 5/25/15.
 */
/**
 * Created by hirendave on 5/15/15.
 */
Ext.define('MyApp.controller.OrderController', {
    extend: 'Ext.app.Controller',
    config: {
        refs: {
            orderNavi: 'ordernavi',
            orderViewList: 'orderviewlist',
            cartBtnID: '#cartBtnID',
            orderCartView: 'orderCart',
            orderCustomerDetails: 'ordercustomerdetails',
            btnSaveOrderCustomerDetails: 'button[itemId=btnSaveOrderCustomerDetails]',
            orderHistoryBtnID: '#orderHistoryBtnID',
            fillCustomerDetailsBtn: 'button[itemId=btnFillCustomerDetails]'
        },
        control: {
            orderNavi: {
                activate: 'onOrderListActivate',
                pop: 'onOrderNaviPopToRoot'
            },
            orderViewList: {
                itemtap: 'onOrderItemTap'
            },
            cartBtnID: {
                tap: 'goToCart'
            },
            btnSaveOrderCustomerDetails: {
                tap: 'onBtnSaveCustomerDetailsTap'
            },
            orderHistoryBtnID: {
                tap: 'onOrderHistoryBtnIDTap'
            },
            fillCustomerDetailsBtn: {
            	tap: 'showCustomerDetailsView'
            }
        }
    },
    onOrderHistoryBtnIDTap: function(){
        var OrderNavi = this.getOrderNavi();
        var objOrderstore = Ext.getStore('orderhistoryid');
        objOrderstore.removeAll();
        appMask();
        var url = URLConstants.URL + 'action=easyapps_order_history_get&iApplicationId=' + TextConstants.ApplicationId + '&iUserId=' + TextConstants.UserId;
        console.log(url)
        MyApp.services.RemoteService.remoteCall(url,
            function success(Response) {
                console.log(Response);
                objOrderstore.add(Response.order_history_details);
                objOrderstore.sync();
                console.log(objOrderstore.getCount());
                if (OrderNavi.getInnerItems().length == 1) {
                    app_PushView(OrderNavi, 'orderhistory', "");
                }
                Ext.ComponentQuery.query('ordernavi #orderHistoryBtnID')[0].setHidden(true);
                appUnmask();
            },
            function failure(Response) {
                appUnmask();
                appCustomAlert(TextConstants.Sorry, Loc.t('ORDER.ORDERHISTORYFOUND'));
            }
        );
    },

    onOrderNaviPopToRoot: function(navi, view){
        if(view.id == 'orderDetailViewPanel'){
            //this.getOrderNavi().query('#orderHistoryBtnID')[0].setHidden(false);
        }
    },

    onBtnSaveCustomerDetailsTap: function(){
    	if(this.getOrderNavi()){
        var url = URLConstants.URL + 'action=easyapps_order_customer_details&iApplicationId=' + TextConstants.ApplicationId + '&iUserId=' + TextConstants.UserId;
        }
        else{
        var url = URLConstants.URL + 'action=easyapps_catalogue_customer_details&iApplicationId=' + TextConstants.ApplicationId + '&iUserId=' + TextConstants.UserId;
        }
        var formValues = this.getOrderCustomerDetails().getValues();
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
        if(typeof a.deliverydate != "string"){
			a.deliverydate = a.deliverydate.toDateString();
        }
        formValues.orderSummary = Ext.encode(a);
        var cartStore = Ext.getStore('AddCartStore');
 		var cartArr = [];
        for(var i=0;i<cartStore.getCount();i++){
        	cartArr.push(cartStore.getAt(i).data);
        }
        formValues.cartItems = Ext.encode(cartArr);
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
    },

    afterCheckoutPaypal: function(){
        var url = URLConstants.URL + 'action=easyapps_order_paypal_details';
        var formValues = this.getOrderCustomerDetails().getValues();
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
                    this.getOrderCustomerDetails().reset();
                    Ext.getStore('OrderCartStore').removeAll();
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

    onOrderListActivate: function(tab){
    	var tabId = tab.config.iAppTabId;
		var mainView = Ext.ComponentQuery.query('mainview')[0];
		var view = mainView.getActiveItem();
		Ext.getStore('OrderStore').load({
			url:URLConstants.URL + 'action=easyapp_menu_category&iApplicationId=' + TextConstants.ApplicationId + '&iAppTabId=' + tabId,
			callback: function(records, options, success){
				try{
					var response = Ext.decode(options.getResponse().responseText);
					if (response.backgroundimage.backgroundimage) {
						view.down('orderviewlist').setStyle({backgroundImage: 'url(\'http://' + response.backgroundimage.backgroundimage + '\') '});
					}
				}
				catch(e){
					console.log(e);
				}
			}
        });
    },

    onOrderItemTap: function(list, index, target, record, e, eOpts){
        //this.getOrderNavi().query('#orderHistoryBtnID')[0].setHidden(true);
        var menuId = record.get('iMenuID');
        Ext.getStore('OrderDetailStore').load({url: URLConstants.URL + 'action=easyapps_item_get&iApplicationId=' + TextConstants.ApplicationId+'&iMenuId='+menuId});
        this.catalogProductView = Ext.create('MyApp.view.OrderView.OrderDetailView',{title: record.get('text')});
        this.getOrderNavi().push(this.catalogProductView);
        this.getOrderNavi().getNavigationBar().getBackButton().setText(Loc.t('BUTTON.BACK'));
    },

    changeProductSizePrice: function(selectElement){
        var productId = selectElement.id.replace('ordersize_','');
        var sizeId = selectElement.value;
        var selectedProduct = Ext.getStore('OrderDetailStore').getById(productId);
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
            var optionId = document.getElementById('orderoption_'+productId).value;
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
        document.getElementById('orderprice_'+productId).innerHTML = Loc.t('CATELOG.PRICE') + ' : '+selectedProduct.get('vCurrency')+Number(newPrice).toFixed(2);
    },

    changeProductOptionPrice: function(selectElement){
        var productId = selectElement.id.replace('orderoption_','');
        var optionId = selectElement.value;
        var selectedProduct = Ext.getStore('OrderDetailStore').getById(productId);
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
            var sizeId = document.getElementById('ordersize_'+productId).value;
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
        document.getElementById('orderprice_'+productId).innerHTML = Loc.t('CATELOG.PRICE') + ' : '+selectedProduct.get('vCurrency')+Number(newPrice).toFixed(2);
    },

    addProductToCart: function(btn){
        var productId = btn.id.replace('ordercart_','');
        var selectedProduct = Ext.getStore('OrderDetailStore').getById(productId);
        var sizePrice = 0;

        if(selectedProduct.get('sizes').length>0){
            var sizeId = document.getElementById('ordersize_'+productId).value;
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

        var optionPrice = 0;
        if(selectedProduct.get('options').length>0){
            var optionId = document.getElementById('orderoption_'+productId).value;
            if(optionId!= 'NA'){
                for(var i=0;i<selectedProduct.get('options').length;i++){
                    if(selectedProduct.get('options')[i].iOptionId == optionId){
                        optionPrice = selectedProduct.get('options')[i].fCharge;
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
            sizeId = document.getElementById('ordersize_'+productId).value;
            if(sizeId == 'NA'){
                Ext.Msg.alert(Loc.t('CATELOG.ALERT'), Loc.t('CATELOG.SIZESELECT'));
                return;
            }
        }
        if(selectedProduct.get('options').length>0){
            optionId = document.getElementById('orderoption_'+productId).value;
            if(optionId == 'NA'){
                optionId = null;
            }
        }
        var qty = document.getElementById('orderqty_'+productId).value;

        var cartProduct = Ext.getStore('OrderCartStore').getById(productId);
        if(cartProduct){
            cartProduct.set('selectedSize',sizeId);
            cartProduct.set('selectedOption',optionId);
            cartProduct.set('selectedQty',Number(cartProduct.get('selectedQty'))+Number(qty));
            cartProduct.set('price',Number(cartProduct.get('selectedQty'))*Number(price));
            Ext.Msg.alert('Alert', Loc.t('CATELOG.CARTITEMUPDATE'));
        }else{
            cartData.selectedSize = sizeId;
            cartData.selectedOption = optionId;
            cartData.selectedQty = qty ;
            cartData.price = Number(qty)*Number(price);
            Ext.getStore('OrderCartStore').add(cartData);
            Ext.Msg.alert(Loc.t('CATELOG.ALERT'), Loc.t('CATELOG.CARTITEMADD'));
        }
    },

    goToCart: function(){
        if(this.getOrderNavi().getActiveItem().id == 'orderCart'){
            return;
        }
        this.orderCartView = Ext.create('MyApp.view.OrderView.OrderCart', {title: Loc.t('CATELOG.CART')});
        this.getOrderNavi().push(this.orderCartView);
        var total = 0;
        var currency = '';
        for(var i=0;i<Ext.getStore('OrderCartStore').getCount();i++){
            var record = Ext.getStore('OrderCartStore').getAt(i);
            total = total + Number(record.get('price'));
            currency = record.get('vCurrency');
        }
        this.orderCartView.query('#orderCartTotal')[0].setHtml('<center>'+Loc.t('CATELOG.CARTTOTAL')+' : ' + currency + Number(total).toFixed(2)+'</center>');
        TextConstants.TotalAmount = total;
        TextConstants.PayOption = 'Order';
    },

    changeProductSizePrice: function(selectElement, view){
        var productId = '';
        if(view == 'cartView'){
            productId = selectElement.id.replace('ordercartsize_','');
        }else{
            productId = selectElement.id.replace('ordersize_','');
        }

        var sizeId = selectElement.value;
        var selectedProduct = null;
        if(view == 'cartView'){
            selectedProduct = Ext.getStore('OrderCartStore').getById(productId);
        }else{
            selectedProduct = Ext.getStore('OrderDetailStore').getById(productId);
        }
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
            var optionId = '';
            if(view == 'cartView'){
                optionId = document.getElementById('orderoption_'+productId).value;
            }else{
                optionId = document.getElementById('orderoption_'+productId).value;
            }

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
        if(view == 'cartView'){
            document.getElementById('ordercartprice_'+productId).innerHTML = Loc.t('CATELOG.PRICE') + ' : '+selectedProduct.get('vCurrency')+newPrice;
        }else{
            document.getElementById('orderprice_'+productId).innerHTML = Loc.t('CATELOG.PRICE') + ' : '+selectedProduct.get('vCurrency')+Number(newPrice).toFixed(2);
        }
    },

    changeProductOptionPrice: function(selectElement, view){
        var productId = '';
        if(view == 'cartView'){
            productId = selectElement.id.replace('ordercartoption_','');
        }else{
            productId = selectElement.id.replace('orderoption_','');
        }
        var optionId = selectElement.value;
        var selectedProduct = null;
        if(view == 'cartView'){
            selectedProduct = Ext.getStore('OrderCartStore').getById(productId);
        }else{
            selectedProduct = Ext.getStore('OrderDetailStore').getById(productId);
        }
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
            var sizeId = '';
            if(view == 'cartView'){
                sizeId = document.getElementById('ordercartsize_'+productId).value;
            }else{
                sizeId = document.getElementById('ordersize_'+productId).value;
            }
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
        if(view == 'cartView'){
            document.getElementById('ordercartprice_'+productId).innerHTML = Loc.t('CATELOG.PRICE') + ' : '+selectedProduct.get('vCurrency')+newPrice;
        }else{
            document.getElementById('orderprice_'+productId).innerHTML = Loc.t('CATELOG.PRICE') + ' : '+selectedProduct.get('vCurrency')+Number(newPrice).toFixed(2);
        }
    },

    updateProductInCart: function(btn){
        var productId = btn.id.replace('ordercart_','');
        var selectedProduct = Ext.getStore('OrderCartStore').getById(productId);
        var optionId = null;
        var sizeId = null;
        var optionPrice = 0;
        if(selectedProduct.get('options').length>0){
            optionId = document.getElementById('ordercartoption_'+productId).value;
            if(optionId!= 'NA'){
                for(var i=0;i<selectedProduct.get('options').length;i++){
                    if(selectedProduct.get('options')[i].iOptionId == optionId){
                        optionPrice = selectedProduct.get('options')[i].fCharge;
                        break;
                    }
                }
            }
        }

        var sizePrice = 0;
        if(selectedProduct.get('sizes').length>0){
            var sizeId = document.getElementById('ordercartsize_'+productId).value;
            if(sizeId!= 'NA'){
                for(var i=0;i<selectedProduct.get('sizes').length;i++){
                    if(selectedProduct.get('sizes')[i].iSizeId == sizeId){
                        sizePrice = selectedProduct.get('sizes')[i].fPrice;
                        break;
                    }
                }
            }
        }else{
            sizePrice = selectedProduct.get('vCurrency');
        }

        var qty = document.getElementById('orderCartQty_'+productId).value;
        var price = Number(sizePrice) + Number(optionPrice);
        var cartProduct = Ext.getStore('OrderCartStore').getById(productId);
        cartProduct.set('selectedSize',sizeId);
        cartProduct.set('selectedOption',optionId);
        cartProduct.set('selectedQty',Number(qty));
        cartProduct.set('price',Number(cartProduct.get('selectedQty'))*Number(price));
        var total = 0;
        var currency = '';
        for(var i=0;i<Ext.getStore('OrderCartStore').getCount();i++){
            var record = Ext.getStore('OrderCartStore').getAt(i);
            total = total + Number(record.get('price'));
            currency = record.get('vCurrency');
        }
        this.orderCartView.query('#orderCartTotal')[0].setHtml('<center>'+Loc.t('CATELOG.CARTTOTAL')+' : ' +currency + Number(total).toFixed(2)+'</center>');
        TextConstants.TotalAmount = total;
        Ext.Msg.alert(Loc.t('CATELOG.ALERT'), Loc.t('CATELOG.CARTITEMUPDATE'));
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
                    var productId = button.id.replace('ordercart_','');
                    var selectedProduct = Ext.getStore('OrderCartStore').getById(productId);
                    Ext.getStore('OrderCartStore').remove(selectedProduct);
                    var total = 0;
                    var currency = '';
                    for(var i=0;i<Ext.getStore('OrderCartStore').getCount();i++){
                        var record = Ext.getStore('OrderCartStore').getAt(i);
                        total = total + Number(record.get('price'));
                        currency = record.get('vCurrency');
                    }
                    Ext.Msg.alert(Loc.t('CATELOG.ALERT'), Loc.t('CATELOG.CARTITEMDELETE'));
                    this.orderCartView.query('#orderCartTotal')[0].setHtml('<center>'+Loc.t('CATELOG.CARTTOTAL')+' : ' +currency +Number(total).toFixed(2)+'</center>');
                    TextConstants.TotalAmount = total;
                }
            }
        });
    },

    onBtnCheckOutTap: function(){
    	var homeDelivery = Ext.ComponentQuery.query('#homeDelivery')[0];
    	var takeAway = Ext.ComponentQuery.query('#takeAway')[0];
    	if(!homeDelivery.isChecked() && !takeAway.isChecked()){
    		Ext.Msg.alert(Loc.t('CATELOG.ALERT'), Loc.t('CATELOG.SELECTOPTION'));
    		return;
    	}
        var cart = new Array();
        for(var i=0;i<Ext.getStore('OrderCartStore').getCount();i++){
            var record = Ext.getStore('OrderCartStore').getAt(i);
            cart.push({
                iCatelogueId: record.get('iItemId'),
                qty: record.get('selectedQty'),
                iSizeId: record.get('selectedSize'),
                iOptionId: record.get('selectedOption'),
                price: record.get('price')
            });
        }
        var json = {cart: cart};
        appMask();
        var url = URLConstants.URL + 'action=easyapps_new_order_details';
//		if(homeDelivery.isChecked()){
// 			console.log('homeDelivery');
// 			//create customer details
// 			this.orderDetailsView = Ext.create('MyApp.view.OrderView.HomeDelivery', {title: Loc.t('CATELOG.HOMEDELIVERYDETAILS')});
// 		}
// 		else{
// 			console.log('takeAway');
// 			this.orderDetailsView = Ext.create('MyApp.view.OrderView.TakeOut', {title: Loc.t('CATELOG.TAKEOUTDETAILS')});
// 		}
// 		this.getOrderNavi().push(this.orderDetailsView);
        Ext.Ajax.request({
            url: url,
            params: {
                iApplicationId : TextConstants.ApplicationId,
                iUserId: TextConstants.UserId,
                cart : Ext.encode(json)
            },
            method: 'POST',
            success: function (response, opts) {
                var result = Ext.decode(response.responseText);
                if(result.status == 'success'){
                    //create customer details
                    //this.orderCustomerView = Ext.create('MyApp.view.OrderView.CustomerDetails', {title: Loc.t('CATELOG.CUSTOMER')});
                    //this.getOrderNavi().push(this.orderCustomerView);
                    if(homeDelivery.isChecked()){
						console.log('homeDelivery');
						//create customer details
                    	this.orderDetailsView = Ext.create('MyApp.view.OrderView.HomeDelivery', {title: Loc.t('CATELOG.HOMEDELIVERYDETAILS')});
					}
					else{
						console.log('takeAway');
						this.orderDetailsView = Ext.create('MyApp.view.OrderView.TakeOut', {title: Loc.t('CATELOG.TAKEOUTDETAILS')});
					}
					this.getOrderNavi().push(this.orderDetailsView);
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
    
    showCustomerDetailsView: function(btn){
    	if(this.getOrderNavi()){
			var vals = btn.up('formpanel').getValues();
			var vals = btn.up('formpanel').getValues();
			if(vals.tel != null){
				//create customer details
				this.orderCustomerView = Ext.create('MyApp.view.OrderView.CustomerDetails', {title: Loc.t('CATELOG.CUSTOMER')});
				this.getOrderNavi().push(this.orderCustomerView);
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