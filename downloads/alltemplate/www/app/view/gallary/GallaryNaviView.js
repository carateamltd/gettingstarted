Ext.define("MyApp.view.gallary.GallaryNaviView", {
    extend: "Ext.navigation.View",
    requires: [
        "MyApp.view.gallary.GallaryView"
    ],
    alias: "widget.gallarynaviview",
    config: {
        navigationBar: {
            hidden:false,
            items:[{
                      xtype:'button',
//                      ui:'plain',
                      //text:Loc.t('LOYALTY.SHARE'),
                      align: 'right',
                      itemId:'galleryShareBtnid',
                      hidden:true
            }]
        },
        items: [{
                xtype:'gallaryview',
                //title: Loc.t('GALLERY.TITLE'),
                scrollable:{
                	indicators:false
                }
            }]
    }
});
