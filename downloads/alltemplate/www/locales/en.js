/**
 @classes singleton class which holds all translated static text in English
 Ext.ux.Localization determines language and than uses corresponding file from folder locales
 @example text: Loc.t('BUTTON.CANCEL')
 */

Ext.define('locales.en', {
    extend: 'Ext.Base',

    singleton: true,

    BUTTON: {
        BACK: 'Back',
        OK: 'OK',
        CANCEL: 'Cancel',
        YES: 'Yes',
        NO: 'No'
    },
    MAIN: {
        WELCOME: 'Welcome',
        WELCOMEMESSAGE: 'Welcome message',
        WELCOMESENCHA: 'Welcome to Sencha Touch 2',
        WELCOMETEXT1: "You've just generated a new Sencha Touch 2 project. What you're looking at right now is the contents of ",
        WELCOMETEXT2: " - edit that file and refresh to change what's rendered here.",
        GETSTARTED: 'Get Started',
        GETTINGSTARTED: 'Getting Started'
    },
    HOME:{
        TITLE: 'Home',
        DESCRIPTION: 'Description',
        NODESCMESSAGE: 'No Description Available',
        DETAILS: 'Details',
        WEBSITE: 'Website',
        EMAIL: 'Email',
        TELEPHONE: 'Telephone',
        ADDRESS: 'Address',
        CITY: 'City',
        STATE: 'State',
        ZIP: 'Zip',
        ONOFFTIME: 'On / Off Time',
        DAY: 'Day',
        OPRNFROM: 'Open From',
        OPRNTO: 'Open To',
        SUNDAY: 'Sunday',
        MONDAY: 'Monday',
        TUESDAY: 'Tuesday',
        WEDNESDAY: 'Wednesday',
        THURSDAY: 'Thurdsday',
        FRIDAY: 'Friday',
        SATURDAY: 'Saturday'
    },
    EVENT:{
        TITLE: ''
    },
    MAILINGLIST:{
        TITLE: ''
    },
    PDF:{
        TITLE: ''
    },
    RSSFEEDS:{
        TITLE: ''
    },
    WEBSITES:{
        TITLE: ''
    },
    YOUTUBE:{
        TITLE: ''
    },
    LOCATION:{
        TITLE: ''
    },
    GALLERY:{
        TITLE: '',
        NOIMAGESAVAILABLE: 'La galerie est vide.'
    },
    AROUND:{
        TITLE: ''
    },
    VOICERECORD:{
        TITLE: ''
    },
    SOCIALMEDIA:{
        TITLE: ''
    },
    QRCODE:{
        TITLE: ''
    },
    CONTACTUS:{
        TITLE: ''
    },
    MENU:{
        TITLE: ''
    },
    NEWS:{
        TITLE: ''
    },
    ORDER:{
        TITLE: ''
    },
    RESERVATION:{
        TITLE: ''
    },
    LOYALTY:{
        TITLE: ''
    },
    CUSTOM:{
        TITLE: ''
    },
    MESSAGE:{
        TITLE: ''
    },
    DOWNLOAD:{
        TITLE: ''
    },
    PARTNERS:{
        TITLE: ''
    },
    MORTGAGECALCULATOR:{
        TITLE: ''
    },
    SCIENTIFICCALCULATOR:{
        TITLE: ''
    },
    NOTEPAD:{
        TITLE: ''
    },
    SCANNER:{
        TITLE: ''
    },
    APPOINTMENT:{
        TITLE: ''
    },
    QUOTATION:{
        TITLE: ''
    },
    REVIEW:{
        TITLE: ''
    },
    TESTIMONIAL:{
        TITLE: ''
    },
    COUPOUN:{
        TITLE: ''
    },
    SURVEY:{
        TITLE: ''
    },
    CATELOG:{
        TITLE: '',
        CART: 'Cart',
        CUSTOMER: 'Customer Details',
        NAME:'Name',
        EMAIL: 'Email',
        ADDRESS: 'Address',
        CITY: 'City',
        STATE: 'State',
        PIN: 'Zip',
        CHECKOUT: 'Checkout',
        ALERT: 'Alert',
        NAMEERROR: 'Please enter your name',
    	EMAILERROR: 'Please enter your email',
    	ADDRESSERROR: 'Address can not be blank',
    	CITYERROR: 'City can not be blank',
    	STATEERROR: 'State can not be blank',
    	PINERROR: 'Pin can not be blank',
    	CUSTOMERSAVE: 'Details Saved',
    	SIZESELECT: 'Please select a size',
    	CARTITEMADD: 'Item added to cart',
    	ORDERSUCCESS: 'Your order placed successfully',
    	CARTITEMDELETE: 'Item deleted from cart',
    	CARTITEMUPDATE: 'Item updated in cart',
    	CARTTOTAL: 'Total Amount',
    	ORDERDETAILS: 'Details of Order',
    	HOMEDELIVERY: 'Home delivery',
    	TAKEAWAY: 'Take-Away',
    	HOMEDELIVERYDETAILS: 'Delivery',
    	DATE: 'Date',
    	TIME: 'Time',
    	ADDRESS: 'Delivery Address',
    	STREETNO: 'Str No',
    	TOWNCITY: 'Town/City',
    	ZIPCODE: 'Zip Code',
    	TEL: 'Tel. No',
    	APARTMENTNO: 'Apartment No.',
    	REMARKS: 'Remarks',
    	TAKEOUTDETAILS: 'Take-out',
    	CONFIRM: 'Confirm',
    	ARTICLES: 'Articles',
    	SIZE: 'Size',
    	OPTION: 'Option',
    	PRICE: 'Price',
    	QTY: 'Qty',
    	SELECTOPTION: 'Please select delivery option',
    	EMPTYTEL: 'Please enter your phone number.',
    	CLIENTDETAILS: 'Customer Details'
    },
    NEWARRIVAL:{
        TITLE: '',
        NONEWARRIVAL: 'No new arrival is available',
        DETAILS: 'Details'
    },
    DONATION:{
        TITLE: ''
    },
    SERVICE:{
        TITLE: ''
    },
    TICKETINFO:{
        TITLE: ''
    },
    ECOMMERCE:{
        TITLE: ''
    },
    BLOG:{
        TITLE: ''
    },
    MENUOFTHEDAY:{
        TITLE: ''
    },
    LOCALIZATION: {
        CHANGELANGUAGE: 'Change Language',
        CHANGELANGUAGEQUESTION: 'You have to reload application in order to change to new language.'
    }
});