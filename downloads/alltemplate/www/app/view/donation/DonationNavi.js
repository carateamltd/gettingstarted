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
                      text:Loc.t('LOYALTY.SHARE'),
                      align:'right',
                      itemId:'sharingId',
                      hidden:true
            }]
        },
        items: [{
                xtype:'donationview',
                title:Loc.t('DONATION.TITLE'),
//                style: "background-image: url('img/splash.png');",
            }]
    }
});
