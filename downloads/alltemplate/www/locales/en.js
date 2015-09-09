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
        NO: 'No',
        SUBSCRIBE: 'Subscribe'
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
        SORRY: 'Sorry',
        ONOFFTIME: 'On / Off Time',
        DAY: 'Day',
        OPRNFROM: 'Open From',
        OPRNTO: 'Open To',
        SUNDAY: 'Sunday',
        MONDAY: 'Monday',
        TUESDAY: 'Tuesday',
        WEDNESDAY: 'Wednesday',
        THURSDAY: 'Thursday',
        FRIDAY: 'Friday',
        SATURDAY: 'Saturday'
    },
    EVENT:{
        TITLE: 'Event',
        STARTDATE: 'Beginning',
        ENDDATE: 'End',
        DESC: 'Description',
        NOEVENTAVAILABLE: 'No events'
    },
    MAILINGLIST:{
        TITLE: 'BROADCAST LIST'
    },
    PDF:{
        TITLE: 'PDF',
        NOPDFAVL: 'No pdf is available',
        PDFVIEWER:'PDF Viewer'
    },
    RSSFEEDS:{
        TITLE: 'RSS Feeds',
        RSSFEEDNOTVALID: 'RSS feed is not valid !!',
        RSSFEEDNOTAVL: 'No RSS feed is available'
    },
    WEBSITES:{
        TITLE: 'Website',
        NOWEBLISTAVL: 'No Website List is available'
    },
    YOUTUBE:{
        TITLE: 'Youtube',
        NOVIDEOAVAILABLE: "No video is available.",
        VIDEO: 'Video'
    },
    LOCATION:{
        TITLE: 'Location',
        NAME: 'Name',
        ADDRESS: 'Address',
        SEND: 'Send',
        WEB: 'Web',
        CALL: 'Call',
        NOLOCATIONAVAILABLE: 'Sorry no data available',
        MAPVIEW: 'See the map'
    },
    GALLERY:{
        TITLE: 'Gallery',
        NOIMAGESAVAILABLE: 'The gallery is empty.'
    },
    AROUND:{
        TITLE: 'Around Us',
        DISTANCE: 'Distance',
        LIST: 'List',
        MAP: 'Map',
        BTN1: '',
        BTN2: '',
        BTN3: ''
    },
    VOICERECORD:{
    	RECORD:'Record',
    	PLAY:'Play',
    	SEND:'Send',
        TITLE: 'Voice Recording'
    },
    SOCIALMEDIA:{
        TITLE: 'SOCIAL MEDIA',
        SOCIALPAGES: 'Social Pages'
    },
    QRCODE:{
        TITLE: 'Qr Code',
        NODATAAVAILABLE: 'No data available',
        STARTDATE: 'Start date',
        ENDDATE: 'End date',
        QRVIEW: 'Qr View'
    },
    CONTACTUS:{
        TITLE: 'Contact Us',
        NAME: 'Name',
        EMAIL: 'E-mail',
        MESSAGE: 'Message',
        SUBMIT: 'Submit',
        TELEPHONE: 'Telephone',
        MESSAGETHANKYOU: 'Thank you for your message.'
    },
    MENU:{
        TITLE: 'Menu',
        MENUDETAILS: 'Menu Details',
        NAME: 'Name',
        PRICE: 'Price',
        SIZE: 'Size',
        OPTION: 'Option',
        NOMENUAVAILABLE: 'No menu'
    },
    NEWS:{
        TITLE: 'Info',
        NONEWSISAVAILABLE: 'No '
    },
    ORDER:{
        TITLE: 'Order',
        SUBMITORDER: 'order',
        SUBMITORDERDETAIL : 'Order',
        ORDERDETAIL: 'Order Details',
        ITEMDETAILS: "Item Details",
        SHOWORDER: 'Basket',
        NAME: 'Name',
        QUANTITY: 'Quantity',
        PRICE: 'Price',
        DELETE: 'Delete',
        NORECORDFOUND: 'No item available in this category.',
        YOURORDERSUCCESS: 'Your order successfully added',
        CHECKCONNVECTION: 'Please check your Internet connection',
        ORDERHISTORYFOUND: "No order history found",
        ALLFIELDMANDATORY:'All fields are mandatory',
        SPECIFICINSTRUCTION: 'Remark',
        ORDERHISTORY: 'Order History',
        ADDITEMTOORDER: 'Order',
        CHOOSESIZE: 'Size',
        DETAILS: 'Description',
        TOTALAMT: 'Price',
        CHOOSEOPTION: 'Choose',
        DONE:'Done',
        CANCEL: 'Cancel',
        VARIENT: 'Varient',
        PAYMENTMETHOD: 'Payment method'
    },
    RESERVATION:{
        TITLE: 'Reservation',
        NORESERVATIONAVAILABLE: 'No Reservation Available.',
        SCHEDULETITLE: 'Booking Schedule',
        CUSTOMERDETAILS: 'Customer details',
        TIME: 'Time',
        PRICE: 'Price',
        PREPAYMENT: 'Prepayment',
        CONFIRM: 'Confirm',
        SERVICETITLE: 'Service',
        DURATION: 'Duration',
        BOOKIT: 'Book It !!!',
        BOOKINGDATE: 'Date',
        SELECTTIME:'Hour',
        BOOK: 'Following',
        FIRSTNAME: 'First name',
        LASTNAME: 'Last name',
        EMAIL: 'E-mail',
        MOBILENO: 'Mobile',
        CONFIRMBOOKING : 'Confirm booking',
        SCHEDULERESERVATION: 'Booking Schedule',
        PAST: 'Previous',
        UPCOMING: 'Upcoming',
        NODATAAVAILABLE: 'No Data Available'
    },
    LOYALTY:{
        TITLE: 'Loyalty',
        NOLOYALTYAVAILABE: 'Not available Loyalty Program.',
        NOLOYALTYSECRETAVAILABE: 'Please enter the correct PIN',
        NOMORECOUPONAVAILABLE: 'Incorrect Secret Code',
        ENTERSECRETCODE: 'Enter Secret Code',
        STAMPCARD: 'STAMP CARD',
        PLEASEHANDYOURDEVICE: 'Please give your phone to the cashier to stamp your loyalty card.',
        SECRETCODE: 'secret code',
        SUBMITCODE: 'Stamp',
        NOOFUSE: 'Number of use',
        SHARE: 'Share',
        TOTAL:'Total use'
    },
    CUSTOM:{
        TITLE: 'Custom',
        NODATAAVAILABLE:'No information available.'
    },
    MESSAGE:{
        TITLE: 'Message',
        NOMESSAGEAVAILABLE: 'No messages available'
    },
    DOWNLOAD:{
        TITLE: 'DOWNLOAD',
        NODOWNLOADAVAILABLE: 'No download is available'
    },
    PARTNERS:{
        TITLE: 'PARTNERS',
        NOPARTNERAVL: 'No Partners is available'
    },
    MORTGAGECALCULATOR:{
        TITLE: 'Mortgage Calculator',
        HOMEPRICE: 'Home Price',
        DOWNPAYMENT: 'Down Payment',
        LOANAMOUNT: 'Loan Amount',
        INTERESTRATE: 'Interest Rate',
        LOANTERM: 'Loan Term',
        EMI: 'Monthly Amount(EMI)',
        CALCULATE: 'Calculate'
    },
    SCIENTIFICCALCULATOR:{
        TITLE: 'Scientific Calculator'
    },
    NOTEPAD:{
        TITLE: 'Notepad',
        SAVE: 'Save',
        LIST: 'Note List'
    },
    SCANNER:{
        TITLE: 'Scanner',
        TEXT: 'Scan'
    },
    APPOINTMENT:{
        TITLE: 'Appointment',
        SUCCESSFULLYADDED:'Appointment added successfully',
        CHECKINTERNETCONNECTION: 'Please check your internet connection.',
        NOTCONFIRMMSG: 'Your Appointment is still not confirm'
    },
    QUOTATION:{
        TITLE: 'Quotation',
        SUCCESSFULLYADDED: 'Quote successfully added'
    },
    REVIEW:{
        TITLE: 'Review'
    },
    TESTIMONIAL:{
        TITLE: 'TESTIMONIAL',
        NOTESTIMONIALAVL: 'No Testimonial is available'
    },
    COUPOUN:{
        TITLE: 'Coupon',
        CODE: 'Coupon Code',
        IMGTITLE: 'Image Title is coming here',
        ISSUEDATE: 'ISSUE DATE',
        VALIDTILL: 'VALID TILL'
    },
    SURVEY:{
        TITLE: 'Survey'
    },
    CATELOG:{
        TITLE: 'Catalogue',
        NODATAAVAILABLE: 'No data available.',
        CART: 'Cart',
        ADDTOCART: 'Add to cart',
        CARTDETAILS: 'Cart Details',
        NOCARTPRODUCTAVAILABLE: 'No cart product is available',
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
    	CLIENTDETAILS: 'Customer Details',
    	SELECT: 'Select',
    	AREANAME: "Area Name",
    	COMMENT: 'Comment',
    	ERROR: 'Error',
    	TYPE: 'Type'
    },
    NEWARRIVAL:{
        TITLE: 'New Arrival',
        NONEWARRIVAL: 'No new arrival is available',
        DETAILS: 'Details',
        NEWARRIVALDETAILS: 'New arrival details'
    },
    DONATION:{
        TITLE: 'Donation',
        THANKYOUDONATION: 'Thank you for the donation',
        CHECKINTERNETCONNECTION: 'Please check your Internet connection.',
        ORG: 'Organization',
        CURRENCYCODE: 'Currency Code',
        AMOUNT: 'Amount'
    },
    SERVICE:{
        TITLE: 'Service',
        SERVICEDETAILS: 'Service details',
        DETAILS: 'Details',
        DAY: 'Day',
        PRICE: 'Price',
        SERVICEFROM: 'From',
        SERVICETO: 'To',
        NOSERVICEAVAILABLE: 'No service available.'
    },
    TICKETINFO:{
        TITLE: 'Ticket information',
        NOTICKETLISTAVL: 'No Ticket List is available'
    },
    ECOMMERCE:{
        TITLE: 'E Commerce',
        SEARCH: 'Research',
        NODATAAVAILABLE: 'No item available',
        CARTTITLE: 'Retail cart',
        SIZES: 'Size',
        DETAILS: 'Detail'
    },
    BLOG:{
        TITLE: 'Blogs',
        SHARE: 'Share',
        EMPTYTEXT: 'No blog is available'
    },
    MENUOFTHEDAY:{
        TITLE: 'Menu of the day',
        NOMENUAVAILABLE: 'Menu of the day not available.',
        PRICE: 'Price',
        SIZES: 'Size',
        OPTIONS: 'Options'
    },
    LOCALIZATION: {
        CHANGELANGUAGE: 'Change Language',
        CHANGELANGUAGEQUESTION: 'You have to reload application in order to change to new language.'
    },
    FANWALL: {
    	TITLE: 'Fanwall',
    	NOOBJAVAILABLE: 'No Object is available'
    },
    MAILING: {
    	MAILINGVIEW: 'Mailing View',
    	TITLE: 'Mailing List'
    },
    PAYPAL: {
    	TITLE:'Paypal View',
    	BUTTON: 'Pay Pal'
    }
});