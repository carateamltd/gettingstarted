Ext.define("MyApp.view.newarrival.NewArrivalNavi", {
    extend: "Ext.navigation.View",
    requires: [
        "MyApp.view.newarrival.NewArrivalView"
    ],
    alias: "widget.newarrivalnavi",
    config: {
        scrollable: false,
        navigationBar: {
            hidden:false,
            items:[{
                      xtype:'button',
                      text:'Share',
                      align:'right',
                      itemId:'sharingId',
                      hidden:true
            }]
        },
        items: [{
                xtype:'newarrivalview',
                title:Loc.t('NEWARRIVAL.TITLE')
            }]
    }
});
