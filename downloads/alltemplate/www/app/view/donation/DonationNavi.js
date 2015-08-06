Ext.define("MyApp.view.donation.DonationNavi", {
    extend: "Ext.navigation.View",
    requires: [
        "MyApp.view.donation.DonationView"
    ],
    alias: "widget.donationnavi",
    config: {
        scrollable: false,
        navigationBar: {
            hidden:false,
//            baseCls: 'younaviCls',
//            height: 50,
            items:[{
                      xtype:'button',
                      text:'Share',
                      align:'right',
                      itemId:'sharingId',
                      hidden:true
            }]
        },
        items: [{
                xtype:'donationview',
                title:'Donation',
//                style: "background-image: url('img/splash.png');",
            }]
    }
});
