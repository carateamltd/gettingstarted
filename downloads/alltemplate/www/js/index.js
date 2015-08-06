var app = {
   // Application Constructor
   initialize: function() {
       this.bindEvents();
   },
   // Bind Event Listeners
   //
   // Bind any events that are required on startup. Common events are:
   // 'load', 'deviceready', 'offline', and 'online'.
   bindEvents: function() {
       document.addEventListener('deviceready', this.onDeviceReady, false);
   },
   // deviceready Event Handler
   //
   // The scope of 'this' is the event. In order to call the 'receivedEvent'
   // function, we must explicity call 'app.receivedEvent(...);'
   onDeviceReady: function() {
       app.receivedEvent('deviceready');
   },
   // Update DOM on a Received Event
   receivedEvent: function(id) {
//       var parentElement = document.getElementById(id);
//       var listeningElement = parentElement.querySelector('.listening');
//       var receivedElement = parentElement.querySelector('.received');
//
//       listeningElement.setAttribute('style', 'display:none;');
//       receivedElement.setAttribute('style', 'display:block;');

       console.log('Received Event: ' + id);

       // start to initialize PayPalMobile library
       app.initPaymentUI();
   },
   initPaymentUI : function () {
   		Ext.Ajax.request({
            url: URLConstants.URL + 'action=easyapps_get_clients_paypal_info',
            params: {
            	appId: TextConstants.ApplicationId
            },
            method: 'POST',
            success: function(result){
            	try{
            		var res = Ext.decode(result.responseText);
            		var clientIDs = {
				       "PayPalEnvironmentProduction": res.clientID[0].vSignature,
				        "PayPalEnvironmentSandbox": "ATg5XqP8fAliFG9Tg19a_paIrQsG2xS_1ylVSZXPrdZ-WeVH3QuIvvdb1wYXaYVED1zoVh3_6j5FgnPA"
				     };
				     PayPalMobile.init(clientIDs, app.onPayPalMobileInit);
            	}
            	catch(e){
            		console.log(e);
            	}
            },
            failure: function(result){
            	console.log(result);
            }
        });

   },
   onSuccesfulPayment : function(payment) {
     console.log("payment success: " + JSON.stringify(payment));

     
     TextConstants.TransactinTime = payment.response.create_time;
     TextConstants.TransactionId = payment.response.id;
     TextConstants.Payments = payment.response.state;
     
     console.log(payment.response.state);
     console.log(payment.response.id);
     console.log(payment.create_time);
     if(TextConstants.PayOption == 'booking'){
          MyApp.app.getController('MyApp.controller.MainController').afterBooking_PayPal();
     }else if (TextConstants.PayOption == "Order"){
          MyApp.app.getController('MyApp.controller.OrderController').afterCheckoutPaypal();
     }else if(TextConstants.PayOption == "donation"){
         MyApp.app.getController('MyApp.controller.MainController').onOrgnizationAfterSubmitBtnTap();
     }else if(TextConstants.PayOption == "Catalog"){
         MyApp.app.getController('MyApp.controller.CatalogController').afterCheckoutPaypal();
     }else{
          MyApp.app.getController('MyApp.controller.MainController').onAfterEcommerceBuy();
     }
     
   },
   onAuthorizationCallback : function(authorization) {
     console.log("authorization: " + JSON.stringify(authorization, null, 4));
   },
   createPayment : function () {
     // for simplicity use predefined amount
      var num = TextConstants.TotalAmount;
    var n = num.toString();
     var paymentDetails = new PayPalPaymentDetails(n, "0.00", "0.00");
     var payment = new PayPalPayment(n, "USD", "Awesome Sauce", "Sale", paymentDetails);
     return payment;
   },
   configuration : function () {
     // for more options see `paypal-mobile-js-helper.js`
     var config = new PayPalConfiguration({merchantName: "My test shop", merchantPrivacyPolicyURL: "https://mytestshop.com/policy", merchantUserAgreementURL: "https://mytestshop.com/agreement"});
     return config;
   },
   onPrepareRender : function() {
     // buttons defined in index.html
     //  <button id="buyNowBtn"> Buy Now !</button>
     //  <button id="buyInFutureBtn"> Pay in Future !</button>
     //  <button id="profileSharingBtn"> ProfileSharing !</button>
     var buyNowBtn = document.getElementById("buyNowBtn");
     var buyInFutureBtn = document.getElementById("buyInFutureBtn");
     var profileSharingBtn = document.getElementById("profileSharingBtn");

//     buyNowBtn.onclick = function(e) {
//       // single payment
//       PayPalMobile.renderSinglePaymentUI(app.createPayment(), app.onSuccesfulPayment, app.onUserCanceled);
//     };

     buyInFutureBtn.onclick = function(e) {
       // future payment
       PayPalMobile.renderFuturePaymentUI(app.onAuthorizationCallback, app.onUserCanceled);
     };

     profileSharingBtn.onclick = function(e) {
       // profile sharing
       PayPalMobile.renderProfileSharingUI(["profile", "email", "phone", "address", "futurepayments", "paypalattributes"], app.onAuthorizationCallback, app.onUserCanceled);
     };
   },
   onPayPalMobileInit : function() {
		// must be called
    	// use PayPalEnvrionmentNoNetwork mode to get look and feel of the flow
   		// PayPalEnvironmentProduction // production case
  		// PayPalEnvironmentSandbox // developer case
     PayPalMobile.prepareToRender("PayPalEnvironmentProduction", app.configuration(), app.onPrepareRender);
   },
   onUserCanceled : function(result) {
     console.log(result);
   }
};
function OnBuy(){
	if(typeof(PayPalMobile) != "undefined"){
     PayPalMobile.renderSinglePaymentUI(app.createPayment(), app.onSuccesfulPayment, app.onUserCanceled);
    }
    else{
    	console.log("'PayPalMobile' is not defined.");
    }
}
app.initialize();